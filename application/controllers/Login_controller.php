<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_controller extends CI_Controller {

	function __construct(){
		parent::__construct();

		$this->load->model('User_model');
	}

	public function index()
	{
		$this->load->view('Login');
	}

	function aksi_login(){
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$where = array(
			'username' => $username,
			'password' => md5($password)
			);
		$cek = $this->User_model->cek_login("beone_user",$where)->num_rows();
		if($cek > 0){

			$sql_user_id = $this->db->query("SELECT * FROM public.beone_user WHERE username='$username'");
			$hasil_user_id = $sql_user_id->row_array();

			$data_session = array(
				'username' => $username,
				'user_id' => $hasil_user_id['user_id'],
				'status' => "login"
				);

			$this->session->set_userdata($data_session);

			redirect(base_url("Import_controller"));

		}else{
			echo "

			<script>
			 var result = alert ('Username atau password salah..!');
				if (result == false) {
				  window.location='http://localhost/byi';
				}
				else {
				  window.location='http://localhost/byi';
				}
			</script>";
			//redirect(base_url("Login_controller"));

		}
	}

	function logout(){
		$this->session->sess_destroy();
		redirect(base_url('Login_controller'));
	}

	public function dashboard()
	{
		$this->load->view('Header');
		$this->load->view('Dashboard');
		$this->load->view('Footer');
	}

}
