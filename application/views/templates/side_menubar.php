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
            <li class="" id="userMainNav">
              <a href="<?php echo base_url('users') ?>" class="users">
                <i class="fa fa-users"></i>
                <span>Users</span>
              </a>
            </li>
            <li class="treeview" id="foldersMainNav">
              <a href="">
                <i class="fa fa-folder"></i>
                <span>Folders</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li id="allFolders"><a href="<?php echo base_url('folders') ?>"><i class="fa fa-folder"></i> All folders</a></li>
              <?php if($foldersMenu){ 
                foreach($foldersMenu as $k => $folder) {
                  if($folder["status"] == 1){?>
                  <li id="<?= "folder".$folder["folderId"]?>"><a href="<?= base_url("folders/folder/".$folder["folderId"]) ?>"><i class="fa fa-folder-o"></i> <?= $folder["name"]?></a></li>
              <?php }}} ?>
              </ul>
            </li>
            <li class="" id="notesMainNav">
              <a href="<?php echo base_url('notes') ?>" id="myNotes">
                <i class="fa fa-book"></i>
                <span>My notes</span>
              </a>
            </li>
            <li class="treeview" id="sharedMainNav">
              <a href="">
                <i class="fa fa-share-alt"></i>
                <span hre>Shared</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li id="shared"><a href="<?php echo base_url('shared/') ?>"><i class="fa fa-paper-plane"></i> All</a></li>
                <li id="sharedFromMe"><a href="<?php echo base_url('shared/fromme') ?>"><i class="fa fa-share-square-o"></i> From me</a></li>
                <li id="sharedToMe"><a href="<?php echo base_url('shared/tome') ?>"><i class="fa fa-share-square"></i> To me</a></li>
              </ul>
            </li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>