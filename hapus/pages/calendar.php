        <section class="content" style="margin-left:1%">
          <div class="row">
            <div class="col-md-3" style="float:right;">
              <div class="box box-solid">
                <div class="box-header with-border">
                  <h3 class="box-title">Create Event</h3>
                </div>
                <div class="box-body">
                  <div class="btn-group" style="width: 100%; margin-bottom: 10px;">
                    <!--<button type="button" id="color-chooser-btn" class="btn btn-info btn-block dropdown-toggle" data-toggle="dropdown">Color <span class="caret"></span></button>-->
                    <ul class="fc-color-picker" id="color-chooser">
                      <?php 
                        include"../config/koneksi.php";  
                          
                          try{
                              $arrcolor = array("#02B793","#0DD10D","#985207","#6A0505","#1C9AE3","#E612E9","#F70984","#FF6600","black","blue","green","orange","purple","red");
                              $loop=0;
                              while($loop <= 13) {
                                ?><li><i class="fa" style="background:<?php echo $arrcolor[$loop];?>;width:27.4px;height:27.4px;border-radius:5px"><a href="index.php?menu=calendar&color=<?php echo $loop+1;?>">&nbsp&nbsp&nbsp&nbsp</a></i></li>
                                <?php
                                $loop++;
                              }
                              
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
                                    $btn="#985207";
                                    break;
                                  case '4':
                                    $btn="#6A0505";
                                    break;
                                  case '5':
                                    $btn="#1C9AE3";
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
                        <div class="box-body" style="margin:0 auto;padding:0">
                          <!-- Date range -->
                          <div class="form-group">
                            <div class="input-group">
                              <input type="text" name="event" class="form-control pull-right" id="reservation" placeholder="Event Date" required>
                              <div class="input-group-addon">
                                <i class="fa fa-calendar"  style="width:23px"></i>
                              </div>
                            </div><!-- /.input group -->
                          </div><!-- /.form group -->
                        </div><!-- /.box-body -->
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
                  <h4 class="box-title">Your Events</h4>
                </div>
                <div class="box-body">
                  <!-- the events -->
                  <div id="external-events">
                  
                    <?php if (isset($_POST['add'])==true) {   
                              // create event
                              $event=$_POST['event'];
                                $array1=explode(" - ",$event);
                                  $mulai=$array1[0];
                                  $selesai=$array1[1];

                                  $array2=explode("/",$mulai);
                                    $tglmulai="".$array2[1]."/".$array2[0]."/".$array2[2];
                                  $array3=explode("/",$selesai);
                                    $tglselesai="".$array3[1]."/".$array3[0]."/".$array3[2];

                              $keterangan=$_POST['ket'];

                              try{
                                $query = $conn->prepare("insert into calendar (no, keterangan, warna, mulai, selesai) values (:a, :b, :c, :d, :e)");
                                $data = array(
                                  ':a'=>"",
                                  ':b'=>$keterangan,
                                  ':c'=>$btn,
                                  ':d'=>$tglmulai,
                                  ':e'=>$tglselesai,
                                );
                                $query->execute($data);
                                ?><script type="text/javascript"> window.location = 'index.php?menu=calendar';</script>
                                <?php
                              }catch(PDOException $e){
                                echo "Error! gagal menyimpan data siswa:".$e->getMessage();  
                              }
                          }else{
                              //menampilkan your events
                              $query2 = $conn->prepare("select * from calendar order by no asc");
                              $query2->execute();
                              $cek=1;    
                              while($row2 = $query2->fetch()) {
                                //$date="".$row2['selesai'];
                                  //$array4=explode("/",$date);
                                    // $d=$array4[0] - date('d');

                                
                                $kalender = CAL_GREGORIAN;
        
                                $tgl_sekarang= date('d');
                                $bln_sekarang= date('m');
                                $thn_sekarang= date('Y');
                                
                                $kabisat = ($thn_sekarang%4 == 0) ? "KABISAT" : "BUKAN KABISAT";
                                
                                $date_mulai="".$row2['mulai'];
                                  $date_a=explode("/", $date_mulai);
                                    $hr_mulai=$date_a[0];
                                    $bln_mulai=$date_a[1];

                                $date_selesai="".$row2['selesai'];
                                  $date_z=explode("/", $date_selesai);
                                    $hr_selesai=$date_z[0];
                                    $bln_selesai=$date_z[1];    

                                
                                $jml_hr=0;
                                if ($bln_mulai==$bln_selesai) {
                                    $hari= cal_days_in_month($kalender, $bln_selesai, $thn_sekarang);
                                    $selisih = $hr_selesai - $tgl_sekarang;
                                     if ($hr_selesai < $tgl_sekarang) {
                                         $jml_hr="-";
                                    }elseif ($hr_selesai == $tgl_sekarang) {
                                         $jml_hr="i";
                                    }else{
                                         $jml_hr=$selisih;
                                    }
                                }else{
                                    while ($bln_selesai >= $bln_sekarang) {
                                      if($bln_selesai == $bln_sekarang) {
                                          $hari= cal_days_in_month($kalender, $bln_selesai, $thn_sekarang);
                                          $selisih = $hari - $tgl_sekarang;
                                          $jml_hr=$jml_hr + $selisih;
                                      }elseif($bln_selesai == $date_z[1]){
                                          $hari= cal_days_in_month($kalender, $bln_selesai, $thn_sekarang);
                                          $selisih= $hari - $hr_selesai;
                                          $sisa_hari_bln_ini = $hari - $selisih;
                                          $jml_hr=$jml_hr + $sisa_hari_bln_ini;   
                                      }else{
                                          $hari= cal_days_in_month($kalender, $bln_selesai, $thn_sekarang);
                                          $jml_hr=$jml_hr + $hari;
                                      }
                                      $bln_selesai--;  
                                    }
                                }?>
                                <form method="post" action="#">
                                      <div class="form-group" style="margin:0 auto;height:25px;">
                                        <label style="width:77%;">
                                          <a href="#" class="btn btn-primary" style="background:<?php echo $row2['warna'];?>;width:100%;font-size:85%;font-weight:bold;text-align:left;margin-left:1px;border:none;height:23px;padding:2px 0 0 7px;">
                                            <?php echo $row2['keterangan'];?>
                                          </a>
                                        </label>
                                        <label style="width:26px;">
                                          <div class="btn btn-primary" style="background:<?php echo $row2['warna'];?>;width:100%;font-size:85%;font-weight:bold;text-align:right;border:none;height:23px;padding:2px 7px 0 0;position:relative;left:-6px">
                                            <?php echo "$jml_hr"?>
                                          </div>
                                        </label>
                                        <label>
                                          <input value="<?php echo $row2['no'];?>" name="<?php echo $cek;?>" type="checkbox" class="flat-red" >
                                        </label>
                                      </div> 
                                <?php
                              $cek++;
                              } ?>  <div class="delete" style="margin-top:10px;border-radius:5px;transition: ease-out 0.15s;"><button class="btn btn-primary" name="delete" style="width:100%;background:none;color:#D8D8D8;font-weight:bold;border:1px solid #CBCACA;">Delete the selected data</button></div>
                                  </form>
                              <?php
                          }
                    ?>
                    
                    
                    <?php // delete event
                      if (isset($_POST['delete'])) {
                          $query2 = $conn->prepare("select * from calendar");
                          $query2->execute();
                          $cek=1;    

                          while($row2 = $query2->fetch()) {
                            if (empty($_POST[$cek])) {
                            }else{
                              $query_del = $conn->prepare("delete from calendar where no =  :a");
                              $query_del->bindParam(':a', $_POST[$cek] , PDO::PARAM_INT);   
                              $query_del->execute();      
                            }    
                          $cek++;
                          }
                          ?><script type="text/javascript"> window.location = 'index.php?menu=calendar';</script>
                          <?php
                      }
                    ?>


                    
                  </div>
                </div><!-- /.box-body -->
              </div><!-- /. box -->
              
            </div><!-- /.col -->
            <div class="col-md-9">
              <div class="box box-primary" style="width:100%;height:100%;">
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
          </div><!-- /.row -->
        </section><!-- /.content -->