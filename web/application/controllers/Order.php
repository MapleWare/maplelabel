<?php
class Order extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('url','html','ebay'));
		$this->load->library(array('session','fpdflibrary'));
		$this->load->database();
		$this->load->model('user_model');
		$this->load->model('order_model', 'orders');
		$this->load->model('printlabels_model', 'print_label');
		$this->load->model('printlist_model', 'print_list');
		$this->load->model('seller_msg_model', 'seller_msg');
		$this->load->helper('encrypter');
	}
	
	function index()
	{
		if ($this->session->userdata('uid') !== null)
		{
			// $RuName = "Davinci_Tech-DavinciT-DevDAV-qvqch";
			// $siteID = 0;
			// get_ebay_session($siteID,,$RuName);
			// $ebay_session = $this->session->userdata('ebay_session');
			// $data['ebay_link'] = 'https://signin.sandbox.ebay.com/ws/eBayISAPI.dll?SignIn&RuName='.$RuName.'&SessID='.$ebay_session;

			if ($this->session->userdata('ebay_session') !== NULL) 
				save_user_token(0,'');

			$details = $this->user_model->get_user_by_id($this->session->userdata('uid'));
			$data['uname'] = $details[0]->username;
			$data['uemail'] = $details[0]->email;
			$data['print_labels'] = $this->print_label->get_print_labels();
			$data['total_orders'] = $this->orders->count_all("print_status = 'preprint'");

			$data['title'] = 'Order Management'; 
			$this->load->view('header', $data);
			$this->load->view('new_order_view', $data);	
			$this->load->view('footer');
		}
		else redirect(base_url());
	}

	public function process()
	{
		$order_ids = $_POST['ids'];
		echo json_encode(encode($order_ids));
	}

	public function generate($ids) 
	{	
		$decoded_ids = decode($ids);
		$order_ids = explode(",", $decoded_ids);
		$additonal_info = $order_ids[(count($order_ids)-1)];
		$info = explode("-", $additonal_info);
		$msg_template = $info[0];
		$from_toggle = $info[1];
		$to_toggle = $info[2];
		$cn22_toggle = $info[3];
		array_pop($order_ids);
		$table_selected = $order_ids[(count($order_ids)-1)];
		array_pop($order_ids);
		$startpoint = $order_ids[(count($order_ids)-1)];
		array_pop($order_ids);
		$dimension = $order_ids[(count($order_ids)-1)];
		array_pop($order_ids);

		$is_print_comment = 0;
		if ($msg_template>0) $is_print_comment = 1;

		for ($i=0; $i<count($order_ids); $i++)
		{
			$order = $this->orders->get_specific_order($order_ids[$i]);
			$this->orders->edit(array('print_status'=>'postprint'),$order_ids[$i]);
			$print_list_maxid = ($this->print_list->getmaxid()+1);
			$printlist = array('id'=>$print_list_maxid,
							   'pdf_file'=>$dimension,
							   'ol_user_id'=>$this->session->userdata('uid'),
							   'sales_order_id'=>$order['id'],
							   'pdf_down_cnt'=>1,
							   'is_ship_from'=>$from_toggle,
							   'is_ship_to'=>$to_toggle,
							   'is_cn22'=>$cn22_toggle,
							   'seller_msg_template_id'=>$msg_template,
							   'is_print_comment'=>$is_print_comment);
			$printlog = array('start_point'=>$startpoint);
			$check_print_list = $this->print_list->get_order($order['id']);
			if ($check_print_list == 0)
			{
				$printlist['print_date'] = date('Y-m-d H:i:s');
				$this->print_list->create($printlist, $printlog);
			}
			else
			{
				$new_printlist = array('pdf_file'=>$dimension,
									   'pdf_down_cnt'=>($check_print_list['pdf_down_cnt']+1),
									   'is_ship_from'=>$from_toggle,
							   		   'is_ship_to'=>$to_toggle,
							           'is_cn22'=>$cn22_toggle,
							           'seller_msg_template_id'=>$msg_template,
							           'is_print_comment'=>$is_print_comment);
				$new_printlist['modified'] = date('Y-m-d H:i:s');
				$this->print_list->edit($new_printlist, $check_print_list['id']);
			}
		}
		$options = array('startpoint' => $startpoint,
						 'from' => $from_toggle,
						 'to' => $to_toggle,
						 'cn22' => $cn22_toggle);
		$this->checkpdfuse($order_ids, $options, $dimension);
	}

	function checkpdfuse($orders = array(), $options = array(), $dimension)
	{
		$orientation = 'L';
		if ($dimension==2 || $dimension==4 || $dimension==5) $orientation = 'P';
		
		$pdf = new $this->fpdflibrary($orientation,'mm','A4');

		switch ($dimension) {
			case 1: $this->fpdflibrary->pdf1x1($pdf, $orders, $options); break;
			case 2: $this->fpdflibrary->pdf1x2($pdf, $orders, $options); break;
			case 3: $this->fpdflibrary->pdf2x2($pdf, $orders, $options); break;
			case 4: $this->fpdflibrary->pdf3xn($pdf, $orders, $options, 7); break;
			case 5: $this->fpdflibrary->pdf3xn($pdf, $orders, $options, 8); break;
		}
		$pdf->Output('onlables.pdf','I');
	}

	public function order_list($where = 'preprint')
    {
    	switch ($where) {
    		case 'preprint':
    		case 'postprint':
    			$query = "print_status = '{$where}'";
    			break;
    		case 'beforedelivery':
    		case 'waitingforfeedback':
    			$query = "delivery_status = '{$where}'";
    			
    			break;
    	}
        $list = $this->orders->get_orders($query);
        $data = array();
        $no = $_POST['start'];

        $cnt_ebay = $_POST['start'];
        $cnt_amazon = $_POST['start'];
        foreach ($list as $orders) {

        	if ($orders->sc_market == 'ebay') :
        		$cnt_ebay++;
        	elseif ($orders->sc_market == 'amazon') :
        		$cnt_amazon++;
        	endif; 

	        $no++;
	        $row = array();
	        //$row[] = '<input type="checkbox" value="'.$orders->sc_ordered_id.'" class="form-group tick">';
	        $row[] = '<input type="checkbox" id="'.$no.'" value="'.$orders->sc_ordered_id.'" class="table_order_check form-group tick">';
	        // $row[] = $orders->sc_market=='ebay'?'<b>1-'.$cnt_ebay.'</b>':'<b>2-'.$cnt_amazon.'</b>'; 
	        $row[] = '<b>'.$orders->id.'</b>';
	        $row[] = date("Y.m.d h:i A",strtotime($orders->ordered_date));
	        
	        $row[] = $orders->sc_market;
	        
	        $row[] = $orders->order_title."<br>수량 : ".$orders->cnt."개 <br>가격 : ".$orders->amount.
	        '<br><br><a class="collapse_tbl" role="button" data-toggle="collapse" href="#no'.$no.'" aria-expanded="false" aria-controls="#'.$no.'">
				<span class="fa fa-caret-right"> </span> 배송정보
				</a>
				<div class="collapse out" id="no'.$no.'">
				주문자   :  '.$orders->seller_first_name.' '.$orders->seller_last_name.' <br/>
				연략처   :  '.$orders->seller_phone_no.' <br/>
				Email  : - <br/>
				주소<br/>
					 '.$orders->seller_street1.' <br/>
					 '.$orders->seller_street2.'<br/>
					 '.$orders->seller_country.'<br/>
				</div>';
	        
	        $style_print = 'style="opacity:0.5"';
	        if ($orders->print_status == 'postprint') $style_print = 'style="opacity:1"'; 
	        $row[] = $orders->order_user_name."<br>"."피드백 : ".$orders->feedback_score."점 주문수 : ".$orders->cnt."회";
	        $row[] = '<span><img '.$style_print.' src="'.base_url("assets2/img/icon-1.png").'"></span>
					  <span><img src="'.base_url("assets2/img/icon-3.png").'"></span>
					  <span><img src="'.base_url("assets2/img/icon-4.png").'"></span>';

	        $data[] = $row;
	        //$_POST['draw']='';
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->orders->count_all($query),
            "recordsFiltered" => $this->orders->count_filtered($query),
            "data" => $data,
        );
        //output to json format
       echo json_encode($output);
    }

    public function msg_add()
    {
    	$msg = $this->input->post('msg');
    	$this->seller_msg->create(array('ol_user_id'=>$this->session->userdata('uid'),'seller_msg'=>$msg));
    }

    public function msg_delete()
    {
		$msgid = $this->input->post('msgid');
		$this->seller_msg->delete($msgid);
    }

    public function msg_list()
    {
        $list = $this->seller_msg->get_msg();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $msg) {
	        $no++;
	        $row = array();
	        $row[] = '<input type="radio" name="msg_template" id="msg_template" value="'.$msg->id.'" class="form-group tick">';
	        // $row[] = $msg->seller_msg;
	        $row[] = '<span id="editmsgs'.$msg->id.'" data-type="textarea">'.$msg->seller_msg.'</span>';
	        $row[] = '<button type="submit" id="editmsg" ref="'.$msg->id.'" class="btn btn-primary">수정</button><button type="submit" data-userid="'.$msg->id.'" class="btn btn-default deleteMsg" style="background: #444444;color: #fff;">삭제</button>';
	        $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->seller_msg->count_all(),
            "recordsFiltered" => $this->seller_msg->count_filtered(),
            "data" => $data,
        );
       echo json_encode($output);
    }

    public function template($action)
    {
    	$post = $this->input->post();
    	switch ($action) {
    		case 'edit':
    			$seller_msg = array('seller_msg'=>$post['value']);
				$this->seller_msg->edit($seller_msg, $post['pk']);
    			break;
    		default:
    			break;
    	}
    }
}