<?php
class payment_model extends CI_Model{

	public function __construct(){
		$this->load->database();
	}

	public function get_payment($id = FALSE){
		if ($id == FALSE) {
			$query = $this->db->get('payment');
			$query = $this->db->query('select * from payment order by tgl_bayar ');
			return $query -> result_array();

		}else{
			$query = $this->db->query("select * from payment where id_project = '$id' order by tgl_bayar ");
			return $query -> row_array();	
		}	
	}

	public function set_payment(){
		$this->load->helper('url');

		$jml_baru = url_title( $this->input->post('jumlah'), 'dash', TRUE);
			$jml_baru = str_replace('.','', $jml_baru);
		$id_projek = url_title( $this->input->post('id_projek'), 'dash', TRUE);		
		//cara kritis - - jangan ditiru
			$link = mysqli_connect("localhost","root","","management_projek");
			$result = mysqli_query($link, "select jumlah from payment where id_project = '$id_projek'");
			$jml_lama=0;
			while ($row= mysqli_fetch_array($result,MYSQLI_ASSOC)) {
				if (empty($row['jumlah'])) {
					$jml_lama=0;
		       }else{
		          $jml_lama = $jml_lama + $row['jumlah'];
		       }
			}
			$jumlah = $jml_lama+$jml_baru;
		//end cara kritis - - jangan ditiru
		$data = array(
			'id_project' => $id_projek,
			'tgl_bayar	' => $this->input->post('tanggal'),
			'metode' => $this->input->post('metode'),
			'jumlah' => $jml_baru,
			'total' => $jumlah,
		);
		return $this->db->insert('payment', $data);
	}

	public function delete_payment($id){
		return $this->db->delete('payment', array('id_project' => $id));
	}
}
?>