<?php
// Fungsi header dengan mengirimkan raw data excel
header("Content-type: application/vnd-ms-excel");
 
// Mendefinisikan nama file ekspor "hasil-export.xls"
header("Content-Disposition: attachment; filename=LAPORAN.xls");
 
// Tambahkan table
?>				
			<section class="content-header" style="width:100%">
        <?php foreach ($laporan as $laporan_items) {}?>
	      <h2>Daftar laporan (<?php echo $laporan_items['keterangan'];?>)</h2>
	    </section>  
				<table  class="table table-bordered table-striped" border="1" style="font-size:100%">
                    <thead>
                      <tr>
                        <th>Projek</th>
                        <th>Klien</th>
                        <th>Nilai</th>
                        <th>Total</th>
                        <th>Status</th>
                        <th>Keterangan</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($klien as $klien_items) {
                      foreach ($projek as $projek_items) {
                        if ($klien_items['id']==$projek_items['id_klien']) {
                          foreach ($laporan as $laporan_items) {
                            if ($projek_items['id']==$laporan_items['id_project']) {
                              ?><tr>
                                    <td><?php echo " &nbsp ".$projek_items['nama_project']." &nbsp &nbsp";?></td>
                                    <td><?php echo " &nbsp ".$klien_items['nama']." &nbsp &nbsp";?></td>
                                    <td align="left"><?php $harga=number_format($laporan_items['nilai'],0,",","."); echo" &nbsp Rp ".$harga.",00 &nbsp &nbsp";?>
                                    </td>
                                    <td><?php if ($laporan_items['total_bayar']==null){ echo " &nbsp &nbsp&nbsp - &nbsp &nbsp"; 
                                        }else {$harga=number_format($laporan_items['total_bayar'],0,",","."); echo" &nbsp Rp ".$harga.",00 &nbsp &nbsp";}?>
                                    </td>
                                    <td><?php if ($laporan_items['status']==null) { echo " &nbsp &nbsp &nbsp - &nbsp";
                                        }elseif ($laporan_items['status']==0) { echo " &nbsp &nbsp OK &nbsp";
                                        }else{$harga=number_format($laporan_items['status'],0,",","."); echo" &nbsp Rp ".$harga.",00 &nbsp &nbsp";}?>
                                    </td>
                                    <td><?php if ($laporan_items['status']==null) { echo " &nbsp TIDAK ADA TRANSAKSI &nbsp &nbsp";
                                        }elseif ($laporan_items['status']==0) { echo " &nbsp LUNAS &nbsp &nbsp";
                                        }elseif($laporan_items['status']<0) { echo " &nbsp BELUM LUNAS &nbsp &nbsp";
                                        }else{echo " &nbsp TERIMAKASIH SODAQOHNYA :D &nbsp &nbsp";}?>
                                    </td>
                                </tr>
                              <?php
                            }
                          }
                        }
                      }
                    }?>
                    </tbody>
                  </table>