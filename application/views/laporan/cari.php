        <section class="content-header" style="width:100%">
          <h1>Laporan Pembayaran</h1>
        </section>
        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-body">
                  <table id="example1" class="table table-bordered table-striped" style="font-size:100%">
                    <thead>
                      <tr>
                        <th>Projek</th>
                        <th>Klien</th>
                        <th>Nilai</th>
                        <th>Total</th>
                        <th>Status</th>
                        <th>Keterangan</th>
                        <th>Detail</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php 
                    foreach ($klien as $klien_items) {
                      foreach ($projek as $projek_items) {
                        if ($klien_items['id']==$projek_items['id_klien']) {
                          foreach ($laporan as $laporan_items) {
                            if (empty($laporan_items['id'])) {
                              ?><tr><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
                                </tr><?php   
                            }else{
                              if ($projek_items['id']==$laporan_items['id_project']) {
                                ?><tr>
                                      <td><?php echo $projek_items['nama_project'];?></td>
                                      <td><?php echo $klien_items['nama'];?></td>
                                      <td><?php $harga=number_format($laporan_items['nilai'],0,",","."); echo"Rp $harga,00";?>
                                      </td>
                                      <td><?php if ($laporan_items['total_bayar']==null){ echo " &nbsp &nbsp &nbsp &nbsp -"; 
                                          }else {$harga=number_format($laporan_items['total_bayar'],0,",","."); echo"Rp $harga,00";}?>
                                      </td>
                                      <td><?php if ($laporan_items['status']==null) { echo " &nbsp &nbsp &nbsp -";
                                          }elseif ($laporan_items['status']==0) { echo "&nbsp&nbsp&nbspOK";
                                          }else{$harga=number_format($laporan_items['status'],0,",","."); echo"Rp $harga,00";}?>
                                      </td>
                                      <td><?php if ($laporan_items['status']==null) { echo "TIDAK ADA TRANSAKSI";
                                          }elseif ($laporan_items['status']==0) { echo "LUNAS";
                                          }elseif($laporan_items['status']<0) { echo "BELUM LUNAS";
                                          }else{echo "TERIMAKASIH SODAQOHNYA :D";}?>
                                      </td>
                                      <td align="center">
                                        <a href="<?php echo base_url('laporan/detail/'.$projek_items['id']);?>" style="color:#078FD5"><i class="fa fa-eye"></i></a>
                                      </td>
                                  </tr>
                                <?php
                              }  
                            }
                          }
                        }
                      }
                    }?>
                    </tbody>
                  </table>
                  <div>
                    <a href="<?php echo base_url('laporan/cari/excel/'.$laporan_items['keterangan']); ?>" class="btn btn-primary" style="color:white;font-weight:bold"><i class="fa fa-download"></i> &nbsp Generate Excel</a>
                    <input type="button" class="btn btn-primary" style="color:white;font-weight:bold;background:#6B6B6B" value="Back" onclick="history.back(-1)" >
                  </div>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->