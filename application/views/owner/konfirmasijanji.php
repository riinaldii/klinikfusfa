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
                            <form action="<?= base_url('owner/konfirmasijanji'); ?>" method="post">
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label>Tanggal temu</label>
                                        <div class="input-group date  col-sm-6">
                                            <div class="input-group-addon">
                                                <i class="fa fa-calendar"></i>
                                            </div>
                                            <input type="text" class="form-control pull-right" name="tgl_temu" id="datepicker" value="<?= $janjitemu['tgl_temu']; ?>">
                                        </div>
                                        <!-- /.input group -->
                                    </div>
                                    <?= form_error('tgl_temu', '<small class="text-danger ml-3">', '</small>'); ?>
                                    <div class="form-group">
                                        <div class="bootstrap-timepicker ">
                                            <label>Waktu temu</label>
                                            <div class="input-group col-sm-6">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-clock-o"></i>
                                                </div>
                                                <input type="text" name="waktu" id="waktu" class="form-control timepicker" value="<?= $janjitemu['waktu']; ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <?= form_error('waktu', '<small class="text-danger ml-3">', '</small>'); ?>
                                    <div class="form-group row">
                                        <label for="terapis" class="col-sm-2 control-label">Pilih Terapis</label>
                                        <div class="col-sm-4">
                                            <select name="id_terapis" id="id_terapis" class="form-control select width:100%;">
                                                <?php foreach ($terapis as $t) : ?>
                                                    <option value="<?= $t['id']; ?>"><?= $t['name'] ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                    <?= form_error('terapis', '<small class="text-danger ml-3">', '</small>'); ?>
                                    <div class="form-group row">
                                        <label for="name" class="col-sm-2 control-label">Nama Pasien</label>
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control" name="name" id="name" value="<?= $janjitemu['psn']; ?>" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="layanan" class="col-sm-2 control-label">Layanan</label>
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control" name="layanan" id="layanan" value="<?= $janjitemu['layanan']; ?>" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="keluhan" class="col-sm-2 control-label">Keluhan</label>
                                        <div class="col-sm-4">
                                            <textarea class="form-control" rows="4" name="keluhan" id="keluhan" readonly><?= $janjitemu['keluhan']; ?></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div>
                                            <input type="hidden" name="id_jt" id="id_jt" value="<?= $janjitemu['id_jt']; ?>">
                                            <input type="hidden" name="id_pasien" id="id_pasien" value="<?= $janjitemu['id_pasien']; ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-10">
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                    <a href="<?= base_url('owner/index'); ?>" class="btn btn-default">Kembali</a>
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