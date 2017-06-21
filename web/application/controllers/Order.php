<?php
class Order extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('url','html'));
		$this->load->library('session');
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
			$details = $this->user_model->get_user_by_id($this->session->userdata('uid'));
			$data['uname'] = $details[0]->username;
			$data['uemail'] = $details[0]->email;
			$data['print_labels'] = $this->print_label->get_print_labels();
			$data['total_orders'] = $this->orders->count_all("print_status = 'preprint'");
			$this->load->view('new_order_view', $data);	
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
		$this->load->library('fpdflibrary');
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

		$orientation = 'L';
		if ($dimension==2 || $dimension==4 || $dimension==5) $orientation = 'P';

		//print_r($decoded_ids);
		$pdf = new $this->fpdflibrary($orientation,'mm','A4');
		for ($i=0; $i<count($order_ids); $i++)
		{
			$order = $this->orders->get_specific_order($order_ids[$i]);
			// update order from preprint to postprint sales order table
			$this->orders->edit(array('print_status'=>'postprint'),$order_ids[$i]);
			// insert to print list talbe
			$is_cn22 = 0;
			if ($dimension<3) $is_cn22 = 1;
			$print_list_maxid = ($this->print_list->getmaxid()+1);
			$printlist = array('id'=>$print_list_maxid,
							   'pdf_file'=>$dimension,
							   'ol_user_id'=>$this->session->userdata('uid'),
							   'sales_order_id'=>$order['id'],
							   'pdf_down_cnt'=>1,
							   'is_ship_from_print'=>1,
							   'is_ship_to'=>1,
							   'is_cn22'=>$is_cn22);
			$printlist['seller_msg_template_id'] = $msg_template;
			$printlog = array('start_point'=>$startpoint);

			// if ($table_selected === 'table') 
			// {
				$check_print_list = $this->print_list->get_order($order['id']);
				if ($check_print_list == 0)
					$this->print_list->create($printlist, $printlog);
				else
				{
					$new_printlist = array('pdf_down_cnt'=>($check_print_list['pdf_down_cnt']+1));
					$new_printlist['seller_msg_template_id'] = $msg_template;
					$this->print_list->edit($new_printlist, $check_print_list['id']);
				}
			//}

			$order = $this->orders->get_specific_order($order_ids[$i]);
			$options = array('startpoint' => $startpoint,
							 'from' => $from_toggle,
							 'to' => $to_toggle,
							 'cn22' => $cn22_toggle);
			switch ($dimension) {
				case 1: $this->fpdflibrary->pdf1x1($pdf, $order, $options); break;
				case 2: $this->fpdflibrary->pdf1x2($pdf, $order, $options); break;
				case 3: $this->fpdflibrary->pdf2x2($pdf, $order, $options); break;
				case 4: $this->fpdflibrary->pdf3x7($pdf, $order, $options); break;
				case 5: $this->fpdflibrary->pdf3x8($pdf, $order, $options); break;
				default: break;
			}
		}
		$pdf->Output('form1.pdf','I');
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
        foreach ($list as $orders) {
	        $no++;
	        $row = array();
	        //$row[] = '<input type="checkbox" value="'.$orders->sc_ordered_id.'" class="form-group tick">';
	        $row[] = '<input type="checkbox" id="'.$no.'" value="'.$orders->sc_ordered_id.'" class="table_order_check form-group tick">';
	        $row[] = substr($orders->sc_ordered_id, -7);
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
	        
	        $row[] = $orders->order_user_name."<br>"."피드백 : ".$orders->feedback_score."점 주문수 : ".$orders->cnt."회";
	        $row[] = '<span><a href=""><img src="'.base_url("assets2/img/icon-1.png").'"></a></span>
					  <span><a href=""><img src="'.base_url("assets2/img/icon-2.png").'"></a></span>
					  <span><a href=""><img src="'.base_url("assets2/img/icon-3.png").'"></a></span>';

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
	        $row[] = '<button type="submit" id="editmsg" ref="'.$msg->id.'" class="btn btn-primary">수정</button><button type="submit" class="btn btn-default" style="background: #444444;color: #fff;">삭제</button>';
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