<?php

require_once './process/ebayFunctions.php';

$orderId = "162160796657-1535513908006";
$response = completeSaleRequest($orderId);
$xmlArray = new SimpleXMLElement($response);

if ($xmlArray->Ack == 'Success' || $xmlArray->Ack == 'Warning') {
    echo 'The item has been Shipped.' . '<br>';
} else {
    foreach ($xmlArray->Errors as $error) {
        if ($error->SeverityCode == 'Error') {
            $errorMsg = $error->SeverityCode . ' : ' . $error->LongMessage;
            echo $errorMsg . '<br>';
        }
    }
}