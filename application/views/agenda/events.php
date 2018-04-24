<div class="box box-solid">
  <div class="box-header with-border">
    <h4 class="box-title">Acara tersedia</h4>
  </div>
  <div class="box-body">
  <!-- the events -->
    <div id="external-events">
      <?php 
      $cek = 1;
      foreach ($agenda as $events) {
          $kalender = CAL_GREGORIAN;
        
          $tgl_sekarang= date('d');
          $bln_sekarang= date('m');
          $thn_sekarang= date('Y');
                                
          $kabisat = ($thn_sekarang%4 == 0) ? "KABISAT" : "BUKAN KABISAT";
          $date_mulai="".$events['mulai'];
            $date_a=explode("-", $date_mulai);
              $hr_mulai=$date_a[2];
              $bln_mulai=$date_a[1];

          $date_selesai="".$events['selesai'];
            $date_z=explode("-", $date_selesai);
              $hr_selesai=$date_z[2];
              $bln_selesai=$date_z[1];

          $jml_hr=0;    
          if ($bln_selesai < $bln_sekarang) {
              $jml_hr="-";
          }else{
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
            }
          }?>
      <?php  echo validation_errors(); ?> 

      <?php echo form_open('agenda/delete'); ?>
            <div class="form-group" style="margin:0 auto;height:25px;">
              <label style="width:75%;">
                <span class="btn btn-primary" style="background:<?php echo $events['warna'];?>;width:100%;font-size:85%;font-weight:bold;text-align:left;margin-left:1px;border:none;height:23px;padding:2px 0 0 7px;">
                <?php echo $events['keterangan'];?></span>
              </label>
              <label style="width:26px;">
                <div class="btn btn-primary" style="background:<?php echo $events['warna'];?>;width:100%;font-size:85%;font-weight:bold;text-align:right;border:none;height:23px;padding:2px 7px 0 0;position:relative;left:-6px">
                <?php echo "$jml_hr"?>
                </div>
              </label>
              <label>
                <input value="<?php echo $events['no'];?>" name="<?php echo $cek;?>" type="checkbox" class="flat-red">
              </label>
            </div>

              <?php
      $cek++;
      }
      ?><div class="delete" style="margin-top:10px;border-radius:5px;transition: ease-out 0.15s;"><input type="submit" class="btn btn-primary" name="delete" style="width:100%;background:none;color:#D8D8D8;font-weight:bold;border:1px solid #CBCACA;" value="Delete the selected data"></div>
    <?php echo form_close(); ?> 
    </div>
  </div><!-- /.box-body -->
</div><!-- /. box -->