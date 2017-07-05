      <style>
      table#table td:nth-child(1) {
        width: 20%;
      }
      table#table td:nth-child(2) {
        width: 25%;
      }
      table#table td:nth-child(3) {
        width: 15%;
      }
      table#table td:nth-child(4) {
        width: 45%;
      }

      #info_epost {
        display: none;
      }

      
      table#table_epost td:nth-child(4) {
        width: 50%;
      }
      table#table_epost td:nth-child(6) {
        width: 15%;
      }
      table#table_epost td:nth-child(5) {
        text-align: center;
      }
      #table_epost th  {
        /*font-size: 13px;*/
      }
      #table_epost {
        /*font-size: 12px;*/
      }
      @media (min-width: 768px) {
        .modal-dialog {
          width: 600px;
          margin: 30px auto;
        }
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

                    <div class="form-group">
                      <label for="exampleInputEmail2">판매채널 </label>
                      <div class='input-group date' id='datetimepicker5'>
                        <input type='text' id="from_date" class="form-control  text-center" />
                        <span class="input-group-addon" style="background-color:#969393;">
                          <span class="glyphicon glyphicon-calendar" style="color:#ececec;"></span>
                        </span>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail2">종료일 </label>
                      <div class='input-group date' id='datetimepicker6'>
                        <input type='text' id="to_date" class="form-control  text-center" />
                        <span class="input-group-addon" style="background-color:#969393;">
                          <span class="glyphicon glyphicon-calendar" style="color:#ececec;"></span>
                        </span>
                      </div>
                    </div>
                    <button type="submit" class="btn btn-primary" id="search_date">검색 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="fa fa-search"></span></button>
                  </form>
                  <div class="table-responsive">
                    <table class="table" id="table">
                      <thead>
                        <tr>
                          <!-- <th><input id="order-select-all" type="checkbox" class="form-group tick"></th> -->
                          <th>일련번호</th>
                          <th>생성일자</th>
                          <th>출력수</th>
                          <th>라벨요약</th>
                          <th>추가작업</th>
                        </tr>
                      </thead>
                      <tbody>
                        <!-- <tr>
                          <td><input type="checkbox" class="form-group tick"></td>
                          <td>1-123</td>
                          <td>2017.06.17 오후 3시 30분</td>
                          <td>3</td>
                          <td>
                            배송수단 : <strong style="color: #346896">우체국, 소형포장 </strong> <br/><br/>
                            라벨 출력내용 :  <strong style="color: #346896">From, To, CN22, Logo, Messgae </strong><br/><br/>
                            라벨 템플릿 :  <strong style="color: #346896">폼텍 1x2 </strong><br/><br/>
                          </td>
                          <td>
                            <select class="form-control" id="exampleInputName2" style="width: 100px;">
                              <option class="option-11">선택  </option>
                            </select>
                          </td>
                        </tr> -->
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
        <input type="hidden" name="epost" id="epost" value="0">
        <div class="modal fade in" id="myModal" style="display: none">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header" style="border-bottom:0; padding-bottom:0;">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h3 class="text-center">국제 우편물 접수증 출력 주문 선택</h3>
                <!-- <h5 class="text-center">라벨 하단에 판매자 문구를 추가할 수 있습니다.(예, 취급주의)</h5> -->
              </div>
              <div class="modal-body">
                <table class="table table-striped" id="table_epost">
                  <thead id="tblHead">
                    <tr style="border-top: 2px solid #ddd;">
                      <th><input type="checkbox" id="order-select-all" class="form-group tick"></th>
                      <th class="text-left">신분증</th>
                      <th class="text-left">시장</th>
                      <th class="text-left">이름</th>
                      <th class="text-left">수량</th>
                      <th class="text-left">양</th>
                    </tr>
                  </thead>
                  <tbody>
                    
                    <!-- <tr>
                      <td><input type="checkbox" class="form-group tick"></td>
                      <td>Handle with care. - Fragile</td>
                      <td class="text-right">
                        <button type="submit" class="btn btn-primary"  >수정</button>
                        <button type="submit" class="btn btn-default" style="background: #444444;color: #fff;">삭제</button>
                      </td>
                    </tr> -->
                    
                  </tbody>
                </table>
                <br>
                <div class="form-group " style="width: 100%; text-align: right; margin: 0px auto; ">
                 <button class="btn btn-lg btn-primary"   style=" ">print</button>
                 <button class="btn btn-lg btn-primary">print</button>
                 <div class="clearfix"></div>
               </div>
             </div>

           </div><!-- /.modal-content -->
         </div><!-- /.modal-dialog -->
       </div><!-- /.modal -->

       <!-- 30-10-OrderManagement-1x2 -->

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
    <script type="text/javascript">
    $(function () {
      $("#from_date").datepicker().datepicker("setDate", new Date(new Date().getTime()-(30*24*60*60*1000)));
      $("#to_date").datepicker().datepicker("setDate", new Date());
    });
    </script>
    <script>
      var table;
      var table_epost;
      
      $(document).ready(function() {
        //datatables
        table = $('#table').DataTable({ 
          "sDom": '<t><"#info"lip>',
          "lengthMenu": [[5, 10, 15, -1], [5, 10, 20, "All"]],
          "processing": true, 
          "serverSide": true, 
          "order": [],
          "iDisplayLength" :5,
          "ajax": {
            "url": "<?php echo base_url('/output/ajax_list')?>",
            "type": "POST",
            "dataType": "json",
            "data": function (jsonData) {
              jsonData.from_date = $('#from_date').val();
              jsonData.to_date = $('#to_date').val();
              return jsonData.data;
              }
          },
          "columnDefs": [{ 
            "targets": [ 0,1,2,3,4 ], 
            "orderable": false,
            }],
        });

        table_epost = $('#table_epost').DataTable({ 
          "sDom": '<t><"#info_epost"lip>',
          "lengthMenu": [[5, 10, 15, -1], [5, 10, 20, "All"]],
          "processing": true, 
          "serverSide": true, 
          "order": [],
          "iDisplayLength" :50,
          "ajax": {
            "url": "<?php echo base_url('/output/epost_list')?>",
            "type": "POST",
            "dataType": "json",
            "data": function (jsonData) {
              jsonData.id = $('#epost').val();
              return jsonData.data;
              }
          },
          "columnDefs": [{ 
            "targets": [ 0,1,2,3,4,5 ], 
            "orderable": false,
            }],
        });

        $('body').on('click','#search_date', function() {
          table.draw();
          $('#table').fadeOut('fast').fadeIn('slow');
          return false;
        });

      });

      $('body').on('change','#reprocess', function() {
        var orderids = $(this).val();
        $('#epost').val(orderids);
        var orderids_txt = $(this).find(':selected').text().trim();

        // console.log (orderids_txt);
        if (orderids_txt=='PDF') 
        {
          var dimensions = $('#dimension'+orderids).attr('ref');
          var additonal_info = $('#infos'+orderids).attr('ref');
          var selected_tab = table;
          var table_selected = selected_tab.context[0].nTable.id;
          var startpoint = 0;
          $.ajax({
            url  : '<?php echo base_url('/order/process'); ?>',
            data : 'ids=' + orderids + ',' + dimensions+ ',' + startpoint + ',' + table_selected + ',' + additonal_info,
            type : 'POST',
            dataType: 'JSON',
            success : function(data) {
              window.open("<?php echo base_url('/order/generate/'); ?>" + data, "_blank");

              setTimeout(function() {
                //table.draw();
              }, 500);
            }
          });
        }
        else if (orderids_txt=='국제우편물접수출력')
        {
          // console.log (orderids)
          $('#myModal').modal('show');
          //table.draw();
          table_epost.draw();
          $('#table_epost').fadeOut('fast').fadeIn('slow');
        }
        
      });

      $("#myModal").on("hidden.bs.modal", function () {
        console.log ('close')
        $('body').find('input:checkbox[id^="order-select-all"]').prop('checked', false);
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
        var rows = table_epost.rows({ 'search': 'applied' }).nodes();
        $('input[type="checkbox"]', rows).prop('checked', this.checked);
      });

      // Handle click on checkbox to set state of "Select all" control
      $('#table_epost tbody').on('change', 'input[type="checkbox"]', function(){
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
