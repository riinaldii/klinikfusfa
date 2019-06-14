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
                            <?= form_open_multipart('terapis/updatejanji'); ?>
                            <div class="modal-body">
                                <div class="form-group row">
                                    <div>
                                        <input type="hidden" name="id_jt" id="id_jt" value="<?= $janjitemu['id_jt']; ?>">
                                        <input type="hidden" name="id_pasien" id="id_pasien" value="<?= $janjitemu['id_pasien']; ?>">
                                        <input type="hidden" name="id_terapis" id="id_terapis" value="<?= $janjitemu['id_terapis']; ?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="name" class="col-sm-2 control-label">Nama Pasien</label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" name="name" id="name" value="<?= $janjitemu['psn']; ?>" readonly>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="keluhan" class="col-sm-2 control-label">Keluhan</label>
                                    <div class="col-sm-4">
                                        <textarea class="form-control" rows="4" name="keluhan" id="keluhan" readonly><?= $janjitemu['keluhan']; ?></textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="layanan" class="col-sm-2 control-label">Layanan</label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" name="layanan" id="layanan" value="<?= $janjitemu['layanan']; ?>" readonly>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="terapis" class="col-sm-2 control-label">Terapis</label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" name="terapis" id="terapis" value="<?= $janjitemu['trp']; ?>" readonly>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="tgl_temu" class="col-sm-2 control-label">Tanggal temu</label>
                                    <div class="input-group date">
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control pull-right" name="tgl_temu" id="datepicker" value="<?= $janjitemu['tgl_temu']; ?>">
                                        </div>
                                    </div>
                                </div>
                                <?= form_error('tgl_temu', '<small class="text-danger ml-3">', '</small>'); ?>
                                <div class="form-group row">
                                    <label for="waktu" class="col-sm-2 control-label">Waktu temu</label>
                                    <div class="col-sm-10">
                                        <div class="input-group bootstrap-timepicker col-sm-2">
                                            <input type="text" name="waktu" id="waktu" class="form-control timepicker" value="<?= $janjitemu['waktu']; ?>">
                                        </div>
                                    </div>
                                </div>
                                <?= form_error('waktu', '<small class="text-danger ml-3">', '</small>'); ?>
                                <div class="form-group row">
                                    <label for="status" class="col-sm-2 control-label">Perbarui Status</label>
                                    <div class="col-sm-4">
                                        <select class="form-control select2" name="status" id="status" style="width: 100%;">
                                            <option>Selesai</option>
                                            <option>Janji Temu Baru</option>
                                            <option>Pindah Layanan</option>
                                        </select>
                                    </div>
                                </div>
                                <?= form_error('status', '<small class="text-danger ml-3">', '</small>'); ?>
                                <div class="form-group row">
                                    <label for="penyakit" class="col-sm-2 control-label">Hasil Diagnosa</label>
                                    <div class="col-sm-4">
                                        <select name="penyakit" id="penyakit" style="width: 100%;" class="form-control select2">
                                            <?php foreach ($penyakit as $lp) : ?>
                                                <option value="<?= $lp['nama_penyakit']; ?>"><?= $lp['nama_penyakit'] ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                                <?= form_error('penyakit', '<small class="text-danger ml-3">', '</small>'); ?>
                                <div class="form-group row">
                                    <label class="col-sm-2 control-label">Upload Laporan Diagnosa</label>
                                    <div class="col-sm-10">
                                        <div class="row">
                                            <div class="col-sm-9">
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input" id="laporan_diagnosis" name="laporan_diagnosis">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
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