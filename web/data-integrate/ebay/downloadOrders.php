<?php

set_time_limit(0);
include(dirname(__FILE__) . '/ebayFunctions.php');
require_once(dirname(__FILE__) . '/../config/AppManager.php');
$pm = AppManager::getPM();

$days = 2;
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
            $addedTime = date('Y-m-d h:m:i');
            $OrderID = addslashes((string) $orders->OrderID);
            $OrderStatus = addslashes((string) $orders->OrderStatus);
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
            $PostalCode = addslashes((string) $orders->ShippingAddress->PostalCode);
            $ExternalAddressID = addslashes((string) $orders->ShippingAddress->ExternalAddressID);
            $ShippingService = addslashes((string) $orders->ShippingServiceSelected->ShippingService);
            $ShippingServiceCost = addslashes((string) $orders->ShippingServiceSelected->ShippingServiceCost);
            $Subtotal = addslashes((string) $orders->Subtotal);
            $Total = addslashes((string) $orders->Total);
            $BuyerUserID = addslashes((string) $orders->BuyerUserID);
            $order_valid = 'select * from EbayOrderDetails where `OrderID`="' . $OrderID . '"';
            $result = $pm->fetchResult($order_valid);
            if (empty($result)) {
                $sql = "INSERT INTO `EbayOrderDetails` (`OrderID`, `OrderStatus`, `AdjustmentAmount`, `AmountPaid`, `AmountSaved`, `CreatedTime`, `PaymentMethods`,"
                        . " `SellerEmail`, `Name`, `Street1`, `Street2`, `CityName`, `StateOrProvince`,`CountryName`, `Phone`, `PostalCode`,`ExternalAddressID`,"
                        . "`ShippingService`, `ShippingServiceCost`, `Subtotal`, `Total`,`BuyerUserID`,`AddedTime`)";
                $sql .= "VALUES('$OrderID', '$OrderStatus', '$AdjustmentAmount', '$AmountPaid','$AmountSaved','$CreatedTime','$PaymentMethods','$SellerEmail'"
                        . ",'$Name', '$Street1', '$Street2', '$CityName','$StateOrProvince','$CountryName','$Phone','$PostalCode','$ExternalAddressID','$ShippingService'"
                        . ",'$ShippingServiceCost', '$Subtotal', '$Total','$BuyerUserID','$addedTime');";
                $itemOrderDetailsId = $pm->executeQuery($sql);
                $items = $orders->TransactionArray->Transaction;
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
                    $sql_item = "INSERT INTO `EbayItemDetails` (`itemOrderDetailsId`, `ItemID`, `Site`, `Title`,`ConditionID`, `ConditionDisplayName`, "
                            . "`BuyerEmail`, `UserFirstName`,`UserLastName`, `SellingManagerSalesRecordNumber`,`CreatedDate`,`QuantityPurchased`,"
                            . "`PaymentHoldStatus`,`TransactionID`,`TransactionPrice`,`TransactionSiteID`,`Platform`,`OrderLineItemID`,`GuaranteedShipping`)";
                    $sql_item .= "VALUES($itemOrderDetailsId,'$ItemID', '$Site', '$Title', '$ConditionID','$ConditionDisplayName','$BuyerEmail','$UserFirstName',"
                            . "'$UserLastName','$SellingManagerSalesRecordNumber','$CreatedDate','$QuantityPurchased','$PaymentHoldStatus',"
                            . "'$TransactionID','$TransactionPrice','$TransactionSiteID','$Platform','$OrderLineItemID','$GuaranteedShipping');";
                    $pm->executeQuery($sql_item);
                }
            }
        }
    }
}
?>