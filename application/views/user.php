                    <div class="row">
                            <div class="col-md-12">
                                <!-- BEGIN EXAMPLE TABLE PORTLET-->
                                <div class="portlet light bordered">
                                    <div class="portlet-title">
                                        <div class="caption font-dark">
                                            <i class="icon-settings font-dark"></i>
                                            <span class="caption-subject bold uppercase">Buttons</span>
                                        </div>
                                        <div class="tools"> </div>
                                    </div>
                                    <div class="portlet-body">
                                        <table class="table table-striped table-bordered table-hover" id="sample_1">
                                            <thead>
                                              <tr>
                                                  <th>Akses</th>
                                                  <th>Nama</th>
                                                  <th>user_id</th>
                                                  <th>username</th>
                                                  <th>flag</th>
                                              </tr>
                                            </thead>
                                            <tfoot>
                                                <tr>
                                                    <th>Akses</th>
                                                    <th>Nama</th>
                                                    <th>user_id</th>
                                                    <th>username</th>
                                                    <th>flag</th>
                                                </tr>
                                            </tfoot>
                                            <tbody>
                                              <?php
                                                foreach($list_user as $row){
                                              ?>
                                                <tr>
                                                    <td><?php echo $row['akses'];?></td>
                                                    <td><?php echo $row['nama'];?></td>
                                                    <td><?php echo $row['user_id'];?></td>
                                                    <td><?php echo $row['username'];?></td>
                                                    <td><?php echo $row['flag'];?></td>
                                                </tr>
                                                <?php
                                                  }
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>




                    </div>
                    <!-- END CONTENT BODY -->
                </div>
