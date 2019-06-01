<!-- Begin Page Content -->
<div class="container">

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
                Tambah Data Pasien</button> 

            <table id="table_id" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Active</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($pasien as $ps) { ?>
                      <?php if ($ps['role_id'] == 4) { ?>
                        <tr>
                            
                                <td><?= $i; ?></td>
                                <td><?= $ps['name'] ?> </td>
                                <td><?= $ps['email'] ?> </td>
                                <td><?= $ps['role_id'] ?> </td>
                                <td><?= $ps['is_active'] ?> </td>
                                <td>
                                    <button class="btn btn-warning" onclick="edit(<?php echo $ps['id'];?>)"><i class="glyphicon glyphicon-pencil"></i></button>
                                    <button class="btn btn-danger" onclick="delete1(<?php echo $ps['id'];?>)"><i class="glyphicon glyphicon-remove"></i></button>
                                    <a href="" class="badge badge-secondary">detail</a>
                                </td>
                            
                        </tr>
                        <?php } ?>
                        <?php $i++; ?>
                    <?php 
                }
                ?>
                </tbody>
            </table>
        </div>
    </div>



      <script type="text/javascript">
        $(document).ready(function() {
          $('#table_id').DataTable();
        });

        var save_method;
        var table_pasien;

        function tambah(){
          save_method = 'add';
          $('#form')[0].reset();
          $('#modal_form').modal('show');
        }

        function save(){
          var url;

          if(save_method == 'add'){
            url='<?php echo site_url('index.php/owner/tambah_pasien');?>';
          } else {
            url='<?php echo site_url('index.php/owner/update1');?>';
          }

          $.ajax({
            url: url,
            type:"POST",
            data:$('#form').serialize(),
            dataType: "JSON",
            success:function(data){
              $('#modal_form').modal('hide');
              location.reload();
            },
            error:function(jqXHR, textStatus, errorThrown){
              alert('error adding/Update data');
            }
          });
        }

        function edit(id){
          save_method ='update';
          $('#form')[0].reset();

          $.ajax({
            url:"<?php echo site_url('index.php/owner/ajax_edit_pasien/');?>/"+id,
            type:"GET",
            dataType:"JSON",
            success: function(data){
              $('[name="id"]').val(data.id);
              $('[name="name"]').val(data.name);
              $('[name="email"]').val(data.email);
              $('[name="image"]').val(data.image);
              $('[name="password"]').val(data.password);
              $('[name="role_id"]').val(data.role_id);
              $('[name="is_active"]').val(data.is_active);
              $('[name="date_created"]').val(data.date_created);
              $('[name="alamat"]').val(data.alamat);
              $('[name="no_telp"]').val(data.no_telp);
              $('[name="usia"]').val(data.usia);
              $('[name="pendidikan"]').val(data.pendidikan);
              $('[name="pekerjaan"]').val(data.pekerjaan);
              $('[name="perkawinan"]').val(data.perkawinan);
              $('[name="anak_ke"]').val(data.anak_ke);
              
              $('#modal_form').modal('show');
              $('.modal_title').text('Edit');


            },
            error:function(jqXHR, textStatus, errorThrown){
              alert('error Get data From ajax');
            }
          });
        }

        function delete1(id){
          if(confirm('Are you sure delete data?')){
            $.ajax({
              url:"<?php echo site_url('index.php/owner/hapus_pasien');?>/"+id,
              type:"POST",
              dataType:"JSON",
              success: function(data){
                location.reload();
              },
              error: function(jqXHR, textStatus, errorThrown){
                alert('Error Delete Data');
              }
            });
          }
        }

      </script>

 </body>  
 </html>  

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<!-- Modal -->
<!-- <div class="modal fade" id="newSubMenuModal" tabindex="-1" role="dialog" aria-labelledby="newSubMenuModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newSubMenuModalLabel">Add New Submenu</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('menu/submenu'); ?>" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" class="form-control" id="title" name="title" placeholder="Submenu title">
                    </div>
                    <div class="form-group">
                        <select name="menu_id" id="menu_id" class="form-control">
                            <option value="">Select Menu</option>
                            <?php foreach ($menu as $m) : ?>
                                                            <option value="<?= $m['id']; ?>"><?= $m['menu'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="url" name="url" placeholder="Submenu Url">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="icon" name="icon" placeholder="Submenu Icon">
                    </div>
                    <div class="form-group">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="1" name="is_active" id="is_active" checked>
                            <label class="form-check-label" for="is_active">
                                Active?
                            </label>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Add</button>
                </div>
            </form>
        </div>
    </div>
</div> -->


</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<!-- Modal Tambah-->
<div class="modal" id="modal_form" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Modal title</h5>
           <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body form">
            <form action="#" id="form">    
                <div class="form-body">
                    <div class="form-group">
                        <input type="text" class="form-control" id="id" name="id" placeholder="Nama">
                    <div class="form-body">
                    <div class="form-group">
                        <input type="text" class="form-control" id="name" name="name" placeholder="Nama">
                    </div>
                    <div class="form-body">
                    <div class="form-group">
                        <input type="text" class="form-control" id="email" name="email" placeholder="Email">
                    </div>
                    <div class="form-body">
                    <div class="form-group">
                        <input type="text" class="form-control" id="image" name="image" placeholder="image">
                    </div>
                    <div class="form-body">
                    <div class="form-group">
                        <input type="text" class="form-control" id="password" name="password" placeholder="password">
                        <?php $role_id=4;?>
                        <input type="hidden" value="<?php echo $role_id ?>" class="form-control" id="role_id" name="role_id" >
                        <?php $is_active=1;?>
                        <input type="hidden" value="<?php echo $is_active ?>" class="form-control" id="is_active" name="is_active">

                    </div>
                    <div class="form-body">
                    <div class="form-group">
                        <input type="text" class="form-control" id="date_created" name="date_created" placeholder="date_created">
                    </div>
                    <div class="form-body">
                    <div class="form-group">
                        <input type="text" class="form-control" id="alamat" name="alamat" placeholder="alamat">
                    </div>
                    <div class="form-body">
                    <div class="form-group">
                        <input type="text" class="form-control" id="no_telp" name="no_telp" placeholder="no_telp">
                    </div>
                    <div class="form-body">
                    <div class="form-group">
                        <input type="text" class="form-control" id="usia" name="usia" placeholder="usia">
                    </div>
                    <div class="form-body">
                    <div class="form-group">
                        <input type="text" class="form-control" id="pendidikan" name="pendidikan" placeholder="pendidikan">
                    </div>
                    <div class="form-body">
                    <div class="form-group">
                        <input type="text" class="form-control" id="pekerjaan" name="pekerjaan" placeholder="pekerjaan">
                    </div>
                    <div class="form-body">
                    <div class="form-group">
                        <input type="text" class="form-control" id="perkawinan" name="perkawinan" placeholder="perkawinan">
                    </div>
                    <div class="form-body">
                    <div class="form-group">
                        <input type="text" class="form-control" id="anak_ke" name="anak_ke" placeholder="anak ke">
                    </div>
                    </form>
                </div>

                <div class="modal-footer">
        <button type="button" onclick="save()" class="btn btn-primary">Save changes</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
            
        </div>
    </div>
</div>
<!--End Modal Tambah-->
