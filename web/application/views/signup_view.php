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

    <title>New Register - onLabels</title>

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
            <li><a href="<?php echo base_url(); ?>login">로그인</a></li>
            <li class="active"><a href="<?php echo base_url(); ?>signup">회원가입</a></li>
            <li><a href="#">도움말</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>

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
                <form name="form" id="form" class="form-horizontal" enctype="multipart/form-data" method="POST">
                   
                    <div class="input-group">
                        <span class="input-group-addon"><img src="<?php echo base_url("assets2/img/emil-icon.png"); ?>"  style="    margin-left: -35px;"/>&nbsp;&nbsp;&nbsp;이메일</span>
                        <input id="user" type="text" class="form-control" name="user" value="" placeholder="실제 사용 Email로 가입하여 주세요" style="border-left: 0">                                        
                    </div>

                    <div class="input-group">
                        <span class="input-group-addon"><img src="<?php echo base_url("assets2/img/lock-icon.png"); ?>" style="    margin-left: -35px;" />&nbsp;&nbsp;&nbsp;비밀번호</span>
                        <input id="password" type="password" class="form-control" name="password" placeholder="사용자 이름을 입력하세요" style="border-left: 0">
                    </div>                                                                  

                    <div class="input-group">
                        <span class="input-group-addon"><img src="<?php echo base_url("assets2/img/lock-icon.png"); ?>" />&nbsp;&nbsp;&nbsp;비밀번호 재확인</span>
                        <input id="password" type="password" class="form-control" name="password" placeholder="Password를 재입력하여 주세요" style="border-left: 0">
                    </div>
                    
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
  </body>
</html>
