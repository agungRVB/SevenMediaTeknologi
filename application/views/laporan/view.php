        <div class="box-header with-border" style="border-bottom:1px solid #E6E4E4;padding-left:15px;background:#F5F4FD">
            <h1 class="box-title" style="font-size:150%;">Report Payment</h1>
        </div>
        <!-- Main content -->
        <section class="content">
          <div class="row">
                  <div style="width:29%;margin:15px 0 12px 5px ;overflow:hidden;float:left">
                    <font size="4px" style="padding:10px;">Data Pembayaran</font>
                  </div>

                  <?php echo form_open('laporan/cari'); ?>        
                    <table style="position:relative;float:right;margin-top:10px;right:-25px;height:33px;width:230px;border:0.2px solid #08A3F0" valign="center">
                      <tr><td style="background:#0587C8"><select name="cari" style="font-size:85%;padding-left:4px;height:33px;width:184px;border:none;border-radius:0 4px 4px 0">
                            <option value="">SEMUA KETERANGAN</option>
                            <option value="belum lunas">BELUM LUNAS</option>
                            <option value="lunas">LUNAS</option>
                            <option value="tidak ada transaksi">TIDAK ADA TRANSAKSI</option>
                          </select>
                      <td style="background:#0587C8"><i class="fa fa-search" style="padding:0 15px 0 15px;color:#fff;" ></i></td>
                      <td style="border:1px solid #EFEFEF"><input class="cari" type="submit" style="background:none;width:40px;border:none;position:relative;left:-44px;padding:6px 0" value=" &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp&nbsp" /></td>
                      </tr>
                    </table>
                  <?php echo form_close();?>

                  <a title="save" href="<?php echo base_url('laporan/excel'); ?>" style="color:#595757;float:right;margin:1px -35px 0 0">
                  <div class="tab-pane" id="glyphicons">
                    <ul class="bs-glyphicons">
                      <li>
                        <span class="glyphicon glyphicon-save"></span>
                      </li>
                    </ul>
                  </div><!-- /#ion-icons -->
                  </a>
            <div class="col-xs-12">
              <div class="box  box-primary" style="padding-top:5px;">
              <div class="box-body">
                  <table id="example1" class="table table-bordered table-striped" style="font-size:100%;">
                    <thead>
                      <tr>
                        <th width="2%">No</th>
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
                    $a=1;
                    foreach ($klien as $klien_items) {
                      foreach ($projek as $projek_items) {
                        if ($klien_items['id']==$projek_items['id_klien']) {
                          foreach ($laporan as $laporan_items) {
                            if ($projek_items['id']==$laporan_items['id_project']) {
                              ?><tr><td align="center"><?php echo $a; $a++;?></td>
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
                                      <a class="action" href="<?php echo base_url('laporan/detail/'.$projek_items['id']);?>" style="padding:2.3px 4px 2.3px 8px;" >
                                        <i class="fa fa-eye" style="color:blue;">&nbsp</i>Detail
                                      </a>
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
                  
                  
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->