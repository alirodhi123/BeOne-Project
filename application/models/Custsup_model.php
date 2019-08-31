<?php
defined('BASEPATH') OR exit('No direct script access allowed');

Class Custsup_model extends CI_Model{

	public function simpan($post){
		$nama = $this->db->escape($post['nama']);
		$tipe = $post['tipe_custsup'];
		$alamat = $this->db->escape($post['alamat']);
		$negara = $this->db->escape($post['negara']);
		$saldo_idr_ = $this->db->escape($post['saldo_idr']);
		$saldo_valas_ = $this->db->escape($post['saldo_valas']);
		$update_date = date('Y-m-d');

		$saldo_idr_ex = str_replace(".", "", $saldo_idr_);
		$saldo_idr = str_replace(",", ".", $saldo_idr_ex);

		$saldo_valas_ex = str_replace(".", "", $saldo_valas_);
		$saldo_valas = str_replace(",", ".", $saldo_valas_ex);

		if ($tipe == 1){
				$sql = $this->db->query("INSERT INTO public.beone_custsup(custsup_id, nama, alamat, tipe_custsup, negara, saldo_hutang_idr, saldo_hutang_valas, saldo_piutang_idr, saldo_piutang_valas, flag)	VALUES (DEFAULT, $nama, $alamat, $tipe, $negara, $saldo_idr, $saldo_valas, 0, 0, 1)");
		}else{
				$sql = $this->db->query("INSERT INTO public.beone_custsup(custsup_id, nama, alamat, tipe_custsup, negara, saldo_hutang_idr, saldo_hutang_valas, saldo_piutang_idr, saldo_piutang_valas, flag)	VALUES (DEFAULT, $nama, $alamat, $tipe, $negara, 0, 0, $saldo_idr, $saldo_valas, 1)");
		}

		if($sql)
			return true;
		return false;
	}


	public function update($post, $custsup_id){
		$nama = $this->db->escape($post['nama']);
		$tipe = $post['tipe_custsup'];
		$alamat = $this->db->escape($post['alamat']);
		$negara = $this->db->escape($post['negara']);
		$saldo_idr_ = $this->db->escape($post['saldo_idr']);
		$saldo_valas_ = $this->db->escape($post['saldo_valas']);
		$update_date = date('Y-m-d');

		$saldo_idr_ex = str_replace(".", "", $saldo_idr_);
		$saldo_idr = str_replace(",", ".", $saldo_idr_ex);

		$saldo_valas_ex = str_replace(".", "", $saldo_valas_);
		$saldo_valas = str_replace(",", ".", $saldo_valas_ex);


		if ($tipe == 1){
				$sql = $this->db->query("UPDATE public.beone_custsup SET nama=$nama, alamat=$alamat, negara=$negara, saldo_hutang_idr=$saldo_idr, saldo_hutang_valas=$saldo_valas WHERE custsup_id = ".intval($custsup_id));
		}else{
				$sql = $this->db->query("UPDATE public.beone_custsup SET nama=$nama, alamat=$alamat, negara=$negara, saldo_piutang_idr=$saldo_idr, saldo_piutang_valas=$saldo_valas WHERE custsup_id = ".intval($custsup_id));
		}

		if($sql)
			return true;
		return false;
	}

	public function delete($custsup_id){
		$sql = $this->db->query("UPDATE public.beone_custsup SET flag=0 WHERE custsup_id =".intval($custsup_id));
	}

	public function get_default($custsup_id){
		$sql = $this->db->query("SELECT * FROM public.beone_custsup WHERE custsup_id = ".intval($custsup_id));
		if($sql->num_rows() > 0)
			return $sql->row_array();
		return false;
	}

	public function load_custsup(){
		$sql = $this->db->query("SELECT * FROM public.beone_custsup");
		return $sql->result_array();
	}

	public function load_supplier(){
		$sql = $this->db->query("SELECT * FROM public.beone_custsup WHERE tipe_custsup = 1 AND flag = 1 ORDER BY nama ASC");
		return $sql->result_array();
	}

	public function load_receiver(){
		$sql = $this->db->query("SELECT * FROM public.beone_custsup WHERE tipe_custsup = 2 AND flag = 1 ORDER BY nama ASC");
		return $sql->result_array();
	}

	public function load_country(){
		$sql = $this->db->query("SELECT * FROM public.beone_country WHERE flag = 1");
		return $sql->result_array();
	}


}
?>
