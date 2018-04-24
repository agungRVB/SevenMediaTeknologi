<?php  echo validation_errors(); ?> 
<div class="box-header with-border" style="border-bottom:1px solid #E6E4E4;padding-left:15px;background:#F5F4FD">
  <h1 class="box-title" style="font-size:150%;">Project Master</h1>
</div>
<section class="content-header">
  <font size="4px">Tambah Projek Baru</font>
</section>
<section class="content">
 <div class="box box-primary" style="width:100%;margin:0 auto;">
<?php echo form_open('projek/create'); ?>	

	<div class="box-body"  style="width:99.5%">
	  <table style="width:100%;line-height:40px;position:relative;top:-15px">
      <tr><div class="form-group">
          <td style="font-size:90%"><label for="exampleInputEmail1">Nama Projek</label></td><td>:</td>
          <td><input type="text" class="form-control" name="projek" placeholder="Project Name" required></td>  
          </div>
      </tr>
      <tr><div class="form-group">
          <td style="font-size:90%;width:160px"><label for="exampleInputEmail1"> Klien</label></td><td style="width:10px">:</td>
          <td><div>
              <select name="id_klien"  class="form-control select2" required style="width:100%;">
                <?php
                  foreach ($klien as $klien_items) {
                    ?><option value="<?php echo $klien_items['id'];?>"> <?php echo $klien_items['nama']." &nbsp &nbsp &nbsp ( ".$klien_items['perusahaan']." )";?> </option><?php } ?> 
              </select>
            </div>
          </td>  
          </div>
      </tr>
      <tr><div class="form-group">
          <td style="font-size:90%" valign="top"><label for="exampleInputEmail1">Deskripsi Projek</label></td><td valign="top">:</td>
          <td><textarea class="textarea" name="deskripsi" placeholder="Detail project" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea></td>  
          </div>
      </tr>
      <tr><div class="form-group">
          <td style="font-size:90%"><label for="exampleInputEmail1">Nama Marketing</label></td><td>:</td>
          <td><input type="text" class="form-control" name="marketing" placeholder="Marketing" required></td>  
          </div>
      </tr>
      <tr><div class="form-group">
          <td style="font-size:90%"><label for="exampleInputEmail1">Penanggung Jawab</label></td><td>:</td>
          <td><input type="text" class="form-control" name="pj" placeholder="Penanggung Jawab" required></td>  
          </div>
      </tr>
      <tr><div class="form-group">
          <td style="font-size:90%"><label for="exampleInputEmail1">Nilai</label></td><td>:</td>
          <td><div class="input-group" style="width:100%">
                <div class="input-group-addon" style="width:2%">
                  RP
                </div>
                <input type="text" class="form-control" name="nilai" placeholder="Nilai" onkeydown="return numbersonly(this, event);" onkeyup="javascript:tandaPemisahTitik(this);" required>
              </div>
          </td>  
          </div>
      </tr>
      <tr><div class="form-group">
          <td style="font-size:90%"><label for="exampleInputEmail1">Operasional Server</label></td><td>:</td>
          <td><div>
              <select name="id_server"  class="form-control select2" required style="width:100%;">
                  <option value="0"> No Server</option>
              <?php foreach ($server as $server_items) {
                ?><option value="<?php echo $server_items['id']?>">
                    Rp <?php $harga=number_format($server_items['harga'],0,",","."); echo "$harga,00 &nbsp &nbsp ( ".$server_items['kapasitas']." )";?>
                  </option>
                  <?php
              }?>
              </select>
              <input type="hidden" name="id_server" value="<?php echo $server_items['id']?>">
              </div>
          </td>  
          </div>
      </tr>
      <tr><div class="form-group">
          <td style="font-size:90%"><label for="exampleInputEmail1">Status Server</label></td><td>:</td>
          <td><div class="input-group" style="width:100%">
                <div class="input-group-addon" style="width:4.7%">
                  <i class="fa fa-calendar"></i>
                </div>
                <input type="date" class="form-control" name="status" value="<?php echo date("Y-m-d");?>" onkeypress="return isNumberKey(event)" required>
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
                <input type="text" class="form-control" name="op_dmn" placeholder="Operasional Domain" onkeydown="return numbersonly(this, event);" onkeyup="javascript:tandaPemisahTitik(this);" required>
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
                <input type="date" class="form-control" maxlength="8" name="due_date" value="<?php echo date("Y-m-d");?>" onkeypress="return isNumberKey(event)" required>
              </div>
          </td>  
          </div>
      </tr>
      <tr><div class="form-group">
            <td style="font-size:90%"><label for="exampleInputEmail1">Username</label></td><td>:</td>
            <td><input type="text" class="form-control" name="user" placeholder="Enter Username" required></td>
          </div>
      </tr>
      <tr><div class="form-group">
            <td style="font-size:90%"><label for="exampleInputEmail1">Password</label></td><td>:</td>
            <td><input type="text" class="form-control" name="pass" placeholder="Enter Password" required></td>
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