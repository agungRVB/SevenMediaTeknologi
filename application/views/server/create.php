<?php  echo validation_errors(); ?> 
<div class="box-header with-border" style="border-bottom:1px solid #E6E4E4;padding-left:15px;background:#F5F4FD">
  <h1 class="box-title" style="font-size:150%;">Server Master</h1>
</div>
<section class="content-header">
  <font size="4px">Tambah Server Baru</font>
</section>
<section class="content">
 <div class="box box-primary" style="width:100%;margin:0 auto;">
<?php echo form_open('server/create'); ?>	
	<div class="box-body"  style="width:99.5%">
	    <div class="form-group">
	      <label for="exampleInputEmail1"> Nama</label>
	      <input type="text" class="form-control" name="nama" placeholder="Nama server" required>
	    </div>
        <div class="form-group">
           <label for="exampleInputEmail1"> Kapasitas</label>
           <div>
            <input type="text" class="form-control" name="kapasitas" maxlength="6" placeholder="Nilai kapasitas memori"   required style="width:85%;float:left" onkeydown="return numbersonly(this, event);" onkeyup="javascript:tandaPemisahTitik(this);">
            <select name="satuan"  class="form-control " required style="width:15%;float:left;position:relative;left:-1px;">
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
                <input type="text" class="form-control" name="harga" placeholder="Harga server" onkeydown="return numbersonly(this, event);" onkeyup="javascript:tandaPemisahTitik(this);" required>
              </div><!-- /.input group -->
            </div>
        </div>
        <div class="box-footer" style="padding:10px 0 0 0">
           <button type="submit" name="submit" class="btn btn-primary"><i class="fa fa-save"></i> &nbsp Save</button> &nbsp 
           <button type="reset" class="btn btn-primary" style="background:#713A3A">Reset</button> &nbsp
           <input type="button" class="btn btn-primary" style="color:white;font-weight:bold;background:#6B6B6B" value="Back" onclick="history.back(-1)" >
        </div>
    </div>
<?php echo form_close(); ?>
  </div>
</section>