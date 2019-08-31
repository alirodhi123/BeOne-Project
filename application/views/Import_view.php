<h3>Data Impor</h3>
<div class="portlet light bordered">
  <div class="portlet-title">
      <div class="caption font-dark">
          <a href='<?php echo base_url('Import_controller/Add'); ?>' class='btn green'><i class="glyphicon glyphicon-plus"></i> Tambah Data</a>
      </div>
      <div class="tools"> </div>
  </div>

<table class="table table-striped table-bordered table-hover" id="sample_1">
        <thead>
          <tr>
							<th><center><small>No</small></center></th>
              <th><center><small>BC</small></center></th>
              <th><center><small>BC Car</small></center></th>
              <th><center><small>BC No</small></center></th>
              <th><center><small>BC Date</small></center></th>
              <th><center><small>Supplier</small></center></th>
              <th><center><small>Invoice No</small></center></th>
							<th><center><small>Action</small></center></th>
          </tr>
        </thead>
        <tbody>
          <?php
          $no = 0;
								foreach($list_import_header as $row){
                  $no = $no + 1;

								$view_bc = "";
								if ($row['jenis_bc'] == 1){
										$view_bc = "BC 2.3";
								}elseif($row['jenis_bc'] == 2){
										$view_bc = 	"BC 2.6.3";
								}elseif($row['jenis_bc'] == 3){
										$view_bc = 	"BC 2.7";
								}elseif($row['jenis_bc'] == 4){
										$view_bc = 	"BC 4";
								}

					?>
            <tr>
                <td><small><?php echo $no;?></small></td>
                <td><small><?php echo $view_bc;?></small></td>
								<td><small><?php echo $row['car_no'];?></small></td>
                <td><small><?php echo $row['bc_no'];?></small></td>
								<td><small><?php echo $row['bc_date'];?></small></td>
                <td><small><?php echo $row['nama'];?></small></td>
								<td><small><?php echo $row['invoice_no'];?></small></td>
                <td><a href='<?php echo base_url('Import_controller/Import_detail/'.$row['import_header_id'].'');?>' class='btn yellow'><i class='fa fa-eye'></i><small> </small></a> <a href='<?php echo base_url('Import_controller/Edit/'.$row['import_header_id'].'');?>' class='btn blue'><i class="fa fa-pencil"></i> <small> </small></a> <a href="javascript:dialogHapus('<?php echo base_url('Import_controller/delete_header/'.$row['import_header_id'].'');?>')" class='btn red'><i class="fa fa-trash-o"></i> <small> </small></a></td>
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
