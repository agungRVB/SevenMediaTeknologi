<?php

//Memisahkan tanggal bulan tahun
        $mulai="01/02/2016";
        $selesai="02/02/2016";

         $array2=explode("/",$mulai);
           $tgl_mulai=$array2[0];
           $bln_mulai=$array2[1];
           $thn_mulai=$array2[2];

         $array3=explode("/",$selesai);
           $tgl_akhir=$array3[0];
           $bln_akhir=$array3[1];
           $thn_akhir=$array3[2];

	echo "tgl = $tgl_mulai<br/>bln = $bln_mulai<br/>thn = $thn_mulai<br/><br/><br/>
		  tgl = $tgl_akhir<br/>bln = $bln_akhir<br/>thn = $thn_akhir";


        
//Mengambil jumlah hari per bulan setahun
        $kalender = CAL_GREGORIAN;
        
        $tgl_sekarang= date('d');
        $bln_sekarang= date('m');
        $thn_sekarang= date('Y');
        
        $kabisat = ($thn_sekarang%4 == 0) ? "KABISAT" : "BUKAN KABISAT";
        
        $bulan=1;
        while ($bulan <= 12) {
          $hari= cal_days_in_month($kalender, $bulan, $thn_sekarang);
          echo "Bulan $bulan tahun 2016 ada $hari hari termasuk tahun $kabisat<br/>";
        $bulan++;
        }

        $date_selesai="25/06/2016";
          $date_z=explode("/", $date_selesai);
            $hr_selesai=$date_z[0];
            $bln_selesai=$date_z[1];

        
        echo "<br/>sekarang = $tgl_sekarang/$bln_sekarang/$thn_sekarang<br/>selesai = $hr_selesai/$bln_selesai/$thn_sekarang<br/><br/>";    
        $jml_hr=0;
        while ($bln_selesai >= $bln_sekarang) {
          if($bln_selesai == $date_z[1]){
              $hari= cal_days_in_month($kalender, $bln_selesai, $thn_sekarang);
              $selisih= $hari - $hr_selesai;
              $sisa_hari_bln_ini = $hari - $selisih;
              echo " Date (this month) :  jml_hari bulan ini = $hari
                     <br/>bulan $bln_selesai => $sisa_hari_bln_ini<br/><br/>";
              $jml_hr=$jml_hr + $sisa_hari_bln_ini;

          }elseif($bln_selesai == $bln_sekarang) {
              $hari= cal_days_in_month($kalender, $bln_selesai, $thn_sekarang);
              $sisa_hari_bln_ini = $hari - ($tgl_sekarang-1);
              echo " <br/>Due date (month) :<br/>bulan $bln_selesai => $sisa_hari_bln_ini<br/>";
              $jml_hr=$jml_hr + $sisa_hari_bln_ini;

          }else{
              $hari= cal_days_in_month($kalender, $bln_selesai, $thn_sekarang);
              echo "bulan $bln_selesai => $hari<br/>";
              $jml_hr=$jml_hr + $hari;
          }

          $bln_selesai--;  
        }    
        echo "<br/>Total sisa hari = $jml_hr hari";
?>