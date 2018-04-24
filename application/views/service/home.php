<section class="content">     
    <div class="row" style="margin-bottom:30px">
        <div class="col-xs-12">
         <?php echo form_open('home/short'); ?>        
    <table style="width:130px;border:0.2px solid #08A3F0" valign="center">
      <td style="background:#0587C8"><select name="cari" style="font-size:85%;padding-left:4px;height:32px;width:110px;border-top:none;border-bottom:none;border-radius:0 4px 4px 0">
      <?php
          $now = date("Y");
          $thn = 2015;
          $tahun;
          while ($now >= $thn) {
            if ($now == $tahun) {
              ?><option selected value="<?php echo $now;?>">Tahun <?php echo $now;?></option><?php
            }else{
              ?><option value="<?php echo $now;?>">Tahun <?php echo $now;?></option><?php
            }
          $now--;
          }
        ?>
          </select>
      <td style="background:#0587C8">
        <i class="fa fa-search" style="padding:0 15px 0 15px;color:#fff;" >
          <input style="position:absolute;top:0;left:126px;height:34px;background:none;border:none" type="submit" value=" &nbsp &nbsp &nbsp ">
        </i>
      </td>
    </table>
  <?php echo form_close();?> 
	        <!-- AREA CHART -->
	        <div class="box box-primary">
				<div class="col-md-3 col-sm-6 col-xs-12" style="padding:0;background:none;height:60px;width:58px;position:reative;">
				  <span class="info-box-icon" style="width:60px;height:50px;background:none;">
					<i class="fa fa-bookmark-o" style="color:#337BA9;position:relative;top:-6.5px;"></i>
				  </span>
				</div><!-- /.col -->
	            <font size="5px" color="#266DAD">Pendapatan</font>
		        <div class="box-body">
		            <div class="chart">
		                <canvas id="areaChart" style="height:250px"></canvas>
		                <!show data memanggil lewat code java script di bagian footer>
		            </div>
		        </div><!-- /.box-body -->
	        </div><!-- /.box -->
		</div>
    </div>

    <section class="sidebar" style="position:relative;top:-45px">
        <div class="user-panel"></div>
          <ul class="sidebar-menu">   

            
            <li class="treeview">
              <a href="#" style="background:#05B8C8;color:#fff;border:none">
                <i class="fa fa-tasks"></i> &nbsp <span>Projek Belum Lunas</span><i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu" style="background:none;border-left:2px solid #05B8C8;border-right:2px solid #05B8C8;border-bottom:2px solid #05B8C8;border-top:none;margin:0;padding:0">
                <table style="line-height:35px;width:100%;color:#005253;font-size:100%;background:none;border-top:none;border-bottom:0.5px solid #D2D8FE;border-left:none;border-right:0.1px solid #ECEEFE" border="1" >
                <?php 
                  foreach ($klien as $klien_items) {
                    foreach ($projek as $projek_items) {
                      if ($klien_items['id']==$projek_items['id_klien']) {
                        foreach ($laporan_belum as $belum_lunas) {
                          if ($projek_items['id']==$belum_lunas['id_project']) {
                            ?><tr>
                                <th> &nbsp  &nbsp <?php echo $projek_items['nama_project'];?></th>
                                <th> &nbsp  &nbsp <?php echo $klien_items['nama'];?></th>
                                <th> &nbsp  &nbsp <?php echo $klien_items['perusahaan'];?></th>
                                <th> &nbsp  &nbsp 0<?php echo $klien_items['no_hp'];?></th>
                                <th> &nbsp  &nbsp <?php $biaya=number_format($projek_items['nilai'],0,",","."); echo"Rp $biaya,00";?></th>
                                <th> &nbsp  &nbsp <?php $status=number_format($belum_lunas['status'],0,",","."); echo"Rp $status,00";?> </th>
                                <th width="10%">&nbsp</th>
                                <th><a class="blm" style="color:#395BCB" href="<?php echo base_url('laporan/detail/'.$projek_items['id']);?>">
                                      <i class="fa fa-eye" style="color:blue"></i>&nbsp Lihat Transaksi
                                    </a>
                                </th>
                              </tr>      
                            <?php
                          }
                        }
                      }
                    }
                  }?>
                </table>  
              </ul>
            </li>
            <span style="font-size:100%">&nbsp</span>


            <li class="active treeview">	<! menampilkan seluruh projek >
              <a href="#" style="background:#0587C8;color:#fff;border:none">
                <i class="fa fa-tasks"></i> &nbsp <span>Projek Keseluruhan</span><i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu" style="background:none;border-right:0.1px solid #ABB6FF;border-left:0.1px solid #ABB6FF;border-bottom:0.1px solid #ABB6FF;border-top:none;margin:0;padding:0">
                <?php
        				$now = date("Y");
        			    $thn = 2015;
        			    while ($now>=$thn) {
        			    	foreach ($projek_distinct as $distinct) {
                      if ($now == $distinct['distinct_tahun']) {
                        ?><li class="tahun_projek"><a><span><?php echo "Tahun $now";?></span></a></li><?php
                        foreach ($projek_start as $mulai) {
                          foreach ($laporan as $laporan_status) {
                            if (($mulai['start']==$now) and $mulai['id']==$laporan_status['id_project']){
                              ?><li class="filter_tahun">
                                  <i class="fa fa-chevron-right">
                                    <span><?php echo $mulai['nama_project'];?></span>
                                  </i>
                                  <?php 
                                    if ($laporan_status['status']==NULL) {
                                      ?><a class="ket" href="<?php echo base_url('laporan/detail/'.$mulai['id']) ?>">
                                          <i class="fa fa-ban" style="color:gray" ></i><?php echo $laporan_status['keterangan'];?>
                                        </a><?php
                                    }elseif ($laporan_status['status']<0) {
                                      ?><a class="ket" style="color:red" href="<?php echo base_url('laporan/detail/'.$mulai['id']) ?>">
                                          <i class="fa fa-spinner" style="color:#BC0808"></i><?php echo $laporan_status['keterangan'];?>
                                        </a><?php
                                    }elseif ($laporan_status['status']==0) {
                                      ?><a class="ket" style="color:#05C9D1"  href="<?php echo base_url('laporan/detail/'.$mulai['id']) ?>">
                                          <i class="fa fa-check"></i><?php echo $laporan_status['keterangan'];?>
                                        </a><?php
                                    }?>
                              </li><?php
                            }
                          }
                        }
                      }
                    }$now--;
        			    }?>
              </ul>
            </li>
          </ul>
	</section>
</section>

