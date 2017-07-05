<?php
class Output extends CI_Controller
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

		
		$this->load->helper('encrypter');
	}
	
	function index()
	{
		if ($this->session->userdata('uid') !== null)
		{
			$details = $this->user_model->get_user_by_id($this->session->userdata('uid'));
			$data['uname'] = $details[0]->username;
			$data['uemail'] = $details[0]->email;
			$data['total_orders'] = $this->orders->count_all("print_status = 'preprint'");
			$data['print_labels'] = $this->print_label->get_print_labels();

			$data['title'] = 'Printing Management'; 
			$this->load->view('header', $data);
			$this->load->view('output_view', $data);
			$this->load->view('footer');
		}
		else redirect(base_url());
	}

	public function ajax_list()
    {
    	$post = $this->input->post();
    	$from_date = date("Y-m-d", strtotime($post['from_date']));
    	$to_date = date("Y-m-d", strtotime($post['to_date']));
    	$dates = array('from_date'=>$from_date, 
    				   'to_date'=>$to_date);
        $list = $this->print_list->get_printlist("", $dates);       
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $orders) {
	        $no++;
	        $row = array();
	        $row[] = '<b>'.$orders->click_id.'</b>'; 
	        $row[] = date("Y.m.d h:i A",strtotime($orders->created));
	        $row[] = $orders->count;
	        $isfrom = $orders->is_ship_from==1?'From':'';
	        $isto = $orders->is_ship_to==1?', To':'';
	        $iscn22 = $orders->is_cn22==1?', CN22':'';
	        $ismessage = $orders->is_print_comment==1?', Message':'';
	        $isvalues = $isfrom.$isto.$iscn22.$ismessage;
	        switch ($orders->pdf_file) {
				case 1: $dimension = '1x1'; break;
				case 2: $dimension = '1x2'; break;
				case 3: $dimension = '2x2'; break;
				case 4: $dimension = '3x7'; break;
				case 5: $dimension = '3x8'; break;
				default: break;
			}
			$infos = $orders->is_print_comment.'-'.$orders->is_ship_from.'-'.$orders->is_ship_to.'-'.$orders->is_cn22;
	        $row[] = '배송수단 : <strong style="color: #346896"> '.$orders->ship_method_name.', '.$orders->delivery_type_name.' </strong> <br/>
	        		  라벨 출력내용 : <strong style="color: #346896" id="infos'.$orders->sc_ordered_id.'" ref="'.$infos.'">'.$isvalues.'</strong><br/>
                      라벨 템플릿 :  <strong style="color: #346896" id="dimension'.$orders->sc_ordered_id.'" ref="'.$orders->pdf_file.'">폼텍 '.$dimension.'</strong><br/><br/>';
	        $row[] = '<select class="form-control" id="reprocess" style="width: 100px;">
                      	<option class="option-11">선택  </option>
                      	<option value="'.$orders->sc_ordered_id.'" class="option-11">PDF </option>
                      	<option value="'.$orders->id.'" class="option-11">국제우편물접수출력 </option>
                      </select>';

	        $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->print_list->count_all("", $dates),
            "recordsFiltered" => $this->print_list->count_filtered("", $dates),
            "data" => $data,
        );
        //output to json format
       echo json_encode($output);
    }


    public function epost_list()
    {
    	$id = $this->input->post('id');
        $list = $this->print_list->get_epost($id);
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $record) {
	        $no++;
	        $row = array();
	        $row[] = '<input type="checkbox" value="'.$record->sales_order_id.'" class="form-group tick">';
	        $row[] = '<b>'.$record->sales_order_id.'</b>';
	        $row[] = $record->sc_name;
	        $row[] = $record->order_title;
	        $row[] = $record->paid_item_cnt;
	        $row[] = $record->paid_amount.' '.$record->paid_amount_currency;
	        $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->print_list->count_epost_all($id),
            "recordsFiltered" => $this->print_list->count_epost_filtered($id),
            "data" => $data,
        );
        //output to json format
       echo json_encode($output);
    }
    
}