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

            <button class="btn btn-primary mb-3" onclick="tambah()">
                Tambah Data Terapis</button> 

            <table id="table_id" class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Email</th>
                        <th scope="col">Role</th>
                        <th scope="col">Active</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $j = 1; ?>
                    <?php foreach ($terapis as $ts) : ?>
                        <tr>
                            <?php if ($ts['role_id'] == 3) { ?>
                                <th scope="row"><?= $j; ?></th>
                                <td><?= $ts['name'] ?> </td>
                                <td><?= $ts['email'] ?> </td>
                                <td><?= $ts['role_id'] ?> </td>
                                <td><?= $ts['is_active'] ?> </td>
                                <td>
                                    <a href="" class="badge badge-success" data-toggle="modal" data-target="#modal_edit<?php echo $ts['id'];?>"> Edit</a>
                                    <a onclick="return confirm('Yakin data ingin dihapus <?php echo $ts['id']?>')" href="<?php echo base_url("owner/hapus_terapis/{$ts['id']}")?>" data-toggle="tooltip" class="badge badge-danger" data-placement="bottom"> Hapus</a>
                                    <a href="" class="badge badge-secondary">detail</a>
                                </td>
                            <?php } ?>
                        </tr>
                        <?php $j++; ?>
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
            <form action="<?php echo base_url('owner/tambah_terapis') ?>" method="post" enctype="multipart/form-data" role="form">
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" class="form-control" id="name" name="name" placeholder="Nama">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="email" name="email" placeholder="Email">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="image" name="image" placeholder="image">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="password" name="password" placeholder="password">
                        <?php $role_id=3;?>
                        <input type="hidden" value="<?php echo $role_id ?>" class="form-control" id="role_id" name="role_id" >
                        <?php $is_active=1;?>
                        <input type="hidden" value="<?php echo $is_active ?>" class="form-control" id="is_active" name="is_active">

                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="alamat" name="alamat" placeholder="alamat">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="no_telp" name="no_telp" placeholder="no_telp">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="pendidikan" name="pendidikan" placeholder="pendidikan">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="pekerjaan" name="pekerjaan" placeholder="pekerjaan">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="perkawinan" name="perkawinan" placeholder="perkawinan">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="anak_ke" name="anak_ke" placeholder="anak ke">
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
<div class="modal fade" id="modal_hapus<?php echo $ts['id'];?>" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
            <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                
                <h3 class="modal-title" id="myModalLabel">Hapus</h3>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
            
            </div>

            <form class="form-horizontal" method="post" action="hapus_terapis">
                <div class="modal-body">
                    <p>Anda yakin mau menghapus <b><?php echo $ts['id'];?></b></p>
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="id" value="<?php echo $ts['id'];?>">
                    <button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
                    <button class="btn btn-danger">Hapus</button>
                </div>
            </form>
            </div>
            </div>
        </div>
    <!--END MODAL HAPUS -->

