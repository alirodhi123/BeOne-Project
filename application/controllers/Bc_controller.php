<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bc_controller extends CI_Controller {

	function __construct(){
		parent::__construct();
		if($this->session->userdata('status') != "login"){
			redirect(base_url("Login_controller"));
		}
	}

	public function index()
	{
		$data['judul'] = 'Dokumen 2.3';
		$this->load->view('Header', $data);
		$this->load->view('bc23_form_view');
		$this->load->view('Footer');
	}

public function filter_pabean_pemasukan()
{
	$this->load->view('Header');
	if(isset($_GET['submit_filter'])){
			redirect("Bc_controller/Rpt_pabean_pemasukan?tglawal=".$_GET['tanggal_awal']."&tglakhir=".$_GET['tanggal_akhir']);
	}
	$this->load->view('Report_filter_tanggal');
	$this->load->view('Footer');
}

public function Rpt_pabean_pemasukan()
{
	$this->load->view('Header');
	$this->load->view('Rpt_pabean_pemasukan');
	$this->load->view('Footer');
}


public function filter_pabean_pengeluaran()
{
	$this->load->view('Header');
	if(isset($_GET['submit_filter'])){
			redirect("Bc_controller/Rpt_pabean_pengeluaran?tglawal=".$_GET['tanggal_awal']."&tglakhir=".$_GET['tanggal_akhir']);
	}
	$this->load->view('Report_filter_tanggal');
	$this->load->view('Footer');
}

public function Rpt_pabean_pengeluaran()
{
	$this->load->view('Header');
	$this->load->view('Rpt_pabean_pengeluaran');
	$this->load->view('Footer');
}


}
