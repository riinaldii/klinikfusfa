<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      <?= $title ?>
    </h1>
    <!-- <div class="col-lg-6">
            <?= form_error('terapis', '<div class="alert alert-danger" role="alert">', '</div>'); ?> -->
    <?= form_error('menu', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
    <?php if (validation_errors()) : ?>
      <div class="alert alert-danger" role="alert">
        <?= validation_errors(); ?>
      </div>
    <?php endif; ?>
  </section>

  <!-- Main content -->
  <section class="content">

    <?= $this->session->flashdata('message'); ?>
    <!-- Default box -->
    <div class="box">
      <div class="box-header with-border">
        <a href="<?= base_url('terapis/addpasien'); ?>" class="btn btn-primary mb-3">
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
              <th scope="col">Gambar Profile</th>
              <th scope="col">Nama Lengkap</th>
              <th scope="col">Email</th>
              <th scope="col">Alamat</th>
              <th scope="col">No. Telp</th>
              <th scope="col">Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php $i = 1; ?>
            <?php foreach ($pasien as $p) : ?>
              <tr>
                <!-- <th scope="row"><?= $i; ?></th> -->
                <td> <img class="profile-user-img img-responsive img-circle" src="<?= base_url('assets/img/profile/') . $p['image']; ?>" alt="User profile picture"></td>
                <td>
                  <a href="<?php echo base_url('terapis/detailpasien/' . $p['id']) ?>"><?= $p['name'] ?></a></td>
                <td><?= $p['email'] ?> </td>
                <td><?= $p['alamat'] ?> </td>
                <td><?= $p['no_telp'] ?> </td>
                <td>
                  <a href="<?php echo base_url('terapis/editpasien/' . $p['id']) ?>" class="btn btn-primary">Edit</a>
                  <a href="<?php echo base_url('terapis/buatjanji/' . $p['id']) ?>" class="btn btn-warning">Buat Janji</a>
                </td>
              </tr>
              <?php $i++; ?>
            <?php endforeach ?>
          </tbody>
          <tfoot>
            <tr>
              <th scope="col">Gambar Profile</th>
              <th scope="col">Nama Lengkap</th>
              <th scope="col">Email</th>
              <th scope="col">Alamat</th>
              <th scope="col">No. Telp</th>
              <th scope="col">Aksi</th>
            </tr>
          </tfoot>
        </table>
      </div>
      <!-- /.box-body -->
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

<!-- Modal Tambah Pasien -->
<div class="modal fade" id="addTerapisModal" tabindex="-1" role="dialog" aria-labelledby="addTerapisModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addTerapisModalLabel">Tambah Data Pasien</h5>
      </div>
      <div class="register-box-body">
        <form class="user" method="post" action="<?= base_url('Owner/addTerapis'); ?>">
          <div class="form-group has-feedback">
            <input type="text" id="name" name="name" class="form-control" placeholder="Nama lengkap">
            <span class="glyphicon  form-control-feedback"></span>
          </div>
          <?= form_error('name', '<small class="text-danger ml-3">', '</small>'); ?>
          <div class="form-group has-feedback">
            <input type="email" id="email" name="email" class="form-control" placeholder="Email">
            <span class="glyphicon  form-control-feedback"></span>
          </div>
          <?= form_error('email', '<small class="text-danger ml-3">', '</small>'); ?>
          <div class="form-group has-feedback">
            <input type="text" id="no_telp" name="no_telp" class="form-control" placeholder="No. Telepon">
            <span class="glyphicon  form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            <textarea type="email" id="alamat" name="alamat" class="form-control" placeholder="Alamat"></textarea>
            <span class="glyphicon  form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            <input type="password" id="password1" name="password1" class="form-control" placeholder="Password">
            <span class="glyphicon  form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            <input type="password" id="password2" name="password2" class="form-control" placeholder="Ulangi password">
            <span class="glyphicon  form-control-feedback"></span>
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

<!-- Modal Buat Janji-->
<div class="modal fade" id="janjiTemuModal" tabindex="-1" role="dialog" aria-labelledby="janjiTemuModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="janjiTemuModalLabel">Buat Janji Temu</h5>
      </div>
      <form action="<?= base_url('pasien/janjitemu'); ?>" method="post">
        <div class="modal-body">
          <div class="form-group">
            <input type="hidden" name="id" id="id" value="<?= $user['id']; ?>">
          </div>
          <div class="form-group">
            <label>Pilih layanan</label>
            <select name="layanan" id="layanan" class="form-control select width:100%;">
              <option value="">Pilih Layanan</option>
              <?php foreach ($layanan as $l) : ?>
                <option value="<?= $l['nama_layanan']; ?>"><?= $l['nama_layanan'] ?></option>
              <?php endforeach; ?>
            </select>
          </div>
          <div class="form-group">
            <label>Tanggal temu</label>
            <div class="input-group date">
              <div class="input-group-addon">
                <i class="fa fa-calendar"></i>
              </div>
              <input type="text" class="form-control pull-right" name="tgl_temu" id="datepicker">
            </div>
            <?= form_error('tgl_temu', '<small class="text-danger ml-3">', '</small>'); ?>
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
                  <input type="text" name="waktu" id="waktu" class="form-control timepicker">
                </div>
                <!-- /.input group -->
              </div>
              <!-- /.form group -->
            </div>
          </div>
          <div class="form-group">
            <label>Keluhan</label>
            <textarea class="form-control" rows="3" name="keluhan" id="keluhan" placeholder="Masukkan Keluhan"></textarea>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
          <button type="submit" class="btn btn-primary">Buat Janji</button>
        </div>
      </form>
    </div>
  </div>
</div>


<!-- Modal Edit Terapis-->
<div class="modal fade" id="editTerapisModal" tabindex="1" role="dialog" aria-labelledby="editTerapisModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editTerapisModalLabel">Edit Data Terapis</h5>
      </div>
      <div class="register-box-body">

        <?= form_open_multipart('owner/editTerapis'); ?>
        <div class="form-group has-feedback">
          <input type="text" id="name" name="name" class="form-control" value="<?= $t['name'] ?> ">
          <span class="glyphicon  form-control-feedback"></span>
        </div>
        <div class="form-group has-feedback">
          <input type="email" id="email" name="email" class="form-control" <?= $t['email'] ?>>
          <span class="glyphicon  form-control-feedback"></span>
        </div>
        <div class="form-group has-feedback">
          <input type="text" id="no_telp" name="no_telp" class="form-control" placeholder="No. Telepon">
          <span class="glyphicon  form-control-feedback"></span>
        </div>
        <div class="form-group has-feedback">
          <textarea type="email" id="alamat" name="alamat" class="form-control" placeholder="Alamat"></textarea>
          <span class="glyphicon  form-control-feedback"></span>
        </div>
        <div class="form-group has-feedback">
          <input type="password" id="password1" name="password1" class="form-control" placeholder="Password">
          <span class="glyphicon  form-control-feedback"></span>
        </div>
        <div class="form-group has-feedback">
          <input type="password" id="password2" name="password2" class="form-control" placeholder="Ulangi password">
          <span class="glyphicon  form-control-feedback"></span>
        </div>
        <div class="form-group has-feedback">
          <label class="control-label">Gambar Profile</label>
          <div class="row">
            <div class="col-sm-9">
              <div class="col-sm-3">
                <img src="<?= base_url('assets/img/profile/') . $user['image']; ?>" class="img-thumbnail">
              </div>
              <div class="custom-file">
                <input type="file" class="custom-file-input" id="image" name="image">
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <!-- /.col -->
          <div class="col-xs-12">
            <button type="submit" class="btn btn-primary btn-block btn-flat">Simpan data</button>
            <button type="button" class="btn btn-secondary btn-block btn-flat" data-dismiss="modal">Kembali</button>
          </div>
          <!-- /.col -->
        </div>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- Modal Detail Terapis-->
<div class="modal fade" id="detailTerapisModal" tabindex="2" role="dialog" aria-labelledby="detailTerapisModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="detailTerapisModalLabel">Detail terapis</h5>
      </div>
      <div class="register-box-body">

        <form action="#" method="post">
          <div class="form-group has-feedback">
            <input type="text" id="name" name="name" class="form-control" placeholder="Nama lengkap">
            <span class="glyphicon  form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            <input type="email" id="email" name="email" class="form-control" placeholder="Email">
            <span class="glyphicon  form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            <input type="text" id="no_telp" name="no_telp" class="form-control" placeholder="No. Telepon">
            <span class="glyphicon  form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            <textarea type="email" id="alamat" name="alamat" class="form-control" placeholder="Alamat"></textarea>
            <span class="glyphicon  form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            <input type="password" id="password1" name="password1" class="form-control" placeholder="Password">
            <span class="glyphicon  form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            <input type="password" id="password2" name="password2" class="form-control" placeholder="Ulangi password">
            <span class="glyphicon  form-control-feedback"></span>
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

<!-- Modal Hapus Terapis-->
<div class="modal fade" id="hapusPasienModal" tabindex="3" role="dialog" aria-labelledby="hapusTPasienModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body">Yakin ingin menghapus data <?= $p['email']; ?>?.</div>
      <div class="modal-footer">
        <button class="btn btn-secondary" type="button" data-dismiss="modal">Kembali</button>
        <a class="btn btn-primary">Hapus</a>
      </div>
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