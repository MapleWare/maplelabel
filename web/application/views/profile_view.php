<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Profile - onLabels</title>

    <!-- Bootstrap core CSS -->
    <link href="<?php echo base_url("assets2/css/bootstrap.css"); ?>" rel="stylesheet">
	
    <link href="<?php echo base_url("assets2/css/dashboard.css"); ?>" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->

    <!-- Custom styles for this template -->
    <link href="<?php echo base_url("assets2/css/style.css"); ?>" rel="stylesheet">
    
  <link rel="stylesheet" href="http://fontawesome.io/assets/font-awesome/css/font-awesome.css">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
		 <style>
		html,
		body {
			height: 100%;
		}
		
		.carousel,
		.item,
		.active {
			height: 100%;
		}
		
		.carousel-inner {
			height: 100%;
		}
		
		/* Background images are set within the HTML using inline CSS, not here */
		
		.fill {
			width: 100%;
			height: 100%;
			background-position: center;
			-webkit-background-size: cover;
			-moz-background-size: cover;
			background-size: cover;
			-o-background-size: cover;
		}
		.img-center {
			margin: 0 auto;
		}
		.caption {
			position: absolute;
			top: 23%;
			color: #ffffff;
		    padding: 0 45px 0px 90px;
			width: 100%;
		}
		ul{
			-webkit-padding-start: 20px;
				margin-bottom: 100px;
		}
		footer {
			margin: 0px 0 0 0;
		}
		.footer{
			color: #fff;
			background: #29363c;
			padding: 20px 0px 40px 0px;
		}
		.footer ul{
			margin-bottom: 0px;
			padding: 10px;
			list-style: none;
		}
		
		.footer a{
			padding: 3px;
			color: #f7f7f7;
		}
		.footer-bottom{
			background: #222222;
			color: #a3a0a0;
			padding: 20px 0px 10px 0px;
		}
		.sidebar img{
			margin-right: 15px;
		}
		.nav-pills{
			border-bottom: 1px solid #ccc;
			 
		}
		.main{   margin-left: 45px;}
		h4{margin: 30px 0px;}
	</style>
  </head>

  <body>

    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="<?php echo base_url(); ?>">
            <img src="<?php echo base_url("assets2/img/logo_white.png"); ?>" />
          </a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
			                
            <li class=""><a href="<?php echo base_url(); ?>dashboard/index">데시보드</a></li>
            <li><a href="<?php echo base_url(); ?>order/index">신규주문(<?php echo $total_orders; ?>) </a></li>
            <li><a href="#">출력관리</a></li>
            <li><a href="#">제품관리</a></li>
			
            <li><img src="<?php echo base_url("assets2/img/update-icon.png"); ?>" style="padding: 12px;width: 50px;"/></li>
          </ul>
		  <ul class="nav navbar-nav navbar-right">
            <li><img src="<?php echo base_url("assets2/img/user-icon.png"); ?>" style=" padding: 8px 0px;"></li>
            <li><a href="<?php echo base_url(); ?>profile/index"> <?php echo $this->session->userdata('uname'); ?></a></li>
            <li class=""><a href="<?php echo base_url(); ?>index.php/home/logout">도움말</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>

	<div class="container-fluid">
		<div class="row">
			<div class="col-sm-3 col-md-2 sidebar">
			<h3 class="page-header">OnLabels 설정</h3>
			  <ul class="nav nav-sidebar">
				<li class=""><a href="#"><img src="<?php echo base_url("assets2/img/user_profile.png"); ?>" /> 프로파일</a></li>
				<li><a href="#"><img src="<?php echo base_url("assets2/img/setting.png"); ?>" /> 셀러설정</a></li>
				<li><a href="#"><img src="<?php echo base_url("assets2/img/print.png"); ?>" /> 프린팅</a></li>
				<li><a href="#"><img src="<?php echo base_url("assets2/img/arrow_up.png"); ?>" /> 업그레이드</a></li>
			  </ul>
			</div>
			
			<div class="col-sm-9 col-md-9 main">
			 <h3></h3>
			 <ul  class="nav nav-pills">
				<li class="active">
					<a  href="#1b" data-toggle="tab">회원정보</a>
				</li>
				<li>
					<a href="#2b" data-toggle="tab">비밀번호</a>
				</li>
				
			</ul>
			 <div class="tab-content clearfix">
			  <div class="tab-pane active" id="1b">
				<div class="col-md-2">
					<h4>이름</h4>
					<h4>회사명</h4>
					<h4>이메일</h4>
					<h4	>전화번호</h4>
				</div>
				<div class="col-md-10">
					<h4 style="font-weight: 200"><?php echo $uname; ?></h4>
					<h4 style="font-weight: 200"> - </h4>
					<h4 style="font-weight: 200"><?php echo $uemail; ?></h4>
					<h4 style="font-weight: 200"> - </h4>
					<button type="submit" href="#" class=" btn btn-primary pull-right" style="">
						정보수정
					</button>
				</div>
					  </div>
					  <div class="tab-pane" id="2b">
				<h3></h3>
					  </div>
			  
				  </div>
			</div>
		</div><!-- /.container -->
		
	</div>
	<footer>
		<div class="footer" id="footer">
			<div class="container">
				<div class="row">
					<div class="col-lg-3  col-md-3 col-xs-6">
						<h3> Site Link</h3>
						<ul>
													
							<li> <a href="#"> Privacy Policy </a> </li>
							<li> <a href="#"> Terms of Service </a> </li>
							<li> <a href="#"> Blog </a> </li>
							<li> <a href="#"> Tour </a> </li>
							<li> <a href="#"> Pricing & Signup </a> </li>
						</ul>
					</div>
					<div class="col-lg-3  col-md-3  col-xs-6">
						<h3> Support</h3>
						<ul>
												   
							<li> <a href="#"> FAQ </a> </li>
							<li> <a href="#"> Request a Feature </a> </li>
							<li> <a href="#"> Report a Bug </a> </li>
							<li> <a href="#"> Contact Us </a> </li>
						</ul>
					</div>
					<div class="col-lg-3  col-md-3 col-xs-6">
						<h3> New on the Blog </h3>
						<ul>
												<li> <a href="#"> Using mail merge for packing slips</a> </li>
							<li> <a href="#"> The end of eBook delivery </a> </li>
							<li> <a href="#"> Alter Customer Address </a> </li>
							<li> <a href="#"> Powerful new email features </a> </li>
							<li> <a href="#"> The new list view in Scrobbld </a> </li>
						</ul>
					</div>
					<div class="col-lg-3  col-md-3 col-sm-4 col-xs-6">
						<h3> Community</h3>
						<ul>
												<li> <a href="#"> Forums / Features </a> </li>
							<li> <a href="#"> Questions </a> </li>
							<li> <a href="#"> LScrobbld Blog </a> </li>
							<li> <a href="#"> Twitter </a> </li>
							<li> <a href="#"> Facebook </a> </li>
						</ul>
					</div>
				</div>
				<!--/.row--> 
			</div>
			<!--/.container--> 
		</div>
		<!--/.footer-->
		
		<div class="footer-bottom">
			<div class="container">
				<p class="pull-right">  iLABs Technology © 2015~2017 All rights reserved. </p>
				
			</div>
		</div>
		<!--/.footer-bottom--> 
	</footer>
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="<?php echo base_url("assets2/js/jquery.js"); ?>"><\/script>')</script>
    <script src="<?php echo base_url("assets2/js/bootstrap.min.js"); ?>"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
  </body>
</html>
