    </div><!-- /.content-wrapper -->
    <footer class="main-footer">
       <strong>Copyright &copy; 2016 Dinus Students </strong> All rights reserved.
    </footer>
    <script type="text/javascript">
    $('.priceFormat').priceFormat({
          prefix: 'R$ ',
          centsSeparator: ',',
          thousandsSeparator: '.'
      });
    </script>
    <!===========================================================================>
    </div>
    <!-- jQuery 2.1.4 -->
    <script src="<?php echo base_url('style/admin/plugins/jQuery/jQuery-2.1.4.min.js')?>"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="<?php echo base_url('style/admin/bootstrap/js/bootstrap.min.js')?>"></script>
    <!-- DataTables -->
    <script src="<?php echo base_url('style/admin/plugins/datatables/jquery.dataTables.min.js')?>"></script>
    <script src="<?php echo base_url('style/admin/plugins/datatables/dataTables.bootstrap.min.js')?>"></script>
    <!-- SlimScroll -->
    <script src="<?php echo base_url('style/admin/plugins/slimScroll/jquery.slimscroll.min.js')?>"></script>
    <!-- FastClick -->
    <script src="<?php echo base_url('style/admin/plugins/fastclick/fastclick.min.js')?>"></script>
    <!-- AdminLTE App -->
    <script src="<?php echo base_url('style/admin/dist/js/app.min.js')?>"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="<?php echo base_url('style/admin/dist/js/demo.js')?>"></script>
    <!-- page script -->
    <script>
      $(function () {
        $("#example1").DataTable();
        $('#example2').DataTable({
          "paging": true,
          "lengthChange": false,
          "searching": false,
          "ordering": true,
          "info": true,
          "autoWidth": false
        });
      });
    </script>
    <!=================================================================================>
    <!-- Select2 -->
    <script src="<?php echo base_url('style/admin/plugins/select2/select2.full.min.js')?>"></script>
    <!-- InputMask -->
    <script src="<?php echo base_url('style/admin/plugins/input-mask/jquery.inputmask.js')?>"></script>
    <script src="<?php echo base_url('style/admin/plugins/input-mask/jquery.inputmask.date.extensions.js')?>"></script>
    <script src="<?php echo base_url('style/admin/plugins/input-mask/jquery.inputmask.extensions.js')?>"></script>
    <!-- date-range-picker -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js"></script>
    <script src="<?php echo base_url('style/admin/plugins/daterangepicker/daterangepicker.js')?>"></script>
    <!-- bootstrap color picker -->
    <script src="<?php echo base_url('style/admin/plugins/colorpicker/bootstrap-colorpicker.min.js')?>"></script>
    <!-- bootstrap time picker -->
    <script src="<?php echo base_url('style/admin/plugins/timepicker/bootstrap-timepicker.min.js')?>"></script>
    <!-- iCheck 1.0.1 -->
    <script src="<?php echo base_url('style/admin/plugins/iCheck/icheck.min.js')?>"></script>
    <!-- Page script -->
    <script>
      $(function () {
        

        //Datemask dd/mm/yyyy
        $("#datemask").inputmask("dd/mm/yyyy", {"placeholder": "dd/mm/yyyy"});
        //Datemask2 mm/dd/yyyy
        $("#datemask2").inputmask("mm/dd/yyyy", {"placeholder": "mm/dd/yyyy"});
        //Money Euro
        $("[data-mask]").inputmask();

        //Date range picker
        $('#reservation').daterangepicker();
        

        //iCheck for checkbox and radio inputs
        $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
          checkboxClass: 'icheckbox_minimal-blue',
          radioClass: 'iradio_minimal-blue'
        });
        //Red color scheme for iCheck
        $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
          checkboxClass: 'icheckbox_minimal-red',
          radioClass: 'iradio_minimal-red'
        });
        //Flat red color scheme for iCheck
        $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
          checkboxClass: 'icheckbox_flat-green',
          radioClass: 'iradio_flat-green'
        });

        //Colorpicker
        $(".my-colorpicker1").colorpicker();
        //color picker with addon
        $(".my-colorpicker2").colorpicker();

        //Timepicker
        $(".timepicker").timepicker({
          showInputs: false
        });
        /*/Initialize Select2 Elements
        $(".select2").select2();
        //Date range picker with time picker
        $('#reservationtime').daterangepicker({timePicker: true, timePickerIncrement: 30, format: 'MM/DD/YYYY h:mm A'});
        //Date range as a button
        $('#daterange-btn').daterangepicker(
            {
              ranges: {
                'Today': [moment(), moment()],
                'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                'This Month': [moment().startOf('month'), moment().endOf('month')],
                'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
              },
              startDate: moment().subtract(29, 'days'),
              endDate: moment()
            },
        function (start, end) {
          $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
        }
        );*/
      });
    </script>
    <!=================================================================================>
    <!-- jQuery UI 1.11.4 -->
    <script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
    <!-- fullCalendar 2.2.5 -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js"></script>
    <script src="<?php echo base_url('style/admin/plugins/fullcalendar/fullcalendar.min.js')?>"></script>
    <!-- Page specific script -->
    <script>
      $(function () {

        /* initialize the external events
         -----------------------------------------------------------------*/
        function ini_events(ele) {
          ele.each(function () {  

            // create an Event Object (http://arshaw.com/fullcalendar/docs/event_data/Event_Object/)
            // it doesn't need to have a start or end
            var eventObject = {
              title: $.trim($(this).text()) // use the element's text as the event title
            };

            // store the Event Object in the DOM element so we can get to it later
            $(this).data('eventObject', eventObject);

            // make the event draggable using jQuery UI
            $(this).draggable({
              zIndex: 1070,
              revert: true, // will cause the event to go back to its
              revertDuration: 0  //  original position after the drag
            });

          });
        }
        ini_events($('#external-events div.external-event'));

        /* initialize the calendar
         -----------------------------------------------------------------*/
        //Date for the calendar events (dummy data)
        var date = new Date();
        var d = date.getDate(),
                m = date.getMonth(),
                y = date.getFullYear();
        $('#calendar').fullCalendar({
          header: {
            left: 'prev,next today',
            center: 'title',
            right: 'month,agendaWeek,agendaDay'
          },
          buttonText: {
            today: 'today',
            month: 'month',
            week: 'week',
            day: 'day'
          },
          //Random default events
          events: [
            <?php
              include"../config/koneksi.php";
              try{
                /*$query2 = $conn->prepare("select * from calendar");
                $query2->execute();
                while($row2 = $query2->fetch()) {
                    $mulai=$row2['mulai'];
                    $selesai=$row2['selesai'];
                    $warna=$row2['warna'];

                    $array2=explode("/",$mulai);
                      $tgl_mulai=$array2[0];
                      $bln_mulai=$array2[1]-1;
                      $thn_mulai=$array2[2];

                    $array3=explode("/",$selesai);
                      $tgl_selesai=$array3[0]+1;
                      $bln_selesai=$array3[1]-1;
                      $thn_selesai=$array3[2];
                    ?>{
                        title: '<?php echo $row2['keterangan']?>',
                        start: new Date(<?php echo $thn_mulai?>, <?php echo $bln_mulai?>, <?php echo $tgl_mulai?>),
                        end: new Date(<?php echo $thn_selesai?>, <?php echo $bln_selesai?>, <?php echo $tgl_selesai?>),
                        allDay: true,
                        backgroundColor: "<?php echo $warna?>", //Blue
                        borderColor: "<?php echo $warna?>" //Blue
                      },
                    <?php
                }*/

              }catch(PDOException $e){
                  //echo "Error! gagal menyimpan data siswa:".$e->getMessage();  
              }  
            ?>        
            { title: ' ',
              start: new Date(2016, 1, 1, 1, 0), //tahun, bulan+1, tanggal, jam, 0
              end: new Date(2016, 1, 1, 1, 0),
              allDay: false,
              backgroundColor: "#fff", //Info (aqua)
              borderColor: "#fff" //Info (aqua)
            }
          ],
          editable: true,
          droppable: true, // this allows things to be dropped onto the calendar !!!
          drop: function (date, allDay) { // this function is called when something is dropped

            // retrieve the dropped element's stored Event Object
            var originalEventObject = $(this).data('eventObject');

            // we need to copy it, so that multiple events don't have a reference to the same object
            var copiedEventObject = $.extend({}, originalEventObject);

            // assign it the date that was reported
            copiedEventObject.start = date;
            copiedEventObject.allDay = allDay;
            copiedEventObject.backgroundColor = $(this).css("background-color");
            copiedEventObject.borderColor = $(this).css("border-color");

            // render the event on the calendar
            // the last `true` argument determines if the event "sticks" (http://arshaw.com/fullcalendar/docs/event_rendering/renderEvent/)
            $('#calendar').fullCalendar('renderEvent', copiedEventObject, true);

            // is the "remove after drop" checkbox checked?
            if ($('#drop-remove').is(':checked')) {
              // if so, remove the element from the "Draggable Events" list
              $(this).remove();
            }

          }
        });
      });
    </script>
    <script type="text/javascript">
      $(function () {
        var currColor = "#3c8dbc"; //Red by default
        //Color chooser button
        var colorChooser = $("#color-chooser-btn");
        $("#color-chooser > li > a").click(function (e) {
            e.preventDefault();
            //Save color
            currColor = $(this).css("color");
            //Add color effect to button
            $('#add-new-event').css({"background-color": currColor, "border-color": currColor});
        });

        $("#add-new-event").click(function (e) {
            e.preventDefault();
            //Get value and make sure it is not null
            var val = $("#new-event").val();
              if (val.length == 0) {
                return;
              }
            //Create events
            var event = $("<div />");
            event.css({"background-color": currColor, "border-color": currColor, "color": "#fff"}).addClass("external-event");
            event.html(val);
            $('#external-events').prepend(event);
            //Add draggable funtionality
            ini_events(event);
            //Remove event from text input
            $("#new-event").val("");
        });
      });
  </script>
  </body>
</html>