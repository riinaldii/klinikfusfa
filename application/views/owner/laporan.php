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
                <h3 class="box-title">Riwayat Janji Temu</h3>
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                        <i class="fa fa-minus"></i>
                    </button>
                </div>
            </div>
            <div class="box-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Pasien</th>
                            <th>Layanan</th>
                            <th>Tanggal & Waktu Temu</th>
                            <th>Terapis</th>
                            <th>Keluhan</th>
                            <th>Status</th>
                            <th>Hasil Diagnosis</th>
                            <th>Keterangan</th>
                            <!-- <th>Aksi</th> -->
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($janjitemu as $jt) : ?>
                            <tr>
                                <td>
                                    <a href="<?php echo base_url('terapis/detailpasien/' . $jt['id_pasien']) ?>"><?= $jt['psn'] ?></a>
                                </td>
                                <td><?= $jt['layanan'] ?></td>
                                <td><?= $jt['tgl_temu'] ?> | <?= $jt['waktu'] ?></td>
                                <td>
                                    <a href="<?php echo base_url('terapis/detailterapis/' . $jt['id_terapis']) ?>"><?= $jt['trp'] ?></a>
                                </td>
                                <td><?= $jt['keluhan'] ?></td>
                                <td><?= $jt['status'] ?></td>
                                <td><?= $jt['penyakit'] ?></td>
                                <td><?= $jt['catatan'] ?></td>
                                <!-- <td>
                                    <a href="<?php echo base_url('terapis/detailjanji/' . $jt['id_jt']) ?>" class="btn btn-success">Detail</a>
                                </td> -->
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>Pasien</th>
                            <th>Layanan</th>
                            <th>Tanggal & Temu</th>
                            <th>Terapis</th>
                            <th>Keluhan</th>
                            <th>Status</th>
                            <th>Hasil Diagnosis</th>
                            <th>Keterangan</th>
                            <!-- <th>Aksi</th> -->
                        </tr>
                    </tfoot>
                </table>
            </div>
            <!-- /.box-body -->
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