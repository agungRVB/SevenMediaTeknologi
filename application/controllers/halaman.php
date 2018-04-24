<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class halaman extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('login_model');
		$this->load->model('halaman_model');
		$this->load->library('session');
		$this->load->model('laporan_model');
		$this->load->model('projek_model');
		$this->load->model('klien_model');
		$this->load->helper('url_helper');

	}

	public function index(){
		$this->load->view("login");
	}

	public function home(){
		$data['klien'] = $this->klien_model->get_klien();
		$data['projek'] = $this->projek_model->get_projek();
		$data['projek_distinct'] = $this->projek_model->get_projek_tahun();
		$data['projek_start'] = $this->projek_model->get_projek_start();
		$data['laporan'] = $this->laporan_model->get_laporan();
		$data['laporan_tanpa'] = $this->laporan_model->cari_laporan_ket("tidak_ada_transaksi");
		$data['laporan_belum'] = $this->laporan_model->cari_laporan_ket("belum_lunas");
		$data['laporan_lunas'] = $this->laporan_model->cari_laporan_ket("lunas");
		$this->load->view("service/header");
		$this->load->view("service/home", $data);
		$this->load->view("service/footer");
	}

	public function short_tahun(){
		$data['tahun'] = url_title( $this->input->post('cari'), 'dash', TRUE);
		$data['klien'] = $this->klien_model->get_klien();
		$data['projek'] = $this->projek_model->get_projek();
		$data['projek_distinct'] = $this->projek_model->get_projek_tahun();
		$data['projek_start'] = $this->projek_model->get_projek_start();
		$data['laporan'] = $this->laporan_model->get_laporan();
		$data['laporan_belum'] = $this->laporan_model->cari_laporan_ket("belum lunas");
		$this->load->view("service/header");
		$this->load->view("service/home", $data);
		$this->load->view("service/footer2", $data);
	}

	public function login(){
		$username = url_title( $this->input->post('username'), 'dash', TRUE);
		$password = url_title( $this->input->post('password'), 'dash', TRUE);
		$data = $this->login_model->get_admin($username , $password);
	}

	public function logout(){
		$this->session->sess_destroy();
		redirect('');
	}

}
