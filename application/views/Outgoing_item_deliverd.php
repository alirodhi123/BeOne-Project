<h3>Outgoing Item Deliverd</h3>
<div class="portlet light bordered">
  <div class="portlet-title">
      <div class="tools"> </div>
  </div>


  <form role="form" method="post">
      <div class="form-body">
            <div class="row">
                <div class="col-sm-4">
                <div class="form-group">
                      <label>Deliverd Date</label>
                      <div class="input-group">
                        <span class="input-group-addon input-circle-left">
                            <i class="fa fa-calendar"></i>
                        </span>
                        <input class="form-control form-control-inline input-medium date-picker input-circle-right" size="16" type="text" name="deliverd_date" value="<?php echo date('m/d/Y');?>" readonly required/>
                        <span class="help-block"></span>
                      </div>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-sm-4">
                    <div class="form-group">
                        <label>No Deliverd</label>
                          <div class="input-group">
                              <span class="input-group-addon input-circle-left">
                                  <i class="fa fa-car"></i>
                              </span>
                              <input type="text" class="form-control input-circle-right" placeholder="NO DELIVERD" name="deliverd_no" required>
                          </div>
                      </div>
                </div>
            </div>
      </div>
      <div class="form-actions">
          <a href='<?php echo base_url('Inventin_controller');?>' class='btn default'><i class="fa fa-arrow-circle-o-left"></i> Back</a>
          <button type="submit" class="btn red" name="submit_out">Submit</button>
      </div>
  </form>
