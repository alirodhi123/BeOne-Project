<!-- BEGIN PAGE TITLE-->
<!-- END PAGE TITLE-->
<!-- END PAGE HEADER-->

<div class="portlet box blue ">
      <div class="portlet-title">
          <div class="caption">
              <i class="fa fa-gift"></i> Form Export</div>
          <div class="tools">
              <a href="" class="collapse"> </a>
              <a href="#portlet-config" data-toggle="modal" class="config"> </a>
              <a href="" class="reload"> </a>
              <a href="" class="remove"> </a>
          </div>
      </div>
      <div class="portlet-body form">

        <div class="mt-element-step">
        <div class="row step-background-thin">
            <div class="col-md-4 bg-grey-steel mt-step-col active">
                <div class="mt-step-number">1</div>
                <div class="mt-step-title uppercase font-grey-cascade">BC Document</div>
                <div class="mt-step-content font-grey-cascade">Choose & Input BC Doc</div>
            </div>
            <div class="col-md-4 bg-grey-steel mt-step-col error">
                <div class="mt-step-number">2</div>
                <div class="mt-step-title uppercase font-grey-cascade">Header Doc</div>
                <div class="mt-step-content font-grey-cascade">Header Document BC</div>
            </div>
            <div class="col-md-4 bg-grey-steel mt-step-col">
                <div class="mt-step-number">3</div>
                <div class="mt-step-title uppercase font-grey-cascade">Detail Doc</div>
                <div class="mt-step-content font-grey-cascade">Detail Document BC</div>
            </div>
        </div>
        </di>

          <form role="form" method="post">
              <div class="form-body">

                <div class="row">

                  <div class="col-sm-4">
                        <div class="form-group">
                            <label>BC Car</label>
                              <div class="input-group">
                                  <span class="input-group-addon input-circle-left">
                                      <i class="fa fa-car"></i>
                                  </span>
                                  <input type="text" class="form-control input-circle-right" placeholder="BC CAR" name="bc_car" value="<?=isset($default['car_no'])? $default['car_no'] : ""?>">
                              </div>
                          </div>
                    </div>

                    <div class="col-sm-4">
                          <div class="form-group">
                              <label>Nomor BC</label>
                                <div class="input-group">
                                    <span class="input-group-addon input-circle-left">
                                        <i class="fa fa-barcode"></i>
                                    </span>
                                    <input type="text" class="form-control input-circle-right" placeholder="BC NUMBER" name = "bc_nomor" value="<?=isset($default['bc_no'])? $default['bc_no'] : ""?>" required>
                                </div>
                            </div>
                      </div>

                    <div class="col-sm-4">
                    <div class="form-group">
                          <label>Tanggal BC</label>
                          <div class="input-group">
                            <span class="input-group-addon input-circle-left">
                                <i class="fa fa-calendar"></i>
                            </span>
                            <input class="form-control form-control-inline input-medium date-picker input-circle-right" size="16" type="text" name="bc_tanggal" value="<?=isset($default['bc_date'])? helper_tanggalupdate($default['bc_date']) : date('m/d/Y')?>" readonly required/>
                            <span class="help-block"></span>
                          </div>
                    </div>
                  </div>

                  </div>

                  <div class="row">
                    <div class="col-sm-4">
                            <div class="form-group">
                                <label>Jenis BC</label>
                                <div class="input-group">
                                   <select id="select2-single-input-sm" class="form-control input-sm select2-multiple" name="jenis_bc" required>
                                     <?php if ($tipe == "Ubah"){
                                                  $bc = "";
                                                  if ($default['jenis_bc'] == 1){
                                                      $bc = "Export 3.0";
                                                  }elseif($default['jenis_bc'] == 2){
                                                      $bc = "Export 2.7";
                                                  }elseif($default['jenis_bc'] == 3){
                                                      $bc = "Export 4.1";
                                                  }elseif($default['jenis_bc'] == 4){
                                                      $bc = "Export 2.5";
                                                  }
                                    ?>
                                        <option value='<?php echo $default['jenis_bc'];?>'><?php echo $bc;?></option>
                                        <option value=1>Export 3.0</option>
                                        <option value=2>Export 2.7</option>
                                        <option value=3>Export 4.1</option>
                                        <option value=4>Export 2.5</option>
                                     <?php
                                        }else{
                                      ?>
                                       <option value=1>Export 3.0</option>
                                       <option value=2>Export 2.7</option>
                                       <option value=3>Export 4.1</option>
                                       <option value=4>Export 2.5</option>
                                     <?php
                                        }
                                      ?>
                                   </select>
                             </div>
                           </div>
                    </div>

                    <div class="col-sm-4">
                          <div class="form-group">
                              <label>Nomor Kontrak</label>
                                <div class="input-group">
                                    <span class="input-group-addon input-circle-left">
                                        <i class="fa fa-barcode"></i>
                                    </span>
                                    <input type="text" class="form-control input-circle-right" placeholder="CONTRACT NUMBER" name="kontrak_no" value="<?=isset($default['kontrak_no'])? $default['kontrak_no'] : ""?>">
                                </div>
                            </div>
                      </div>

                    <div class="col-sm-4">
                    <div class="form-group">
                          <label>Tanggal Kontrak</label>
                          <div class="input-group">
                            <span class="input-group-addon input-circle-left">
                                <i class="fa fa-calendar"></i>
                            </span>
                            <input class="form-control form-control-inline input-medium date-picker input-circle-right" size="16" type="text" value="<?=isset($default['kontrak_date'])? helper_tanggalupdate($default['kontrak_date']) : date('m/d/Y')?>" name="kontrak_tanggal" readonly>
                            <span class="help-block"></span>
                          </div>
                    </div>
                    </div>

                    </div>

                    <hr / style="border-color: #3598DC;">

                    <div class="row">
                      <div class="col-sm-6">
                        <div class="form-group">
                              <label>Jenis Ekspor</label>
                              <div class="input-group">
                                 <select id="select2-single-input-sm" class="form-control input-sm select2-multiple" name="jenis_ekspor" required>
                                   <?php if ($tipe == "Ubah"){
                                                $je = "";
                                                if ($default['jenis_export'] == 1){
                                                    $je = "Ekspor Biasa";
                                                }elseif($default['jenis_export'] == 2){
                                                    $je = "Ekspor Yang Akan Diekspor Kembali";
                                                }elseif($default['jenis_export'] == 3){
                                                    $je = "Ekspor Re Ekspor";
                                                }
                                  ?>
                                              <option value='<?php echo $default['jenis_export'];?>'><?php echo $je;?></option>
                                              <option value = 1>Ekspor Biasa</option>
                                              <option value = 2>Ekspor Yang Akan Diekspor Kembali</option>
                                              <option value = 3>Ekspor Re Ekspor</option>
                                   <?php
                                      }else{
                                    ?>
                                              <option value = 1>Ekspor Biasa</option>
                                              <option value = 2>Ekspor Yang Akan Diekspor Kembali</option>
                                              <option value = 3>Ekspor Re Ekspor</option>
                                   <?php
                                      }
                                    ?>
                                 </select>
                           </div>
                         </div>
                      </div>

                      <div class="col-sm-6">
                            <div class="form-group">
                                <label>Amount Value</label>
                                <?php if ($tipe == "Ubah"){$amount_value = str_replace(".", ",", $default['amount_value']);}?>
                                <input type="text" class="form-control" placeholder="AMOUNT VALUE" id="amount" name="amount" value="<?=isset($amount_value)? $amount_value : ""?>" required>
                              </div>
                        </div>
                    </div>


                    <div class="row">
                      <div class="col-sm-3">
                      <div class="form-group">
                        <label>Invoice No</label>
                        <input type="text" class="form-control" placeholder="INVOICE NO" name="invoice_no" value="<?=isset($default['invoice_no'])? $default['invoice_no'] : ""?>" required>
                      </div>
                    </div>

                      <div class="col-sm-3">
                        <div class="form-group">
                              <label>Tanggal Invoice</label>
                              <div class="input-group">
                                <input class="form-control form-control-inline input-medium date-picker" size="16" type="text" value="<?=isset($default['invoice_date'])? helper_tanggalupdate($default['invoice_date']) : date('m/d/Y')?>" name="invoice_tanggal" readonly required>
                                <span class="help-block"></span>
                              </div>
                        </div>
                      </div>

                      <div class="col-sm-3">
                        <div class="form-group">
                              <label>Valuta</label>
                              <select id="select2-single-input-sm" class="form-control input-sm select2-multiple" name="kode_valas" required>
                                 <option value=1>USD</option>
                              </select>
                          </div>
                      </div>

                      <div class="col-sm-3">
                        <div class="form-group">
                              <label>Valuta Value</label>
                              <?php if ($tipe == "Ubah"){$valas_value = str_replace(".", ",", $default['valas_value']);}?>
                              <input type="text" class="form-control" placeholder="VALUTA VALUE" id="valuta" name="valuta" value="<?=isset($valas_value)? $valas_value : ""?>" required>
                        </div>
                      </div>


                    </div>


                    <div class="row">

                      <div class="col-sm-3">
                      <div class="form-group">
                        <label>Surat Jalan No</label>
                        <input type="text" class="form-control" placeholder="SURAT JALAN NO" name="surat_jalan_no" value="<?=isset($default['surat_jalan_no'])? $default['surat_jalan_no'] : ""?>" required>
                      </div>
                    </div>

                      <div class="col-sm-3">
                        <div class="form-group">
                              <label>Tanggal Surat Jalan</label>
                              <div class="input-group">
                                <input class="form-control form-control-inline input-medium date-picker" size="16" type="text" value="<?=isset($default['surat_jalan_date'])? helper_tanggalupdate($default['surat_jalan_date']) : date('m/d/Y')?>" name="surat_jalan_tanggal" readonly required>
                                <span class="help-block"></span>
                              </div>
                        </div>
                      </div>

                      <div class="col-sm-3">
                        <label>Insurance Type</label>
                        <select id="select2-single-input-sm" class="form-control input-sm select2-multiple" name="insurace_type" required>
                                <?php
                                  if ($tipe == "Ubah"){
                                ?>
                                  <option value='<?php echo $default['insurance_type'];?>'><?php echo $default['insurance_type'];?></option>
                                  <option value="LN">LN</option>
                                  <option value="DN">DN</option>
                                <?php
                                  }else{
                                ?>
                                  <option value="LN">LN</option>
                                  <option value="DN">DN</option>
                                <?php
                                  }
                                ?>

                        </select>
                      </div>

                      <div class="col-sm-3">
                          <label>Insurance Value</label>
                          <?php if ($tipe == "Ubah"){$insurance_value = str_replace(".", ",", $default['insurance_value']);}?>
                          <input type="text" class="form-control" placeholder="VALUTA VALUE" id="insurance" value="<?=isset($insurance_value)? $insurance_value : ""?>" name="insurance_value" required>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-sm-4">
                        <div class="form-group">
                              <label>Receiver</label>
                              <div class="input-group">
                                 <select id="select2-single-input-sm" class="form-control input-sm select2-multiple" name="receiver" required>
                                     <?php
                                       $receiver = $this->db->query("SELECT * FROM public.beone_custsup WHERE custsup_id =".intval($default['receiver_id']));
                                       $hasil_receiver = $receiver->row_array();
                                        if ($tipe == "Ubah"){
                                      ?>
                                        <option value='<?php echo $default['receiver_id'];?>'><?php echo $hasil_receiver['nama'];?></opiton>
                                      <?php
                                        }
                                         foreach($list_receiver as $row){
                                      ?>
                                          <option value='<?php echo $row['custsup_id'];?>'><?php echo $row['nama'];?></opiton>
                                      <?php
                                          }
                                      ?>
                                 </select>
                           </div>
                         </div>
                      </div>

                      <div class="col-sm-2">
                        <div class="form-group">
                              <label>Receiver Country</label>
                              <div class="input-group">
                                 <select id="select2-single-input-sm" class="form-control input-sm select2-multiple" name="country" required>
                                   <?php
                                     $country = $this->db->query("SELECT * FROM public.beone_country WHERE country_id =".intval($default['country_id']));
                                     $hasil_country = $country->row_array();
                                      if ($tipe == "Ubah"){
                                    ?>
                                      <option value='<?php echo $default['country_id'];?>'><?php echo $hasil_country['nama'];?></opiton>

                                     <?php
                                      }
                                         foreach($list_country as $row){
                                     ?>
                                      <option value='<?php echo $row['country_id'];?>'><?php echo $row['nama'];?></opiton>
                                      <?php
                                          }
                                      ?>
                                 </select>
                           </div>
                         </div>
                      </div>

                      <div class="col-sm-3">
                        <label>Price Type</label>
                        <select id="select2-single-input-sm" class="form-control input-sm select2-multiple" name="price_type">
                          <?php
                            if ($tipe == "Ubah"){
                          ?>
                            <option value='<?php echo $default['price_type'];?>'><?php echo $default['price_type'];?></option>
                            <option value="CIF">CIF</option>
                            <option value="CNF">CNF</option>
                            <option value="FOB">FOB</option>
                          <?php
                            }else{
                          ?>
                            <option value="CIF">CIF</option>
                            <option value="CNF">CNF</option>
                            <option value="FOB">FOB</option>
                          <?php
                            }
                          ?>
                        </select>
                      </div>

                        <div class="col-sm-3">
                        <div class="form-group">
                          <label>Freight</label>
                          <?php if ($tipe == "Ubah"){$freight = str_replace(".", ",", $default['freight']);}?>
                          <input type="text" class="form-control" placeholder="FREIGHT" id="freight" name="freight" value="<?=isset($freight)? $freight : ""?>" required>
                        </div>
                      </div>
                    </div>

              <div class="form-actions">
                  <a href='<?php echo base_url('Export_controller');?>' class='btn default'><i class="fa fa-arrow-circle-o-left"></i> Back</a>
                  <button type="submit" class="btn red" name="submit_export">Submit</button>
              </div>
          </form>
      </div>
  </div>
</div>

<script type="text/javascript">

var amount = document.getElementById('amount');
amount.addEventListener('keyup', function(e){
  amount.value = formatRupiah(this.value, 'Rp. ');
});

var valuta = document.getElementById('valuta');
valuta.addEventListener('keyup', function(e){
  valuta.value = formatRupiah(this.value, 'Rp. ');
});

var insurance = document.getElementById('insurance');
insurance.addEventListener('keyup', function(e){
  insurance.value = formatRupiah(this.value, 'Rp. ');
});

var freight = document.getElementById('freight');
freight.addEventListener('keyup', function(e){
  freight.value = formatRupiah(this.value, 'Rp. ');
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
