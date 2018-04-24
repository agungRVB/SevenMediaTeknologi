<?php  echo validation_errors(); ?> 
<div class="box-header with-border" style="border-bottom:1px solid #E6E4E4;padding-left:15px;background:#F5F4FD">
  <h1 class="box-title" style="font-size:150%;">Payment Master</h1>
</div>
<section class="content-header">
  <font size="4px">Tambah Pembayaran Baru</font>
</section>
<section class="content">
 <div class="box box-primary" style="width:100%;margin:0 auto;">
<?php echo form_open('payment/create'); ?>	
	<div class="box-body"  style="width:99.5%">
	<div class="form-group" style="margin-bottom:4.5%">
      <label for="exampleInputEmail1"> Projek</label>
       <div>
         <select name="id_projek"  class="form-control " required style="width:100%;float:left;position:relative;left:-1px;">
            <?php
	        foreach ($projek as $projek_items) {
	           	foreach ($laporan as $laporan_items) {
	           		if ($projek_items['id']==$laporan_items['id_project']) {
	           			if (($laporan_items['status']!=0) or ($laporan_items['status']==null)) {
	           				$status=$laporan_items['status'];
	          				if ($status==null) {
	           					$status= $laporan_items['nilai'] * -1;
	           				}
	           				$nilai=number_format($status,0,",",".");
				         	?><option value="<?php echo $projek_items['id'];?>"> 
				           	<?php echo $projek_items['nama_project']." &nbsp &nbsp &nbsp ( Rp ".$nilai.",00 )";?> 
					        </option><?php 
				        }
	          		}
	           	}
	        }?> 
          </select>
        </div>
    </div>
    <div class="form-group">
	   <label for="exampleInputEmail1"> Jumlah</label>
	   <div class="input-group" style="width:100%">
          <div class="input-group-addon" style="width:2%"> Rp</div>
          <input type="text" class="form-control" name="jumlah" placeholder="Jumlah bayar" onkeydown="return numbersonly(this, event);" onkeyup="javascript:tandaPemisahTitik(this);" required>
        </div>
	</div>
	<div class="form-group">
	   <label for="exampleInputEmail1"> Metode</label>
	   <select name="metode"  class="form-control select2" required style="width:100%;">
	       	<option selected value="CASH">CASH</option>
	     	<option value="TRANSFER">TRANSFER</option>
	    </select>
	</div>
    <div class="form-group">
	   <label for="exampleInputEmail1"> Tanggal</label>
	   <div class="input-group" style="width:100%">
	    <div class="input-group-addon" style="width:4.7%">
	      <i class="fa fa-calendar"></i>
	    </div>
	    <input type="date" class="form-control" name="tanggal" value="<?php echo date("Y-m-d");?>" onkeypress="return isNumberKey(event)" required>
	  </div>
	</div>
    <button type="submit" name="submit" class="btn btn-primary"><i class="fa fa-save"></i> &nbsp Save</button> &nbsp 
	<button type="reset" class="btn btn-primary" style="background:#713A3A">Reset</button> &nbsp
	<input type="button" class="btn btn-primary" style="color:white;font-weight:bold;background:#6B6B6B" value="Back" onclick="history.back(-1)" >
   </div>
<?php echo form_close(); ?>
  </div>
</section>