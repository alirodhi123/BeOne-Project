<?php
//Model_data.php
defined('BASEPATH') OR exit('No direct script access allowed');

Class Item_model extends CI_Model{

	public function simpan($post){
		$nama = $this->db->escape($post['nama_item']);
		$tipe = $this->db->escape($post['item_type']);
		$code = $this->db->escape($post['item_code']);
		$hscode = $this->db->escape($post['hscode']);
		$satuan = $this->db->escape($post['satuan']);
		$saldo_qty_ = $this->db->escape($post['saldo_qty']);
		$saldo_idr_ = $this->db->escape($post['saldo_idr']);
		$keterangan = $this->db->escape($post['keterangan']);
		$update_date = date('Y-m-d');

		$saldo_qty_ex = str_replace(".", "", $saldo_qty_);
		$saldo_qty_round = str_replace(",", ".", $saldo_qty_ex);
		$saldo_qty = round($saldo_qty_round, 2);

		$saldo_idr_ex = str_replace(".", "", $saldo_idr_);
		$saldo_idr_round = str_replace(",", ".", $saldo_idr_ex);
		$saldo_idr = round($saldo_idr_round, 2);

		$sql = $this->db->query("INSERT INTO public.beone_item(item_id, nama, item_code, saldo_qty, saldo_idr, keterangan, flag, item_type_id, hscode, satuan_id) VALUES (DEFAULT, $nama, $code, $saldo_qty, $saldo_idr, $keterangan, 1, $tipe, $hscode, $satuan)");

		if($sql)
			return true;
		return false;
	}

	public function update($post, $item_id){
		$nama = $this->db->escape($post['nama_item']);
		$tipe = $this->db->escape($post['item_type']);
		$code = $this->db->escape($post['item_code']);
		$hscode = $this->db->escape($post['hscode']);
		$satuan = $this->db->escape($post['satuan']);
		$saldo_qty_ = $this->db->escape($post['saldo_qty']);
		$saldo_idr_ = $this->db->escape($post['saldo_idr']);
		$keterangan = $this->db->escape($post['keterangan']);
		$update_date = date('Y-m-d');

		$saldo_qty_ex = str_replace(".", "", $saldo_qty_);
		$saldo_qty_round = str_replace(",", ".", $saldo_qty_ex);
		$saldo_qty = round($saldo_qty_round, 2);

		$saldo_idr_ex = str_replace(".", "", $saldo_idr_);
		$saldo_idr_round = str_replace(",", ".", $saldo_idr_ex);
		$saldo_idr = round($saldo_idr_round, 2);

		$sql = $this->db->query("UPDATE public.beone_item SET nama=$nama, item_code=$code, saldo_qty=$saldo_qty, saldo_idr=$saldo_idr, keterangan=$keterangan, item_type_id=$tipe , hscode=$hscode, satuan_id = $satuan WHERE item_id=".intval($item_id));

		if($sql)
			return true;
		return false;
	}

	public function delete($item_id){
		$sql = $this->db->query("UPDATE public.beone_item SET flag=0 WHERE item_id =".intval($item_id));
	}


	public function simpan_satuan($post){
		$satuan_code = $this->db->escape($post['satuan_code']);
		$keterangan = $this->db->escape($post['keterangan']);

		$sql = $this->db->query("INSERT INTO public.beone_satuan_item (satuan_id, satuan_code, keterangan, flag) VALUES (DEFAULT, $satuan_code, $keterangan, 1);");

		if($sql)
			return true;
		return false;
	}

	public function update_satuan($post, $satuan_id){
		$satuan_code = $this->db->escape($post['satuan_code']);
		$keterangan = $this->db->escape($post['keterangan']);

		$sql = $this->db->query("UPDATE public.beone_satuan_item SET satuan_code=$satuan_code, keterangan=$keterangan WHERE satuan_id = ".intval($satuan_id));

		if($sql)
			return true;
		return false;
	}

	public function delete_satuan($satuan_id){
		$sql = $this->db->query("UPDATE public.beone_satuan_item SET flag=0 WHERE satuan_id =".intval($satuan_id));
	}

	public function simpan_item_type($post){
		$nama = $this->db->escape($post['nama_tipe']);
		$keterangan = $this->db->escape($post['keterangan']);

		$sql = $this->db->query("INSERT INTO public.beone_item_type(item_type_id, nama, keterangan, flag) VALUES (DEFAULT, $nama, $keterangan, 1)");

		if($sql)
			return true;
		return false;
	}

	public function update_item_type($post, $item_type_id){
		$nama = $this->db->escape($post['nama_tipe']);
		$keterangan = $this->db->escape($post['keterangan']);

		$sql = $this->db->query("UPDATE public.beone_item_type SET nama=$nama, keterangan=$keterangan WHERE item_type_id = ".intval($item_type_id));

		if($sql)
			return true;
		return false;
	}

	public function delete_item_type($item_type_id){
		$sql = $this->db->query("UPDATE public.beone_item_type SET flag=0 WHERE item_type_id =".intval($item_type_id));
	}

	public function get_default($item_id){
		$sql = $this->db->query("SELECT i.item_id, i.nama, i.item_code, i.saldo_qty, i.saldo_idr, i.Keterangan, i.flag, i.item_type_id, i.hscode, t.nama as ntipe, i.satuan_id, s.satuan_code FROM public.beone_item i INNER JOIN public.beone_item_type t ON i.item_type_id = t.item_type_id INNER JOIN public.beone_satuan_item s ON s.satuan_id = i.satuan_id WHERE i.item_id = ".intval($item_id));
		if($sql->num_rows() > 0)
			return $sql->row_array();
		return false;
	}

	public function load_item(){
		$sql = $this->db->query("SELECT i.item_id, i.nama, i.item_code, i.saldo_qty, i.saldo_idr, i.Keterangan, i.hscode, i.flag, i.item_type_id, t.nama as ntipe, s.satuan_code as nsatuan
															FROM public.beone_item i INNER JOIN public.beone_item_type t ON i.item_type_id = t.item_type_id INNER JOIN public.beone_satuan_item s ON s.satuan_id = i.satuan_id
															WHERE i.flag=1 ORDER BY i.item_id ASC");
		return $sql->result_array();
	}

	public function load_satuan(){
		$sql = $this->db->query("SELECT * FROM public.beone_satuan_item WHERE flag = 1");
		return $sql->result_array();
	}

	public function get_default_satuan($satuan_id){
		$sql = $this->db->query("SELECT * FROM public.beone_satuan_item WHERE satuan_id = ".intval($satuan_id));
		if($sql->num_rows() > 0)
			return $sql->row_array();
		return false;
	}

	public function get_default_item_type($item_type_id){
		$sql = $this->db->query("SELECT * FROM public.beone_item_type WHERE item_type_id = ".intval($item_type_id));
		if($sql->num_rows() > 0)
			return $sql->row_array();
		return false;
	}

	public function load_item_type(){
		$sql = $this->db->query("SELECT * FROM public.beone_item_type WHERE flag=1 ORDER BY item_type_id ASC");
		return $sql->result_array();
	}

}
?>
