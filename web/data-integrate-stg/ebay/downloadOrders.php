<?php

set_time_limit(0);
include(dirname(__FILE__) . '/ebayFunctions.php');
require_once(dirname(__FILE__) . '/../config/AppManager.php');
require_once(dirname(__FILE__) . '/../config/country_code.php');
$pm = AppManager::getPM();

$days = 3;

$s_ol_user_id = $_REQUEST["s_ol_user_id"];

$sql_sales_list = "SELECT id as sales_channel_id, sc_market, sc_user_id, user_token, ol_user_id "
                ." FROM sales_channel "
                ." where status = 'authorized' "
                ." and sc_market = 'ebay' ";
if ($s_ol_user_id != "" && $s_ol_user_id != "0" ) 
    $sql_sales_list = $sql_sales_list." and ol_user_id = '".$s_ol_user_id."'";
    
$sales_channel_list = $pm->fetchResult($sql_sales_list);

$i = 1;
$newordercnt = 0;
$currencyCode = "USD";

foreach ($sales_channel_list as $rows) {

    $sales_channel_id = $rows['sales_channel_id'];
    $user_token = $rows['user_token'];
    if ( $user_token == "TEMP" ) // debugging code
        $token = 'AgAAAA**AQAAAA**aAAAAA**DkY6WQ**nY+sHZ2PrBmdj6wVnY+sEZ2PrA2dj6wFk4GkCpKAqAudj6x9nY+seQ**cjgEAA**AAMAAA**k0oRPEgxjN9iwUqk1GrjGnz8PwOev+LX9VzJuPNrExDz8+DvEp/mlIU88Kc7bYNC3cQvUg4HsoX3qO0niqguWqWwJ77mj5e/4uJ+aCvzCesh6zotuVxmJJMUyhL2w8lItDh4fYANmV0I+Ff+i8gvY2A9P3HSa1NmZvzFrAz9bbssV+/Xi0X3hP7VQE7BtAyRQnfel3kjM5MOvhUsJDEC8cjDR8qG2dpqMEoW80AFRKO8m8nPbQANqbFK5g9RDZhQuwvojyyLtIwmcOXWs+IXhnVlZ+FPzlwwM6iouRyWNDB0OL7os8B/TqmOVqO4JoxZ1iBc4HBEy6E4trSrNOuwOkyN0iaac7r0txoZ7OP1jbpTfWSrRzplwfNYXRZDsWPgubKtK9W4ib8KH50RBxqsws2Ku9rJhqctH5LkTtowUvKWf8dImAj24FzJeYRSCc1oAHp/EuzQ7xWQxkDEobPeF14Dlsd46lMxfqDyj1WZ+FoKq42yr9Eo0vlMg5LIF0k8gb9Hh5FzPKdiphcOVmNz8DUXkRHqE6SgIcBsvKg7Mx5Uzc1ugkXbhBUmMqwGz8JoOFYX/IIx9HyvaNI/Gl17MTgquT9eoKhOSM9g9f6H1qMpgZcnnLFV1dVBeWm9G+XYrJrEe7HOW7Fp9+mG8NmrApsBupWnw87Uimu14mqNUQNcIjQ6VU/tCbXJK3rXMMEAAK9nIxtxcnDjxmhsk8Tomwh7W2nAaoxBS9erUU6pQSm2KOvXdmVUj9vd6I3k9MEU';
    else
        $token = $user_token;

    $ol_user_id = $rows['ol_user_id'];

    $responseXml_page = getorder(1, $days);

    $xml_page = simplexml_load_string($responseXml_page);
    $tot_page = $xml_page->PaginationResult->TotalNumberOfPages;
    for ($page = 1; $page <= $tot_page; $page++) {

        $requestXmlBody = getorder($page, $days);
        $xml = simplexml_load_string($requestXmlBody);
        $ordersfull = $xml->OrderArray->Order;
    //    print_r($ordersfull); 
    //    die;
        if (isset($ordersfull)) {
            foreach ($ordersfull as $orders) {
    //            $order_id = explode('-', $orders->OrderID);
    //            $orderid = $order_id[0];
                $last_insert_id_sales_order = 0;

                $addedTime = date('Y-m-d h:m:i');
                $currencyCode = $orders->AmountPaid["currencyID"];
                //echo "currencyCode:";
                //echo $currencyCode;
                //echo "<br>";
                $OrderID = addslashes((string) $orders->OrderID);
                $OrderStatus = addslashes((string) $orders->OrderStatus);
                $PaidTime = addslashes((string) $orders->PaidTime);
                $AdjustmentAmount = addslashes((string) $orders->AdjustmentAmount);
                $AmountPaid = addslashes((string) $orders->AmountPaid);
                $AmountSaved = addslashes((string) $orders->AmountSaved);
                $CreatedTime = addslashes((string) $orders->CreatedTime);
                $PaymentMethods = addslashes(implode(',', (array) $orders->PaymentMethods));
                $SellerEmail = addslashes((string) $orders->SellerEmail);
                $Name = addslashes((string) $orders->ShippingAddress->Name);
                $Street1 = addslashes((string) $orders->ShippingAddress->Street1);
                $Street2 = addslashes((string) $orders->ShippingAddress->Street2);
                $CityName = addslashes((string) $orders->ShippingAddress->CityName);
                $StateOrProvince = addslashes((string) $orders->ShippingAddress->StateOrProvince);
                $CountryName = addslashes((string) $orders->ShippingAddress->CountryName);
                $Phone = addslashes((string) $orders->ShippingAddress->Phone);
		if ( $Phone == "Invalid Request" ) 
			$Phone = "";

                $PostalCode = addslashes((string) $orders->ShippingAddress->PostalCode);
                $ExternalAddressID = addslashes((string) $orders->ShippingAddress->ExternalAddressID);
                $ShippingService = addslashes((string) $orders->ShippingServiceSelected->ShippingService);
                $ShippingServiceCost = addslashes((string) $orders->ShippingServiceSelected->ShippingServiceCost);
                $Subtotal = addslashes((string) $orders->Subtotal);
                $Total = addslashes((string) $orders->Total);
                $Total_Currency = $currencyCode;
                
                $BuyerUserID = addslashes((string) $orders->BuyerUserID);


                $org_status = "";
                $valid_cnt = 0;
                $order_valid_cnt_sql = 'select count(EbayOrderDatasId) as valid_cnt from EbayOrderDetails where `OrderID`="' . $OrderID . '"';
                //echo $order_valid_cnt_sql ;
                //echo "<br>";

                $resultListValidCnt = $pm->fetchResult($order_valid_cnt_sql);

                foreach ($resultListValidCnt as $rowsCnt) {
                    $valid_cnt = $rowsCnt['valid_cnt'];
                }

                //echo $valid_cnt;
                //echo "<br>";
                //echo "<br>";

                if ($valid_cnt == 0) {
                    
                    $sql = "REPLACE INTO `EbayOrderDetails` (`OrderID`, `OrderStatus`, `AdjustmentAmount`, `AmountPaid`, `AmountSaved`, `CreatedTime`, `PaymentMethods`,"
                            . " `SellerEmail`, `Name`, `Street1`, `Street2`, `CityName`, `StateOrProvince`,`CountryName`, `Phone`, `PostalCode`,`ExternalAddressID`,"
                            . "`ShippingService`, `ShippingServiceCost`, `Subtotal`, `Total`,`BuyerUserID`,`AddedTime`)";
                    $sql .= "VALUES('$OrderID', '$OrderStatus', '$AdjustmentAmount', '$AmountPaid','$AmountSaved','$CreatedTime','$PaymentMethods','$SellerEmail'"
                            . ",'$Name', '$Street1', '$Street2', '$CityName','$StateOrProvince','$CountryName','$Phone','$PostalCode','$ExternalAddressID','$ShippingService'"
                            . ",'$ShippingServiceCost', '$Subtotal', '$Total','$BuyerUserID','$addedTime');";

                //echo $sql ;
                //echo "<br>";
                                            
                    $itemOrderDetailsId = $pm->executeQuery($sql);
                    
                    $newordercnt++;

                    if ( $OrderStatus == "Completed" ) {

                        $sql = "REPLACE INTO sales_order "
                            ." ( "
                            ." `ol_user_id`, "
                            ." `sales_channel_id`, "
                            ." `sc_ordered_id`, "
                            ." `ordered_date`, "
                            ." `order_user_name`, "
                            ." `paid_amount`, "
                            ." `paid_amount_currency`) "
                            ." VALUES "
                            ." (".$ol_user_id.", "
                            ." ".$sales_channel_id.", "
                            ." '".$OrderID."', "
                            ." '".getDatetimeFromEbay($CreatedTime)."', " // getTimestampFromEbay(
                            ." '".$Name."', "
                            ." '".$Total."', "
                            ." '".$Total_Currency."')";

                        $last_insert_id_sales_order = $pm->executeQuery($sql);


                        $sql = "REPLACE INTO sales_order_ship_to ( "
                            ." `sales_order_id`, "
                            ." `address_owner`, "
                            ." `city_name`, "
                            ." `country_code`, "
                            ." `country_name`, "
                            ." `name`, "
                            ." `postal_code`, "
                            ." `stateorprovince`, "
                            ." `street1`, "
                            ." `street2`, "
                            ." `phone_no`) "
                            ." VALUES "
                            ." ( "
                            ." '".$last_insert_id_sales_order."',"
                            ." '".$Name."', "
                            ." '".$CityName."', "
                            ." '".$ISO_CODE[strtoupper($CountryName)]."', "
                            ." '".$CountryName."', "
                            ." '".$Name."', "
                            ." '".$PostalCode."', "
                            ." '".$StateOrProvince."', "
                            ." '".$Street1."', "
                            ." '".$Street2."', "
                            ." '".$Phone."'  "
                            ." ) ";
                //echo $sql ;
                //echo "<br>";

                        $last_insert_id_sales_order_ship_to = $pm->executeQuery($sql);



                        $sql = "REPLACE INTO `sales_order_ship_from` "
                            ." ( "
                            ." `sales_order_id`, "
                            ." `seller_company_name`, "
                            ." `seller_country`, "
                            ." `seller_first_name`, "
                            ." `seller_last_name`, "
                            ." `seller_street1`, "
                            ." `seller_street2`, "
                            ." `seller_postal_code`, "
                            ." `city`, "
                            ." `stateorprovice`, "
                            ." `phone_no`) "
                            ." SELECT  "
                            ." ".$last_insert_id_sales_order.", "
                            ." companyname, "
                            ." country, "
                            ." first_name, "
                            ." last_name, "
                            ." street1, "
                            ." street2, "
                            ." postal_code, "
                            ." city, "
                            ." stateorprovice, "
                            ." companyphone "
                            ." FROM ol_company "
                            ." WHERE ol_user_id =  ".$ol_user_id;
                //echo $sql ;
                //echo "<br>";

                        $last_insert_id_sales_order_ship_from = $pm->executeQuery($sql);                        

                    }

                    $items = $orders->TransactionArray->Transaction;

                    $paid_item_cnt = 0;
                    foreach ($items as $item) {
                        $BuyerEmail = addslashes((string) $item->Buyer->Email);
                        $UserFirstName = addslashes((string) $item->Buyer->UserFirstName);
                        $UserLastName = addslashes((string) $item->Buyer->UserLastName);
                        $SellingManagerSalesRecordNumber = addslashes((string) $item->ShippingDetails->SellingManagerSalesRecordNumber);
                        $CreatedDate = addslashes((string) $item->CreatedDate);
                        $QuantityPurchased = addslashes((string) $item->QuantityPurchased);
                        $PaymentHoldStatus = addslashes((string) $item->Status->PaymentHoldStatus);
                        $TransactionID = addslashes((string) $item->TransactionID);
                        $TransactionPrice = addslashes((string) $item->TransactionPrice);
                        $TransactionSiteID = addslashes((string) $item->TransactionSiteID);
                        $Platform = addslashes((string) $item->Platform);
                        $OrderLineItemID = addslashes((string) $item->OrderLineItemID);
                        $GuaranteedShipping = addslashes((string) $item->GuaranteedShipping);
                        $ItemID = addslashes((string) $item->Item->ItemID);
                        $Site = addslashes((string) $item->Item->Site);
                        $Title = addslashes((string) $item->Item->Title);
                        $ConditionID = addslashes((string) $item->Item->ConditionID);
                        $ConditionDisplayName = addslashes((string) $item->Item->ConditionDisplayName);

			if ( $BuyerEmail == "Invalid Request" ) 
				$BuyerEmail = "";

                        $sql_item = "INSERT INTO `EbayItemDetails` (`itemOrderDetailsId`, `ItemID`, `Site`, `Title`,`ConditionID`, `ConditionDisplayName`, "
                                . "`BuyerEmail`, `UserFirstName`,`UserLastName`, `SellingManagerSalesRecordNumber`,`CreatedDate`,`QuantityPurchased`,"
                                . "`PaymentHoldStatus`,`TransactionID`,`TransactionPrice`,`TransactionSiteID`,`Platform`,`OrderLineItemID`,`GuaranteedShipping`)";
                        $sql_item .= "VALUES($itemOrderDetailsId,'$ItemID', '$Site', '$Title', '$ConditionID','$ConditionDisplayName','$BuyerEmail','$UserFirstName',"
                                . "'$UserLastName','$SellingManagerSalesRecordNumber','$CreatedDate','$QuantityPurchased','$PaymentHoldStatus',"
                                . "'$TransactionID','$TransactionPrice','$TransactionSiteID','$Platform','$OrderLineItemID','$GuaranteedShipping');";
                        
                //echo $sql_item ;
                //echo "<br>";
                        
                        $pm->executeQuery($sql_item);
                        
                        if ( $last_insert_id_sales_order != 0 ) {

                            $sql = "REPLACE INTO sales_order_ship_item "
                            ." (`sales_order_id`, "
                            ." `item_id`, "
                            ." `item_name`, "
                            /*
                            ." `item_weight`, "
                            ." `item_weight_unit`, "
                            ." `item_depth`, "
                            ." `item_depth_unit`, "
                            ." `item_length`, "
                            ." `item_length_unit`, "
                            ." `item_width`, "
                            ." `item_width_unit`, "
                            */
                            ." `item_price`, "
                            ." `item_price_currency`, "
                            ." `item_count`) "
                            ." VALUES "
                            ." ('".$last_insert_id_sales_order."', "
                            ." '".$ItemID."', "
                            ." '".$Title."', "
                            /*
                            ." '".addslashes((string) $item->ShippingDetails->CalculatedShippingRate->WeightMajor)."', "
                            ." '".addslashes((string) $item->ShippingDetails->CalculatedShippingRate->WeightMajor['unit'])."', "
                            ." '".addslashes((string) $item->ShippingDetails->CalculatedShippingRate->PackageDepth)."', "
                            ." '".addslashes((string) $item->ShippingDetails->CalculatedShippingRate->PackageDepth['unit'])."', "
                            ." '".addslashes((string) $item->ShippingDetails->CalculatedShippingRate->PackageLength)."', "
                            ." '".addslashes((string) $item->ShippingDetails->CalculatedShippingRate->PackageLength['unit'])."', "
                            ." '".addslashes((string) $item->ShippingDetails->CalculatedShippingRate->PackageWidth)."', "
                            ." '".addslashes((string) $item->ShippingDetails->CalculatedShippingRate->PackageWidth['unit'])."', "
                            */
                            ." '".$TransactionPrice."', "
                            ." '".$currencyCode."', "
                            ." '".$QuantityPurchased."') ";


                //echo $sql ;
                //echo "<br>";

                            $pm->executeQuery($sql);

                            $paid_item_cnt++;
                        }

                        //echo $sql_item;
                        
			$sql = "UPDATE sales_order so SET so.order_title = '".$Title."', so.order_sync_update_id = 0, paid_item_cnt = ( select sum( item_count ) from sales_order_ship_item sosi where so.id = sosi.sales_order_id ), so.feedback_point = 0 where so.sc_ordered_id = '".$OrderID."'";


                //echo $sql ;
                //echo "<br>";

                        $pm->executeQuery($sql);

                        //echo $sql;

                    }

                } else { // existing record

                    $order_when_existed = 'select * from EbayOrderDetails where `OrderID`="' . $OrderID . '"';
                    $result = $pm->fetchResult($order_when_existed);
                    //echo $order_when_existed;
                    //echo "TEST";

                    foreach ($result as $rows2) {
                        $org_status = $rows2['OrderStatus'];
                    } 
                    //echo $org_status;
			//echo "<br>";

                    //foreach ($result as $rows) {

                    //    $org_status = $rows['OrderStatus'];

                        if ($org_status == "Active" && $OrderStatus == "Completed" ) {


                            // From here, there is duplicated code with above.

                            $sql = "REPLACE INTO `EbayOrderDetails` (`OrderID`, `OrderStatus`, `AdjustmentAmount`, `AmountPaid`, `AmountSaved`, `CreatedTime`, `PaymentMethods`,"
                                    . " `SellerEmail`, `Name`, `Street1`, `Street2`, `CityName`, `StateOrProvince`,`CountryName`, `Phone`, `PostalCode`,`ExternalAddressID`,"
                                    . "`ShippingService`, `ShippingServiceCost`, `Subtotal`, `Total`,`BuyerUserID`,`AddedTime`)";
                            $sql .= "VALUES('$OrderID', '$OrderStatus', '$AdjustmentAmount', '$AmountPaid','$AmountSaved','$CreatedTime','$PaymentMethods','$SellerEmail'"
                                    . ",'$Name', '$Street1', '$Street2', '$CityName','$StateOrProvince','$CountryName','$Phone','$PostalCode','$ExternalAddressID','$ShippingService'"
                                    . ",'$ShippingServiceCost', '$Subtotal', '$Total','$BuyerUserID','$addedTime');";

                        //echo $sql ;
                        //echo "<br>";
                                                    
                            $itemOrderDetailsId = $pm->executeQuery($sql);
                            
                            $newordercnt++;

                            if ( $OrderStatus == "Completed" ) {

                                $sql = "REPLACE INTO sales_order "
                                    ." ( "
                                    ." `ol_user_id`, "
                                    ." `sales_channel_id`, "
                                    ." `sc_ordered_id`, "
                                    ." `ordered_date`, "
                                    ." `order_user_name`, "
                                    ." `paid_amount`, "
                                    ." `paid_amount_currency`) "
                                    ." VALUES "
                                    ." (".$ol_user_id.", "
                                    ." ".$sales_channel_id.", "
                                    ." '".$OrderID."', "
                                    ." '".getDatetimeFromEbay($CreatedTime)."', " // getTimestampFromEbay(
                                    ." '".$Name."', "
                                    ." '".$Total."', "
                                    ." '".$Total_Currency."')";

                                $last_insert_id_sales_order = $pm->executeQuery($sql);


                                $sql = "REPLACE INTO sales_order_ship_to ( "
                                    ." `sales_order_id`, "
                                    ." `address_owner`, "
                                    ." `city_name`, "
                                    ." `country_code`, "
                                    ." `country_name`, "
                                    ." `name`, "
                                    ." `postal_code`, "
                                    ." `stateorprovince`, "
                                    ." `street1`, "
                                    ." `street2`, "
                                    ." `phone_no`) "
                                    ." VALUES "
                                    ." ( "
                                    ." '".$last_insert_id_sales_order."',"
                                    ." '".$Name."', "
                                    ." '".$CityName."', "
                                    ." '".$ISO_CODE[strtoupper($CountryName)]."', "
                                    ." '".$CountryName."', "
                                    ." '".$Name."', "
                                    ." '".$PostalCode."', "
                                    ." '".$StateOrProvince."', "
                                    ." '".$Street1."', "
                                    ." '".$Street2."', "
                                    ." '".$Phone."'  "
                                    ." ) ";
                        //echo $sql ;
                        //echo "<br>";

                                $last_insert_id_sales_order_ship_to = $pm->executeQuery($sql);



                                $sql = "REPLACE INTO `sales_order_ship_from` "
                                    ." ( "
                                    ." `sales_order_id`, "
                                    ." `seller_company_name`, "
                                    ." `seller_country`, "
                                    ." `seller_first_name`, "
                                    ." `seller_last_name`, "
                                    ." `seller_street1`, "
                                    ." `seller_street2`, "
                                    ." `seller_postal_code`, "
                                    ." `city`, "
                                    ." `stateorprovice`, "
                                    ." `phone_no`) "
                                    ." SELECT  "
                                    ." ".$last_insert_id_sales_order.", "
                                    ." companyname, "
                                    ." country, "
                                    ." first_name, "
                                    ." last_name, "
                                    ." street1, "
                                    ." street2, "
                                    ." postal_code, "
                                    ." city, "
                                    ." stateorprovice, "
                                    ." companyphone "
                                    ." FROM ol_company "
                                    ." WHERE ol_user_id =  ".$ol_user_id;
                        //echo $sql ;
                        //echo "<br>";

                                $last_insert_id_sales_order_ship_from = $pm->executeQuery($sql);                        

                            }

                            $items = $orders->TransactionArray->Transaction;

                            $paid_item_cnt = 0;
                            foreach ($items as $item) {
                                $BuyerEmail = addslashes((string) $item->Buyer->Email);
                                $UserFirstName = addslashes((string) $item->Buyer->UserFirstName);
                                $UserLastName = addslashes((string) $item->Buyer->UserLastName);
                                $SellingManagerSalesRecordNumber = addslashes((string) $item->ShippingDetails->SellingManagerSalesRecordNumber);
                                $CreatedDate = addslashes((string) $item->CreatedDate);
                                $QuantityPurchased = addslashes((string) $item->QuantityPurchased);
                                $PaymentHoldStatus = addslashes((string) $item->Status->PaymentHoldStatus);
                                $TransactionID = addslashes((string) $item->TransactionID);
                                $TransactionPrice = addslashes((string) $item->TransactionPrice);
                                $TransactionSiteID = addslashes((string) $item->TransactionSiteID);
                                $Platform = addslashes((string) $item->Platform);
                                $OrderLineItemID = addslashes((string) $item->OrderLineItemID);
                                $GuaranteedShipping = addslashes((string) $item->GuaranteedShipping);
                                $ItemID = addslashes((string) $item->Item->ItemID);
                                $Site = addslashes((string) $item->Item->Site);
                                $Title = addslashes((string) $item->Item->Title);
                                $ConditionID = addslashes((string) $item->Item->ConditionID);
                                $ConditionDisplayName = addslashes((string) $item->Item->ConditionDisplayName);

				if ( $BuyerEmail == "Invalid Request" ) 
					$BuyerEmail = "";

                                $sql_item = "INSERT INTO `EbayItemDetails` (`itemOrderDetailsId`, `ItemID`, `Site`, `Title`,`ConditionID`, `ConditionDisplayName`, "
                                        . "`BuyerEmail`, `UserFirstName`,`UserLastName`, `SellingManagerSalesRecordNumber`,`CreatedDate`,`QuantityPurchased`,"
                                        . "`PaymentHoldStatus`,`TransactionID`,`TransactionPrice`,`TransactionSiteID`,`Platform`,`OrderLineItemID`,`GuaranteedShipping`)";
                                $sql_item .= "VALUES($itemOrderDetailsId,'$ItemID', '$Site', '$Title', '$ConditionID','$ConditionDisplayName','$BuyerEmail','$UserFirstName',"
                                        . "'$UserLastName','$SellingManagerSalesRecordNumber','$CreatedDate','$QuantityPurchased','$PaymentHoldStatus',"
                                        . "'$TransactionID','$TransactionPrice','$TransactionSiteID','$Platform','$OrderLineItemID','$GuaranteedShipping');";
                                
                        //echo $sql_item ;
                        //echo "<br>";
                                
                                $pm->executeQuery($sql_item);
                                
                                if ( $last_insert_id_sales_order != 0 ) {

                                    $sql = "REPLACE INTO sales_order_ship_item "
                                    ." (`sales_order_id`, "
                                    ." `item_id`, "
                                    ." `item_name`, "
                                    /*
                                    ." `item_weight`, "
                                    ." `item_weight_unit`, "
                                    ." `item_depth`, "
                                    ." `item_depth_unit`, "
                                    ." `item_length`, "
                                    ." `item_length_unit`, "
                                    ." `item_width`, "
                                    ." `item_width_unit`, "
                                    */
                                    ." `item_price`, "
                                    ." `item_price_currency`, "
                                    ." `item_count`) "
                                    ." VALUES "
                                    ." ('".$last_insert_id_sales_order."', "
                                    ." '".$ItemID."', "
                                    ." '".$Title."', "
                                    /*
                                    ." '".addslashes((string) $item->ShippingDetails->CalculatedShippingRate->WeightMajor)."', "
                                    ." '".addslashes((string) $item->ShippingDetails->CalculatedShippingRate->WeightMajor['unit'])."', "
                                    ." '".addslashes((string) $item->ShippingDetails->CalculatedShippingRate->PackageDepth)."', "
                                    ." '".addslashes((string) $item->ShippingDetails->CalculatedShippingRate->PackageDepth['unit'])."', "
                                    ." '".addslashes((string) $item->ShippingDetails->CalculatedShippingRate->PackageLength)."', "
                                    ." '".addslashes((string) $item->ShippingDetails->CalculatedShippingRate->PackageLength['unit'])."', "
                                    ." '".addslashes((string) $item->ShippingDetails->CalculatedShippingRate->PackageWidth)."', "
                                    ." '".addslashes((string) $item->ShippingDetails->CalculatedShippingRate->PackageWidth['unit'])."', "
                                    */
                                    ." '".$TransactionPrice."', "
                                    ." '".$currencyCode."', "
                                    ." '".$QuantityPurchased."') ";


                        //echo $sql ;
                        //echo "<br>";

                                    $pm->executeQuery($sql);

                                    $paid_item_cnt++;
                                }

                                //echo $sql_item;
                                
                                $sql = "UPDATE sales_order so SET so.order_title = '".$Title."', so.order_sync_update_id = 0, paid_item_cnt = ( select sum( item_count ) from sales_order_ship_item sosi where so.id = sosi.sales_order_id ), so.feedback_point = 0 where so.sc_ordered_id = '".$OrderID."'";

                        //echo $sql ;
                        //echo "<br>";

                                $pm->executeQuery($sql);

                                //echo $sql;

                            }
                        }    

                    //} // foreach ($result as $rows) {


                }
            }
        }
    }
}
echo $newordercnt;


