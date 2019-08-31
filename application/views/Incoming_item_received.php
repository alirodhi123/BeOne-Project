<h3>Incoming Item Received</h3>
<div class="portlet light bordered">
  <div class="portlet-title">
      <div class="tools"> </div>
  </div>


  <form role="form" method="post">
      <div class="form-body">
            <div class="row">
                <div class="col-sm-4">
                <div class="form-group">
                      <label>Received Date</label>
                      <div class="input-group">
                        <span class="input-group-addon input-circle-left">
                            <i class="fa fa-calendar"></i>
                        </span>
                        <input class="form-control form-control-inline input-medium date-picker input-circle-right" size="16" type="text" name="received_date" value="<?php echo date('m/d/Y');?>" readonly required/>
                        <span class="help-block"></span>
                      </div>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-sm-4">
                    <div class="form-group">
                        <label>No Received</label>
                          <div class="input-group">
                              <span class="input-group-addon input-circle-left">
                                  <i class="fa fa-car"></i>
                              </span>
                              <input type="text" class="form-control input-circle-right" placeholder="NO RECEIVED" name="received_no" required>
                          </div>
                      </div>
                </div>
            </div>
      </div>
      <div class="form-actions">
          <a href='<?php echo base_url('Inventin_controller');?>' class='btn default'><i class="fa fa-arrow-circle-o-left"></i> Back</a>
          <button type="submit" class="btn red" name="submit_in">Submit</button>
      </div>
  </form>
