 <style>
  .panel-heading {
    padding: 10px 10px;
    border-bottom: 1px solid transparent;
    border-top-left-radius: 3px;
    border-top-right-radius: 3px;
  }
  .input-group-addon:first-child {
   width: 39%;
 }
 .input-group {
  width: 100%;
}
#form > div:last-child {
  margin-right: 0px;
}

</style>

<div class="container" style="padding: 100px;">    
  
  <div id="loginbox" class="mainbox col-md-8 col-md-offset-2 col-sm-8 col-sm-offset-2"> 
    
    
    
    <div class="panel panel-default" >
      <div class="panel-heading panel-body" >
        <div class="row">
          <h4 class="text-center">OnLabels 회원가입</h4>
          <div class="iconmelon">
            <img src="<?php echo base_url("assets2/img/user_icon.png"); ?>" class="img img-responsive"/>
          </div>
        </div>
        <div class="col-md-2"></div>
        <div class="col-md-8 col-xs-12">
          <?php $attributes = array("name" => "signupform", "id"=>"form", "class"=>"form-horizontal");
          echo form_open("signup/index", $attributes);?>

          <?php echo $this->session->flashdata('msg'); ?>
          
          <div class="input-group">
            <span class="input-group-addon"><img src="<?php echo base_url("assets2/img/emil-icon.png"); ?>"  style="    margin-left: -35px;"/>&nbsp;&nbsp;&nbsp;이메일</span>
            <input id="user" type="text" class="form-control" name="email" value="<?php echo set_value('email'); ?>" placeholder="실제 사용 Email로 가입하여 주세요" style="border-left: 0">                                        
          </div>
          <span class="text-danger"><?php echo form_error('email'); ?></span>

          <div class="input-group">
            <span class="input-group-addon"><img src="<?php echo base_url("assets2/img/lock-icon.png"); ?>" style="    margin-left: -35px;" />&nbsp;&nbsp;&nbsp;비밀번호</span>
            <input id="password" type="password" class="form-control" name="password" placeholder="사용자 이름을 입력하세요" style="border-left: 0">
          </div>                                                                  
          <span class="text-danger"><?php echo form_error('password'); ?></span>

          <div class="input-group">
            <span class="input-group-addon"><img src="<?php echo base_url("assets2/img/lock-icon.png"); ?>" />&nbsp;&nbsp;&nbsp;비밀번호 재확인</span>
            <input id="password" type="password" class="form-control" name="cpassword" placeholder="Password를 재입력하여 주세요" style="border-left: 0">
          </div>
          <span class="text-danger"><?php echo form_error('cpassword'); ?></span>
          
          <div class="form-group">
            <!-- Button -->
            <div class="col-sm-12 controls">
              <button type="submit" href="#" class="col-sm-12 btn btn-primary pull-right">회원가입</button>                          
            </div>
          </div>
          <div class="checkbox">
            <label style="font-weight: 700;">
             <input type="checkbox"> 아이디 저장하기
           </label>
           <label style="float: right;font-weight: 700;">비밀번호 찾기</label>
         </div>
       </form>     

     </div>
     <div class="col-md-2"></div>
   </div>                     
 </div>  
</div>
</div><!-- /.container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="<?php echo base_url("assets2/js/jquery.js"); ?>"><\/script>')</script>
    <script src="<?php echo base_url("assets2/js/bootstrap.min.js"); ?>"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
  </body>
  </html>
