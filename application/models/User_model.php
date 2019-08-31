<?php
//Model_data.php
defined('BASEPATH') OR exit('No direct script access allowed');

Class User_model extends CI_Model{


	public function simpan($post){
		$nama = $this->db->escape($post['nama_user']);
		$username = $this->db->escape($post['username']);
		$role = $this->db->escape($post['role']);
		$password = $this->db->escape($post['password']);
		$cpassword = $this->db->escape($post['cpassword']);
		$user_id = $this->session->userdata('user_id');
		$update_date = date('Y-m-d');

		//insert akun
		if ($password == $cpassword){
				$sql = $this->db->query("INSERT INTO public.beone_user(user_id, username, password, nama, role_id, update_by, update_date, flag) VALUES (DEFAULT, $username, MD5($password), $nama, $role, $user_id, '$update_date', 1)");
		}

		if($sql)
			return true;
		return false;
	}

	public function update($post, $user_id){
		$nama = $this->db->escape($post['nama_user']);
		$username = $this->db->escape($post['username']);
		$role = $this->db->escape($post['role']);
		$password = $this->db->escape($post['password']);
		$cpassword = $this->db->escape($post['cpassword']);
		$session = $this->session->userdata('user_id');
		$update_date = date('Y-m-d');

		//insert akun
		if ($password == $cpassword){
				$sql = $this->db->query("UPDATE public.beone_user	SET username=$username, password=MD5($password), nama=$nama, role_id=$role, update_by=$session, update_date='$update_date' WHERE user_id = ".intval($user_id));
		}

		if($sql)
			return true;
		return false;
	}

	public function delete($user_id){
		$sql = $this->db->query("UPDATE public.beone_user SET flag=0 WHERE user_id =".intval($user_id));
	}

	public function get_default($user_id){
		$sql = $this->db->query("SELECT u.password, u.user_id, u.nama, u.username, r.nama_role as nrole, u.role_id FROM public.beone_user u INNER JOIN public.beone_role r ON u.role_id = r.role_id WHERE u.user_id = ".intval($user_id));
		if($sql->num_rows() > 0)
			return $sql->row_array();
		return false;
	}

	public function load_user(){
		$sql = $this->db->query("SELECT u.user_id, u.nama, u.username, r.nama_role as nrole, u.role_id, u.flag FROM public.beone_user u INNER JOIN public.beone_role r ON u.role_id = r.role_id WHERE u.flag = 1 ORDER BY u.user_id ASC");
		return $sql->result_array();
	}

	public function load_role_user(){
		$sql = $this->db->query("SELECT * FROM public.beone_role ORDER BY role_id ASC");
		return $sql->result_array();
	}

	function cek_login($table,$where){
		return $this->db->get_where($table,$where);
	}

	public function simpan_role($post){
		$nama = $this->db->escape($post['nama_role']);
		$keterangan = $this->db->escape($post['keterangan']);
		$update_date = date('Y-m-d');

		$sql = $this->db->query("INSERT INTO public.beone_role(
														role_id, nama_role, keterangan, master_menu, pembelian_menu, penjualan_menu, inventory_menu, produksi_menu, asset_menu, jurnal_umum_menu, kasbank_menu, laporan_inventory, laporan_keuangan, konfigurasi)
														VALUES (DEFAULT, $nama, $keterangan, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1)");
		if($sql)
			return true;
		return false;
	}


	public function update_role($post, $role_id){
		$nama = $this->db->escape($post['nama_role']);
		$keterangan = $this->db->escape($post['keterangan']);
		$update_date = date('Y-m-d');

		$sql = $this->db->query("UPDATE public.beone_role SET nama_role=$nama, keterangan=$keterangan WHERE role_id = ".intval($role_id));
		if($sql)
			return true;
		return false;
	}


	public function get_default_role($role_id){
		$sql = $this->db->query("SELECT * FROM public.beone_role WHERE role_id = ".intval($role_id));
		if($sql->num_rows() > 0)
			return $sql->row_array();
		return false;
	}

	public function update_security($role_id, $field_db){
		$sql_r = $this->db->query("SELECT $field_db FROM public.beone_role WHERE role_id=".intval($role_id));
		$role = $sql_r->row_array();
		$field = $role[$field_db];

		if ($field == 0){
				$sql = $this->db->query("UPDATE public.beone_role SET $field_db = 1 WHERE role_id = ".intval($role_id));
		}else{
				$sql = $this->db->query("UPDATE public.beone_role SET $field_db = 0 WHERE role_id = ".intval($role_id));
		}

	}

	public function load_role_by_user($session_id){
		$sql = $this->db->query("SELECT * FROM public.beone_user WHERE user_id=".intval($session_id));
		if($sql->num_rows() > 0)
			return $sql->row_array();
		return false;
	}

	public function load_security($role_id){
		$sql = $this->db->query("SELECT * FROM public.beone_role WHERE role_id=".intval($role_id));
		if($sql->num_rows() > 0)
			return $sql->row_array();
		return false;
	}

	public function delete_role($role_id){
		$sql = $this->db->query("DELETE FROM public.beone_role WHERE role_id = ".intval($role_id));
	}


}
?>
