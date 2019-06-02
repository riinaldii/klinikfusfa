<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      <?= $title ?>
    </h1>
    <div class="col-lg-6">
      <?= form_error('menu', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
  </section>

  <!-- Main content -->
  <section class="content">

    <?= $this->session->flashdata('message'); ?>
    <!-- Default box -->
    <div class="box">
      <div class="box-header with-border">
        <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#addPasienModal">
          Tambah data</a>
        <div class="box-tools pull-right">
          <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
            <i class="fa fa-minus"></i></button>
        </div>
      </div>
      <div class="box-body">
        <table id="example1" class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>Nama Lengkap</th>
              <th>Email</th>
              <th>Alamat</th>
              <th>No. Telp</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>Nama Lengkap</td>
              <td>Email</td>
              <td>Alamat</td>
              <td>No. Telp</td>
              <td>
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editPasienModal">Edit</button>
                <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#detailPasienModal">Detail</button>
                <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#buatJanjiModal">Buat janji temu</button>
                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#hapusPasienModal">Hapus</button>
              </td>
            </tr>
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

<!-- Modal Tambah Pasien-->
<div class="modal fade" id="addPasienModal" tabindex="-1" role="dialog" aria-labelledby="addPasiensModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addPasienModalLabel">Tambah pasien</h5>
      </div>
      <div class="register-box-body">

        <form action="#" method="post">
          <div class="form-group has-feedback">
            <input type="text" class="form-control" placeholder="Nama lengkap">
            <span class="glyphicon glyphicon-user form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            <input type="email" class="form-control" placeholder="Email">
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            <input type="password" class="form-control" placeholder="Password">
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            <input type="password" class="form-control" placeholder="Ulangi password">
            <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
          </div>
          <div class="row">
            <!-- /.col -->
            <div class="col-xs-12">
              <button type="submit" class="btn btn-primary btn-block btn-flat">Tambah data</button>
              <button type="button" class="btn btn-secondary btn-block btn-flat" data-dismiss="modal">Kembali</button>
            </div>
            <!-- /.col -->
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- Modal Edit Pasien-->
<div class="modal fade" id="editPasienModal" tabindex="-1" role="dialog" aria-labelledby="editPasienModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editPasienModalLabel">Edit pasien</h5>
      </div>
      <div class="register-box-body">

        <form action="#" method="post">
          <div class="form-group has-feedback">
            <input type="text" class="form-control" placeholder="Nama lengkap">
            <span class="glyphicon glyphicon-user form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            <input type="email" class="form-control" placeholder="Email">
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            <input type="password" class="form-control" placeholder="Password">
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            <input type="password" class="form-control" placeholder="Ulangi password">
            <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
          </div>
          <div class="row">
            <!-- /.col -->
            <div class="col-xs-12">
              <button type="submit" class="btn btn-primary btn-block btn-flat">Update data</button>
              <button type="button" class="btn btn-secondary btn-block btn-flat" data-dismiss="modal">Kembali</button>
            </div>
            <!-- /.col -->
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- Modal Detail Pasien-->
<div class="modal fade" id="detailPasienModal" tabindex="-1" role="dialog" aria-labelledby="detailPasienModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="detailPasienModalLabel">Detail pasien</h5>
      </div>
      <div class="register-box-body">

        <form action="#" method="post">
          <div class="form-group has-feedback">
            <input type="text" class="form-control" placeholder="Nama lengkap">
            <span class="glyphicon glyphicon-user form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            <input type="email" class="form-control" placeholder="Email">
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            <input type="password" class="form-control" placeholder="Password">
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            <input type="password" class="form-control" placeholder="Ulangi password">
            <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
          </div>
          <div class="row">
            <!-- /.col -->
            <div class="col-xs-12">
              <button type="button" class="btn btn-secondary btn-block btn-flat" data-dismiss="modal">Kembali</button>
            </div>
            <!-- /.col -->
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- Modal Hapus Pasien-->
<div class="modal fade" id="hapusPasienModal" tabindex="-1" role="dialog" aria-labelledby="hapusPasienModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body">Ingin hapus data?.</div>
      <div class="modal-footer">
        <button class="btn btn-secondary" type="button" data-dismiss="modal">Kembali</button>
        <a class="btn btn-primary" href="<?= base_url('#'); ?>">Hapus</a>
      </div>
    </div>
  </div>
</div>

<!-- Modal Buat Janji-->
<div class="modal fade" id="buatJanjiModal" tabindex="-1" role="dialog" aria-labelledby="buatJanjiModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="buatJanjiModalLabel">Buat Janji Temu</h5>
      </div>
      <form action="<?= base_url('#'); ?>" method="post">
        <div class="modal-body">
          <div class="form-group">
            <label>Pilih layanan</label>
            <select name="menu_id" id="menu_id" class="form-control select2 width:100%;">
              <option value="">Pilih Layanan</option>
              <?php foreach ($menu as $m) : ?>
                <option value="<?= $m['id']; ?>"><?= $m['menu'] ?></option>
              <?php endforeach; ?>
            </select>
          </div>
          <div class="form-group">
            <label>Tanggal temu</label>
            <div class="input-group date">
              <div class="input-group-addon">
                <i class="fa fa-calendar"></i>
              </div>
              <input type="text" class="form-control pull-right" id="datepicker">
            </div>
            <!-- /.input group -->
          </div>
          <div class="form-group">
            <div class="bootstrap-timepicker">
              <div class="form-group">
                <label>Waktu temu</label>
                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-clock-o"></i>
                  </div>
                  <input type="text" class="form-control timepicker">
                </div>
                <!-- /.input group -->
              </div>
              <!-- /.form group -->
            </div>
          </div>
          <div class="form-group">
            <label>Keluhan</label>
            <textarea class="form-control" rows="3" placeholder="Enter ..."></textarea>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
          <button type="submit" class="btn btn-primary">Buat</button>
        </div>
      </form>
    </div>
  </div>
</div>

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