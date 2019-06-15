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
                            <form class="user" method="post" action="<?= base_url('owner/addpasien'); ?>">
                                <div class="form-group row">
                                    <label for="email" class="col-sm-2 col-form-label">Email</label>
                                    <div class="col-sm-6">
                                        <input type="email" class="form-control" id="email" name="email" placeholder="Masukkan alamat email" value=" <?= set_value('email'); ?>">
                                        <?= form_error('email', '<small class="text-danger ml-3">', '</small>'); ?>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="name" class="col-sm-2 col-form-label">Nama Lengkap</label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" id="name" name="name" placeholder="Masukkan nama lengkap" value="<?= set_value('name'); ?>">
                                        <?= form_error('name', '<small class="text-danger ml-3">', '</small>'); ?>
                                    </div>
                                </div>
                                <div class=" form-group row">
                                    <label for="password1" class="col-sm-2 control-label">Password</label>
                                    <div class="col-sm-4">
                                        <input type="password" class="form-control" id="password1" name="password1" placeholder="Password min. 7 karakter">
                                        <?= form_error('password1', '<small class="text-danger ml-3">', '</small>'); ?>
                                    </div>
                                </div>
                                <div class=" form-group row">
                                    <label for="password2" class="col-sm-2 control-label">Konfirmasi Password</label>
                                    <div class="col-sm-4">
                                        <input type="password" class="form-control" placeholder="Konfirmasi password" id="password2" name="password2">
                                    </div>
                                </div>
                                <div class=" form-group row">
                                    <label for="tempat_lahir" class="col-sm-2 control-label">Tempat Lahir</label>
                                    <div class="col-sm-4">
                                        <input class="form-control" id="tempat_lahir" name="tempat_lahir" placeholder="Masukkan tempat lahir" value="<?= set_value('tempat_lahir'); ?>">
                                    </div>
                                </div>
                                <div class=" form-group row">
                                    <label for="tempat_lahir" index="2" class="col-sm-2 control-label">Tanggal Lahir</label>
                                    <div class="col-sm-4 ">
                                        <input type="text" class="form-control pull-right" id="datepicker" placeholder="Masukkan tanggal lahir" name="tgl_lahir" value="<?= set_value('tgl_lahir'); ?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="usia" class="col-sm-2 control-label">Usia</label>
                                    <div class="col-sm-2">
                                        <input class="form-control" id="usia" name="usia" placeholder="Masukkan usia" value="<?= set_value('usia'); ?>">
                                    </div>
                                </div>
                                <div class=" form-group row">
                                    <label for="anak_ke" class="col-sm-2 control-label">Anak Ke-</label>
                                    <div class="col-sm-2">
                                        <input class="form-control" id="anak_ke" name="anak_ke" placeholder="Masukkan anak ke-" value="<?= set_value('anak_ke'); ?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="no_telp" class="col-sm-2 control-label">No. Telepon</label>
                                    <div class="col-sm-2">
                                        <input class="form-control" id="no_telp" name="no_telp" placeholder="Masukkan no. telpon" value="<?= set_value('no_telp'); ?>">
                                    </div>
                                </div>
                                <div class=" form-group row">
                                    <label for="riwayat_pendidikan" class="col-sm-2 control-label">Pendidikan Terakhir</label>
                                    <div class="col-sm-4">
                                        <select class="form-control select2" id="riwayat_pendidikan" name="riwayat_pendidikan" style="width: 100%;">
                                            <option>SD/Sederajat</option>
                                            <option>SMP/Sederajat</option>
                                            <option>SMA/Sederajat</option>
                                            <option>Lainnya</option>
                                        </select>
                                    </div>
                                </div>
                                <div class=" form-group row">
                                    <label for="pekerjaan" class="col-sm-2 control-label">Pekerjaan</label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" id="pekerjaan" name="pekerjaan" placeholder="Masukkan pekerjaan" value="<?= set_value('pekerjaan'); ?>">
                                    </div>
                                </div>
                                <div class=" form-group row">
                                    <label for="perkawinan" class="col-sm-2 control-label">Status Perkawinan</label>
                                    <div class="col-sm-4">
                                        <select class="form-control select2" name="perkawinan" id="perkawinan" style="width: 100%;">
                                            <option>Belum Menikah</option>
                                            <option>Sudah Menikah</option>
                                            <option>Cerai</option>
                                            <option>Lainnya</option>
                                        </select>
                                    </div>
                                </div>
                                <div class=" form-group row">
                                    <label for="alamat" class="col-sm-2 control-label">Alamat</label>
                                    <div class="col-sm-6">
                                        <textarea class="form-control" name="alamat" id="alamat" placeholder="Masukkan alamat" cols=" 20" rows="3"><?= set_value('alamat'); ?></textarea>
                                    </div>
                                </div>
                                <div class="form-group row justify-content-end">
                                    <div class="col-sm-offset-2 col-sm-10">
                                        <button type="submit" class="btn btn-primary">Simpan</button>
                                        <a href="<?= base_url('owner/pasien'); ?>" class="btn btn-default">Kembali</a>
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