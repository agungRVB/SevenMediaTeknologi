<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class klien extends CI_Controller{

	public function __construct(){
		parent::__construct();
		$this->load->model('klien_model');
		$this->load->helper('url_helper');
	}

	public function index(){
		$data['klien'] = $this->klien_model->get_klien();
		$data['note'] = NULL;
		$this->load->view("service/header");
		$this->load->view("klien/view", $data);
		$this->load->view("service/footer");
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
			redirect('klien');
		}
	}

	public function update($id){

		$this->load->helper('form');
		$this->load->library('form_validation');

		$this->form_validation->set_rules('id','ID','required');
		$this->form_validation->set_rules('nama','Nama','required');
		$this->form_validation->set_rules('perusahaan','Perusahaan','required');
		$this->form_validation->set_rules('alamat','Alamat','required');
		$this->form_validation->set_rules('email','Email','required');
		$this->form_validation->set_rules('hp','Handphone','required');
		$this->form_validation->set_rules('tlp','Telephone','required');
		
		if ($this->form_validation->run() === FALSE) {
			$data2['klien_items'] = $this->klien_model->get_klien($id);
			$this->load->view("service/header");
			$this->load->view("klien/update", $data2);	
			$this->load->view("service/footer");
		}else{
			$this->klien_model->update_klien($id);
			redirect('klien');
		 }
	}

	public function delete($id){
		$this->klien_model->delete_klien($id);
		redirect('klien');
	}
}
?>