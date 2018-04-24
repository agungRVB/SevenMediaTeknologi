<?php
class admin_model extends CI_Model{

	public function __construct(){
		$this->load->database();
	}

	public function get_admin_id($id = FALSE){
		$query = $this->db->get_where('admin', array('id' => $id));
		return $query -> row_array();	
	}

	public function update($id){
		$this->load->helper('url');
		
		$data = array(
			'nama' => $this->input->post('nama'),
			'username' => $this->input->post('username'),
			'password' => $this->input->post('password'),
		);
		$this->db->where('id', $id);
		return $this->db->update('admin', $data);
	}

}
?>