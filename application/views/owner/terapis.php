<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <?= $title ?>
        </h1>
        <div class="col-lg-6">
            <?= form_error('menu', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
    </section>

    <!-- Main content -->
    <section class="content">

        <?= $this->session->flashdata('message'); ?>
        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#addTerapisModal">
                    Tambah data</a>
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                        <i class="fa fa-minus"></i></button>
                </div>
            </div>
            <div class="box-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Nama Lengkap</th>
                            <th>Email</th>
                            <th>Alamat</th>
                            <th>No. Telp</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Nama Lengkap</td>
                            <td>Email</td>
                            <td>Alamat</td>
                            <td>No. Telp</td>
                            <td>
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editTerapisModal">Edit</button>
                                <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#detailTerapisModal">Detail</button>
                                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#hapusTerapisModal">Hapus</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <!-- /.box-body -->`
        </div>
        <!-- /.box -->

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

<!-- Modal Tambah Terapis-->
<div class="modal fade" id="addTerapisModal" tabindex="-1" role="dialog" aria-labelledby="addTerapisModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addTerapisModalLabel">Tambah terapis</h5>
            </div>
            <div class="register-box-body">

                <form action="#" method="post">
                    <div class="form-group has-feedback">
                        <input type="text" class="form-control" placeholder="Nama lengkap">
                        <span class="glyphicon glyphicon-user form-control-feedback"></span>
                    </div>
                    <div class="form-group has-feedback">
                        <input type="email" class="form-control" placeholder="Email">
                        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                    </div>
                    <div class="form-group has-feedback">
                        <input type="password" class="form-control" placeholder="Password">
                        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                    </div>
                    <div class="form-group has-feedback">
                        <input type="password" class="form-control" placeholder="Ulangi password">
                        <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
                    </div>
                    <div class="row">
                        <!-- /.col -->
                        <div class="col-xs-12">
                            <button type="submit" class="btn btn-primary btn-block btn-flat">Tambah data</button>
                            <button type="button" class="btn btn-secondary btn-block btn-flat" data-dismiss="modal">Kembali</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal Edit Terapis-->
<div class="modal fade" id="editTerapisModal" tabindex="1" role="dialog" aria-labelledby="editTerapisModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editTerapisModalLabel">Edit terapis</h5>
            </div>
            <div class="register-box-body">

                <form action="#" method="post">
                    <div class="form-group has-feedback">
                        <input type="text" class="form-control" placeholder="Nama lengkap">
                        <span class="glyphicon glyphicon-user form-control-feedback"></span>
                    </div>
                    <div class="form-group has-feedback">
                        <input type="email" class="form-control" placeholder="Email">
                        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                    </div>
                    <div class="form-group has-feedback">
                        <input type="password" class="form-control" placeholder="Password">
                        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                    </div>
                    <div class="form-group has-feedback">
                        <input type="password" class="form-control" placeholder="Ulangi password">
                        <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
                    </div>
                    <div class="row">
                        <!-- /.col -->
                        <div class="col-xs-12">
                            <button type="submit" class="btn btn-primary btn-block btn-flat">Update data</button>
                            <button type="button" class="btn btn-secondary btn-block btn-flat" data-dismiss="modal">Kembali</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal Detail Terapis-->
<div class="modal fade" id="detailTerapisModal" tabindex="2" role="dialog" aria-labelledby="detailTerapisModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="detailTerapisModalLabel">Detail terapis</h5>
            </div>
            <div class="register-box-body">

                <form action="#" method="post">
                    <div class="form-group has-feedback">
                        <input type="text" class="form-control" placeholder="Nama lengkap">
                        <span class="glyphicon glyphicon-user form-control-feedback"></span>
                    </div>
                    <div class="form-group has-feedback">
                        <input type="email" class="form-control" placeholder="Email">
                        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                    </div>
                    <div class="form-group has-feedback">
                        <input type="password" class="form-control" placeholder="Password">
                        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                    </div>
                    <div class="form-group has-feedback">
                        <input type="password" class="form-control" placeholder="Ulangi password">
                        <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
                    </div>
                    <div class="row">
                        <!-- /.col -->
                        <div class="col-xs-12">
                            <button type="button" class="btn btn-secondary btn-block btn-flat" data-dismiss="modal">Kembali</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal Hapus Terapis-->
<div class="modal fade" id="hapusTerapisModal" tabindex="3" role="dialog" aria-labelledby="hapusTerapisModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">Ingin hapus data?.</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Kembali</button>
                <a class="btn btn-primary" href="<?= base_url('#'); ?>">Hapus</a>
            </div>
        </div>
    </div>
</div>

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
    <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
        <!-- <li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li> -->
        <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" id="control-sidebar-home-tab">
        </div>
        <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>
        <div class="tab-pane" id="control-sidebar-settings-tab">
        </div>
    </div>
</aside>
<div class="control-sidebar-bg"></div>