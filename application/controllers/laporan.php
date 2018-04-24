<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class laporan extends CI_Controller{

	public function __construct(){
		parent::__construct();
		$this->load->model('klien_model');
		$this->load->model('projek_model');
		$this->load->model('payment_model');
		$this->load->model('laporan_model');
		$this->load->helper('url_helper');
	}

	public function index(){
		$data['klien'] = $this->klien_model->get_klien();
		$data['projek'] = $this->projek_model->get_projek();
		$data['laporan'] = $this->laporan_model->get_laporan();
		$this->load->view("service/header");
		$this->load->view("laporan/view", $data);
		$this->load->view("service/footer");
	}

	public function excel(){
		$data['klien'] = $this->klien_model->get_klien();
		$data['projek'] = $this->projek_model->get_projek();
		$data['laporan'] = $this->laporan_model->get_laporan();
		$this->load->view("laporan/excel", $data);
	}

	public function detail($id){
		$data['klien'] = $this->klien_model->get_klien();
		$data['projek'] = $this->projek_model->get_projek($id);
		$data['payment'] = $this->payment_model->get_payment();
		$data['laporan'] = $this->laporan_model->get_laporan();
		$this->load->view("service/header");
		$this->load->view("laporan/detail", $data);
		$this->load->view("service/footer");
	}

	public function detail_excel($id){
		$data['klien'] = $this->klien_model->get_klien();
		$data['projek'] = $this->projek_model->get_projek($id);
		$data['payment'] = $this->payment_model->get_payment();
		$data['laporan'] = $this->laporan_model->get_laporan();
		$this->load->view("laporan/detail_excel", $data);
	}

	public function cari(){
		$data['klien'] = $this->klien_model->get_klien();
		$data['projek'] = $this->projek_model->get_projek();
		$data['laporan'] = $this->laporan_model->cari_laporan();
		$this->load->view("service/header");
		$this->load->view("laporan/cari", $data);
		$this->load->view("service/footer");
		
	}
	public function cari_excel($ket){
		$data['klien'] = $this->klien_model->get_klien();
		$data['projek'] = $this->projek_model->get_projek();
		$data['laporan'] = $this->laporan_model->cari_laporan_ket($ket);
		$this->load->view("laporan/cari_excel", $data);
	}
}
?>