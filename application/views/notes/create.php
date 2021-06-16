

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

          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Add Note</h3>
            </div>
            <form role="form" action="<?php base_url('notes/create') ?>" method="post">
              <div class="box-body">
                <input type="hidden" name="ownerId" value="<?php echo $this->session->userdata('id');?>">
                <input type="hidden" name="status" value="1">
                <?php echo validation_errors(); ?>

                <div class="form-group">
                  <label for="title">Title</label>
                  <input type="text" class="form-control" id="title" name="title" placeholder="Title" autocomplete="off">
                </div>
                <div class="form-group">
                  <label for="title">Folder</label>
                  <select name="folderId" class="form-control" id="folder">
                    <option value="1">My notes (Default)</option>
                    <?php foreach($folders as $folder){ 
                      if($folder['status']==1){?>
                      <option value="<?= $folder["folderId"] ?>"><?= $folder["name"]?></option>
                    <?php } }?>
                  </select>
                </div>
                <div class="form-group">
                  <label for="content">Content</label>
                  <textarea class="form-control" id="content" name="content" rows="7"></textarea>
                </div>
              <div class="box-footer">
                <button type="submit" class="btn btn-success">Save Changes</button>
                <a href="<?php echo base_url('notes/') ?>" class="btn btn-danger">Back</a>
              </div>
            </form>
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
    $("#notesMainNav").addClass('active');
    $("#myNotes").addClass('active');    
  });
</script>
