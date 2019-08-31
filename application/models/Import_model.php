<?php
//Model_data.php
defined('BASEPATH') OR exit('No direct script access allowed');

Class Import_model extends CI_Model{

	public function simpan($post){
		$bc_tanggal = $this->db->escape($post['bc_tanggal']);
		$invoice_tanggal = $this->db->escape($post['invoice_tanggal']);
		$kontrak_tanggal = $this->db->escape($post['kontrak_tanggal']);

		$tgl_bulan = substr($bc_tanggal, 1, 2);
		$tgl_hari = substr($bc_tanggal, 4, 2);
		$tgl_tahun = substr($bc_tanggal, 7, 4);

		$tgl_bulan_i = substr($invoice_tanggal, 1, 2);
		$tgl_hari_i = substr($invoice_tanggal, 4, 2);
		$tgl_tahun_i = substr($invoice_tanggal, 7, 4);

		$tgl_bulan_k = substr($kontrak_tanggal, 1, 2);
		$tgl_hari_k = substr($kontrak_tanggal, 4, 2);
		$tgl_tahun_k = substr($kontrak_tanggal, 7, 4);

		$tanggal_bc = $tgl_tahun."-".$tgl_bulan."-".$tgl_hari;
		$tanggal_invoice = $tgl_tahun_i."-".$tgl_bulan_i."-".$tgl_hari_i;
		$tanggal_kontrak = $tgl_tahun_k."-".$tgl_bulan_k."-".$tgl_hari_k;

		$bc_car = $this->db->escape($post['bc_car']);
		$bc_nomor = $this->db->escape($post['bc_nomor']);
		$jenis_bc = $this->db->escape($post['jenis_bc']);
		$invoice_no = $this->db->escape($post['invoice_no']);
		$kontrak_no = $this->db->escape($post['kontrak_no']);
		$purpose = $this->db->escape($post['purpose']);
		$amount_ = $this->db->escape($post['amount']);
		$supplier = $this->db->escape($post['supplier']);
		$kode_valas = $this->db->escape($post['kode_valas']);
		$valuta_ = $this->db->escape($post['valuta']);
		$price_type = $this->db->escape($post['price_type']);
		$insurace_type = $this->db->escape($post['insurace_type']);
		$insurance_value_ = $this->db->escape($post['insurance_value']);
		$value_added_ = $this->db->escape($post['value_added']);
		$from = $this->db->escape($post['from']);
		$freight_ = $this->db->escape($post['freight']);
		$discount_ = $this->db->escape($post['discount']);



		$amount_h = str_replace(".", "", $amount_);
		$amount = str_replace(",", ".", $amount_h);

		$valuta_h = str_replace(".", "", $valuta_);
		$valuta = str_replace(",", ".", $valuta_h);

		$insurance_value_h = str_replace(".", "", $insurance_value_);
		$insurance_value = str_replace(",", ".", $insurance_value_h);

		$value_added_h = str_replace(".", "", $value_added_);
		$value_added = str_replace(",", ".", $value_added_h);

		$discount_h = str_replace(".", "", $discount_);
		$discount = str_replace(",", ".", $discount_h);

		$freight_h = str_replace(".", "", $freight_);
		$freight = str_replace(",", ".", $freight_h);

		$update_date = date('Y-m-d');

		/*$sql_coa_no = $this->db->query("SELECT * FROM public.beone_coa WHERE coa_id = $coa_cb");
		$hasil_coa_no = $sql_coa_no->row_array();
		$coa_no = $hasil_coa_no['nomor'];

		$sql_coa_lawan_no = $this->db->query("SELECT * FROM public.beone_coa WHERE coa_id = $coa_lawan");
		$hasil_coa_lawan_no = $sql_coa_lawan_no->row_array();
		$coa_no_lawan = $hasil_coa_lawan_no['nomor'];*/

		//insert table import header
		$sql = $this->db->query("INSERT INTO public.beone_import_header VALUES (DEFAULT, $jenis_bc, $bc_car, $bc_nomor, '$tanggal_bc', $invoice_no, '$tanggal_invoice', $kontrak_no, '$tanggal_kontrak', $purpose, $supplier, $price_type, $from, $amount, $valuta , $value_added, $discount, $insurace_type, $insurance_value, $freight, 1, 1,'$update_date', 0)");

		//******************** GENERATE NO JOURNAL ********************

		/*$tgl = date('m/d/Y');
		$thn = substr($tgl,8,2);
		$bln = substr($tgl,0,2);


		$kode_awal = "BGJ"."-".$thn."-".$bln."-";

		$sql_jnumb = $this->db->query("SELECT * FROM public.beone_gl WHERE gl_number LIKE '$kode_awal%' ORDER BY gl_number DESC LIMIT 1");
		$hasil_jnumb = $sql_jnumb->row_array();

		$urutan = substr($hasil_jnumb['gl_number'],10,4);
		$no_lanjutan = $urutan+1;

		$digit = strlen($no_lanjutan);
		$jml_nol = 4-$digit;

		$cetak_nol = "";

		for ($i = 1; $i <= $jml_nol; $i++) {
		    $cetak_nol = $cetak_nol."0";
		}

		$no_journal = $kode_awal.$cetak_nol.$no_lanjutan;
		*/
		//*******************************************************

		//menambahkn nomor voucher untuk keterangan apabila journal dari voucher
		/*$ket_voucher = $post['keterangan_voucher']." (".$post['nomor_voucher'].")";

		if ($post['tipe_voucher'] == 1){
			//insert akun ke general ledger (buku besar)
			$sql = $this->db->query("INSERT INTO public.beone_gl VALUES (DEFAULT, '$tanggal', $coa_cb, '$coa_no', $coa_lawan, '$coa_no_lawan', '$ket_voucher', $idr ,0, $voucher, '$no_journal' ,1, '$update_date')");

			//insert lawan akun ke general ledger (buku besar)
			$sql = $this->db->query("INSERT INTO public.beone_gl VALUES (DEFAULT, '$tanggal', $coa_lawan, '$coa_no_lawan', $coa_cb, '$coa_no', '$ket_voucher', 0 ,$idr, $voucher, '$no_journal' ,1, '$update_date')");
		}else{
			//insert akun ke general ledger (buku besar)
			$sql = $this->db->query("INSERT INTO public.beone_gl VALUES (DEFAULT, '$tanggal', $coa_cb, '$coa_no', $coa_lawan, '$coa_no_lawan', '$ket_voucher', 0 ,$idr, $voucher, '$no_journal' ,1, '$update_date')");

			//insert lawan akun ke general ledger (buku besar)
			$sql = $this->db->query("INSERT INTO public.beone_gl VALUES (DEFAULT, '$tanggal', $coa_lawan, '$coa_no_lawan', $coa_cb, '$coa_no', '$ket_voucher', $idr ,0, $voucher, '$no_journal' ,1, '$update_date')");
		}*/


		if($sql)
			return true;
		return false;
	}


	public function update($post, $import_header_id){
		$bc_tanggal = $this->db->escape($post['bc_tanggal']);
		$invoice_tanggal = $this->db->escape($post['invoice_tanggal']);
		$kontrak_tanggal = $this->db->escape($post['kontrak_tanggal']);

		$tgl_bulan = substr($bc_tanggal, 1, 2);
		$tgl_hari = substr($bc_tanggal, 4, 2);
		$tgl_tahun = substr($bc_tanggal, 7, 4);

		$tgl_bulan_i = substr($invoice_tanggal, 1, 2);
		$tgl_hari_i = substr($invoice_tanggal, 4, 2);
		$tgl_tahun_i = substr($invoice_tanggal, 7, 4);

		$tgl_bulan_k = substr($kontrak_tanggal, 1, 2);
		$tgl_hari_k = substr($kontrak_tanggal, 4, 2);
		$tgl_tahun_k = substr($kontrak_tanggal, 7, 4);

		$tanggal_bc = $tgl_tahun."-".$tgl_bulan."-".$tgl_hari;
		$tanggal_invoice = $tgl_tahun_i."-".$tgl_bulan_i."-".$tgl_hari_i;
		$tanggal_kontrak = $tgl_tahun_k."-".$tgl_bulan_k."-".$tgl_hari_k;

		$bc_car = $this->db->escape($post['bc_car']);
		$bc_nomor = $this->db->escape($post['bc_nomor']);
		$jenis_bc = $this->db->escape($post['jenis_bc']);
		$invoice_no = $this->db->escape($post['invoice_no']);
		$kontrak_no = $this->db->escape($post['kontrak_no']);
		$purpose = $this->db->escape($post['purpose']);
		$amount_ = $this->db->escape($post['amount']);
		$supplier = $this->db->escape($post['supplier']);
		$kode_valas = $this->db->escape($post['kode_valas']);
		$valuta_ = $this->db->escape($post['valuta']);
		$price_type = $this->db->escape($post['price_type']);
		$insurace_type = $this->db->escape($post['insurace_type']);
		$insurance_value_ = $this->db->escape($post['insurance_value']);
		$value_added_ = $this->db->escape($post['value_added']);
		$from = $this->db->escape($post['from']);
		$freight_ = $this->db->escape($post['freight']);
		$discount_ = $this->db->escape($post['discount']);



		$amount_h = str_replace(".", "", $amount_);
		$amount = str_replace(",", ".", $amount_h);

		$valuta_h = str_replace(".", "", $valuta_);
		$valuta = str_replace(",", ".", $valuta_h);

		$insurance_value_h = str_replace(".", "", $insurance_value_);
		$insurance_value = str_replace(",", ".", $insurance_value_h);

		$value_added_h = str_replace(".", "", $value_added_);
		$value_added = str_replace(",", ".", $value_added_h);

		$discount_h = str_replace(".", "", $discount_);
		$discount = str_replace(",", ".", $discount_h);

		$freight_h = str_replace(".", "", $freight_);
		$freight = str_replace(",", ".", $freight_h);

		$update_date = date('Y-m-d');

		$imph_id = intval($import_header_id);

		//insert table import header
		$sql = $this->db->query("UPDATE public.beone_import_header SET jenis_bc=$jenis_bc, car_no=$bc_car, bc_no=$bc_nomor, bc_date='$tanggal_bc', invoice_no=$invoice_no, invoice_date='$tanggal_invoice', kontrak_no=$kontrak_no, kontrak_date='$tanggal_kontrak', purpose_id=$purpose, supplier_id=$supplier, price_type=$price_type, amount_value=$amount, valas_value=$valuta, value_added=$value_added, discount=$discount, insurance_type=$insurace_type, insurace_value=$insurance_value, freight=$freight, update_by=1, update_date='$update_date' WHERE import_header_id = $imph_id");

		if($sql)
			return true;
		return false;
	}


	public function simpan_detail($post, $import_header_id){

		$item_type_id = $this->db->escape($post['item_type_id']);
		$item_id = $this->db->escape($post['item_id']);
		$hscode = $this->db->escape($post['hscode']);
		$qty_ = $this->db->escape($post['qty']);
		$satuan_id = $this->db->escape($post['satuan_id']);
		$price_ = $this->db->escape($post['price']);
		$tbm_ = $this->db->escape($post['tbm']);
		$ppnn_ = $this->db->escape($post['ppnn']);
		$tpbm_ = $this->db->escape($post['tpbm']);
		$qty_pack_ = $this->db->escape($post['qty_pack']);
		$satuan_pack = $this->db->escape($post['satuan_pack']);
		$country_id = $this->db->escape($post['country_id']);
		$cukai = $this->db->escape($post['cukai']);
		$value_added_ = $this->db->escape($post['value_added']);
		$satuan_cukai = $this->db->escape($post['satuan_cukai']);
		$netto_ = $this->db->escape($post['netto']);
		$brutto_ = $this->db->escape($post['brutto']);
		$volume_ = $this->db->escape($post['volume']);
		$cukai_value_ = $this->db->escape($post['cukai_value']);
		$bea_masuk = $this->db->escape($post['bea_masuk']);
		$satuan_bea_masuk = $this->db->escape($post['satuan_bea_masuk']);



		$qty_h = str_replace(".", "", $qty_);
		$qty = str_replace(",", ".", $qty_h);

		$price_h = str_replace(".", "", $price_);
		$price = str_replace(",", ".", $price_h);

		$tbm_h = str_replace(".", "", $tbm_);
		$tbm = str_replace(",", ".", $tbm_h);

		$ppnn_h = str_replace(".", "", $ppnn_);
		$ppnn = str_replace(",", ".", $ppnn_h);

		$tpbm_h = str_replace(".", "", $tpbm_);
		$tpbm = str_replace(",", ".", $tpbm_h);

		$qty_pack_h = str_replace(".", "", $qty_pack_);
		$qty_pack = str_replace(",", ".", $qty_pack_h);

		$netto_h = str_replace(".", "", $netto_);
		$netto = str_replace(",", ".", $netto_h);

		$brutto_h = str_replace(".", "", $brutto_);
		$brutto = str_replace(",", ".", $brutto_h);

		$volume_h = str_replace(".", "", $volume_);
		$volume = str_replace(",", ".", $volume_h);

		$cukai_value_h = str_replace(".", "", $cukai_value_);
		$cukai_value = str_replace(",", ".", $cukai_value_h);

		$update_date = date('Y/m/d');

		$imph_id = intval($import_header_id);

		//insert table import header
		$sql = $this->db->query("INSERT INTO public.beone_import_detail VALUES (DEFAULT, $item_id, $qty, $satuan_id, $price, $qty_pack, $satuan_pack, $country_id, $volume, $netto, $brutto, $hscode, $tbm, $ppnn, $tpbm , $cukai, $satuan_cukai, $cukai_value, $bea_masuk, $satuan_bea_masuk, 1, $item_type_id, $imph_id)");

		if($sql)
			return true;
		return false;
	}


	public function update_detail($post, $import_detail_id){

		$item_type_id = $this->db->escape($post['item_type_id']);
		$item_id = $this->db->escape($post['item_id']);
		$hscode = $this->db->escape($post['hscode']);
		$qty_ = $this->db->escape($post['qty']);
		$satuan_id = $this->db->escape($post['satuan_id']);
		$price_ = $this->db->escape($post['price']);
		$tbm_ = $this->db->escape($post['tbm']);
		$ppnn_ = $this->db->escape($post['ppnn']);
		$tpbm_ = $this->db->escape($post['tpbm']);
		$qty_pack_ = $this->db->escape($post['qty_pack']);
		$satuan_pack = $this->db->escape($post['satuan_pack']);
		$country_id = $this->db->escape($post['country_id']);
		$cukai = $this->db->escape($post['cukai']);
		$satuan_cukai = $this->db->escape($post['satuan_cukai']);
		$netto_ = $this->db->escape($post['netto']);
		$brutto_ = $this->db->escape($post['brutto']);
		$volume_ = $this->db->escape($post['volume']);
		$cukai_value_ = $this->db->escape($post['cukai_value']);
		$bea_masuk = $this->db->escape($post['bea_masuk']);
		$satuan_bea_masuk = $this->db->escape($post['satuan_bea_masuk']);



		$qty_h = str_replace(".", "", $qty_);
		$qty = str_replace(",", ".", $qty_h);

		$price_h = str_replace(".", "", $price_);
		$price = str_replace(",", ".", $price_h);

		$tbm_h = str_replace(".", "", $tbm_);
		$tbm = str_replace(",", ".", $tbm_h);

		$ppnn_h = str_replace(".", "", $ppnn_);
		$ppnn = str_replace(",", ".", $ppnn_h);

		$tpbm_h = str_replace(".", "", $tpbm_);
		$tpbm = str_replace(",", ".", $tpbm_h);

		$qty_pack_h = str_replace(".", "", $qty_pack_);
		$qty_pack = str_replace(",", ".", $qty_pack_h);

		$netto_h = str_replace(".", "", $netto_);
		$netto = str_replace(",", ".", $netto_h);

		$brutto_h = str_replace(".", "", $brutto_);
		$brutto = str_replace(",", ".", $brutto_h);

		$volume_h = str_replace(".", "", $volume_);
		$volume = str_replace(",", ".", $volume_h);

		$cukai_value_h = str_replace(".", "", $cukai_value_);
		$cukai_value = str_replace(",", ".", $cukai_value_h);

		$update_date = date('Y/m/d');

		$imph_id = intval($import_detail_id);

		//insert table import header
		$sql = $this->db->query("UPDATE public.beone_import_detail SET item_id=$item_id, qty=$qty, satuan_qty=$satuan_id, price=$price, pack_qty=$qty_pack, satuan_pack=$satuan_pack, origin_country=$country_id, volume=$volume, netto=$netto, brutto=$brutto, hscode=$hscode, tbm=$tbm, ppnn=$ppnn, tpbm=$tpbm, cukai=$cukai, sat_cukai=$satuan_cukai, cukai_value=$cukai_value, bea_masuk=$bea_masuk, sat_bea_masuk=$satuan_bea_masuk, item_type_id=$item_type_id WHERE import_detail_id = $imph_id");

		if($sql)
			return true;
		return false;
	}


	public function load_import_header(){
		$sql = $this->db->query("SELECT h.import_header_id, h.status, h.jenis_bc, h.car_no, h.bc_no, h.bc_date, s.nama, s.custsup_id, h.invoice_no, h.invoice_date FROM public.beone_import_header h INNER JOIN public.beone_custsup s ON h.supplier_id = s.custsup_id WHERE h.flag = 1 AND h.status=0 ORDER BY h.import_header_id DESC");
		return $sql->result_array();
	}

	public function load_import_header_list(){ // untuk list import agar keluar status setelah di received
		$sql = $this->db->query("SELECT h.import_header_id, h.status, h.jenis_bc, h.car_no, h.bc_no, h.bc_date, s.nama, s.custsup_id, h.invoice_no, h.invoice_date FROM public.beone_import_header h INNER JOIN public.beone_custsup s ON h.supplier_id = s.custsup_id WHERE h.flag = 1 ORDER BY h.import_header_id DESC");
		return $sql->result_array();
	}

	public function load_import_header_received(){
		$sql = $this->db->query("SELECT h.import_header_id, h.status, h.jenis_bc, h.car_no, h.bc_no, h.bc_date, s.nama, s.custsup_id, h.invoice_no, h.invoice_date FROM public.beone_import_header h INNER JOIN public.beone_custsup s ON h.supplier_id = s.custsup_id WHERE h.flag = 1 AND h.status=0");
		return $sql->result_array();
	}

	public function load_import_header_detail($import_header_id){
		$sql = $this->db->query("SELECT h.import_header_id, h.jenis_bc, h.car_no, h.bc_no, h.bc_date, h.invoice_no, h.invoice_date, h.kontrak_no, h.kontrak_date, h.purpose_id, h.supplier_id, c.nama as nsupplier, h.price_type, h.from, h.amount_value, h.valas_value, h.value_added, h.discount, h.insurance_type, h.insurace_value, h.freight, h.flag, h.update_by, h.update_date, h.status, h.receive_date, h.receive_no
															FROM public.beone_import_header h INNER JOIN public.beone_custsup c ON h.supplier_id = c.custsup_id WHERE h.import_header_id = ".intval($import_header_id));
		return $sql->result_array();
	}

	public function load_import_detail($import_header_id){
		$sql = $this->db->query("SELECT d.import_detail_id, d.import_header_id, i.nama, i.item_code, d.qty, d.price, d.hscode, d.netto, d.brutto FROM public.beone_import_detail d INNER JOIN public.beone_item i ON d.item_id = i.item_id WHERE d.flag = 1 AND d.import_header_id = ".intval($import_header_id));
		return $sql->result_array();
	}

	public function load_import_hanya_detail($import_detail_id){
		$sql = $this->db->query("SELECT * FROM public.beone_import_detail WHERE flag=1 AND import_detail_id=".intval($import_detail_id));
		return $sql->result_array();
	}

	public function delete_header($import_header_id){
		$sql = $this->db->query("UPDATE public.beone_import_header SET flag=0 WHERE import_header_id = ".intval($import_header_id));
		$sql2 = $this->db->query("UPDATE public.beone_import_detail SET flag=0 WHERE import_header_id = ".intval($import_header_id));
		return true;
	}

	public function delete_detail($import_detail_id){
		$sql = $this->db->query("UPDATE public.beone_import_detail SET flag=0 WHERE import_detail_id = ".intval($import_detail_id));
		return true;
	}

	public function get_default($import_header_id){
		$sql = $this->db->query("SELECT * FROM public.beone_import_header WHERE import_header_id = ".intval($import_header_id));
		if($sql->num_rows() > 0)
			return $sql->row_array();
		return false;
	}

	public function get_default_detail($import_detail_id){
		$sql = $this->db->query("SELECT * FROM public.beone_import_detail WHERE import_detail_id = ".intval($import_detail_id));
		if($sql->num_rows() > 0)
			return $sql->row_array();
		return false;
	}


}
?>
