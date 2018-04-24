<?php
class projek_model extends CI_Model{

	public function __construct(){
		$this->load->database();
	}
	public function get_projek($id = FALSE){
		if ($id == FALSE) {
			$query = $this->db->get('projects');
			return $query -> result_array();

		}else{
			$query = $this->db->get_where('projects', array('id' => $id));
			return $query -> row_array();	
		}	
	}
	public function get_projek_start(){
		$query = $this->db->query("select year(tgl_mulai) as start, id, nama_project from projects");
		return $query -> result_array();
	}
	public function get_projek_tahun(){
		$query = $this->db->query("select distinct(year(tgl_mulai)) as distinct_tahun from projects");
		return $query -> result_array();
	}

	public function set_projek(){
		$this->load->helper('url');

		$nilai = url_title( $this->input->post('nilai'), 'dash', TRUE);
			$nilai=str_replace('.','', $nilai);
		$server = url_title( $this->input->post('op_server'), 'dash', TRUE);
		$domain = url_title( $this->input->post('op_dmn'), 'dash', TRUE);
			$domain=str_replace('.','', $domain);
			$op_marketing = 0.2*($nilai - $server - $domain);
			$op_pj = 0.2*($nilai - $server - $domain - $op_marketing);

		$data = array(
			'id_klien' => $this->input->post('id_klien'),
			'id_server' => $this->input->post('id_server'),
			'nama_project' => $this->input->post('projek'),
			'deskripsi' => $this->input->post('deskripsi'),
			'marketing_name' => $this->input->post('marketing'),
			'pj_name' => $this->input->post('pj'),
			'nilai' => $nilai,
			'status_server' => $this->input->post('status'),
			'tgl_mulai' => $this->input->post('status'),
			'due_date' => $this->input->post('due_date'),
			'operasional_domain' => $domain,
			'operasional_marketing' => $op_marketing,
			'operasional_pj' => $op_pj,
			'username' => $this->input->post('user'),
			'password' => $this->input->post('pass'),

		);
		return $this->db->insert('projects', $data);
	}

	public function update_projek($id){
		$this->load->helper('url');

		$nilai = url_title( $this->input->post('nilai'), 'dash', TRUE);
			$nilai=str_replace('.','', $nilai);
		$server = url_title( $this->input->post('op_server'), 'dash', TRUE);
		$domain = url_title( $this->input->post('op_dmn'), 'dash', TRUE);
			$domain=str_replace('.','', $domain);
			$op_marketing = 0.2*($nilai - $server - $domain);
			$op_pj = 0.2*($nilai - $server - $domain - $op_marketing);

		$data = array(
			'id_klien' => $this->input->post('id_klien'),
			'nama_project' => $this->input->post('projek'),
			'deskripsi' => $this->input->post('deskripsi'),
			'marketing_name' => $this->input->post('marketing'),
			'pj_name' => $this->input->post('pj'),
			'nilai' => $nilai,
			'operasional_server' => $this->input->post('op_server'),
			'status_server' => $this->input->post('status'),
			'due_date' => $this->input->post('due_date'),
			'operasional_domain' => $domain,
			'operasional_marketing' => $op_marketing,
			'operasional_pj' => $op_pj,
			'username' => $this->input->post('user'),
			'password' => $this->input->post('pass'),
		);
		$this->db->where('id', $id);
		return $this->db->update('projects', $data);
	}

	public function delete_projek($id){
		return $this->db->delete('projects', array('id' => $id));
	}
}
?>