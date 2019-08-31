<?php
    $header_id = 0;
    foreach($list_export_header_detail as $row){$header_id=$row['export_header_id'];}
?>

<h3>Data Export Detail</h3>
<div class="portlet light bordered">
  <div class="row">
      <div class="col-sm-4">
          <div class="form-group">
              <h4><b>No Invoice : </b><?php echo $row['invoice_no'];?></h4>
          </div>
      </div>
      <div class="col-sm-4">
          <div class="form-group">
              <h4><b>Tgl Invoice : </b><?php echo $row['invoice_date'];?></h4>
          </div>
      </div>
      <div class="col-sm-4">
            <div class="form-group">
                <h4><b>No Surat Jalan : </b><?php echo $row['surat_jalan_no'];?></h4>
              </div>
        </div>
    </div>

    <div class="row">
      <div class="col-sm-4">
          <div class="form-group">
                <h4><b>Tgl Surat Jalan: </b><?php echo $row['surat_jalan_date'];?></h4>
          </div>
      </div>
      <div class="col-sm-8">
          <div class="form-group">
              <h4><b>Receiver : </b><?php echo $row['nreceiver'];?></h4>
          </div>
      </div>
    </div>

  <div class="portlet-title">
      <div class="caption font-dark">
          <a href='<?php echo base_url('Export_controller'); ?>' class='btn default'><i class="fa fa-arrow-left"></i> Kembali</a>
          <a href='<?php echo base_url('Export_controller/Detail/'.$header_id); ?>' class='btn green'><i class="glyphicon glyphicon-plus"></i> Tambah Data </a>
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
								foreach($list_export_detail as $row){
          ?>
            <tr>
                <td><small><?php echo $row['nama'];?></small></td>
                <td><small><?php echo $row['item_code'];?></small></td>
								<td><small><?php echo number_format($row['qty']);?></small></td>
                <td><small><?php echo number_format($row['price']);?></small></td>
								<td><small><?php echo $row['hscode'];?></small></td>
                <td><small><?php echo number_format($row['netto']);?></small></td>
								<td><small><?php echo number_format($row['brutto']);?></small></td>
                <td><a href='<?php echo base_url('Export_controller/Edit_detail/'.$row['export_header_id'].'/'.$row['export_detail_id'].'');?>' class='btn blue'><i class="fa fa-pencil"></i> <small></small></a><a href="javascript:dialogHapus('<?php echo base_url('Export_controller/delete_detail/'.$row['export_header_id'].'/'.$row['export_detail_id'].'');?>')" class='btn red'><i class="fa fa-trash-o"></i> <small></small></a></td>
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
