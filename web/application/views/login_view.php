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

    <title>Login - onLabels</title>

    <!-- Bootstrap core CSS -->
    <link href="<?php echo base_url("assets2/css/bootstrap.css"); ?>" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->

    <!-- Custom styles for this template -->
    <link href="<?php echo base_url("assets2/css/style.css"); ?>" rel="stylesheet">
    
  <link rel="stylesheet" href="http://fontawesome.io/assets/font-awesome/css/font-awesome.css">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
		<style>
			.panel-heading{
				padding: 10px 10px;
			}
			hr{
				margin-top: 0px;
				border-top: 1px solid #ccc;
			}
			.form-group {
    margin-bottom: 10px;
		}
		.icon-g{
			margin-left: 0px !important;
		}
		</style>
  </head>

  <body>

    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
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
        <div id="navbar" class="collapse navbar-collapse pull-right">
          <ul class="nav navbar-nav">
            <li class="active"><a href="<?php echo base_url(); ?>login">로그인</a></li>
            <li><a href="<?php echo base_url(); ?>signup">회원가입</a></li>
            <li><a href="#">도움말</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>

    <div class="container" style="padding: 100px;">    
        
    <div id="loginbox" class="mainbox col-md-8 col-md-offset-2 col-sm-8 col-sm-offset-2"> 
        
        
        
        <div class="panel panel-default" >
            <div class="panel-heading panel-body" >
                <div class="row" style="padding-bottom: 20px;">
                    <h4 class="text-center" style="font-size: 16.4px;">OnLabels 서비스 </h4>
								<p style="font-weight: 700;" class="text-center">로그인 후 이용하세요</p>
													
											</div>
							
								<div class="col-md-6" style="border-right: 1px solid #ccc;margin-bottom: 30px;">
									<?php $attributes = array("class"=> "form-horizontal", "name" => "loginform", "id"=>"form", "style" => "width: 95%");
			echo form_open("login/index", $attributes);?>
												 	
												 	<?php echo $this->session->flashdata('msg'); ?>

													<div class="input-group" style="margin-bottom: 10px;">
															<span class="input-group-addon"><img src="<?php echo base_url("assets2/img/user.png"); ?>" />&nbsp;&nbsp;&nbsp;이메일</span>
															<input id="user" type="text" class="form-control" name="email" value="" placeholder="Email을 입력하세요" style="border-left: 0"> 
													</div>

													<span class="text-danger"><?php echo form_error('email'); ?></span>
			
													<div class="input-group" style="margin-bottom: 10px;">
															<span class="input-group-addon"><img src="<?php echo base_url("assets2/img/password.png"); ?>" style="" />&nbsp;&nbsp;&nbsp;비밀번호</span>
															<input id="password" type="password" class="form-control" name="password" placeholder="Password를 입력하세요" style="border-left: 0">
													</div>        

													<span class="text-danger"><?php echo form_error('password'); ?></span>                                                          
								
													<div class="form-group" style="margin-top:20px;">
															<!-- Button -->
															<div class="col-sm-12 controls">
																	<button type="submit" href="#" class="col-sm-12 btn btn-primary pull-right">로그인</button>                          
															</div>
													</div>
													
													<div class="checkbox">
														<label style="font-weight: 700;">
															<input type="checkbox"> 아이디 저장하기
														</label>
														<label style="float: right;font-weight: 700;">비밀번호 찾기</label>
													</div>
													<hr/>
													
													<label style="float: right;font-weight: 700;color: #337ab7;padding-bottom: 20px;">
													<a href="<?php echo base_url(); ?>signup">OnLabels에 가입하기</a></label>
													
										</form>
									
									</div>
											
									<div class="col-md-1">
											<span class="badge" style="position: absolute;top: 98px;right: 36px">or</span>
									</div>
											
									<div class="col-md-6 form-horizontal">
													
													<div class="form-group icon-g">
															<!-- Button -->
															<div class="col-sm-12 controls">
																	<button type="submit" href="" class="col-sm-12 btn btn-default pull-right" id="fblink" style="padding: 2px 2px;">
																		<img  src="<?php echo base_url("assets2/img/facebook_LOGO.png"); ?>" style="float: left;width: 27px;" />
																		<p style="margin: 3px 0 0 0;">페이스북 로그인</p>
																	</button>                          
															</div>
													</div>
													<div class="form-group  icon-g">
															<!-- Button -->
															<div class="col-sm-12 controls">
																	<button type="submit" href="#" class="col-sm-12 btn btn-default pull-right" style="padding: 2px 2px;">
																		<img  src="<?php echo base_url("assets2/img/kakao_LOGO.png"); ?>" style="float: left;width: 27px;" />
																		<p style="margin: 3px 0 0 0;">카카오톡 로그인</p>
																	</button>                          
															</div>
													</div>
													<div class="form-group  icon-g">
															<!-- Button -->
															<div class="col-sm-12 controls">
																	<button type="submit" href="#" class="col-sm-12 btn btn-default pull-right" style="padding: 2px 2px;">
																		<img  src="<?php echo base_url("assets2/img/naver_LOGO.png"); ?>" style="float: left;width: 27px;" />
																		<p style="margin: 3px 0 0 0;">Naver 로그인</p>
																	</button>                          
															</div>
													</div>
													<div class="form-group  icon-g">
															<!-- Button -->
															<div class="col-sm-12 controls">
																	<button type="submit" href="#" class="col-sm-12 btn btn-default pull-right" style="padding: 2px 2px;">
																		<img  src="<?php echo base_url("assets2/img/google_LOGO.png"); ?>" style="float: left;width: 27px;" />
																		<p style="margin: 3px 0 0 0;">구글 로그인</p>
																	</button>                          
															</div>
													</div>
			
			
			
			
													
									</div>
																 

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

    <script>
    $('body').on('click', '#fblink', function() {
    	window.location = '<?php echo $authUrl; ?>';
    });
    </script>
  </body>
</html>
