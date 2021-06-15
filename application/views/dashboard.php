

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>
    <section class="content">
      <div class="row">
        <div class="col-lg-3 col-xs-6">
          <div class="small-box bg-green">
              <div class="inner">
                <h3><?= $no_users?></h3>
                <p>Users</p>
              </div>
              <div class="icon">
                <i class="fa fa-sticky-note"></i>
              </div>
              <a href="" class="small-box-footer">You can share notes with them</a>
          </div>
        </div>
      <div class="row">
        <div class="col-lg-3 col-xs-6">
          <div class="small-box bg-green">
              <div class="inner">
                <h3><?= $no_notes ?></h3>
                <p>Notes</p>
              </div>
              <div class="icon">
                <i class="fa fa-sticky-note"></i>
              </div>
              <a href="<?php echo base_url('products/') ?>" class="small-box-footer">View More <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <div class="col-lg-3 col-xs-6">
          <div class="small-box bg-green">
              <div class="inner">
                <h3>5</h3>
                <p>Shared notes</p>
              </div>
              <div class="icon">
                <i class="fa fa-paper-plane"></i>
              </div>
              <a href="<?php echo base_url('products/') ?>" class="small-box-footer">View More <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        
      </div>      
    </section>
  </div>
  <script type="text/javascript">
    $(document).ready(function() {
      $("#dashboardMainMenu").addClass('active');
    });
  </script>
