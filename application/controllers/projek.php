<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class projek extends CI_Controller{

	public function __construct(){
		parent::__construct();
		$this->load->model('server_model');
		$this->load->model('klien_model');
		$this->load->model('projek_model');
		$this->load->model('payment_model');
		$this->load->model('laporan_model');
		$this->load->helper('url_helper');
	}

	public function index(){
		$data['klien'] = $this->klien_model->get_klien();
		$data['projek'] = $this->projek_model->get_projek();
		$data['note'] = NULL;
		$this->load->view("service/header");
		$this->load->view("projek/view", $data);
		$this->load->view("service/footer");
	}

	public function detail($id){
		$data['serverr'] = $this->server_model->get_server();
		$data['klien'] = $this->klien_model->get_klien();
		$data['projek_items'] = $this->projek_model->get_projek($id);
		$this->load->view("service/header");
		$this->load->view("projek/detail", $data);
		$this->load->view("service/footer");
	}

	public function create(){
		$this->load->helper('form');
		$this->load->library('form_validation');

		$this->form_validation->set_rules('projek','projek','required');
		$this->form_validation->set_rules('deskripsi','deskripsi','required');
		$this->form_validation->set_rules('marketing','marketing','required');
		$this->form_validation->set_rules('pj','pj','required');
		$this->form_validation->set_rules('nilai','nilai','required');
		$this->form_validation->set_rules('id_server','id_server','required');
		$this->form_validation->set_rules('status','status','required');
		$this->form_validation->set_rules('op_dmn','domain','required');
		$this->form_validation->set_rules('due_date','due_date','required');
		$this->form_validation->set_rules('user','user','required');
		$this->form_validation->set_rules('pass','pass','required');

		if ($this->form_validation->run() === FALSE) {
			$data['server'] = $this->server_model->get_server();
			$data['klien'] = $this->klien_model->get_klien();
			$data['projek'] = $this->projek_model->get_projek();
			$this->load->view("service/header");
			$this->load->view("projek/create", $data);
			$this->load->view("service/footer");
		}else{
			$this->projek_model->set_projek();
			$this->laporan_model->set_laporan();
			redirect('projek');
		}
	}

	public function update($id){

		$this->load->helper('form');
		$this->load->library('form_validation');

		$this->form_validation->set_rules('projek','projek','required');
		$this->form_validation->set_rules('deskripsi','deskripsi','required');
		$this->form_validation->set_rules('marketing','marketing','required');
		$this->form_validation->set_rules('pj','pj','required');
		$this->form_validation->set_rules('nilai','nilai','required');
		$this->form_validation->set_rules('op_server','op_server','required');
		$this->form_validation->set_rules('status','status','required');
		$this->form_validation->set_rules('op_dmn','domain','required');
		$this->form_validation->set_rules('due_date','due_date','required');
		$this->form_validation->set_rules('user','user','required');
		$this->form_validation->set_rules('pass','pass','required');

		if ($this->form_validation->run() === FALSE) {
			$data['server'] = $this->server_model->get_server();
			$data['klien'] = $this->klien_model->get_klien();
			$data['projek_items'] = $this->projek_model->get_projek($id);
			$this->load->view("service/header");
			$this->load->view("projek/update",$data);
			$this->load->view("service/footer");
		}else{
			$this->projek_model->update_projek($id);
			$this->laporan_model->update_laporan_projek($id);
			redirect('projek');
		 }
	}

	public function delete($id){
		$this->projek_model->delete_projek($id);
		$this->payment_model->delete_payment($id);
		$this->laporan_model->delete_laporan($id);
		redirect('projek');
	}
}
?>
