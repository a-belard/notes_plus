

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
                <div class="form-group">
                  <label for="residence">Residence</label>
                  <input type="text" class="form-control" id="residence" name="residence" placeholder="Residence" value="<?php echo $user_data['residence'] ?>" autocomplete="off">
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
    $("#groups").select2();

    $("#userMainNav").addClass('active');
    $("#manageUserSubNav").addClass('active');
  });
</script>
