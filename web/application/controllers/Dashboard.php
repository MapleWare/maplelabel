<?php
class Dashboard extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('url','html','ebay'));
		$this->load->library('session');
		$this->load->database();
		$this->load->model('user_model');
		$this->load->model('order_model', 'orders');
	}
	
	function index()
	{
		if ($this->session->userdata('uid') !== null)
		{
			$details = $this->user_model->get_user_by_id($this->session->userdata('uid'));
			$data['total_orders'] = $this->orders->count_all();
			$data['uname'] = $details[0]->username;
			$data['uemail'] = $details[0]->email;

			$this->load->view('dashboard_view', $data);	
		}
		else redirect(base_url());
	}
}