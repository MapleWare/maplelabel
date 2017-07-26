  <style>
    table.borderless td,table.borderless th{
      border: none !important;
    }
    .table > tbody > tr > td, .table > tfoot > tr > td {
      border-top: 0px solid #ddd;
    }
    .active_color
    {
      color:#21b4f9;
    }
    .main { padding:0; }
    .page-header { margin: 12px 0 20px; }
    .nav > li > a:hover, .nav > li > a:focus { border: 0; }
  </style>
  <div class="container-fluid">
    <div class="row">
      <div class="col-sm-3 col-md-2 sidebar">
        <h5 class="page-header">
          <div style="border-left:5px solid #337ab7; padding-left:10px;"><?php echo $uemail; ?></br></br>회원등급 : Free Member</div>
        </h5>
        <ul class="nav nav-sidebar">
          <li ><a href="<?php echo base_url('profile/index');?>"><img src="<?php echo base_url("assets2/img/user_profile.png"); ?>" /> 프로파일</a></li>
          <li><a href="<?php echo base_url('sellers/index');?>"><img src="<?php echo base_url("assets2/img/setting.png"); ?>" /> 셀러설정</a></li>
          <li><a href="<?php echo base_url(); ?>layout/index"><img src="<?php echo base_url("assets2/img/print.png"); ?>" /> 프린팅</a></li>
          <li class="active"><a href="#"><img src="<?php echo base_url("assets2/img/arrow_up.png"); ?>" /> 업그레이드</a></li>
        </ul>
      </div>
      
      <div class="col-sm-9 col-md-9 main">
       <h3></h3>
       <ul  class="nav nav-pills">
        <li class="active">
          <a  href="#1b" style="font-weight:bolder;" data-toggle="tab">Price & Plan</a>
        </li>
        
      </ul>
      <div class="tab-content clearfix">
        <div class="tab-pane active" id="1b">
          <div class="col-md-12">
            <h5>가격 & 계획</h5>
            <p>OnLabels의 회원 등급을 업그레이드 하세요.</p>
            <div class="table-responsive"  style="border: 1px solid #ccc;padding: 10px 0px">
              <table class="table table-borderless text-center">
                <tr>
                  <td style="font-size: 14px;font-weight: bolder">Free Member</td>
                  <td rowspan="15" style="border-left:1px solid #ccc; "></td>
                  <td style="font-size: 14px;font-weight: bolder">Standard</td>
                  <td rowspan="15" style="border-left:1px solid #ccc; "></td>
                  <td style="font-size: 14px;font-weight: bolder">Premium</td>
                  <td rowspan="15" style="border-left:1px solid #ccc; "></td>
                  <td style="font-size: 14px;font-weight: bolder">Enterprise</td>
                </tr>
                <tr>
                  <td style="font-size: 14px;font-weight: bolder">무료</td>
                  <td style="font-size: 14px;font-weight: bolder">$ 7.99/월</td>
                  <td style="font-size: 14px;font-weight: bolder">$ 7.99/월</td>
                  <td style="font-size: 14px;font-weight: bolder">$ 7.99/월</td>
                </tr>
                
                <tr>
                  <td></td>
                  <td><img src="<?php echo base_url("assets2/img/paypal.png"); ?>"></td>
                  <td><img src="<?php echo base_url("assets2/img/paypal.png"); ?>"></td>
                  <td><img src="<?php echo base_url("assets2/img/paypal.png"); ?>"></td>
                </tr>
                
                <tr>
                  <td><button class="btn btn-default" style="padding: 6px 35px;border: 2px solid #ccc;color: #ef5227;">현재등급</button></td>
                  <td><button class="btn btn-primary" style="padding: 6px 35px;">구독</button></td>
                  <td><button class="btn btn-primary" style="padding: 6px 35px;">구독</button></td>
                  <td><button class="btn btn-primary" style="padding: 6px 35px;">구독</button></td>
                </tr>
                <tr>
                  <td><hr style="border:0.5mm solid; border-style:dashed;">프린트 수량 : 50/월</td>
                  <td><hr style="border:0.5mm solid; border-style:dashed;">프린트 수량 : 250/월</td>
                  <td><hr style="border:0.5mm solid; border-style:dashed;">프린트 수량 : 500/월</td>
                  <td><hr style="border:0.5mm solid; border-style:dashed;">프린트 수량 : 500/월</td>
                </tr>
                
                <tr>
                  <td>셀러계정 수 : 1</td>
                  <td>셀러계정 수 : 3</td>
                  <td>셀러계정 수 : 5</td>
                  <td>셀러계정 수 : 10</td>
                </tr>
                
                <tr>
                  <td>라벨 템플릿 : 0</td>
                  <td>라벨 템플릿 : 0</td>
                  <td>라벨 템플릿 : 0</td>
                  <td>라벨 템플릿 : 0</td>
                </tr>
                
                <tr>
                  <td>K-Packet : 0</td>
                  <td>K-Packet : 0</td>
                  <td>K-Packet : 0</td>
                  <td>K-Packet : 0</td>
                </tr>


              </table>
            </div>
          </div>
          
        </div>
      </div>
    </div>
  </div><!-- /.container -->
  
</div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="<?php echo base_url("assets2/js/jquery.js"); ?>"><\/script>')</script>
    <script src="<?php echo base_url("assets2/js/bootstrap.min.js"); ?>"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script>
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
              $('#total_order_count').html(new_total_order_count);
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
              $('#total_order_count').html(new_total_order_count);
            }
          });
        <?php endif; ?>
      });
    </script>
  </body>
  </html>
