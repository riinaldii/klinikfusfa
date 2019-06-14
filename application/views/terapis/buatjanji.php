<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <!-- Main content -->
    <section class="content">
        <!--  -->
        <div class="row">
            <div class="col-md-12">
                <div class="nav-tabs-custom">
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="profile" data-toggle="tab"><?= $title ?></a></li>
                    </ul>
                    <div class="tab-content">
                        <div class="active tab-pane" id="profile">

                            <form action="<?= base_url('terapis/buatjanji'); ?>" method="post">
                                <div class="modal-body">
                                    <div class="form-group">
                                        <input type="hidden" name="id_pasien" id="id_pasien" value="<?= $pasien['id']; ?>">
                                    </div>
                                    <div class="form-group row">
                                        <label for="name_terapis" class="col-sm-2 control-label">Nama Pasien</label>
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control" name="name_pasien" id="name_pasien" value="<?= $pasien['name']; ?>" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <input type="hidden" name="id_terapis" id="id_terapis" value="<?= $user['id']; ?>">
                                    </div>
                                    <div class="form-group row">
                                        <label for="name_terapis" class="col-sm-2 control-label">Nama Terapis</label>
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control" name="name_terapis" id="name_terapis" value="<?= $user['name']; ?>" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="layanan" class="col-sm-2 control-label">Pilih layanan</label>
                                        <div class="col-sm-4">
                                            <select name="layanan" id="layanan" class="form-control select width:100%;">
                                                <?php foreach ($layanan as $l) : ?>
                                                    <option value="<?= $l['nama_layanan']; ?>"><?= $l['nama_layanan'] ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="tgl_temu" class="col-sm-2 control-label">Tanggal temu</label>
                                        <div class="input-group date">
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control pull-right" name="tgl_temu" id="datepicker" value="<?= set_value('tgl_temu'); ?>">
                                                <?= form_error('tgl_temu', '<small class="text-danger ml-3">', '</small>'); ?>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="waktu" class="col-sm-2 control-label">Waktu temu</label>
                                        <div class="col-sm-10">
                                            <div class="input-group bootstrap-timepicker col-sm-2">
                                                <input type="text" name="waktu" id="waktu" class="form-control timepicker" value="<?= set_value('waktu'); ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <?= form_error('waktu', '<small class="text-danger ml-3">', '</small>'); ?>
                                    <div class="form-group">
                                        <label for="keluhan" class="control-label">Keluhan</label>
                                        <textarea class="form-control" rows="4" name="keluhan" id="keluhan"><?= set_value('keluhan'); ?></textarea>
                                    </div>
                                </div>
                                <div class="col-sm-10">
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                </div>
                            </form>
                            <div class="form-group row justify-content-end">
                            </div>

                        </div>
                        <!-- /.tab-pane -->
                    </div>
                    <!-- /.tab-content -->
                </div>
                <!-- /.nav-tabs-custom -->
            </div>
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