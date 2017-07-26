<?php
class Profile extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('url','html'));
		$this->load->library(array('session', 'form_validation'));
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
			$data['total_orders'] = $this->orders->count_all("print_status = 'preprint'");
			$data['uname'] = $details[0]->username;
			$data['uemail'] = $details[0]->email;
			
			$data['user'] = $details;
			$data['title'] = 'Profile';

			$companyname = $this->input->post("companyname");
	        $first_name = $this->input->post("first_name");
	        $last_name = $this->input->post("last_name");
	        $street1 = $this->input->post("street1");
	        $street2 = $this->input->post("street2");
	        $city = $this->input->post("city");
	        $country = $this->input->post("country");
	        $stateorprovice = $this->input->post("province");
	        $postal_code = $this->input->post("postal_code");


			$this->form_validation->set_rules("companyname", "Company Name", "trim|required");
			$this->form_validation->set_rules("first_name", "First Name", "trim|required");
			$this->form_validation->set_rules("last_name", "Last Name", "trim|required");
			$this->form_validation->set_rules("street1", "Street", "trim|required");
			$this->form_validation->set_rules("city", "City", "trim|required");
			$this->form_validation->set_rules("province", "Province", "trim|required");
			$this->form_validation->set_rules("postal_code", "Postal Code", "trim|required");
			
			if ($this->form_validation->run() == FALSE) :
				
				$this->load->view('header', $data);
				$this->load->view('profile_view', $data);
				$this->load->view('footer');
			
			else :

				if (isset($_POST['company_update'])) :

					$record = $this->input->post();
					$uid = $this->session->userdata('uid');
					unset($record['company_update']);
					unset($record['search']);
					$record['stateorprovice'] = $record['province'];
					unset($record['province']);
					$search = array('ol_user_id' => $uid);
					$user_company = $this->user_model->get_company($search);
					if ($user_company==0) :
						$record['ol_user_id'] = $uid;
						$this->user_model->insert_company($record);
					else : 
						$this->user_model->update_company($user_company['ol_user_id'], $record);
					endif;
					$this->session->set_userdata('company_success', true);
					redirect(base_url('profile/index'));
				endif;

				//print_r($data);
				$this->load->view('header', $data);
				$this->load->view('profile_view', $data);
				$this->load->view('footer');

			endif;
		}
		else redirect(base_url());
	}

	function update()
	{
		
	}
}