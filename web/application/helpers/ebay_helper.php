<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if (!function_exists('get_ebay_session'))
{
   function get_ebay_session($siteID, $RuName)
   {
       $ci=&get_instance();
       $ci->load->config('ebay');

       $verb = 'GetSessionID';
       $params = array('userRequestToken'=>$ci->config->item('userToken'), 
                        'developerID'=>$ci->config->item('devID'),
                        'applicationID'=>$ci->config->item('appID'),
                        'certificateID'=>$ci->config->item('certID'),
                        'serverUrl'=>$ci->config->item('serverUrl'),
                        'compatabilityLevel'=>$ci->config->item('compatabilityLevel'),
                        'siteToUseID'=>$siteID, 
                        'callName'=>$verb);
        $ci->load->library('ebaylibrary',$params);

        $requestXmlBody  = '<?xml version="1.0" encoding="utf-8" ?>';
        $requestXmlBody .= '<GetSessionIDRequest xmlns="urn:ebay:apis:eBLBaseComponents">';
        $requestXmlBody .= "<Version>{$ci->config->item('compatabilityLevel')}</Version>";
        $requestXmlBody .= "<RuName>{$RuName}</RuName>";
        $requestXmlBody .= '</GetSessionIDRequest>';
        $responseXml = $ci->ebaylibrary->sendHttpRequest($requestXmlBody);

        if (stristr($responseXml, 'HTTP 404') || $responseXml == '')
        die ('<P>Error sending request');

        $responseDoc = new DomDocument();
        $responseDoc->loadXML($responseXml);
        $responses = $responseDoc->getElementsByTagName("GetSessionIDResponse");

        foreach ($responses as $response)
        {
            $acks = $response->getElementsByTagName("Ack");
            $ack   = $acks->item(0)->nodeValue;
            $SessionIDs = $response->getElementsByTagName("SessionID");
            $SessionID = $SessionIDs->item(0)->nodeValue;
        }
        //print_r($ci->session->all_userdata());
        $ci->session->set_userdata('ebay_session', $SessionID);
        //return $SessionID;
   }
}

if (!function_exists('get_ebay_token'))
{
   function get_ebay_token($siteID, $verb, $RuNamem, $sessionID)
   {
       $ci=&get_instance();
       $ci->load->config('ebay');
       $verb = 'FetchToken';
       $params = array('userRequestToken'=>$ci->config->item('userToken'), 
                        'developerID'=>$ci->config->item('devID'),
                        'applicationID'=>$ci->config->item('appID'),
                        'certificateID'=>$ci->config->item('certID'),
                        'serverUrl'=>$ci->config->item('serverUrl'),
                        'compatabilityLevel'=>$ci->config->item('compatabilityLevel'),
                        'siteToUseID'=>$siteID, 
                        'callName'=>$verb);
        $ci->load->library('ebaylibrary',$params);

        $requestXmlBody  = '<?xml version="1.0" encoding="utf-8" ?>';
        $requestXmlBody .= '<FetchTokenRequest xmlns="urn:ebay:apis:eBLBaseComponents">';
        $requestXmlBody .= "<Version>{$ci->config->item('compatabilityLevel')}</Version>";
        $requestXmlBody .= "<SessionID>{$sessionID}</SessionID>";
        $requestXmlBody .= '</FetchTokenRequest>';
        $responseXml = $ci->ebaylibrary->sendHttpRequest($requestXmlBody);

        if (stristr($responseXml, 'HTTP 404') || $responseXml == '')
        die ('<P>Error sending request');

        $responseDoc = new DomDocument();
        $responseDoc->loadXML($responseXml);
        $responses = $responseDoc->getElementsByTagName("FetchTokenResponse");

        $Token = '';
        foreach ($responses as $response)
        {
            $acks = $response->getElementsByTagName("Ack");
            $ack   = $acks->item(0)->nodeValue;
            $Tokens = $response->getElementsByTagName("eBayAuthToken");
            $Token = @$Tokens->item(0)->nodeValue;
        }

        return $Token;
   }
}

