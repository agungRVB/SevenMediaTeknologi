<?php  echo validation_errors(); ?> 
<div class="box-header with-border" style="border-bottom:1px solid #E6E4E4;padding-left:15px;background:#F5F4FD">
  <h1 class="box-title" style="font-size:150%;">Administrator</h1>
</div>
<section class="content-header">
  <font size="4px">Ubah Admin</font>
</section>
<section class="content">
 <div class="box box-primary" style="width:100%;margin:0 auto;">
<?php echo form_open('admin/update/'.$admin['id']); ?>	
  	<div class="box-body"  style="width:99.5%">
        <input type="hidden" class="form-control" name="id" value="<?php echo $admin['id'];?>" readonly>
        <div class="form-group">
  	      <label for="exampleInputEmail1"> Nama</label>
  	      <input type="text" class="form-control" name="nama" value="<?php echo $admin['nama'];?>" required>
  	    </div>
        <div class="form-group">
          <label for="exampleInputEmail1"> Username</label>
          <input type="text" class="form-control" name="username" maxlength="29" value="<?php echo $admin['username'];?>" required>
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1"> Password</label>
          <input type="text" class="form-control" name="password" maxlength="29" value="<?php echo $admin['password'];?>" required>
        </div>
        <div class="box-footer">
          <button type="submit" name="submit" class="btn btn-primary"><i class="fa fa-save"></i> &nbsp Save</button> &nbsp 
          <button type="reset" class="btn btn-primary" style="background:#713A3A">Reset  &nbsp </button>  &nbsp 
          <input type="button" class="btn btn-primary" style="color:white;font-weight:bold;background:#6B6B6B" value="Back" onclick="history.back(-1)" >
        </div>
      </div>
<?php echo form_close(); ?>
  </div>
</section>