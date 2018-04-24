<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class agenda extends CI_Controller{

	public function __construct(){
		parent::__construct();
		$this->load->model('agenda_model');
		$this->load->helper('url_helper');
	}

	public function index(){
		$warna['color'] = 0;
		$data['agenda'] = $this->agenda_model->get_event();
		$this->load->view("service/header");
		$this->load->view("agenda/create", $warna);
		$this->load->view("agenda/events", $data);
		$this->load->view("agenda/calendar");
		$this->load->view("service/footer");
	}
	
	public function set_color($color){
		$warna['color'] = $color;
		$data['agenda'] = $this->agenda_model->get_event();
		$this->load->view("service/header");
		$this->load->view("agenda/create", $warna);
		$this->load->view("agenda/events", $data);
		$this->load->view("agenda/calendar");
		$this->load->view("service/footer");
	}

	public function create(){
		$this->agenda_model->set_agenda();
		redirect('agenda');
	}

	public function delete(){
		$this->agenda_model->delete_event();
		redirect('agenda');
	}
}
?>