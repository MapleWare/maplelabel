<?php
class Login extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form','url','html'));
		$this->load->library(array('session', 'form_validation','facebook'));
		$this->load->database();
		$this->load->model('user_model','user');
		$this->load->model('saleschannel_model', 'saleschannel');

		if ($_SERVER['SERVER_PORT'] == 443) {
			if ($_SERVER['HTTP_HOST'] == 'stg.onlabels.co.kr') : 
	            $this->config->set_item('base_url','https://stg.onlabels.co.kr/');
	        else :
	            $this->config->set_item('base_url','https://dev.onlabels.co.kr/');
	        endif; 
		}
	}
    public function index()
    {
		// get form input
		$email = $this->input->post("email");
        $password = $this->input->post("password");
        $data['authUrl'] =  $this->facebook->login_url();

		// form validation
		$this->form_validation->set_rules("email", "Email-ID", "trim|required");
		$this->form_validation->set_rules("password", "Password", "trim|required");
		
		if ($this->form_validation->run() == FALSE)
        {
			// validation fail
			$data['title'] = 'Login'; 
			$this->load->view('header', $data);
			$this->load->view('login_view', $data);
		}
		else
		{
			// check for user credentials
			$uresult = $this->user->get_user($email, $password);
			if (count($uresult) > 0)
			{
				$isverified = $this->user->is_verified(md5($email));

				if ($isverified)
				{
					// set session
					$sess_data = array('login' => TRUE, 'uname' => $uresult[0]->username, 'uid' => $uresult[0]->id);
					$this->session->set_userdata($sess_data);
					// redirect("profile/index");
					$user_channel = $this->saleschannel->get_user_channel($uresult[0]->id);
					
					if (empty($user_channel['user_token'])) 
						//redirect("saleschannel/index");

						if ($_SERVER['HTTP_HOST'] == 'stg.onlabels.co.kr') : 
							redirect("https://stg.onlabels.co.kr/saleschannel/index");
						else :
							redirect("https://dev.onlabels.co.kr/saleschannel/index");
						endif; 
					else redirect("dashboard/index");	
				}
				else
				{
					$this->session->set_flashdata('msg', '<div class="alert alert-danger text-center">Please verify your account first!</div>');
					redirect('login/index');
				}
				
			}
			else
			{
				// $this->session->set_flashdata('msg', '<div class="alert alert-danger text-center">이메일이 이미 등록되어 있습니다!</div>');
				$this->session->set_flashdata('msg', '<div class="alert alert-danger text-center">아이디 비밀번호가 일치하지 않습니다!</div>');
				redirect('login/index');
			}
		}
    }



	function verify($hash=NULL)
	{
		$isverified = $this->user->is_verified($hash);

		if ($isverified == false)
		{
			if ($this->user->verify_email($hash))
			{
				$this->session->set_flashdata('msg','<div class="alert alert-success text-center">Your email address is successfully verified! You may now login to your account.</div>');
				redirect('login/index');
			}
			else
			{
				$this->session->set_flashdata('msg','<div class="alert alert-danger text-center">Sorry, there was an error verifying your email address!</div>');
				redirect('login/index');
			}
		}
		else
		{
			$this->session->set_flashdata('msg','<div class="alert alert-danger text-center">Your account is already verified!</div>');
			redirect('login/index');
		}
	}
}