<?php  echo validation_errors(); ?> 
<div class="box-header with-border" style="border-bottom:1px solid #E6E4E4;padding-left:15px;background:#F5F4FD">
  <h1 class="box-title" style="font-size:150%;">Project Master</h1>
</div>
<section class="content-header">
  <font size="4px">Ubah Projek</font>
</section>
<section class="content">
 <div class="box box-primary" style="width:100%;margin:0 auto;">
<?php echo form_open('projek/update/'.$projek_items['id']); ?>	
  <div class="box-body"  style="width:99.5%">
    <input type="hidden" class="form-control" name="id" value="<?php echo $projek_items['id'];?>">
    <table style="width:100%;line-height:40px;position:relative;top:-15px">
      <tr><div class="form-group">
          <td style="font-size:90%"><label for="exampleInputEmail1">Nama Projek</label></td><td>:</td>
          <td><input type="text" class="form-control" name="projek" value="<?php echo $projek_items['nama_project'];?>" required></td>  
          </div>
      </tr>
      <tr><div class="form-group">
          <td style="font-size:90%;width:160px"><label for="exampleInputEmail1"> Klien</label></td><td style="width:10px">:</td>
          <td><div>
              <select name="id_klien"  class="form-control select2" required style="width:100%;">
                <?php
                  foreach ($klien as $klien_items) {
                    if ($klien_items['id'] == $projek_items['id_klien']) {
                      ?><option selected value="<?php echo $projek_items['id_klien'];?>"> <?php echo $klien_items['nama']." &nbsp &nbsp ( ".$klien_items['perusahaan']." )";?> </option><?php
                    }else{
                      ?><option value="<?php echo $klien_items['id'];?>"> <?php echo $klien_items['nama']." &nbsp &nbsp ( ".$klien_items['perusahaan']." )";?> 
                        </option><?php
                    }
                  }?> 
              </select>
              </div>
          </td>  
          </div>
      </tr>
      <tr><div class="form-group">
          <td style="font-size:90%" valign="top"><label for="exampleInputEmail1">Deskripsi Projek</label></td><td valign="top">:</td>
          <td><textarea class="textarea" name="deskripsi"style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><?php echo $projek_items['deskripsi'];?></textarea></td>  
          </div>
      </tr>
      <tr><div class="form-group">
          <td style="font-size:90%"><label for="exampleInputEmail1">Nama Marketing</label></td><td>:</td>
          <td><input type="text" class="form-control" name="marketing" value="<?php echo $projek_items['marketing_name'];?>" required></td>  
          </div>
      </tr>
      <tr><div class="form-group">
          <td style="font-size:90%"><label for="exampleInputEmail1">Penanggung Jawab</label></td><td>:</td>
          <td><input type="text" class="form-control" name="pj" value="<?php echo $projek_items['pj_name'];?>" required></td>  
          </div>
      </tr>
      <tr><div class="form-group">
          <td style="font-size:90%"><label for="exampleInputEmail1">Nilai</label></td><td>:</td>
          <td><div class="input-group" style="width:100%">
                <div class="input-group-addon" style="width:2%">
                  RP
                </div>
                <input type="text" class="form-control" name="nilai" placeholder="Nilai" value="<?php echo $projek_items['nilai'];?>" onkeydown="return numbersonly(this, event);" onkeyup="javascript:tandaPemisahTitik(this);" required>
              </div>
          </td>  
          </div>
      </tr>
      <tr><div class="form-group">
          <td style="font-size:90%"><label for="exampleInputEmail1">Operasional Server</label></td><td>:</td>
          <td><div>
              <select name="op_server"  class="form-control select2" required style="width:100%;">
              <?php foreach ($server as $server_items) {
                if ($server_items['harga']==$projek_items['operasional_server']) {
                  ?><option selected name="op_server" value="<?php echo $server_items['harga']?>">
                      Rp <?php $harga=number_format($server_items['harga'],0,",","."); echo "$harga,00 &nbsp &nbsp ( ".$server_items['kapasitas']." )";?>
                  </option><?php
                }else{
                  ?><option name="op_server" value="<?php echo $server_items['harga']?>">
                      Rp <?php $harga=number_format($server_items['harga'],0,",","."); echo "$harga,00 &nbsp &nbsp ( ".$server_items['kapasitas']." )";?>
                  </option><?php
                }
              }?>
              </select></div>
          </td>
          </div>
      </tr>
      <tr><div class="form-group">
          <td style="font-size:90%"><label for="exampleInputEmail1">Status Server</label></td><td>:</td>
          <td><div class="input-group" style="width:100%">
                <div class="input-group-addon" style="width:4.7%">
                  <i class="fa fa-calendar"></i>
                </div>
                <input type="date" class="form-control" name="status" value="<?php echo $projek_items['status_server'];?>" onkeypress="return isNumberKey(event)" required>
              </div>
          </td>  
          </div>
      </tr>
      <tr><div class="form-group">
          <td style="font-size:90%"><label for="exampleInputEmail1">Operasional Domain</label></td><td>:</td>
          <td><div class="input-group" style="width:100%">
                <div class="input-group-addon" style="width:2%">
                  RP
                </div>
                <input type="text" class="form-control" name="op_dmn" value="<?php echo $projek_items['operasional_domain'];?>" required onkeydown="return numbersonly(this, event);" onkeyup="javascript:tandaPemisahTitik(this);">
              </div>
          </td>
          </div>
      </tr>
      <tr><div class="form-group">
          <td style="font-size:90%"><label for="exampleInputEmail1">Due Date</label></td><td>:</td>
          <td><div class="input-group" style="width:100%">
                <div class="input-group-addon" style="width:4.7%">
                  <i class="fa fa-calendar"></i>
                </div>
                <input type="date" class="form-control" maxlength="8" name="due_date" value="<?php echo $projek_items['due_date'];?>" required onkeypress="return isNumberKey(event)" required>
              </div>
          </td>  
          </div>
      </tr>
      <tr><div class="form-group">
            <td style="font-size:90%"><label for="exampleInputEmail1">Username</label></td><td>:</td>
            <td><input type="text" class="form-control" name="user" value="<?php echo $projek_items['username'];?>" required></td>
          </div>
      </tr>
      <tr><div class="form-group">
            <td style="font-size:90%"><label for="exampleInputEmail1">Password</label></td><td>:</td>
            <td><input type="text" class="form-control" name="pass" value="<?php echo $projek_items['password'];?>" required></td>
          </div>
      </tr>
      <tr>
        <td></td>
        <td colspan="2"><div class="box-footer">
              <button type="submit" name="submit" class="btn btn-primary"><i class="fa fa-save"></i> &nbsp Save</button> &nbsp 
              <button type="reset" class="btn btn-primary" style="background:#713A3A">Reset</button> &nbsp
              <input type="button" class="btn btn-primary" style="color:white;font-weight:bold;background:#6B6B6B" value="Back" onclick="history.back(-1)" >
            </div>
        </td>
      </tr>
    </table>
    </div>
<?php echo form_close(); ?>
  </div>
</section>