<?php
class Sellers extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('url','html','ebay'));
		$this->load->library('session');
		$this->load->database();
		$this->load->model('user_model');
		$this->load->model('order_model', 'orders');
		$this->load->model('sellers_model', 'sellers');
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
			$data['total_orders'] = $this->orders->count_all("print_status = 'preprint'");
			$data['uname'] = $details[0]->username;
			$data['uemail'] = $details[0]->email;
			
			$uid = $this->session->userdata('uid');
			$data['title'] = 'Sellers';
			$data['sellers'] = $this->sellers->get($uid);

			$RuName = "Onlabeldev_Davi-Onlabeld-onlabe-xecpeq";
			if ($_SERVER['HTTP_HOST'] == 'stg.onlabels.co.kr') :
				$RuName = "Mapleware-Maplewar-9b5a-4-qdklsls" ;//"Onlabeldev_Davi-Onlabeld-onlabe-xecpeq";
			endif;
	        $siteID = 0;
	        get_ebay_session($siteID,$RuName);
	        $ebay_session = $this->session->userdata('ebay_session');
	        $data['ebay_link'] = 'https://signin.sandbox.ebay.com/ws/eBayISAPI.dll?SignIn&RuName='.$RuName.'&SessID='.$ebay_session;
	        if ($_SERVER['HTTP_HOST'] == 'stg.onlabels.co.kr') :
	        	$data['ebay_link'] = 'https://signin.ebay.com/ws/eBayISAPI.dll?SignIn&RuName='.$RuName.'&SessID='.$ebay_session;
	   		endif;

			$this->load->view('header', $data);
			$this->load->view('sellers_view', $data);
			$this->load->view('footer');
		}
		else redirect(base_url());
	}
}