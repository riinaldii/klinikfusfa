<body class="hold-transition login-page">
  <div class="login-box">
    <div class="login-logo">
      <a href="../../index2.html"><b>Admin</b>LTE</a>
      <!-- <img class="img-responsive width:100px; height:100px;" src="<?= base_url('assets/img/logo_kf.png'); ?>" alt="logo"> -->
    </div>
    <!-- /.login-logo -->
    <div class="login-box-body">
      <p class="login-box-msg">Sign in to start your session</p>

      <?= $this->session->flashdata('message'); ?>

      <form class="user" method="post" action="<?= base_url('auth'); ?>">
        <div class="form-group has-feedback">
          <input type="email" id="email" name="email" class="form-control" placeholder="Masukkan Email" value="<?= set_value('email'); ?>">
          <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
          <?= form_error('email', '<small class="text-danger ml-3">', '</small>'); ?>
        </div>
        <div class="form-group has-feedback">
          <input type="password" id="password" name="password" class="form-control" placeholder="Masukkan Password">
          <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          <?= form_error('password', '<small class="text-danger ml-3">', '</small>'); ?>
        </div>
        <div class="row">
          <!-- /.col -->
          <div class="col-xs-12">
            <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
          </div>
          <!-- /.col -->
        </div>

      </form>
      <div class="row m-t-20 m-b-20">
        <div class="col-md-12">
          <a href="<?= base_url('auth/registration'); ?>" class="text-center mt-3">Buat akun baru</a><br>
          <a href="#" class="align-right">Lupa password?</a>
        </div>
      </div>
    </div>
    <!-- /.login-box-body -->
  </div>
  <!-- /.login-box -->