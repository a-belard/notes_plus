

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
        <li class="active">Shared Notes</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-md-12 col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">See shared notes</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="userTable" class="table table-bordered table-hover table-striped">
                <thead>
                <tr>
                  <th>#</th>
                  <th>Title</th>
                  <th>Content</th>
                  <th>Sender</th>
                  <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                  <?php if($shared_data): ?>                  
                    <?php foreach ($shared_data as $k => $v):?> 
                      <tr>
                        <td><?php echo $v['id']; ?></td>
                        <td><?php echo $v['title']; ?></td>
                        <td><?php echo $v['content']; ?></td>
                        <td><?php echo $v['names']; ?></td>
                        <td>
                            <a href="<?php echo base_url('notes')."?id=".$v['id'] ?>" class="btn btn-info"><i class="fa fa-send"></i></a>
                        </td>
                      </tr>
                    <?php endforeach ?>
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

      $("#userMainNav").addClass('active');
      $("#manageUserSubNav").addClass('active');
    });
  </script>
