<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class server extends CI_Controller{

	public function __construct(){
		parent::__construct();
		$this->load->model('server_model');
		$this->load->helper('url_helper');
		$this->load->model('login_model');
	}

	public function index(){
		$data['server'] = $this->server_model->get_server();
		$data['note'] = NULL;
		$this->load->view("service/header");
		$this->load->view("server/view", $data);
		$this->load->view("service/footer");
	}

	public function create(){
		$this->load->helper('form');
		$this->load->library('form_validation');

		$this->form_validation->set_rules('nama','Nama','required');
		$this->form_validation->set_rules('kapasitas','Kapasitas','required');
		$this->form_validation->set_rules('satuan','Satuan','required');
		$this->form_validation->set_rules('harga','Harga','required');

		if ($this->form_validation->run() === FALSE) {
			$this->load->view("service/header");
			$this->load->view("server/create");	
			$this->load->view("service/footer");
		}else{
			$this->server_model->set_server();
			redirect('server');
		}
	}

	public function update($id){

		$this->load->helper('form');
		$this->load->library('form_validation');

		$this->form_validation->set_rules('id','ID','required');
		$this->form_validation->set_rules('nama','Nama','required');
		$this->form_validation->set_rules('kapasitas','Kapasitas','required');
		$this->form_validation->set_rules('satuan','Satuan','required');
		$this->form_validation->set_rules('harga','Harga','required');

		if ($this->form_validation->run() === FALSE) {
			$data2['server_items'] = $this->server_model->get_server($id);
			$this->load->view("service/header");
			$this->load->view("server/update", $data2);	
			$this->load->view("service/footer");
		}else{
			$this->server_model->update_server($id);
			redirect('server');
		 }
	}

	public function delete($id){
		$this->server_model->delete_server($id);
		redirect('server');
	}
}
?>