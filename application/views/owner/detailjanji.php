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
                            <?= form_open_multipart('owner/detailjanji'); ?>
                            <div class="modal-body">
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
                                    <label for="terapis" class="col-sm-2 control-label">Tanggal & Waktu Temu</label>
                                    <div class="col-sm-2">
                                        <input type="text" class="form-control" name="terapis" id="terapis" value="<?= $janjitemu['tgl_temu']; ?>" readonly>
                                    </div>
                                    <div class="col-sm-2">
                                        <input type="text" class="form-control" name="terapis" id="terapis" value="<?= $janjitemu['waktu']; ?>" readonly>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="terapis" class="col-sm-2 control-label">Status</label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" name="terapis" id="terapis" value="<?= $janjitemu['status']; ?>" readonly>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="terapis" class="col-sm-2 control-label">Hasil Diagnosis</label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" name="terapis" id="terapis" value="<?= $janjitemu['penyakit']; ?>" readonly>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div>
                                        <input type="hidden" name="id_jt" id="id_jt" value="<?= $janjitemu['id_jt']; ?>">
                                        <input type="hidden" name="id_pasien" id="id_pasien" value="<?= $janjitemu['id_pasien']; ?>">
                                        <input type="hidden" name="id_terapis" id="id_terapis" value="<?= $janjitemu['id_terapis']; ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-10">
                                <a href="<?php echo base_url('owner/updatejanji/' . $janjitemu['id_jt']) ?>" class="btn btn-success">Update Janji</a>
                                <a href="<?= base_url('owner/janjitemu'); ?>" class="btn btn-default">Kembali</a>
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