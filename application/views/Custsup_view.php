<?php
  $tp = $_GET['tipe'];

  if ($tp == 1){
    $txtCS = "Supplier";
    $txtHP = "Hutang";
    $saldo_HP =isset($default['saldo_hutang_idr'])? $default['saldo_hutang_idr'] : "";
    $saldo_HPV =isset($default['saldo_hutang_valas'])? $default['saldo_hutang_valas'] : "";
  }else{
    $txtCS = "Customer";
    $txtHP = "PIUTANG";
    $saldo_HP =isset($default['saldo_piutang_idr'])? $default['saldo_piutang_idr'] : "";
    $saldo_HPV =isset($default['saldo_piutang_valas'])? $default['saldo_piutang_valas'] : "";
  }

?>

<h3>Master <?php echo $txtCS;?> <b><?=$tipe?></b></h3>
<div class="portlet light bordered">
  <div class="portlet-title">


    <form role="form" method="post">
        <div class="form-body">
          <div class="row">
            <div class="col-sm-4">
                <label>Nama <?php echo $txtCS;?></label>
                <input type="text" class="form-control" placeholder="Nama" id="nama" value="<?=isset($default['nama'])? $default['nama'] : ""?>" name="nama" required>
                <input type="hidden" class="form-control" id="tipe_custsup" value="<?php echo $tp;?>" name="tipe_custsup" required>
            </div>
            <div class="col-sm-8"></div>
          </div>
          <div class="row">
            <div class="col-sm-8">
                <label>Alamat</label>
                <input type="text" class="form-control" placeholder="Alamat" id="alamat" value="<?=isset($default['alamat'])? $default['alamat'] : ""?>" name="alamat" required>
            </div>

            <div class="col-sm-4">
                    <label>Mata Uang Utama</label>
                    <div class="input-group">
                       <select id="select2-single-input-sm" class="form-control input-sm select2-multiple" name="negara" required>
                         <?php
                            if ($tipe == "Ubah"){
                                if ($default['negara'] == 0){
                                   $nnegara = "IDR";
                                }else{
                                   $nnegara = "USD";
                                }
                            }
                          ?>
                         <option value="<?=isset($default['negara'])? $default['negara'] : ""?>"><?=isset($nnegara)? $nnegara : ""?></option>
                         <option value="0">IDR</option>
                         <option value="1">USD</option>
                       </select>
                 </div>
            </div>
            </div>
            <div class="row">
              <div class="col-sm-4">
                  <label>Saldo Awal <?php echo $txtHP;?> IDR</label>
                  <?php $saldo_HP_ = str_replace(".", ",", $saldo_HP);?>
                  <input type="text" class="form-control" placeholder="Saldo Awal IDR" id="saldo_idr" name="saldo_idr" value="<?=isset($saldo_HP_)? $saldo_HP_ : ""?>" required>
              </div>
              <div class="col-sm-4">
                  <label>Saldo Awal <?php echo $txtHP;?> Valas</label>
                  <?php $saldo_HPV_ = str_replace(".", ",", $saldo_HPV);?>
                  <input type="text" class="form-control" placeholder="Saldo Awal Valas" id="saldo_valas" name="saldo_valas" value="<?=isset($saldo_HPV_)? $saldo_HPV_ : ""?>" required>
              </div>
              <div class="col-sm-4"></div>
            </div>
        </div>
        <br />
        <div class="form-actions">
            <a href='<?php if ($tp == 1){ echo base_url('Custsup_controller?tipe=1');}else{ echo base_url('Custsup_controller?tipe=2'); } ?>' class='btn default'> Cancel</a>
            <button type="submit" class="btn blue" name="submit_custsup">Submit</button>
        </div>
      </form>

      <hr />
      <br />

      <div class="tools"> </div>
  </div>

<table class="table table-striped table-bordered table-hover" id="sample_1">
        <thead>
          <tr>
            <th><center>Nama</center></th>
            <th><center>Alamat</center></th>
            <th><center>Mata Uang</center></th>
            <th><center>SA IDR </center></th>
            <th><center>SA Valas</center></th>
            <th><center>Action</center></th>
          </tr>
        </thead>
        <tbody>
          <?php
          $list_supplier = $this->db->query("SELECT * FROM public.beone_custsup WHERE flag = 1 AND tipe_custsup = $tp");

          foreach($list_supplier->result_array() as $row){
          ?>
            <tr>
                <td><?php echo $row['nama'];?></td>
                <td><?php echo $row['alamat'];?></td>
                <td><?php
                        if ($row['negara'] == 0){
                           echo "IDR";
                        }else{
                           echo "USD";
                        }
                ?></td>
                <td><?php
                    if ($tp == 1){
                      echo number_format($row['saldo_hutang_idr'],2);
                    }else{
                      echo number_format($row['saldo_piutang_idr'],2);
                    }
                ?></td>
                <td><?php
                    if ($tp == 1){
                      echo number_format($row['saldo_hutang_valas'],2);
                    }else{
                      echo number_format($row['saldo_piutang_valas'],2);
                    }
                ?></td>
                <td><a href='<?php echo base_url('Custsup_controller/Edit/'.$row['custsup_id'].'/?tipe='.$tp.'');?>' class='btn blue'><i class="fa fa-pencil"></i></a><a href="javascript:dialogHapus('<?php echo base_url('Custsup_controller/delete/'.$row['custsup_id'].'');?>')" class='btn red'><i class="fa fa-trash-o"></i></a></td>
            </tr>
            <?php
              }
            ?>
        </tbody>
    </table>
</div>

<script>
	function dialogHapus(urlHapus) {
	  if (confirm("Apakah anda yakin ingin menghapus ini ?")) {
		document.location = urlHapus;
	  }
	}
</script>


<script type="text/javascript">
var saldo_idr = document.getElementById('saldo_idr');
saldo_idr.addEventListener('keyup', function(e){
saldo_idr.value = formatRupiah(this.value, 'Rp. ');
});

var saldo_valas = document.getElementById('saldo_valas');
saldo_valas.addEventListener('keyup', function(e){
saldo_valas.value = formatRupiah(this.value, 'Rp. ');
});

/* Fungsi formatRupiah */
function formatRupiah(angka, prefix){
  var number_string = angka.replace(/[^,\d]/g, '').toString(),
  split   		= number_string.split(','),
  sisa     		= split[0].length % 3,
  rupiah     		= split[0].substr(0, sisa),
  ribuan     		= split[0].substr(sisa).match(/\d{3}/gi);

  // tambahkan titik jika yang di input sudah menjadi angka ribuan
  if(ribuan){
    separator = sisa ? '.' : '';
    rupiah += separator + ribuan.join('.');
  }

  rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
  return prefix == undefined ? rupiah : (rupiah ? rupiah : '');
}
</script>
