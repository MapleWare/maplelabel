<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Ebay extends CI_Controller
{
    function __construct() {
		parent::__construct();
        $this->load->helper(array('url','html','ebay'));
        $this->load->library('session');
        $this->load->database();
        $this->load->model('Saleschannel_model','saleschannel');
    }

    public function getSessionId() 
    {   
        $RuName = ""; //"Davinci_Tech-DavinciT-DevDAV-qvqch";
        $siteID = 0;
        $verb = 'GetSessionID';
        echo get_ebay_session($siteID,$RuName);
    }

    public function getToken()
    {
        $RuName = ""; //"Davinci_Tech-DavinciT-DevDAV-qvqch";
        $siteID = 0;

        $sessionid = $this->session->userdata('ebay_session');
        $ebay_token = get_ebay_token($siteID, $RuName, $sessionid);

        //if (empty($ebay_token))
        //{
        //    redirect('saleschannel/index');
        //}

        $this->session->set_userdata('ebay_token', $ebay_token);
        // $this->session->userdata('ebay_token');
        $this->saleschannel->edit (array('user_token'=>$this->session->userdata('ebay_token')),1);
    }

    public function showToken()
    {
        $RuName = "";
        $siteID = 0;
        $sessionid = $this->session->userdata('ebay_session');
        $ebay_token = get_ebay_token($siteID, 'FetchToken', $RuName, $sessionid);

        if (strlen($ebay_token)>0)
            echo $ebay_token;
        else 
            echo 'no token retrieve yet, please login to ebay first';
    }
}
