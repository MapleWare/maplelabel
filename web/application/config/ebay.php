<?php defined('BASEPATH') OR exit('No direct script access allowed');


$config['compatabilityLevel']	= 717;
$config['devID']				= 'b86728ba-7e3c-4fea-9614-eea604cdac88';
$config['appID']				= 'Onlabeld-onlabeld-SBX-a090fc79c-5b69000b';
$config['certID']				= 'SBX-090fc79c6f28-7508-4750-8b1f-ebc3';
$config['serverUrl']			= 'https://api.sandbox.ebay.com/ws/api.dll';
$config['userToken']			= 'xx';

// if ($_SERVER['HTTP_HOST'] == 'dev.onlabels.co.kr') :

// $config['compatabilityLevel']	= 717;
// $config['devID']				= 'b86728ba-7e3c-4fea-9614-eea604cdac88';
// $config['appID']				= 'Onlabeld-onlabeld-SBX-a090fc79c-5b69000b';
// $config['certID']				= 'SBX-090fc79c6f28-7508-4750-8b1f-ebc3';
// $config['serverUrl']			= 'https://api.sandbox.ebay.com/ws/api.dll';
// $config['userToken']			= 'xx';

// else
if ($_SERVER['HTTP_HOST'] == 'stg.onlabels.co.kr') : 

$config['compatabilityLevel']	= 717;
$config['devID']				= 'fe17b028-d039-4bc6-a873-d69f56f87448';
$config['appID']				= 'Maplewar-9b5a-4329-8900-5702016d1fe3';
$config['certID']				= '5446917c-1a28-4bee-bcf6-2418fa8c5b02';
$config['serverUrl']			= 'https://api.ebay.com/ws/api.dll';
$config['userToken']			= 'xx';

endif ;

// $config['compatabilityLevel']	= 861;
// $config['devID']				= '751d643f-7754-45fd-a3d9-f8cf7648bca3';
// $config['appID']				= 'SellerOn-SellerLa-SBX-108f655c9-aa9380f1';
// $config['certID']				= 'SBX-08f655c9e696-1ffb-4b2b-bc1e-8572';
// $config['serverUrl']			= 'https://api.sandbox.ebay.com/ws/api.dll';
// $config['userToken']			= 'xx';