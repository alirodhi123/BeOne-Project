<?php
    $header_id = 0;
    foreach($import_header as $row){$header_id=$row['import_header_id'];}
?>

<h3>Data Import Detail</h3>
<div class="portlet light bordered">
  <div class="row">
      <div class="col-sm-4">
          <div class="form-group">
              <h4><b>BC Car : </b><?php echo $row['car_no'];?></h4>
          </div>
      </div>
      <div class="col-sm-4">
            <div class="form-group">
                <h4><b>BC No : </b><?php echo $row['bc_no'];?></h4>
              </div>
        </div>
        <div class="col-sm-4">
            <div class="form-group">
                <h4><b>Inv Tgl : </b><?php echo $row['invoice_date'];?></h4>
            </div>
        </div>
    </div>

    <div class="row">
      <div class="col-sm-4">
          <div class="form-group">
                <h4><b>BC Tgl : </b><?php echo $row['bc_date'];?></h4>
          </div>
      </div>
      <div class="col-sm-8">
          <div class="form-group">
              <h4><b>Supplier : </b><?php echo $row['nsupplier'];?></h4>
          </div>
      </div>
    </div>
  <hr / style="border-color: #3598DC;">
  <div class="portlet-title">
      <div class="caption font-dark">
          <a href='<?php echo base_url('Import_controller'); ?>' class='btn default'><i class="fa fa-arrow-left"></i> Kembali</a>
          <a href='<?php echo base_url('Import_controller/Detail/'.$header_id); ?>' class='btn green'><i class="glyphicon glyphicon-plus"></i> Tambah Data</a>
      </div>
      <div class="tools"> </div>
  </div>

<table class="table table-striped table-bordered table-hover" id="sample_1">
        <thead>
          <tr>
							<th><center><small>Item</small></center></th>
              <th><center><small>Item Code</small></center></th>
              <th><center><small>Qty</small></center></th>
              <th><center><small>Price</small></center></th>
              <th><center><small>Hscode</small></center></th>
              <th><center><small>Netto</small></center></th>
              <th><center><small>Brutto</small></center></th>
							<th><center><small>Action</small></center></th>
          </tr>
        </thead>
        <tbody>
          <?php
								foreach($list_import_detail as $row){
          ?>
            <tr>
                <td><small><?php echo $row['nama'];?></small></td>
                <td><small><?php echo $row['item_code'];?></small></td>
								<td><small><?php echo number_format($row['qty']);?></small></td>
                <td><small><?php echo number_format($row['price']);?></small></td>
								<td><small><?php echo $row['hscode'];?></small></td>
                <td><small><?php echo number_format($row['netto']);?></small></td>
								<td><small><?php echo number_format($row['brutto']);?></small></td>
                <td><a href='<?php echo base_url('Import_controller/Edit_detail/'.$row['import_header_id'].'/'.$row['import_detail_id'].'');?>' class='btn blue'><i class="fa fa-pencil"></i> <small></small></a><a href="javascript:dialogHapus('<?php echo base_url('Import_controller/delete_detail/'.$row['import_header_id'].'/'.$row['import_detail_id'].'');?>')" class='btn red'><i class="fa fa-trash-o"></i> <small></small></a></td>
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
