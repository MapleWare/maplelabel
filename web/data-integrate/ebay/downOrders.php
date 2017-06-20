<?php

set_time_limit(0);
include(dirname(__FILE__) . '/ebayFunctions.php');
require_once(dirname(__FILE__) . '/../config/AppManager.php');
$pm = AppManager::getPM();

$days = 12;

$sql_sales_list = "SELECT sc_market, sc_user_id, user_token, ol_user_id FROM onlabelspilotdev.sales_channel where status = 'authorized'";
$sales_channel_list = $pm->fetchResult($sql_sales_list);

$i = 1;

foreach ($sales_channel_list as $rows) {

    $user_token = $rows['user_token'];
    if ( $user_token == "TEMP" ) // debugging code
        $token = 'AgAAAA**AQAAAA**aAAAAA**DkY6WQ**nY+sHZ2PrBmdj6wVnY+sEZ2PrA2dj6wFk4GkCpKAqAudj6x9nY+seQ**cjgEAA**AAMAAA**k0oRPEgxjN9iwUqk1GrjGnz8PwOev+LX9VzJuPNrExDz8+DvEp/mlIU88Kc7bYNC3cQvUg4HsoX3qO0niqguWqWwJ77mj5e/4uJ+aCvzCesh6zotuVxmJJMUyhL2w8lItDh4fYANmV0I+Ff+i8gvY2A9P3HSa1NmZvzFrAz9bbssV+/Xi0X3hP7VQE7BtAyRQnfel3kjM5MOvhUsJDEC8cjDR8qG2dpqMEoW80AFRKO8m8nPbQANqbFK5g9RDZhQuwvojyyLtIwmcOXWs+IXhnVlZ+FPzlwwM6iouRyWNDB0OL7os8B/TqmOVqO4JoxZ1iBc4HBEy6E4trSrNOuwOkyN0iaac7r0txoZ7OP1jbpTfWSrRzplwfNYXRZDsWPgubKtK9W4ib8KH50RBxqsws2Ku9rJhqctH5LkTtowUvKWf8dImAj24FzJeYRSCc1oAHp/EuzQ7xWQxkDEobPeF14Dlsd46lMxfqDyj1WZ+FoKq42yr9Eo0vlMg5LIF0k8gb9Hh5FzPKdiphcOVmNz8DUXkRHqE6SgIcBsvKg7Mx5Uzc1ugkXbhBUmMqwGz8JoOFYX/IIx9HyvaNI/Gl17MTgquT9eoKhOSM9g9f6H1qMpgZcnnLFV1dVBeWm9G+XYrJrEe7HOW7Fp9+mG8NmrApsBupWnw87Uimu14mqNUQNcIjQ6VU/tCbXJK3rXMMEAAK9nIxtxcnDjxmhsk8Tomwh7W2nAaoxBS9erUU6pQSm2KOvXdmVUj9vd6I3k9MEU';
    else
        $token = $user_token;

    $ol_user_id = $rows['ol_user_id'];

    $responseXml_page = getorder(1, $days);
    echo $responseXml_page;
    

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
                echo "CityName";
                echo $CityName;
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

                $PaidTime = $orders->PaidTime;
                $SellerEmail = $orders->SellerEmail;
                $SellerUserID = $orders->SellerUserID;
                $ShippedTime = $orders->ShippedTime;
                $ShippingAddress_AddressAttribute = $orders->ShippingAddress->AddressAttribute;
                $ShippingAddress_AddressID = $orders->ShippingAddress->AddressID;
                $ShippingAddress_AddressOwner = $orders->ShippingAddress->AddressOwner;
                $ShippingAddress_AddressUsage = $orders->ShippingAddress->AddressUsage;
                $ShippingAddress_CityName = $orders->ShippingAddress->CityName;
                $ShippingAddress_Country = $orders->ShippingAddress->Country;
                $ShippingAddress_CountryName = $orders->ShippingAddress->CountryName;
                $ShippingAddress_Name = $orders->ShippingAddress->Name;

                //print_r("print_r");

                //print_r($ShippingAddress_Name);

                echo $ShippingAddress_Name;
                $ShippingAddress_Phone = $orders->ShippingAddress->Phone;
                $ShippingAddress_PostalCode = $orders->ShippingAddress->PostalCode;
                $ShippingAddress_StateOrProvince = $orders->ShippingAddress->StateOrProvince;
                $ShippingAddress_Street1 = $orders->ShippingAddress->Street1;
                $ShippingAddress_Street2 = $orders->ShippingAddress->Street2;
                $totalamount = $orders->AmountPaid;
                $ShippingService = $orders->ShippingServiceSelected->ShippingService;
                $ShippingServiceCost = $orders->ShippingServiceSelected->ShippingServiceCost;
                $payment_methods = $orders->PaymentMethods;
                $AdjustmentAmount = $orders->AdjustmentAmount;
                $AmountSaved = $orders->AmountSaved;
                $Subtotal = $orders->Subtotal;
                $Total = $orders->Total;
                $PaidTime = $orders->PaidTime;
                $purchaseddate = $orders->CheckoutStatus->LastModifiedTime;
                $name = $orders->ShippingAddress->Name;
                $Street1 = $orders->ShippingAddress->Street1;
                $Street2 = $orders->ShippingAddress->Street2;
                $CityName = $orders->ShippingAddress->CityName;
                $StateOrProvince = $orders->ShippingAddress->StateOrProvince;
                $Country = $orders->ShippingAddress->Country;
                $CountryName = $orders->ShippingAddress->CountryName;
                $Phone = $orders->ShippingAddress->Phone;
                $PostalCode = $orders->ShippingAddress->PostalCode;
                $Subtotal_Amount = $orders->$Subtotal;
                $Subtotal_CurrencyID = $orders->$Subtotal['currencyID'];
                $Total_Amount = $orders->$Total;
                $Total_CurrencyID = $orders->$Total['CurrencyID'];


                $order_valid = "select * from EbayOrderDetails where `OrderID`= '". $OrderID ."'";

                $result = $pm->fetchResult($order_valid);
                if (empty($result)) {

                    // INSERT INTO EbayOrderDetails
                    $sql = "INSERT INTO `EbayOrderDetails` (`OrderID`, `OrderStatus`, `AdjustmentAmount`, `AmountPaid`, `AmountSaved`, `CreatedTime`, `PaymentMethods`,"
                            . " `SellerEmail`, `Name`, `Street1`, `Street2`, `CityName`, `StateOrProvince`,`CountryName`, `Phone`, `PostalCode`,`ExternalAddressID`,"
                            . "`ShippingService`, `ShippingServiceCost`, `Subtotal`, `Total`,`BuyerUserID`,`AddedTime`)";
                    $sql .= "VALUES('$OrderID', '$OrderStatus', '$AdjustmentAmount', '$AmountPaid','$AmountSaved','$CreatedTime','$PaymentMethods','$SellerEmail'"
                            . ",'$Name', '$Street1', '$Street2', '$CityName','$StateOrProvince','$CountryName','$Phone','$PostalCode','$ExternalAddressID','$ShippingService'"
                            . ",'$ShippingServiceCost', '$Subtotal', '$Total','$BuyerUserID','$addedTime');";
                    $itemOrderDetailsId = $pm->executeQuery($sql);


                    // REPLACE INTO ebay_Order

                    $sql = "REPLACE INTO `ebay_Order`  "
                        ." (  "
                        ." `ol_user_id`,  "
                        ." `OrderID`,  "
                        ." `BuyerUserID`,  "
                        ." `OrderStatus`,  "
                        ." `PaidTime`,  "
                        ." `SellerEmail`,  "
                        ." `SellerUserID`,  "
                        ." `ShippedTime`,  "
                        ." `ShippingAddress_AddressAttribute`,  "
                        ." `ShippingAddress_AddressID`,  "
                        ." `ShippingAddress_AddressOwner`,  "
                        ." `ShippingAddress_AddressUsage`,  "
                        ." `ShippingAddress_CityName`,  "
                        ." `ShippingAddress_Country`,  "
                        ." `ShippingAddress_CountryName`,  "
                        ." `ShippingAddress_Name`,  "
                        ." `ShippingAddress_Phone`,  "
                        ." `ShippingAddress_PostalCode`,  "
                        ." `ShippingAddress_StateOrProvince`,  "
                        ." `ShippingAddress_Street1`,  "
                        ." `ShippingAddress_Street2`,  "
                        ." `Subtotal_Amount`,  "
                        ." `Subtotal_Currency`,  "
                        ." `Total_Amount`,  "
                        ." `Total_Currency`  )  "
                        ." VALUES  "
                        ." (  "
                        ." ".$ol_user_id.",  "
                        ." '".$OrderID."',  "
                        ." '".$BuyerUserID."',  "
                        ." '".$OrderStatus."',  "
                        ." '".getTimestampFromEbay($PaidTime)."',  "
                        ." '".$SellerEmail."',  "
                        ." '".$SellerUserID."',  "
                        ." '".getTimestampFromEbay($ShippedTime)."',  "
                        ." '".$ShippingAddress->AddressAttribute['type']."',  "
                        ." '".$ShippingAddress->AAddressID."',  "
                        ." '".$ShippingAddress->AAddressOwner."',  "
                        ." '".$ShippingAddress->AAddressUsage."',  "
                        ." '".$ShippingAddress->ACityName."',  "
                        ." '".$ShippingAddress->ACountry."',  "
                        ." '".$ShippingAddress->ACountryName."',  "
                        ." '".$ShippingAddress->AName."',  "
                        ." '".$ShippingAddress->APhone."',  "
                        ." '".$ShippingAddress->PostalCode."',  "
                        ." '".$ShippingAddress->StateOrProvince."',  "
                        ." '".$ShippingAddress->Street1."',  "
                        ." '".$ShippingAddress->Street2."',  "
                        ." '".$Subtotal."',  "
                        ." '".$Subtotal_CurrencyID."',  "
                        ." '".$Total_Amount."',  "
                        ." '".$Total_CurrencyID."') ";

                    $last_insert_id_ebay_Order = $pm->executeQuery($sql);




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


                        $title = $items->Item->Title;
                        $qty = $items->QuantityPurchased;
                        $condition = $items->Item->ConditionDisplayName;
                        $price = $items->TransactionPrice;
                        $taxamount = $items->Taxes->TotalTaxAmount;
                                                
                        $sql_item = "INSERT INTO `EbayItemDetails` (`itemOrderDetailsId`, `ItemID`, `Site`, `Title`,`ConditionID`, `ConditionDisplayName`, "
                                . "`BuyerEmail`, `UserFirstName`,`UserLastName`, `SellingManagerSalesRecordNumber`,`CreatedDate`,`QuantityPurchased`,"
                                . "`PaymentHoldStatus`,`TransactionID`,`TransactionPrice`,`TransactionSiteID`,`Platform`,`OrderLineItemID`,`GuaranteedShipping`)";
                        $sql_item .= "VALUES($itemOrderDetailsId,'$ItemID', '$Site', '$Title', '$ConditionID','$ConditionDisplayName','$BuyerEmail','$UserFirstName',"
                                . "'$UserLastName','$SellingManagerSalesRecordNumber','$CreatedDate','$QuantityPurchased','$PaymentHoldStatus',"
                                . "'$TransactionID','$TransactionPrice','$TransactionSiteID','$Platform','$OrderLineItemID','$GuaranteedShipping');";
                        $pm->executeQuery($sql_item);

                        $sql_transaction = "REPLACE INTO `ebay_Transaction` ( "
                        ."  `OrderID`, "
                        ."  `TransactionID`, "
                        ."  `Buyer_Email`, "
                        ."  `Buyer_UserFirstName`, "
                        ."  `Buyer_UserLastName`, "
                        ."  `Transaction_CreatedDate`, "
                        ."  `RecipientEmail`, "
                        ."  `RecipientName`, "
                        ."  `Sender_Email`, "
                        ."  `Sender_Name`, "
                        ."  `FeeOrCreditAmount`, "
                        ."  `FeeOrCreditAmount_Currency`, "
                        ."  `PaymentOrRefundAmount`, "
                        ."  `PaymentOrRefundAmount_Currency`, "
                        ."  `ItemID`, "
                        ."  `SKU`, "
                        ."  `Title`, "
                        ."  `Payment_ReferenceID`, "
                        ."  `RefundStatus`, "
                        ."  `RefundAmount`, "
                        ."  `RefundAmount_Currency`, "
                        ."  `RefundTime`, "
                        ."  `TotalShippingCost`, "
                        ."  `TotalShippingCost_Currency`, "
                        ."  `ShippingTimeMax`, "
                        ."  `ShippingTimeMin`, "
                        ."  `ShipTo_AddressID`, "
                        ."  `ShipTo_AddressOwner`, "
                        ."  `ShipTo_CityName`, "
                        ."  `ShipTo_Country`, "
                        ."  `ShipTo_CountryName`, "
                        ."  `ShipTo_Name`, "
                        ."  `ShipTo_Phone`, "
                        ."  `ShipTo_PostalCode`, "
                        ."  `ShipTo_ReferenceID`, "
                        ."  `ShipTo_StateOrProvince`, "
                        ."  `ShipTo_Street1`, "
                        ."  `ShipTo_Street2`, "
                        ."  `OrderLineItemID`, "
                        ."  `PaidTime`, "
                        ."  `ebay_Order_id`) "
                        ."  VALUES ( "
                        ."  '".$OrderID."', "
                        ."  '".$items->TransactionID."', "
                        ."  '".$items->Buyer->Email."', "
                        ."  '".$items->Buyer->UserFirstName."', "
                        ."  '".$items->Buyer->UserLastName."', "
                        ."  '".getTimestampFromEbay( $items->CreatedDate )."', "
                        ."  '".$items->DigitalDeliverySelected->DeliveryDetails->Recipient->Email."', "
                        ."  '".$items->DigitalDeliverySelected->DeliveryDetails->Recipient->Name."', "
                        ."  '".$items->DigitalDeliverySelected->DeliveryDetails->Sender->Email."', "
                        ."  '".$items->DigitalDeliverySelected->DeliveryDetails->Sender->Name."', "
                        ."  '".$items->MoneytaryDetails->Payments->Payment->FeeOrCreditAmount."', "
                        ."  '".$items->MoneytaryDetails->Payments->Payment->FeeOrCreditAmount_Currency."', "
                        ."  '".$items->ExternalTransaction->PaymentOrRefundAmount."', "
                        ."  '".$items->ExternalTransaction->PaymentOrRefundAmount_Currency."', "
                        ."  '".$items->Item->ItemID."', "
                        ."  '".$items->Item->SKU."', "
                        ."  '".$items->Item->Title."', "
                        ."  '".$items->MonetaryDetails->Payments->Payment->PaymentReferenceID."', "
                        ."  '".$items->MonetaryDetails->Refunds->Refund->RefundStatus."', "
                        ."  '".$items->MonetaryDetails->Refunds->Refund->RefundAmount."', "
                        ."  '".$items->MonetaryDetails->Refunds->Refund->RefundAmount_Currency."', "
                        ."  '".getTimestampFromEbay($items->MonetaryDetails->Refunds->Refund->RefundTime)."', "
                        ."  '".$items->MultiLegShippingDetails->SellerShipmentToLogisticsProvider->ShippingServiceDetails->TotalShippingCost."', "
                        ."  '".$items->MultiLegShippingDetails->SellerShipmentToLogisticsProvider->ShippingServiceDetails->TotalShippingCost_Currency."', "
                        ."  '".$items->MultiLegShippingDetails->SellerShipmentToLogisticsProvider->ShippingTimeMax."', "
                        ."  '".$items->MultiLegShippingDetails->SellerShipmentToLogisticsProvider->ShippingTimeMin."', "
                        ."  '".$items->MultiLegShippingDetails->SellerShipmentToLogisticsProvider->ShipToAddress->AddressID."', "
                        ."  '".$items->MultiLegShippingDetails->SellerShipmentToLogisticsProvider->ShipToAddress->AddressOwner."', "
                        ."  '".$items->MultiLegShippingDetails->SellerShipmentToLogisticsProvider->ShipToAddress->CityName."', "
                        ."  '".$items->MultiLegShippingDetails->SellerShipmentToLogisticsProvider->ShipToAddress->Country."', "
                        ."  '".$items->MultiLegShippingDetails->SellerShipmentToLogisticsProvider->ShipToAddress->CountryName."', "
                        ."  '".$items->MultiLegShippingDetails->SellerShipmentToLogisticsProvider->ShipToAddress->Name."', "
                        ."  '".$items->MultiLegShippingDetails->SellerShipmentToLogisticsProvider->ShipToAddress->Phone."', "
                        ."  '".$items->MultiLegShippingDetails->SellerShipmentToLogisticsProvider->ShipToAddress->PostalCode."', "
                        ."  '".$items->MultiLegShippingDetails->SellerShipmentToLogisticsProvider->ShipToAddress->ReferenceID."', "
                        ."  '".$items->MultiLegShippingDetails->SellerShipmentToLogisticsProvider->ShipToAddress->StateOrProvince."', "
                        ."  '".$items->MultiLegShippingDetails->SellerShipmentToLogisticsProvider->ShipToAddress->Street1."', "
                        ."  '".$items->MultiLegShippingDetails->SellerShipmentToLogisticsProvider->ShipToAddress->Street2."', "
                        ."  '".$items->OrderLineItemID."', "
                        ."  '".getTimestampFromEbay($items->PaidTime)."', "
                        ."  '".$last_insert_id_ebay_Order."') ";
                        $sql_lasitemst_insert_id_ebay_Transaction = $pm->executeQuery($sql_transaction);


                        echo $sql_transaction;
                        echo "<br>";
                        

                        $requestXmlBodyForItem = getitem($transaction->TransactionID, $transaction->Item->ItemID);
                        $xmlForItem = simplexml_load_string($requestXmlBodyForItem);
                        $itemObj = $xmlForItem->Item;
                        /*
                        if (isset($itemObj)) {
                            itemObj
                        }
                        */
                        $sql_item = "REPLACE INTO `onlabelspilotdev`.`ebay_Item` "
                        ."  ( "
                        ."  `OrderId`, "
                        ."  `TransactionID`, "
                        ."  `ItemID`, "
                        ."  `SellerCompanyName`, "
                        ."  `SellerCounty`, "
                        ."  `SellerFirstName`, "
                        ."  `SellerLastName`, "
                        ."  `SellerPhone2AreaOrCityCode`, "
                        ."  `SellerPhone2CountryCode`, "
                        ."  `SellerPhone2CountryPrefix`, "
                        ."  `SellerPhone2LocalNumber`, "
                        ."  `SellerPhoneAreaOrCityCode`, "
                        ."  `SellerPhoneCountryCode`, "
                        ."  `SellerPhoneCountryPrefix`, "
                        ."  `SellerPhoneLocalNumber`, "
                        ."  `SellerStreet1`, "
                        ."  `SellerStreet2`, "
                        ."  `ebay_Transaction_id`, "
                        ."  `ShippingPackageDepth`, "
                        ."  `ShippingPackageDepthUnit`, "
                        ."  `ShippingPackageLength`, "
                        ."  `ShippingPackageLengthUnit`, "
                        ."  `ShippingPackageWidth`, "
                        ."  `ShippingPackageWidthUnit`, "
                        ."  `ShippingPackageWeightMajor`, "
                        ."  `ShippingPackageWeightMajorUnit`, "
                        ."  `ShippingPackageWeightMinor`, "
                        ."  `ShippingPackageWeightMinorUnit`, "
                        ."  `SKU` ) "
                        ."  VALUES "
                        ."  ( "
                        ."  '".$OrderId."' "
                        ."  '".$transaction->TransactionID."' "
                        ."  '".$transaction->ItemID."' "
                        ."  '".$transaction->SellerCompanyName."' "
                        ."  '".$itemObj->SellerContactDetails->County."' "
                        ."  '".$itemObj->SellerContactDetails->FirstName."' "
                        ."  '".$itemObj->SellerContactDetails->LastName."' "
                        ."  '".$itemObj->SellerContactDetails->Phone2AreaOrCityCode."' "
                        ."  '".$itemObj->SellerContactDetails->Phone2CountryCode."' "
                        ."  '".$itemObj->SellerContactDetails->Phone2CountryPrefix."' "
                        ."  '".$itemObj->SellerContactDetails->Phone2LocalNumber."' "
                        ."  '".$itemObj->SellerContactDetails->PhoneAreaOrCityCode."' "
                        ."  '".$itemObj->SellerContactDetails->PhoneCountryCode."' "
                        ."  '".$itemObj->SellerContactDetails->PhoneCountryPrefix."' "
                        ."  '".$itemObj->SellerContactDetails->PhoneLocalNumber."' "
                        ."  '".$itemObj->SellerContactDetails->Street1."' "
                        ."  '".$itemObj->SellerContactDetails->Street2."' "
                        ."  '".$ebay_Transaction_id."' "
                        ."  '".$itemObj->ShippingPackageDetails->PackageDepth."' "
                        ."  '".$itemObj->ShippingPackageDetails->PackageDepth['unit']."' "
                        ."  '".$itemObj->ShippingPackageDetails->PackageLength."' "
                        ."  '".$itemObj->ShippingPackageDetails->PackageLength['unit']."' "
                        ."  '".$itemObj->ShippingPackageDetails->PackageWidth."' "
                        ."  '".$itemObj->ShippingPackageDetails->PackageWidth['unit']."' "
                        ."  '".$itemObj->ShippingPackageDetails->PackageWeightMajor."' "
                        ."  '".$itemObj->ShippingPackageDetails->PackageWeightMajor['unit']."' "
                        ."  '".$itemObj->ShippingPackageDetails->PackageWeightMinor."' "
                        ."  '".$itemObj->ShippingPackageDetails->PackageWeightMinor['unit']."' "
                        ."  '".$itemObj->SKU."') ";



                    }
                }
            }
        }
    }
}    
?>