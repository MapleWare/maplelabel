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
		$this->load->model('notice_model', 'notice');
	}
	
	function index()
	{
		if ($this->session->userdata('uid') !== null)
		{
			$details = $this->user_model->get_user_by_id($this->session->userdata('uid'));
			$data['total_orders'] = $this->orders->count_all("print_status = 'preprint'");
			$data['uname'] = $details[0]->username;
			$data['uemail'] = $details[0]->email;

			$data['notice'] = $this->notice->get('notice');
			$data['news'] = $this->notice->get('news');
			$data['update'] = $this->notice->get('update');

			$data['title'] = 'Dashboard'; 
			$this->load->view('header', $data);
			$this->load->view('dashboard_view', $data);	
			$this->load->view('footer');
		}
		else redirect(base_url());
	}
}