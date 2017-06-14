<?php

//ebay key set
$token = 'AgAAAA**AQAAAA**aAAAAA**DkY6WQ**nY+sHZ2PrBmdj6wVnY+sEZ2PrA2dj6wFk4GkCpKAqAudj6x9nY+seQ**cjgEAA**AAMAAA**k0oRPEgxjN9iwUqk1GrjGnz8PwOev+LX9VzJuPNrExDz8+DvEp/mlIU88Kc7bYNC3cQvUg4HsoX3qO0niqguWqWwJ77mj5e/4uJ+aCvzCesh6zotuVxmJJMUyhL2w8lItDh4fYANmV0I+Ff+i8gvY2A9P3HSa1NmZvzFrAz9bbssV+/Xi0X3hP7VQE7BtAyRQnfel3kjM5MOvhUsJDEC8cjDR8qG2dpqMEoW80AFRKO8m8nPbQANqbFK5g9RDZhQuwvojyyLtIwmcOXWs+IXhnVlZ+FPzlwwM6iouRyWNDB0OL7os8B/TqmOVqO4JoxZ1iBc4HBEy6E4trSrNOuwOkyN0iaac7r0txoZ7OP1jbpTfWSrRzplwfNYXRZDsWPgubKtK9W4ib8KH50RBxqsws2Ku9rJhqctH5LkTtowUvKWf8dImAj24FzJeYRSCc1oAHp/EuzQ7xWQxkDEobPeF14Dlsd46lMxfqDyj1WZ+FoKq42yr9Eo0vlMg5LIF0k8gb9Hh5FzPKdiphcOVmNz8DUXkRHqE6SgIcBsvKg7Mx5Uzc1ugkXbhBUmMqwGz8JoOFYX/IIx9HyvaNI/Gl17MTgquT9eoKhOSM9g9f6H1qMpgZcnnLFV1dVBeWm9G+XYrJrEe7HOW7Fp9+mG8NmrApsBupWnw87Uimu14mqNUQNcIjQ6VU/tCbXJK3rXMMEAAK9nIxtxcnDjxmhsk8Tomwh7W2nAaoxBS9erUU6pQSm2KOvXdmVUj9vd6I3k9MEU';

$eBayAPIURL = "https://api.sandbox.ebay.com/ws/api.dll";
$COMPATIBILITYLEVEL = '861';
$DEVNAME = '751d643f-7754-45fd-a3d9-f8cf7648bca3';
$APPNAME = 'SellerOn-SellerLa-SBX-108f655c9-aa9380f1';
$CERTNAME = 'SBX-08f655c9e696-1ffb-4b2b-bc1e-8572';
//site id 0 for USA
$SiteId = 0;

//Amazon Key set
$marketPlaces = array(
    array(
        "SellerId" => "ATEVGGMDM1RI0",
        "AWSAccessKeyId" => "AKIAJH6EE2YYQHNWVXMQ",
        "SecretKey" => "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",
        "MarketplaceId" => "A1F83G8C2ARO7P",
        "orderServiceUrl" => "https://mws-eu.amazonservices.com/Orders/2013-09-01",
        "feedServiceUrl" => "https://mws.amazonservices.co.uk",
        "site" => "uk"
    ),
//    array(
//        "SellerId" => "",
//        "AWSAccessKeyId" => "",
//        "SecretKey" => "",
//        "MarketplaceId" => "APJ6JRA9NG5V4",//Italy MarketplaceID
//        "orderServiceUrl" => "https://mws-eu.amazonservices.com/Orders/2013-09-01",
//        "feedServiceUrl" => "https://mws.amazonservices.it",
//        "site"=>"it"
//    )
);
?>