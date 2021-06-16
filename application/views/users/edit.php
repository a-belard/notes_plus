

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Manage
        <small>Users</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Users</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-md-12 col-xs-12">

          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Edit User</h3>
            </div>
            <form role="form" action="<?php base_url('users/create') ?>" method="post">
              <div class="box-body">
                  
                <?php echo validation_errors(); ?>
                <div class="form-group">
                  <label for="names">Names</label>
                  <input type="text" class="form-control" id="username" name="names" placeholder="Names" value="<?php echo $user_data['names'] ?>" autocomplete="off">
                </div>

                <div class="form-group">
                  <label for="username">Username</label>
                  <input type="text" class="form-control" id="username" name="username" placeholder="Username" value="<?php echo $user_data['username'] ?>" autocomplete="off">
                </div>
                <div class="form-group">
                  <label for="email">Email</label>
                  <input type="email" class="form-control" id="email" name="email" placeholder="Email" value="<?php echo $user_data['email'] ?>" autocomplete="off">
                </div>
                <div>
                <label for="residence">Residence</label>
                </div>
                <div class="form-group has-feedback">
                  <span>Province</span>
                  <select name="province" id="province" onchange="displayDistricts(this.value)" class="form-control">
                    <option value="<?= $user_data['provinceId']?>"><?= $user_data['provinceName'] ?></option>
                    <?php foreach($provinces as $province) { ?>
                      <option value="<?= $province['provinceId'] ?>"><?= $province['provinceName'] ?></option>
                    <?php } ?>
                  </select>
                </div>
                <div class="form-group has-feedback" id="districts">
                <span>District</span>
                  <select name="residence" id="districts" class="form-control">
                  <option value="<?= $user_data["districtId"]?>"><?= $user_data["districtName"]?></option>
                  <?php foreach($districts as $district) { ?>
                      <option value="<?= $district['districtId'] ?>"><?= $district['districtName'] ?></option>
                    <?php } ?>
                  </select>
                </div>                  
                <div class="form-group">
                  <div class="alert alert-info alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                      Leave the password field empty if you don't want to change.
                  </div>
                </div>

                <div class="form-group">
                  <label for="password">Password</label>
                  <input type="password" class="form-control" id="password" name="password" placeholder="Password" autocomplete="off">
                </div>

                <div class="form-group">
                  <label for="cpassword">Confirm password</label>
                  <input type="password" class="form-control" id="cpassword" name="cpassword" placeholder="Confirm Password" autocomplete="off">
                </div>

              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-success">Save Changes</button>
                <a href="<?php echo base_url('users/') ?>" class="btn btn-danger">Back</a>
              </div>
            </form>
          </div>
          <!-- /.box -->
        </div>
        <!-- col-md-12 -->
      </div>
      <!-- /.row -->
      

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <script type="text/javascript">
  $(document).ready(function() {
    $("#userMainNav").addClass('active');
    $("#users").addClass('active');
  });
  async function display(elem, url, params){
    var xmlhttp=new XMLHttpRequest();
    xmlhttp.onreadystatechange=function() {
    if (this.readyState==4 && this.status==200) {
      console.log("good")
      document.getElementById(elem).innerHTML = this.responseText;
      $("#district").addClass("form-control");
    }
    }
    xmlhttp.open("POST",url,true);
    await xmlhttp.send(params);
  }
  async function displayDistricts(provId){
    var data = new FormData();
    data.append("provinceId",provId)
    await display("districts","<?= base_url('users/getDistricts') ?>",data)
  }
</script>
