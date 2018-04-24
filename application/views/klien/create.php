<?php  echo validation_errors(); ?> 
<div class="box-header with-border" style="border-bottom:1px solid #E6E4E4;padding-left:15px;background:#F5F4FD">
  <h1 class="box-title" style="font-size:150%;">Client Master</h1>
</div>
<section class="content-header">
  <font size="4px">Tambah Klien Baru</font>
</section>
<section class="content">
 <div class="box box-primary" style="width:100%;margin:0 auto;">
<?php echo form_open('klien/create'); ?>	
	<div class="box-body"  style="width:99.5%">
	      <div class="form-group">
          <label for="exampleInputEmail1"> Nama</label>
          <input type="text" class="form-control" name="nama" placeholder="Enter name" required>
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1"> Perusahaan</label>
          <input type="text" class="form-control" name="perusahaan" placeholder="Enter Instanasi" required>
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1"> Alamat</label>
          <input type="text" class="form-control" name="alamat"  placeholder="Enter address" required>
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1"> Email</label>
          <input type="email" class="form-control" name="email"  placeholder="Enter email" required>
        </div>
        <div class="form-group">
           <label for="exampleInputEmail1">Handphone</label>
            <div class="form-group">
              <div class="input-group" style="width:100%">
                <div class="input-group-addon"><i class="fa fa-mobile-phone" style="width:10px"></i></div>
                <input type="text" class="form-control" name="hp"  placeholder="Mobile phone number" maxlength="14" onkeypress="return isNumberKey(event)" required>
                </div><!-- /.input group -->
             </div>
        </div>
        <div class="form-group">
           <label for="exampleInputEmail1">Telephone</label>
            <div class="form-group">
              <div class="input-group"  style="width:100%">
                <div class="input-group-addon"><i class="fa fa-phone"></i></div>
                <input type="text" class="form-control" name="tlp"  placeholder="Phone number" maxlength="10" onkeypress="return isNumberKey(event)" required>
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