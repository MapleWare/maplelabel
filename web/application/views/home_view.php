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

    <title>Home - onLabels</title>

    <!-- Bootstrap core CSS -->
    <link href="<?php echo base_url("assets2/css/bootstrap.css"); ?>" rel="stylesheet">

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
			margin: 50px 0 0 0;
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
	</style>
  </head>

  <body>

  	<?php if ($this->session->userdata('uid') !== null): ?>
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
  	<?php else : ?>
  		<nav class="navbar navbar-inverse navbar-fixed-top">
	      <div class="container">
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
	        <div id="navbar" class="collapse navbar-collapse pull-right">
	          <ul class="nav navbar-nav">
	            <li class=""><a href="<?php echo base_url(); ?>login">로그인</a></li>
	            <li><a href="<?php echo base_url(); ?>signup">회원가입</a></li>
	            <li><a href="#">도움말</a></li>
	          </ul>
	        </div><!--/.nav-collapse -->
	      </div>
	    </nav>
  	<?php endif; ?>

    
    <!-- Full Page Image Background Carousel Header -->
    <header id="myCarousel" class="carousel slide">
        <!-- Indicators -->
        <ol class="carousel-indicators" style="display: none">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>
        </ol>

        <!-- Wrapper for Slides -->
        <div class="carousel-inner">
            <div class="item active">
                <!-- Set the first background image using inline CSS below. -->
                <div class="fill" style="background-image:url('<?php echo base_url("assets2/img/header.jpg"); ?>');"></div>
                <div class="carousel-caption col-md-8 pull-left">
                    <h1>Why OnLabels</h2>
					<br/>
					<div class="col-md-12"  style="margin-bottom: 30px;">
					<strong>OnLabels</strong> 는 다양한 글로벌 온라인 마켓에서 활동하는<br/>
					셀러들을 위한 <strong>One Minutes Label</strong> 서비스로입<br/>
					주문 상품의 주소 라벨, 세관 신고서 등을 편리하게<br/>
					프린트할 수 있도록 지원하는 서비스로 <br/>
					<strong>한 번의 클릭(One Click)</strong>으로, <br/>
					<strong>정확한 시간(On Time)</strong>에, <br/>
					<strong>정확한 배송(On Delivery)</strong>을 도와드립니다.
					</div>
					<div class="form-group">
						<button type="submit" href="#" class="btn btn-primary pull-left" style="padding: 10px 30px;">30일 체험판 시작하기</button>                          
						
					</div>
                </div>
            </div>
            
        </div>

        <!-- Controls -->
        <a class="left carousel-control" href="#myCarousel" data-slide="prev"  style="display: none">
            <span class="icon-prev"></span>
        </a>
        <a class="right carousel-control" href="#myCarousel" data-slide="next"  style="display: none">
            <span class="icon-next"></span>
        </a>

    </header>
    <div class="container" style="padding: 50px 0px;">
		<div class="row">
            <div class="col-sm-4">
                <img class="img img-responsive img-center" src="<?php echo base_url("assets2/img/time.png"); ?>" alt="">
            </div>
            <div class="col-sm-4">
                <img class="img img-responsive img-center" src="<?php echo base_url("assets2/img/click-r.png"); ?>" alt="">
            </div>
            <div class="col-sm-4">
                <img class="img img-responsive img-center" src="<?php echo base_url("assets2/img/delivery.png"); ?>" alt="">
            </div>
        </div>
		<div class="row">
            <div class="col-sm-4">
                <h2 class="text-center">On Time</h2>
				<h4 class="text-center">OnLabels은 정확한 시간을 지원합니다</h4>
                <p class="text-center">OnLabels은 다양한 글로벌 온라인 마켓에서 활동하는 셀러들을 위한 One Minutes Label 서비스로입니다. </p>
            </div>
            <div class="col-sm-4">
               <h2  class="text-center">One Click</h2>
			   <h4 class="text-center">OnLabels은 한 번의 클릭으로 충분합니다</h4>
                <p class="text-center">OnLabels은 다양한 글로벌 온라인 마켓에서 활동하는 셀러들을 위한 One Minutes Label 서비스로입니다. </p>
			</div>
            <div class="col-sm-4">
                <h2 class="text-center">On Delivery</h2>
				<h4 class="text-center">OnLabels은 정확한 배송을 지원합니다</h4>
                <p class="text-center">OnLabels은 다양한 글로벌 온라인 마켓에서 활동하는 셀러들을 위한 One Minutes Label 서비스로입니다. </p>
            </div>
        </div>
	</div><!-- /.container -->
	<hr/>
	
    <div class="container" style="padding: 50px 0px;">
		
		<div class="row">
            <div class="col-sm-8">
                
                <img class="img img-responsive img-center" src="<?php echo base_url("assets2/img/play_video.jpg"); ?>" alt="">
				
            </div>
            <div class="col-sm-4">
               
                <img class="img img-responsive img-center" src="<?php echo base_url("assets2/img/image_vid.jpg"); ?>" alt="">
				<div class="caption">
					<h2>온라인 견적문의</h2>
					<ul>
						<li>신규 가입 고객에게 쿠폰을 발급</li>
						<li>글로벌 셀러 판매 라벨 제작</li>
						<li>신규 가입 고객 쿠폰을 발급</li>

					</ul>
					<div class="form-group">
						<button type="submit" href="#" class="btn btn-primary pull-right" style="padding: 8px 30px;">견적 문의</button>                          
						
					</div>
				</div>
			</div>
            
        </div>
	</div><!-- /.container -->
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
    <script src="<?php echo base_url("assets2/js/bootstrap.min.js"); ?>"></script>
	
    <script src="<?php echo base_url("assets2/js/jquery.js"); ?>"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
  </body>
</html>
