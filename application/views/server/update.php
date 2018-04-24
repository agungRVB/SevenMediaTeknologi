<?php  echo validation_errors(); ?> 
<div class="box-header with-border" style="border-bottom:1px solid #E6E4E4;padding-left:15px;background:#F5F4FD">
  <h1 class="box-title" style="font-size:150%;">Server Master</h1>
</div>
<section class="content-header">
  <font size="4px">Ubah Server</font>
</section>
<section class="content">
 <div class="box box-primary" style="width:100%;margin:0 auto;">
<?php echo form_open('server/update/'.$server_items['id']); ?>
  	<div class="box-body"  style="width:99.5%">
  	    <input type="hidden" class="form-control" name="id" value="<?php echo $server_items['id'];?>" required>
        <div class="form-group">
  	      <label for="exampleInputEmail1"> Nama</label>
  	      <input type="text" class="form-control" name="nama" value="<?php echo $server_items['nama'];?>" required>
  	    </div>
          <div class="form-group">
             <label for="exampleInputEmail1"> Kapasitas</label>
             <div>
             <?php
                $kapasitas= $server_items['kapasitas'];
                  $array1 = explode(" ", $kapasitas);
                  $kpst=$array1[0];  
                  $stn=$array1[1];
             ?>
              <input type="text" class="form-control" name="kapasitas" maxlength="6" value="<?php echo $kpst?>" onkeydown="return numbersonly(this, event);" onkeyup="javascript:tandaPemisahTitik(this);" required style="width:85%;float:left">
              <select name="satuan"  class="form-control select2" required style="width:15%;float:left;position:relative;left:-1px;">
                  <option value="<?php echo $stn?>"><?php echo $stn?></option>
                  <option value="MB">MB</option>
                  <option value="GB">GB</option>
                  <option value="TB">TB</option>
              </select>
             </div>
          </div>
          <div class="form-group">
             <label for="exampleInputEmail1"><br/>Harga</label>
              <div class="form-group">
                <div class="input-group">
                  <div class="input-group-addon">
                    RP
                  </div>
                  <input type="text" class="form-control" name="harga" value="<?php echo $server_items['harga'];?>" onkeydown="return numbersonly(this, event);" onkeyup="javascript:tandaPemisahTitik(this);" required>
                </div><!-- /.input group -->
              </div>
          </div>
          <div class="box-footer">
             <button type="submit" name="submit" class="btn btn-primary"><i class="fa fa-save"></i> &nbsp Save</button> &nbsp 
             <button type="reset" class="btn btn-primary" style="background:#713A3A">Reset</button> &nbsp
             <input type="button" class="btn btn-primary" style="color:white;font-weight:bold;background:#6B6B6B" value="Back" onclick="history.back(-1)" >
          </div>
      </div>
<?php echo form_close(); ?>
  </div>
</section>