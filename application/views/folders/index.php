

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Manage
        <small>Folders</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Folders</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-md-12 col-xs-12">
          
            <a href="<?php echo base_url('folders/create') ?>" class="btn btn-success">Add Folder</a>
            <br /> <br />


          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Manage Folders</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive">
              <table id="userTable" class="table table-bordered table-hover table-striped">
                <thead>
                <tr>
                  <th>#</th>
                  <th>Name</th>
                  <th>Date Created</th>
                  <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                  <?php if($folder_data): ?>                  
                    <?php foreach ($folder_data as $k => $v): 
                    if($v['status']== 1){
                      ?>
                      <tr>
                    
                        <td><?php echo $v['folderId']; ?></td>
                        <td><?php echo $v['name']; ?></td>
                        <td><?php echo $v['date_created']; ?></td>
                        <td>
                            <a href="<?php echo base_url('folders/edit/'.$v['folderId']) ?>" class="btn btn-success"><i class="fa fa-edit"></i></a>
                            <a href="<?php echo base_url('folders/delete/'.$v['folderId']) ?>" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                            <!-- <?php 
                              if(isset($_GET["id"])){ ?>
                                <a href="<?php echo base_url('shared/insert')."?noteId=".$v['noteId']."&receiverId=".$_GET["id"];?>" class="btn btn-warning"><i class="fa fa-send"></i></a>
                             <?php } ?> -->
                        </td>
                      </tr>
                    <?php } endforeach ?>
                  <?php endif; ?>
                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
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
      $('#userTable').DataTable({
        'order' : [],
        });

      $("#notesMainNav").addClass('active');
      $("#myNotes").addClass('active');
    });
  </script>
