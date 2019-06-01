<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      <?= $title ?>
    </h1>
    <div class="col-lg-6">
      <?= form_error('Role', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
  </section>

  <!-- Main content -->
  <section class="content">

    <!-- Default box -->
    <div class="box">
      <div class="box-header with-border">
        <?= $this->session->flashdata('message'); ?>
        <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#newRoleModal">
          Add New Role</a>
        <div class="box-tools pull-right">
          <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
            <i class="fa fa-minus"></i></button>
        </div>
      </div>
      <div class="box-body">
        <table class="table table-hover">
          <thead>
            <tr>
              <th scope="col">No.</th>
              <th scope="col">Role</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
            <?php $i = 1; ?>
            <?php foreach ($role as $r) : ?>
              <tr>
                <th scope="row"><?= $i; ?></th>
                <td><?= $r['role']; ?> </td>
                <td>
                  <button class="btn btn-warning"><a href="<?= base_url('admin/roleaccess/') . $r['id']; ?>">Hak Akses</a></button>
                  <button class="btn btn-secondary"><a href="">Edit</a></button>
                  <button class="btn btn-danger"><a href="">Hapus</a></button>
                </td>
              </tr>
              <?php $i++; ?>
            <?php endforeach ?>
          </tbody>
        </table>
      </div>
      <!-- /.box-body -->`
    </div>
    <!-- /.box -->

  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<footer class="main-footer">
  <div class="pull-right hidden-xs">
    <b>Version</b> 2.4.0
  </div>
  <div class="copyright text-center my-auto">
    <span>Copyright &copy; wahini.com <?= date('Y'); ?></span>
  </div>
</footer>
<!-- Modal -->
<div class="modal fade" id="newRoleModal" tabindex="-1" role="dialog" aria-labelledby="newMenuModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="newMenuModalLabel">Add New Role</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?= base_url('admin/role'); ?>" method="post">
        <div class="modal-body">
          <div class="form-group">
            <input type="text" class="form-control" id="Role" name="Role" placeholder="Role name">
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Add</button>
        </div>
      </form>
    </div>
  </div>
</div>
<!-- Control Sidebar -->
<!-- <aside class="control-sidebar control-sidebar-dark"> -->
<!-- Create the tabs -->
<!-- <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
    <li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>

    <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
  </ul> -->
<!-- Tab panes -->
<!-- <div class="tab-content"> -->
<!-- Home tab content -->
<!-- <div class="tab-pane" id="control-sidebar-home-tab">

    </div> -->
<!-- /.tab-pane -->
<!-- Stats tab content -->
<!-- <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div> -->
<!-- /.tab-pane -->
<!-- Settings tab content -->
<!-- <div class="tab-pane" id="control-sidebar-settings-tab">

    </div> -->
<!-- /.tab-pane -->
<!-- </div>
</aside> -->
<!-- /.control-sidebar -->
<!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
<div class="control-sidebar-bg"></div>