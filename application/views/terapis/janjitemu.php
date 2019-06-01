<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>

    <h1 class="h4 mb-4 text-gray-800">Sudah</h1>


    <div class="row">

        <div class="col-lg">

            <?php if (validation_errors()) : ?>
                <div class="alert alert-danger" role="alert">
                    <?= validation_errors(); ?>
                </div>
            <?php endif; ?>

            <?= $this->session->flashdata('message'); ?>

            <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#newSubMenuModal">
                Tambah Data Janji Temu</a>

            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Id</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Layanan</th>
                        <th scope="col">Keluhan</th>
                        <th scope="col">Tanggal</th>
                        <th scope="col">Bulan</th>
                        <th scope="col">Tahun</th>
                        <th scope="col">Waktu</th>
                        <th scope="col">Tempat</th>
                        <th scope="col">Status</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($janjitemu as $ps) : ?>
                        <tr>
                            <?php if ($ps['id_pasien'] == 4 && $ps['status']=='sudah') { ?>
                                <th scope="row"><?= $i; ?></th>
                                <td><?= $ps['id_jt'] ?> </td>
                                <td><?= $ps['id_pasien'] ?> </td>
                                <td><?= $ps['id_layanan'] ?> </td>
                                <td><?= $ps['keluhan'] ?> </td>
                                <td><?= $ps['tgl'] ?> </td>
                                <td><?= $ps['bulan'] ?> </td>
                                <td><?= $ps['tahun'] ?> </td>
                                <td><?= $ps['tempat'] ?> </td>
                                <td><?= $ps['waktu'] ?> </td>
                                <td><?= $ps['status'] ?> </td>
                                <td>
                                    <a href="" class="badge badge-success">edit</a>
                                    <a href="" class="badge badge-secondary">detail</a>
                                </td>
                            <?php } ?>
                        </tr>
                        <?php $i++; ?>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>

