<?php

//die; 
set_time_limit(0);
// ebay Config Files start
include(dirname(__FILE__) . '/ebay/ebayFunctions.php');
require_once(dirname(__FILE__) . '/config/AppManager.php');
$pm = AppManager::getPM();

// ebay Config Files end
// Amazon Config start
require_once(dirname(__FILE__) . '/amazon/.config.inc.php');
require_once(dirname(__FILE__) . '/amazon/../config/keys/keys.php');
require_once(dirname(__FILE__) . '/amazon/ListOrdersClass.php');
require_once(dirname(__FILE__) . '/amazon/ListOrderItemsClass.php');
require_once(dirname(__FILE__) . '/amazon/ListOrdersByNextTokenClass.php');
require_once(dirname(__FILE__) . '/amazon/amazonFunctions.php');
// Amazon Config End
// ebay function start
$days = 3;
$responseXml_page = getorder(1, $days);
$xml_page = simplexml_load_string($responseXml_page);
$tot_page = $xml_page->PaginationResult->TotalNumberOfPages;
for ($page = 1; $page <= $tot_page; $page++) {
    $requestXmlBody = getorder($page, $days);
    $xml = simplexml_load_string($requestXmlBody);
    $ordersfull = $xml->OrderArray->Order;
    if (isset($ordersfull)) {
        foreach ($ordersfull as $orders) {
            $OrderID = addslashes((string) $orders->OrderID);
            $OrderStatus = addslashes((string) $orders->OrderStatus);
            $order_valid = 'select * from EbayOrderDetails where `OrderID`="' . $OrderID . '"';
            $result = $pm->fetchResult($order_valid);
            if (!empty($result)) {
                $sql = "update EbayOrderDetails set orderStatus='$OrderStatus' where OrderID='$OrderID'";
                $pm->executeQuery($sql);
            }
        }
    }
}
// ebay function end  

listAmazonOrders('-3 days', 'Update');

function updateAmazonStatus($orders, $marketPlaceId, $sellerId, $service, $siteid) {
    global $pm;
    foreach ($orders as $order) {
        $AmazonOrderId = addslashes($order->AmazonOrderId);
        $OrderStatus = addslashes($order->OrderStatus);
        $order_valid = 'select * from AmazonOrderDetails where `AmazonOrderId`="' . $AmazonOrderId . '"';
        $result = $pm->fetchResult($order_valid);
        if (!empty($result)) {
            $orederd_details = "update AmazonOrderDetails set OrderStatus='$OrderStatus' where AmazonOrderId='$AmazonOrderId'";
            $pm->executeQuery($orederd_details);
        }
    }
}

?>