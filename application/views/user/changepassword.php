<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <!-- Main content -->
    <section class="content">
        <!--  -->
        <div class="row">
            <div class="col-md-9">
                <div class="nav-tabs-custom">
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="profile" data-toggle="tab"><?= $title ?></a></li>
                    </ul>
                    <div class="tab-content">
                        <?= $this->session->flashdata('message'); ?>

                        <div class="active tab-pane" id="profile">
                            <form class="form-horizontal" action="<?= base_url('user/changepassword'); ?>" method="post">
                                <label for="current_password" class="control-label">Password Lama</label>
                                <div class="form-group row">
                                    <div class="col-sm-12">
                                        <input type="password" class="form-control" id="current_password" name="current_password" placeholder="Masukkan password lama">
                                        <?= form_error('current_password', '<small class="text-danger ml-3">', '</small>'); ?>
                                    </div>
                                </div>
                                <label for="new_password1" class="control-label">Password Baru</label>
                                <div class="form-group row">
                                    <div class="col-sm-12">
                                        <input type="password" class="form-control" id="new_password1" name="new_password1" placeholder="Masukkan password baru">
                                        <?= form_error('new_password1', '<small class="text-danger ml-3">', '</small>'); ?>
                                    </div>
                                </div>
                                <label for="new_password2" class="control-label">Konfirmasi Password Baru</label>
                                <div class="form-group row">
                                    <div class="col-sm-12">
                                        <input type="password" class="form-control" id="new_password2" name="new_password2" placeholder="Konfirmasi password baru">
                                        <?= form_error('new_password2', '<small class="text-danger ml-3">', '</small>'); ?>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-sm-10">
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