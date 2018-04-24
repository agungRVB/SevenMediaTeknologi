<?php
class server_model extends CI_Model{

	public function __construct(){
		$this->load->database();
	}

	public function get_server($id = FALSE){
		if ($id == FALSE) {
			$query = $this->db->get('server');
			return $query -> result_array();

		}else{
			$query = $this->db->get_where('server', array('id' => $id));
			return $query -> row_array();	
		}	
	}

	public function set_server(){
		$this->load->helper('url');

		$stn = url_title( $this->input->post('satuan'), 'dash', TRUE);
		$kps = url_title( $this->input->post('kapasitas'), 'dash', TRUE);
		$kps = str_replace('.','', $kps);
			$kapasitas = "$kps ".strtoupper($stn);
		
		$hrg = url_title( $this->input->post('harga'), 'dash', TRUE);
			$harga = str_replace('.','', $hrg);

		$data = array(
			'nama' => $this->input->post('nama'),
			'kapasitas' => $kapasitas,
			'harga' => $harga
		);
		return $this->db->insert('server', $data);
	}

	public function update_server($id){
		$this->load->helper('url');

		$stn = url_title( $this->input->post('satuan'), 'dash', TRUE);
		$kps = url_title( $this->input->post('kapasitas'), 'dash', TRUE);
		$kps = str_replace('.','', $kps);
			$kapasitas = "$kps ".strtoupper($stn);
		
		$hrg = url_title( $this->input->post('harga'), 'dash', TRUE);
			$harga = str_replace('.','', $hrg);

		$data = array(
			'id'=> $this->input->post('id'),
			'nama' => $this->input->post('nama'),
			'kapasitas' => $kapasitas,
			'harga' => $harga
		);
		$this->db->where('id', $id);
		return $this->db->update('server', $data);
	}


	public function delete_server($id){
		return $this->db->delete('server', array('id' => $id));
	}
}
?>