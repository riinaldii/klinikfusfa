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

            <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#addPenyakitModal">
                Tambah Daftar Penyakit</a>

            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nama Penyakit</th>
                        <th scope="col">Keterangan</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($penyakit as $p) : ?>
                        <tr>
                            <th scope="row"><?= $i; ?></th>
                            <td><?= $p['nama_penyakit'] ?> </td>
                            <td><?= $p['keterangan'] ?> </td>
                            <td>
                                <a href="" class="badge badge-success">edit</a>
                                <a onclick="return confirm('Yakin data ingin dihapus <?php echo $p['id']?>')" href="<?php echo base_url("owner/hapus_penyakit/{$p['id']}")?>" data-toggle="tooltip" class="badge badge-danger" data-placement="bottom"> Hapus</a>
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
<!-- Modal -->
<div class="modal fade" id="addPenyakitModal" tabindex="-1" role="dialog" aria-labelledby="addPenyakitModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addPenyakitModalLabel">Tambah</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('owner/penyakit'); ?>" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" class="form-control" id="nama_penyakit" name="nama_penyakit" placeholder="Nama Penyakit">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="keterangan" name="keterangan" placeholder="Keterangan Penyakit">
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

<!-- ============ MODAL HAPUS BARANG =============== -->
<div class="modal fade" id="modal_hapus<?php echo $p['id'];?>" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
            <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                
                <h3 class="modal-title" id="myModalLabel">Hapus</h3>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
            
            </div>

            <form class="form-horizontal" method="post" action="hapus_penyakit">
                <div class="modal-body">
                    <p>Anda yakin mau menghapus <b><?php echo $p['id'];?></b></p>
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="id" value="<?php echo $p['id'];?>">
                    <button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
                    <button class="btn btn-danger">Hapus</button>
                </div>
            </form>
            </div>
            </div>
        </div>
    <!--END MODAL HAPUS -->
