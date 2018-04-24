<?php
class klien_model extends CI_Model{

	public function __construct(){
		$this->load->database();
	}

	public function get_klien($id = FALSE){
		if ($id == FALSE) {
			$query = $this->db->get('klien');
			return $query -> result_array();

		}else{
			$query = $this->db->get_where('klien', array('id' => $id));
			return $query -> row_array();	
		}	
	}

	public function set_klien(){
		$this->load->helper('url');

		$data = array(
			'nama' => $this->input->post('nama'),
			'perusahaan'=> $this->input->post('perusahaan'),
			'alamat'=> $this->input->post('alamat'),
			'email'=> $this->input->post('email'),
			'no_hp'=> $this->input->post('hp'),
			'no_tlp'=> $this->input->post('tlp'),
			
		);
		return $this->db->insert('klien', $data);
	}

	public function update_klien($id){
		$this->load->helper('url');

		$data = array(
			'id'=> $this->input->post('id'),
			'nama' => $this->input->post('nama'),
			'perusahaan'=> $this->input->post('perusahaan'),
			'alamat'=> $this->input->post('alamat'),
			'email'=> $this->input->post('email'),
			'no_hp'=> $this->input->post('hp'),
			'no_tlp'=> $this->input->post('tlp'),
			
		);
		$this->db->where('id', $id);
		return $this->db->update('klien', $data);
	}

	public function delete_klien($id){
		return $this->db->delete('klien', array('id' => $id));
	}
}
?>