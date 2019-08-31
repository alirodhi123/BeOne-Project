<!-- BEGIN PAGE TITLE-->
<!-- END PAGE TITLE-->
<!-- END PAGE HEADER-->

<div class="portlet box blue ">
      <div class="portlet-title">
          <div class="caption">
              <i class="fa fa-gift"></i> Form Detail Export</div>
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
                <?php
      								foreach($export_header as $row){
                ?>
                <div class="row">

                  <div class="col-sm-4">
                        <div class="form-group">
                              <h4><b>BC Car : </b><?php echo $row['car_no'];?></h4>
                          </div>
                    </div>

                    <div class="col-sm-4">
                          <div class="form-group">
                            <div class="form-group">
                                  <h4><b>BC No : </b><?php echo $row['bc_no'];?></h4>
                              </div>
                            </div>
                      </div>

                    <div class="col-sm-4">
                    <div class="form-group">
                      <div class="form-group">
                            <h4><b>BC Tgl : </b><?php echo $row['bc_date'];?></h4>
                        </div>
                    </div>
                  </div>

                  </div>

                  <div class="row">
                    <div class="col-sm-4"></div>


                      <div class="col-sm-4">
                              <div class="form-group">
                                    <h4><b>Inv No : </b><?php echo $row['invoice_no'];?></h4>
                                </div>
                        </div>

                      <div class="col-sm-4">
                          <div class="form-group">
                              <h4><b>Inv Tgl : </b><?php echo $row['invoice_date'];?></h4>
                          </div>
                    </div>

                    </div>

                    <?php if ($row['kontrak_no'] == ""){}else{?>

                    <div class="row">
                      <div class="col-sm-4"></div>
                      <div class="col-sm-4">
                          <div class="form-group">
                                <h4><b>Kontrak No : </b><?php echo $row['kontrak_no'];?></h4>
                            </div>
                        </div>

                      <div class="col-sm-4">
                        <div class="form-group">
                              <h4><b>Kontrak Tgl : </b><?php echo $row['kontrak_date'];?></h4>
                          </div>
                      </div>
                    </div>
                    <?php
                        }
                      }
                    ?>
                    <hr / style="border-color: #3598DC;">

                    <div class="row">
                      <div class="col-sm-6">
                        <div class="form-group">
                              <label>Item</label>
                              <div class="input-group">
                                 <select id="select2-single-input-sm" class="form-control input-sm select2-multiple" name="item_id" required>
                                   <?php
                                     $item = $this->db->query("SELECT * FROM public.beone_item WHERE item_id =".intval($default['item_id']));
                                     $hasil_item = $item->row_array();
                                      if ($tipe == "Edit"){
                                    ?>
                                      <option value='<?php echo $default['item_id'];?>'><?php echo $hasil_item['nama'];?></opiton>
                                   <?php
                                      }
                         							foreach($list_item as $row){
                                   ?>
                                      <option value='<?php echo $row['item_id'];?>'><?php echo $row['nama'];?></option>
                                    <?php
                                      }
                                    ?>
                                 </select>
                           </div>
                         </div>
                        </div>

                      <div class="col-sm-6">
                        <div class="form-group">
                          <label>Hscode</label>
                          <input type="text" class="form-control" placeholder="Hscode" name="hscode" value="<?=isset($default['hscode'])? $default['hscode'] : ""?>" required>
                         </div>
                        </div>
                    </div>

                    <div class="row">

                      <div class="col-sm-2">
                            <div class="form-group">
                              <label>Quantity</label>
                              <?php if ($tipe == "Ubah"){$qty = str_replace(".", ",", $default['qty']);}?>
                              <input type="text" class="form-control" placeholder="Qty Item" id="qty" name="qty" value="<?=isset($qty)? $qty : "0"?>" required>
                             </div>
                        </div>

                        <div class="col-sm-2">
                          <div class="form-group">
                                <label>Satuan</label>
                                <div class="input-group">
                                   <select id="select2-single-input-sm" class="form-control input-sm select2-multiple" name="satuan_id" required>
                                     <?php
                                       $satuan = $this->db->query("SELECT * FROM public.beone_satuan_item WHERE satuan_id =".intval($default['satuan_qty']));
                                       $hasil_satuan = $satuan->row_array();
                                        if ($tipe == "Edit"){
                                      ?>
                                        <option value='<?php echo $default['satuan_qty'];?>'><?php echo $hasil_satuan['keterangan'];?></opiton>
                                     <?php
                                        }
                           							foreach($list_satuan as $row){
                                     ?>
                                     <option value='<?php echo $row['satuan_id'];?>'><?php echo $row['keterangan'];?></option>
                                     <?php
                                        }
                                     ?>
                                   </select>
                             </div>
                           </div>
                          </div>

                          <div class="col-sm-2">
                                  <div class="form-group">
                                    <label>Price</label>
                                    <?php if ($tipe == "Ubah"){$price = str_replace(".", ",", $default['price']);}?>
                                    <input type="text" class="form-control" placeholder="Price Item" id="price" name="price" value="<?=isset($price)? $price : "0"?>" required>
                                   </div>
                            </div>

                            <div class="col-sm-2">
                                  <div class="form-group">
                                    <label>Netto</label>
                                    <?php if ($tipe == "Ubah"){$netto = str_replace(".", ",", $default['netto']);}?>
                                    <input type="text" class="form-control" placeholder="Netto" id="netto" name="netto" value="<?=isset($netto)? $netto : "0"?>" required>
                                   </div>
                              </div>

                              <div class="col-sm-2">
                                <div class="form-group">
                                  <label>Brutto</label>
                                  <?php if ($tipe == "Ubah"){$brutto = str_replace(".", ",", $default['brutto']);}?>
                                  <input type="text" class="form-control" placeholder="Brutto" id="brutto" name="brutto" value="<?=isset($brutto)? $brutto : "0"?>" required>
                                 </div>
                                </div>

                                <div class="col-sm-2">
                                  <div class="form-group">
                                    <label>Volume</label>
                                    <?php if ($tipe == "Ubah"){$volume = str_replace(".", ",", $default['volume']);}?>
                                    <input type="text" class="form-control" placeholder="Volume" id="volume" name="volume" value="<?=isset($volume)? $volume : "0"?>" required>
                                   </div>
                                  </div>

                    </div>


                    <div class="row">

                      <div class="col-sm-2">
                            <div class="form-group">
                              <label>Qty Pack</label>
                              <?php if ($tipe == "Ubah"){$pack_qty = str_replace(".", ",", $default['pack_qty']);}?>
                              <input type="text" class="form-control" placeholder="Qty Pack" id="qty_pack" name="qty_pack" value="<?=isset($pack_qty)? $pack_qty : "0"?>" required>
                             </div>
                        </div>

                        <div class="col-sm-2">
                          <div class="form-group">
                                <label>Satuan Pack</label>
                                <div class="input-group">
                                   <select id="select2-single-input-sm" class="form-control input-sm select2-multiple" name="satuan_pack" required>
                                     <?php
                                       $satuan_pack = $this->db->query("SELECT * FROM public.beone_satuan_item WHERE satuan_id =".intval($default['satuan_pack']));
                                       $hasil_satuan_pack = $satuan_pack->row_array();
                                        if ($tipe == "Edit"){
                                      ?>
                                      }
                                        <option value='<?php echo $default['satuan_pack'];?>'><?php echo $hasil_satuan_pack['keterangan'];?></opiton>
                                     <?php
                                      }
                           							foreach($list_satuan as $row){
                                     ?>
                                     <option value='<?php echo $row['satuan_id'];?>'><?php echo $row['keterangan'];?></option>
                                   <?php
                                      }
                                    ?>
                                   </select>
                                 </div>
                           </div>
                          </div>

                          <div class="col-sm-2">
                                    <label>Origin Country</label>
                                    <div class="input-group">
                                       <select id="select2-single-input-sm" class="form-control input-sm select2-multiple" name="country_id">
                                         <?php
                                           $country = $this->db->query("SELECT * FROM public.beone_country WHERE country_id =".intval($default['origin_country']));
                                           $hasil_country = $country->row_array();
                                            if ($tipe == "Edit"){
                                          ?>
                                          }
                                            <option value='<?php echo $default['origin_country'];?>'><?php echo $hasil_country['nama'];?></opiton>
                                         <?php
                                          }
                               							foreach($list_country as $row){
                                         ?>
                                         <option value ='<?php echo $row['country_id'];?>'><?php echo $row['nama'];?></option>
                                         <?php
                                            }
                                         ?>
                                       </select>
                                     </div>
                            </div>
                            <div class="col-sm-6"></div>
                    </div>



              </div>
              <div class="form-actions">
                  <a href='<?php echo base_url('Export_controller');?>' class='btn default'><i class="fa fa-arrow-circle-o-left"></i> Kembali</a>
                  <button type="submit" class="btn red" name="submit_export">Submit</button>
              </div>
          </form>
      </div>
  </div>
</div>

<script type="text/javascript">

var qty = document.getElementById('qty');
qty.addEventListener('keyup', function(e){
  qty.value = formatRupiah(this.value, 'Rp. ');
});

var price = document.getElementById('price');
price.addEventListener('keyup', function(e){
  price.value = formatRupiah(this.value, 'Rp. ');
});
var qty_pack = document.getElementById('qty_pack');
qty_pack.addEventListener('keyup', function(e){
  qty_pack.value = formatRupiah(this.value, 'Rp. ');
});

var netto = document.getElementById('netto');
netto.addEventListener('keyup', function(e){
  netto.value = formatRupiah(this.value, 'Rp. ');
});

var brutto = document.getElementById('brutto');
brutto.addEventListener('keyup', function(e){
  brutto.value = formatRupiah(this.value, 'Rp. ');
});

var volume = document.getElementById('volume');
volume.addEventListener('keyup', function(e){
  volume.value = formatRupiah(this.value, 'Rp. ');
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
