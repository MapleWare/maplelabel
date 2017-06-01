<?php require_once('core/auth.php') ?>
<!DOCTYPE html>
<html>
<head>
<title>Davinci Ebay Login</title>
</head>
<body>
<h1>
	Ebay login for Davinci-tech
</h1>
<br>
<?php 
if (isset($_GET['logout'])) {	
	if (isset($_COOKIE['AuthTokenDude'])) 
		echo '<b style="color:red">You are logged out</b>';	
	setcookie("AuthTokenDude", "", time()-3600);
}
?>
<h2 style="margin-bottom: 0px;">First, please grant application access</h2>
 <i style="font-size: 14px; font-weight: normal;">(this will open a pop up window for you to sign in to ebay)</i><br><br>
<label> You may use sandbox user below : </label><br>
Username : <b>TESTUSER_davinci1</b> <br>
Password : <b>Davinci12!@</b> <br> 
<i>* you may use other sandbox user if needed.</i>
<br><br>

<input style="width: 120px;" type="submit" name="authorize" value="AUTHORIZE" onclick="window.open('https://signin.sandbox.ebay.com/ws/eBayISAPI.dll?SignIn&RuName=<?php echo $RuName?>&SessID=<?php echo $SessionID?>','_blank','toolbar=yes,scrollbars=yes,resizable=no,top=150,left=500,width=400,height=400')">
<br><br>

<h2 style="margin-bottom: 0;">Second, once application access granted, you may call several Ebay APIs below</h2>
<i style="font-size: 14px; font-weight: normal; margin-bottom: 5px;">(please make sure you have authorize the application else it will not show anything)</i>
<br><br>
<input style="width: 120px;" type="submit" name="viewToken" value="VIEW TOKEN" onclick="window.open('view_token.php?my_session=<?php echo $SessionID?>','_blank','toolbar=yes,scrollbars=yes,resizable=no,top=0,left=500,width=600,height=900')">
<br><br>
<input style="width: 120px;" type="submit" name="viewOrders" value="GET ORDERS" onclick="window.open('orders.php?my_session=<?php echo $SessionID?>','_blank','toolbar=yes,scrollbars=yes,resizable=no,top=0,left=500,width=600,height=900')">


<br><br>
<h2 style="margin-bottom: 0;">Third, Logout</h2>
<i style="font-size: 14px; font-weight: normal;">(kill current session)</i>
<br><br>
<a href="index.php?logout" style="text-decoration: none;">
<input style="width: 120px;" type="submit" name="viewToken" value="LOG OUT">
</a>
</body>
</html>
