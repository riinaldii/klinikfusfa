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
                            <?= form_open_multipart('owner/editpenyakit'); ?>
                            <div class="form-group row">
                                <label for="email" class="col-sm-2 col-form-label">Nama Penyakit</label>
                                <div class="col-sm-6">
                                    <input type="hidden" class="form-control" id="id" name="id" value="<?= $penyakit['id']; ?>" readonly>
                                    <input type="text" class="form-control" id="nama_penyakit" name="nama_penyakit" value="<?= $penyakit['nama_penyakit']; ?>" readonly>
                                    <?= form_error('nama_layanan', '<small class="text-danger ml-3">', '</small>'); ?>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="name" class="col-sm-2 col-form-label">Keterangan</label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" id="keterangan" name="keterangan" value="<?= $penyakit['keterangan']; ?>">
                                    <?= form_error('keterangan', '<small class="text-danger ml-3">', '</small>'); ?>
                                </div>
                            </div>
                            <div class="form-group row justify-content-end">
                                <div class="col-sm-offset-2 col-sm-10">
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                    <a href="<?= base_url('owner/penyakit'); ?>" class="btn btn-default">Kembali</a>
                                </div>
                            </div>
                            </form>
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