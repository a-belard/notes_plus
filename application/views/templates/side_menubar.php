<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        
        <li id="dashboardMainMenu">
          <a href="<?php echo base_url('dashboard') ?>">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
          </a>
        </li>

       
            <li class="treeview" id="userMainNav">
              <a href="#">
                <i class="fa fa-users"></i>
                <span>Users</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li id="seeUsersSubNav"><a href="<?php echo base_url('users') ?>"><i class="fa fa-eye"></i>See users</a></li>
              </ul>
            </li>
            
            <li class="treeview" id="notesMainNav">
              <a href="">
                <i class="fa fa-book"></i>
                <span>Notes</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li id="manageNoteSubNav"><a href="<?php echo base_url('notes') ?>"><i class="fa fa-eye"></i> My Notes</a></li>
              </ul>
            </li>
            <li class="treeview" id="notesMainNav">
              <a href="">
                <i class="fa fa-share-alt"></i>
                <span hre>Shared</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li id="SubNav"><a href="<?php echo base_url('shared/') ?>"><i class="fa fa-eye"></i> All</a></li>
                <li id="SubNav"><a href="<?php echo base_url('shared/fromme') ?>"><i class="fa fa-eye"></i> From me</a></li>
                <li id="SubNav"><a href="<?php echo base_url('shared/tome') ?>"><i class="fa fa-eye"></i> To me</a></li>
              </ul>
            </li>


        

        

        
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>