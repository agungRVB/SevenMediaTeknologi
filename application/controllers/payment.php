<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class payment extends CI_Controller{

	public function __construct(){
		parent::__construct();
		$this->load->model('klien_model');
		$this->load->model('projek_model');
		$this->load->model('payment_model');
		$this->load->model('laporan_model');
		$this->load->helper('url_helper');
	}

	public function create(){
		$this->load->helper('form');
		$this->load->library('form_validation');

		$this->form_validation->set_rules('id_projek','Projek','required');
		$this->form_validation->set_rules('tanggal','Tanggal','required');
		$this->form_validation->set_rules('metode','Metode','required');
		$this->form_validation->set_rules('jumlah','JUmlah','required');

		if ($this->form_validation->run() === FALSE) {
			$data['klien'] = $this->klien_model->get_klien();
			$data['projek'] = $this->projek_model->get_projek();
			$data['laporan'] = $this->laporan_model->get_laporan();
			$this->load->view("service/header");
			$this->load->view("payment/create", $data);	
			$this->load->view("service/footer");
		}else{
			$this->payment_model->set_payment();
			$this->laporan_model->update_laporan_payment();
			redirect('payment');
		}
	}

	public function index(){
		$data['klien'] = $this->klien_model->get_klien();
		$data['projek'] = $this->projek_model->get_projek();
		$data['payment'] = $this->payment_model->get_payment();
		$data['laporan'] = $this->laporan_model->get_laporan();
		$data['note'] = NULL;
		$this->load->view("service/header");
		$this->load->view("payment/view", $data);
		$this->load->view("service/footer");
	}
}
?>