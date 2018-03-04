<style>
  .alert-success {
    color: #000;
    background-color: #eeeeee;
    border-color: #eeeeee;
    border-radius: 0px;
  }
</style>
  <div class="container">
    <div class="row" style="font-size: 12px">
      <div class="col-md-10" style="padding: 20px 0px">
        <div class="alert alert-success" role="alert">
          <strong>회원 등급 : Free Member <a href="<?php echo base_url('upgrade/index'); ?>">(업그레이드)</a></strong>
          <p class="pull-right">최종 연동 일자 : <?php echo date("Y.m.d h:i A"); ?></p>
          
        </div>
      </div>
      <div class="col-md-2 col-xs-12 side-btn pull-right" style="top: 20px;background: #444444;padding: 4px;color: #fff">
        <img src="<?php echo base_url("assets2/img/update-icon.png"); ?>" style="padding: 12px;width: 50px;"/>최신 주문 가져오기
      </div>
      <div class="col-sm-8 ">
        <div class="panel panel-primary">
          <div class="panel-heading">
            <h3 class="panel-title"><img src="<?php echo base_url("assets2/img/new.png"); ?>"/>  신규주문 현황</h3>
          </div>
          <div class="panel-body">
            <div class="table-responsive">
              <table class="table">
                <thead>
                  <tr>
                    <th>총 주문 수 <?php echo sprintf('%02d', $total_orders); ?></th>
                    <th class="text-right"><img src="<?php echo base_url("assets2/img/plus.png"); ?>"/> 신규 채널추가</th>
                  </tr>
                  
                </thead>
                <tbody>
                    
                    <tr>
                      <td>eBay</td>
                      <td class="text-right"><?php echo sprintf('%02d', $total_orders); ?></td>
                    </tr>
                   <!--  <tr>
                      <td>Amazon</td>
                      <td class="text-right">00</td>
                    </tr>
                    <tr>
                      <td>Esty</td>
                      <td class="text-right">00</td>
                    </tr> -->
                </tbody>
              </table>
            </div>
                
          </div>
        </div>
        <div class="panel panel-primary">
          <div class="panel-heading">
            <h3 class="panel-title"><img src="<?php echo base_url("assets2/img/print-icon.png"); ?>"/>  라벨 출력 현황</h3>
          </div>
          <div class="panel-body">
            <div class="table-responsive">
              <table class="table">
                <thead>
                  <tr>
                    <th><?php echo date('m'); ?>월 출력 가능 라벨수는 <?php echo number_format($remaining_cnt); ?>개 입니다</th>
                    <th class="text-right"><img src="<?php echo base_url("assets2/img/plus.png"); ?>"/> 라벨 충전</th>
                  </tr>
                  
                </thead>
                <tbody>
                    
                    <tr>
                      <td colspan="2">
                        <a class="collapse_tbl" role="button" data-toggle="collapse" href="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                          <span class="fa fa-caret-down"> </span> <strong> 라벨 사용 수 </strong>
                        </a>
                        <strong class="pull-right"><?php echo $printed_count_total; ?></strong>
                        <div class="collapse in" id="collapseExample" style="padding: 10px 0px 10px 15px;">
                          <p>eBay<strong  class="pull-right"><?php echo $ebay_count; ?></strong></p>
                          <!-- <p>Amazon<strong class="pull-right"><?php echo $amazon_count; ?></strong></p> -->
                          <!-- <p>Esty<strong class="pull-right"><?php echo $esty_count; ?></strong></p> -->
                          
                        </div>
                      </td>
                    </tr>
                    <tr>
                      <td colspan="2">
                      <strong> 라벨 잔여 수 </strong>
                      <strong class="pull-right"> <?php echo number_format($remaining_cnt); ?> </strong>
                      </td>
                      
                    </tr>
                    
                </tbody>
                <tfoot>
                  <tr>
                    <th>라벨 총 수</th>
                    <th class="text-right"><?php echo number_format($last_value); ?></th>
                  </tr>
                </tfoot>
              </table>
            </div>
                
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
      <div class="col-sm-4">
        <div class="panel panel-default">
          <div class="panel-heading">
            <h3 class="panel-title"><img src="<?php echo base_url("assets2/img/megaphone.png"); ?>"/>  OnLabels 공지사항 <span style="font-size: 12px">(업데이트 <?php echo date("Y.m.d"); ?>)</span></h3>
          </div>
          <div class="panel-body">
            <?php if ($notice) : ?>
                <?php foreach ($notice as $row) : ?>
                  <h4><?php echo $row['subject'] ?></h4>
                  <p class="desc"><?php echo $row['content'] ?></p>
                <?php endforeach; ?>
                <strong style="color: #346896" class="pull-right"><img src="<?php echo base_url("assets2/img/plus-circle.png"); ?>"> 더보기...</strong>
              <?php else : ?>
                <p class="desc">표시 할 것이 없다.</p>  
              <?php endif; ?>
            <!-- <h4>이번 달 고객 프로모션 진행사항입니다</h4>
            <p class="desc">
              3월에는 신규 셀러를 위한 신규 채널 추가 프로모션을 진행합니다. 셀러 업그레이드하여 프로모션 혜택을 
