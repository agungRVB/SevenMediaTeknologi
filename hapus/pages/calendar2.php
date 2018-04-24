<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>AdminLTE 2 | Calendar</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- fullCalendar 2.2.5-->
    <link rel="stylesheet" href="../plugins/fullcalendar/fullcalendar.min.css">
    <link rel="stylesheet" href="../plugins/fullcalendar/fullcalendar.print.css" media="print">
    <!-- Theme style -->
    <link rel="stylesheet" href="../dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="../dist/css/skins/_all-skins.min.css">
    
  </head>
  <body class="hold-transition skin-blue sidebar-mini">
    
        <section class="content">
          <div class="row">
            <div class="col-md-3">
              <div class="box box-solid">
                <div class="box-header with-border">
                  <h3 class="box-title">Create Event</h3>
                </div>
                <div class="box-body">
                  <div class="btn-group" style="width: 100%; margin-bottom: 10px;">
                    <!--<button type="button" id="color-chooser-btn" class="btn btn-info btn-block dropdown-toggle" data-toggle="dropdown">Color <span class="caret"></span></button>-->
                    <ul class="fc-color-picker" id="color-chooser">
                      <?php 
                        include"../../config/koneksi.php";  
                          try{
                              $color = $conn->prepare("select * from color");
                              $color->execute();
                              $loop=1;
                              while($datacolor = $color->fetch()) {
                                ?><li><i class="fa" style="background:<?php echo $datacolor['color'];?>;width:27.8px;height:27.8px;border-radius:5px"><a href="?color=<?php echo $loop;?>">&nbsp&nbsp&nbsp&nbsp</a></i></li>
                                <?php
                                $loop++;
                              }

                              $btn="black";
                              if(empty($_GET['color'])){
                                 $btn="#1C9AE3";
                              }else{
                                switch ($_GET['color']) {
                                  case '1':
                                    $btn="#02B793";
                                    break;
                                  case '2':
                                    $btn="#0DD10D";
                                    break;
                                  case '3':
                                    $btn="#1C9AE3";
                                    break;
                                  case '4':
                                    $btn="#6A0505";
                                    break;
                                  case '5':
                                    $btn="#985207";
                                    break;
                                  case '6':
                                    $btn="#E612E9";
                                    break;
                                  case '7':
                                    $btn="#F70984";
                                    break;
                                  case '8':
                                    $btn="#FF6600";
                                    break;
                                  case '9':
                                    $btn="black";
                                    break;
                                  case '10':
                                    $btn="blue";
                                    break;
                                  case '11':
                                    $btn="green";
                                    break;
                                  case '12':
                                    $btn="orange";
                                    break;
                                  case '13':
                                    $btn="purple";
                                    break;
                                  case '14':
                                    $btn="red";
                                    break;
                                }
                              }
                            }catch(PDOException $e){
                              echo "Error! gagal menyimpan data siswa:".$e->getMessage();  
                            }
                      ?>                 
                    </ul>
                  </div><!-- /btn-group -->
                  <form method="post" action="#">
                    <div class="input-group">
                      <input id="new-event" type="text" name="ket" class="form-control" placeholder="Event Title">
                      <div class="input-group-btn">

                        <input type="submit"  style="background:<?php echo $btn;?>;border:1px solid <?php echo $btn;?>;border-radius:0 4px 4px 0" name="add" class="btn btn-primary btn-flat" value="Add">
                      </div><!-- /btn-group -->
                    </div><!-- /input-group -->
                  </form>
                </div>
              </div>

              <div class="box box-solid">
                <div class="box-header with-border">
                  <h4 class="box-title">Draggable Events</h4>
                </div>
                <div class="box-body">
                  <!-- the events -->
                  <div id="external-events">
                  
                    <?php
                        include"../../config/koneksi.php";  
                          if (isset($_POST['add'])==true) {   
                            $keterangan=$_POST['ket'];

                            try{
                              $query = $conn->prepare("insert into calendar (no, keterangan, warna) values (:a, :b, :c)");
                              $data = array(
                                ':a'=>"",
                                ':b'=>$keterangan,
                                ':c'=>$btn,
                              );
                              $query->execute($data);

                              $query2 = $conn->prepare("select * from calendar");
                              $query2->execute();
                                  
                              while($row2 = $query2->fetch()) {
                                ?><div class="external-event" style="background:<?php echo $row2['warna'];?>;color:white"><?php echo $row2['keterangan'];?></div><?php
                              }

                            }catch(PDOException $e){
                              echo "Error! gagal menyimpan data siswa:".$e->getMessage();  
                            }
                          }else{
                              $query2 = $conn->prepare("select * from calendar");
                              $query2->execute();
                                  
                              while($row2 = $query2->fetch()) {
                                ?><div class="external-event" style="background:<?php echo $row2['warna'];?>;color:white"><?php echo $row2['keterangan'];?></div><?php
                              }
                          }
                    ?>
                    <div class="external-event bg-aqua">Pra Kerja Praktek</div>
                    <div class="checkbox">
                      <label for="drop-remove">
                        <input type="checkbox" id="drop-remove" checked>
                        remove after drop
                      </label>
                    </div>
                    
                  </div>
                </div><!-- /.box-body -->
              </div><!-- /. box -->
              
            </div><!-- /.col -->
            <div class="col-md-9">
              <div class="box box-primary" style="width:91%;height:610px;margin-left:3%;">
                <div class="box-body no-padding">
                            <div class="col-md-3" style="width:100%;padding:0;">
                              <!div class="box box-solid"  style="width:60%;height:100px">
                                  <div class="box-body" style="padding:0;">
                                     <div id="calendar"></div>
                                  </div><!-- /.box-body -->
                              <!/div><!-- /.box-body -->
                            </div><!-- /. box -->                         
                  <!-- THE CALENDAR -->
                  <!div id="calendar"></div>


                </div><!-- /.box-body -->
              </div><!-- /. box -->
            </div><!-- /.col -->
        </section><!-- /.content -->

    <!-- jQuery 2.1.4 -->
    <script src="../plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="../bootstrap/js/bootstrap.min.js"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
    <!-- Slimscroll -->
    <script src="../plugins/slimScroll/jquery.slimscroll.min.js"></script>
    <!-- FastClick -->
    <script src="../plugins/fastclick/fastclick.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../dist/js/app.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="../dist/js/demo.js"></script>
    <!-- fullCalendar 2.2.5 -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js"></script>
    <script src="../plugins/fullcalendar/fullcalendar.min.js"></script>
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
            { <?php $a="Pra Kerja Praktek";?>
              title: '<?php echo $a ?>',
              start: new Date(2016, 1, 1, 12, 0), //tahun, bulan+1, tanggal, jam, 0
              end: new Date(2016, 1, 29, 14, 0),
              allDay: false,
              backgroundColor: "#00c0ef", //Info (aqua)
              borderColor: "#00c0ef" //Info (aqua)
            },
            {
              title: 'Meeting',
              start: new Date(2016, 1, 1),
              allDay: true,
              backgroundColor: "#0073b7", //Blue
              borderColor: "#0073b7" //Blue
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