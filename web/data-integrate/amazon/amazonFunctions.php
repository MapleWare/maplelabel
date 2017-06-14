<?php

function listAmazonOrders($days, $action) {

    global $marketPlaces;

    foreach ($marketPlaces as $marketPlace) {
        $serviceUrl = $marketPlace['orderServiceUrl'];
        $marketPlaceId = $marketPlace['MarketplaceId'];
        $sellerId = $marketPlace['SellerId'];
        $siteid = $marketPlace['site'];
        if (empty($sellerId))
            continue;
        $config = array(
            'ServiceURL' => $serviceUrl,
            'ProxyHost' => null,
            'ProxyPort' => -1,
            'ProxyUsername' => null,
            'ProxyPassword' => null,
            'MaxErrorRetry' => 3,
        );

        $service = new MarketplaceWebServiceOrders_Client(
                $marketPlace['AWSAccessKeyId'], $marketPlace['SecretKey'], APPLICATION_NAME, APPLICATION_VERSION, $config);

        $startTimeFrom = strtotime(date('Y-m-d') . $days);
        $startTimeFrom = date("Y-m-d", $startTimeFrom);
        $orders = listOrderRequest($startTimeFrom, $sellerId, $marketPlaceId, $service);
//        print_r($orders->ListOrdersResult->Orders->Order);
//        die;
        if (isset($orders->ListOrdersResult->Orders->Order)) {
            $orders = $orders->ListOrdersResult->Orders->Order;
            if ($action == 'Store') {
                storeAmazonOrder($orders, $marketPlaceId, $sellerId, $service, $siteid);
            } else {
                updateAmazonStatus($orders, $marketPlaceId, $sellerId, $service, $siteid);
            }
        }

        if (isset($orders->ListOrdersResult->NextToken)) {

            $nextToken = $orders->ListOrdersResult->NextToken;
            getByNextToken($nextToken, $marketPlaceId, $sellerId, $service, $action);
        }
        sleep(6);
    }
}

function getByNextToken($nextToken, $marketPlaceId, $sellerId, $service, $action) {

    $orderArray = listOrderByNextToken($nextToken, $service, $sellerId);
    $orders = $orderArray->ListOrdersByNextTokenResult->Orders->Order;
    if ($action == 'Store') {
        storeAmazonOrder($orders, $marketPlaceId, $sellerId, $service);
    } else {
        updateAmazonStatus($orders, $marketPlaceId, $sellerId, $service);
    }


    while ($orderArray->ListOrdersByNextTokenResult->NextToken) {
        $nextToken = $orderArray->ListOrdersByNextTokenResult->NextToken;

        $orderArray = listOrderByNextToken($nextToken);
        if (isset($orderArray->ListOrdersByNextTokenResult->Orders->Order)) {
            $orders = $orderArray->ListOrdersByNextTokenResult->Orders->Order;
            if ($action == 'Store') {
                storeAmazonOrder($orders, $marketPlaceId, $sellerId, $service);
            } else {
                updateAmazonStatus($orders, $marketPlaceId, $sellerId, $service);
            }
        }

        sleep(6);
    }
}
