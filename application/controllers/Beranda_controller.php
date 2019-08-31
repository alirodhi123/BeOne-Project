<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Beranda_controller extends CI_Controller {

	public function index()
	{
		$data['judul'] = 'BeOne';
		$this->load->model('Beranda_model');
		$this->load->view('Header', $data);
		$data['list_user'] = $this->Beranda_model->load_user();
		$this->load->view('user', $data);
		$this->load->view('Footer');
	}
}
