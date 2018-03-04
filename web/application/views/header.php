<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
	<meta name="description" content="">
	<meta name="author" content="">
	<link rel="icon" href="<?php echo base_url("assets2/img/favicon.ico"); ?>">

	<title><?php echo $title; ?> - OnLabels</title>

	<!-- Bootstrap core CSS -->
	<link href="<?php echo base_url("assets2/css/bootstrap.css"); ?>" rel="stylesheet">
	
	<link href="<?php echo base_url("assets2/css/dashboard.css"); ?>" rel="stylesheet">

	<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->

	<!-- Custom styles for this template -->
	<link href="<?php echo base_url("assets2/css/style.css"); ?>" rel="stylesheet">

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
	<link href="https://cdn.datatables.net/1.10.13/css/jquery.dataTables.min.css" rel="stylesheet">

	<!-- <link href="<?php echo base_url("assets2/css/bootstrap-editable.css"); ?>" rel="stylesheet"> -->
	<link href="//cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet"/>

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

            .canvasjs-chart-credit {
                  display: none;
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
            .desc{padding: 10px;}
      	/*h4{margin: 30px 0px;}*/


      	input[type=checkbox] {
      		display: inline-block;
      		vertical-align: middle;
      		cursor: pointer;
      		background: #fff;
      		border: 1px solid #888;
      		padding: 1px;
      		height: 20px;
      		width: 20px;
      	}
      	.tbl_border, .out{
      		border-bottom: 1px solid #ddd;
      	}

      	.border-bottom{
      		border-bottom: 0px solid #ddd !important;
      	}
      	.collapse{
      		border-top: 1px solid #ddd;

      	}
      	.tbl_border .in{
      		border-bottom: 0px solid #ddd !important;
      	}
      	.panel-heading{
      		padding: 10px 10px;
      	}
      	.option-1{
      		margin-left: 30px;
      	}
      	.option-2{
      		margin-left: 40px;
      	}
      	.option-3{
      		margin-left: 50px;
      	}
      	label {
      		/*margin: 0px 20px;*/
      	}
            /*.alert-success {
                color: #000;
                background-color: #eeeeee;
                border-color: #eeeeee;
                border-radius: 0px;
              }*/
              .table > tbody > tr > td, .table > tfoot > tr > td {
                
                /*border-top: 0px solid #ddd;*/
              }
              @media (min-width: @767) {
                .side-btn{
                  
                }
              }

      	.form-inline .form-group {
      		margin-bottom: 5px;
      	}
      	.panel-body {
      		/*padding-top: 0px; */

      	}
      	.spacer{
      		border-spacing: 3px;
      		border-collapse: inherit;
      	}
      	@media (min-width: 768px) {
      		.modal-dialog {
      			width: 450px;
      			margin: 30px auto;
      		}
      	}

      	table.dataTable thead th, table.dataTable thead td {
      		padding: 10px;
      	}

      	.table-responsive {
      		overflow-x: inherit;
      	}

      	#export {
      		float: left;
      		position: absolute;
      		margin-top: 23px;
      	}

      	#info {
      		float: right;
      		margin-top: 20px;
      		font-size: 12px;
      	}

      	#table_length, 
      	#table_delivery_length, 
      	#table_feedback_length {
      		margin-top: 8px;
      		position: absolute;
      		margin-left: -180px;
      	}

      	#threebyseven td {
      		padding: 0;
      		line-height: 9px;
      	}

      	#threebyeight td {
      		padding: 0;
      		line-height: 8px;
      	}

      	#info_msg {
      		display: none;
      	}

      	#myModalPhrase table td:nth-child(3) {
      		width: 105px;
      	}
      	#myModalPhrase table td:nth-child(2),
      	#myModalPhrase table td:nth-child(1) { 
      		vertical-align: middle;
      	}

      	table.dataTable {
      		width:100% !important;
      	}

      	table.dataTable td:nth-child(7) {
      		width: 125px;
      	}
      	table.dataTable td:nth-child(4) {
      		width: 55px;
      	}
      	table.dataTable {
                  font-size: 12px;
            }
            .nucircle {
                border-radius: 50%;
                background: #fff;
                border: 1px solid #fff;
                color: black;
                font: 11px Arial, sans-serif;
                display: inline-table;
                font-weight: bold;
                width: 14px;
                text-align: center;
            }
            .navbar-brand > img {
                  margin-top: -2px;
            }

            /* Dropdown Button */
            .dropbtn {
                background-color: #222;
                color: white;
                padding: 13px;
                font-size: 15px;
                border: none;
                cursor: pointer;
            }

            /* The container <div> - needed to position the dropdown content */
            .dropdown {
                position: relative;
                display: inline-block;
            }

            /* Dropdown Content (Hidden by Default) */
            .dropdown-content {
                display: none;
                position: absolute;
                background-color: #3e3c3c;
                min-width: 200px;
                box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
                z-index: 1;
                        left: -60px;
            }

            /* Links inside the dropdown */
            .dropdown-content a {
                color: white;
                padding: 5px 16px;
                text-decoration: none;
                display: block;
            }



            /* Show the dropdown menu on hover */
            .dropdown:hover .dropdown-content {
                display: block;
            }
            .dropdown-content a:hover {background-color: #000}

                  .btn-group{
                        
                                    margin-top: 8px;
                                    margin-left: 10px;
                        }
                        .carousel-caption {
                top: 70px;
            }
            .right10{
                  margin-right:  10px;
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
                              <img width="120" src="<?php echo base_url("assets2/img/logo_white.png"); ?>" />
                        </a>
                  </div>
                  <div id="navbar" class="collapse navbar-collapse">
                        <ul class="nav navbar-nav">

                              <li class="<?php echo $title=='Dashboard'?'active':''; ?>"><a href="<?php echo base_url(); ?>dashboard/index">데시보드</a></li>
                              <li class="<?php echo $title=='Order Management'?'active':''; ?>"><a href="<?php echo base_url(); ?>order/index">신규주문 <div class="nucircle" id="total_order_count"><?php echo @$total_orders; ?></div> </a></li>
                              <li class="<?php echo $title=='Printing Management'?'active':''; ?>"><a href="<?php echo base_url(); ?>output/index">출력관리</a></li>
                              <li class="<?php echo $title=='Product Management'?'active':''; ?>"><a href="<?php echo base_url(); ?>product/index">제품관리</a></li>

                              <li><img src="<?php echo base_url("assets2/img/update-icon.png"); ?>" id="refreshorders" style="padding: 12px;width: 50px; cursor: pointer;"/></li>
                        </ul>
                        <ul class="nav navbar-nav navbar-right">
                              <li><img src="<?php echo base_url("assets2/img/user-icon.png"); ?>" style=" padding: 8px 0px;"></li>
                              <li>
                                    <div class="dropdown">
                                          <button class="dropbtn"><?php echo $this->session->userdata('uname'); ?></button>
                                          <div class="dropdown-content">
                                          <h5 class="text-center"><div style="color:#2d7787; margin: 11px 20px 7px 20px;"><?php echo $uemail; ?></div>
                                          <div style="color:#fff; margin-top: 6px; font-size: 14px;"> Free Member</div></h5>
                                          <hr style="margin:0px 10px 5px 10px">

                                          <a href="<?php echo base_url(); ?>profile/index" class="active_color"><img src="<?php echo base_url("assets2/img/new/user.png"); ?>" class="right10"> 프로파일</a>
                                          <a href="<?php echo base_url(); ?>sellers/index"><img src="<?php echo base_url("assets2/img/new/setting.png"); ?>" class="right10"/> 셀러설정</a>
                                          <a href="<?php echo base_url(); ?>layout/index"><img src="<?php echo base_url("assets2/img/new/print.png"); ?>" class="right10"/> 프린팅</a>
                                          <a href="<?php echo base_url(); ?>upgrade/index"s><img src="<?php echo base_url("assets2/img/new/up.png"); ?>" class="right10"/> 업그레이드</a>
                                          <a href="<?php echo base_url(); ?>index.php/home/logout"><img src="<?php echo base_url("assets2/img/new/logout.png"); ?>" class="right10"/> 로그아웃</a>

                                          <br>
                                    </div>
                              </li>       
                              <!-- <li><a href="<?php echo base_url(); ?>profile/index"> <?php echo $this->session->userdata('uname'); ?></a></li> -->
                              <li><a href="#">도움말</a></li>
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
                              <img width="120" src="<?php echo base_url("assets2/img/logo_white.png"); ?>" />
                        </a>
                  </div>
                  <div id="navbar" class="collapse navbar-collapse pull-right">
                        <ul class="nav navbar-nav">
                              <li class="<?php echo $title=='Login'?'active':''; ?>"><a href="<?php echo base_url(); ?>login">로그인</a></li>
                              <li class="<?php echo $title=='Signup'?'active':''; ?>"><a href="<?php echo base_url(); ?>signup">회원가입</a></li>
                              <li><a href="#">도움말</a></li>
                        </ul>
                  </div><!--/.nav-collapse -->
            </div>
      </nav>
<?php endif; ?>
