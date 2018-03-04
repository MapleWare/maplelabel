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
	
	function index($type = null)
	{
		if ($this->session->userdata('uid') !== null)
		{
			$details = $this->user_model->get_user_by_id($this->session->userdata('uid'));
			// $data['total_orders'] = $this->orders->count_all("print_status = 'preprint'");
			$data['total_orders'] = $this->orders->count_all("",array(),1);
			$data['uname'] = $details[0]->username;
			$data['uemail'] = $details[0]->email;
			
			$data['user'] = $details;
			$data['title'] = 'Profile';

			if ($type) :
			
				if ($type == 'company') : 

					$this->form_validation->set_rules("companyname", "Company Name", "trim|required");
					$this->form_validation->set_rules("first_name", "First Name", "trim|required");
					$this->form_validation->set_rules("last_name", "Last Name", "trim|required");
					$this->form_validation->set_rules("street1", "Street", "trim|required");
					$this->form_validation->set_rules("city", "City", "trim|required");
					$this->form_validation->set_rules("province", "Province", "trim|required");
					$this->form_validation->set_rules("postal_code", "Postal Code", "trim|required");

					if ($this->form_validation->run() == FALSE) :
						
						// $this->load->view('header', $data);
						// $this->load->view('profile_view', $data);
						// $this->load->view('footer');
					
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
					endif;

				elseif ($type == 'user') : 

					$this->form_validation->set_rules("username", "User Name", "trim|required");
					$this->form_validation->set_rules("companyname1", "Company Name", "trim|required");
					if ($this->form_validation->run() == FALSE) :

					else :
						$record = $this->input->post();
						$uid = $this->session->userdata('uid');

						unset($record['search']);
						unset($record['email']);

						$companyname = $record['companyname1'];
						$companyphone = $record['companyphone'];
						$username = $record['username'];

						unset($record['companyname']);
						unset($record['companyphone']);
						unset($record['username']);

						if (isset($username)) :
							$this->user_model->update_user($uid, array('username'=>$username));
						endif;
						if (isset($companyname) || isset($companyphone)) :
							$search = array('ol_user_id' => $uid);
							$user_company = $this->user_model->get_company($search);
							if ($user_company==0) :
								$record['ol_user_id'] = $uid;
								$this->user_model->insert_company(array('companyname'=>$companyname, 'companyphone'=>$companyphone));
							else : 
								$this->user_model->update_company($uid, array('companyname'=>$companyname, 'companyphone'=>$companyphone));
							endif;
						endif;
						
						$this->session->set_userdata('user_success', true);
						redirect(base_url('profile/index'));
					endif;

				elseif ($type == 'pass') : 

					$this->form_validation->set_rules('oldpass', 'Password', 'trim|required|callback_is_password_correct');
					$this->form_validation->set_rules('newpass', 'Password', 'min_length[8]|trim|required|matches[renewpass]|callback_is_password_strong');
					$this->form_validation->set_rules('renewpass', 'Confirm Password', 'trim|required');
					$this->form_validation->set_message('is_password_strong','Password should contain atleast one Special Character and an Upper Case');
					$this->form_validation->set_message('is_password_correct','Current password Incorrect');

					if ($this->form_validation->run() == FALSE) :

					else :

						$record = $this->input->post();
						$uid = $this->session->userdata('uid');

						$pass = md5($record['newpass']);
						$this->user_model->update_user($uid, array('pwd'=>$pass));
						$this->session->set_userdata('pass_success', true);
						redirect(base_url('profile/index'));
					endif;

				endif ;

			endif; 
			//print_r($data);
			$this->load->view('header', $data);
			$this->load->view('profile_view', $data);
			$this->load->view('footer');
		}
		else redirect(base_url());
	}

	public function is_password_strong($password)
	{
	   if (preg_match('#[0-9]#', $password) && preg_match('#[a-zA-Z]#', $password)) {
	     return TRUE;
	   }
	   return FALSE;
	}

	public function is_password_correct($password)
	{
		$details = $this->user_model->get_user_by_id($this->session->userdata('uid'));
		$email = $details[0]->email;
		$record = $this->user_model->get_user($email, $password);
		if (!$record) return false;
		return true;
	}

	function update()
	{
		
	}
}