<h3>Data Import</h3>
<div class="portlet light bordered">
  <div class="portlet-title">
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
          </tr>
        </thead>
        <tbody>
          <?php
          $no = 0;
								foreach($list_import_header as $row){
                  $no = $no + 1;

                  $status_bc = "";
  								if ($row['status'] == 1){
  										$status_bc = "<p class='btn btn-circle green'> Received </p>";
  								}elseif($row['status'] == 0){
  										$status_bc = 	"<p class='btn btn-circle yellow'> New Doc </p>";
  								}

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
                <td><small><?php echo $status_bc;?></small></td>
                <td><small><?php echo $view_bc;?></small></td>
								<td><small><?php echo $row['car_no'];?></small></td>
                <td><small><?php echo $row['bc_no'];?></small></td>
								<td><small><?php echo $row['bc_date'];?></small></td>
                <td><small><?php echo $row['nama'];?></small></td>
								<td><small><?php echo $row['invoice_no'];?></small></td>
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
