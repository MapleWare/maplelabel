<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Fb_Authentication extends CI_Controller
{
    function __construct() {
		parent::__construct();
		
		// Load facebook library
		$this->load->library('facebook');
		
		//Load user model
		$this->load->model('fb_model','fb');
		$this->load->model('user_model','user');
    }
    
    public function index(){
		$userData = array();
		
		// Check if user is logged in
		if($this->facebook->is_authenticated()){
			// Get user facebook profile details
			$userProfile = $this->facebook->request('get', '/me?fields=id,first_name,last_name,email,gender,locale,picture');

			//print_r($userProfile);

            // Preparing data for database insertion
            $userData['sn_site'] = 'facebook'; //0-facebook, 1-google, 2-kakao, 3-naver
            $userData['sn_id'] = $userProfile['id'];
            // $userData['first_name'] = $userProfile['first_name'];
            // $userData['last_name'] = $userProfile['last_name'];
            $userData['sn_email'] = $userProfile['email'];
            // $userData['gender'] = $userProfile['gender'];
            // $userData['locale'] = $userProfile['locale'];
            //$userData['sn_profile'] = 'https://www.facebook.com/'.$userProfile['id'];
            //$userData['picture_url'] = $userProfile['picture']['data']['url'];

            //join_way 0-idpw, 1-socialnetwork
            //sn_site = 0-facebook, 1-google, 2-kakao, 3-naver
            //sn_id = $userProfile['id']
            // print_r($userData);  


            $email_exist = $this->user->check_email($userData['sn_email']);
            if ($email_exist != 0)
            {
                $this->session->set_flashdata('msg','<div class="alert alert-danger text-center">Oops! Email associated with your Facebook account is already registered, please try another account.</div>');
                redirect('login');
            }


            // Insert or update user data
            $socialRecord = $this->fb->checkUser($userData);

            //print_r($socialRecord);

            if ($socialRecord['exist'] === TRUE)
            {
            	// just direct login
            	// query ol_users
				//echo 'exist';   
				//$data['userData'] = $userData;
				//$this->session->set_userdata('userData',$userData);
				$sess_data = array('login' => TRUE, 'uname' => 'fbuser', 'uid' => $socialRecord['ol_user_id']);
				$this->session->set_userdata($sess_data);
            }
            else
            {	
            	// add to ol_users first then get id
            	// then add to ol_social_network lastid
            	//echo 'not exist';

            	$users = array();
                $email_trim = explode("@", $userData['sn_email']);
                $users['username'] = 'fbuser-'.$email_trim[0];
            	$users['email'] = $userData['sn_email'];
            	$users['join_way'] = 'socialnetwork';
            	$users['created'] = date("Y-m-d H:i:s");

            	$insertUser = $this->user->insert_user($users);
            	if ($insertUser['success'] === TRUE) {
            		unset($insertUser['success']);
            		$fbuser['ol_user_id'] = $insertUser['id'];
            		$this->fb->update($fbuser, $socialRecord['id']);

            		$sess_data = array('login' => TRUE, 'uname' => 'fbuser', 'uid' => $insertUser['id']);
					$this->session->set_userdata($sess_data);
					

            	} else {
            		echo 'not array';
            	}
            }

   //          die();
			
			// // Check user data insert or update status
   //          if (!empty($userID))
   //          {
   //             $data['userData'] = $userData;
   //             $this->session->set_userdata('userData',$userData);
   //          }
   //          else
   //          {
            	
            	
   //          	$data['userData'] = array();
   //          }

   //          print_r($userData);
			
			// Get logout URL
			$data['logoutUrl'] = $this->facebook->logout_url();
		}else{
            $fbuser = '';
			
			// Get login URL
            $data['authUrl'] =  $this->facebook->login_url();
        }
		//print_r($this->session->all_userdata());
		//die();

		// Load login & profile view
        //$this->load->view('profile/index',$data);
        redirect("profile/index");
    }

	public function logout() {
		// Remove local Facebook session
		$this->facebook->destroy_session();
		// Remove user data from session
		$this->session->unset_userdata('userData');
		// Redirect to login page
        redirect('/login');
    }
}
