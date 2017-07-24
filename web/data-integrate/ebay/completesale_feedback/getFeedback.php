<?php

set_time_limit(0);
require_once './process/ebayFunctions.php';

$orderId = "162420660644-1575481261006";

$responseXML = getItemsAwaitingFeedbackRequest(1);

$orders = array();
try {
    $response = new SimpleXMLElement($responseXML);

    foreach ($response->ItemsAwaitingFeedback->TransactionArray->Transaction as $transaction) {
        $orders[] = (string) $transaction->OrderLineItemID;
    }

    $pages = (int) $response->ItemsAwaitingFeedback->PaginationResult->TotalNumberOfPages;
    for ($page = 2; $page <= $pages; $page++) {
        try {
            $responseXML = getItemsAwaitingFeedbackRequest($page);
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
    echo "No";
} else {
    echo "Yes";
}