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
        Daftar Janji Temu
        <div class="box-tools pull-right">
          <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
            <i class="fa fa-minus"></i></button>
        </div>
      </div>
      <div class="box-body">
        <table id="example1" class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>Layanan</th>
              <th>Tanggal & Waktu Temu</th>
              <th>Terapis</th>
              <th>Keluhan</th>
              <th>Hasil Diagnosis</th>
              <th>Status</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($janjitemu as $jt) : ?>
              <tr>
                <td><?= $jt['layanan'] ?></td>
                <td><?= $jt['tgl_temu'] ?> | <?= $jt['waktu'] ?></td>
                <td><?= $jt['trp'] ?></td>
                <td><?= $jt['keluhan'] ?></td>
                <td><?= $jt['laporan_diagnosis'] ?></td>
                <td><?= $jt['status'] ?></td>
                <td>
                  <a href="<?php echo base_url('pasien/editjanji/' . $jt['id_jt']) ?>" class="btn btn-success"><i class="fa fa-edit"> Edit Janji </i></a>
                  <a href="<?php echo base_url('pasien/editjanji/' . $jt['id_jt']) ?>" class="btn btn-primary"><i class="fa fa-edit"> Detail </i></a><br>
                </td>
              </tr>
            <?php endforeach ?>
          </tbody>
          <tfoot>
            <tr>
              <th>Layanan</th>
              <th>Tanggal & Waktu Temu</th>
              <th>Terapis</th>
              <th>Keluhan</th>
              <th>Hasil Diagnosis</th>
              <th>Status</th>
              <th>Aksi</th>
            </tr>
          </tfoot>
        </table>
      </div>
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

<!-- Modal Edit Janji-->
<div class="modal fade" id="editJanjiTemuModal" tabindex="-1" role="dialog" aria-labelledby="editJanjiTemuModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editJanjiTemuModalLabel">Edit Janji Temu</h5>
      </div>
      <form action="<?= base_url('pasien/editjanji'); ?>" method="post">
        <div class="modal-body">
          <div class="form-group">
            <input type="text" name="id" id="id" value="<?= $janji['id_jt']; ?>">
          </div>
          <div class="form-group">
            <label>Pilih layanan</label>
            <select name="layanan" id="layanan" class="form-control select width:100%;" value="<?= $jt['nama_layanan']; ?>">
              <option value="">Pilih Layanan</option>
              <?php foreach ($layanan as $l) : ?>
                <option value="<?= $l['id']; ?>"><?= $l['nama_layanan'] ?></option>
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