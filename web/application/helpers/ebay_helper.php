<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if (!function_exists('get_ebay_token'))
{
   function get_ebay_token($siteID, $verb, $RuName)
   {
       $ci=&get_instance();
       $ci->load->config('ebay');

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

        return $SessionID;
   }
}