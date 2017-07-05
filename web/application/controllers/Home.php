<?php
class Home extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('url', 'html'));
		$this->load->library('session');
		$this->load->model('order_model', 'orders');
	}
	
	function index()
	{
		$data['total_orders'] = $this->orders->count_all("print_status = 'preprint'");
		
		$data['title'] = 'Home'; 
		$this->load->view('header', $data);
		$this->load->view('home_view', $data);
		$this->load->view('footer');
	}
	
	function logout()
	{
		// destroy session
        $data = array('login' => '', 'uname' => '', 'uid' => '');
        $this->session->unset_userdata($data);
        $this->session->sess_destroy();
		redirect('home/index');
	}
}


