<?php

set_time_limit(0);
include(dirname(__FILE__) . '/ebayFunctions.php');
require_once(dirname(__FILE__) . '/../config/AppManager.php');
require_once(dirname(__FILE__) . '/../config/country_code.php');
$pm = AppManager::getPM();


$sales_order_id = $_REQUEST["sales_order_id"];

$sql_list = "SELECT sc.user_token, so.id, so.delivery_status, so.sc_ordered_id  "
                ." FROM sales_order so inner join sales_channel sc on so.sales_channel_id = sc.id "
                ." where so.id = ".$sales_order_id;
$sales_list = $pm->fetchResult($sql_list);

foreach ($sales_list as $rows) {

	$user_token = $rows['user_token'];
	$sales_order_id = $rows['id'];
	$delivery_status = $rows['delivery_status'];
	$sc_ordered_id = $rows['sc_ordered_id'];

	if ( $delivery_status != "shipped" ) {
		$response = completeSaleRequest($sc_ordered_id, $user_token);
		$xmlArray = new SimpleXMLElement($response);

		if ($xmlArray->Ack == 'Success' || $xmlArray->Ack == 'Warning') {
			//echo 'The item has been Shipped.' . '<br>';
			echo '';
		$sql = "UPDATE sales_order SET delivery_status = 'shipped' where id = '".$sales_order_id."'";
		$pm->executeQuery($sql);
		} else {
			foreach ($xmlArray->Errors as $error) {
				if ($error->SeverityCode == 'Error') {
					$errorMsg = $error->SeverityCode . ' : ' . $error->LongMessage;
					echo $errorMsg . '<br>';
				}
			}
		}

	}
}

?>
