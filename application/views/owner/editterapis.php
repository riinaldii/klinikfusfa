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
                            <?= form_open_multipart('owner/editterapis'); ?>
                            <div class="form-group row">
                                <label for="email" class="col-sm-2 col-form-label">Email</label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" id="email" name="email" value="<?= $terapis['email']; ?>" readonly>
                                    <?= form_error('email', '<small class="text-danger ml-3">', '</small>'); ?>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="name" class="col-sm-2 col-form-label">Nama Lengkap</label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" id="name" name="name" value="<?= $terapis['name']; ?>">
                                    <?= form_error('name', '<small class="text-danger ml-3">', '</small>'); ?>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="tempat_lahir" class="col-sm-2 control-label">Tempat Lahir</label>
                                <div class="col-sm-4">
                                    <input class="form-control" id="tempat_lahir" name="tempat_lahir" value="<?= $terapis['tempat_lahir']; ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="tempat_lahir" class="col-sm-2 control-label">Tanggal Lahir</label>
                                <div class="col-sm-2 ">
                                    <input type="text" class="form-control pull-right" id="datepicker" name="tgl_lahir" value="<?= $terapis['tgl_lahir']; ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="alamat" class="col-sm-2 control-label">Alamat</label>
                                <div class="col-sm-6">
                                    <textarea class="form-control" name="alamat" id="alamat" cols="20" rows="3"><?= $terapis['alamat']; ?></textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="no_telp" class="col-sm-2 control-label">No. Telepon</label>
                                <div class="col-sm-2">
                                    <input class="form-control" id="no_telp" name="no_telp" value="<?= $terapis['no_telp']; ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="riwayat_pendidikan" class="col-sm-2 control-label">Riwayat Pendidikan</label>
                                <div class="col-sm-6">
                                    <textarea class="form-control" name="riwayat_pendidikan" id="riwayat_pendidikan" cols="20" rows="3"><?= $terapis['riwayat_pendidikan']; ?></textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="usia" class="col-sm-2 control-label">Usia</label>
                                <div class="col-sm-2">
                                    <input class="form-control" id="usia" name="usia" value="<?= $terapis['usia']; ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 control-label">Gambar Profile</label>
                                <div class="col-sm-10">
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <img src="<?= base_url('assets/img/profile/') . $terapis['image']; ?>" class="img-thumbnail">
                                        </div>
                                        <div class="col-sm-9">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="image" name="image">
                                                <!-- <label class="custom-file-label" for="image">Choose file</label> -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row justify-content-end">
                                <div class="col-sm-offset-2 col-sm-10">
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                    <a href="<?= base_url('owner/terapis'); ?>" class="btn btn-default">Kembali</a>
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