

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i></a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>
    <section class="content">
      <div class="row">
        <div class="col-lg-3 col-xs-6">
          <div class="small-box bg-green">
              <div class="inner">
                <h3><?= $no_folders ?></h3>
                <p>Folders</p>
              </div>
              <div class="icon">
                <i class="fa fa-folder"></i>
              </div>
              <a href="<?= base_url("users")?>" class="small-box-footer">Share notes with them <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <div class="col-lg-4 col-xs-6">
          <div class="small-box bg-green">
              <div class="inner">
                <h3><?= $no_users?></h3>
                <p>Users</p>
              </div>
              <div class="icon">
                <i class="fa fa-group"></i>
              </div>
              <a href="<?= base_url("users")?>" class="small-box-footer">Share notes with them <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
      <div class="row">
        <div class="col-lg-4 col-xs-6">
          <div class="small-box bg-green">
              <div class="inner">
                <h3><?= $no_notes ?></h3>
                <p>Notes</p>
              </div>
              <div class="icon">
                <i class="fa fa-file-text"></i>
              </div>
              <a href="<?php echo base_url('/notes') ?>" class="small-box-footer">View More <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>        
      </div>  
      </div>
      <div class="row">
        <div class="col-lg-3 col-xs-6">
          <div class="small-box bg-green">
              <div class="inner">
                <h3><?= 4 ?></h3>
                <p>Notes shared</p>
              </div>
              <div class="icon">
                <i class="fa fa-paper-plane"></i>
              </div>
              <a href="<?php echo base_url('shared/fromme') ?>" class="small-box-footer">View More <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <div class="col-lg-4 col-xs-6">
          <div class="small-box bg-green">
              <div class="inner">
                <h3><?= $no_shared_byme ?></h3>
                <p>Notes shared by me</p>
              </div>
              <div class="icon">
                <i class="fa fa-share-alt"></i>
              </div>
              <a href="<?php echo base_url('shared/fromme') ?>" class="small-box-footer">View More <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <div class="col-lg-4 col-xs-6">
          <div class="small-box bg-green">
              <div class="inner">
                <h3><?= $no_shared_tome ?></h3>
                <p>Notes shared to me</p>
              </div>
              <div class="icon">
                <i class="fa fa-share"></i>
              </div>
              <a href="<?php echo base_url('shared/fromme') ?>" class="small-box-footer">View More <i class="fa fa-arrow-circle-right"></i></a>
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
