<h3>Data Export</h3>
<div class="portlet light bordered">
  <div class="portlet-title">
      <div class="tools"> </div>
  </div>

<table class="table table-striped table-bordered table-hover" id="sample_1">
        <thead>
          <tr>
							<th><center><small>No</small></center></th>
              <th><center><small>Inv No</small></center></th>
              <th><center><small>Inv Date</small></center></th>
              <th><center><small>SJ No</small></center></th>
              <th><center><small>SJ Date</small></center></th>
              <th><center><small>Supplier</small></center></th>
              <th><center><small>Jenis</small></center></th>
          </tr>
        </thead>
        <tbody>
          <?php
                $no = 0;
								foreach($list_export_header as $row){
                $no = $no + 1;

								$view_bc = "";
								if ($row['jenis_bc'] == 1){
										$view_bc = "BC 3.0";
								}elseif($row['jenis_bc'] == 2){
										$view_bc = 	"BC 2.7";
								}elseif($row['jenis_bc'] == 3){
										$view_bc = 	"BC 4.1";
								}elseif($row['jenis_bc'] == 4){
										$view_bc = 	"BC 2.5";
								}

                $jenis = "";
								if ($row['jenis_export'] == 1){
										$jenis = "Ekspor Biasa";
								}elseif($row['jenis_export'] == 2){
										$jenis = 	"Ekspor Yang Akan Diekspor Kembali";
								}elseif($row['jenis_export'] == 3){
										$jenis = 	"Ekspor Re Ekspor";
								}

                $status_bc = "";
                if ($row['status'] == 1){
                    $status_bc = "<p class='btn btn-circle green'> Deliverd </p>";
                }elseif($row['status'] == 0){
                    $status_bc = 	"<p class='btn btn-circle yellow'> New Doc </p>";
                }

					?>
            <tr>
                <td><small><?php echo $status_bc;?></small></td>
								<td><small><?php echo $row['invoice_no'];?></small></td>
                <td><small><?php echo $row['invoice_date'];?></small></td>
								<td><small><?php echo $row['surat_jalan_no'];?></small></td>
                <td><small><?php echo $row['surat_jalan_date'];?></small></td>
								<td><small><?php echo $row['nama'];?></small></td>
                <td><small><?php echo $jenis;?></small></td>
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
