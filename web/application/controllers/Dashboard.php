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
			if ($this->session->userdata('ebay_session') !== NULL) save_user_token(0,'');

			//echo 'eldon='.get_ebay_userid(0);

			$uid = $this->session->userdata('uid');

			$where = array('ol_user_id'=>$uid,'status'=>'active');
			$subscription = $this->user_model->get_subcription($where);

			$printed_count = $this->user_model->get_printed_cnt($uid);
			
			$data['ebay_count'] = 0;
			$data['amazon_count'] = 0;
			$data['esty_count'] = 0;
			if ($printed_count!=0) {
				foreach ($printed_count as $row) {
					if ($row['sc_market']=='ebay') {
						$data['ebay_count'] = $row['printed_cnt'];
					}
				}	
			}
			$data['printed_count_total'] = ($data['ebay_count']+$data['amazon_count']+$data['esty_count']);

 
			if ($subscription == 0) $data['remaining_cnt'] = 0;
			else $data['remaining_cnt'] = $subscription['remaining_cnt'];

			$data['last_value'] = ($data['printed_count_total'])+($data['remaining_cnt']);

			$data['graph'] = $this->user_model->get_graph($uid);

			//print_r($data['graph']);

			$details = $this->user_model->get_user_by_id($uid);
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