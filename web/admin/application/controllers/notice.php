<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';

class Notice extends BaseController
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('notice_model');
        $this->isLoggedIn();   
    }
 
    public function index()
    {
        if($this->isAdmin() == TRUE)
        {
            $this->loadThis();
        }
        else
        {
            $searchText = $this->input->post('searchText');
            $data['searchText'] = $searchText;
            
            $this->load->library('pagination');
            
            $count = $this->notice_model->listingCount($searchText);

            $returns = $this->paginationCompress ( "notice/", $count, 5 );
            
            $data['notices'] = $this->notice_model->listing($searchText, $returns["page"], $returns["segment"]);
            
            $this->global['pageTitle'] = 'OnLabel : Notice';
            
            $this->loadViews("notice", $this->global, $data, NULL);
        }
    }

    function add()
    {
        if($this->isAdmin() == TRUE)
        {
            $this->loadThis();
        }
        else
        {   
            $data = array();
            $this->global['pageTitle'] = 'OnLabel : Add New Notice';

            $this->loadViews("notice_new", $this->global, $data, NULL);
        }
    }

    function addnew()
    {
        if($this->isAdmin() == TRUE)
        {
            $this->loadThis();
        }
        else
        {
            $this->load->library('form_validation');
            
            $this->form_validation->set_rules('subject','Subject','trim|required|max_length[128]|xss_clean');
            $this->form_validation->set_rules('content','Content','trim|required|xss_clean');
            $this->form_validation->set_rules('content_type','Content Type','trim|required|xss_clean');
            $this->form_validation->set_rules('show_yn','Show','trim|required|xss_clean');
            
            $notice_id = $this->input->post('id');

            if($this->form_validation->run() == FALSE)
            {
                if ($notice_id>0) $this->edit($notice_id);
                else $this->addNew();
            }
            else
            {
                $subject = $this->input->post('subject');
                $content = $this->input->post('content');
                $content_type = $this->input->post('content_type');
                $show_yn = $this->input->post('show_yn');
                
                $id = ($this->notice_model->getmaxid()+1);
                $info = array('subject'=>$subject, 
                              'content'=>$content, 
                              'content_type'=>$content_type,
                              'show_yn'=> $show_yn);

                if ($notice_id>0)
                {
                    $info['modified'] = date('Y-m-d H:i:s');
                    $result = $this->notice_model->editnotice($info, $notice_id);

                    if($result > 0)
                    {
                        $this->session->set_flashdata('success', 'Notice updated successfully');
                    }
                    else
                    {
                        $this->session->set_flashdata('error', 'Notice update failed');
                    }
                }
                else 
                {
                    $info['created'] = date('Y-m-d H:i:s');
                    $info['id'] = $id;
                    $result = $this->notice_model->addnewnotice($info);

                    if($result > 0)
                    {
                        $this->session->set_flashdata('success', 'Notice created successfully');
                    }
                    else
                    {
                        $this->session->set_flashdata('error', 'Notice creation failed');
                    }
                }
                
                
                
                redirect('notice');
            }
        }
    }

    function edit($id = NULL)
    {
        if($this->isAdmin() == TRUE)
        {
            $this->loadThis();
        }
        else
        {
            if($id == null)
            {
                redirect('notice');
            }
            
            $data['notice'] = $this->notice_model->getinfo($id);
            
            $this->global['pageTitle'] = 'OnLabel : Edit Notice';
            
            $this->loadViews("notice_edit", $this->global, $data, NULL);
        }
    }

    function editnotice()
    {
        if($this->isAdmin() == TRUE)
        {
            $this->loadThis();
        }
        else
        {
            $this->load->library('form_validation');
            
            $userId = $this->input->post('userId');
            
            $this->form_validation->set_rules('fname','Full Name','trim|required|max_length[128]|xss_clean');
            $this->form_validation->set_rules('email','Email','trim|required|valid_email|xss_clean|max_length[128]');
            $this->form_validation->set_rules('password','Password','matches[cpassword]|max_length[20]');
            $this->form_validation->set_rules('cpassword','Confirm Password','matches[password]|max_length[20]');
            $this->form_validation->set_rules('role','Role','trim|required|numeric');
            $this->form_validation->set_rules('mobile','Mobile Number','required|min_length[10]|xss_clean');
            
            if($this->form_validation->run() == FALSE)
            {
                $this->editOld($userId);
            }
            else
            {
                $name = ucwords(strtolower($this->input->post('fname')));
                $email = $this->input->post('email');
                $password = $this->input->post('password');
                $roleId = $this->input->post('role');
                $mobile = $this->input->post('mobile');
                
                $userInfo = array();
                
                if(empty($password))
                {
                    $userInfo = array('email'=>$email, 'roleId'=>$roleId, 'name'=>$name,
                                    'mobile'=>$mobile, 'updatedBy'=>$this->vendorId, 'updatedDtm'=>date('Y-m-d H:i:s'));
                }
                else
                {
                    $userInfo = array('email'=>$email, 'password'=>getHashedPassword($password), 'roleId'=>$roleId,
                        'name'=>ucwords($name), 'mobile'=>$mobile, 'updatedBy'=>$this->vendorId, 
                        'updatedDtm'=>date('Y-m-d H:i:s'));
                }
                
                $result = $this->user_model->editUser($userInfo, $userId);
                
                if($result == true)
                {
                    $this->session->set_flashdata('success', 'User updated successfully');
                }
                else
                {
                    $this->session->set_flashdata('error', 'User updation failed');
                }
                
                redirect('userListing');
            }
        }
    }

    function delete()
    {
        if($this->isAdmin() == TRUE)
        {
            echo(json_encode(array('status'=>'access')));
        }
        else
        {
            $id = $this->input->post('id');
            
            $result = $this->notice_model->delete($id);
            
            if ($result > 0) { echo(json_encode(array('status'=>TRUE))); }
            else { echo(json_encode(array('status'=>FALSE))); }
        }
    }
}

?>