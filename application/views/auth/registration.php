<body class="hold-transition register-page">
  <div class="register-box">
    <div class="register-logo">
      <!-- <a href="#"><b>Admin</b>LTE</a> -->
    </div>

    <div class="register-box-body">
      <p class="login-box-msg">Daftar Akun</p>

      <form class="user" method="post" action="<?= base_url('Auth/registrationMember'); ?>">
        <div class=" form-group has-feedback">
          <input type="text" class="form-control" id="name" name="name" placeholder="Nama Lengkap" value="<?= set_value('name'); ?>">
          <span class="glyphicon glyphicon-user form-control-feedback"></span>
          <?= form_error('name', '<small class="text-danger ml-3">', '</small>'); ?>
        </div>
        <div class="form-group has-feedback">
          <input type="email" class="form-control" id="email" name="email" placeholder="Alamat Email" value="<?= set_value('email'); ?>">
          <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
          <?= form_error('email', '<small class="text-danger ml-3">', '</small>'); ?>
        </div>
        <div class="form-group has-feedback">
          <input type="password" class="form-control" id="password1" name="password1" placeholder="Password (Min. 7 karakter)">
          <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          <?= form_error('password1', '<small class="text-danger ml-3">', '</small>'); ?>
        </div>
        <div class="form-group has-feedback">
          <input type="password" class="form-control" id="password2" name="password2" placeholder="Ulangi Password">
          <span class="glyphicon glyphicon-log-in form-control-feedback"></span>

        </div>
        <div class="row">
          <!-- /.col -->
          <div class="col-xs-12">
            <button type="submit" class="btn btn-primary btn-block btn-flat">Daftar Akun</button>
          </div>
          <!-- /.col -->
        </div>
      </form>
      <a href="<?= base_url('auth'); ?>" class="text-center">Sudah punya akun? Login</a>
    </div>
    <!-- /.form-box -->
  </div>
  <!-- /.register-box -->