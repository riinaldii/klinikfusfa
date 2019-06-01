<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>

    <div class="row">
        <div class="col-lg-8">

            <?= form_open_multipart('owner/edit'); ?>
            <div class="form-group row">
                <label for="id_pasien" class="col-sm-2 col-form-label">id_pasien</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="id_pasien" id_jt="id_pasien" value="<?= $janjitemu['id_pasien']; ?>" readonly>
                </div>
            </div>
            <div class="form-group row">
                <label for="id_jt" class="col-sm-2 col-form-label">Nama Lengkap</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="id_jt" id_jt="id_jt" value="<?= $janjitemu['id_jt']; ?>">
                    <?= form_error('id_jt', '<small class="text-danger ml-3">', '</small>'); ?>
                </div>
            </div>

            <div class="form-group row">
                <label for="id_jt" class="col-sm-2 col-form-label">Nama Lengkap</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="id_jt" id_jt="id_jt" value="<?= $janjitemu['id_jt']; ?>">
                    <?= form_error('id_jt', '<small class="text-danger ml-3">', '</small>'); ?>
                </div>
            </div>
            
            <div class="form-group row">
                <label for="id_jt" class="col-sm-2 col-form-label">Nama Lengkap</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="id_jt" id_jt="id_jt" value="<?= $janjitemu['id_jt']; ?>">
                    <?= form_error('id_jt', '<small class="text-danger ml-3">', '</small>'); ?>
                </div>
            </div>
            <div class="form-group row">
                <label for="id_jt" class="col-sm-2 col-form-label">Nama Lengkap</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="id_jt" id_jt="id_jt" value="<?= $janjitemu['id_jt']; ?>">
                    <?= form_error('id_jt', '<small class="text-danger ml-3">', '</small>'); ?>
                </div>
            </div>
            <div class="form-group row">
                <label for="id_jt" class="col-sm-2 col-form-label">Nama Lengkap</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="id_jt" id_jt="id_jt" value="<?= $janjitemu['id_jt']; ?>">
                    <?= form_error('id_jt', '<small class="text-danger ml-3">', '</small>'); ?>
                </div>
            </div>
            
            <div class="form-group row">
                <label for="id_jt" class="col-sm-2 col-form-label">Nama Lengkap</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="id_jt" id_jt="id_jt" value="<?= $janjitemu['id_jt']; ?>">
                    <?= form_error('id_jt', '<small class="text-danger ml-3">', '</small>'); ?>
                </div>
            </div>

            <?php if ($janjitemu['role_id'] == 4) { ?>
                <div class="form-group row">
                    <label for="id_jt" class="col-sm-2 col-form-label">Usia</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="usia" id_jt="usia" value="<?= $janjitemu['usia']; ?>">
                        <?= form_error('usia', '<small class="text-danger ml-3">', '</small>'); ?>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="id_jt" class="col-sm-2 col-form-label">Alamat</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="alamat" id_jt="alamat" value="<?= $janjitemu['alamat']; ?>">
                        <?= form_error('alamat', '<small class="text-danger ml-3">', '</small>'); ?>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="id_jt" class="col-sm-2 col-form-label">No. Telpon</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="no_telp" id_jt="no_telp" value="<?= $janjitemu['no_telp']; ?>">
                        <?= form_error('no_telp', '<small class="text-danger ml-3">', '</small>'); ?>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="id_jt" class="col-sm-2 col-form-label">Anak Ke-</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="anak_ke" id_jt="anak_ke" value="<?= $janjitemu['anak_ke']; ?>">
                        <?= form_error('anak_ke', '<small class="text-danger ml-3">', '</small>'); ?>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="id_jt" class="col-sm-2 col-form-label">Pendidikan Terakhir</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="pendidikan" id_jt="pendidikan" value="<?= $janjitemu['pendidikan']; ?>">
                        <?= form_error('pendidikan', '<small class="text-danger ml-3">', '</small>'); ?>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="id_jt" class="col-sm-2 col-form-label">Pekerjaan</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="pekerjaan" id_jt="pekerjaan" value="<?= $janjitemu['pekerjaan']; ?>">
                        <?= form_error('pekerjaan', '<small class="text-danger ml-3">', '</small>'); ?>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="id_jt" class="col-sm-2 col-form-label">Status Perkawinan</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="perkawinan" id_jt="perkawinan" value="<?= $janjitemu['perkawinan']; ?>">
                        <?= form_error('perkawinan', '<small class="text-danger ml-3">', '</small>'); ?>
                    </div>
                </div><?php } ?>
            <div class="form-group row">
                <div class="col-sm-2">Picture</div>
                <div class="col-sm-10">
                    <div class="row">
                        <div class="col-sm-3">
                            <img src="<?= base_url('assets/img/profile/') . $janjitemu['image']; ?>" class="img-thumbnail">
                        </div>
                        <div class="col-sm-9">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="image" id_jt="image">
                                <label class="custom-file-label" for="image">Choose file</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group row justify-content-end">
                <div class="col-sm-10">
                    <button type="submit" class="btn btn-primary">Edit</button>
                </div>
            </div>

            </form>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->