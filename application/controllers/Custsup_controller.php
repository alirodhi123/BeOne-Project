<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Custsup_controller extends CI_Controller {

	function __construct(){
		parent::__construct();
		if($this->session->userdata('status') != "login"){
			redirect(base_url("Login_controller"));
		}
	}

	public function index()
	{
		$data['judul'] = 'Customer';
		$this->load->model('Custsup_model');
		$this->load->view('Header', $data);

		$data['tipe'] = "Tambah";

		if(isset($_POST['submit_custsup'])){
			$this->Custsup_model->simpan($_POST);
			redirect("Custsup_controller?tipe=".intval($_POST['tipe_custsup']));
		}

		$this->load->view('Custsup_view',$data);
		$this->load->view('Footer');
	}

	public function Edit($custsup_id)
	{
		$this->load->model('Custsup_model');
		$this->load->view('Header');

		$data['default'] = $this->Custsup_model->get_default($custsup_id);
		$data['tipe'] = "Ubah";

		if(isset($_POST['submit_custsup'])){
			$this->Custsup_model->update($_POST, $custsup_id);
			redirect("Custsup_controller?tipe=".intval($_POST['tipe_custsup']));
		}

		$this->load->view('Custsup_view',$data);
		$this->load->view('Footer');
	}

	public function delete($custsup_id){
		$this->load->model("Custsup_model");
		$this->Custsup_model->delete($custsup_id);

		$tipe = $this->db->query("SELECT * FROM public.beone_custsup WHERE custsup_id =".intval($custsup_id));
		$hasil_tipe = $tipe->row_array();

		redirect("Custsup_controller?tipe=".intval($hasil_tipe['tipe_custsup']));
	}


}