$sql_order_list = "SELECT so.id as sales_order_id, so.sc_ordered_id, sc.user_token "
                ." FROM sales_order so inner join sales_channel sc on so.sales_channel_id = sc.id "
                ." where sc.sc_market = 'ebay' and so.feedback_status = 'n' ";
if ($s_ol_user_id != "" && $s_ol_user_id != "0" ) 
    $sql_order_list = $sql_order_list." and so.ol_user_id = '".$s_ol_user_id."'";
    
$sales_order_list_for_feedback = $pm->fetchResult($sql_order_list);


foreach ($sales_order_list_for_feedback as $rows) {

    $sales_order_id = $rows['sales_order_id'];
    $orderId = $rows['sc_ordered_id'];
    $user_token = $rows['user_token'];
    //$orderId = "162420660644-1575481261006";

    $responseXML = getItemsAwaitingFeedbackRequest(1, $user_token);

    $orders = array();
    try {
        $response = new SimpleXMLElement($responseXML);

        foreach ($response->ItemsAwaitingFeedback->TransactionArray->Transaction as $transaction) {
            $orders[] = (string) $transaction->OrderLineItemID;
        }

        $pages = (int) $response->ItemsAwaitingFeedback->PaginationResult->TotalNumberOfPages;
        for ($page = 2; $page <= $pages; $page++) {
            try {
                $responseXML = getItemsAwaitingFeedbackRequest($page, $user_token);
                $response = new SimpleXMLElement($responseXML);

                foreach ($response->ItemsAwaitingFeedback->TransactionArray->Transaction as $transaction) {
                    $orders[] = (string) $transaction->OrderLineItemID;
                }
            } catch (Exception $ex) {
                
            }
        }
    } catch (Exception $ex) {
        
    }

    if (in_array($orderId, $orders)) {
//        echo "No";
    } else {
        $sql = "UPDATE sales_order SET feedback_status = 'y' where sc_ordered_id = '".$orderId."'";
        $pm->executeQuery($sql);
//        echo "Yes";
    }
}




