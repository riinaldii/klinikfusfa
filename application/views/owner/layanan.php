<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>

    <div class="row">

        <div class="col-lg">

            <?php if (validation_errors()) : ?>
                <div class="alert alert-danger" role="alert">
                    <?= validation_errors(); ?>
                </div>
            <?php endif; ?>

            <?= $this->session->flashdata('message'); ?>

            <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#addLayananModal">
                Tambah Layanan</a>

            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nama Layanan</th>
                        <th scope="col">Keterangan</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($layanan as $l) : ?>
                        <tr>
                            <th scope="row"><?= $i; ?></th>
                            <td><?= $l['nama_layanan'] ?> </td>
                            <td><?= $l['keterangan'] ?> </td>
                            <td>
                                <a href="#" id="btn-edit" class="badge badge-success" data-toggle="modal" data-target="#modal_edit<?php echo $l['id']?>"> Edit</a>      
                                <a onclick="return confirm('Yakin data ingin dihapus <?php echo $l['id']?>')" href="<?php echo base_url("owner/hapus_layanan/{$l['id']}")?>" data-toggle="tooltip" class="badge badge-danger" data-placement="bottom"> Hapus</a>
                                <a href="" class="badge badge-secondary">detail</a>
                            </td>
                        </tr>
                        <?php $i++; ?>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<!-- Modal Tambah-->
<div class="modal fade" id="addLayananModal" tabindex="-1" role="dialog" aria-labelledby="addLayananModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addLayananModalLabel">Tambah</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?php echo base_url('owner/tambah_layanan') ?>" method="post" enctype="multipart/form-data" role="form">
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" class="form-control" id="nama_layanan" name="nama_layanan" placeholder="Nama Layanan">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="keterangan" name="keterangan" placeholder="Keterangan">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Tambah</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!--End Modal Tambah-->

<!-- ============ MODAL HAPUS BARANG =============== -->
<div class="modal fade" id="modal_hapus<?php echo $l['id'];?>" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
            <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                
                <h3 class="modal-title" id="myModalLabel">Hapus</h3>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
            
            </div>

            <form class="form-horizontal" method="post" action="hapus_layanan">
                <div class="modal-body">
                    <p>Anda yakin mau menghapus <b><?php echo $l['id'];?></b></p>
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="id" value="<?php echo $l['id'];?>">
                    <button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
                    <button class="btn btn-danger">Hapus</button>
                </div>
            </form>
            </div>
            </div>
        </div>
    <!--END MODAL HAPUS -->
