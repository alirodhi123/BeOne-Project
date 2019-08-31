<h3>Master User <b><?=$tipe?></b></h3>
<div class="portlet light bordered">
  <div class="portlet-title">


    <form role="form" method="post">
        <div class="form-body">
          <div class="row">
            <div class="col-sm-4">
                <label>Nama</label>
                <input type="text" class="form-control" placeholder="Nama User" id="nama_user" value="<?=isset($default['nama'])? $default['nama'] : ""?>" name="nama_user" required>
            </div>
            <div class="col-sm-4">
                <label>Username</label>
                <input type="text" class="form-control" placeholder="Username" id="username" value="<?=isset($default['username'])? $default['username'] : ""?>" name="username" required>
            </div>
            <div class="col-sm-4">
                <div class="form-group">
                    <label>Role</label>
                    <div class="input-group">
                       <select id="select2-single-input-sm" class="form-control input-sm select2-multiple" name="role" required>
                         <option value="<?=isset($default['role_id'])? $default['role_id'] : ""?>"><?=isset($default['nrole'])? $default['nrole'] : ""?></option>
                         <?php 	foreach($list_role_user as $row){ ?>
                           <option value="<?php echo $row['role_id'];?>"><?php echo $row['nama_role'];?></option>
                         <?php } ?>
                       </select>
                 </div>
               </div>
            </div>
            </div>
            <div class="row">
              <div class="col-sm-4">
                  <label>Password</label>
                  <input type="password" class="form-control" placeholder="Password" id="password" name="password" required>
              </div>
              <div class="col-sm-4">
                  <label>Validasi Password</label>
                  <input type="password" class="form-control" placeholder="Validasi Password" id="cpassword" name="cpassword" required>
              </div>
              <div class="col-sm-4"></div>
            </div>
        </div>
        <br />
        <div class="form-actions">
            <a href='<?php echo base_url('User_controller');?>' class='btn default'> Cancel</a>
            <button type="submit" class="btn blue" name="submit_user">Simpan</button>
        </div>
      </form>

      <hr />
      <br />

      <div class="tools"> </div>
      <table class="table table-striped table-bordered table-hover" id="sample_1">
              <thead>
                <tr>
                    <th><center>Username</center></th>
                    <th><center>Nama</center></th>
                    <th><center>Role</center></th>
                    <th><center>Action</center></th>
                </tr>
              </thead>
              <tbody>
                <?php 	foreach($list_user as $row){ ?>
                  <tr>
                      <td><?php echo $row['username'];?></td>
                      <td><?php echo $row['nama'];?></td>
                      <td><?php echo $row['nrole'];?></td>
                      <td>
                              <a href='<?php echo base_url('User_controller/edit/'.$row['user_id'].'');?>' class='btn blue'><i class="fa fa-pencil"></i></a>
                              <a href="javascript:dialogHapus('<?php echo base_url('User_controller/delete/'.$row['user_id'].'');?>')" class='btn red'><i class="fa fa-trash-o"></i></a>
                      </td>
                  </tr>
                  <?php
                    }
                  ?>
              </tbody>
          </table>
  </div>
</div>

<script>
	function dialogHapus(urlHapus) {
	  if (confirm("Apakah anda yakin ingin menghapus ini ?")) {
		document.location = urlHapus;
	  }
	}
</script>
