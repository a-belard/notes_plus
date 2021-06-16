

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
              <h3 class="box-title">See users</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="userTable" class="table table-bordered table-hover table-striped">
                <thead>
                <tr>
                  <th>#</th>
                  <th>Names</th>
                  <th>Email</th>
                  <th>Residence</th>
                  <th>Date_joined</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                  <?php if($user_data): ?>                  
                    <?php foreach ($user_data as $k => $v):
                      if($v['status'] == 1){
                        echo $v['status'];?> 
                      <tr>
                        <td><?php echo $v['id']; ?></td>
                        <td><?php echo $v['names']; ?></td>
                        <td><?php echo $v['email']; ?></td>
                        <td><?php echo $v['districtName']."-".$v['provinceName']; ?></td>
                        <td><?php echo $v['date_joined']; ?></td>
                        <td>
                        <?php
                        if (($v['id']==$this->session->userdata('id')) || $this->session->userdata('role')== 1){?>
                        <a href="<?php echo base_url('users/edit/'.$v['id']) ?>" class="btn btn-success"><i class="fa fa-edit"></i></a>
                        <a href="<?php echo base_url('users/delete/'.$v['id']) ?>" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                        <?php 
                          }else{
                        ?>
                        
                            <a href="<?php echo base_url('notes')."?id=".$v['id'] ?>" class="btn btn-warning"><i class="fa fa-send"></i></a>
                        </td>
                        <?php } ?>
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

      $("#userMainNav").addClass('active');
      $("#manageUserSubNav").addClass('active');
    });
  </script>