// Shipping status ( delivery_status ) update
$sql_list_ship = "SELECT sc.user_token, so.id, so.delivery_status, so.sc_ordered_id  "
                ." FROM sales_order so inner join sales_channel sc on so.sales_channel_id = sc.id "
                ." WHERE so.delivery_status = 'beforedelivery' ";
if ($s_ol_user_id != "" && $s_ol_user_id != "0" ) 
    $sql_list_ship = $sql_list_ship." and so.ol_user_id = '".$s_ol_user_id."' ";
$sales_list_ship = $pm->fetchResult($sql_list_ship);

foreach ($sales_list_ship as $rows_ship) {

        $user_token_ship = $rows_ship['user_token'];
        $sales_order_id_ship = $rows_ship['id'];
        $delivery_status_ship = $rows_ship['delivery_status'];
        $sc_ordered_id_ship = $rows_ship['sc_ordered_id'];

        $responseShip = getshipping($sc_ordered_id_ship, $user_token_ship);

        $xmlShip = simplexml_load_string($responseShip);
        $ordersfullShip = $xmlShip->OrderArray->Order;

        if (isset($ordersfullShip)) {
                foreach ($ordersfullShip as $ordersShip) {
                        $OrderID = addslashes((string) $ordersShip->OrderID);
                        $ShippedTime = addslashes((string) $ordersShip->ShippedTime);
                }
        }

        if ( strlen($ShippedTime) > 18 ) {
                $sql = "UPDATE sales_order SET delivery_status = 'shipped' where id = '".$sales_order_id_ship."'";
                $pm->executeQuery($sql);
        }

}





?>
