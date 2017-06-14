<?php

set_time_limit(0);
require_once(dirname(__FILE__) . '/.config.inc.php');
require_once(dirname(__FILE__) . '/../config/keys/keys.php');
require_once(dirname(__FILE__) . '/ListOrdersClass.php');
require_once(dirname(__FILE__) . '/ListOrderItemsClass.php');
require_once(dirname(__FILE__) . '/ListOrdersByNextTokenClass.php');
require_once(dirname(__FILE__) . '/amazonFunctions.php');
require_once(dirname(__FILE__) . '/../config/AppManager.php');
$pm = AppManager::getPM();

listAmazonOrders('-2 days', 'Store');

function storeAmazonOrder($orders, $marketPlaceId, $sellerId, $service, $siteid) {
    global $pm;
    foreach ($orders as $order) {
        $addedTime = date('Y-m-d h:m:i');
        $AmazonOrderId = addslashes($order->AmazonOrderId);
        $PurchaseDate = addslashes($order->PurchaseDate);
        $LastUpdateDate = addslashes($order->LastUpdateDate);
        $OrderStatus = addslashes($order->OrderStatus);
        $FulfillmentChannel = addslashes($order->FulfillmentChannel);
        $SalesChannel = addslashes($order->SalesChannel);
        $ShipServiceLevel = addslashes($order->ShipServiceLevel);
        $Name = addslashes($order->ShippingAddress->Name);
        $AddressLine1 = addslashes($order->ShippingAddress->AddressLine1);
        $AddressLine2 = addslashes($order->ShippingAddress->AddressLine2);
        $City = addslashes($order->ShippingAddress->City);
        $StateOrRegion = addslashes($order->ShippingAddress->StateOrRegion);
        $PostalCode = addslashes($order->ShippingAddress->PostalCode);
        $CountryCode = addslashes($order->ShippingAddress->CountryCode);
        $Phone = addslashes($order->ShippingAddress->Phone);
        $CurrencyCode = addslashes($order->OrderTotal->CurrencyCode);
        $Amount = addslashes($order->OrderTotal->Amount);
        $NumberOfItemsShipped = addslashes($order->NumberOfItemsShipped);
        $NumberOfItemsUnshipped = addslashes($order->NumberOfItemsUnshipped);
        $PaymentMethod = addslashes($order->PaymentMethod);
        $MarketplaceId = addslashes($order->MarketplaceId);
        $BuyerEmail = addslashes($order->BuyerEmail);
        $BuyerName = addslashes($order->BuyerName);
        $ShipmentServiceLevelCategory = addslashes($order->ShipmentServiceLevelCategory);
        $ShippedByAmazonTFM = addslashes($order->ShippedByAmazonTFM);
        $OrderType = addslashes($order->OrderType);
        $EarliestShipDate = addslashes($order->EarliestShipDate);
        $LatestShipDate = addslashes($order->LatestShipDate);
        $EarliestDeliveryDate = addslashes($order->EarliestDeliveryDate);
        $LatestDeliveryDate = addslashes($order->LatestDeliveryDate);
        $IsBusinessOrder = addslashes($order->IsBusinessOrder);
        $IsPrime = addslashes($order->IsPrime);
        $IsPremiumOrder = addslashes($order->IsPremiumOrder);
        $order_valid = 'select * from AmazonOrderDetails where `AmazonOrderId`="' . $AmazonOrderId . '"';
        $result = $pm->fetchResult($order_valid);
        if (empty($result)) {
            $orederd_details = 'insert into `AmazonOrderDetails`'
                    . '(`AmazonOrderId`,`PurchaseDate`,`LastUpdateDate`,`OrderStatus`,`FulfillmentChannel`,`SalesChannel`,`ShipServiceLevel`,`StateOrRegion'
                    . '`,`Name`,`AddressLine1`,`AddressLine2`,`City`,`PostalCode`,`CountryCode`,`Phone`,`CurrencyCode`,`Amount`,`NumberOfItemsShipped`,'
                    . '`NumberOfItemsUnshipped`,`PaymentMethod`,`MarketplaceId`,`BuyerEmail`,`BuyerName`,`ShipmentServiceLevelCategory`,`ShippedByAmazonTFM`'
                    . ',`OrderType`,`EarliestShipDate`,`LatestShipDate`,`EarliestDeliveryDate`,`LatestDeliveryDate`,`IsBusinessOrder`,`IsPrime`,`IsPremiumOrder`,`AddedTime`)'
                    . 'values("' . $AmazonOrderId . '","' . $PurchaseDate . '","' . $LastUpdateDate . '","' . $OrderStatus . '","' . $FulfillmentChannel . '"'
                    . ',"' . $SalesChannel . '","' . $ShipServiceLevel . '","' . $StateOrRegion . '","' . $Name . '","' . $AddressLine1 . '","' . $AddressLine2 . '","' . $City . '"'
                    . ',"' . $PostalCode . '","' . $CountryCode . '","' . $Phone . '","' . $CurrencyCode . '","' . $Amount . '","' . $NumberOfItemsShipped . '"'
                    . ',"' . $NumberOfItemsUnshipped . '","' . $PaymentMethod . '","' . $MarketplaceId . '","' . $BuyerEmail . '","' . $BuyerName . '"'
                    . ',"' . $ShipmentServiceLevelCategory . '","' . $ShippedByAmazonTFM . '","' . $OrderType . '","' . $EarliestShipDate . '","' . $LatestShipDate . '"'
                    . ',"' . $EarliestDeliveryDate . '","' . $LatestDeliveryDate . '","' . $IsBusinessOrder . '","' . $IsPrime . '","' . $IsPremiumOrder . '","' . $addedTime . '")';
            $AmazonOrderDetailsId = $pm->executeQuery($orederd_details);

            $itemArray = getItem($AmazonOrderId, $sellerId, $service);
            $items = $itemArray->ListOrderItemsResult->OrderItems->OrderItem;
            foreach ($items as $item) {
                $ASIN = addslashes($item->ASIN);
                $SellerSKU = addslashes($item->SellerSKU);
                $OrderItemId = addslashes($item->OrderItemId);
                $Title = addslashes($item->Title);
                $QuantityOrdered = addslashes($item->QuantityOrdered);
                $QuantityShipped = addslashes($item->QuantityShipped);
                $ItemPrice = addslashes($item->ItemPrice->Amount);
                $PromotionDiscount = addslashes($item->PromotionDiscount->Amount);
                $ShippingPrice = addslashes($item->ShippingPrice->Amount);
                $ItemTax = addslashes($item->ItemTax->Amount);
                $ShippingTax = addslashes($item->ShippingTax->Amount);
                $ShippingDiscount = addslashes($item->ShippingDiscount->Amount);
                $ConditionId = addslashes($item->ConditionId);
                $ConditionSubtypeId = addslashes($item->ConditionSubtypeId);
                $item_detals = 'insert into `AmazonItemDetails`(`AmazonOrderDetailsId`,`ASIN`,`SellerSKU`,`OrderItemId`,`Title`,`QuantityOrdered`,`QuantityShipped`,'
                        . '`ItemPrice`,`ShippingPrice`,`ItemTax`,`ShippingTax`,`ShippingDiscount`,`PromotionDiscount`,`ConditionId`,`ConditionSubtypeId`)'
                        . ' values("' . $AmazonOrderDetailsId . '","' . $ASIN . '","' . $SellerSKU . '","' . $OrderItemId . '","' . $Title . '"'
                        . ',"' . $QuantityOrdered . '","' . $QuantityShipped . '","' . $ItemPrice . '","' . $PromotionDiscount . '","' . $ShippingPrice . '"'
                        . ',"' . $ItemTax . '","' . $ShippingTax . '","' . $ShippingDiscount . '","' . $ConditionId . '","' . $ConditionSubtypeId . '")';
                $pm->executeQuery($item_detals);
            }
        }
    }
}

?>