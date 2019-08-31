<?php
//Model_data.php
defined('BASEPATH') OR exit('No direct script access allowed');

Class Export_model extends CI_Model{

	public function simpan($post){
		$bc_tanggal = $this->db->escape($post['bc_tanggal']);
		$invoice_tanggal = $this->db->escape($post['invoice_tanggal']);
		$kontrak_tanggal = $this->db->escape($post['kontrak_tanggal']);
		$surat_jalan_tanggal = $this->db->escape($post['surat_jalan_tanggal']);

		$tgl_bulan = substr($bc_tanggal, 1, 2);
		$tgl_hari = substr($bc_tanggal, 4, 2);
		$tgl_tahun = substr($bc_tanggal, 7, 4);

		$tgl_bulan_i = substr($invoice_tanggal, 1, 2);
		$tgl_hari_i = substr($invoice_tanggal, 4, 2);
		$tgl_tahun_i = substr($invoice_tanggal, 7, 4);

		$tgl_bulan_k = substr($kontrak_tanggal, 1, 2);
		$tgl_hari_k = substr($kontrak_tanggal, 4, 2);
		$tgl_tahun_k = substr($kontrak_tanggal, 7, 4);

		$tgl_bulan_sj = substr($surat_jalan_tanggal, 1, 2);
		$tgl_hari_sj = substr($surat_jalan_tanggal, 4, 2);
		$tgl_tahun_sj = substr($surat_jalan_tanggal, 7, 4);

		$tanggal_bc = $tgl_tahun."-".$tgl_bulan."-".$tgl_hari;
		$tanggal_invoice = $tgl_tahun_i."-".$tgl_bulan_i."-".$tgl_hari_i;
		$tanggal_kontrak = $tgl_tahun_k."-".$tgl_bulan_k."-".$tgl_hari_k;
		$tanggal_surat_jalan = $tgl_tahun_sj."-".$tgl_bulan_sj."-".$tgl_hari_sj;

		$bc_car = $this->db->escape($post['bc_car']);
		$bc_nomor = $this->db->escape($post['bc_nomor']);
		$jenis_bc = $this->db->escape($post['jenis_bc']);
		$invoice_no = $this->db->escape($post['invoice_no']);
		$surat_jalan_no = $this->db->escape($post['surat_jalan_no']);
		$kontrak_no = $this->db->escape($post['kontrak_no']);
		$jenis_ekspor = $this->db->escape($post['jenis_ekspor']);
		$amount_ = $this->db->escape($post['amount']);
		$receiver = $this->db->escape($post['receiver']);
		$country = $this->db->escape($post['country']);
		$kode_valas = $this->db->escape($post['kode_valas']);
		$valuta_ = $this->db->escape($post['valuta']);
		$price_type = $this->db->escape($post['price_type']);
		$insurace_type = $this->db->escape($post['insurace_type']);
		$insurance_value_ = $this->db->escape($post['insurance_value']);
		$freight_ = $this->db->escape($post['freight']);



		$amount_ex = str_replace(".", "", $amount_);
		$amount = str_replace(",", ".", $amount_ex);

		$valuta_ex = str_replace(".", "", $valuta_);
		$valuta = str_replace(",", ".", $valuta_ex);

		$insurance_value_ex = str_replace(".", "", $insurance_value_);
		$insurance_value = str_replace(",", ".", $insurance_value_ex);

		$freight_ex = str_replace(".", "", $freight_);
		$freight = str_replace(",", ".", $freight_ex);

		$update_date = date('Y-m-d');

		//insert table import header
		$sql = $this->db->query("INSERT INTO public.beone_export_header VALUES (DEFAULT, $jenis_bc, $bc_car, $bc_nomor, '$tanggal_bc', $kontrak_no, '$tanggal_kontrak', $jenis_ekspor, $invoice_no, '$tanggal_invoice', $surat_jalan_no, '$tanggal_surat_jalan', $receiver, $country, $price_type , $amount, $valuta, $insurace_type, $insurance_value, $freight, 1, 0, NULL, 1, '$update_date')");


		if($sql)
			return true;
		return false;
	}


	public function simpan_detail($post, $export_header_id){

		$item_id = $this->db->escape($post['item_id']);
		$hscode = $this->db->escape($post['hscode']);
		$qty_ = $this->db->escape($post['qty']);
		$satuan_id = $this->db->escape($post['satuan_id']);
		$price_ = $this->db->escape($post['price']);
		$netto_ = $this->db->escape($post['netto']);
		$brutto_ = $this->db->escape($post['brutto']);
		$volume_ = $this->db->escape($post['volume']);
		$qty_pack_ = $this->db->escape($post['qty_pack']);
		$satuan_pack = $this->db->escape($post['satuan_pack']);
		$country_id = $this->db->escape($post['country_id']);



		$qty_ex = str_replace(".", "", $qty_);
		$qty = str_replace(",", ".", $qty_ex);

		$price_ex = str_replace(".", "", $price_);
		$price = str_replace(",", ".", $price_ex);

		$netto_ex = str_replace(".", "", $netto_);
		$netto = str_replace(",", ".", $netto_ex);

		$brutto_ex = str_replace(".", "", $brutto_);
		$brutto = str_replace(",", ".", $brutto_ex);

		$volume_ex = str_replace(".", "", $volume_);
		$volume = str_replace(",", ".", $volume_ex);

		$qty_pack_ex = str_replace(".", "", $qty_pack_);
		$qty_pack = str_replace(",", ".", $qty_pack_ex);

		$update_date = date('Y/m/d');

		$exph_id = intval($export_header_id);
		echo $exph_id;
		//insert table export detail
		$sql = $this->db->query("INSERT INTO public.beone_export_detail VALUES (DEFAULT, $exph_id, $item_id, $qty, $satuan_id, $price, $qty_pack, $satuan_pack, $country_id, $hscode, $volume, $netto, $brutto, 1)");

		if($sql)
			return true;
		return false;
	}


	public function update($post, $export_header_id){

		$bc_tanggal = $this->db->escape($post['bc_tanggal']);
		$invoice_tanggal = $this->db->escape($post['invoice_tanggal']);
		$kontrak_tanggal = $this->db->escape($post['kontrak_tanggal']);
		$surat_jalan_tanggal = $this->db->escape($post['surat_jalan_tanggal']);

		$tgl_bulan = substr($bc_tanggal, 1, 2);
		$tgl_hari = substr($bc_tanggal, 4, 2);
		$tgl_tahun = substr($bc_tanggal, 7, 4);

		$tgl_bulan_i = substr($invoice_tanggal, 1, 2);
		$tgl_hari_i = substr($invoice_tanggal, 4, 2);
		$tgl_tahun_i = substr($invoice_tanggal, 7, 4);

		$tgl_bulan_k = substr($kontrak_tanggal, 1, 2);
		$tgl_hari_k = substr($kontrak_tanggal, 4, 2);
		$tgl_tahun_k = substr($kontrak_tanggal, 7, 4);

		$tgl_bulan_sj = substr($surat_jalan_tanggal, 1, 2);
		$tgl_hari_sj = substr($surat_jalan_tanggal, 4, 2);
		$tgl_tahun_sj = substr($surat_jalan_tanggal, 7, 4);

		$tanggal_bc = $tgl_tahun."-".$tgl_bulan."-".$tgl_hari;
		$tanggal_invoice = $tgl_tahun_i."-".$tgl_bulan_i."-".$tgl_hari_i;
		$tanggal_kontrak = $tgl_tahun_k."-".$tgl_bulan_k."-".$tgl_hari_k;
		$tanggal_surat_jalan = $tgl_tahun_sj."-".$tgl_bulan_sj."-".$tgl_hari_sj;

		$bc_car = $this->db->escape($post['bc_car']);
		$bc_nomor = $this->db->escape($post['bc_nomor']);
		$jenis_bc = $this->db->escape($post['jenis_bc']);
		$invoice_no = $this->db->escape($post['invoice_no']);
		$surat_jalan_no = $this->db->escape($post['surat_jalan_no']);
		$kontrak_no = $this->db->escape($post['kontrak_no']);
		$jenis_ekspor = $this->db->escape($post['jenis_ekspor']);
		$amount_ = $this->db->escape($post['amount']);
		$receiver = $this->db->escape($post['receiver']);
		$country = $this->db->escape($post['country']);
		$kode_valas = $this->db->escape($post['kode_valas']);
		$valuta_ = $this->db->escape($post['valuta']);
		$price_type = $this->db->escape($post['price_type']);
		$insurace_type = $this->db->escape($post['insurace_type']);
		$insurance_value_ = $this->db->escape($post['insurance_value']);
		$freight_ = $this->db->escape($post['freight']);



		$amount_ex = str_replace(".", "", $amount_);
		$amount = str_replace(",", ".", $amount_ex);

		$valuta_ex = str_replace(".", "", $valuta_);
		$valuta = str_replace(",", ".", $valuta_ex);

		$insurance_value_ex = str_replace(".", "", $insurance_value_);
		$insurance_value = str_replace(",", ".", $insurance_value_ex);

		$freight_ex = str_replace(".", "", $freight_);
		$freight = str_replace(",", ".", $freight_ex);

		$update_date = date('Y/m/d');

		$exph_id = intval($export_header_id);

		//insert table export detail
		$sql = $this->db->query("UPDATE public.beone_export_header SET export_header_id=$exph_id, jenis_bc=$jenis_bc, car_no=$bc_car, bc_no=$bc_nomor, bc_date='$tanggal_bc', kontrak_no=$kontrak_no, kontrak_date='$tanggal_kontrak', jenis_export=$jenis_ekspor, invoice_no=$invoice_no, invoice_date='$tanggal_invoice', surat_jalan_no=$surat_jalan_no, surat_jalan_date='$tanggal_surat_jalan', receiver_id=$receiver, country_id=$country, price_type=$price_type, amount_value=$amount, valas_value=$valuta, insurance_type=$insurace_type, insurance_value=$insurance_value ,freight= $freight, update_by=1, update_date='$update_date' WHERE export_header_id = $exph_id");

		if($sql)
			return true;
		return false;
	}


	public function update_detail($post, $export_detail_id){

		$item_id = $this->db->escape($post['item_id']);
		$hscode = $this->db->escape($post['hscode']);
		$qty_ = $this->db->escape($post['qty']);
		$satuan_id = $this->db->escape($post['satuan_id']);
		$price_ = $this->db->escape($post['price']);
		$netto_ = $this->db->escape($post['netto']);
		$brutto_ = $this->db->escape($post['brutto']);
		$volume_ = $this->db->escape($post['volume']);
		$qty_pack_ = $this->db->escape($post['qty_pack']);
		$satuan_pack = $this->db->escape($post['satuan_pack']);
		$country_id = $this->db->escape($post['country_id']);


		$qty_ex = str_replace(".", "", $qty_);
		$qty = str_replace(",", ".", $qty_ex);

		$price_ex = str_replace(".", "", $price_);
		$price = str_replace(",", ".", $price_ex);

		$netto_ex = str_replace(".", "", $netto_);
		$netto = str_replace(",", ".", $netto_ex);

		$brutto_ex = str_replace(".", "", $brutto_);
		$brutto = str_replace(",", ".", $brutto_ex);

		$volume_ex = str_replace(".", "", $volume_);
		$volume = str_replace(",", ".", $volume_ex);

		$qty_pack_ex = str_replace(".", "", $qty_pack_);
		$qty_pack = str_replace(",", ".", $qty_pack_ex);

		$update_date = date('Y/m/d');

		$exph_id = intval($export_detail_id);

		//insert table export detail
		//$sql = $this->db->query("INSERT INTO public.beone_export_detail VALUES (DEFAULT, '$exph_id', $item_id, $qty, $satuan_id, $price, $qty_pack, $satuan_pack, $country_id, $hscode, $volume, $netto, $brutto, 1)");

		$sql = $this->db->query("UPDATE public.beone_export_detail SET item_id=$item_id, qty=$qty, satuan_qty=$satuan_id, price=$price, pack_qty=$qty_pack, satuan_pack=$satuan_pack, origin_country=$country_id, hscode=$hscode, volume=$volume, netto=$netto, brutto=$brutto WHERE export_detail_id=$exph_id");
		if($sql)
			return true;
		return false;
	}

	public function load_export_header(){
		$sql = $this->db->query("SELECT h.export_header_id, h.status, h.jenis_bc, s.nama, s.custsup_id, h.invoice_no, h.invoice_date, h.surat_jalan_no, h.surat_jalan_date, h.jenis_export FROM public.beone_export_header h INNER JOIN public.beone_custsup s ON h.receiver_id = s.custsup_id WHERE h.flag = 1 AND h.status = 0 ORDER BY h.export_header_id DESC");
		return $sql->result_array();
	}

	public function load_export_list_header(){
		$sql = $this->db->query("SELECT h.export_header_id, h.status, h.jenis_bc, s.nama, s.custsup_id, h.invoice_no, h.invoice_date, h.surat_jalan_no, h.surat_jalan_date, h.jenis_export FROM public.beone_export_header h INNER JOIN public.beone_custsup s ON h.receiver_id = s.custsup_id WHERE h.flag = 1 ORDER BY h.export_header_id DESC");
		return $sql->result_array();
	}

	public function load_export_header_detail($export_header_id){
		$sql = $this->db->query("SELECT h.export_header_id, h.jenis_bc, h.car_no, h.bc_no, h.bc_date, h.kontrak_no, h.kontrak_date, h.jenis_export, h.invoice_no, h.invoice_date, h.surat_jalan_no, h.surat_jalan_date, h.receiver_id, c.nama as nreceiver,h.country_id, h.price_type, h.amount_value, h.valas_value, h.insurance_type, h.insurance_value, h.freight, h.flag, h.status, h.delivery_date, h.update_by, h.update_date, h.delivery_no
														FROM public.beone_export_header h INNER JOIN public.beone_custsup c ON h.receiver_id = c.custsup_id WHERE h.export_header_id = ".intval($export_header_id));
		return $sql->result_array();
	}

	public function load_export_detail($export_header_id){
		$sql = $this->db->query("SELECT d.export_detail_id, d.export_header_id, i.nama, i.item_code, d.qty, d.price, d.hscode, d.netto, d.brutto FROM public.beone_export_detail d INNER JOIN public.beone_item i ON d.item_id = i.item_id WHERE d.flag = 1 AND d.export_header_id=".intval($export_header_id));
		return $sql->result_array();
	}

	public function load_export_hanya_detail($export_detail_id){
		$sql = $this->db->query("SELECT * FROM public.beone_export_detail WHERE flag=1 AND export_detail_id=".intval($export_detail_id));
		return $sql->result_array();
	}


	public function delete_header($export_header_id){
		$sql = $this->db->query("UPDATE public.beone_export_header SET flag=0 WHERE export_header_id = ".intval($export_header_id));
		$sql2 = $this->db->query("UPDATE public.beone_export_detail SET flag=0 WHERE export_header_id = ".intval($export_header_id));
		return true;
	}

	public function delete_detail($export_detail_id){
		$sql = $this->db->query("UPDATE public.beone_export_detail SET flag=0 WHERE export_detail_id = ".intval($export_detail_id));
		return true;
	}


	public function get_default($export_header_id){
		$sql = $this->db->query("SELECT * FROM public.beone_export_header WHERE export_header_id = ".intval($export_header_id));
		if($sql->num_rows() > 0)
			return $sql->row_array();
		return false;
	}

	public function get_default_detail($export_detail_id){
		$sql = $this->db->query("SELECT * FROM public.beone_export_detail WHERE export_detail_id = ".intval($export_detail_id));
		if($sql->num_rows() > 0)
			return $sql->row_array();
		return false;
	}

	public function load_export_header_deliverd(){
		$sql = $this->db->query("SELECT h.export_header_id, h.status, h.jenis_bc, h.car_no, h.bc_no, h.bc_date, s.nama, s.custsup_id, h.invoice_no, h.invoice_date
															FROM public.beone_export_header h INNER JOIN public.beone_custsup s ON h.receiver_id = s.custsup_id
															WHERE h.flag = 1 AND h.status=0");
		return $sql->result_array();
	}

}
?>
