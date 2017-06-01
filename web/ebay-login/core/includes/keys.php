<?php
    //show all errors - useful whilst developing
    error_reporting(E_ALL);

    // these keys can be obtained by registering at http://developer.ebay.com
    
    $production = false;   // toggle to true if going against production
    $compatabilityLevel = 717; //551;    // eBay API version
    
    $filename = "http://".$_SERVER['SERVER_NAME']."/ebay-login/core/includes/user_token.php";
    //$filename = "/ebay-login/core/includes/user_token.php";
    $contents = file_get_contents($filename);

    if ($production) {
        $devID = 'YOUR EBAY PRODUCTION DEV KEY';   // these prod keys are different from sandbox keys
        $appID = 'YOUR EBAY PRODUCTION APP KEY';
        $certID = 'YOUR EBAY PRODUCTION CERT KEY';
        //set the Server to use (Sandbox or Production)
        $serverUrl = 'https://api.ebay.com/ws/api.dll';      // server URL different for prod and sandbox
        //the token representing the eBay user to assign the call with
        $userToken = $contents;
    } else {  
        // sandbox (test) environment
        $devID = '8d87d082-ac38-41d7-8430-6eca1b18078e';//be5bac3a-3c45-4fbf-a25d-5b70eeb12ff5';         // insert your devID for sandbox
        $appID = 'DavinciT-OnLabels-SBX-a69e0185b-87b99bb3';//DavinciT-DevDAVIN-SBX-c246ab0a7-1c8e985f';   // different from prod keys
        $certID = 'SBX-69e0185ba55a-4bc5-4048-a483-9c54';//SBX-246ab0a78c55-26b3-445d-9c15-d2df';  // need three 'keys' and one token
        //set the Server to use (Sandbox or Production)
        $serverUrl = 'https://api.sandbox.ebay.com/ws/api.dll';
        // the token representing the eBay user to assign the call with
        // this token is a long string - don't insert new lines - different from prod token
        $userToken = $contents;                 
    }
?>
