

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Manage
        <small>Notes</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Notes</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-md-12 col-xs-12">
          
            <a href="<?php echo base_url('notes/create') ?>" class="btn btn-success">Add Note</a>
            <br /> <br />


          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Manage Notes</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive">
              <table id="userTable" class="table table-bordered table-hover table-striped">
                <thead>
                <tr>
                  <th>#</th>
                  <th>Title</th>
                  <th>Content</th>
                  <th>Folder</th>
                  <th>Date Wrote</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                  <?php if($note_data): ?>                  
                    <?php foreach ($note_data as $k => $v): 
                    if($v['status']== 1){
                      ?>
                      <tr>
                    
                        <td><?php echo $v['noteId']; ?></td>
                        <td><?php echo $v['title']; ?></td>
                        <td><?php echo $v['content']; ?></td>
                        <td><?php echo $v['folderName']; ?></td>
                        <td><?php echo $v['date_created']; ?></td>
                        <td>
                            <a href="<?php echo base_url('notes/printnote')."?id=".$v['noteId']?>" class="btn btn-info"><i class="fa fa-file-pdf-o"></i></a>
                            <a href="<?php echo base_url('notes/edit/'.$v['noteId']) ?>" class="btn btn-success"><i class="fa fa-edit"></i></a>
                            <a href="<?php echo base_url('notes/delete/'.$v['noteId']) ?>" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                            <?php 
                              if(isset($_GET["id"])){ ?>
                                <a href="<?php echo base_url('shared/insert')."?noteId=".$v['noteId']."&receiverId=".$_GET["id"];?>" class="btn btn-warning"><i class="fa fa-send"></i></a>
                             <?php } ?>
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
