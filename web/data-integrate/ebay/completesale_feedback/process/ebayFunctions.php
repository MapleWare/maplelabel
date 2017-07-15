<?php

include('keys.php');

function completeSaleRequest($orderId) {

    global $token;

    $requestXmlBody = '<?xml version="1.0" encoding="utf-8"?>
                    <CompleteSaleRequest xmlns="urn:ebay:apis:eBLBaseComponents">
                        <OrderID>' . $orderId . '</OrderID>
                        <Shipped>true</Shipped>
                        <RequesterCredentials>
                          <eBayAuthToken>' . $token . '</eBayAuthToken>
                        </RequesterCredentials>
                        <WarningLevel>High</WarningLevel>
                    </CompleteSaleRequest>';

    $response = callEbayAPI($requestXmlBody, "CompleteSale");
    return $response;
}

function getItemsAwaitingFeedbackRequest($page) {

    global $token;

    $requestXmlBody = '<?xml version="1.0" encoding="utf-8"?>
                        <GetItemsAwaitingFeedbackRequest xmlns="urn:ebay:apis:eBLBaseComponents">
                            <Pagination>
                               <EntriesPerPage>200</EntriesPerPage>
                               <PageNumber>' . $page . '</PageNumber>
                            </Pagination>
                            <RequesterCredentials>
                              <eBayAuthToken>' . $token . '</eBayAuthToken>
                            </RequesterCredentials>
                            <WarningLevel>High</WarningLevel>
                        </GetItemsAwaitingFeedbackRequest>';

    $response = callEbayAPI($requestXmlBody, "GetItemsAwaitingFeedback");
    return $response;
}

function callEbayAPI($post_data, $call_name) {


    global $COMPATIBILITYLEVEL, $DEVNAME, $APPNAME, $CERTNAME, $SiteId, $eBayAPIURL;

    $ebayapiheader = array(
        "X-EBAY-API-COMPATIBILITY-LEVEL: $COMPATIBILITYLEVEL",
        "X-EBAY-API-DEV-NAME: $DEVNAME",
        "X-EBAY-API-APP-NAME: $APPNAME",
        "X-EBAY-API-CERT-NAME: $CERTNAME",
        "X-EBAY-API-SITEID: $SiteId",
        "X-EBAY-API-CALL-NAME: " . $call_name);

    $ch = curl_init();
    $res = curl_setopt($ch, CURLOPT_URL, $eBayAPIURL);


    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);

    curl_setopt($ch, CURLOPT_HEADER, 0); // 0 = Don't give me the return header
    curl_setopt($ch, CURLOPT_HTTPHEADER, $ebayapiheader); // Set this for eBayAPI
    curl_setopt($ch, CURLOPT_POST, 1); // POST Method
    curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data); //My XML Request
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    $body = curl_exec($ch); //Send the request

    curl_close($ch); // Close the connection

    return $body;
}
