<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class admin extends CI_Controller {
	var $limit=10; 
	var $offset=10;

	public function __construct(){
		parent::__construct();
		$this->load->model('admin_model');
		$this->load->helper('url_helper');
	}
	public function update($id){

		$this->load->helper('form');
		$this->load->library('form_validation');

		$this->form_validation->set_rules('password_lama','PASSWORD','required');
		$this->form_validation->set_rules('nama','Nama','required');
		$this->form_validation->set_rules('username','USERNAME','required');
		$this->form_validation->set_rules('password','PASSWORD','required');
		
		if ($this->form_validation->run() === FALSE) {
			$data['admin'] = $this->admin_model->get_admin_id($id);
			$this->load->view("service/header");
			$this->load->view("admin/update", $data);	
			$this->load->view("service/footer");
		}else{
			$this->admin_model->update($id);
			redirect('logout');
		 }
	}

	public function create(){
		$this->load->helper('form');
		$this->load->library('form_validation');

		$this->form_validation->set_rules('nama','Nama','required');
		$this->form_validation->set_rules('perusahaan','Perusahaan','required');
		$this->form_validation->set_rules('alamat','Alamat','required');
		$this->form_validation->set_rules('email','Email','required');
		$this->form_validation->set_rules('hp','Handphone','required');
		$this->form_validation->set_rules('tlp','Telephone','required');

		if ($this->form_validation->run() === FALSE) {
			$this->load->view("service/header");
			$this->load->view("klien/create");	
			$this->load->view("service/footer");
		}else{
			$this->klien_model->set_klien();
			redirect('klien/a');
		}
	}

	public function delete($id){
		$this->klien_model->delete_klien($id);
		redirect('klien/c');
	}
}
?>