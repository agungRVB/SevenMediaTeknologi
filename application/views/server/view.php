        <div class="box-header with-border" style="border-bottom:1px solid #E6E4E4;padding-left:15px;background:#F5F4FD">
            <h1 class="box-title" style="font-size:150%;">Server Master</h1>
        </div>
        <!-- Main content -->
        <section class="content">
          <div class="row">
                  <a href="<?php echo base_url('server/create'); ?>" style="color:#595757;float:right;">
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
                  ?><div class="alert alert-info alert-dismissable" style="float:right;width:30%;margin:2px -30px 0 0;padding:0 30px 0 0;overflow:hidden">
                      <button type="button" class="close" data-dismiss="alert" aria-hidden="true" style="position:relative;padding-top:7px;font-size:25px">&times;</button>
                      <h4 style="padding:7px 0 0 10px"><i class="icon fa fa-info"></i><?php echo $note;?></h4>
                    </div><?php
                  }?>
                  <div style="width:28%;margin:5px 15px 0 5px ;padding:0 30px 0 0;overflow:hidden">
                    <font size="4px" style="float:left;padding:10px;">Data Server</font>
                  </div>
            <div class="col-xs-12">
              <div class="box  box-primary">
                <div class="box-body">
                  <table id="example1" class="table table-bordered table-striped" style="font-size:100%">
                    <thead>
                      <tr>
                        <th width="2%">No</th>
                        <th>Nama</th>
                        <th>Kapasitas</th>
                        <th>Harga</th>
                        <th width="20%">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php
                    $no=1;
                    foreach ($server as $server_items) {
                      ?><tr>
                          <td align="center"><?php echo $no; $no++;;?>
                          </td>
                          <td><?php echo $server_items['nama'];?></td>
                          <td><?php echo $server_items['kapasitas']?></td>
                          <td>Rp <?php
                              $harga=number_format($server_items['harga'],0,",",".");
                              echo"$harga";?>,00
                          </td>
                          <td align="center">
                              <a class="action" href="<?php echo base_url('server/update/'.$server_items['id']);?>" style="padding:2.3px 4px 2.3px 8px;" >
                                <i class="fa fa-edit" style="color:green;"> </i>Ubah
                              </a>
                              <button class="action" style="border:none" onclick='swal({title: "Hapus server <?php echo $server_items['nama'];?> ?",text: "Hal ini akan mempengaruhi data yang bersangkutan", type: "warning",
                                showCancelButton: true, confirmButtonColor: "#DD6B55", confirmButtonText: "Delete", closeOnConfirm: false },
                                function(){ swal("Deleted", "Data berhasil dihapus.", "success"); window.location.href="<?php echo base_url('server/delete/'.$server_items['id']);?>"; });'>
                                <i class="fa fa-close" style="color:red"> </i>Hapus</button>
                          </td>
                        </tr>
                      <?php
                    }
                    ?>
                    </tbody>
                  </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->