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

    <title>New Order - onLabels</title>

    <!-- Bootstrap core CSS -->
    <link href="<?php echo base_url("assets2/css/bootstrap.css"); ?>" rel="stylesheet">
	
    <link href="<?php echo base_url("assets2/css/dashboard.css"); ?>" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->

    <!-- Custom styles for this template -->
    <link href="<?php echo base_url("assets2/css/style.css"); ?>" rel="stylesheet">
    
  	<link rel="stylesheet" href="http://fontawesome.io/assets/font-awesome/css/font-awesome.css">
  	<link href="http://cdn.datatables.net/1.10.13/css/jquery.dataTables.min.css" rel="stylesheet">

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
				
					margin: 0px 20px;
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
			                
            <li class=""><a href="#">데시보드</a></li>
            <li><a class="active" href="<?php echo base_url(); ?>order/index">신규주문(0) </a></li>
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
				
				
				<div class="col-sm-9 ">
				 <h3></h3>
				 <ul  class="nav nav-pills">
					<li class="active">
						<a  href="#1b" data-toggle="tab">전체(00)</a>
					</li>
					<li>
						<a href="#2b" data-toggle="tab">결제완료(배송전)</a>
					</li>
					
					<li>
						<a href="#2b" data-toggle="tab">피드백 대기</a>
					</li>
					
				 </ul>
				 <div class="tab-content clearfix">
						<div class="tab-pane active" id="1b">
						<div class="row" >
							<div class="col-md-12">
							<form class="form-inline"  style="background: #ccc;padding: 30px 20px;margin: 30px 0px;">
								<div class="form-group">
									<label for="exampleInputName2">기간 </label>
									<select class="form-control" id="exampleInputName2">
									<option class="option-1">15일 </option>
									</select>
								</div>
								<div class="form-group">
									<label for="exampleInputEmail2">판매채널 </label>
									<select class="form-control" id="exampleInputName2">
									<option class="option-2">eBay </option>
									</select>
								</div>
								<div class="form-group">
									<label for="exampleInputEmail2">피드백 대기 </label>
									<select class="form-control" id="exampleInputName2">
									<option class="option-3">최근 주문 </option>
									</select>
								</div>
								<button type="submit" class="btn btn-primary">검색 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="fa fa-search"></span></button>
								</form>
								<div class="table-responsive">
								<table class="table" id="table" >
									<thead>
									<tr>
									<th><input type="checkbox" class="form-group tick"></th>
									<th>일련번호</th>
									<th>주문일자</th>
									<th>판매채널</th>
									<th>주문내역</th>
									<th>주문자ID</th>
									<th>진행현황</th>
									</tr>
									</thead>
									<tbody>
									
									<tr>
										<td><input type="checkbox" class="form-group tick"></td>
										<td>1-123</td>
										<td>2017.06.17 오후 3시 30분</td>
										<td>eBay</td>
										<td>
											<div class="tbl_border out" style="background: transparent;">
												Apple MacBook Air13 inch Gray NEW <br/>
												수량 : 1개<br/>
												가격 : $2,000<br/><br/>
												<a class="collapse_tbl" role="button" data-toggle="collapse" href="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
													<span class="fa fa-caret-right"> </span> 배송정보
												</a>
												<div class="collapse out" id="collapseExample">
													주문자	:  Donald Trump <br/>
													연략처	:  82-10-2854-0731 <br/>
													Email <br/>
														 donaldtrump1122334455@gmail.com<br/>
													주소<br/>
														 104-601 hanamdaero 784 29 Hanamsi <br/>
														 Geyounggi-do<br/>
													Korea<br/>
													</div>
											</div>
										</td>
										<td>
											Maplestore<br/>
											피드백 : 100점 주문수 : 3회
										</td>
										<td>
											<span><img src="<?php echo base_url("assets2/img/icon-1.png"); ?>"></span>
											<span><img src="<?php echo base_url("assets2/img/icon-2.png"); ?>"></span>
											<span><img src="<?php echo base_url("assets2/img/icon-3.png"); ?>"></span>
											<span><img src="<?php echo base_url("assets2/img/icon-4.png"); ?>"></span>
											<span><img src="<?php echo base_url("assets2/img/icon-5.png"); ?>"></span>
										</td>
									</tr>
									</tbody>
								</table>
								</div>
								<div class="col-md-6"  style="margin: 30px 0px;">
								
								<button type="submit" class="btn btn-primary">엑셀 다운로드</button>
									
								</div>
								<div class="col-md-6 form-inline pull-right"  style="margin: 30px 0px;">
								<div class="form-group">
									<label for="exampleInputName2">표시 </label>
									<select name="table_length" class="form-control" id="exampleInputName2">
									<option value="5">5개 </option>
									<option value="10">10개 </option>
									</select>
								</div
								<div class="form-group">
									<label for="exampleInputName2">총 999개 중 1~50 </label>
									<a href="#" style="padding: 8px 15px;border: 1px solid #ccc;"><span class="fa fa-caret-left"></span></a>
									<a href="#" style="padding: 8px 15px;border: 1px solid #ccc;background: #286090;color: #fff"><span class="fa fa-caret-right"></span></a>
									
								</div
										
								</div>
							</div>
							
						</div>
						 
					</div>
					
					<div class="tab-pane" id="2b">
						<h3></h3>
					</div>
					</div>
				</div>
						
			<div class="col-sm-3">
						<h3></h3>
						<ul  class="nav nav-pills">
						 <li class="active">
							 <a  href="#1b" data-toggle="tab">라벨 출력설정</a>
						 </li>
						
						 
					 </ul>
							<div class="tab-content clearfix">
							 <div class="tab-pane active" id="1b">
							 <div>
								<h5 style="border: 1px solid;padding: 30px 20px;">주문 02개가 선택되었습니다</h5>
							 </div>
								 <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
										<div class="panel panel-default">
											<div class="panel-heading" role="tab" id="headingOne">
												<h4 class="panel-title">
													<a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
														<span class="fa fa-caret-right" style="color: #286090"></span> 1. 배송 수단설정
													</a>
												</h4>
											</div>
											<div id="collapseOne" class="panel-collapse collapse " role="tabpanel" aria-labelledby="headingOne">
												<div class="panel-body">
													Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
												</div>
											</div>
										</div>
										<div class="panel panel-default">
											<div class="panel-heading" role="tab" id="headingTwo">
												<h4 class="panel-title">
													<a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
														<span class="fa fa-caret-right" style="color: #286090"></span> 2. 라벨 출력설정
													</a>
												</h4>
											</div>
											<div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
												<div class="panel-body">
													Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
												</div>
											</div>
										</div>
										<div class="panel panel-default">
											<div class="panel-heading" role="tab" id="headingThree">
												<h4 class="panel-title">
													<a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
														<span class="fa fa-caret-right" style="color: #286090"></span> 3. 라벨 템플릿
													</a>
												</h4>
											</div>
											<div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
												<div class="panel-body">
													Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
												</div>
											</div>
										</div>
									</div>
							
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


	<!-- <div class="container">
        <h1 style="font-size:20pt">Simple Example of ServerSide jQuery Datatable</h1>
        <table id="table" class="display" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Name</th>
                    <th>Salary</th>
                    <th>Age</th>
                </tr>
            </thead>
            <tbody>
            </tbody>

            <tfoot>
                <tr>
                    <th>No</th>
                    <th>Name</th>
                    <th>Salary</th>
                    <th>Age</th>
                </tr>
            </tfoot>
        </table>
    </div> -->

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="<?php echo base_url("assets2/js/jquery.js"); ?>"><\/script>')</script>
    <script src="<?php echo base_url("assets2/js/bootstrap.min.js"); ?>"></script>
    <script src="http://cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js"></script>
	<script>
		
		$('.collapse_tbl').click(function(){
			$('.tbl_border').addClass("border-bottom");
		});

		var table;
		$(document).ready(function() {
		    //datatables
		    table = $('#table').DataTable({ 
		    	//"dom": '<"top"i>rt<"bottom"flp><"clear">',
		        "processing": true, //Feature control the processing indicator.
		       "serverSide": true, //Feature control DataTables' servermside processing mode.
		        //"order": [], //Initial no order.
		        "iDisplayLength" : 5,
		        // Load data for the table's content from an Ajax source
		        "ajax": {
		            "url": "<?php echo base_url('/order/ajax_list')?>",
		            "type": "POST",
		            "dataType": "json",
		            "dataSrc": function (jsonData) {
		              return jsonData.data;
		            }
		        },
		        "order": [],
		        //Set column definition initialisation properties.
		        "columnDefs": [
		        { 
		            "targets": [ 0,2,3,4,5,6 ], //first column / numbering column
		            "orderable": false, //set not orderable
		        },
		        ],
		    });
		});
	</script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
  </body>
</html>
