<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Ebay extends CI_Controller
{
    function __construct() {
		parent::__construct();
        $this->load->helper('ebay');
    }

    public function getSessionId() 
    {   
        $RuName = "Davinci_Tech-DavinciT-DevDAV-qvqch";
        $siteID = 0;
        $verb = 'GetSessionID';
        echo get_ebay_token($siteID,$verb,$RuName);
    }
}
