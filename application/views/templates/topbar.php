<header class="main-header">
  <!-- Logo -->
  <a href="../../index2.html" class="logo">
    <!-- mini logo for sidebar mini 50x50 pixels -->
    <!-- <span class="logo-mini"><b>A</b>LT</span> -->
    <span class="logo-mini"><img src="<?= base_url('assets/img/kf_logo.png') ?>" alt="KF Logo" width="50px;"></span>
    <!-- logo for regular state and mobile devices -->
    <!-- <span class="logo-lg"><b>Admin</b>LTE</span> -->
    <span class="logo-lg"><img src="<?= base_url('assets/img/logo_kf.png') ?>" alt="Logo KF" width="210px;"></span>
  </a>
  <!-- Header Navbar: style can be found in header.less -->
  <nav class="navbar navbar-static-top">
    <!-- Sidebar toggle button-->
    <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
      <span class="sr-only">Toggle navigation</span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </a>

    <div class="navbar-custom-menu">
      <ul class="nav navbar-nav">

        <!-- User Account: style can be found in dropdown.less -->
        <li class="dropdown user user-menu">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <img src="<?= base_url('assets/img/profile/') . $user['image']; ?>" class="user-image" alt="User Image">
            <span class="hidden-xs"><?= $user['name']; ?></span>
          </a>
          <ul class="dropdown-menu">
            <!-- User image -->
            <li class="user-header">
              <img src="<?= base_url('assets/img/profile/') . $user['image']; ?>" class="img-circle" alt="User Image">

              <p>
                <?= $user['name']; ?>
                <small><i> <?= $user['email']; ?></i></small>
                <small>Member since <?= date('d F Y', $user['date_created']); ?></small>
              </p>
            </li>
            <!-- Menu Footer-->
            <li class="user-footer">
              <div class="pull-right">
                <a href="#" class="btn btn-default btn-flat" data-toggle="modal" data-target="#logoutModal">Sign out</a>
              </div>
            </li>
          </ul>
        </li>
        <!-- Control Sidebar Toggle Button -->
        <li>
          <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
        </li>
      </ul>
    </div>
  </nav>
</header>

<!-- =============================================== -->