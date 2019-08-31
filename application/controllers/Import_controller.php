<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Import_controller extends CI_Controller {

	function __construct(){
		parent::__construct();
		if($this->session->userdata('status') != "login"){
			redirect(base_url("Login_controller"));
		}
	}

	public function index()
	{
		$data['judul'] = 'Import';
		$this->load->model('Import_model');
		$this->load->view('Header', $data);
		$data['list_import_header'] = $this->Import_model->load_import_header();
		$this->load->view('Import_view',$data);
		$this->load->view('Footer');
	}

	public function index_list()
	{
		$data['judul'] = 'Import List';
		$this->load->model('Import_model');
		$this->load->view('Header', $data);
		$data['list_import_header'] = $this->Import_model->load_import_header_list();
		$this->load->view('Import_list_view',$data);
		$this->load->view('Footer');
	}

	public function Add()
	{
		$this->load->model('Import_model');
		$this->load->model('Custsup_model');

		$this->load->view('Header');
		$data['tipe'] = "Tambah";
		$data['list_supplier'] = $this->Custsup_model->load_supplier();

		if(isset($_POST['submit_import'])){
			//proses simpan dilakukan
			$this->Import_model->simpan($_POST);
			redirect("Import_controller");
		}

		$this->load->view('Import_form_view', $data);
		$this->load->view('Footer');
	}

	public function Edit($import_header_id)
	{
		$this->load->model('Custsup_model');
		$this->load->model('Import_model');
		$this->load->view('Header');

		$data['list_supplier'] = $this->Custsup_model->load_supplier();
		$data['list_country'] = $this->Custsup_model->load_country();
		$data['default'] = $this->Import_model->get_default($import_header_id);
		$data['tipe'] = "Ubah";

		if(isset($_POST['submit_import'])){
			//proses simpan dilakukan
			$this->Import_model->update($_POST, $import_header_id);
			redirect("Import_controller");
		}

		$this->load->view('Import_form_view',$data);
		$this->load->view('Footer');
	}

	public function Import_detail($import_header_id)
	{
		$this->load->model('Import_model');
		$this->load->view('Header');

		$data['import_header'] = $this->Import_model->load_import_header_detail($import_header_id);
		$data['list_import_detail'] = $this->Import_model->load_import_detail($import_header_id);

		$this->load->view('Import_detail_view',$data);
		$this->load->view('Footer');
	}

	public function Detail($import_header_id)
	{
		$this->load->model('Import_model');
		$this->load->model('Item_model');
		$this->load->model('Custsup_model');
		$this->load->view('Header');

		$data['import_header'] = $this->Import_model->load_import_header_detail($import_header_id);
		$data['list_item'] = $this->Item_model->load_item();
		$data['list_item_type'] = $this->Item_model->load_item_type();
		$data['list_satuan'] = $this->Item_model->load_satuan();
		$data['list_country'] = $this->Custsup_model->load_country();
		$data['tipe'] = "Tambah";

		if(isset($_POST['submit_import'])){
			//proses simpan dilakukan
			$this->Import_model->simpan_detail($_POST, $import_header_id);
			redirect("Import_controller/import_detail/".intval($import_header_id));
		}

		$this->load->view('Import_form_detail_view', $data);
		$this->load->view('Footer');
	}


	public function Edit_detail($import_header_id, $import_detail_id)
	{
		$this->load->model('Import_model');
		$this->load->model('Item_model');
		$this->load->model('Custsup_model');
		$this->load->view('Header');

		$data['import_header'] = $this->Import_model->load_import_header_detail($import_header_id);
		$data['import_detail'] = $this->Import_model->load_import_hanya_detail($import_detail_id);
		$data['list_item'] = $this->Item_model->load_item();
		$data['list_item_type'] = $this->Item_model->load_item_type();
		$data['list_satuan'] = $this->Item_model->load_satuan();
		$data['list_country'] = $this->Custsup_model->load_country();
		$data['default'] = $this->Import_model->get_default_detail($import_detail_id);
		$data['tipe'] = "Ubah";

		if(isset($_POST['submit_import'])){
			//proses simpan dilakukan
			$this->Import_model->update_detail($_POST, $import_detail_id);
			redirect("Import_controller/import_detail/".intval($import_header_id));
		}

		$this->load->view('Import_form_detail_view', $data);
		$this->load->view('Footer');
	}


	public function delete_header($import_header_id){
		$this->load->model("Import_model");
		$this->Import_model->delete_header($import_header_id);
		redirect("Import_controller");
	}

	public function delete_detail($import_header_id, $import_detail_id){
		$this->load->model("Import_model");
		$this->Import_model->delete_detail($import_detail_id);
		redirect("Import_controller/Import_detail/".$import_header_id);
	}

}
