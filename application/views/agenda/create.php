        <section class="content" style="margin-left:1%">
          <div class="row">
            <div class="col-md-3" style="float:right;">
              <div class="box box-solid">
                <div class="box-header with-border">
                  <h3 class="box-title">Buat acara baruu</h3>
                </div>
                <div class="box-body">
                  <div class="btn-group" style="width: 100%; margin-bottom: 10px;">
                    <ul class="fc-color-picker" id="color-chooser">
                      <?php   $arrcolor = array("#02B793","#0DD10D","#985207","#6A0505","#1C9AE3","#E612E9","#F70984","#FF6600","black","blue","green","orange","purple","red");
                              $loop=0;
                              while($loop <= 13) {
                                ?><li style="height:35px" ><i class="fa" style="line-height:100px;background:<?php echo $arrcolor[$loop];?> ;width:27.4px;height:27.4px;border-radius:5px">
                                        <a style="position:relative;top:-36px;" href="<?php echo base_url('agenda/'.$loop);?>">&nbsp&nbsp&nbsp&nbsp</a>
                                      </i>
                                  </li>
                                <?php
                                $loop++;
                              }
                      ?>                 
                    </ul>
                  </div><!-- /btn-group -->
                  <?php  echo validation_errors(); ?> 
                  <?php echo form_open('agenda/create'); ?>
                        <input type="hidden" name="warna" value="<?php echo $color;?>">
                        <div class="box-body" style="margin:0 auto;padding:0">
                          <!-- Date range -->
                          <div class="form-group">
                              <div class="input-group">
                                <div style="width:20%;float:left;border-bottom:1px solid #C2C2C2">
                                  <input type="text"  style="border:none;border-radius: 4px 0 0 0;background:<?php echo $arrcolor[$color];?>;color:#fff;height:34px;padding:3px 0 0 11px" value="Mulai">
                                </div>
                                <div style="width:75%;float:right">
                                  <input type="date" name="mulai" class="form-control pull-right" value="<?php echo date("Y-m-d");?>" required>
                                </div>
                              </div>

                              <div class="input-group" style="position:relative;top:-2px">
                                <div style="width:20%;float:left">
                                  <input type="text"  style="position:relative;top:0px;border:none;border-radius: 0 0 0 4px;background:<?php echo $arrcolor[$color];?>;color:#fff;height:34px;padding:0 0 3px 5px" value="Selesai">
                                </div>
                                <div style="width:75%;float:right">
                                  <input type="date" name="selesai" class="form-control pull-right" value="<?php echo date("Y-m-d");?>" required>
                                </div>
                              </div>
                          </div><!-- /.form group -->
                        </div><!-- /.box-body -->
                        <div class="input-group">
                          <input id="new-event" type="text" name="keterangan" class="form-control" placeholder="Judul" required>
                          <div class="input-group-btn">
                            <input type="submit"  style="background:<?php echo $arrcolor[$color];?>;border:1px solid <?php echo $arrcolor[$color];?>;border-radius:0 4px 4px 0" name="add" class="btn btn-primary btn-flat" value="Simpan">
                          </div><!-- /btn-group -->
                        </div><!-- /input-group -->
                  <?php echo form_close(); ?>
                </div>
              </div>