<!-- ============ MODAL EDIT =============== -->
<div class="modal fade" id="modal_edit<?php echo $ts['id'];?>" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
            <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                
                <h3 class="modal-title" id="myModalLabel">Edit Barang</h3>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
            </div>
            <form class="form-horizontal" method="post" action="edit_terapis">
                <div class="modal-body">
                    <label class="col-lg-2 col-sm-2 control-label">Nama</label>
                        <div class="form-group">
                        <input type="text" class="form-control" id="name" name="name" value="<?php echo $ts['name'];?>" placeholder="Nama">
                    </div>
                    <label class="col-lg-2 col-sm-2 control-label">Email</label>
                    <div class="form-group">
                        <input type="text" class="form-control" id="email" name="email" placeholder="Email" value="<?php echo $ts['email'];?>">
                    </div>
                    <label class="col-lg-2 col-sm-2 control-label">Image</label>
                    <div class="form-group">
                        <input type="text" class="form-control" id="image" name="image" placeholder="image" value="<?php echo $ts['image'];?>">
                    </div>
                    <div class="form-group">
                         <input type="text" class="form-control" id="password" name="password" placeholder="image" value="<?php echo $ts['password'];?>">
                        <?php $role_id=3;?>
                        <input type="hidden" value="<?php echo $role_id ?>" class="form-control" id="role_id" name="role_id" value="<?php echo $ts['role_id'];?>" >
                        <?php $is_active=1;?>
                        <input type="hidden" value="<?php echo $is_active ?>" class="form-control" id="is_active" name="is_active" value="<?php echo $ts['is_active'];?>">

                    </div>
                    <label class="col-lg-2 col-sm-2 control-label">Alamat</label>
                    <div class="form-group">
                        <input type="text" class="form-control" id="alamat" name="alamat" placeholder="alamat" value="<?php echo $ts['alamat'];?>">
                    </div>
                    <label class="col-lg-2 col-sm-2 control-label">No_Telp</label>
                    <div class="form-group">
                        <input type="text" class="form-control" id="no_telp" name="no_telp" placeholder="no_telp" value="<?php echo $ts['no_telp'];?>">
                    </div>
                    <label class="col-lg-2 col-sm-2 control-label">Usia</label>
                    <div class="form-group">
                        <input type="text" class="form-control" id="usia" name="usia" placeholder="usia" value="<?php echo $ts['usia'];?>">
                    </div>
                    <label class="col-lg-2 col-sm-2 control-label">Pendidikan</label>
                    <div class="form-group">
                        <input type="text" class="form-control" id="pendidikan" name="pendidikan" placeholder="pendidikan" value="<?php echo $ts['pendidikan'];?>">
                    </div>
                    <label class="col-lg-2 col-sm-2 control-label">Pekerjaan</label>
                    <div class="form-group">
                        <input type="text" class="form-control" id="pekerjaan" name="pekerjaan" placeholder="pekerjaan" value="<?php echo $ts['pekerjaan'];?>">
                    </div>
                    <label class="col-lg-2 col-sm-2 control-label">Perkawinan</label>
                    <div class="form-group">
                        <input type="text" class="form-control" id="perkawinan" name="perkawinan" placeholder="perkawinan" value="<?php echo $ts['perkawinan'];?>">
                    </div>
                    <label class="col-lg-2 col-sm-2 control-label">Anak_Ke</label>
                    <div class="form-group">
                        <input type="text" class="form-control" id="anak_ke" name="anak_ke" placeholder="anak ke" value="<?php echo $ts['anak_ke'];?>">
                    </div>
                </div>
 
                <div class="modal-footer">
                    <button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
                    <button type="submit" class="btn btn-info">Update</button>
                </div>
            </form>
            </div>
            </div>
        </div>
    <!--END MODAL edit-->

    <!-- Jquery Passing button ubah-->
<script>
    $(function () {
    $('#btn-edit').click(function (e) {
            e.preventDefault();
            $('#modal').modal({
                backdrop: 'static',
                show: true
            });
            id = $(this).data('id');
            // mengambil nilai data-id yang di click
            $.ajax({
var div = $(event.relatepsarget) // Tombol dimana modal di tampilkan
            var modal          = $(this)
 
            // Isi nilai pada field
            //modal.find('#id_jt').attr("value",div.data('id_jt'));
            modal.find('#name').attr("value",div.data('name'));
            modal.find('#email').html(div.data('email'));
            modal.find('#image').attr("value",div.data('image'));
            modal.find('#password').attr("value",div.data('password'));
            modal.find('#role_id').attr("value",div.data('role_id'));
            modal.find('#is_active').attr("value",div.data('is_active'));
            modal.find('#date_created').attr("value",div.data('date_created'));
            modal.find('#alamat').attr("value",div.data('alamat'));
            modal.find('#no_telp').attr("value",div.data('no_telp'));
            modal.find('#usia').attr("value",div.data('usia'));
            modal.find('#pendidikan').attr("value",div.data('pendidikan'));
            modal.find('#pekerjaan').attr("value",div.data('pekerjaan'));
            modal.find('#perkawinan').attr("value",div.data('perkawinan'));
            modal.find('#anak_ke').attr("value",div.data('anak_ke'));
                }
            });
       });

</script>