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

  <title>Dashboard - Onlabels</title>

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
      
      <script type="text/javascript">
        window.onload = function () {
          var chart = new CanvasJS.Chart("chartContainer", {
            legend:{
              verticalAlign: "center",
              horizontalAlign: "left",
              fontSize: 20,
              fontFamily: "Helvetica"        
            },
            /*theme: "theme2",*/
            data: [{
              type: "column",
              /*showInLegend: true,*/
              dataPoints: [
              { legendText: "4월", y: 45, label: "4월" },
              { legendText: "5월", y: 31, label: "5월" },
              { legendText: "6월", y: 52, label: "6월" },
              { legendText: "7월", y: 10, label: "7월" },
              { legendText: "8월", y: 46, label: "8월" },
              { legendText: "9월", y: 30, label: "9월" },
              ]
            }]
          });
          chart.render();
        }
      </script>
      <script src="<?php echo base_url("assets2/js/canvasjs.min.js"); ?>"></script>
      <style>
        html,
        body {
          height: 100%;
        }
        .canvasjs-chart-credit{
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
          
          margin: 0px 20px;
        }
        .alert-success {
          color: #000;
          background-color: #eeeeee;
          border-color: #eeeeee;
          border-radius: 0px;
        }
        .table > tbody > tr > td, .table > tfoot > tr > td {
          
          border-top: 0px solid #ddd;
        }
        @media (min-width: @767) {
          .side-btn{
            
          }
        }
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
              
              <li><a class="active" href="<?php echo base_url(); ?>dashboard/index">데시보드</a></li>
              <li><a href="<?php echo base_url(); ?>order/index">신규주문(<?php echo $total_orders; ?>) </a></li>
              <li><a href="<?php echo base_url(); ?>output/index">출력관리</a></li>
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

      <div class="container">
        <div class="row">
          <div class="col-md-10" style="padding: 20px 0px">
            <div class="alert alert-success" role="alert">
              <strong>회원 등급 : Free Member (업그레이드)</strong>
              <p class="pull-right">최종 연동 일자 : 2017.3.27 12.30 PM</p>
              
            </div>
          </div>
          <div class="col-md-2 col-xs-12 side-btn pull-right" style="top: 20px;background: #444444;padding: 4px;color: #fff">
            <img src="<?php echo base_url("assets2/img/update-icon.png"); ?>" style="padding: 12px;width: 50px;"/>최신 주문 가져오기
          </div>
          <div class="col-sm-6 ">
            <div class="panel panel-primary">
              <div class="panel-heading">
                <h3 class="panel-title"><img src="<?php echo base_url("assets2/img/new.png"); ?>"/>  신규주문 현황</h3>
              </div>
              <div class="panel-body">
                <strong>총 주문 수 : 00 문 </strong>
                <ul>
                  <li>- eBay 주문 :00 문 </li>
                  <li>- Amazon 주문 :00 문 </li>
                  <li>- Esty 주문 :00 문 </li>
                </ul>
                
              </div>
            </div>
            <div class="panel panel-primary">
              <div class="panel-heading">
                <h3 class="panel-title"><img src="<?php echo base_url("assets2/img/print-icon.png"); ?>"/>  라벨 출력 현황</h3>
              </div>
              <div class="panel-body">
                <strong>라벨 사용 수주문 :00 문 </strong>
                <strong>라벨 사용 수주문 :00 문 </strong>
                
              </div>
            </div>
            <div class="panel panel-primary">
              <div class="panel-heading">
                <h3 class="panel-title"><img src="<?php echo base_url("assets2/img/monthly.png"); ?>"/>  월별 라벨 출력 추이</h3>
              </div>
              <div class="panel-body">
                <div id="chartContainer" style="height: 300px; width: 100%;"></div>
              </div>  
            </div>  
          </div>
          <div class="col-sm-6">
            <div class="panel panel-default">
              <div class="panel-heading">
                <h3 class="panel-title"><img src="<?php echo base_url("assets2/img/microphone.png"); ?>"/>  OnLabels 월별 </h3>
              </div>
              <div class="panel-body">
                <h4>이번 달 고객 프로모션 진행사항입니다</h4>
                <p class="desc">
                  3월에는 신규 셀러를 위한 신규 채널 추가 프로모션을 진행합니다. 셀러 업그레이드하여 프로모션 혜택을 
                  경험하세요
                </p>
                <strong style="color: #346896" class="pull-right"><img src="<?php echo base_url("assets2/img/plus-circle.png"); ?>"> 더보기...</strong>
              </div>  
            </div>
            <div class="panel panel-default">
              <div class="panel-heading">
                <h3 class="panel-title"><img src="<?php echo base_url("assets2/img/microphone.png"); ?>"/>  OnLabels 소식<span style="font-size: 12px">(업데이트 2017.04.18)</span></h3>
              </div>
              <div class="panel-body">
                <h4>이번 달 고객 프로모션 진행사항입니다</h4>
                <p class="desc">
                  3월에는 신규 셀러를 위한 신규 채널 추가 프로모션을 진행합니다. 셀러 업그레이드하여 프로모션 혜택을 
                  경험하세요
                </p>
                <h4>이번 달 고객 프로모션 진행사항입니다</h4>
                <p class="desc">
                  3월에는 신규 셀러를 위한 신규 채널 추가 프로모션을 진행합니다. 셀러 업그레이드하여 프로모션 혜택을 
                  경험하세요
                </p>
                <h4>이번 달 고객 프로모션 진행사항입니다</h4>
                <p class="desc">
                  3월에는 신규 셀러를 위한 신규 채널 추가 프로모션을 진행합니다. 셀러 업그레이드하여 프로모션 혜택을 
                  경험하세요
                </p>
                <strong style="color: #346896" class="pull-right"><img src="<?php echo base_url("assets2/img/plus-circle.png"); ?>"> 더보기...</strong>
              </div>  
            </div>
            <div class="panel panel-default">
              <div class="panel-heading">
                <h3 class="panel-title"><img src="<?php echo base_url("assets2/img/update.png"); ?>"/>  OnLabels 기능 업데이트 <span style="font-size: 12px">(업데이트 2017.04.18)</span></h3>
              </div>
              <div class="panel-body">
                <h4>11/22</h4>
                <p class="desc">
                  0140ver. 버그 수정 <br/>
                  Amazon 추가 <br/>
                  0140ver. 버그 수정 <br/>
                </p>
                <strong style="color: #346896" class="pull-right"><img src="<?php echo base_url("assets2/img/plus-circle.png"); ?>"> 더보기...</strong>
              </div>  
            </div>
          </div>
        </div>

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
    <script>
      
      $('.collapse_tbl').click(function(){
        $('.tbl_border').addClass("border-bottom");
      });

    </script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
  </body>
  </html>
