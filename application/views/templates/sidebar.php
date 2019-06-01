<!-- Left side column. contains the sidebar -->
<aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">
    <!-- Sidebar user panel -->
    <div class="user-panel">
      <div class="pull-left image">
        <img src="<?= base_url('assets/img/profile/') . $user['image']; ?>" class="img-circle" alt="User Image">
      </div>
      <div class="pull-left info">
        <p><?= $user['name']; ?></p>
        <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
      </div>
    </div>

    <!-- sidebar menu: : style can be found in sidebar.less -->
    <!-- query menu -->
    <?php
    $role_id = $this->session->userdata('role_id');
    $queryMenu = "SELECT `user_menu`.`id`, `menu`
                      FROM `user_menu`
                      JOIN `user_access_menu` 
                      ON `user_menu`.`id` = `user_access_menu`.`menu_id`
                    WHERE `user_access_menu`.`role_id` = $role_id
                    ORDER BY `user_access_menu`.`menu_id` ASC
                      ";
    $menu = $this->db->query($queryMenu)->result_array();
    ?>

    <ul class="sidebar-menu" data-widget="tree">
      <?php foreach ($menu as $m) : ?>
        <li class="header"><?= $m['menu']; ?> </li>
        <!-- SIAPKAN SUB-MENU SESUAI MENU -->
        <?php
        $menuId = $m['id'];
        $querySubMenu = "SELECT *
                            FROM `user_sub_menu` JOIN `user_menu` 
                            ON `user_sub_menu`.`menu_id` = `user_menu`.`id`
                            WHERE `user_sub_menu`.`menu_id` = $menuId
                            AND `user_sub_menu`.`is_active` = 1
                            ";
        $subMenu = $this->db->query($querySubMenu)->result_array();
        ?>

        <?php foreach ($subMenu as $sm) : ?>
          <?php if ($title == $sm['title']) : ?>
            <li class="nav-item active">
            <?php else : ?>
            <li class="nav-item">
            <?php endif; ?>
            <a class="nav-link pb-0" href="<?= base_url($sm['url']); ?>">
              <i class="<?= $sm['icon']; ?>"></i>
              <span><?= $sm['title']; ?></span></a>
          </li>
        <?php endforeach; ?>

        <!-- Divider -->


      <?php endforeach; ?>
      <!-- <li class="treeview">
        <a href="#">
          <i class="fa fa-dashboard"></i> <span>Dashboard</span>
        </a>
      </li>
      <li class="header">LABELS</li>
      <li><a href="#"><i class="fa fa-circle-o text-red"></i> <span>Important</span></a></li>
      <li><a href="#"><i class="fa fa-circle-o text-yellow"></i> <span>Warning</span></a></li>
      <li><a href="#"><i class="fa fa-circle-o text-aqua"></i> <span>Information</span></a></li> -->
      <!-- Divider -->

      <li class="nav-item">
        <a class="nav-link" href="#" data-toggle="modal" data-target="#logoutModal">
          <i class="fas fa-fw fa-sign-out-alt"></i>
          <span>Logout</span></a>
      </li>
    </ul>

  </section>

  <!-- /.sidebar -->
</aside>

<!-- =============================================== -->