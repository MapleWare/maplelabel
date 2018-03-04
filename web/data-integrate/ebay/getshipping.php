<?php

set_time_limit(0);
include(dirname(__FILE__) . '/ebayFunctions.php');
require_once(dirname(__FILE__) . '/../config/AppManager.php');
require_once(dirname(__FILE__) . '/../config/country_code.php');
$pm = AppManager::getPM();


$sales_order_id = $_REQUEST["sales_order_id"];
$ol_user_id = $_REQUEST["ol_user_id"];


$sql_list = "SELECT sc.user_token, so.id, so.delivery_status, so.sc_ordered_id  "
                ." FROM sales_order so inner join sales_channel sc on so.sales_channel_id = sc.id "
                //." where so.id = ".$sales_order_id." and so.delivery_status = 'beforedelivery' ";
                ." where so.ol_user_id = ".$ol_user_id." and so.delivery_status = 'beforedelivery' ";
$sales_list = $pm->fetchResult($sql_list);

foreach ($sales_list as $rows) {

	$user_token = $rows['user_token'];
	$sales_order_id = $rows['id'];
	$delivery_status = $rows['delivery_status'];
	$sc_ordered_id = $rows['sc_ordered_id'];

	$response = getshipping($sc_ordered_id, $user_token);
	$xmlArray = new SimpleXMLElement($response);

	$xml = simplexml_load_string($response);
	$ordersfull = $xml->OrderArray->Order;

	if (isset($ordersfull)) {
		foreach ($ordersfull as $orders) {
			$OrderID = addslashes((string) $orders->OrderID);
			$ShippedTime = addslashes((string) $orders->ShippedTime);
		}
	}

	if ( strlen($ShippedTime) > 18 ) {
		$sql = "UPDATE sales_order SET delivery_status = 'shipped' where id = '".$sales_order_id."'";
		$pm->executeQuery($sql);
	}

}



?>
