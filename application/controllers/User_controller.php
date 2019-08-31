<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_controller extends CI_Controller {

	function __construct(){
		parent::__construct();
		if($this->session->userdata('status') != "login"){
			redirect(base_url("Login_controller"));
		}
	}

	public function index()
	{
		$data['judul'] = 'User';
		$this->load->model('User_model');
		$this->load->view('Header', $data);

		$data['list_user'] = $this->User_model->load_user();
		$data['list_role_user'] = $this->User_model->load_role_user();
		$data['tipe'] = "Tambah";

		if(isset($_POST['submit_user'])){
			$this->User_model->simpan($_POST);
			redirect("User_controller");
		}

		$this->load->view('User_view',$data);
		$this->load->view('Footer');
	}

	public function edit($user_id)
	{
		$this->load->model('User_model');
		$this->load->view('Header');

		$data['list_user'] = $this->User_model->load_user();
		$data['list_role_user'] = $this->User_model->load_role_user();
		$data['default'] = $this->User_model->get_default($user_id);
		$data['tipe'] = "Ubah";

		if(isset($_POST['submit_user'])){
			$this->User_model->update($_POST, $user_id);
			redirect("User_controller");
		}

		$this->load->view('User_view',$data);
		$this->load->view('Footer');
	}

	public function delete($user_id){
		$this->load->model("User_model");
		$this->User_model->delete($user_id);
		redirect("User_controller");
	}


	public function backup(){
		$this->load->view('Backup_view');
	}


	public function Role_user()
	{
		$this->load->model('User_model');
		$this->load->view('Header');

		$data['list_role'] = $this->User_model->load_role_user();

		if(isset($_POST['submit_role'])){
			$this->User_model->simpan_role($_POST);
			redirect("User_controller/Role_user");
		}

		$this->load->view('Role_user_add_view', $data);
		$this->load->view('Footer');
	}


	public function Role_user_edit($role_id)
	{
		$this->load->model('User_model');
		$this->load->view('Header');

		$data['default'] = $this->User_model->get_default_role($role_id);

		if(isset($_POST['update_role'])){
			$this->User_model->update_role($_POST, $role_id);
			redirect("User_controller/Role_user");
		}

		$this->load->view('Role_user_view', $data);
		$this->load->view('Footer');
	}

	public function Role_delete($role_id){
		$this->load->model("User_model");
		$this->User_model->delete_role($role_id);
		redirect("User_controller/Role_user");
	}


public function update_security($role_id, $field_db){
	$this->load->model("User_model");
	$this->User_model->update_security($role_id, $field_db);
	redirect("User_controller/Role_user_edit/".intval($role_id));
}



}
