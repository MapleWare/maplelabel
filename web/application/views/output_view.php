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

  <title>Output - OnLabels</title>

  <!-- Bootstrap core CSS -->
  <link href="<?php echo base_url("assets2/css/bootstrap.css"); ?>" rel="stylesheet">
  
  <link href="<?php echo base_url("assets2/css/bootstrap.css"); ?>" rel="stylesheet">
  <link href="<?php echo base_url("assets2/css/bootstrap-datepicker.min.css"); ?>" rel="stylesheet">
  

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
              <li><a href="<?php echo base_url(); ?>order/index">신규주문(<?php echo $total_orders; ?>) </a></li>
              <li><a class="active" href="<?php echo base_url(); ?>output/index">출력관리</a></li>
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


          <div class="col-sm-10 col-sm-offset-1 ">
           <h3></h3>
           <ul  class="nav nav-pills">
            <li class="active">
              <a  href="#1b" data-toggle="tab">출력관리</a>
            </li>

          </ul>
          <div class="tab-content clearfix">
            <div class="tab-pane active" id="1b">
              <div class="row" >
                <div class="col-md-12">
                  <form class="form-inline"  style="background: #ddd; padding: 30px 20px;margin: 30px 0px;">

                    <div class="form-group">
                      <label for="exampleInputEmail2">판매채널 </label>
                      <div class='input-group date' id='datetimepicker5'>
                        <input type='text' id="from_date" class="form-control  text-center" />
                        <span class="input-group-addon">
                          <span class="glyphicon glyphicon-calendar"></span>
                        </span>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail2">종료일 </label>
                      <div class='input-group date' id='datetimepicker6'>
                        <input type='text' id="to_date" class="form-control  text-center" />
                        <span class="input-group-addon">
                          <span class="glyphicon glyphicon-calendar"></span>
                        </span>
                      </div>
                    </div>
                    <button type="submit" class="btn btn-primary" id="search_date">검색 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="fa fa-search"></span></button>
                  </form>
                  <div class="table-responsive">
                    <table class="table" id="table">
                      <thead>
                        <tr>
                          <th><input id="order-select-all" type="checkbox" class="form-group tick"></th>
                          <th>일련번호</th>
                          <th>생성일자</th>
                          <th>출력수</th>
                          <th>라벨요약</th>
                          <th>추가작업</th>
                        </tr>
                      </thead>
                      <tbody>
                        <!-- <tr>
                          <td><input type="checkbox" class="form-group tick"></td>
                          <td>1-123</td>
                          <td>2017.06.17 오후 3시 30분</td>
                          <td>3</td>
                          <td>
                            배송수단 : <strong style="color: #346896">우체국, 소형포장 </strong> <br/><br/>
                            라벨 출력내용 :  <strong style="color: #346896">From, To, CN22, Logo, Messgae </strong><br/><br/>
                            라벨 템플릿 :  <strong style="color: #346896">폼텍 1x2 </strong><br/><br/>
                          </td>
                          <td>
                            <select class="form-control" id="exampleInputName2" style="width: 100px;">
                              <option class="option-11">선택  </option>
                            </select>
                          </td>
                        </tr> -->
                      </tbody>
                    </table>
                  </div>
                  <div class="col-md-6"  style="margin: 30px 0px;">



                  </div>
                  <!-- <div class="col-md-6 form-inline pull-right"  style="margin: 30px 0px;">
                    <div class="form-group">
                      <label for="exampleInputName2">표시 </label>
                      <select class="form-control" id="exampleInputName2" style="width: 90px;">
                        <option class="option-2">50개 </option>
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
        <!--button href="#myModal" id="openBtn" data-toggle="modal" class="btn btn-default">Modal</button-->

        <div class="modal fade in" id="myModal" style="display: none">
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
                      <th><input type="checkbox" class="form-group tick"></th>
                      <th class="text-center">판매자 문구</th>
                      <th class="text-center">관리</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td><input type="checkbox" class="form-group tick"></td>
                      <td>Handle with care. - Fragile</td>
                      <td class="text-right">
                        <button type="submit" class="btn btn-primary">수정</button>
                        <button type="submit" class="btn btn-default"  style="background: #444444;color: #fff;">삭제</button>
                      </td>
                    </tr>
                    
                    <tr>
                      <td><input type="checkbox" checked class="form-group tick"></td>
                      <td>Handle with care. - Fragile</td>
                      <td class="text-right">
                        <button type="submit" class="btn btn-primary">수정</button>
                        <button type="submit" class="btn btn-default"  style="background: #444444;color: #fff;">삭제</button>
                      </td>
                    </tr>
                    
                    <tr>
                      <td><input type="checkbox" checked class="form-group tick"></td>
                      <td>Handle with care. - Fragile</td>
                      <td class="text-right">
                        <button type="submit" class="btn btn-primary">수정</button>
                        <button type="submit" class="btn btn-default"  style="background: #444444;color: #fff;">삭제</button>
                      </td>
                    </tr>
                    
                    <tr>
                      <td><input type="checkbox" class="form-group tick"></td>
                      <td>Handle with care. - Fragile</td>
                      <td class="text-right">
                        <button type="submit" class="btn btn-primary">수정</button>
                        <button type="submit" class="btn btn-default"  style="background: #444444;color: #fff;">삭제</button>
                      </td>
                    </tr>
                    
                    <tr>
                      <td><input type="checkbox" class="form-group tick"></td>
                      <td>Handle with care. - Fragile</td>
                      <td class="text-right">
                        <button type="submit" class="btn btn-primary"  >수정</button>
                        <button type="submit" class="btn btn-default" style="background: #444444;color: #fff;">삭제</button>
                      </td>
                    </tr>
                    
                  </tbody>
                </table>
                <div class="form-group " style="width: 50%; margin: 0px auto;">
                 <button class="btn btn-lg btn-default"   style="background: #999999;color: #fff; padding: 10px 31px;">취소</button>
                 <button class="btn btn-lg btn-primary">입력하기</button>
                 <div class="clearfix"></div>
               </div>
             </div>

           </div><!-- /.modal-content -->
         </div><!-- /.modal-dialog -->
       </div><!-- /.modal -->

       <!-- 30-10-OrderManagement-1x2 -->

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="<?php echo base_url("assets2/js/jquery.js"); ?>"><\/script>')</script>
    <script src="<?php echo base_url("assets2/js/bootstrap.min.js"); ?>"></script>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment-with-locales.js"></script>
    <script src="<?php echo base_url("assets2/js/bootstrap-datepicker.min.js"); ?>"></script>

    <script src="http://cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.3.1/js/dataTables.buttons.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="//cdn.datatables.net/buttons/1.3.1/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/select/1.2.2/js/dataTables.select.min.js"></script>
    <script type="text/javascript">
    $(function () {
      $("#from_date").datepicker().datepicker("setDate", new Date(new Date().getTime()-(30*24*60*60*1000)));
      $("#to_date").datepicker().datepicker("setDate", new Date());
    });
    </script>
    <script>
      var table;
      
      $(document).ready(function() {
        //datatables
        table = $('#table').DataTable({ 
          "sDom": '<t><"#info"lip>',
          "lengthMenu": [[5, 10, 15, -1], [5, 10, 20, "All"]],
          "processing": true, 
          "serverSide": true, 
          "order": [],
          "iDisplayLength" :5,
          "ajax": {
            "url": "<?php echo base_url('/output/ajax_list')?>",
            "type": "POST",
            "dataType": "json",
            "data": function (jsonData) {
              jsonData.from_date = $('#from_date').val();
              jsonData.to_date = $('#to_date').val();
              return jsonData.data;
              }
          },
          "columnDefs": [{ 
            "targets": [ 0,1,2,3,4,5 ], 
            "orderable": false,
            }],
        });

        $('body').on('click','#search_date', function() {
          table.draw();
          return false;
        });


      });

      function parseDateValue(rawDate) {
        var dateArray= rawDate.split("/");
        var parsedDate= dateArray[2] + dateArray[0] + dateArray[1];
        return parsedDate;
      }



      $('#order-select-all').on('click', function(){
        var rows = table.rows({ 'search': 'applied' }).nodes();
        $('input[type="checkbox"]', rows).prop('checked', this.checked);
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
      });

      $('.collapse_tbl').click(function(){
        $('.tbl_border').addClass("border-bottom");
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
