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
      	.form-inline .form-group {
      		margin-bottom: 5px;
      	}
      	.panel-body {
      		padding-top: 0px; 

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
      	}

      	#table_length {
      		margin-top: 10px;
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

  					<li><a href="<?php echo base_url(); ?>dashboard/index">데시보드</a></li>
  					<li><a class="active" href="<?php echo base_url(); ?>order/index">신규주문(<?php echo $total_orders; ?>) </a></li>
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
  						<a  href="#1b" data-toggle="tab">전체(<?php echo $total_orders; ?>)</a>
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
  								<form class="form-inline"  style="background: #ddd; padding: 30px 20px;margin: 30px 0px;">
  									<div class="form-group">
  										<label for="exampleInputName2">기간 </label>
  										<select class="form-control" id="exampleInputName2" style="width: 80px;">
  											<option class="option-11">15일 </option>
  										</select>
  									</div>
  									<div class="form-group">
  										<label for="exampleInputEmail2">판매채널 </label>
  										<select class="form-control" id="exampleInputName2"  style="width: 120px;">
  											<option class="option-22">eBay </option>
  										</select>
  									</div>
  									<div class="form-group">
  										<label for="exampleInputEmail2">피드백 대기 </label>
  										<select class="form-control" id="exampleInputName2"  style="width: 150px;">
  											<option class="option-33">최근 주문 </option>
  										</select>
  									</div>
  									<button type="submit" class="btn btn-primary">검색 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="fa fa-search"></span></button>
  								</form>
  								<div class="table-responsive">
  									<table class="table" id="table" >
  										<thead>
  											<tr>
  												<th><input id="order-select-all" type="checkbox" class="form-group tick"></th>
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

  									<!-- <button type="submit" class="btn btn-primary">엑셀 다운로드</button> -->

  								</div>
								<!-- <div class="col-md-6 form-inline pull-right"  style="margin: 30px 0px;">
								<div class="form-group">
									<label for="exampleInputName2">표시 </label>
									<select name="table_length" class="form-control" id="exampleInputName2">
									<option value="5">5개 </option>
									<option value="10">10개 </option>
									</select>
								</div>
								<div class="form-group">
									<label for="exampleInputName2">총 999개 중 1~50 </label>
									<a href="#" style="padding: 8px 15px;border: 1px solid #ccc;"><span class="fa fa-caret-left"></span></a>
									<a href="#" style="padding: 8px 15px;border: 1px solid #ccc;background: #286090;color: #fff"><span class="fa fa-caret-right"></span></a>
									
								</div>
										
							</div> -->
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
						<h5 class="info_order_list" style="border: 1px solid;padding: 30px 20px;">주문 0개가 선택되었습니다</h5>
					</div>
					<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
						<div class="panel panel-default">
							<div class="panel-heading" role="tab" id="headingOne">
								<h4 class="panel-title">
									<a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
										<span class="fa fa-caret-down" style="color: #286090"></span> 1. 배송 수단설정 <span style="color: #ef5227">(우체국, 소형포장)</span>
									</a>
								</h4>
							</div>
							<div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
								<div class="panel-body">
									<h5>라벨출력을 위한 배송 수단을 선택하세요</h5>
									<form class="form-inline"  style="">
										<div class="form-group">
											<label for="exampleInputName2" style="    margin: 0px 10px 0px 0px;">배송수단  </label>
											<select class="form-control" id="exampleInputName2" style="width: 150px">
												<option class="option-1">우체국</option>
												<option class="option-1">Fedex</option>
												<option class="option-1">DHL</option>


											</select>
											<img src="<?php echo base_url("assets2/img/info.png"); ?>" style="" data-popover="true" data-html=true data-toggle="popover" data-content="More Info">
										</div>
										<div class="form-group">
											<label for="exampleInputName2" style="    margin: 0px 10px 0px 0px;">배송유형   </label>
											<select class="form-control" id="delivery_type" style="width: 150px">
												<option class="option-1">서장</option>
												<option class="option-1">소형포장(CN22)</option>
																<!-- <option class="option-1">K-Packet</option>
																<option class="option-1">EMS</option> -->
															</select>
															<img src="<?php echo base_url("assets2/img/info.png"); ?>" style="" data-popover="true" data-html=true data-toggle="popover" data-content="More Info">
														</div>
													</form>
													<p class="info_1_section" style="color: #21b4f9;font-size: 12px;margin-top: 10px;"> *서장은 길이 xx미만의 xxkq미만의 제품 배송</p>
												</div>
											</div>
										</div>
										<div class="panel panel-default">
											<div class="panel-heading" role="tab" id="headingTwo">
												<h4 class="panel-title">
													<a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
														<span class="fa fa-caret-down" style="color: #286090"></span> 2. 라벨 출력설정
													</a>
												</h4>
											</div>
											<div id="collapseTwo" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingTwo">
												<div class="panel-body">
													<h5>라벨에 포함될 내용을 선택하세요</h5>
													<div class="col-lg-6" style="padding: 0px;border-right: 1px solid #bbb;">
														<form class="form-inline"  style="">

															<table>
																<tr>
																	<Td colspan="2"><div class="form-group">
																		<label for="exampleInputName2" style=" margin: 0px;">From </label>
																		<input type="checkbox" class="form-group tick cn22from" checked >
																		<label for="exampleInputName2" style="  margin: 0px">To </label>
																		<input type="checkbox" class="form-group tick cn22to"  checked >
																	</div>
																</Td>
															</tr>
															<tr>
																<td><label for="exampleInputName2" style=" margin: 0px">세관 신고서(CN22)  </label></td>
																<td>	<input type="checkbox" class="form-group tick cn22tick"></td>
															</tr>
															<tr>
																<td><label for="exampleInputName2" style=" margin: 0px">판매자 로고  </label>
																	<img src="<?php echo base_url("assets2/img/info.png"); ?>" style="" data-popover="true" data-html=true data-toggle="popover" data-content="More Info"></td>
																	<td><input type="checkbox" class="form-group tick cn22logo" ></td>
																</tr>
																<tr>
																	<td><label for="exampleInputName2" style=" margin: 0px">판매자 문구  </label>
																		<img src="<?php echo base_url("assets2/img/info.png"); ?>" style="" data-popover="true" data-html=true data-toggle="popover" data-content="More Info"></td>
																		<td><input type="checkbox" class="form-group tick cn22phrase" ></td>
																	</tr>
																</table>
																<button type="submit" class="btn btn-primary" style="width: 95%" id="phrase_pop">문구 입력하기</button>
															</form>
														</div>
														<div class="col-lg-6">
															<table class="spacer">
																<tr >
																	<td class="cn22frombox" style=" background: #21b4f9;padding: 10px 10px 20px 10px; cursor: pointer;">From</td>
																	<td class="cn22box" rowspan="2" style="padding: 0px 10px 60px 10px;background: #eee; cursor: pointer;">CN22</td>
																</tr>
																<tr class="spacer">
																	<td class="cn22tobox" style=" background: #21b4f9;padding: 10px 10px 20px 10px; cursor: pointer;">To</td>
																</tr>
																<tr>
																	<td class="cn22phrasebox" style="padding: 10px;background: #eeeeee; cursor: pointer;">문구</td>
																	<td class="cn22logobox" style="padding: 10px;background: #eeeeee; cursor: pointer;">LOGO</td>
																</tr>
															</table>

														</div>
													</div>
												</div>
											</div>
											<div class="panel panel-default">
												<div class="panel-heading" role="tab" id="headingThree">
													<h4 class="panel-title">
														<a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
															<span class="fa fa-caret-down" style="color: #286090"></span> 3. 라벨 템플릿 <span style="color: #ef5227" id="size_text">(폼텍, 1x1)</span>
														</a>
													</h4>
												</div>
												<div id="collapseThree" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingThree">
													<div class="panel-body">
														<h5>라벨 템플릿을 선택하세요</h5>
														<div class="row" style="margin: 0px;">
															<div class="col-lg-8" style="padding: 0px;">
																<form class="form-inline"  style="">
																	<div class="form-group">
																		<label for="exampleInputName2" style="    margin: 0px 22px 0px 0px;">라벨지  </label>
																		<select class="form-control" id="exampleInputName2" style="width: 90px">
																			<option class="option-1">폼텍   </option>
																		</select>
																		<img src="<?php echo base_url("assets2/img/info.png"); ?>" style="" data-popover="true" data-html=true data-toggle="popover" data-content="More Info">
																	</div>
																	<div class="form-group">
																		<label for="exampleInputName2" style="    margin: 0px 10px 0px 0px;">라벨규격   </label>
																		<select class="form-control" id="print_label_dimensions" style="width: 90px">

																			<?php foreach ($print_labels as $row) : ?>

																				<option class="option-1" value="<?php echo $row['id']; ?>"><?php echo $row['cols_rows']; ?></option>
																			<?php endforeach; ?>

																		</select>
																		<img src="<?php echo base_url("assets2/img/info.png"); ?>" style="" data-popover="true" data-html=true data-toggle="popover" data-content="More Info">
																	</div>
																</form>
															</div>
															<div class="col-lg-4">
																<table style="display:" class="table table-bordered" id="onebyone">
																	<tr>
																		<td style="border-bottom:0">&nbsp;</td>
																	</tr>
																	<tr>
																		<td style="border-top:0">&nbsp;</td>
																	</tr>
																</table>
																<table  style="display: none" class="table table-bordered" id="onebytwo">
																	<tr>
																		<td>&nbsp;</td>
																	</tr>
																	<tr>
																		<td>&nbsp;</td>
																	</tr>
																</table>
																<table  style="display: none" class="table table-bordered" id="twobytwo">
																	<tr>
																		<td>&nbsp;</td>
																		<td>&nbsp;</td>
																	</tr>
																	<tr>
																		<td>&nbsp;</td>
																		<td>&nbsp;</td>
																	</tr>
																</table>

																<table  style="display: none" class="table table-bordered" id="threebyseven">
																	<tr>
																		<td>&nbsp;</td>
																		<td>&nbsp;</td>
																		<td>&nbsp;</td>
																	</tr>
																	<tr>
																		<td>&nbsp;</td>
																		<td>&nbsp;</td>
																		<td>&nbsp;</td>
																	</tr>
																	<tr>
																		<td>&nbsp;</td>
																		<td>&nbsp;</td>
																		<td>&nbsp;</td>
																	</tr>
																	<tr>
																		<td>&nbsp;</td>
																		<td>&nbsp;</td>
																		<td>&nbsp;</td>
																	</tr>
																	<tr>
																		<td>&nbsp;</td>
																		<td>&nbsp;</td>
																		<td>&nbsp;</td>
																	</tr>
																	<tr>
																		<td>&nbsp;</td>
																		<td>&nbsp;</td>
																		<td>&nbsp;</td>
																	</tr>
																	<tr>
																		<td>&nbsp;</td>
																		<td>&nbsp;</td>
																		<td>&nbsp;</td>
																	</tr>
																</table>
																<table  style="display: none" class="table table-bordered" id="threebyeight">
																	<tr>
																		<td>&nbsp;</td>
																		<td>&nbsp;</td>
																		<td>&nbsp;</td>
																	</tr>
																	<tr>
																		<td>&nbsp;</td>
																		<td>&nbsp;</td>
																		<td>&nbsp;</td>
																	</tr>
																	<tr>
																		<td>&nbsp;</td>
																		<td>&nbsp;</td>
																		<td>&nbsp;</td>
																	</tr>
																	<tr>
																		<td>&nbsp;</td>
																		<td>&nbsp;</td>
																		<td>&nbsp;</td>
																	</tr>
																	<tr>
																		<td>&nbsp;</td>
																		<td>&nbsp;</td>
																		<td>&nbsp;</td>
																	</tr>
																	<tr>
																		<td>&nbsp;</td>
																		<td>&nbsp;</td>
																		<td>&nbsp;</td>
																	</tr>
																	<tr>
																		<td>&nbsp;</td>
																		<td>&nbsp;</td>
																		<td>&nbsp;</td>
																	</tr>
																	<tr>
																		<td>&nbsp;</td>
																		<td>&nbsp;</td>
																		<td>&nbsp;</td>
																	</tr>
																</table>
															</div>
														</div>
														<h5><span style="cursor:pointer;" id="pageSize_pop">라벨 시작 위치 지정</span> |  <span style="font-weight: 200;font-size: 12px;"> 1열 2행 </span>		<button type="submit" class="btn btn-primary" style="">문구 입력하기</button></h5>
														<!-- <p style="color: #21b4f9;font-size: 12px;margin-top: 10px;"> *서장은 길이 xx미만의 xxkq미만의 제품 배송</p> -->
													</div>
												</div>
											</div>

											<div class="panel panel-default">
												<button type="submit" class="btn btn-primary generatepdf" style="width: 100%">PRINT</button>
												<input type="hidden" id="orderids">
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


					<div class="modal fade in" id="myModalPhrase" style="display: none">
						<div class="modal-dialog">
							<div class="modal-content">
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
									<h3 class="text-center">판매자 문구 추가</h3>
									<h5 class="text-center">라벨 하단에 판매자 문구를 추가할 수 있습니다.(예, 취급주의)</h5>
									<form class="form-inline">

										<div class="form-group col-xs-10">

											<input type="text" class="form-control" id="" placeholder="최대 20자로 입력할 수 있습니다 " style="width: 100%">
										</div>
										<button type="submit" class="btn btn-default" style="background: #444444;color: #fff;padding-left: 20px; padding-right: 20px">등록</button>
									</form>
								</div>
								<div class="modal-body">

									<table class="table table-striped" id="tblGrid">
										<thead id="tblHead">
											<tr>
												<th> &nbsp; </th>
												<th class="text-center">판매자 문구</th>
												<th class="text-center">관리</th>
											</tr>
										</thead>
										<tbody>
											<tr>
												<td><input type="checkbox" class="form-group tick"></td>
												<td style="font-size: 12px; vertical-align: middle;">고객님에게 편리한 라벨출력에 최선을 다하겠습니다.</td>
												<td class="text-right">
													<button type="submit" class="btn btn-primary">수정</button>
													<button type="submit" class="btn btn-default"  style="background: #444444;color: #fff;">삭제</button>
												</td>
											</tr>
											
										</tbody>
									</table>
									<br>
									<div class="form-group " style="width: 50%; margin: 0px auto;">
										<button class="btn btn-lg btn-default" data-dismiss="modal" style="background: #999999;color: #fff; padding: 10px 31px;">취소</button>
										<button class="btn btn-lg btn-primary">입력하기</button>
										<div class="clearfix"></div>
									</div>
								</div>

							</div><!-- /.modal-content -->
						</div><!-- /.modal-dialog -->
					</div><!-- /.modal -->

					<style>
						.table-bordered {
							border: 0px solid #ddd;
						}
						.onebyone{
							padding: 20px 20px 30px 20px;
							font-size: 40px;
							color: #21b4f9;
						}
						.onebytwo{
							padding: 20px 20px 30px 20px;
							font-size: 40px;
							color: #21b4f9;
						}
						.twobytwo{
							padding: 10px 40px !important;
							font-size: 70px;
							color: #21b4f9;
						}
						.threebyseven{
							padding: 0px 32px !important;
							font-size: 26px;
							color: #21b4f9;
						}
						.table{
							margin-bottom: 0px;
						}
					</style>
					<div class="modal fade in" id="myModal" style="display: none">
						<div class="modal-dialog">
							<div class="modal-content">
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
									<h3 class="text-center">라벨 시작 위치 지정</h3>
									<h5 class="text-left">라벨 출력 시작 위치를 선택 하세요</h5>
									<h5 class="text-left">라벨지의 여분이 남아 있는 경우 재활용 가능합니다</h5>

									<form class="form-inline">
										<div class="form-group">
											<label for="exampleInputName2">라벨규격</label>
											<select class="form-control" id="print_label_dimensions_popup" style="/*width: 50px;*/">
												<option class="option-11" value="1">1x1 </option>
												<option class="option-11" value="2">1x2 </option>
												<option class="option-11" value="3">2x2 </option>
												<option class="option-11" value="4">3x7 </option>
												<option class="option-11" value="5">3x8 </option>
											</select>
										</div>
										<div class="form-group" style="width: 25%">
											<label for="exampleInputEmail2">열 :</label>
											<input type="text" class="form-control" id="" placeholder="1" style="width:38%">
										</div>

										<div class="form-group" style="width: 25%">
											<label for="exampleInputEmail2">행 :</label>
											<input type="text" class="form-control" id="" placeholder="1" style="width:38%">
										</div>
									</form>
								</div>
								<div class="modal-body">
									<div style="padding: 10px;border: 1px solid #ccc;margin-bottom: 10px">
										<!-- 1x1 -->
										<table class="table table-bordered" id="onebyone_pop" style="display: ">
											<tr>
												<td class="onebyone">
													<input type="radio" name="startpoint1" value="1" checked class="form-group tick" style="margin: 0px 160px 0px 10px;"> 1</td>
												</tr>
										<!-- 1x2 -->
										<table class="table table-bordered" id="onebytwo_pop" style="display: none">
											<tr>
												<td class="onebytwo">
													<input type="radio" name="startpoint2" value="1" class="form-group tick" style="margin: 0px 160px 0px 10px;"> 1</td>
												</tr>
												<tr>
													<td class="onebytwo">
														<input type="radio" name="startpoint2" value="2" class="form-group tick" style="margin: 0px 160px 0px 10px;"> 2</td>
													</tr>
												</table>
												<!-- 2x2 -->		
												<table class="table table-bordered" id="twobytwo_pop" style="display: none">
													<tr>
														<td class="twobytwo" style="">
															<input type="radio" name="startpoint3" value="1" class="form-group tick" style="margin: 0px 10px 0px 10px;"> 1</td>
															<td class="twobytwo" style=""><input type="radio" name="startpoint3" value="3" class="form-group tick" style="margin: 0px 10px 0px 10px;"> 3</td>
														</tr>
														<tr>
															<td class="twobytwo" style="">
																<input type="radio" name="startpoint3" value="2" class="form-group tick" style="margin: 0px 10px 0px 10px;"> 2</td>
																<td class="twobytwo" style="">
																	<input type="radio" name="startpoint3" value="4" class="form-group tick" style="margin: 0px 10px 0px 10px;"> 4</td>
																</tr>
															</table>
															<!-- 3x7 -->		
															<table class="table table-bordered" id="threebyseven_pop" style="display: none">
																<tr>
																	<td class="threebyseven" style="">
																		<input type="radio" name="startpoint4" value="1"  class="form-group tick" style="margin: 0px 10px 0px 10px;"> 1</td>
																		<td class="threebyseven" style="">
																			<input type="radio" name="startpoint4" value="8"  class="form-group tick" style="margin: 0px 10px 0px 10px;"> 8</td>
																			<td class="threebyseven" style="">
																				<input type="radio" name="startpoint4" value="15"  class="form-group tick" style="margin: 0px 10px 0px 10px;"> 15</td>
																			</tr>
																			<tr>
																				<td class="threebyseven" style="">
																					<input type="radio" name="startpoint4" value="2"  class="form-group tick" style="
																					margin: 0px 10px 0px 10px;
																					"> 2</td>
																					<td class="threebyseven" style="">
																						<input type="radio" name="startpoint4" value="9"  class="form-group tick" style="
																						margin: 0px 10px 0px 10px;
																						"> 9</td>
																						<td class="threebyseven" style="">
																							<input type="radio" name="startpoint4" value="16"  class="form-group tick" style="
																							margin: 0px 10px 0px 10px;
																							"> 16</td>
																						</tr>
																						<tr>
																							<td class="threebyseven" style="">
																								<input type="radio" name="startpoint4" value="3"  class="form-group tick" style="
																								margin: 0px 10px 0px 10px;
																								"> 3</td>
																								<td class="threebyseven" style="">
																									<input type="radio" name="1xstartpoint4" value="10"  class="form-group tick" style="
																									margin: 0px 10px 0px 10px;
																									"> 10</td>
																									<td class="threebyseven" style="">
																										<input type="radio" name="startpoint4" value="17"  class="form-group tick" style="
																										margin: 0px 10px 0px 10px;
																										"> 17</td>
																									</tr>
																									<tr>
																										<td class="threebyseven" style="">
																											<input type="radio" name="startpoint4" value="4"  class="form-group tick" style="
																											margin: 0px 10px 0px 10px;
																											"> 4</td>
																											<td class="threebyseven" style="">
																												<input type="radio" name="startpoint4" value="11"  class="form-group tick" style="
																												margin: 0px 10px 0px 10px;
																												"> 11</td>
																												<td class="threebyseven" style="">
																													<input type="radio" name="startpoint4" value="18"  class="form-group tick" style="
																													margin: 0px 10px 0px 10px;
																													"> 18</td>
																												</tr>
																												<tr>
																													<td class="threebyseven" style="">
																														<input type="radio" name="startpoint4" value="5"  class="form-group tick" style="
																														margin: 0px 10px 0px 10px;
																														"> 5</td>
																														<td class="threebyseven" style="">
																															<input type="radio" name="startpoint4" value="12"  class="form-group tick" style="
																															margin: 0px 10px 0px 10px;
																															"> 12</td>
																															<td class="threebyseven" style="">
																																<input type="radio" name="startpoint4" value="19"  class="form-group tick" style="
																																margin: 0px 10px 0px 10px;
																																"> 19</td>
																															</tr>
																															<tr>
																																<td class="threebyseven" style="">
																																	<input type="radio" name="startpoint4" value="6"  class="form-group tick" style="
																																	margin: 0px 10px 0px 10px;
																																	"> 6</td>
																																	<td class="threebyseven" style="">
																																		<input type="radio" name="startpoint4" value="13"  class="form-group tick" style="
																																		margin: 0px 10px 0px 10px;
																																		"> 13</td>
																																		<td class="threebyseven" style="">
																																			<input type="radio" name="startpoint4" value="20"  class="form-group tick" style="
																																			margin: 0px 10px 0px 10px;
																																			"> 20</td>
																																		</tr>
																																		<tr>
																																			<td class="threebyseven" style="">
																																				<input type="radio" name="startpoint4" value="7"  class="form-group tick" style="
																																				margin: 0px 10px 0px 10px;
																																				"> 7</td>
																																				<td class="threebyseven" style="">
																																					<input type="radio" name="startpoint4" value="14"  class="form-group tick" style="
																																					margin: 0px 10px 0px 10px;
																																					"> 14</td>
																																					<td class="threebyseven" style="">
																																						<input type="radio" name="startpoint4" value="21"  class="form-group tick" style="
																																						margin: 0px 10px 0px 10px;
																																						"> 21</td>
																																					</tr>
																																				</table>
																																				<!-- 3x8 -->		
																																				<table class="table table-bordered" id="threebyeight_pop" style="display: none">
																																					<tr>
																																						<td class="threebyseven" style="">
																																							<input type="radio" name="startpoint5" value="1"  class="form-group tick" style="
																																							margin: 0px 10px 0px 10px;
																																							"> 1</td>
																																							<td class="threebyseven" style="">
																																								<input type="radio" name="startpoint5" value="9"  class="form-group tick" style="
																																								margin: 0px 10px 0px 10px;
																																								"> 9</td>
																																								<td class="threebyseven" style="">
																																									<input type="radio" name="startpoint5" value="17"  class="form-group tick" style="
																																									margin: 0px 10px 0px 10px;
																																									"> 17</td>
																																								</tr>
																																								<tr>
																																									<td class="threebyseven" style="">
																																										<input type="radio" name="startpoint5" value="2"  class="form-group tick" style="
																																										margin: 0px 10px 0px 10px;
																																										"> 2</td>
																																										<td class="threebyseven" style="">
																																											<input type="radio" name="startpoint5" value="10"  class="form-group tick" style="
																																											margin: 0px 10px 0px 10px;
																																											"> 10</td>
																																											<td class="threebyseven" style="">
																																												<input type="radio" name="startpoint5" value="18"  class="form-group tick" style="
																																												margin: 0px 10px 0px 10px;
																																												"> 18</td>
																																											</tr>
																																											<tr>
																																												<td class="threebyseven" style="">
																																													<input type="radio" name="startpoint5" value="3"  class="form-group tick" style="
																																													margin: 0px 10px 0px 10px;
																																													"> 3</td>
																																													<td class="threebyseven" style="">
																																														<input type="radio" name="startpoint5" value="11"  class="form-group tick" style="
																																														margin: 0px 10px 0px 10px;
																																														"> 11</td>
																																														<td class="threebyseven" style="">
																																															<input type="radio" name="startpoint5" value="19"  class="form-group tick" style="
																																															margin: 0px 10px 0px 10px;
																																															"> 19</td>
																																														</tr>
																																														<tr>
																																															<td class="threebyseven" style="">
																																																<input type="radio" name="startpoint5" value="4"  class="form-group tick" style="
																																																margin: 0px 10px 0px 10px;
																																																"> 4</td>
																																																<td class="threebyseven" style="">
																																																	<input type="radio" name="startpoint5" value="12"  class="form-group tick" style="
																																																	margin: 0px 10px 0px 10px;
																																																	"> 12</td>
																																																	<td class="threebyseven" style="">
																																																		<input type="radio" name="startpoint5" value="20"  class="form-group tick" style="
																																																		margin: 0px 10px 0px 10px;
																																																		"> 20</td>
																																																	</tr>
																																																	<tr>
																																																		<td class="threebyseven" style="">
																																																			<input type="radio" name="startpoint5" value="5"  class="form-group tick" style="
																																																			margin: 0px 10px 0px 10px;
																																																			"> 5</td>
																																																			<td class="threebyseven" style="">
																																																				<input type="radio" name="startpoint5" value="13"  class="form-group tick" style="
																																																				margin: 0px 10px 0px 10px;
																																																				"> 13</td>
																																																				<td class="threebyseven" style="">
																																																					<input type="radio" name="startpoint5" value="21"  class="form-group tick" style="
																																																					margin: 0px 10px 0px 10px;
																																																					"> 21</td>
																																																				</tr>
																																																				<tr>
																																																					<td class="threebyseven" style="">
																																																						<input type="radio" name="startpoint5" value="6"  class="form-group tick" style="
																																																						margin: 0px 10px 0px 10px;
																																																						"> 6</td>
																																																						<td class="threebyseven" style="">
																																																							<input type="radio" name="startpoint5" value="14"  class="form-group tick" style="
																																																							margin: 0px 10px 0px 10px;
																																																							"> 14</td>
																																																							<td class="threebyseven" style="">
																																																								<input type="radio" name="startpoint5" value="22"  class="form-group tick" style="
																																																								margin: 0px 10px 0px 10px;
																																																								"> 22</td>
																																																							</tr>
																																																							<tr>
																																																								<td class="threebyseven" style="">
																																																									<input type="radio" name="startpoint5" value="7"  class="form-group tick" style="
																																																									margin: 0px 10px 0px 10px;
																																																									"> 7</td>
																																																									<td class="threebyseven" style="">
																																																										<input type="radio" name="startpoint5" value="15"  class="form-group tick" style="
																																																										margin: 0px 10px 0px 10px;
																																																										"> 15</td>
																																																										<td class="threebyseven" style="">
																																																											<input type="radio" name="startpoint5" value="21"  class="form-group tick" style="
																																																											margin: 0px 10px 0px 10px;
																																																											"> 21</td>
																																																										</tr>

																																																										<tr>
																																																											<td class="threebyseven" style="">
																																																												<input type="radio" name="startpoint5" value="8"  class="form-group tick" style="
																																																												margin: 0px 10px 0px 10px;
																																																												"> 8</td>
																																																												<td class="threebyseven" style="">
																																																													<input type="radio" name="startpoint5" value="16"  class="form-group tick" style="
																																																													margin: 0px 10px 0px 10px;
																																																													"> 16</td>
																																																													<td class="threebyseven" style="">
																																																														<input type="radio" name="startpoint5" value="24"  class="form-group tick" style="
																																																														margin: 0px 10px 0px 10px;
																																																														"> 24</td>
																																																													</tr>
																																																												</table>

																																																											</div>
																																																											<div class="form-group " style="width: 50%; margin: 0px auto;">
																																																												<button class="btn btn-lg btn-default" data-dismiss="modal"  style="background: #999999;color: #fff; padding: 10px 31px;">취소</button>
																																																												<button class="btn btn-lg btn-primary"   style="padding: 10px 31px;">확인</button>
																																																												<div class="clearfix"></div>
																																																											</div>
																																																										</div>

																																																									</div><!-- /.modal-content -->
																																																								</div><!-- /.modal-dialog -->
																																																							</div><!-- /.modal -->


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
    <script src="https://cdn.datatables.net/buttons/1.3.1/js/dataTables.buttons.min.js"></script>

    <!-- <script src="//cdn.datatables.net/buttons/1.3.1/js/buttons.flash.min.js"></script> -->
    <script src="//cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>

    <!-- <script src="//cdn.rawgit.com/bpampuch/pdfmake/0.1.27/build/pdfmake.min.js"></script> -->
    <!-- <script src="//cdn.rawgit.com/bpampuch/pdfmake/0.1.27/build/vfs_fonts.js"></script> -->
    <script src="//cdn.datatables.net/buttons/1.3.1/js/buttons.html5.min.js"></script>
    <!-- <script src="//cdn.datatables.net/buttons/1.3.1/js/buttons.print.min.js"></script> -->

    <script src="https://cdn.datatables.net/select/1.2.2/js/dataTables.select.min.js"></script>


    <script>

    	$('.collapse_tbl').click(function(){
    		$('.tbl_border').addClass("border-bottom");
    	});

    	$('body').on('click', '.cn22from', function() {
    		if ($(this).is(":checked")) $('.cn22frombox').css({'background-color':'#21b4f9'});
    		else $('.cn22frombox').css({'background-color':'#eee'});

    		checkDimensionToSelect();
    	});
    	$('body').on('click', '.cn22to', function() {
    		if ($(this).is(":checked")) $('.cn22tobox').css({'background-color':'#21b4f9'});
    		else $('.cn22tobox').css({'background-color':'#eee'});

    		checkDimensionToSelect();
    	});
    	$('body').on('click', '.cn22tick', function() {
    		if ($(this).is(":checked")) $('.cn22box').css({'background-color':'#21b4f9'});
    		else $('.cn22box').css({'background-color':'#eee'});

    		checkDimensionToSelect();
    	});
    	$('body').on('click', '.cn22logo', function() {
    		if ($(this).is(":checked")) $('.cn22logobox').css({'background-color':'#21b4f9'});
    		else $('.cn22logobox').css({'background-color':'#eee'});
    	});
    	$('body').on('click', '.cn22phrase', function() {
    		if ($(this).is(":checked")) $('.cn22phrasebox').css({'background-color':'#21b4f9'});
    		else $('.cn22phrasebox').css({'background-color':'#eee'});
    	});
		////////////////////////////////////////////////////////////////////////////////
		////////////////////////////////////////////////////////////////////////////////
		////////////////////////////////////////////////////////////////////////////////
		$('body').on('click', '.cn22frombox', function() {
			if ($(this).css('background-color') == 'rgb(33, 180, 249)') {
				$(this).css({'background-color':'#eee'});
				$('.cn22from').prop("checked", false);
			} 	
			else
			{
				$(this).css({'background-color':'#21b4f9'});
				$('.cn22from').prop('checked', true);
			} 
			checkDimensionToSelect();
		});
		$('body').on('click', '.cn22tobox', function() {
			if ($(this).css('background-color') == 'rgb(33, 180, 249)') {
				$(this).css({'background-color':'#eee'});
				$('.cn22to').prop("checked", false);
			} 	
			else
			{
				$(this).css({'background-color':'#21b4f9'});
				$('.cn22to').prop('checked', true);
			} 
			checkDimensionToSelect();
		});
		$('body').on('click', '.cn22box', function() {
			if ($(this).css('background-color') == 'rgb(33, 180, 249)') {
				$(this).css({'background-color':'#eee'});
				$('.cn22tick').prop("checked", false);
			} 	
			else
			{
				$(this).css({'background-color':'#21b4f9'});
				$('.cn22tick').prop('checked', true);
			} 
			checkDimensionToSelect();
		});
		$('body').on('click', '.cn22logobox', function() {
			if ($(this).css('background-color') == 'rgb(33, 180, 249)') {
				$(this).css({'background-color':'#eee'});
				$('.cn22logo').prop("checked", false);
			} 	
			else
			{
				$(this).css({'background-color':'#21b4f9'});
				$('.cn22logo').prop('checked', true);
			} 
		});
		$('body').on('click', '.cn22phrasebox', function() {
			if ($(this).css('background-color') == 'rgb(33, 180, 249)') {
				$(this).css({'background-color':'#eee'});
				$('.cn22phrase').prop("checked", false);
			} 	
			else
			{
				$(this).css({'background-color':'#21b4f9'});
				$('.cn22phrase').prop('checked', true);
			} 
		});

		$('#delivery_type').on('change', function() {
			if ($(this).val() == "서장") $('.info_1_section').show();
			else $('.info_1_section').hide();
		});

		function checkDimensionToSelect()
		{
			var cn22from_check = $('.cn22from').is(":checked");
			var cn22to_check = $('.cn22to').is(":checked");
			var cn22tick_check = $('.cn22tick').is(":checked");
			
			if (cn22from_check && cn22to_check && !cn22tick_check)
			{	
				$('#print_label_dimensions option:nth-child(4), #print_label_dimensions_popup option:nth-child(4)').attr('selected', 'selected');
				$('#print_label_dimensions option:nth-child(1),print_label_dimensions_popup option:nth-child(1)').attr('selected', false);

				for (i=0;i<=3;i++) $('#print_label_dimensions option:nth-child('+i+'),#print_label_dimensions_popup option:nth-child('+i+')').prop('disabled', true);
				for (i=4;i<=6;i++) $('#print_label_dimensions option:nth-child('+i+'), #print_label_dimensions_popup option:nth-child('+i+')').prop('disabled', false);
			}

			if (cn22tick_check && cn22from_check ||
				cn22tick_check && cn22to_check || 
				cn22tick_check && cn22from_check && cn22from_check)
			{
				$('#print_label_dimensions option:nth-child(1), #print_label_dimensions_popup option:nth-child(1)').attr('selected', 'selected');
				$('#print_label_dimensions option:nth-child(4), #print_label_dimensions_popup option:nth-child(4)').attr('selected', false);

				for (i=0;i<=3;i++) $('#print_label_dimensions option:nth-child('+i+'), #print_label_dimensions_popup option:nth-child('+i+')').prop('disabled', false);
				for (i=4;i<=6;i++) $('#print_label_dimensions option:nth-child('+i+'), #print_label_dimensions_popup option:nth-child('+i+')').prop('disabled', true);
			}
			displaySize($('#print_label_dimensions'));
		}

		function displaySize(id)
		{
			var sizes = id.val();

			switch (sizes)
			{
				case '1' :
				$('#onebyone, #onebyone_pop').show();
				$('#onebytwo, #twobytwo, #threebyseven, #threebyeight, #onebytwo_pop, #twobytwo_pop, #threebyseven_pop, #threebyeight_pop').hide();

				$('#size_text').html('(폼텍, 1x1)');
				break;

				case '2' :
				$('#onebytwo, #onebytwo_pop').show();
				$('#onebyone, #twobytwo, #threebyseven, #threebyeight, #onebyone_pop, #twobytwo_pop, #threebyseven_pop, #threebyeight_pop').hide();

				$('#size_text').html('(폼텍, 1x2)');
				break;

				case '3' :
				$('#twobytwo, #twobytwo_pop').show();
				$('#onebyone, #onebytwo, #threebyseven, #threebyeight, #onebyone_pop, #onebytwo_pop, #threebyseven_pop, #threebyeight_pop').hide();

				$('#size_text').html('(폼텍, 2x2)');
				break;

				case '4' :
				$('#threebyseven, #threebyseven_pop').show();
				$('#onebyone, #onebytwo, #twobytwo, #threebyeight, #onebyone_pop, #onebytwo_pop, #twobytwo_pop, #threebyeight_pop').hide();

				$('#size_text').html('(폼텍, 3x7)');
				break;

				case '5' :
				$('#threebyeight, #threebyeight_pop').show();
				$('#onebyone, #onebytwo, #twobytwo, #threebyseven, #onebyone_pop, #onebytwo_pop, #twobytwo_pop, #threebyseven_pop').hide();

				$('#size_text').html('(폼텍, 3x8)');
				break;
			}
		}

		$('body').on('change','#print_label_dimensions, #print_label_dimensions_popup', function() {
			var id = $(this);
			displaySize(id);

			var sizeid = id.val();

			$('#print_label_dimensions_popup').val(sizeid);
			$('#print_label_dimensions').val(sizeid);
		});

		$('body').on('click','#phrase_pop', function() {
			$('#myModalPhrase').modal('show');
			return false;
		});

		$('body').on('click','#pageSize_pop', function() {
			$('#myModal').modal('show');
			return false;
		});

		var table;
		$('.generatepdf').on('click', function() {
			var orderids = $('#orderids').val();
			var dimensions = $('#print_label_dimensions').val();

			var startpoint = $('input[name=startpoint'+dimensions+']:checked').val();
			if (startpoint == undefined) startpoint = 0;
			//return null;

			if (orderids == "") 
			{
				alert ('Please select order(s) to continue');
				return null;
			}
			$.ajax({
				url  : '<?php echo base_url('/order/process'); ?>',
				data : 'ids=' + orderids + ',' + dimensions+ ',' + startpoint,
				type : 'POST',
				dataType: 'JSON',
				success : function(data) {
					window.open("<?php echo base_url('/order/generate/'); ?>" + data, "_blank");
				}
			});
		});

		$('#order-select-all').on('click', function(){
			var rows = table.rows({ 'search': 'applied' }).nodes();
			$('input[type="checkbox"]', rows).prop('checked', this.checked);
			getallCheckOrders();
		});

		// Handle click on checkbox to set state of "Select all" control
		$('#table tbody').on('change', 'input[type="checkbox"]', function(){
			// If checkbox is not checked
			if (!this.checked){
				var el = $('#order-select-all').get(0);
				// If "Select all" control is checked and has 'indeterminate' property
				if(el && el.checked && ('indeterminate' in el)){
				// Set visual state of "Select all" control
				// as 'indeterminate'
				el.indeterminate = true;
			}
		}
		getallCheckOrders();
	});

		function getallCheckOrders()
		{
			var orderItems = 0;
			var orderItemsValue = '';
			table.$('input[type="checkbox"]').each(function() {
				if(this.checked){
					// Create a hidden element
					//console.log (this.value);
					//console.log (this.id);
					//orderItems += this.id + ',';
					orderItemsValue += this.value + ',';

					orderItems++;
				}
			});	
			//console.log (orderItems.length-1);
			$('.info_order_list').html('주문 '+orderItems+'개가 선택되었습니다');

			$('#orderids').val(orderItemsValue.substr(0, orderItemsValue.length-1));
		}

		$(document).ready(function() {
			checkDimensionToSelect();
		    //datatables
		    table = $('#table').DataTable({ 
		    	// "dom": '<"top"i>rt<"bottom"flp><"clear">',
		    	"sDom": '<t><"#info"lip><"#export"B>',
		    	// dom: 'Bfrtip',
		    	buttons: [
		    	'excel'
		    	],
		    	"lengthMenu": [[5, 10, 15, -1], [5, 10, 20, "All"]],
		        "processing": true, //Feature control the processing indicator.
		       	"serverSide": true, //Feature control DataTables' servermside processing mode.
		        //"order": [], //Initial no order.
		        "iDisplayLength" :5,
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
		            "targets": [ 0,1,2,3,4,5,6 ], //first column / numbering column
		            "orderable": false, //set not orderable
		        },
		        ],
		        
		    });

		    $('.buttons-html5').html('<button type="submit" class="btn btn-primary">엑셀 다운로드</button>');
		});
	</script>
	<script>
		var originalLeave = $.fn.popover.Constructor.prototype.leave;
		$.fn.popover.Constructor.prototype.leave = function(obj){
			var self = obj instanceof this.constructor ?
			obj : $(obj.currentTarget)[this.type](this.getDelegateOptions()).data('bs.' + this.type)
			var container, timeout;
			
			originalLeave.call(this, obj);
			
			if(obj.currentTarget) {
				container = $(obj.currentTarget).siblings('.popover')
				timeout = self.timeout;
				container.one('mouseenter', function(){
						//We entered the actual popover – call off the dogs
						clearTimeout(timeout);
						//Let's monitor popover content instead
						container.one('mouseleave', function(){
							$.fn.popover.Constructor.prototype.leave.call(self, self);
						});
					})
			}
		};


		$('body').popover({ selector: '[data-popover]', trigger: 'click hover', placement: 'right', delay: {show: 50, hide: 200}});
	</script>
	<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
</body>
</html>
