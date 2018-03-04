<style>
  label {
    margin: 0px 20px;
  }
  a:hover, a:focus 
  {
    text-decoration: none;
  }
</style>
<div class="container-fluid">
  <div class="row">


   <div class="col-sm-9 ">
    <h3></h3>
    <ul  class="nav nav-pills nav-orders">
     <li class="active">
      <a  href="#1b" data-toggle="tab">전체</a>
      <!-- <a  href="#1b" data-toggle="tab">전체(<span id="total_order_count_sub"><?php #echo $total_orders; ?></span>)</a> -->
    </li>
    <li>
      <a href="#2b" data-toggle="tab">결제완료(배송전)</a>
    </li>

    <li>
      <a href="#3b" data-toggle="tab">피드백 대기</a>
    </li>

  </ul>
  <div class="tab-content tab-content-orders clearfix">
   <div class="tab-pane active" id="1b">
    <div class="row" >
     <div class="col-md-12">
      <form class="form-inline"  style="background: #ddd; padding: 30px 20px;margin: 30px 0px;">
       <div class="form-group">
        <label for="exampleInputName2">기간 </label>
        <select class="form-control" id="daterange1" style="width: 80px;">
        <option class="option-11" value="0">All </option>
         <option class="option-11" value="7">7일 </option>
         <option class="option-11" value="15">15일 </option>
         <option class="option-11" value="30">30일 </option>
         <option class="option-11" value="60">60일 </option>
         <option class="option-11" value="90">90일 </option>
       </select>
     </div>
     <div class="form-group">
      <label for="exampleInputEmail2">판매채널 </label>
      <select class="form-control" id="salechannel"  style="width: 120px;">
       <option class="option-22">eBay </option>
       <!-- <option class="option-22">Amazon </option>
       <option class="option-22">Etsy </option> -->
     </select>
   </div>
   <div class="form-group">
    <label for="exampleInputEmail2">정렬 순 </label>
    <select class="form-control" id="table_main_sort" style="width: 150px;">
     <option class="option-33" value="desc">최신 주문 </option>
     <option class="option-33" value="asc">오래된 주문 </option>
   </select>
 </div>
 <!-- <button type="submit" class="btn btn-primary">검색 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="fa fa-search"></span></button> -->
</form>
<div class="table-responsive">
 <table class="table" id="table" >
  <thead>
   <tr>
    <th width="10px"><input id="order-select-all" type="checkbox" class="form-group tick"></th>
    <th style="width: 70px;">일련번호</th>
    <th style="width: 120px;">주문일자</th>
    <th style="width: 80px;">판매채널</th>
    <th style="width: 150px;">주문내역</th>
    <th style="width: 120px;">주문자ID</th>
    <th style="width: 80px;">진행현황</th>
  </tr>
</thead>
<tbody>

  											<!-- <tr>
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
  													<span><img src="<?php #echo base_url("assets2/img/icon-1.png"); ?>"></span>
  													<span><img src="<?php #echo base_url("assets2/img/icon-2.png"); ?>"></span>
  													<span><img src="<?php #echo base_url("assets2/img/icon-3.png"); ?>"></span>
  													<span><img src="<?php #echo base_url("assets2/img/icon-4.png"); ?>"></span>
  													<span><img src="<?php #echo base_url("assets2/img/icon-5.png"); ?>"></span>
  												</td>
  											</tr> -->
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
					<div class="row">
           <div class="col-md-12">
            <form class="form-inline"  style="background: #ddd; padding: 30px 20px;margin: 30px 0px;">
             <div class="form-group">
              <label for="exampleInputName2">기간 </label>
              <select class="form-control" id="daterange2" style="width: 80px;">
                <option class="option-11" value="0">All </option>
               <option class="option-11"  value="7">7일 </option>
               <option class="option-11" value="15">15일 </option>
               <option class="option-11" value="30">30일 </option>
               <option class="option-11" value="60">60일 </option>
               <option class="option-11" value="90">90일 </option>
               
             </select>
           </div>
           <div class="form-group">
            <label for="exampleInputEmail2">판매채널 </label>
            <select class="form-control" id="salechannel"  style="width: 120px;">
             <option class="option-22">eBay </option>
             <!-- <option class="option-22">Amazon </option>
             <option class="option-22">Etsy </option> -->
           </select>
         </div>
         <div class="form-group">
          <label for="exampleInputEmail2">정렬 순 </label>
          <select class="form-control" id="table_delivery_sort"  style="width: 150px;">
            <option class="option-33" value="desc">최신 주문 </option>
            <option class="option-33" value="asc">오래된 주문 </option>
         </select>
       </div>
       <!-- <button type="submit" class="btn btn-primary">검색 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="fa fa-search"></span></button> -->
     </form>
     <div class="table-responsive">
       <table class="table" id="table_delivery">
        <thead>
         <tr>
          <th><input id="order-select-all" type="checkbox" class="form-group tick"></th>
          <th style="width: 70px;">일련번호</th>
          <th style="width: 120px;">주문일자</th>
          <th style="width: 80px;">판매채널</th>
          <th style="width: 150px;">주문내역</th>
          <th style="width: 120px;">주문자ID</th>
          <th style="width: 80px;">진행현황</th>
        </tr>
      </thead>
      <tbody>
      </tbody>
    </table>
  </div>
  <div class="col-md-6"  style="margin: 30px 0px;">
  </div>
</div>
</div>
</div>

<div class="tab-pane" id="3b">
 <div class="row">
   <div class="col-md-12">
    <form class="form-inline"  style="background: #ddd; padding: 30px 20px;margin: 30px 0px;">
     <div class="form-group">
      <label for="exampleInputName2">기간 </label>
      <select class="form-control" id="daterange3" style="width: 80px;">
      <option class="option-11" value="0">All </option>
       <option class="option-11" value="7">7일 </option>
       <option class="option-11" value="15">15일 </option>
       <option class="option-11" value="30">30일 </option>
       <option class="option-11" value="60">60일 </option>
       <option class="option-11" value="90">90일 </option>
       
     </select>
   </div>
   <div class="form-group">
    <label for="exampleInputEmail2">판매채널 </label>
    <select class="form-control" id="salechannel"  style="width: 120px;">
     <option class="option-22">eBay </option>
     <!-- <option class="option-22">Amazon </option>
     <option class="option-22">Etsy </option> -->
   </select>
 </div>
 <div class="form-group">
  <label for="exampleInputEmail2">정렬 순 </label>
  <select class="form-control" id="table_feedback_sort"  style="width: 150px;">
   <option class="option-33" value="desc">최신 주문 </option>
   <option class="option-33" value="asc">오래된 주문 </option>
 </select>
</div>
<!-- <button type="submit" class="btn btn-primary">검색 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="fa fa-search"></span></button> -->
</form>
<div class="table-responsive">
 <table class="table" id="table_feedback">
  <thead>
   <tr>
    <th><input id="order-select-all" type="checkbox" class="form-group tick"></th>
    <th style="width: 70px;">일련번호</th>
    <th style="width: 120px;">주문일자</th>
    <th style="width: 80px;">판매채널</th>
    <th style="width: 150px;">주문내역</th>
    <th style="width: 120px;">주문자ID</th>
    <th style="width: 80px;">진행현황</th>
  </tr>
</thead>
<tbody>
</tbody>
</table>
</div>
<div class="col-md-6"  style="margin: 30px 0px;">
</div>
</div>
</div>
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
    <h5 class="info_order_list" style="border: 1px solid;padding: 30px 20px; font-size: 16px;">주문 0개가 선택되었습니다</h5>
  </div>
  <div class="panel" id="accordion" role="tablist" aria-multiselectable="true">
    <div class="panel panel-default">
     <div class="panel-heading" role="tab" id="headingOne">
      <h4 class="panel-title">
       <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-controls="collapseOne">
        <span class="fa fa-caret-down" style="color: #286090"></span> 1. 배송 수단설정 <span style="color: #ef5227" id="ship_method_text">(우체국, 서장)</span>
      </a>
    </h4>
  </div>
  <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
    <div class="panel-body">
     <h5>라벨출력을 위한 배송 수단을 선택하세요</h5>
     <form class="form-inline"  style="">
      <div class="form-group">
       <label for="exampleInputName2" style="margin: 0px 10px 0px 0px;">배송수단  </label>
       <select class="form-control" id="ship_method" style="width: 150px">
        <option class="option-1" value="post_office">우체국</option>
        <option class="option-1" value="fedex">Fedex</option>
        <option class="option-1" value="dhl">DHL</option>


      </select>
      <img src="<?php echo base_url("assets2/img/info.png"); ?>" style="width: 19px; padding-left: 2px;" data-popover="true" data-html=true data-toggle="popover" data-content="More Info">
    </div>
    <div class="form-group">
     <label for="exampleInputName2" style="margin: 0px 10px 0px 0px;">배송유형   </label>
     <select class="form-control" id="delivery_type" style="width: 150px">
      <option class="option-1" value="document">서장</option>
      <option class="option-1" value="cn22">소형포장(CN22)</option>
      <option class="option-1" value="kpacket">K-Packet</option>
      <option class="option-1" value="ems">EMS</option>
																<!-- <option class="option-1">K-Packet</option>
																<option class="option-1">EMS</option> -->
															</select>
															<img src="<?php echo base_url("assets2/img/info.png"); ?>" style="width: 19px; padding-left: 2px;" data-popover="true" data-html=true data-toggle="popover" data-content="More Info">
														</div>
													</form>
													<p class="info_1_section" style="color: #21b4f9;font-size: 12px;margin-top: 10px;"> *서장은 길이 xx미만의 xxkq미만의 제품 배송</p>
												</div>
											</div>
										</div>
										<div class="panel panel-default">
											<div class="panel-heading" role="tab" id="headingTwo">
												<h4 class="panel-title">
													<a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-controls="collapseTwo">
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
																<td>	<input type="checkbox" class="form-group tick cn22tick" disabled></td>
															</tr>
															<tr>
																<td><label for="exampleInputName2" style=" margin: 0px">판매자 로고  </label>
																	<img src="<?php echo base_url("assets2/img/info.png"); ?>" style="width: 19px; padding-left: 2px;" data-popover="true" data-html=true data-toggle="popover" data-content="More Info"></td>
																	<td><input type="checkbox" class="form-group tick cn22logo" disabled></td>
																</tr>
																<tr>
																	<td><label for="exampleInputName2" style=" margin: 0px">판매자 문구  </label>
																		<img src="<?php echo base_url("assets2/img/info.png"); ?>" style="width: 19px; padding-left: 2px;" data-popover="true" data-html=true data-toggle="popover" data-content="More Info"></td>
																		<td><input type="checkbox" class="form-group tick cn22phrase" disabled></td>
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
														<a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-controls="collapseThree">
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
																		<img src="<?php echo base_url("assets2/img/info.png"); ?>" style="width: 19px; padding-left: 2px;" data-popover="true" data-html=true data-toggle="popover" data-content="More Info">
																	</div>
																	<div class="form-group">
																		<label for="exampleInputName2" style="    margin: 0px 10px 0px 0px;">라벨규격   </label>
																		<select class="form-control" id="print_label_dimensions" style="width: 90px">

																			<?php foreach ($print_labels as $row) : ?>

																				<option class="option-1" value="<?php echo $row['parent_label_paper_id']; ?>"><?php echo $row['cols_rows']; ?></option>
																			<?php endforeach; ?>

																		</select>
																		<img src="<?php echo base_url("assets2/img/info.png"); ?>" style="width: 19px; padding-left: 2px;" data-popover="true" data-html=true data-toggle="popover" data-content="More Info">
																	</div>
																</form>
															</div>
															<div class="col-lg-4">
																<table style="display: none" class="table table-bordered" id="onebyone">
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

																<table  style="display: " class="table table-bordered" id="threebyseven">
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
														<h5><span style="cursor:pointer; " id="pageSize_pop">라벨 시작 위치 지정</span> |  <span style="font-weight: 200;font-size: 12px;" id="cols_rows_info"> 1열 1행 </span>		<button type="submit" id="pageSize_pop_button" class="btn btn-primary" style="">시작위치수정</button></h5>
														<!-- <p style="color: #21b4f9;font-size: 12px;margin-top: 10px;"> *서장은 길이 xx미만의 xxkq미만의 제품 배송</p> -->
													</div>
												</div>
											</div>

											<div class="panel panel-default">
												<button type="submit" class="btn btn-primary generatepdf" style="width: 100%">라벨출력</button>
												<input type="hidden" id="orderids">
											</div>
										</div>

									</div>

								</div>
							</div>
						</div>

					</div>
					<!-- footer here -->


					<div class="modal fade in" id="myModalPhrase" style="display: none">
						<div class="modal-dialog">
							<div class="modal-content">
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
									<h3 class="text-center">판매자 문구 추가</h3>
									<h5 class="text-center">라벨 하단에 판매자 문구를 추가할 수 있습니다.(예, 취급주의)</h5>
									<form class="form-inline">

										<div class="form-group col-xs-10">

											<input type="text" class="form-control" id="seller_msg_search" placeholder="최대 20자로 입력할 수 있습니다 " style="width: 100%">
										</div>
										<button type="submit" class="btn btn-default" id="seller_msg_button" style="background: #444444;color: #fff;padding-left: 20px; padding-right: 20px">등록</button>
									</form>
								</div>
								<div class="modal-body">

									<table class="table table-striped" id="table_msg">
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
                  <button class="btn btn-lg btn-primary" data-dismiss="modal">입력하기</button>
										<button class="btn btn-lg btn-default" id="phrase_cancel" data-dismiss="modal" style="background: #999999;color: #fff; padding: 10px 31px;">취소</button>
										
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
												<?php foreach ($print_labels as $row) : ?>

                          <option class="option-1" value="<?php echo $row['parent_label_paper_id']; ?>"><?php echo $row['cols_rows']; ?></option>
                        <?php endforeach; ?>
											</select>
										</div>
										<div class="form-group" style="width: 25%">
											<label for="exampleInputEmail2">열 :</label>
											<input type="text" readonly class="form-control" id="cols_info" placeholder="0" style="width:38%">
										</div>

										<div class="form-group" style="width: 25%">
											<label for="exampleInputEmail2">행 :</label>
											<input type="text" readonly class="form-control" id="rows_info" placeholder="0" style="width:38%">
										</div>
									</form>
								</div>
								<div class="modal-body">
									<div id="startpoint_tables" style="padding: 10px;border: 1px solid #ccc;margin-bottom: 10px">
										<!-- 1x1 -->
										<table class="table table-bordered" id="onebyone_pop" style="display: none">
											<tr>
												<td class="onebyone">
													<input type="radio" name="startpoint1" disabled value="1" class="form-group tick" style="margin: 0px 160px 0px 10px;"> 1</td>
												</tr>
                      </table>
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
                       <table class="table table-bordered" id="threebyseven_pop" style="display: ">
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
                                 <input type="radio" name="startpoint4" value="10"  class="form-group tick" style="
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
                                                                <button class="btn btn-lg btn-default" id="startpoint_cancel" data-dismiss="modal" style="background: #999999;color: #fff; padding: 10px 31px;">취소</button>
                                                                <button class="btn btn-lg btn-primary" data-dismiss="modal" style="padding: 10px 31px;">확인</button>
                                                                <div class="clearfix"></div>
                                                              </div>
                                                            </div>

                                                          </div><!-- /.modal-content -->
                                                        </div><!-- /.modal-dialog -->
                                                      </div><!-- /.modal -->

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="<?php echo base_url("assets2/js/jquery.js"); ?>"><\/script>')</script>
    <script src="<?php echo base_url("assets2/js/bootstrap.min.js"); ?>"></script>
    <script src="https://cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.3.1/js/dataTables.buttons.min.js"></script>

    <!-- <script src="//cdn.datatables.net/buttons/1.3.1/js/buttons.flash.min.js"></script> -->
    <script src="//cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>

    <!-- <script src="//cdn.rawgit.com/bpampuch/pdfmake/0.1.27/build/pdfmake.min.js"></script> -->
    <!-- <script src="//cdn.rawgit.com/bpampuch/pdfmake/0.1.27/build/vfs_fonts.js"></script> -->
    <script src="//cdn.datatables.net/buttons/1.3.1/js/buttons.html5.min.js"></script>
    <!-- <script src="//cdn.datatables.net/buttons/1.3.1/js/buttons.print.min.js"></script> -->

    <!-- <script src="<?php echo base_url("assets2/js/bootstrap-editable.js"); ?>"></script> -->
    <script src="//cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/bootstrap3-editable/js/bootstrap-editable.min.js"></script>
    
    <script>
    	var table, table_msg, table_delivery, table_feedback;
      var cols_rows_info = $('#cols_rows_info');
      var cols_info = $('#cols_info');
      var rows_info = $('#rows_info');

      $('.collapse_tbl').click(function(){
        $('.tbl_border').addClass("border-bottom");
      });
      
      $('#delivery_type').on('change', function() {
         var deliverytype = $(this).val();
         var shipmethodtext = $('#ship_method_text');
         var shipmethod_selected = $("#ship_method option:selected").text();
         var deliverytype_selected = $("#delivery_type option:selected").text();
         shipmethodtext.html('('+shipmethod_selected+', '+deliverytype_selected+')');


         $('.cn22tick, .cn22logo, .cn22phrase').attr("disabled", true).attr("checked", false);
         $('.cn22box, .cn22logobox, .cn22phrasebox').css({'background-color':'#eee'});

          displaySize('1 x 1');
          $('#print_label_dimensions option:selected').attr('selected', false);
          $('#print_label_dimensions_popup option:selected').attr('selected', false);
          $('#print_label_dimensions option:eq(0), #print_label_dimensions_popup option:eq(0)').attr('selected', true);
          $('#print_label_dimensions option:eq(0), #print_label_dimensions_popup option:eq(0)').attr('disabled', false);
          $('#print_label_dimensions option:eq(1), #print_label_dimensions_popup option:eq(1)').attr('disabled', false);
          $('#print_label_dimensions option:eq(2), #print_label_dimensions_popup option:eq(2)').attr('disabled', false);
          $('#print_label_dimensions option:eq(3), #print_label_dimensions_popup option:eq(0)').attr('disabled', false);
          $('#print_label_dimensions option:eq(4), #print_label_dimensions_popup option:eq(1)').attr('disabled', false);
          $('.cn22box').css({'background-color':'#eee'});

          console.log (deliverytype);
         switch(deliverytype)
         {
          case 'document':
          $('.info_1_section').show();
            displaySize('3 x 7');
            $('#print_label_dimensions option:selected').attr('selected', false);
            $('#print_label_dimensions_popup option:selected').attr('selected', false);
            $('#print_label_dimensions option:eq(3), #print_label_dimensions_popup option:eq(3)').attr('selected', true);
            $('#print_label_dimensions option:eq(0), #print_label_dimensions_popup option:eq(0)').attr('disabled', true);
            $('#print_label_dimensions option:eq(1), #print_label_dimensions_popup option:eq(1)').attr('disabled', true);
            $('#print_label_dimensions option:eq(2), #print_label_dimensions_popup option:eq(2)').attr('disabled', true);
            $('.cn22box').css({'background-color':'#ccc'});
          break;
          case 'cn22':
          $('.info_1_section').hide();
          $('.cn22tick, .cn22logo, .cn22phrase').attr("disabled", false);
          $('.cn22box').css({'background-color':'#eee'});

          $('#print_label_dimensions option:selected').attr('selected', false);
          $('#print_label_dimensions_popup option:selected').attr('selected', false);
          $('#print_label_dimensions option:eq(0), #print_label_dimensions_popup option:eq(0)').attr('selected', true);
          $('#print_label_dimensions option:eq(3), #print_label_dimensions_popup option:eq(3)').attr('disabled', true);
          $('#print_label_dimensions option:eq(4), #print_label_dimensions_popup option:eq(4)').attr('disabled', true);
          break;
          default:
          $('.info_1_section').hide();
          if ($('.cn22tick').is(":checked")) {
            $('.cn22box').click();
          }
          break;
        }
      });

      //$('#accordion').find('a:first').click().click();
      $('#accordion').on('click', function() {
        setTimeout(function(){ 
          accordionCheck();
        }, 100);
      });

      function accordionCheck()
      {
        $('#accordion').find('a').each(function(){
          if ($(this).attr('aria-expanded') == 'true') 
          {
            $(this).find('span:first').removeClass('fa-caret-right');
            $(this).find('span:first').addClass('fa-caret-down');
          } 
          else
          {
            $(this).find('span:first').removeClass('fa-caret-down');
            $(this).find('span:first').addClass('fa-caret-right');
          }
        })
      }

      $('#ship_method').on('change', function() {
       var shipmethod = $(this).val();
       var shipmethodtext = $('#ship_method_text');
       var shipmethod_selected = $("#ship_method option:selected").text();
       var deliverytype_selected = $("#delivery_type option:selected").text();
       shipmethodtext.html('('+shipmethod_selected+', '+deliverytype_selected+')');
       switch(shipmethod)
       {
        case 'fedex':
        case 'dhl':
        $("#delivery_type option[value='kpacket'],#delivery_type option[value='ems']").hide();
        break;
        case 'post_office':
        $("#delivery_type option[value='kpacket'],#delivery_type option[value='ems']").show();
        break;
      }
    });

    $('body').on('change','#print_label_dimensions, #print_label_dimensions_popup', function() {
      var id = $(this);

      var selected_text = $(this).find('option:selected').text();
      // var selected_text = $("#print_label_dimensions_popup option:selected").text();
      // console.log (selected_text);

      var sizeid = id.val();
      displaySize(selected_text);

      $('#print_label_dimensions_popup').val(sizeid);
      $('#print_label_dimensions').val(sizeid);

      $(cols_rows_info).text('1열 1행'); rows_info.val(1); cols_info.val(1);
      $('#startpoint_tables').find('table').each(function() {
        if ($(this).css('display') !== 'none')
          $(this).find('td :radio:checked').click();
      });
    });

      $('body').on('click','#phrase_pop', function() {
       $('#myModalPhrase').modal('show');
       return false;
     });

      $('body').on('click','#pageSize_pop, #pageSize_pop_button', function() {
        if ($('#pageSize_pop').css('color') == 'rgb(211, 211, 211)')
          return false;

        $('#myModal').modal('show');
        return false;
      });


      var orderItems;
      function getallCheckOrders()
      {	
       orderItems = 0;
       var orderItemsValue = '';
       if (selected_tab == undefined) selected_tab = table;

       selected_tab.$('input:checkbox[class^="table_order_check"]').each(function() {
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

      setTimeout(function(){ 
        if (orderItems>0) {
          $('#table_wrapper, #table_delivery_wrapper, #table_feedback_wrapper').find('#csvoutput').fadeIn();
        }
        else 
        {
          $('#table_wrapper, #table_delivery_wrapper, #table_feedback_wrapper').find('#csvoutput').fadeOut();
        }
      }, 100);
		}

		$('body').on('click','#editmsg', function(e) {
			e.stopPropagation();
			id = $(this).attr('ref');

			$('#editmsgs'+id).editable({
       pk: id,
       url: '<?php echo base_url("/order/template/edit"); ?>',
       title: 'Edit template'
     });
			$('#editmsgs'+id).editable('toggle');
			//$("*[id^=editmsgs]").each(function( index ) {
			//  console.log( index + ": " + $( this ).attr('ref') );
			//});
		});

		var msg_template = 0;
		$('body').on('change','#msg_template', function() {
			msg_template = $(this).val();
			$('.cn22phrasebox').css({'background-color':'#21b4f9'});
			$('.cn22phrase').prop("checked", true);
		});

		$('body').on('click','#phrase_cancel', function() {
			msg_template = 0;
			$('#table_msg').find('input').removeAttr('checked');
			$('.cn22phrase').prop("checked", false);
      $('.cn22phrasebox').css({'background-color':'#eee'});
    });	

    $('body').on('click','#startpoint_cancel', function() {
      // $('#print_label_dimensions, #print_label_dimensions_popup').val(1);
      var pld = $('#print_label_dimensions');
      var pldp = $('#print_label_dimensions_popup');
      
      // pld.val (pld.find("option:first").val());
      // pldp.val (pldp.find("option:first").val());

      $(cols_rows_info).text('1열 1행');

      $('#startpoint_tables').find(':radio').prop('checked', false);
      // displaySize($("#print_label_dimensions option:selected").text()); //$('#print_label_dimensions'));
      rows_info.val(1);
      cols_info.val(1);
    }); 


		$("#myModalPhrase").on("hidden.bs.modal", function () {
		    // console.log (msg_template);
		    var is_msg_selected = $('#table_msg').find('input').is(':checked');
		    if (is_msg_selected == false)
		    {
		    	$('.cn22phrase').prop("checked", false);
		    	$('.cn22phrasebox').css({'background-color':'#eee'});
		    }
      });	

		// row horizontal - col vertical
		$('#onebyone_pop, #onebytwo_pop, #twobytwo_pop, #threebyseven_pop, #threebyeight_pop').find('tr').click(function() {
			rows_info.val(($(this).index()+1)); //row
		}).find('td').click(function() {
			cols_info.val(($(this).index()+1)); //col
			$(this).find('input').prop('checked', true);
			setTimeout(function(){ 
				$(cols_rows_info).text(cols_info.val()+'열 ' + rows_info.val() + '행');
			}, 100);
		});

		$('.generatepdf').on('click', function() {
			var orderids = $('#orderids').val();
			var dimensions = $('#print_label_dimensions').val();

			var startpoint = $('input[name=startpoint'+dimensions+']:checked').val();
			if (startpoint == undefined) startpoint = 0;

			if (selected_tab == undefined) selected_tab = table;
			var table_selected = selected_tab.context[0].nTable.id;
			//return null;

			var from_check = $('.cn22from').is(':checked')==true?1:0;
			var to_check = $('.cn22to').is(':checked')==true?1:0;
			var cn22_check = $('.cn22tick').is(':checked')==true?1:0;
			var additonal_info = msg_template + '-' + from_check + '-' + to_check + '-' + cn22_check;

			if (orderids == "") 
			{
				alert ('Please select order(s) to continue');
				return null;
			}

			$.ajax({
				url  : '<?php echo base_url('/order/process'); ?>',
				data : 'ids=' + orderids + ',' + dimensions+ ',' + startpoint + ',' + table_selected + ',' + additonal_info,
				type : 'POST',
				dataType: 'JSON',
				success : function(data) {
					window.open("<?php echo base_url('/order/generate/'); ?>" + data, "_blank");
					setTimeout(function() {
						if (table_selected == 'table')
						{
							$('#table').DataTable().ajax.reload();
							var total_order_count = $('#total_order_count').html();
							var new_total_order_count = (total_order_count-orderItems);
							$('#total_order_count, #total_order_count_sub').html(new_total_order_count);
							$('.info_order_list').html('주문 0개가 선택되었습니다');	
						}
					}, 1000);
				}
			});
		});

		$(document).ready(function() {

      if (orderItems==0 || orderItems==undefined)
      {
        setTimeout(function(){ 
          $('#csvoutput').fadeOut();
        }, 100);
      }



      $('#print_label_dimensions option:eq(3), #print_label_dimensions_popup option:eq(3)').attr('selected', true);
      $('#print_label_dimensions option:eq(0), #print_label_dimensions_popup option:eq(0)').attr('disabled', true);
      $('#print_label_dimensions option:eq(1), #print_label_dimensions_popup option:eq(1)').attr('disabled', true);
      $('#print_label_dimensions option:eq(2), #print_label_dimensions_popup option:eq(2)').attr('disabled', true);
      $('.cn22box').css({'background-color':'#ccc'});

			//checkDimensionToSelect();
      table = $('#table').DataTable({ 
		    	// "dom": '<"top"i>rt<"bottom"flp><"clear">',
		    	"sDom": '<t><"#info"lip><"#export"B>',
		    	// dom: 'Bfrtip',
		    	buttons: [
		    	'excel'
		    	],
		    	"lengthMenu": [[5, 10, 15, 100], [5, 10, 15, "All"]],
		        "processing": true, //Feature control the processing indicator.
		       	"serverSide": true, //Feature control DataTables' servermside processing mode.
		        "order": [], //Initial no order.
		        "iDisplayLength" :5,
		        // Load data for the table's content from an Ajax source
		        "ajax": {
		        	"url": "<?php echo base_url('/order/order_list')?>",
		        	"type": "POST",
              "dataType": "json",
              "data": function (jsonData) {
                jsonData.date_range = $('#daterange1').val();
		        		return jsonData.data;
		        	}
		        },
		        // "order": [],
		        //Set column definition initialisation properties.
		        "columnDefs": [{
		            "targets": [ 0,1,2,3,4,5,6 ], //first column / numbering column
		            "orderable": false, //set not orderable
              }],
            });

      $('#daterange1').on('change', function() {
         // var new_date_range = $(this).val();
         table.draw();
          $('#table').fadeOut('fast').fadeIn('slow');
      });

      table.order([2, 'desc']).draw();

      table_delivery = $('#table_delivery').DataTable({ 
       "sDom": '<t><"#info"lip><"#export"B>',
       buttons: ['excel'],
       "lengthMenu": [[5, 10, 15, 100], [5, 10, 15, "All"]],
       "processing": true, 
       "serverSide": true, 
       "order": [],
       "iDisplayLength" :5,
       "ajax": {
         "url": "<?php echo base_url('/order/order_list/beforedelivery')?>",
         "type": "POST",
         "dataType": "json",
         "data": function (jsonData) {
          jsonData.date_range = $('#daterange2').val();
          return jsonData.data;
        }
      },
      "columnDefs": [{ 
        "targets": [ 0,1,2,3,4,5,6 ], 
        "orderable": false, 
      }],
    });

      $('#daterange2').on('change', function() {
         // var new_date_range = $(this).val();
         table_delivery.draw();
          $('#table_delivery').fadeOut('fast').fadeIn('slow');
      });

      table_feedback = $('#table_feedback').DataTable({ 
       "sDom": '<t><"#info"lip><"#export"B>',
       buttons: ['excel'],
       "lengthMenu": [[5, 10, 15, 100], [5, 10, 15, "All"]],
       "processing": true, 
       "serverSide": true, 
       "order": [],
       "iDisplayLength" :5,
       "ajax": {
         "url": "<?php echo base_url('/order/order_list/shipped')?>",
         "type": "POST",
         "dataType": "json",
         "data": function (jsonData) {
          jsonData.date_range = $('#daterange3').val();
          return jsonData.data;
        }
      },
      "columnDefs": [{ 
        "targets": [ 0,1,2,3,4,5,6 ], 
        "orderable": false, 
      }],
    });

      $('#daterange3').on('change', function() {
         // var new_date_range = $(this).val();
         table_feedback.draw();
          $('#table_feedback').fadeOut('fast').fadeIn('slow');
      });

      $('#salechannel').on('change', function() {
        var myValue = 'amazon';
        regExSearch = '^\\s' + myValue +'\\s*$';
        table.search('1000 GB', false, false).draw();
      });

      table_msg = $('#table_msg').DataTable({ 
       "sDom": '<t><"#info_msg"lip>',
       "lengthMenu": [[5, 10, 15, -1], [5, 10, 20, "All"]],
       "processing": true, 
       "serverSide": true, 
       "order": [], 
       "iDisplayLength" :50,
       "ajax": {
         "url": "<?php echo base_url('/order/msg_list')?>",
         "type": "POST",
         "dataType": "json",
         "data": function (jsonData) {
          return jsonData.data;
        }
      },
      "columnDefs": [
      { 
       "targets": [ 0,1,2 ], 
       "orderable": false,
     },
     ],
   });

    // $('#seller_msg_search').on('keyup', function() {
    //   var value = $(this).val();
    //   table_msg.search(value, false, false).draw();
    // });

      $('.buttons-html5').html('<button id="csvoutput" type="submit" class="btn btn-primary">엑셀 다운로드</button>');
    });

    $('body').on('change','#table_main_sort', function(){
      table.order([2, $(this).val()]).draw();
    });

    $('body').on('change','#table_delivery_sort', function(){
      table_delivery.order([2, $(this).val()]).draw();
    });

    $('body').on('change','#table_feedback_sort', function(){
      table_feedback.order([2, $(this).val()]).draw();
    });

    $('#seller_msg_button').on('click', function() {
      var msg = $('#seller_msg_search').val();

      if (msg == "")
      {
	alert("메시지를 입력하세요!");

      }
      else
      {
        $.ajax({
          url  : '<?php echo base_url('/order/msg_add'); ?>',
          data : 'msg=' + msg,
          type : 'POST',
          success : function(data) {
            table_msg.draw();
            $('#seller_msg_search').val("");
          }
        });
      }
      return false;
    });

    $('body').on("click", ".deleteMsg", function(){
      var msgid = $(this).data("userid");
      var confirmation = confirm("Are you sure to delete this message?");
      if(confirmation)
      {
        $.ajax({
          type : "POST",
          url : '<?php echo base_url('/order/msg_delete'); ?>',
          data : { msgid : msgid } 
        }).done(function(data){
          table_msg.draw();
        });
      }
    });

		var selected_tab = table;
		$('.nav-orders').on('shown.bs.tab', function (e) {
      setTimeout(function() { 
        $('#table_wrapper, #table_delivery_wrapper, #table_feedback_wrapper').find('#csvoutput').fadeOut();
      }, 500);
			var target = $(e.target).attr("href");
			switch(target)
			{
				case '#2b' : selected_tab = table_delivery; break;
				case '#3b' : selected_tab = table_feedback; break;
				default : selected_tab = table; break;
			}
			$('#table, #table_delivery, #table_feedback').hide().fadeIn('slow');
			// $('#order-select-all').prop('checked', false);
			$('body').find('input:checkbox[class^="table_order_check"], input:checkbox[id^="order-select-all"]').prop('checked', false);
			$('.info_order_list').html('주문 0개가 선택되었습니다');
		});

		$('body').on('click','#order-select-all', function(){
			if (selected_tab == null) selected_tab = table;
			var rows = selected_tab.rows({ 'search': 'applied' }).nodes();
			//$('input[type="checkbox"]', rows).prop('checked', this.checked);
			$('input:checkbox[class^="table_order_check"]', rows).prop('checked', this.checked);
			getallCheckOrders();
		});

		// Handle click on checkbox to set state of "Select all" control
		//$('#table tbody').on('change', 'input[type="checkbox"]', function(){
      $('table').on('change', 'input:checkbox[class^="table_order_check"]', function(){
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

      $('body').on('click','#refreshorders', function() {

       var $elem = $('#refreshorders');
       $({deg: 0}).animate({deg: 1080}, {
        duration: 5000,
        step: function(now) {
          $elem.css({
            transform: 'rotate(' + now + 'deg)'
          });
        }
      });

       <?php if ($_SERVER['HTTP_HOST'] == 'stg.onlabels.co.kr') : ?>
          $.ajax({
            url  : '<?php echo base_url('data-integrate-stg/ebay/downloadOrders.php?s_ol_user_id='.$this->session->userdata('uid')); ?>',
            type : 'GET',
            success : function(data) {
              //console.log (data);

              var total_order_count = $('#total_order_count').html();
              var new_total_order_count = parseInt(data)+parseInt(total_order_count);
              $('#total_order_count, #total_order_count_sub').html(new_total_order_count);

              $('#table, #table_delivery, #table_feedback').fadeOut('fast').fadeIn('slow');

              table.draw();
              table_delivery.draw();
              table_feedback.draw();
            }
          });
        <?php else : ?>
          $.ajax({
            url  : '<?php echo base_url('data-integrate/ebay/downloadOrders.php?s_ol_user_id='.$this->session->userdata('uid')); ?>',
            type : 'GET',
            success : function(data) {
              //console.log (data);

              var total_order_count = $('#total_order_count').html();
              var new_total_order_count = parseInt(data)+parseInt(total_order_count);
              $('#total_order_count, #total_order_count_sub').html(new_total_order_count);

              $('#table, #table_delivery, #table_feedback').fadeOut('fast').fadeIn('slow');

              table.draw();
              table_delivery.draw();
              table_feedback.draw();
            }
          });
        <?php endif; ?>

       
     });

      $('body').on('click', '.cn22from', function() {
        if ($(this).is(":checked")) $('.cn22frombox').css({'background-color':'#21b4f9'});
        else $('.cn22frombox').css({'background-color':'#eee'});

    		//checkDimensionToSelect();
    	});
      $('body').on('click', '.cn22to', function() {
        if ($(this).is(":checked")) $('.cn22tobox').css({'background-color':'#21b4f9'});
        else $('.cn22tobox').css({'background-color':'#eee'});

    		//checkDimensionToSelect();
    	});
      $('body').on('click', '.cn22tick', function() {

        if ($(this).is(":checked")) $('.cn22box').css({'background-color':'#21b4f9'});
        else $('.cn22box').css({'background-color':'#eee'});

    		//checkDimensionToSelect();
    	});
      $('body').on('click', '.cn22logo', function() {
        if ($(this).is(":checked")) $('.cn22logobox').css({'background-color':'#21b4f9'});
        else $('.cn22logobox').css({'background-color':'#eee'});
      });
      $('body').on('click', '.cn22phrase', function() {
        if ($(this).is(":checked")) {
         $('.cn22phrasebox').css({'background-color':'#21b4f9'});
         $('#phrase_pop').click();
       }
       else 
       {
        $('.cn22phrasebox').css({'background-color':'#eee'});
        msg_template = 0;
        $('#table_msg').find('input').removeAttr('checked');
      }
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
			//checkDimensionToSelect();
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
			//checkDimensionToSelect();
		});
		$('body').on('click', '.cn22box', function() {

			if ($('.cn22tick').is(":disabled")) return false;
			else
			{
				if ($(this).css('background-color') == 'rgb(33, 180, 249)') {
					$(this).css({'background-color':'#eee'});
					$('.cn22tick').prop("checked", false);
				} 	
				else
				{
					$(this).css({'background-color':'#21b4f9'});
					$('.cn22tick').prop('checked', true);
				} 
			}

			
			//checkDimensionToSelect();
		});
		$('body').on('click', '.cn22logobox', function() {

      if ($('.cn22logo').is(":disabled")) return false;

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
      if ($('.cn22phrase').is(":disabled")) return false;

			if ($(this).css('background-color') == 'rgb(33, 180, 249)') {
				$(this).css({'background-color':'#eee'});
				$('.cn22phrase').prop("checked", false);
				msg_template = 0;
				$('#table_msg').find('input').removeAttr('checked');
			} 	
			else
			{
				$(this).css({'background-color':'#21b4f9'});
				$('.cn22phrase').prop('checked', true);
				$('#phrase_pop').click();
			} 
		});
		function displaySize(sizes)
		{
			// var sizes = id.val();
			$('#onebyone, #onebytwo, #twobytwo, #threebyseven, #threebyeight, #onebyone_pop, #onebytwo_pop, #twobytwo_pop, #threebyseven_pop, #threebyeight_pop').hide();

			//$('#startpoint_tables').find('table').each(function() {
			//	console.log ($(this).attr('style'));
			//});
      $('#pageSize_pop').css({'color':'#000'});
      $('#pageSize_pop_button').removeClass('btn-gray').addClass('btn-primary');

      $('#startpoint_tables').css({'background':'inherit','opacity':1});

			switch (sizes)
			{
				case '1 x 1' :
				$('#onebyone, #onebyone_pop').show();
				$('#size_text').html('(폼텍, 1x1)');

        $('#pageSize_pop').css({'color':'lightgray'});
        $('#pageSize_pop_button').removeClass('btn-primary').addClass('btn-gray');
        $('#startpoint_tables').css({'background':'lightgray','opacity':0.2});
				break;

				case '1 x 2' :
				$('#onebytwo, #onebytwo_pop').show();
				$('#size_text').html('(폼텍, 1x2)');
				break;

				case '2 x 2' :
				$('#twobytwo, #twobytwo_pop').show();
				$('#size_text').html('(폼텍, 2x2)');
				break;

				case '3 x 7' :
				$('#threebyseven, #threebyseven_pop').show();
				$('#size_text').html('(폼텍, 3x7)');
				break;

				case '3 x 8' :
				$('#threebyeight, #threebyeight_pop').show();
				$('#size_text').html('(폼텍, 3x8)');
				break;
			}
		}
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
