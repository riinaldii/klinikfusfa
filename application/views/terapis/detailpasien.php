<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <!-- Main content -->
    <section class="content">

        <div class="row">
            <div class="col-sm-12">
                <?= $this->session->flashdata('message'); ?>
            </div>
            <div class="col-md-12">
                <!-- Profile Image -->
                <div class="box box-primary">
                    <div class="box-body box-profile">

                        <img class="profile-user-img img-responsive img-circle" src="<?= base_url('assets/img/profile/') . $pasien['image']; ?>" alt="User profile picture">

                        <h3 class="profile-username text-center"><?= $pasien['name']; ?></h3>
                        <p class="text-muted text-center"><small><i> <?= $pasien['email']; ?></i></s> </p>

                        <p class="text-muted text-center">Member sejak <?= date('d F Y', $pasien['date_created']); ?></p>
                        <!-- 
            <a href="#" class="btn btn-primary btn-block"><b>Follow</b></a> -->
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->

                <!-- profile tab -->
                <div class="nav-tabs-custom">
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="profile" data-toggle="tab"><?= $title ?></a></li>
                    </ul>
                    <div class="tab-content">

                        <div class="active tab-pane" id="profile">
                            <form class="form-horizontal">
                                <div class="form-group">
                                    <label for="name" class="col-sm-2 control-label">Nama Lengkap</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" id="name" name="name" value="<?= $pasien['name']; ?>" readonly>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="email" class="col-sm-2 control-label">Alamat Email</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" id="email" name="email" value="<?= $pasien['email']; ?>" readonly>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="ttl" class="col-sm-2 control-label">Tempat Tanggal Lahir</label>
                                    <div class="col-sm-6">
                                        <input class="form-control" id="ttl" name="ttl" value="<?= $pasien['tempat_lahir']; ?>" readonly>
                                    </div>
                                    <div class="col-sm-4">
                                        <input class="form-control" id="ttl" name="ttl" value="<?= $pasien['tgl_lahir']; ?>" readonly>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="anak_ke" class="col-sm-2 control-label">Anak Ke-</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" id="anak_ke" nama="anak_ke" value="<?= $pasien['anak_ke']; ?>" readonly>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="alamat" class="col-sm-2 control-label">Alamat</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" id="alamat" nama="alamat" value="<?= $pasien['alamat']; ?>" readonly>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="no_telp" class="col-sm-2 control-label">No. Telepon</label>
                                    <div class="col-sm-2">
                                        <input class="form-control" id="no_telp" name="no_telp" value="<?= $pasien['no_telp']; ?>" readonly>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="riwayat_pendidikan" class="col-sm-2 control-label">Pendidikan Terakhir</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" id="riwayat_pendidikan" nama="riwayat_pendidikan" value="<?= $pasien['riwayat_pendidikan']; ?>" readonly>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="usia" class="col-sm-2 control-label">Usia</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="usia" nama="usia" value="<?= $pasien['usia']; ?>" readonly>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="pekerjaan" class="col-sm-2 control-label">Pekerjaan</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" id="pekerjaan" nama="pekerjaan" value="<?= $pasien['pekerjaan']; ?>" readonly>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="perkawinan" class="col-sm-2 control-label">Status Perkawinan</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" id="perkawinan" nama="perkawinan" value="<?= $pasien['perkawinan']; ?>" readonly>
                                    </div>
                                </div>

                                <div class="form-group row justify-content-end">
                                    <div class="col-sm-offset-2 col-sm-10">
                                        <a href="<?= base_url('terapis/index'); ?>" class="btn btn-default">Kembali</a>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!-- /.tab-pane -->
                    </div>
                    <!-- /.tab-content -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
            <!-- <div class="col-md-9"> -->
            <!-- /.nav-tabs-custom -->
            <!-- </div> -->
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