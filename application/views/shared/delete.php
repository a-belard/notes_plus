

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Manage
        <small>Shared Notes</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?php echo base_url('users/') ?>">Shared Notes</a></li>
        <li class="active">Delete</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-md-12 col-xs-12">

          <h1>Are you sure?</h1>

          <form action="<?php echo base_url('shared/delete/'.$id) ?>" method="post">
            <input type="submit" class="btn btn-success" name="confirm" value="Confirm">
            <a href="<?php echo base_url('shared/index') ?>" class="btn btn-danger">Cancel</a>
          </form>
        </div>
      </div>
    </section>
  </div>

  <script type="text/javascript">
    $(document).ready(function() {
      $("#userMainNav").addClass('active');
      $("#manageUserSubNav").addClass('active');
    });
  </script>

