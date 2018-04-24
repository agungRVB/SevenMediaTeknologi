<div class="box-header with-border" style="border-bottom:1px solid #E6E4E4;padding-left:15px;background:#F5F4FD">
  <h1 class="box-title" style="font-size:150%;">Project Master</h1>
</div>
<section class="content-header">
  <font size="4px">Detail Data Projek</font>
</section>
<section class="content">
  <div class="box box-primary" style="width:100%;margin:0 auto;">	
  <div class="box-body"  style="width:99.5%">
    <div>
      <div style="float:left;width:52%;overflow:hidden">
          <table style="line-height:40px;width:100%">
            <tr><td style="float:left;font-size:90%;width:135px"><label for="exampleInputEmail1"> ID Klien</label></td><td style="width:10px">:&nbsp</td>
                <td><?php foreach ($klien as $klien_items) {
                        if ($klien_items['id']==$projek_items['id_klien']) {
                          echo $projek_items['id_klien']." ( ".$klien_items['nama']." )";
                        }
                    }?>
                </td>
            </tr>
            <tr><td style="font-size:90%"><label for="exampleInputEmail1">Nama Projek</label></td><td>:</td>
                <td><?php echo $projek_items['nama_project'];?></td>
            </tr>


            <tr><td style="font-size:90%" valign="top"><label for="exampleInputEmail1">Deskripsi Projek</label></td><td valign="top">:</td>
                <td><textarea style="width:99%;margin-top:13px;height:167px;border:none" ><?php echo $projek_items['deskripsi'];?></textarea></td>
            </tr>
            <tr><td style="font-size:90%"><label for="exampleInputEmail1">Nama Marketing</label></td><td>:</td>
                <td><?php echo $projek_items['marketing_name'];?></td>  
            </tr>
            <tr><td style="font-size:90%"><label for="exampleInputEmail1">Penanggung Jawab</label></td><td>:</td>
                <td><?php echo $projek_items['pj_name'];?></td>
            </tr>
            <tr><td style="font-size:90%"><label for="exampleInputEmail1">Status Server</label></td><td>:</td>
                <td><?php $array = explode("-", $projek_items['status_server']);
                          $server = "$array[2]-$array[1]-$array[0]";
                          echo $server;?>
                </td>
            </tr>
          </table>
      </div>
      <div style="float:left;width:47%;padding-left:1%;border-left:1px solid black;overflow:hidden">
          <table style="line-height:40px;">
            <tr><td style="font-size:90%;width:150px"><label for="exampleInputEmail1">Nilai</label></td><td>:&nbsp</td>
                <td>Rp <?php $harga=number_format($projek_items['nilai'],0,",","."); echo"$harga";?>,00</td>
            </tr>
            <tr><td style="font-size:90%"><label for="exampleInputEmail1">Operasional Server</label></td><td>:</td>
                <td>Rp <?php 
                    foreach ($serverr as $server_items) {
                      if ($server_items['id']==$projek_items['id_server']) {
                        $harga=number_format($server_items['harga'],0,",","."); echo"$harga";
                      }
                    }?>,00</td>
            </tr>
            <tr><td style="font-size:90%"><label for="exampleInputEmail1">Operasional Domain</label></td><td>:</td>
                <td>Rp <?php $harga=number_format($projek_items['operasional_domain'],0,",","."); echo"$harga";?>,00</td>
            </tr>
            <tr><td style="font-size:90%"><label for="exampleInputEmail1">Operasional Marketing</label></td><td>:</td>
                <td>Rp <?php $harga=number_format($projek_items['operasional_marketing'],0,",","."); echo"$harga";?>,00</td>
            </tr>
            <tr><td style="font-size:90%"><label for="exampleInputEmail1">Operasional PJ</label></td><td>:</td>
                <td>Rp <?php $harga=number_format($projek_items['operasional_pj'],0,",","."); echo"$harga";?>,00</td>
            </tr>
            <tr><td style="font-size:90%"><label for="exampleInputEmail1">Tanggal Mulai</label></td><td>:</td>
                <td><?php $array = explode("-", $projek_items['tgl_mulai']);
                          $date0 = "$array[2]-$array[1]-$array[0]";
                          echo $date0;
                    ?>
                </td>
            </tr>
            <tr><td style="font-size:90%"><label for="exampleInputEmail1">Due Date</label></td><td>:</td>
                <td><?php $array1 = explode("-", $projek_items['due_date']);
                          $date = "$array1[2]-$array1[1]-$array1[0]";
                          echo $date;
                    ?>
                </td>
            </tr>
            <tr><td style="font-size:90%"><label for="exampleInputEmail1">Username</label></td><td>:</td>
                <td><?php echo $projek_items['username'];?></td>
            </tr>
            <tr><td style="font-size:90%"><label for="exampleInputEmail1">Password</label></td><td>:</td>
                <td><?php echo $projek_items['password'];?></td>
            </tr>
          </table>
      </div>
    </div>
  </div>
  </div>
  <div style="margin-top:2%"></div><input type="button" class="btn btn-primary" style="color:white;font-weight:bold;background:#6B6B6B" value="Back" onclick="history.back(-1)" >
</section>