경험하세요
            </p>
            <strong style="color: #346896" class="pull-right"><img src="img/plus-circle.png"> 더보기...</strong> -->
          </div>  
        </div>
        <div class="panel panel-default">
          <div class="panel-heading">
            <h3 class="panel-title"><img src="<?php echo base_url("assets2/img/microphone.png"); ?>"/>  OnLabels 소식 <span style="font-size: 12px">(업데이트 <?php echo date("Y.m.d"); ?>)</span></h3>
          </div>
          <div class="panel-body">
            <?php if ($news) : ?>
                <?php foreach ($news as $row) : ?>
                  <h4><?php echo $row['subject'] ?></h4>
                  <p class="desc"><?php echo $row['content'] ?></p>
                <?php endforeach; ?>
                <strong style="color: #346896" class="pull-right"><img src="<?php echo base_url("assets2/img/plus-circle.png"); ?>"> 더보기...</strong>
              <?php else : ?>
                <p class="desc">표시 할 것이 없다.</p>  
              <?php endif; ?>
            <!-- <h4>이번 달 고객 프로모션 진행사항입니다</h4>
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
            <strong style="color: #346896" class="pull-right"><img src="img/plus-circle.png"> 더보기...</strong> -->
          </div>  
        </div>
        <div class="panel panel-default">
          <div class="panel-heading">
            <h3 class="panel-title"><img src="<?php echo base_url("assets2/img/update.png"); ?>"/>  OnLabels 기능 업데이트 <span style="font-size: 12px">(업데이트 <?php echo date("Y.m.d"); ?>)</span></h3>
          </div>
          <div class="panel-body">
            <?php if ($update) : ?>
                <?php foreach ($update as $row) : ?>
                  <h4><?php echo $row['subject'] ?></h4>
                  <p class="desc"><?php echo $row['content'] ?></p>
                <?php endforeach; ?>
                <strong style="color: #346896" class="pull-right"><img src="<?php echo base_url("assets2/img/plus-circle.png"); ?>"> 더보기...</strong>
              <?php else : ?>
                <p class="desc">표시 할 것이 없다.</p>  
              <?php endif; ?>
            <!-- <h4>11/22</h4>
            <p class="desc">
              0140ver. 버그 수정 <br/>
              Amazon 추가 <br/>
              0140ver. 버그 수정 <br/>
            </p>
            <strong style="color: #346896" class="pull-right"><img src="img/plus-circle.png"> 더보기...</strong> -->
          </div>  
        </div>
      </div>
    </div>

  </div>
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
    <script type="text/javascript">
        window.onload = function () {
          var chart = new CanvasJS.Chart("chartContainer", {
            legend:{
              verticalAlign: "center",
              horizontalAlign: "left",
              fontSize: 20,
              fontFamily: "Helvetica"        
            },
            // theme: "theme2",
            data: [{
              type: "column",
              // showInLegend: true,
              dataPoints: [
              <?php if ($graph) : ?>
                <?php foreach($graph as $row) : ?>
                  { legendText: "<?php echo $row['printed_month'] ?>월", y: <?php echo $row['count(*)'] ?>, label: "<?php echo $row['printed_month'] ?>월" },
                <?php endforeach; ?>
              <?php else : ?>
                 { legendText: "<?php echo date("M", strtotime( "-1 month" ) ); ?>월", y: 0, label: "<?php echo date("M", strtotime( "-1 month" ) ); ?>월" },
                 { legendText: "<?php echo date('M') ?>월", y: 0, label: "<?php echo date('M') ?>월" },
              <?php endif; ?>

              // { legendText: "4월", y: 45, label: "4월" },
              // { legendText: "5월", y: 31, label: "5월" },
              // { legendText: "6월", y: 52, label: "6월" },
              // { legendText: "7월", y: 10, label: "7월" },
              // { legendText: "8월", y: 46, label: "8월" },
              // { legendText: "9월", y: 30, label: "9월" },

              ]
            }]
          });
          chart.render();
        }
      </script>
      <script src="<?php echo base_url("assets2/js/canvasjs.min.js"); ?>"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
  </body>
  </html>
