        <div class="box-header with-border" style="border-bottom:1px solid #E6E4E4;padding-left:15px;background:#F5F4FD">
            <h1 class="box-title" style="font-size:150%;">Report Payment</h1>
        </div>
        <!-- Main content -->
        <section class="content">
          <div class="row">
                  <a href="<?php echo base_url('laporan_detail/excel/'.$projek['id']); ?>" style="color:#595757;float:right;">
                  <div class="tab-pane" id="glyphicons">
                    <ul class="bs-glyphicons">
                      <li>
                        <span class="glyphicon glyphicon-save"></span>
                        <span class="glyphicon-class">Download</span>
                      </li>
                    </ul>
                  </div><!-- /#ion-icons -->
                  </a>
                  <div style="width:70%;margin:5px 15px 0 5px ;padding:0 30px 0 0;overflow:hidden">
                    <font size="4px" style="float:left;padding:10px;">Transaksi Detail dari <?php echo $projek['nama_project'];?></font>
                  </div>
            <div class="col-xs-12">
              <div class="box box-primary" style="padding-top:5px">
              <font size="3px" style="padding:10px;">
                <?php foreach ($klien as $klien_items) {
                  if ($klien_items['id']== $projek['id_klien']) {
                    echo "Klien &nbsp &nbsp: ".$klien_items['nama']."<br/>";
                  }
                }?>
              </font>
              <font size="3px" style="padding:10px;"><?php $harga=number_format($projek['nilai'],0,",","."); echo"Nilai &nbsp&nbsp&nbsp : Rp $harga";?>,00</font>
                <div class="box-body">
                  <table id="example1" class="table table-bordered table-striped" style="font-size:100%">
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
                                                echo $tanggal;?>
                                      </td>
                                      <td>Rp <?php
                                          $harga=number_format($payment_items['jumlah'],0,",","."); echo"$harga";?>,00
                                      </td>
                                      <td><?php echo $payment_items['metode'];?></td>
                                      <td>Rp <?php
                                          $harga=number_format($payment_items['total'],0,",","."); echo"$harga";?>,00
                                      </td>
                                      <td><?php $status=$payment_items['total']-$projek['nilai'] ?><?php
                                          if ($status==0) {
                                            echo "LUNAS";
                                          }else{
                                          $harga=number_format($status,0,",","."); echo"Rp $harga,00"; } ?>
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
                  <div>
                  <input type="button" class="btn btn-primary" style="color:white;font-weight:bold;background:#6B6B6B" value="Back" onclick="history.back(-1)" >
                  </div>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->