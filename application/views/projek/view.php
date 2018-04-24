        <div class="box-header with-border" style="border-bottom:1px solid #E6E4E4;padding-left:15px;background:#F5F4FD">
            <h1 class="box-title" style="font-size:150%;">Project Master</h1>
        </div>
        <!-- Main content -->
        <section class="content">
          <div class="row">
                  <a href="<?php echo base_url('projek/create'); ?>" style="color:#595757;float:right;">
                  <div class="tab-pane" id="glyphicons">
                    <ul class="bs-glyphicons">
                      <li>
                        <span class="glyphicon glyphicon-edit"></span>
                        <span class="glyphicon-class">Tambah</span>
                      </li>
                    </ul>
                  </div><!-- /#ion-icons -->
                  </a>
                  <?php if (!$note==NULL) {
                  ?><div class="alert alert-info alert-dismissable" style="float:right;width:35%;margin:2px -30px 0 0;padding:0 30px 0 0;overflow:hidden">
                      <button type="button" class="close" data-dismiss="alert" aria-hidden="true" style="position:relative;padding-top:7px;font-size:25px">&times;</button>
                      <h4 style="padding:7px 0 0 10px"><i class="icon fa fa-info"></i><?php echo $note;?></h4>
                    </div><?php
                  }?>
                  <div style="width:28%;margin:5px 15px 0 5px ;padding:0 30px 0 0;overflow:hidden">
                    <font size="4px" style="float:left;padding:10px;">Data Projek</font>
                  </div>
            <div class="col-xs-12">
              <div class="box  box-primary" style="padding-top:5px;">
                <div class="box-body">
                  <table id="example1" class="table table-bordered table-striped" style="font-size:100%">
                    <thead>
                      <tr>
                        <th width="2%">No</th>
                        <th>Projek</th>
                        <th>Klien</th>
                        <th>Marketing</th>
                        <th>PJ</th>
                        <th>Nilai</th>
                        <th>Due Date</th>
                        <th width="13%">Action</th>
                      </tr> 
                    </thead>
                    <tbody>
                    <?php
                    $a=1;
                    foreach ($klien as $klien_items) {
                      foreach ($projek as $projek_items) {
                        if ($klien_items['id'] == $projek_items['id_klien']) {
                          ?><tr>
                              <td><?php echo $a; $a++?></td>
                              <td><?php echo $projek_items['nama_project'];?></td>
                              <td><?php echo $klien_items['nama'];?></td>
                              <td><?php echo $projek_items['marketing_name'];?></td>
                              <td><?php echo $projek_items['pj_name']?></td>
                              <td>Rp <?php
                                $harga=number_format($projek_items['nilai'],0,",",".");
                                echo"$harga";?>,00
                              </td>
                              <td><?php $tgl = $projek_items['due_date'];
                                  $array1 = explode("-", $tgl);
                                  $tempo = "$array1[2]-$array1[1]-$array1[0]";
                                  echo $tempo;
                                  ?>
                              </td>
                              <td align="center">
                                <a class="action" href="<?php echo base_url('projek/detail/'.$projek_items['id']);?>">
                                  <i class="fa fa-eye" style="color:blue;"></i>
                                </a>
                                <a title="hay" class="action" href="<?php echo base_url('projek/update/'.$projek_items['id']);?>">
                                  <i class="fa fa-edit" style="color:green;"></i>
                                </a>
                                <button class="action" style="border:none" onclick='swal({title: "Hapus projek <?php echo $projek_items['nama_project'];?> ?",text: "Anda akan kehilangan payment dan laporan yang bersangkutan dengan projek tersebut", type: "warning",
                                    showCancelButton: true, confirmButtonColor: "#DD6B55", confirmButtonText: "Delete", closeOnConfirm: false },
                                    function(){ swal("Deleted", "Data berhasil dihapus.", "success"); window.location.href="<?php echo base_url('projek/delete/'.$projek_items['id']);?>"; });'>
                                    <i class="fa fa-close" style="color:red"></i>
                              </td>
                            </tr>
                          <?php    
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