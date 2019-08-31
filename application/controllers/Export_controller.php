<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Export_controller extends CI_Controller {

	function __construct(){
		parent::__construct();
		if($this->session->userdata('status') != "login"){
			redirect(base_url("Login_controller"));
		}
	}

	public function index()
	{
		$data['judul'] = 'Export';
		$this->load->model('Export_model');
		$this->load->view('Header', $data);

		$data['list_export_header'] = $this->Export_model->load_export_header();

		$this->load->view('Export_view',$data);
		$this->load->view('Footer');
	}

	public function index_list()
	{
		$data['judul'] = 'Export List';
		$this->load->model('Export_model');
		$this->load->view('Header', $data);

		$data['list_export_header'] = $this->Export_model->load_export_list_header();
		$data['tipe'] = "Ubah";

		$this->load->view('Export_list_view',$data);
		$this->load->view('Footer');
	}

	public function Add()
	{
		$this->load->model('Custsup_model');
		$this->load->model('Export_model');
		$this->load->view('Header');

		$data['list_receiver'] = $this->Custsup_model->load_receiver();
		$data['list_country'] = $this->Custsup_model->load_country();
		$data['tipe'] = "Tambah";

		if(isset($_POST['submit_export'])){
			//proses simpan dilakukan
			$this->Export_model->simpan($_POST);
			redirect("Export_controller");
		}

		$this->load->view('Export_form_view',$data);
		$this->load->view('Footer');
	}


	public function Edit($export_header_id)
	{
		$this->load->model('Custsup_model');
		$this->load->model('Export_model');
		$this->load->view('Header');

		$data['list_receiver'] = $this->Custsup_model->load_receiver();
		$data['list_country'] = $this->Custsup_model->load_country();
		$data['default'] = $this->Export_model->get_default($export_header_id);
		$data['tipe'] = "Ubah";

		if(isset($_POST['submit_export'])){
			//proses simpan dilakukan
			$this->Export_model->update($_POST, $export_header_id);
			redirect("Export_controller");
		}

		$this->load->view('Export_form_view',$data);
		$this->load->view('Footer');
	}


	public function Export_detail($export_header_id)
	{
		$this->load->model('Export_model');
		$this->load->view('Header');

		$data['list_export_header_detail'] = $this->Export_model->load_export_header_detail($export_header_id);
		$data['list_export_detail'] = $this->Export_model->load_export_detail($export_header_id);

		$this->load->view('Export_detail_view',$data);
		$this->load->view('Footer');
	}


	public function Detail($export_header_id)
	{
		$this->load->model('Export_model');
		$this->load->model('Item_model');
		$this->load->model('Custsup_model');
		$this->load->view('Header');

		$data['export_header'] = $this->Export_model->load_export_header_detail($export_header_id);
		$data['list_item'] = $this->Item_model->load_item();
		$data['list_item_type'] = $this->Item_model->load_item_type();
		$data['list_satuan'] = $this->Item_model->load_satuan();
		$data['list_country'] = $this->Custsup_model->load_country();
		$data['tipe'] = "Tambah";

		if(isset($_POST['submit_export'])){
			//proses simpan dilakukan
			$this->Export_model->simpan_detail($_POST, $export_header_id);
			redirect("Export_controller/Export_detail/".intval($export_header_id));
		}

		$this->load->view('Export_form_detail_view', $data);
		$this->load->view('Footer');
	}


	public function Edit_detail($export_header_id, $export_detail_id)
	{
		$this->load->model('Export_model');
		$this->load->model('Item_model');
		$this->load->model('Custsup_model');
		$this->load->view('Header');

		$data['export_header'] = $this->Export_model->load_export_header_detail($export_header_id);
		$data['export_detail'] = $this->Export_model->load_export_hanya_detail($export_detail_id);
		$data['list_item'] = $this->Item_model->load_item();
		$data['list_item_type'] = $this->Item_model->load_item_type();
		$data['list_satuan'] = $this->Item_model->load_satuan();
		$data['list_country'] = $this->Custsup_model->load_country();
		$data['default'] = $this->Export_model->get_default_detail($export_detail_id);
		$data['tipe'] = "Ubah";

		if(isset($_POST['submit_export'])){
			//proses simpan dilakukan
			$this->Export_model->update_detail($_POST, $export_detail_id);
			redirect("Export_controller/Export_detail/".intval($export_header_id));
		}

		$this->load->view('Export_form_detail_view', $data);
		$this->load->view('Footer');
	}


	public function delete_header($export_header_id){
		$this->load->model("Export_model");
		$this->Export_model->delete_header($export_header_id);
		redirect("Export_controller");
	}

	public function delete_detail($export_header_id, $export_detail_id){
		$this->load->model("Export_model");
		$this->Export_model->delete_detail($export_detail_id);
		redirect("Export_controller/Export_detail/".$export_header_id);
	}

}
