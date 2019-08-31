<?php
function helper_tanggalupdate($tanggal = ""){
    $CI =& get_instance();

	$tahun = substr($tanggal,0,4);
	$bulan = substr($tanggal,5,2);
	$tgl = substr($tanggal,8,2);

	$new_format = $bulan."/".$tgl."/".$tahun;

    return $new_format;
}
?>
