<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <!-- Main content -->
  <section class="content">

    <div class="row">
      <div class="col-md-12">
        <!-- Profile Image -->
        <div class="box box-primary">
          <div class="box-body box-profile">

            <img class="profile-user-img img-responsive img-circle" src="<?= base_url('assets/img/profile/') . $user['image']; ?>" alt="User profile picture">

            <h3 class="profile-username text-center"><?= $user['name']; ?></h3>
            <p class="text-muted text-center"><small><i> <?= $user['email']; ?></i></s> </p>

            <p class="text-muted text-center">Member sejak <?= date('d F Y', $user['date_created']); ?></p>
            <!-- 
            <a href="#" class="btn btn-primary btn-block"><b>Follow</b></a> -->
          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->

        <!-- profile tab -->
        <div class="nav-tabs-custom">
          <ul class="nav nav-tabs">
            <li class="active"><a href="profile" data-toggle="tab"><?= $title ?></a></li>
          </ul>
          <div class="tab-content">

            <div class="active tab-pane" id="profile">
              <form class="form-horizontal">
                <div class="form-group">
                  <label for="name" class="col-sm-2 control-label">Nama Lengkap</label>
                  <div class="col-sm-10">
                    <input class="form-control" id="name" name="name" value="<?= $user['name']; ?>" readonly>
                  </div>
                </div>
                <div class="form-group">
                  <label for="email" class="col-sm-2 control-label">Alamat Email</label>
                  <div class="col-sm-10">
                    <input class="form-control" id="email" name="email" value="<?= $user['email']; ?>" readonly>
                  </div>
                </div>
              </form>
            </div>
            <!-- /.tab-pane -->
          </div>
          <!-- /.tab-content -->
        </div>
        <!-- /.box -->
      </div>
      <!-- /.col -->
      <!-- <div class="col-md-9"> -->
      <!-- /.nav-tabs-custom -->
      <!-- </div> -->
      <!-- /.col -->
    </div>
    <!-- /.row -->

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