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

            <p class="text-muted text-center">Member since <?= date('d F Y', $user['date_created']); ?></p>
            <!-- 
            <a href="#" class="btn btn-primary btn-block"><b>Follow</b></a> -->
          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->
        <div class="nav-tabs-custom">
          <ul class="nav nav-tabs">
            <li class="active"><a href="profile" data-toggle="tab"><?= $title ?></a></li>
          </ul>
          <div class="tab-content">

            <div class="active tab-pane" id="profile">
              <form class="form-horizontal">
                <div class="form-group">
                  <label for="inputName" class="col-sm-2 control-label">Name</label>
                  <div class="col-sm-10">
                    <input type="email" class="form-control" id="inputName" value="<?= $user['name']; ?>" readonly>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail" class="col-sm-2 control-label">Email</label>
                  <div class="col-sm-10">
                    <input type="email" class="form-control" id="inputEmail" value="<?= $user['email']; ?>" readonly>
                  </div>
                </div>
                <!-- <div class="form-group">
                  <label for="inputName" class="col-sm-2 control-label">Name</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="inputName" placeholder="Name">
                  </div>
                </div> -->
                <div class="form-group">
                  <label for="inputExperience" class="col-sm-2 control-label">Experience</label>

                  <div class="col-sm-10">
                    <textarea class="form-control" id="inputExperience" placeholder="Experience"></textarea>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputSkills" class="col-sm-2 control-label">Skills</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="inputSkills" placeholder="Skills">
                  </div>
                </div>

                <!-- <div class="form-group">
                  <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-danger">Submit</button>
                  </div>
                </div> -->
              </form>
            </div>
            <!-- /.tab-pane -->
          </div>
          <!-- /.tab-content -->
        </div>


        <!-- About Me Box -->
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title">About Me</h3>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <strong><i class="fa fa-book margin-r-5"></i> Pendidikan</strong>

            <p class="text-muted">
              B.S. in Computer Science from the University of Tennessee at Knoxville
            </p>

            <hr>

            <strong><i class="fa fa-map-marker margin-r-5"></i> Alamat</strong>

            <p class="text-muted">Malibu, California</p>

            <hr>

            <strong><i class="fa fa-pencil margin-r-5"></i> Skills</strong>

            <p>
              <span class="label label-danger">UI Design</span>
              <span class="label label-success">Coding</span>
              <span class="label label-info">Javascript</span>
              <span class="label label-warning">PHP</span>
              <span class="label label-primary">Node.js</span>
            </p>

            <hr>

            <strong><i class="fa fa-file-text-o margin-r-5"></i> Notes</strong>

            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam fermentum enim neque.</p>
          </div>
          <!-- /.box-body -->
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

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
  <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
    <!-- <li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li> -->
    <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
  </ul>
  <div class="tab-content">
    <div class="tab-pane" id="control-sidebar-home-tab">
    </div>
    <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>
    <div class="tab-pane" id="control-sidebar-settings-tab">
    </div>
  </div>
</aside>
<div class="control-sidebar-bg"></div>