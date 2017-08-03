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
          <li class="active"><a href="#"><img src="<?php echo base_url("assets2/img/setting.png"); ?>" /> 셀러설정</a></li>
          <li><a href="<?php echo base_url(); ?>layout/index"><img src="<?php echo base_url("assets2/img/print.png"); ?>" /> 프린팅</a></li>
          <li><a href="<?php echo base_url('upgrade/index');?>"><img src="<?php echo base_url("assets2/img/arrow_up.png"); ?>" /> 업그레이드</a></li>
        </ul>
      </div>
      
      <div class="col-sm-9 col-md-7 main">
       <h3></h3>
       <ul  class="nav nav-pills">
        <li class="active">
          <a  href="#1b" data-toggle="tab">글로벌 판매채널</a>
        </li>
        
      </ul>
       <div class="tab-content clearfix">
          <div class="tab-pane active" id="1b">
          <div class="col-md-12">
            <p style="margin-top: 20px">글로벌 판매채널 <br/><br/>다양한 글로벌 판매 채널을 연동해서 OnLabels를 사용해 보세요.</p>
              <form class="form-inline"  style="margin: 30px 0px;">
                <div class="form-group">
                  <select class="form-control" id="salechannel"  style="width: 250px;">
                  <option class="option-33" value="">글로벌 판매 채널  </option>
                  <option class="option-33" value="ebay">Ebay  </option>
                  <option class="option-33" value="amazon">Amazon  </option>
                  </select>
                </div>
                <button type="submit" class="btn btn-primary">연동추가</button>
              </form>
            <div class="table-responsive"  style="">
            <table class="table table-borderless dataTable">
              <thead>
                <tr>
                
                <th>프린트 수량 </th>
                <th>사용자 ID</th>
                <th>만료일</th>
                <th>Action</th>
              </tr>
              </thead>
              <tbody>
                <?php if ($sellers) : ?>
                  <?php foreach ($sellers as $seller) : ?>
                    <tr>
                      <td style="vertical-align: middle;"><?php echo $seller['sc_name'] ?></td>
                      <td style="vertical-align: middle;"><?php echo $this->session->userdata('uname') ?></td>
                      <td style="vertical-align: middle;"><?php echo date('Y-m-d', strtotime($seller['created'])) ?></td>
                      <td>
                        <select class="form-control" id="salechannelper" style="width: 80px;">
                        <option class="option-11"> -- </option>
                        <option class="option-11" value="ebay">재인증 </option>
                        </select>
                      </td>
                    </tr>
                  <?php endforeach; ?>
                <?php endif; ?>
                <!-- <tr>
                  
                  <td>Amazon</td>
                  <td>Maplestore</td>
                  <td>2017-12-31</td>
                  <td>
                    <select class="form-control" id="exampleInputName2" style="width: 80px;">
                    <option class="option-11">재인증 </option>
                    </select>
                  </td>
                </tr> -->
              </tbody>
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
    <script src="https://cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script> 
    if ($(".dataTable").length) {
      $(".dataTable").DataTable();
    }
    $('#DataTables_Table_0_length, #DataTables_Table_0_info').css({'font-size': '11px','padding-left':'10px'})
    $('#DataTables_Table_0_filter, #DataTables_Table_0_paginate').css({'font-size': '11px'})

    <?php if ($sellers) : ?>
    $('#salechannel>option').each(function(index){
      var sales = $(this).val();
      if (sales != "")
      {
        <?php foreach ($sellers as $seller) : ?>
          var seller = '<?php echo $seller['sc_market'] ?>';
          // console.log ('sales='+sales+' seller='+seller);
          if (sales == seller)
          {
            $(this).prop('disabled', true);
          }
        <?php endforeach; ?>
      }
    });
    <?php endif; ?>

    $('#salechannel').on('change', function() {
      var salechannel = $("#salechannel option:selected").val();
      var left = (screen.width/2)-(1000/2);
      var top = (screen.height/2)-(600/2);

      if (salechannel == 'ebay') {
        window.open('<?php echo $ebay_link;?>','_blank','top='+top+',left='+left+', width=1000,height=600');
      }
    });

    $('#salechannelper').on('change', function() {
      var salechannel = $("#salechannelper option:selected").val();
      var left = (screen.width/2)-(1000/2);
      var top = (screen.height/2)-(600/2);

      if (salechannel == 'ebay') {
        window.open('<?php echo $ebay_link;?>','_blank','top='+top+',left='+left+', width=1000,height=600');
      }
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
