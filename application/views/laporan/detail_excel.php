<?php
// Fungsi header dengan mengirimkan raw data excel
header("Content-type: application/vnd-ms-excel");
 
// Mendefinisikan nama file ekspor "hasil-export.xls"
header("Content-Disposition: attachment; filename=LAPORAN DETAIL.xls");
 
// Tambahkan table
?>				
			<section class="content-header" style="width:100%">
	      <h2>Detail Pembayaran <?php echo $projek['nama_project'];?></h2>
	    </section> 

        <?php foreach ($klien as $klien_items) {
          if ($klien_items['id']== $projek['id_klien']) {
            ?><p>Klien &nbsp : <?php echo $klien_items['nama'] ?><br/><?php
          }
        }$harga=number_format($projek['nilai'],0,",",".");
        ?>Nilai &nbsp &nbsp: Rp <?php echo $harga ?>,00</p>
				<table  class="table table-bordered table-striped" border="1" style="font-size:100%" align="left">
                    <thead>
                      <tr>
                        <th>Tanggal Bayar</th>
                        <th>Jumlah Bayar</th>
                        <th>Metode</th>
                        <th>Total Bayar</th>
                        <th>Status</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php
                      foreach ($klien as $klien_items) {
                            if ($klien_items['id']== $projek['id_klien']) {
                              foreach ($payment as $payment_items) {
                                if ($projek['id']== $payment_items['id_project']) {?>
                                   <tr>
                                      <td><?php $array1= explode("-", $payment_items['tgl_bayar']);
                                                $tanggal = "$array1[2]-$array1[1]-$array1[0]";
                                                echo " &nbsp ".$tanggal." &nbsp &nbsp ";?>
                                      </td>
                                      <td><?php
                                          $harga=number_format($payment_items['jumlah'],0,",","."); echo " &nbsp Rp ".$harga;?>,00 &nbsp &nbsp
                                      </td>
                                      <td><?php echo " &nbsp ".$payment_items['metode']." &nbsp &nbsp ";?></td>
                                      <td><?php
                                          $harga=number_format($payment_items['total'],0,",","."); echo" &nbsp Rp ".$harga;?>,00 &nbsp &nbsp
                                      </td>
                                      <td><?php $status=$payment_items['total']-$projek['nilai'] ?><?php
                                          if ($status==0) {
                                            echo " &nbsp LUNAS &nbsp &nbsp ";
                                          }else{
                                          $harga=number_format($status,0,",","."); echo" &nbsp Rp ".$harga.",00 &nbsp &nbsp"; } ?>
                                      </td>
                                    </tr>
                                   <?php
                                }
                              } 
                            }     
                      }
                  ?>
                    </tbody>
                  </table>
                  <?php