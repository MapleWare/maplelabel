<?php
class Upgrade extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('url','html'));
		$this->load->library('session');
		$this->load->database();
		$this->load->model('user_model');
		$this->load->model('order_model', 'orders');
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
			$details = $this->user_model->get_user_by_id($this->session->userdata('uid'));
			// $data['total_orders'] = $this->orders->count_all("print_status = 'preprint'");
			$data['total_orders'] = $this->orders->count_all("",array(),1);
			$data['uname'] = $details[0]->username;
			$data['uemail'] = $details[0]->email;

			$data['title'] = 'Upgrade';
			$this->load->view('header', $data);
			$this->load->view('upgrade_view', $data);
			$this->load->view('footer');
		}
		else redirect(base_url());
	}
}