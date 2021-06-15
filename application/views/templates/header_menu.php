<style>
.logout{
  line-height: 50px;
  margin-right: 50px;
  position: relative;
}
strong {
  color: white;
  position: absolute;
  right: 80px;
}
</style>

<header class="main-header">
    <!-- Logo -->
    <a href="" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>N+</b></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Notes+</b></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <div style="list-style:none;" class="logout">
        <strong><i class="fa fa-user"></i> <?= $username ?></strong>
        <a href="<?php echo base_url('auth/logout') ?>" class=" px-3 pull-right" style="color:white">
          <i class="fa fa-power-off"></i> 
          <span>Logout</span>
        </a>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  