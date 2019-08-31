<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Item_controller extends CI_Controller {

	function __construct(){
		parent::__construct();
		if($this->session->userdata('status') != "login"){
			redirect(base_url("Login_controller"));
		}
	}

	public function index()
	{

		$data['judul'] = 'Item List';
		$this->load->model('Item_model');
		$this->load->view('Header', $data);

		$data['list_item'] = $this->Item_model->load_item();
		$data['list_tipe_item'] = $this->Item_model->load_item_type();
		$data['list_satuan'] = $this->Item_model->load_satuan();
		$data['tipe'] = "Tambah";

		if(isset($_POST['submit_item'])){
			$this->Item_model->simpan($_POST);
			redirect("Item_controller");
		}

		$this->load->view('Item_view',$data);
		$this->load->view('Footer');
	}

	public function Edit($item_id)
	{
		$this->load->model('Item_model');
		$this->load->view('Header');

		$data['list_item'] = $this->Item_model->load_item();
		$data['list_tipe_item'] = $this->Item_model->load_item_type();
		$data['list_satuan'] = $this->Item_model->load_satuan();
		$data['default'] = $this->Item_model->get_default($item_id);
		$data['tipe'] = "Ubah";

		if(isset($_POST['submit_item'])){
			$this->Item_model->update($_POST, $item_id);
			redirect("Item_controller");
		}

		$this->load->view('Item_view',$data);
		$this->load->view('Footer');
	}

	public function delete($item_id){
		$this->load->model("Item_model");
		$this->Item_model->delete($item_id);
		redirect("Item_controller");
	}

	public function index_satuan(){
		$this->load->model('Item_model');
		$this->load->view('Header');

		$data['list_satuan'] = $this->Item_model->load_satuan();
		$data['tipe'] = "Tambah";

		if(isset($_POST['submit_satuan'])){
			$this->Item_model->simpan_satuan($_POST);
			redirect("Item_controller/index_satuan");
		}

		$this->load->view('Item_satuan_view',$data);
		$this->load->view('Footer');
	}

	public function Edit_satuan($satuan_id){
		$this->load->model('Item_model');
		$this->load->view('Header');

		$data['list_satuan'] = $this->Item_model->load_satuan();
		$data['default'] = $this->Item_model->get_default_satuan($satuan_id);
		$data['tipe'] = "Ubah";

		if(isset($_POST['submit_satuan'])){
			$this->Item_model->update_satuan($_POST, $satuan_id);
			redirect("Item_controller/index_satuan");
		}

		$this->load->view('Item_satuan_view',$data);
		$this->load->view('Footer');
	}

	public function delete_satuan($satuan_id){
		$this->load->model("Item_model");
		$this->Item_model->delete_satuan($satuan_id);
		redirect("Item_controller/index_satuan");
	}


	public function index_item_type(){
		$this->load->model('Item_model');
		$this->load->view('Header');

		$data['list_item_type'] = $this->Item_model->load_item_type();
		$data['tipe'] = "Tambah";

		if(isset($_POST['submit_item_type'])){
			$this->Item_model->simpan_item_type($_POST);
			redirect("Item_controller/index_item_type");
		}

		$this->load->view('Item_type_view',$data);
		$this->load->view('Footer');
	}

	public function Edit_item_type($item_type_id){
		$this->load->model('Item_model');
		$this->load->view('Header');

		$data['list_item_type'] = $this->Item_model->load_item_type();
		$data['default'] = $this->Item_model->get_default_item_type($item_type_id);
		$data['tipe'] = "Ubah";

		if(isset($_POST['submit_item_type'])){
			$this->Item_model->update_item_type($_POST, $item_type_id);
			redirect("Item_controller/index_item_type");
		}

		$this->load->view('Item_type_view',$data);
		$this->load->view('Footer');
	}

	public function delete_item_type($item_type_id){
		$this->load->model("Item_model");
		$this->Item_model->delete_item_type($item_type_id);
		redirect("Item_controller/index_item_type");
	}

}
