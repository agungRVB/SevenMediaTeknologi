<?php
class laporan_model extends CI_Model{
	public function __construct(){
		$this->load->database();
	}
	public function cari_laporan(){
		$cari = url_title( $this->input->post('cari'));
		$cari=str_replace('-',' ', $cari);
		if ($cari == null) {
			redirect('laporan');

		}else{
			$link = mysqli_connect("localhost","root","","management_projek");
			$result = mysqli_query($link, "select count(keterangan) as ket from laporan where keterangan = '$cari' ");
			$row= mysqli_fetch_array($result,MYSQLI_ASSOC);
			if ($row['ket']==0) {
				redirect('laporan');
			}else{
				$query = $this->db->get_where('laporan', array('keterangan' => $cari));
				return $query -> result_array();	
			}
		}
	}
	public function cari_laporan_ket($ket){
		$ket=str_replace('_',' ', $ket);
		$query = $this->db->get_where('laporan', array('keterangan' => $ket));
		return $query -> result_array();
	}
	public function get_laporan($id = FALSE){
		if ($id == FALSE) {
			$query = $this->db->get('laporan');
			return $query -> result_array();

		}else{
			$query = $this->db->get_where('laporan', array('id' => $id));
			return $query -> row_array();	
		}	
	}
	public function set_laporan(){
		$this->load->helper('url');
		//cara kritis - - jangan ditiru
			$link = mysqli_connect("localhost","root","","management_projek");
			$result = mysqli_query($link, "select id, id_klien, nilai from projects ");
			while ($row= mysqli_fetch_array($result,MYSQLI_ASSOC)) {
				$id_projek = $row['id'];
				$id_klien = $row['id_klien'];
				$nilai = $row['nilai'];
			}
			$data= array(
				'id_project' => $id_projek,
				'id_klien' => $id_klien,
				'nilai' => $nilai,
				'keterangan' => "tidak ada transaksi"
			);		
		//end cara kritis - - jangan ditiru
		return $this->db->insert('laporan', $data);
	}
	public function update_laporan_projek($id){
		$this->load->helper('url');

		$id_klien = url_title( $this->input->post('id_klien'), 'dash', TRUE);
		$nilai = url_title( $this->input->post('nilai'), 'dash', TRUE);
			$nilai=str_replace('.','', $nilai);

		//cara kritis - - jangan ditiru
			$link = mysqli_connect("localhost","root","","management_projek");
			$result = mysqli_query($link, "select total_bayar from laporan where id_klien='$id_klien'");
			while ($row= mysqli_fetch_array($result,MYSQLI_ASSOC)) {
				$total_bayar = $row['total_bayar'];
			}
			if ($total_bayar==null) {
				$status = null;
			}else{
				$status = $total_bayar - $nilai;
				if ($status < 0) {
					$keterangan = "belum lunas";
				}elseif ($status == 0) {
					$keterangan = "lunas";
				}	
			}
			$data= array(
				'id_klien' => $id_klien,
				'nilai' => $nilai,
				'status' => $status,
				'keterangan' => $keterangan,
			);		
		//end cara kritis - - jangan ditiru
		$this->db->where('id_project', $id);
		return $this->db->update('laporan', $data);
	}
	public function update_laporan_payment(){
		$this->load->helper('url');

		$id_projek = url_title( $this->input->post('id_projek'), 'dash', TRUE);		
		//cara kritis - - jangan ditiru
			$link = mysqli_connect("localhost","root","","management_projek");
			$result = mysqli_query($link, "select * from payment where id_project = '$id_projek'");
			$result2 = mysqli_query($link, "select nilai from projects where id = '$id_projek'");
			$jml=0;
			while ($row= mysqli_fetch_array($result,MYSQLI_ASSOC)) {
				if (empty($row['jumlah'])) {
					$jml=0;
		       }else{
		          $jml= $jml + $row['jumlah'];
		       }
			}
			while ($row2= mysqli_fetch_array($result2,MYSQLI_ASSOC)) {
				$nilai = $row2['nilai'];
			}
			$jumlah_total = $jml;
			$status = $jumlah_total - $nilai;
			if ($status < 0) {
				$ket ="belum lunas";
			}elseif($status == 0){
				$ket="lunas";
			}

		//end cara kritis - - jangan ditiru
		$data = array(
			'total_bayar' => $jumlah_total,
			'status' => $status,
			'keterangan' => $ket,
		);
		$this->db->where('id_project', $id_projek);
		return $this->db->update('laporan', $data);
	}
	public function delete_laporan($id){
		return $this->db->delete('laporan', array('id_project' => $id));
	}
}