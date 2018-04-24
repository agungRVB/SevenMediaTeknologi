<?php
class halaman_model extends CI_Model{

	public function __construct(){
		$this->load->database();
	}

	public function get_tahun(){
		$tahun = url_title( $this->input->post('cari'), 'dash', TRUE);
		
		echo $tahun;
	}

}
?>