<?php
function helper_tanggalinsert($tanggal = ""){
    $CI =& get_instance();

    $tgl_bulan = substr($tanggal, 0, 2);
    $tgl_hari = substr($tanggal, 3, 2);
    $tgl_tahun = substr($tanggal, 6, 4);

    $new_format = $tgl_tahun."-".$tgl_bulan."-".$tgl_hari;

    return $new_format;
}
?>
