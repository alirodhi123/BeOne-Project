<!-- BEGIN PAGE TITLE-->
<!-- END PAGE TITLE-->
<!-- END PAGE HEADER-->

<div class="portlet box blue ">
      <div class="portlet-title">
          <div class="caption">
              <i class="fa fa-gift"></i> Form Import</div>
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
                                  <input type="text" class="form-control input-circle-right" placeholder="BC CAR" name="bc_car" value="<?=isset($default['car_no'])? $default['car_no'] : ""?>" required>
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
                                                      $bc = "Import 2.3";
                                                  }elseif($default['jenis_bc'] == 2){
                                                      $bc = "Import 2.6.3";
                                                  }elseif($default['jenis_bc'] == 3){
                                                      $bc = "Import 2.7";
                                                  }elseif($default['jenis_bc'] == 4){
                                                      $bc = "Import 4.0";
                                                  }
                                    ?>
                                        <option value='<?php echo $default['jenis_bc'];?>'><?php echo $bc;?></option>
                                        <option value=1>Import 2.3</option>
                                        <option value=2>Import 2.6.3</option>
                                        <option value=3>Import 2.7</option>
                                        <option value=4>Import 4.0</option>
                                     <?php
                                        }else{
                                      ?>
                                        <option value=1>Import 2.3</option>
                                        <option value=2>Import 2.6.3</option>
                                        <option value=3>Import 2.7</option>
                                        <option value=4>Import 4.0</option>
                                     <?php
                                        }
                                      ?>
                                   </select>
                             </div>
                           </div>
                    </div>

                      <div class="col-sm-4">
                            <div class="form-group">
                                <label>Nomor Invoice</label>
                                  <div class="input-group">
                                      <span class="input-group-addon input-circle-left">
                                          <i class="fa fa-barcode"></i>
                                      </span>
                                      <input type="text" class="form-control input-circle-right" placeholder="INVOICE NUMBER" name="invoice_no" value="<?=isset($default['invoice_no'])? $default['invoice_no'] : ""?>" required>
                                  </div>
                              </div>
                        </div>

                      <div class="col-sm-4">
                      <div class="form-group">
                            <label>Tanggal Invoice</label>
                            <div class="input-group">
                              <span class="input-group-addon input-circle-left">
                                  <i class="fa fa-calendar"></i>
                              </span>
                              <input class="form-control form-control-inline input-medium date-picker input-circle-right" size="16" type="text" value="<?=isset($default['invoice_date'])? helper_tanggalupdate($default['invoice_date']) : date('m/d/Y')?>" name="invoice_tanggal" readonly required/>
                              <span class="help-block"></span>
                            </div>
                      </div>
                    </div>

                    </div>

                    <div class="row">
                      <div class="col-sm-4"></div>
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
                              <input class="form-control form-control-inline input-medium date-picker input-circle-right" size="16" type="text" value="<?php echo date('m/d/Y');?>" name = "kontrak_tanggal" readonly/>
                              <span class="help-block"></span>
                            </div>
                      </div>
                      </div>
                    </div>

                    <hr / style="border-color: #3598DC;">

                    <div class="row">
                      <div class="col-sm-6">
                        <div class="form-group">
                              <label>Purpose ID / Name</label>
                              <div class="input-group">
                                 <select id="select2-single-input-sm" class="form-control input-sm select2-multiple" name="purpose">
                                   <?php if ($tipe == "Ubah"){
                                                $pp = "";
                                                if ($default['purpose_id'] == 1){
                                                    $pp = "Ditimbun";
                                                }elseif($default['purpose_id'] == 2){
                                                    $pp = "Diproses";
                                                }elseif($default['purpose_id'] == 3){
                                                    $pp = "Dipinjamkan";
                                                }
                                  ?>
                                      <option value='<?php echo $default['purpose_id'];?>'><?php echo $pp;?></option>
                                      <option value = 1>Ditimbun</option>
                                      <option value = 2>Diproses</option>
                                      <option value = 3>Dipinjamkan</option>
                                   <?php
                                      }else{
                                    ?>
                                      <option value = 1>Ditimbun</option>
                                      <option value = 2>Diproses</option>
                                      <option value = 3>Dipinjamkan</option>
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

                      <div class="col-sm-6">
                        <div class="form-group">
                              <label>Supplier</label>
                              <div class="input-group">
                                 <select id="select2-single-input-sm" class="form-control input-sm select2-multiple" name="supplier" required>
                                   <?php
                                     $supplier = $this->db->query("SELECT * FROM public.beone_custsup WHERE custsup_id =".intval($default['supplier_id']));
                                     $hasil_supplier = $supplier->row_array();
                                      if ($tipe == "Ubah"){
                                    ?>
                                      <option value='<?php echo $default['supplier_id'];?>'><?php echo $hasil_supplier['nama'];?></opiton>
                                     <?php
                                        }
                                         foreach($list_supplier as $row){
                                     ?>
                                      <option value='<?php echo $row['custsup_id'];?>'><?php echo $row['nama'];?></opiton>
                                      <?php
                                          }
                                      ?>
                                 </select>
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
                              <?php if ($tipe == "Ubah"){$valuta_value = str_replace(".", ",", $default['valas_value']);}?>
                              <input type="text" class="form-control" placeholder="VALUTA VALUE ($)" id="valuta" name="valuta" value="<?=isset($valuta_value)? $valuta_value : ""?>" required>
                        </div>
                      </div>


                    </div>


                    <div class="row">

                      <div class="col-sm-2">
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

                      <div class="col-sm-2">
                        <label>Insurance Type</label>
                        <select id="select2-single-input-sm" class="form-control input-sm select2-multiple" name="insurace_type">
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

                      <div class="col-sm-2">
                          <label>Insurance Value</label>
                          <?php if ($tipe == "Ubah"){$insurance_value = str_replace(".", ",", $default['insurace_value']);}?>
                          <input type="text" class="form-control" placeholder="VALUTA VALUE" id="insurance" value="<?=isset($insurance_value)? $insurance_value : "0"?>" name="insurance_value" required>
                      </div>

                        <div class="col-sm-6">
                              <div class="form-group">
                                  <label>Value Added</label>
                                  <?php if ($tipe == "Ubah"){$value_added = str_replace(".", ",", $default['value_added']);}?>
                                  <input type="text" class="form-control" placeholder="VALUE ADDED" id="value_added" value="<?=isset($value_added)? $value_added : "0"?>" name="value_added" required>
                                </div>
                          </div>
                    </div>


                    <div class="row">


                        <div class="col-sm-3">
                          <label>From</label>
                          <select id="select2-single-input-sm" class="form-control input-sm select2-multiple" name="from">
                            <?php
                              if ($tipe == "Ubah"){
                            ?>
                              <option value='<?php echo $default['from'];?>'><?php echo $default['from'];?></option>
                              <option value="KB">KB</option>
                              <option value="PJT">PJT</option>
                            <?php
                              }else{
                            ?>
                              <option value="KB">KB</option>
                              <option value="PJT">PJT</option>
                            <?php
                              }
                            ?>
                          </select>
                        </div>

                        <div class="col-sm-3">
                            <label>Freight</label>
                            <?php if ($tipe == "Ubah"){$freight_value = str_replace(".", ",", $default['freight']);}?>
                            <input type="text" class="form-control" placeholder="FREIGHT" id="freight" value="<?=isset($freight_value)? $freight_value : "0"?>" name="freight" required>
                        </div>

                        <div class="col-sm-6">
                              <div class="form-group">
                                  <label>Discount</label>
                                  <?php if ($tipe == "Ubah"){$discount_value = str_replace(".", ",", $default['discount']);}?>
                                  <input type="text" class="form-control" placeholder="DISCOUNT" id="discount" value="<?=isset($discount_value)? $discount_value : "0"?>" name="discount" required>
                                </div>
                          </div>

                    </div>



              </div>
              <div class="form-actions">
                  <a href='<?php echo base_url('Import_controller'); ?>' class='btn default'><i class="fa fa-arrow-left"></i> Kembali</a>
                  <button type="submit" class="btn red" name="submit_import">Submit</button>
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

var value_added = document.getElementById('value_added');
value_added.addEventListener('keyup', function(e){
  value_added.value = formatRupiah(this.value, 'Rp. ');
});

var freight = document.getElementById('freight');
freight.addEventListener('keyup', function(e){
  freight.value = formatRupiah(this.value, 'Rp. ');
});

var discount = document.getElementById('discount');
discount.addEventListener('keyup', function(e){
  discount.value = formatRupiah(this.value, 'Rp. ');
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
