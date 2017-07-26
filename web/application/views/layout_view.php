  <style>
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
          <li class="active"><a href="#"><img src="<?php echo base_url("assets2/img/print.png"); ?>" /> 프린팅</a></li>
          <li><a href="<?php echo base_url('upgrade/index');?>"><img src="<?php echo base_url("assets2/img/arrow_up.png"); ?>" /> 업그레이드</a></li>
        </ul>
      </div>
      
      <div class="col-sm-9 col-md-9 main">
       <h3></h3>
       <ul  class="nav nav-pills">
        <li class="active">
          <a  href="#1b" data-toggle="tab">라벨 레이아웃 정보</a>
        </li>
        
      </ul>
       <div class="tab-content clearfix">
        <div class="tab-pane active" id="1b">
        <div class="col-md-10 layoutpage">
        <br>
        <div style="display:none;" class="msg-label alert alert-success text-center">Updated succesfully!</div>
          <form class="form-inline labeldata" method="post">
            
            <div class="col-md-12">
              
              
              <table class="col-md-12">
                  <tr>
                    <td style="vertical-align: baseline;">
                      <label style="padding:10px 30px 15px 24px;margin-top: 20px">라벨지</label>
                    </td>
                    <td style="">
                      <div class="form-group" style="margin:15px 20px 0px 0px;">
                        <select class="form-control text-center" style="width:100px;text-align: center">
                          <!-- <option>표시</option> -->
                          <?php foreach ($manufacturers as $row) : ?>
                            <option value="<?php echo $row['manufacturer']; ?>"><?php echo $row['manufacturer']; ?></option>
                          <?php endforeach; ?>
                        </select>
                      </div>
                    </td>
                    <td style="vertical-align: baseline;">
                      <label style="padding:10px 30px 15px 30px;margin-top: 20px">라벨규격</label>
                    </td>
                    <td>
                      <div class="form-group"  style="margin:15px 20px 0px 0px;">
                        <select class="form-control text-center dimension" style="width:100px;text-align: center">
                          <?php foreach ($labels as $row) : ?>
                            <option value="<?php echo $row['id']; ?>"><?php echo $row['cols_rows']; ?></option>
                          <?php endforeach; ?>
                        </select>
                      </div>
                    </td>
                  </tr>
                </table>
              
              
                <!--label style="font-weight: 200; background-color:#e4e4e4 ;padding:10px 30px 15px 30px; margin:20px 20px 0px 0px;">라벨지</label>
          
                <div class="form-group" style="margin:0px 20px 0px 0px;">
                  <select class="form-control text-center" style="background-color:#e4e4e4; width:100px;height: 44px;text-align: center">
                    <option>표시</option>
                  </select>
                </div>
                <label style="font-weight: 200; background-color:#e4e4e4 ;padding:10px 30px 15px 30px; margin:20px 20px 0px 0px;">라벨규격</label>
              
                <div class="form-group"  style="margin:0px 20px 0px 0px;">
                  <select class="form-control text-center" style="background-color:#e4e4e4; width:100px;height: 44px;text-align: center">
                    <option>1 x 1</option>
                  </select>
                </div-->
            </div>
            <div class="col-md-12" style="padding-top: 20px;">
                
                <table class="col-md-10">
                  <tr>
                    <td style="vertical-align: baseline;">
                      <label style="padding:0 0 0 12px;">박스크기</label>
                    </td>
                    <td style="text-align: center"> 세로 : <input id="print_box_height" type="text" class="form-control" name="print_box_height" value="<?php echo $labels[0]['print_box_height']; ?>" placeholder="세로" maxlength="4" style="width: 21%; height: 25px; border-radius: 0;"> mm</td>
                    <td>
                      <p class="text-center">가로 : <input id="print_box_width" type="text" class="form-control" name="print_box_width" value="<?php echo $labels[0]['print_box_width']; ?>" placeholder="가로" maxlength="4" style="width: 21%; height: 25px; border-radius: 0;"> mm</p>
                       <textarea class="form-control" rows="5" cols="" style="width: 100%;background-color:#e4e4e4 ;"></textarea>
                    </td>
                  </tr>
                </table>
                
            </div>
              <div class="col-md-12" style="padding-top: 40px;">
                
                <table class="col-md-8">
                  <tr>
                    <td style="vertical-align: baseline;">
                      <label style="padding:10px 30px 15px 35px;">여백</label>
                    </td>
                    <td style="">
                            <p class="text-center">상 : <input id="paper_margin_top" type="text" class="form-control" name="paper_margin_top" value="<?php echo $labels[0]['paper_margin_top']; ?>" placeholder="상" maxlength="4" style="width: 25%; height: 25px; border-radius: 0;"> mm</p>
                            <!-- <p class="text-center">하 : <input id="paper_margin_left" type="text" class="form-control" name="paper_margin_left" value="<?php #echo $labels[0]['paper_margin_left']; ?>" placeholder="하" maxlength="4" style="width: 25%; height: 25px; border-radius: 0;"> mm</p> -->
                    </td>
                    <td>
                      <p class="text-center">좌 : <input id="paper_margin_left" type="text" class="form-control" name="paper_margin_left" value="<?php echo $labels[0]['paper_margin_left']; ?>" placeholder="좌" maxlength="4" style="width: 25%; height: 25px; border-radius: 0;"> mm</p>
                      <!-- <p class="text-center">우 : <input readonly id="paper_margin_right" type="text" class="form-control" name="paper_margin_right" value="<?php #echo $labels[0]['paper_margin_right']; ?>" placeholder="우" maxlength="4" style="width: 25%; height: 25px; border-radius: 0;"> mm</p> -->
                    </td>
                  </tr>
                </table>
                <input type="hidden" id="label_id" name="label_id" value="<?php echo $labels[0]['origin_label_paper_id']; ?>">
                
            </div>
            
              <div class="col-md-12" style="padding-top: 40px;">
                
                <table class="col-md-12">
                  <tr>
                    <td style="vertical-align: baseline;">
                      <label style="">라벨지명칭</label>
                    </td>
                    <td style="">
                            <!-- <label style="font-weight: 200 ;padding:10px 30px 15px 30px;border:1px solid #e4e4e4 ;" id=""><?php echo $labels[0]['label_paper_name']; ?></label> -->
                            <input id="label_paper_name" type="text" class="form-control" name="label_paper_name" value="<?php echo $labels[0]['label_paper_name']; ?>" placeholder="v" style="height: 45px; border-radius: 0; width: 55%">
                    </td>
                    <td>
                      <!-- <label style="font-weight: 200; background-color:#e4e4e4 ;padding:10px 30px 15px 30px;">레이아웃등록</label> -->
                      <button type="submit" class="btn btn-primary" id="labelupdate" style="height: 45px;">레이아웃등록</button>
                    </td>
                  </tr>
                </table>
                
            </div>
            
          </form>
      
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
      $(function() {
        
      })

      var print_box_width = $('#print_box_width');
      var print_box_height = $('#print_box_height');
      var paper_margin_top = $('#paper_margin_top');
      var paper_margin_left = $('#paper_margin_left');
      var paper_margin_bottom = $('#paper_margin_bottom');
      var paper_margin_right = $('#paper_margin_right');
      var label_paper_name = $('#label_paper_name');
      var label_id = $('#label_id');
      var msglabel =  $('.msg-label');

      $('.dimension').on('change', function() {
        var labelid = $(this).val();
        // console.log (labelid);

        $.ajax({
          url  : '<?php echo base_url('/layout/getlabel'); ?>',
          data : 'labelid=' + labelid,
          type : 'POST',
          dataType: 'JSON',
          success : function(data) {
            console.log (data.cols_rows);
            print_box_width.val(data.print_box_width).fadeOut('fast').fadeIn('fast');
            print_box_height.val(data.print_box_height).fadeOut('fast').fadeIn('fast');
            paper_margin_top.val(data.paper_margin_top).fadeOut('fast').fadeIn('fast');
            paper_margin_left.val(data.paper_margin_left).fadeOut('fast').fadeIn('fast');
            paper_margin_bottom.val(data.paper_margin_bottom).fadeOut('fast').fadeIn('fast');
            paper_margin_right.val(data.paper_margin_right).fadeOut('fast').fadeIn('fast');
            label_paper_name.val(data.label_paper_name).fadeOut('fast').fadeIn('fast');
            label_id.val(data.id);
          }
        });

      });

      $('body').on('click', '#labelupdate', function(e){
        msglabel.fadeIn('slow');

        var labels = $('.labeldata').serialize()
        
        $.ajax({
          url  : '<?php echo base_url('/layout/save'); ?>',
          data : labels,
          type : 'POST',
          success : function(data) {
            setTimeout(function() {
              msglabel.fadeOut('slow');
            }, 1500)   
          }
        });

        e.preventDefault()
      });

      $('body').on('keydown', '#print_box_width, #print_box_height, #paper_margin_top, #paper_margin_left, #paper_margin_bottom, #paper_margin_right', function(e){-1!==$.inArray(e.keyCode,[46,8,9,27,13,110,190])||/65|67|86|88/.test(e.keyCode)&&(!0===e.ctrlKey||!0===e.metaKey)||35<=e.keyCode&&40>=e.keyCode||(e.shiftKey||48>e.keyCode||57<e.keyCode)&&(96>e.keyCode||105<e.keyCode)&&e.preventDefault()
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
  </body>
</html>
