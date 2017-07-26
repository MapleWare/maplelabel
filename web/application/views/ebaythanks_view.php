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
      
      .desc { color:#6b6b6b;}
      .desc a {color:#0092dd;}
      
      .dropdown dd, .dropdown dt, .dropdown ul { margin:0px; padding:0px; }
      .dropdown dd { position:relative; }
      .dropdown a, .dropdown a:visited {
        color: #000;
        text-decoration: none;
        outline: none;
      }
      .dropdown a:hover { color:#5d4617;}
      .dropdown dt a:hover { color:#5d4617; border: 1px solid #d0c9af;}
      .dropdown dt a {
        background: #ffffff url(<?php echo base_url("assets2/img/arrow.png"); ?>) no-repeat scroll right center;
        display: block;
        padding-right: 20px;
        border: 1px solid #ccc;
      }
      .dropdown dt a span {cursor:pointer; display:block; padding:8px;}
      .dropdown dd ul { background:#fff none repeat scroll 0 0; border:1px solid #ccc; color:#C5C0B0; display:none;
        left:0px; padding:5px 0px; position:absolute; top:2px; width:100%; min-width:170px; list-style:none;}
        .dropdown span.value { display:none;}
        .dropdown dd ul li a { padding:8px; display:block;}
        .dropdown dd ul li a:hover { background-color:#ddd;}
        
        .dropdown img.flag { border:none; vertical-align:middle; margin-left:10px; }
        .flagvisibility { display:none;}
      </style>
   <div class="container" style="padding: 100px;">    
    
    <div id="loginbox" class="mainbox col-md-8 col-md-offset-2 col-sm-8 col-sm-offset-2"> 
      
      
      
      <div class="panel panel-default" >
        <div class="panel-heading panel-body" >
          <div class="row">
            <h4 class="text-center">OnLabels 채널선택</h4>
            <div class="iconmelon">
              <img src="<?php echo base_url("assets2/img/global_icon.png"); ?>" class="img img-responsive"/>
            </div>
            <h5 class="text-center" style="padding: 0px 160px;line-height: 20px;font-weight: bold;">You are now sign-in to <img class="flag" src="<?php echo base_url("assets2/img/eBay Logo.png"); ?>" alt="" /> this window will closes automatically.</h5>
          </div>
          <div class="col-md-3"></div>
          <div class="col-md-6 col-xs-12">
            <form name="form" id="form" class="form-horizontal" enctype="multipart/form-data" method="POST" action="<?php echo base_url('dashboard/index');?>">
             
             <div class="form-group">
                            <span id="result"></span>
                          </div>
                          <div class="form-group channelbutton" style="display: none; margin-top: 30px;">
                            <!-- Button -->
                            <div class="col-sm-12 controls">
                              <button type="submit" href="#" class="col-sm-12 btn btn-primary pull-right">회원가입</button>                          
                            </div>
                          </div>
                          
                        </form>     
                      </div>
                      <div class="col-md-3"></div>
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


    function closeWindow() {
      setTimeout(function() {
        window.opener.location.href = "<?php echo base_url('dashboard/index') ?>";
        window.close();
      }, 3000);
    }
    window.onload = closeWindow();



     $(".dropdown img.flag").addClass("flagvisibility");

     $(".dropdown dt a").click(function() {
      $(".dropdown dd ul").toggle();
    });
     
     function getSelectedValue(id) {
      return $("#" + id).find("dt a span.value").html();
    }

    $(document).bind('click', function(e) {
      var $clicked = $(e.target);
      if (! $clicked.parents().hasClass("dropdown"))
        $(".dropdown dd ul").hide();
    });


    $(".dropdown img.flag").toggleClass("flagvisibility");
    

  </script>
</body>

</html>
