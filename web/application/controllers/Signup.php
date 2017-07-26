<?php
class Signup extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form','url'));
		$this->load->library(array('session', 'form_validation','email'));
		$this->load->database();
		$this->load->model('user_model');
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
		// set form validation rules
		// $this->form_validation->set_rules('username', 'User Name', 'trim|required|alpha|min_length[3]|max_length[30]');
		// $this->form_validation->set_rules('lname', 'Last Name', 'trim|required|alpha|min_length[3]|max_length[30]|xss_clean');
		$this->form_validation->set_rules('email', 'Email ID', 'trim|required|valid_email|is_unique[ol_user.email]');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|matches[cpassword]');
		$this->form_validation->set_rules('cpassword', 'Confirm Password', 'trim|required');

		$this->form_validation->set_message('is_unique', '이메일이 이미 등록되어 있습니다');
		$this->form_validation->set_message('matches', '비밀번호가 일치하지 않습니다');
		
		// submit
		if ($this->form_validation->run() == FALSE)
        {
			// fails
			$data['title'] = 'Signup';
			$this->load->view('header', $data);
			$this->load->view('signup_view');
        }
		else
		{
			//insert user details into db
			$email_trim = explode("@", $this->input->post('email'));
			$data = array(
				//'username' => $this->input->post('username'),
				'username' => $email_trim[0],
				// 'lname' => $this->input->post('lname'),
				'email' => $this->input->post('email'),
				'pwd' => md5($this->input->post('password'))
			);
			
			$record = $this->user_model->insert_user($data);
			if ($record['success'] == TRUE)
			{
				//$this->session->set_flashdata('msg','<div class="alert alert-success text-center">You are Successfully Registered! Please login to access your Profile!</div>');
				//redirect('signup/index');

				// $sess_data = array('login' => TRUE, 'uname' => $email_trim[0], 'uid' => $record['id']);
				// $this->session->set_userdata($sess_data);
				// redirect('profile/index');

				// send email
				if ($this->user_model->send_email($this->input->post('email')))
				{
					// successfully sent mail
					$this->session->set_flashdata('msg','<div class="alert alert-success text-center">You are successfully registered! Please confirm the mail sent to your email address. Thank you!</div>');
					redirect('signup/index');
				}
			}
			else
			{
				// error
				$this->session->set_flashdata('msg','<div class="alert alert-danger text-center">Oops! Error.  Please try again later!!!</div>');
				redirect('signup/index');
			}
		}
	}
}