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
			$this->load->view('output_view', $data);	
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
        $list = $this->orders->get_orders("print_status = 'postprint'", $dates);       
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $orders) {
	        $no++;
	        $row = array();
	        //$row[] = '<input type="checkbox" value="'.$orders->sc_ordered_id.'" class="form-group tick">';
	        $row[] = '<input type="checkbox" id="'.$no.'" value="'.$orders->sc_ordered_id.'" class="form-group tick">';
	        $row[] = '<b>'.$orders->sc_ordered_id.'</b>'; //substr($orders->sc_ordered_id, -7);
	        $row[] = date("Y.m.d h:i A",strtotime($orders->print_date));
	        
	        $row[] = $orders->pdf_down_cnt;

	        $isfrom = $orders->is_ship_from_print==1?'From, ':'';
	        $isto = $orders->is_ship_to==1?'To, ':'';
	        $iscn22 = $orders->is_cn22==1?'CN22 ':'';
	        $isvalues = $isfrom.$isto.$iscn22;

	        switch ($orders->pdf_file) {
				case 1: $dimension = '1x1'; break;
				case 2: $dimension = '1x2'; break;
				case 3: $dimension = '2x2'; break;
				case 4: $dimension = '3x7'; break;
				case 5: $dimension = '3x8'; break;
				default: break;
			}

			$infos = $orders->is_print_comment.'-'.$orders->is_ship_from_print.'-'.$orders->is_ship_to.'-'.$orders->is_cn22;
	        $row[] = '배송수단 : <strong style="color: #346896"> 우체국, 소형포장 </strong> <br/><br/>
	        		  라벨 출력내용 : <strong style="color: #346896" id="infos'.$orders->sc_ordered_id.'" ref="'.$infos.'">'.$isvalues.'</strong><br/><br/>
                      라벨 템플릿 :  <strong style="color: #346896" id="dimension'.$orders->sc_ordered_id.'" ref="'.$orders->pdf_file.'">폼텍 '.$dimension.'</strong><br/><br/>';
	        $row[] = '<select class="form-control" id="reprocess" style="width: 100px;">
                      	<option class="option-11">선택  </option>
                      	<option value="'.$orders->sc_ordered_id.'" class="option-11">PDF </option>
                      </select>';

	        $data[] = $row;

	        //$_POST['draw']='';
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->orders->count_all("print_status = 'postprint'", $dates),
            "recordsFiltered" => $this->orders->count_filtered("print_status = 'postprint'", $dates),
            "data" => $data,
        );
        //output to json format
       echo json_encode($output);
    }

    
}