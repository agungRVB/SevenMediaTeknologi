<?php
class login_model extends CI_Model{

	public function __construct(){
		$this->load->database();
	}

	public function get_admin($user, $pass){
			$query = $this->db->get_where('admin', array('username' => $user, 'password' => $pass));

			if ($query->num_rows()>0) {
				$this->session->set_userdata('username', $user);
				$this->session->set_userdata('password', $pass);
				redirect('home');
			}else{
				redirect('');
			}
	}
}
?>