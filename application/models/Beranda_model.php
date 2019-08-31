<?php
//Model_data.php
defined('BASEPATH') OR exit('No direct script access allowed');

Class Beranda_model extends CI_Model{

	public function load_user(){
		$sql = $this->db->query("SELECT * FROM beone_user");
		return $sql->result_array();
	}

}
?>
