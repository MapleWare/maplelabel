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
        $ci->saleschannel->edit(array('user_token'=>$ci->session->userdata('ebay_token')),1);
        return true;
    }
}

