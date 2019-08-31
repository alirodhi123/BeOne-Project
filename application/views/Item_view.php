<h3>Master Item <b><?=$tipe?></b></h3>
<div class="portlet light bordered">
  <div class="portlet-title">


    <form role="form" method="post">
        <div class="form-body">
          <div class="row">
            <div class="col-sm-4">
                <label>Nama Item</label>
                <input type="text" class="form-control" placeholder="Nama Item" id="nama_item" value="<?=isset($default['nama'])? $default['nama'] : ""?>" name="nama_item" required>
            </div>
            <div class="col-sm-4">
                <label>Kode Item</label>
                <input type="text" class="form-control" placeholder="Item Code" id="item_code" value="<?=isset($default['item_code'])? $default['item_code'] : ""?>" name="item_code" required>
            </div>
            <div class="col-sm-4">
                <div class="form-group">
                    <label>Tipe Item</label>
                    <div class="input-group">
                       <select id="select2-single-input-sm" class="form-control input-sm select2-multiple" name="item_type" required>
                         <option value="<?=isset($default['item_type_id'])? $default['item_type_id'] : ""?>"><?=isset($default['ntipe'])? $default['ntipe'] : ""?></option>
                         <?php 	foreach($list_tipe_item as $row){ ?>
                           <option value="<?php echo $row['item_type_id'];?>"><?php echo $row['nama'];?></option>
                         <?php } ?>
                       </select>
                 </div>
               </div>
            </div>
            </div>
            <div class="row">
              <div class="col-sm-4">
                  <label>Saldo Awal Qty</label>
                  <?php if ($tipe == "Ubah"){$saldo_qty = str_replace(".", ",", $default['saldo_qty']);}?>
                  <input type="text" class="form-control" placeholder="Saldo Awal Qty" id="saldo_qty" name="saldo_qty" value="<?=isset($saldo_qty)? $saldo_qty : ""?>" required>
              </div>
              <div class="col-sm-4">
                  <label>Saldo Awal Value</label>
                  <?php if ($tipe == "Ubah"){$saldo_idr = str_replace(".", ",", $default['saldo_idr']);}?>
                  <input type="text" class="form-control" placeholder="Saldo Awal IDR" id="saldo_idr" name="saldo_idr" value="<?=isset($saldo_idr)? $saldo_idr : ""?>" required>
              </div>
              <div class="col-sm-4">
                  <label>Hscode</label>
                  <input type="text" class="form-control" placeholder="Hscode" id="hscode" value="<?=isset($default['hscode'])? $default['hscode'] : ""?>" name="hscode" required>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-8">
                  <label>Keterangan</label>
                  <input type="text" class="form-control" placeholder="Keterangan Item" id="keterangan" name="keterangan" value="<?=isset($default['keterangan'])? $default['keterangan'] : ""?>" required>
              </div>
              <div class="col-sm-4">
                  <div class="form-group">
                      <label>Satuan</label>
                      <div class="input-group">
                         <select id="select2-single-input-sm" class="form-control input-sm select2-multiple" name="satuan" required>
                           <option value="<?=isset($default['satuan_id'])? $default['satuan_id'] : ""?>"><?=isset($default['satuan_code'])? $default['satuan_code'] : ""?></option>
                           <?php 	foreach($list_satuan as $row){ ?>
                             <option value="<?php echo $row['satuan_id'];?>"><?php echo $row['satuan_code'];?></option>
                           <?php } ?>
                         </select>
                   </div>
                 </div>
              </div>
            </div>
        </div>
        <br />
        <div class="form-actions">
            <a href='<?php echo base_url('Item_controller');?>' class='btn default'> Cancel</a>
            <button type="submit" class="btn blue" name="submit_item">Submit</button>
        </div>
      </form>

      <hr />
      <br />

      <div class="tools"> </div>
  </div>

<table class="table table-striped table-bordered table-hover" id="sample_1">
        <thead>
          <tr>
              <th><center>Nama Item</center></th>
              <th><center>Tipe</center></th>
              <th><center>Kode</center></th>
              <th><center>SA Qty</center></th>
              <th><center>SA Value</center></th>
              <th><center>Keterangan</center></th>
              <th><center>Action</center></th>
          </tr>
        </thead>
        <tbody>
          <?php 	foreach($list_item as $row){ ?>
            <tr>
                <td><?php echo $row['nama'];?></td>
                <td><?php echo $row['ntipe'];?></td>
                <td><?php echo $row['item_code'];?></td>
                <td><?php echo number_format($row['saldo_qty'],2);?></td>
                <td><?php echo number_format($row['saldo_idr'],2);?></td>
                <td><?php echo $row['keterangan'];?></td>
                <td><a href='<?php echo base_url('Item_controller/Edit/'.$row['item_id'].'');?>' class='btn blue'><i class="fa fa-pencil"></i></a><a href="javascript:dialogHapus('<?php echo base_url('Item_controller/delete/'.$row['item_id'].'');?>')" class='btn red'><i class="fa fa-trash-o"></i></a></td>
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

var saldo_qty = document.getElementById('saldo_qty');
saldo_qty.addEventListener('keyup', function(e){
  saldo_qty.value = formatRupiah(this.value, 'Rp. ');
});

var saldo_idr = document.getElementById('saldo_idr');
saldo_idr.addEventListener('keyup', function(e){
  saldo_idr.value = formatRupiah(this.value, 'Rp. ');
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
