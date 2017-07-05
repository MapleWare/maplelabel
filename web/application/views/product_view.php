      
      <style>
      .table {
        font-size: 12px !important;
      }
      .table td {
        border:0 !important;
      }
      </style>
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
                <div class="form-group" style="padding-left:20px;">
                <label for="exampleInputEmail2">판매채널 </label>
                    <select class="form-control" id="exampleInputName2" style="width: 260px;">
                      <option class="option-11" >전체  </option>
                      </select>
                </div> &nbsp; &nbsp;
                <div class="form-group">
                  <div class='input-group date' id=''>
                         &nbsp; &nbsp;<input type='text' class="form-control" value="검색어를 입력하세요" style="width: 280px;" />
                  </div>
                </div>
                <button style="padding:8px 40px 8px 40px;" type="submit" class="btn btn-primary">검색 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="fa fa-search"></span></button>
              </form>
              <div class="table-responsive">
                <table class="table">
                <div style="border:1px solid #ddd;"></div>
                  <thead>
                  <tr>
                  <th style="text-align:center">판매채널</th>
                  <th style="text-align:center">제품명</th>
                  <th style="text-align:center">SKU</th>
                  <th style="text-align:center">가격</th>
                  <th style="text-align:center">무게</th>
                  <th style="text-align:center">사이즈</th>
                  <th style="text-align:center">HS 코드</th>
                  </tr>
                  </thead>
                  <tbody>
                  
                    <tr>
                    <td rowspan="2" style="text-align: center;">ebay</td>
                    <td id="edit1" data-type="textarea" style="text-align: left;">Apple Macbook Air <br> 13 inch New <br> 1.6GHz / 256 GB</td>
                    <td style="text-align:center">192166993566</td>
                    <td id="edit2" style="text-align:center">$ 1500.000</td>
                    <td id="edit3" style="text-align:center">1350 g</td>
                    <td id="edit4" data-type="textarea" style="text-align:left">너비: 32.5 cm <br> 길이: 22.7 cm <br> 높이: 1.7 cm
                    </td>
                    <td id="edit5" style="text-align:center">12345678</td>
                    </tr>
                    <tr>
                    <td>
                    <hr style="border:0.01cm solid; border-style:dashed; margin-top:-20 px;">
                    <center><button type="submit" class="btn btn-primary" id="editbutton" ref="1"> 수정 </button></center>
                    </td>
                    <td>&nbsp;</td>
                    <td>
                    <hr style="border:0.01cm solid; border-style:dashed; margin-top:-20 px;">
                    <center><button type="submit" class="btn btn-primary" id="editbutton" ref="2"> 수정 </button></center>
                    </td>
                    <td>
                    <hr style="border:0.01cm solid; border-style:dashed; margin-top:-20 px;">
                    <center><button type="submit" class="btn btn-primary" id="editbutton" ref="3"> 수정 </button></center>
                    </td>
                    <td>
                    <hr style="border:0.01cm solid; border-style:dashed; margin-top:-20 px;">
                    <center><button type="submit" class="btn btn-primary" id="editbutton" ref="4"> 수정 </button></center>
                    </td>
                    <td>
                    <hr style="border:0.01cm solid; border-style:dashed; margin-top:-20 px;">
                    <center><button type="submit" class="btn btn-primary" id="editbutton" ref="5"> 수정 </button></center>
                    </td>
                    </tr>
                              
                                            
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
    <script src="//cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/bootstrap3-editable/js/bootstrap-editable.min.js"></script>
    <script type="text/javascript">
    $(function () {
      $("#from_date").datepicker().datepicker("setDate", new Date(new Date().getTime()-(30*24*60*60*1000)));
      $("#to_date").datepicker().datepicker("setDate", new Date());
    });
    </script>
    <script>
      
      $(document).ready(function() {
          

      });

      $('body').on('click','#editbutton', function(e) {
        e.stopPropagation();
        id = $(this).attr('ref');

          $('#edit'+id).editable({
             pk: id,
             url: '<?php echo base_url("/order/template/edit1"); ?>',
             title: 'Edit Product'
          });
          $('#edit'+id).editable('toggle');

        
        //$("*[id^=editmsgs]").each(function( index ) {
        //  console.log( index + ": " + $( this ).attr('ref') );
        //});
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
        $.ajax({
          url  : '<?php echo base_url('data-integrate/ebay/downloadOrders.php?s_ol_user_id=1'); ?>',
          type : 'GET',
          success : function(data) {
            //console.log (data);
            var total_order_count = $('#total_order_count').html();
            var new_total_order_count = parseInt(data)+parseInt(total_order_count);
            $('#total_order_count').html(new_total_order_count);
          }
        });
      });

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