if (!function_exists('get_ebay_userid'))
{
   function get_ebay_userid($siteID)
   {
        $ci=&get_instance();
        $ci->load->config('ebay');
        $ci->load->library('session');
        $ci->load->database();
        $ci->load->model('saleschannel_model','saleschannel');

        $verb = 'GetUserProfile';
        $sc_details = $ci->saleschannel->get_user_channel($ci->session->userdata('uid'));
        $ebay_token = $sc_details['user_token'];

        $params = array('userRequestToken'=>$ebay_token, 
                        'developerID'=>$ci->config->item('devID'),
                        'applicationID'=>$ci->config->item('appID'),
                        'certificateID'=>$ci->config->item('certID'),
                        'serverUrl'=>$ci->config->item('serverUrl'),
                        'compatabilityLevel'=>'967',
                        'siteToUseID'=>$siteID, 
                        'callName'=>$verb);
        $ci->load->library('ebaylibrary',$params);


        
        $requestXmlBody  = '<?xml version="1.0" encoding="utf-8" ?>';
        $requestXmlBody .= '<GetUserProfileRequest xmlns="urn:ebay:apis:eBLBaseComponents">
  
                              <UserID>domeldon</UserID>
                            </GetUserProfileRequest>';

        //http://open.api.ebay.com/shopping?callname=GetUserProfile&responseencoding=XML&appid=Maplewar-9b5a-4329-8900-5702016d1fe3&siteid=0&version=967&UserID=harrypoter


        // $requestXmlBody .= "<Version>{$ci->config->item('compatabilityLevel')}</Version>";
        // $requestXmlBody .= "<SessionID>{$sessionid}</SessionID>";
        // $requestXmlBody .= '</GetSellerListRequest>';
        $responseXml = $ci->ebaylibrary->sendHttpRequest($requestXmlBody);

        print_r($responseXml);

        if (stristr($responseXml, 'HTTP 404') || $responseXml == '')
        die ('<P>Error sending request');

        $responseDoc = new DomDocument();
        $responseDoc->loadXML($responseXml);
        $responses = $responseDoc->getElementsByTagName("FetchTokenResponse");

        $userID = '';
        foreach ($responses as $response)
        {
            $acks = $response->getElementsByTagName("Ack");
            $ack   = $acks->item(0)->nodeValue;
            $userIDs = $response->getElementsByTagName("eBayAuthToken");
            $userID = @$userIDs->item(0)->nodeValue;
        }

        return $userID;
   }
}

if (!function_exists('save_user_token'))
{
   function save_user_token($siteID, $RuName)
   {
        $ci=&get_instance();
        $ci->load->helper(array('url','html','ebay'));
        $ci->load->library('session');
        $ci->load->database();
        $ci->load->model('saleschannel_model','saleschannel');

        $sessionid = $ci->session->userdata('ebay_session');
        $ebay_token = get_ebay_token($siteID, 'FetchToken', $RuName, $sessionid);

        if (empty($ebay_token))
            return false;

        $ci->session->set_userdata('ebay_token', $ebay_token);

        $user_channel = $ci->saleschannel->get_user_channel($ci->session->userdata('uid'));
        
        if ($ci->session->userdata('ebay_setting_new_token') == 'create') :
            $ci->session->unset_userdata('ebay_setting_new_token');
            $ci->saleschannel->create(array('ol_user_id'=>$ci->session->userdata('uid'),
                                            'sc_name'=>'Ebay',
                                            'sc_market'=>'ebay',
                                            'status'=>'authorized',
                                            'user_token'=>$ci->session->userdata('ebay_token'),
                                            'sc_user_id'=>$_GET['username']));
            return true;

        elseif ($ci->session->userdata('ebay_setting_new_token') > 0) :
            $ci->saleschannel->edit_specific(array('user_token'=>$ci->session->userdata('ebay_token'),'sc_user_id'=>$_GET['username']),$ci->session->userdata('ebay_setting_new_token'));
            $ci->session->unset_userdata('ebay_setting_new_token');
            return true;
        endif;


        if (empty($user_channel))
            $ci->saleschannel->create(array('ol_user_id'=>$ci->session->userdata('uid'),
                                            'sc_name'=>'Ebay',
                                            'sc_market'=>'ebay',
                                            'status'=>'authorized',
                                            'user_token'=>$ci->session->userdata('ebay_token'),
                                            'sc_user_id'=>$_GET['username']));
        else
            $ci->saleschannel->edit(array('user_token'=>$ci->session->userdata('ebay_token'),'sc_user_id'=>$_GET['username']),$ci->session->userdata('uid'));

        return true;
    }
}

