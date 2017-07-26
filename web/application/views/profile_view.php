<style>
  h4{margin: 30px 0px;}
  .main { padding:0; }
  .page-header { margin: 12px 0 20px; }

  .form-control { 
    background-color : #e3e3e3;
    border : 1px solid #e3e3e3;
    border-radius: 0;
    box-shadow: none;
  }
  .form-horizontal .control-label {
    text-align: left;
  }

  .text-danger-company {
    color: #a94442;
    font-size: 11px;
  }
  .text-danger-company p {
    margin: 0;
  }
  .dropdown-toggle,
  .btn-default:hover,
  .btn-default:focus {
    background-color : #e3e3e3;
    border : 1px solid #e3e3e3;
    border-radius: 0;
    width: 100%;
    text-align: left;
  }
  #basic ul {
    width: 100%;
    font-size: 12px;
  }
  #basic button {
    font-size: 12px;
  }
  .nav > li > a:hover, .nav > li > a:focus { border: 0; }
</style>
<link href="<?php echo base_url("assets2/css/flags.css"); ?>" rel="stylesheet">
  	<div class="container-fluid">
  		<div class="row">
  			<div class="col-sm-3 col-md-2 sidebar">
  				<h5 class="page-header">
            <div style="border-left:5px solid #337ab7; padding-left:10px;"><?php echo $uemail; ?></br></br>회원등급 : Free Member</div>
          </h5>
  				<ul class="nav nav-sidebar">
  					<li class="active"><a href=""><img src="<?php echo base_url("assets2/img/user_profile.png"); ?>" /> 프로파일</a></li>
  					<li><a href="<?php echo base_url('sellers/index');?>"><img src="<?php echo base_url("assets2/img/setting.png"); ?>" /> 셀러설정</a></li>
  					<li><a href="<?php echo base_url(); ?>layout/index"><img src="<?php echo base_url("assets2/img/print.png"); ?>" /> 프린팅</a></li>
  					<li><a href="<?php echo base_url('upgrade/index');?>"><img src="<?php echo base_url("assets2/img/arrow_up.png"); ?>" /> 업그레이드</a></li>
  				</ul>
  			</div>
  			
  			<div class="col-sm-9 col-md-9 main">
  				<h3></h3>
  				<ul  class="nav nav-pills">
  					<li>
  						<a  href="#1b" data-toggle="tab">회원정보</a>
  					</li>
  					<li>
  						<a href="#2b" data-toggle="tab">비밀번호</a>
  					</li>
            <li>
              <a href="#3b" data-toggle="tab">주소</a>
            </li>
  					
  				</ul>

          <div class="tab-content clearfix">
            <div class="tab-pane" id="1b">
              <div class="col-md-2">
                <h4 style="padding:2px 10px 5px 10px;">이름</h4>
                <h4 style="padding:2px 10px 5px 10px;">회사명</h4>
                <h4 style="padding:2px 10px 5px 10px;">이메일</h4>
                <h4 style="padding:2px 10px 5px 10px;">전화번호</h4>
              </div>
              <div class="col-md-10">
              <h4 style="font-weight: 200; background-color:#e3e3e3; padding:10px; margin:20px 0px 0px 0px;"><?php echo $uname; ?></h4>
                <h4 style="font-weight: 200; background-color:#e3e3e3; padding:10px; margin:15px 0px 0px 0px;"> - </h4>
                <h4 style="font-weight: 200; background-color:#e3e3e3; padding:10px; margin:15px 0px 0px 0px;"><?php echo $uemail; ?></h4>
                <h4 style="font-weight: 200; background-color:#e3e3e3; padding:10px;margin:15px 0px 20px 0px;"> - </h4>
                <button type="submit" href="#" class=" btn btn-primary pull-right" style="">
                  업데이트
                </button>
                <button type="submit" href="#" class=" btn btn-primary pull-right" style="margin-right:10px; background-color:#3c3a3a;">
                  &nbsp&nbsp&nbsp 취소 &nbsp&nbsp
                </button>
              </div>
            </div>
            <div class="tab-pane" id="2b">
                <div class="col-md-2">
                  <h4 style="padding:2px 0px 5px 0px;">현재비밀번호 </h4>
                  <h4 style="padding:2px 0px 5px 0px;">신규비밀번호</h4>
                  <h4 style="padding:2px 0px 5px 0px; margin-right:-20px;">비밀번호재입력</h4>
                </div>
                <div class="col-md-10">
                  <h4 style="font-weight: 200; background-color:#e3e3e3; padding:10px; margin:20px 0px 0px 0px;">현재비밀번호를 입력하세요</h4>
                  <h4 style="font-weight: 200; background-color:#e3e3e3; padding:10px; margin:15px 0px 0px 0px;">대소문자 및 특수 문자를 포함한 8자리 이상으로 입력하세요 </h4>
                  <h4 style="font-weight: 200; background-color:#e3e3e3; padding:10px; margin:15px 0px 20px 0px;">새로운 비밀번호를 다시 입력하세요</h4>
                  <button type="submit" href="#" class=" btn btn-primary pull-right" style="">
                    업데이트
                  </button>
                </div>
            </div>

            <div class="tab-pane" id="3b">
            <br>
              <div class="col-md-10">
                <?php echo $this->session->flashdata('msg-company'); ?>
                <?php 
                if ($this->session->userdata('company_success')) :
                  echo '<div class="msg-company alert alert-success text-center">Company details has been updated</div>';
                endif;
                ?>
                <?php $attributes = array("class"=> "form-horizontal", "name" => "companyform", "id"=>"form");
          echo form_open("profile/index", $attributes);?>
                  <div class="form-group">
                      <label for="inputEmail" class="control-label col-xs-2">회사 이름</label>
                      <div class="col-xs-8">
                          <input type="text" value="<?php echo $user[0]->companyname; ?>" name="companyname" class="form-control" id="inputEmail" placeholder="회사 이름">
                          <span class="text-danger-company"><?php echo form_error('companyname'); ?></span>
                      </div>
                  </div>
                  <div class="form-group">
                      <label for="" class="control-label col-xs-2">이름</label>
                      <div class="col-xs-8">
                          <input type="text" value="<?php echo $user[0]->first_name; ?>" name="first_name" class="form-control" id="inputPassword" placeholder="이름">
                          <span class="text-danger-company"><?php echo form_error('first_name'); ?></span>
                      </div>
                  </div>
                  <div class="form-group">
                      <label for="" class="control-label col-xs-2">성</label>
                      <div class="col-xs-8">
                          <input type="text" value="<?php echo $user[0]->last_name; ?>" name="last_name" class="form-control" id="inputPassword" placeholder="성">
                          <span class="text-danger-company"><?php echo form_error('last_name'); ?></span>
                      </div>
                  </div>
                  <div class="form-group">
                      <label for="" class="control-label col-xs-2">거리 1</label>
                      <div class="col-xs-8">
                          <input type="text" value="<?php echo $user[0]->street1; ?>" name="street1" class="form-control" id="inputPassword" placeholder="거리 1">
                          <span class="text-danger-company"><?php echo form_error('street1'); ?></span>
                      </div>
                  </div>
                  <div class="form-group">
                      <label for="" class="control-label col-xs-2">거리 2</label>
                      <div class="col-xs-8">
                          <input type="text" value="<?php echo $user[0]->street2; ?>" name="street2" class="form-control" id="inputPassword" placeholder="거리 2">
                      </div>
                  </div>
                  <div class="form-group">
                      <label for="" class="control-label col-xs-2">시티</label>
                      <div class="col-xs-8">
                          <input type="text" value="<?php echo $user[0]->city; ?>" name="city" class="form-control" id="inputPassword" placeholder="시티">
                          <span class="text-danger-company"><?php echo form_error('city'); ?></span>
                      </div>
                  </div>
                  <div class="form-group">
                      <label for="" class="control-label col-xs-2">지방</label>
                      <div class="col-xs-8">
                          <input type="text" value="<?php echo $user[0]->stateorprovice; ?>" name="province" class="form-control" id="inputPassword" placeholder="지방">
                          <span class="text-danger-company"><?php echo form_error('province'); ?></span>
                      </div>
                  </div>
                  <div class="form-group">
                      <label for="inputPassword" class="control-label col-xs-2">국가</label>
                      <div class="col-xs-8">
                          <!-- <input type="text" value="<?php echo $user[0]->country; ?>" name="country" class="form-control" id="inputPassword" placeholder="국가"> -->
                          <div id="basic" data-input-name="country" data-selected-country="<?php echo $user[0]->country=='South Korea'?'KR':$user[0]->country;?>"></div>
                          <span class="text-danger-company"><?php echo form_error('country'); ?></span>
                      </div>
                      
                  </div>
                  <div class="form-group">
                      <label for="" class="control-label col-xs-2">우편 번호</label>
                      <div class="col-xs-8">
                          <input type="text" value="<?php echo $user[0]->postal_code; ?>" name="postal_code" class="form-control" id="inputPassword" placeholder="우편 번호">
                          <span class="text-danger-company"><?php echo form_error('postal_code'); ?></span>
                      </div>
                  </div>

                  
                  
                  <div class="form-group">
                      <div class="col-xs-offset-2 col-xs-12">
                          <button type="submit" class="btn btn-primary" name="company_update" style="float:right;">업데이트</button>
                      </div>
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
    <script src="<?php echo base_url("assets2/js/jquery.flagstrap.min.js"); ?>"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script>
    $(document).ready(function() {
      $('#basic').flagStrap();
      var iscompany_error = false;
      $('body').find('.text-danger-company').each(function(){
        if ($(this).html() != "") {
          iscompany_error = true;
          return false;
        }
      });

      //console.log ($('body').find('.msg-company').html());

       <?php if ($this->session->userdata('company_success')) : 
          $this->session->unset_userdata('company_success'); ?>
          iscompany_error = true;
        <?php endif; ?>
      if (iscompany_error) {

        $('.nav-pills li:nth-child(1), #1b').removeClass('active');
        $('.nav-pills li:nth-child(3), #3b').addClass('active');

        //$('#1b').fadeOut('fast');
        //$('#3b').fadeIn('slow');
        // setTimeout(function(){
        //   $('.text-danger-company').fadeOut('slow').html("");
        // }, 2000)
      }
      else
      { 
        $('.nav-pills li:nth-child(3), #3b').removeClass('active');
        $('.nav-pills li:nth-child(1), #1b').addClass('active');
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
