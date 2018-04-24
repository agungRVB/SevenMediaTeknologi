        <div class="box-header with-border" style="border-bottom:1px solid #E6E4E4;padding-left:15px;background:#F5F4FD">
            <h1 class="box-title" style="font-size:150%;">Payment Master</h1>
        </div>
        <!-- Main content -->
        <section class="content">
          <div class="row">
                  <a href="<?php echo base_url('Payment/create'); ?>" style="color:#595757;float:right;">
                  <div class="tab-pane" id="glyphicons" style="margin-left:-40px">
                    <ul class="bs-glyphicons">
                      <li>
                        <span class="glyphicon glyphicon-edit"></span>
                        <span class="glyphicon-class">Tambah</span>
                      </li>
                    </ul>
                  </div><!-- /#ion-icons -->
                  </a>
                  <?php if (!$note==NULL) {
                  ?><div class="alert alert-info alert-dismissable" style="float:right;width:34%;margin:2px -30px 0 0;padding:0 30px 0 0;overflow:hidden">
                      <button type="button" class="close" data-dismiss="alert" aria-hidden="true" style="position:relative;padding-top:7px;font-size:25px">&times;</button>
                      <h4 style="padding:7px 0 0 10px"><i class="icon fa fa-info"></i><?php echo $note;?></h4>
                    </div><?php
                  }?>
                  <div style="width:60%;margin:5px 15px 0 5px ;padding:0 30px 0 0;overflow:hidden;">
                    <font size="4px" style="float:left;padding:10px;">Data Pembayaran</font>
                  </div>
            <div class="col-xs-12">
                <div class="box  box-primary" style="padding-top:5px;">
                <div class="box-body">
                  <table id="example1" class="table table-bordered table-striped" style="font-size:100%">
                    <thead>
                      <tr>
                        <th>Projek</th>
                        <th>Klien</th>
                        <th>Nilai</th>
                        <th>Tanggal Bayar</th>
                        <th>Metode</th>
                        <th>Jumlah Bayar</th>
                        <th>Total Bayar</th>
                      </tr>
                    </thead>
                    <tbody>
                  <?php
                      foreach ($klien as $klien_items) {
                         foreach ($projek as $projek_items) {
                            if ($klien_items['id']== $projek_items['id_klien']) {
                              foreach ($payment as $payment_items) {
                                if ($projek_items['id']== $payment_items['id_project']) {?>
                                   <tr>
                                      <td><?php echo $projek_items['nama_project'];?></td>
                                      <td><?php echo $klien_items['nama'];?></td>
                                      <td>Rp <?php
                                          $harga=number_format($projek_items['nilai'],0,",","."); echo"$harga";?>,00
                                      </td>
                                      <td><?php $array1= explode("-", $payment_items['tgl_bayar']);
                                                $tanggal = "$array1[2]-$array1[1]-$array1[0]";
                                                echo $tanggal;?>
                                      </td>
                                      <td><?php echo $payment_items['metode'];?></td>
                                      <td>Rp <?php
                                          $harga=number_format($payment_items['jumlah'],0,",","."); echo"$harga";?>,00
                                      </td>
                                      <td>Rp <?php
                                          $harga=number_format($payment_items['total'],0,",","."); echo"$harga";?>,00
                                      </td>
                                    </tr>
                                   <?php
                                }
                              } 
                            }
                         }
                      }
                  ?>
                    </tbody>
                  </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->