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
                            <form class="form-horizontal">
                                <?= form_open_multipart('pasien/edit'); ?>
                                <div class="form-group">
                                    <label for="name" class="col-sm-2 control-label">Nama Lengkap</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" id="name" name="name" value="<?= $user['name']; ?>" readonly>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="email" class="col-sm-2 control-label">Alamat Email</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" id="email" name="email" value="<?= $user['email']; ?>" readonly>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="ttl" class="col-sm-2 control-label">Tempat Tanggal Lahir</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" id="ttl" name="ttl" value="<?= $user['tempat_lahir']; ?>, <?= $user['tgl_lahir']; ?>" readonly>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="anak_ke" class="col-sm-2 control-label">Anak Ke-</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" id="anak_ke" nama="anak_ke" value="<?= $user['anak_ke']; ?>" readonly>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="alamat" class="col-sm-2 control-label">Alamat</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" id="alamat" nama="alamat" value="<?= $user['alamat']; ?>" readonly>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="riwayat_pendidikan" class="col-sm-2 control-label">Pendidikan Terakhir</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" id="riwayat_pendidikan" nama="riwayat_pendidikan" value="<?= $user['riwayat_pendidikan']; ?>" readonly>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="usia" class="col-sm-2 control-label">Usia</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" id="usia" nama="usia" value="<?= $user['usia']; ?>" readonly>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="pekerjaan" class="col-sm-2 control-label">Pekerjaan</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" id="pekerjaan" nama="pekerjaan" value="<?= $user['pekerjaan']; ?>" readonly>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="perkawinan" class="col-sm-2 control-label">Status Perkawinan</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" id="perkawinan" nama="perkawinan" value="<?= $user['perkawinan']; ?>" readonly>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 control-label">Gambar Profile</label>
                                    <div class="col-sm-10">
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <img src="<?= base_url('assets/img/profile/') . $user['image']; ?>" class="img-thumbnail">
                                            </div>
                                            <div class="col-sm-9">
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input" id="image" name="image">
                                                    <label class="custom-file-label" for="image">Choose file</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-sm-offset-2 col-sm-10">
                                        <button type="submit" class="btn btn-primary">Simpan</button>
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