<?php
class Layout extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('url','html'));
		$this->load->library('session');
		$this->load->database();
		$this->load->model('user_model');
		$this->load->model('order_model', 'orders');
		$this->load->model('printlabels_model', 'printlabels');
		if ($_SERVER['SERVER_PORT'] == 443) {
			if ($_SERVER['HTTP_HOST'] == 'stg.onlabels.co.kr') : 
	            $this->config->set_item('base_url','https://stg.onlabels.co.kr/');
	        else :
	            $this->config->set_item('base_url','https://dev.onlabels.co.kr/');
	        endif; 
		}
	}
	
	function index()
	{
		if ($this->session->userdata('uid') !== null)
		{
			$uid = $this->session->userdata('uid');
			$details = $this->user_model->get_user_by_id($uid);
			$data['total_orders'] = $this->orders->count_all("print_status = 'preprint'");
			$data['uname'] = $details[0]->username;
			$data['uemail'] = $details[0]->email;

			$data['manufacturers'] = $this->printlabels->get_info($uid,'manufacturer');
			$data['labels'] = $this->printlabels->get_info($uid);

			// print_r($data);
			
			$data['title'] = 'Layout Setting';
			$this->load->view('header', $data);
			$this->load->view('layout_view', $data);
			$this->load->view('footer');
		}
		else redirect(base_url());
	}

	function getlabel()
	{
		$uid = $this->session->userdata('uid');
		$labelid = $this->input->post('labelid');
		$info = $this->printlabels->get($labelid);
		echo json_encode($info);
	}

	function save()
	{
		$id = $this->input->post('label_id');
		$info = $this->input->post();
		unset($info['label_id']);

		// update
		if ($id>5) :
			$this->printlabels->edit($id, $info);
		// insert
		else : 
			$default_info = $this->printlabels->get($id);
			$info['manufacturer'] = $default_info['manufacturer'];
			$info['label_paper_code'] = $default_info['label_paper_code'];
			$info['url_desc'] = $default_info['url_desc'];
			$info['cols'] = $default_info['rows'];
			$info['rows'] = $default_info['rows'];
			$info['paper_height'] = $default_info['paper_height'];
			$info['paper_width'] = $default_info['paper_width'];
			$info['ol_user_id'] = $this->session->userdata('uid');
			$info['parent_label_paper_id'] = $default_info['parent_label_paper_id'];
			$this->printlabels->create($info);
		endif; 
	}
}