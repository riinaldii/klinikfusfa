<!-- Begin Page Content -->
<div class="container">

  <!-- Page Heading -->
  <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>

  <!--List data Janji temu sudah-->
  <div class="row">

    <div class="col-lg-12">

      <?php if (validation_errors()) : ?>
        <div class="alert alert-danger" role="alert">
          <?= validation_errors(); ?>
        </div>
      <?php endif; ?>

      <?= $this->session->flashdata('message'); ?>

      <button class="btn btn-primary mb-3" onclick="tambah()">
        Tambah Data Janji Temu</button>

      <table id="table_id" class="table table-striped table-bordered">
        <thead>
          <tr>
            <th>#</th>
            <th>Nama Pasien</th>
            <th>Nama Terapis</th>
            <th>Layanan</th>
            <th>Keluhan</th>
            <th>Tanggal</th>
            <th>Bulan</th>
            <th>Tahun</th>
            <th>Waktu</th>
            <th>Tempat</th>
            <th>Status</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <?php $i = 1; ?>
          <?php
          foreach ($query->result() as $ps) {

            ?>
            <tr>
              <td><?php echo $i; ?></td>
              <td><?php echo $ps->name; ?></td>
              <td><?php echo $ps->name; ?></td>
              <td><?php echo $ps->nama_layanan; ?></td>
              <td><?php echo $ps->keluhan; ?></td>
              <td><?php echo $ps->tgl; ?></td>
              <td><?php echo $ps->bulan; ?></td>
              <td><?php echo $ps->tahun; ?></td>
              <td><?php echo $ps->waktu; ?></td>
              <td><?php echo $ps->tempat; ?></td>
              <td><?php echo $ps->status; ?></td>
              <td>
                <button class="btn btn-warning" onclick="edit(<?php echo $ps->id_jt; ?>)"><i class="glyphicon glyphicon-pencil"></i></button>
                <button class="btn btn-danger" onclick="delete1(<?php echo $ps->id_jt; ?>)"><i class="glyphicon glyphicon-remove"></i></button>
              </td>
            </tr>
            <?php $i++; ?>
          <?php
        }
        ?>

        </tbody>
      </table>
    </div>
  </div>

  <script src="<?php echo base_url('assets/'); ?>1/jquery/jquery-3.1.1.min.js"></script>
  <script src="<?php echo base_url('assets/'); ?>1/bootstrap/js/bootstrap.min.js"></script>

  <script src="<?php echo base_url('assets/'); ?>1/datatables/js/jquery.dataTables.js"></script>
  <script src="<?php echo base_url('assets/'); ?>1/datatables/js/dataTables.bootstrap.js"></script>

  <script type="text/javascript">
    $(document).ready(function() {
      $('#table_id').DataTable();
    });

    var save_method;
    var table;

    function tambah() {
      save_method = 'add';
      $('#form')[0].reset();
      $('#modal_form').modal('show');
    }

    function save() {
      var url;

      if (save_method == 'add') {
        url = '<?php echo site_url('index.php/owner/tambah'); ?>';
      } else {
        url = '<?php echo site_url('index.php/owner/update'); ?>';
      }

      $.ajax({
        url: url,
        type: "POST",
        data: $('#form').serialize(),
        dataType: "JSON",
        success: function(data) {
          $('#modal_form').modal('hide');
          location.reload();
        },
        error: function(jqXHR, textStatus, errorThrown) {
          alert('error adding/Update data');
        }
      });
    }

    function edit(id_jt) {
      save_method = 'update';
      $('#form')[0].reset();

      $.ajax({
        url: "<?php echo site_url('index.php/owner/ajax_edit/'); ?>/" + id_jt,
        type: "GET",
        dataType: "JSON",
        success: function(data) {
          $('[name="id_jt"]').val(data.id_jt);
          $('[name="id_pasien"]').val(data.id_pasien);
          $('[name="id_terapis"]').val(data.id_terapis);
          $('[name="id_layanan"]').val(data.id_layanan);
          $('[name="keluhan"]').val(data.keluhan);
          $('[name="tgl"]').val(data.tgl);
          $('[name="bulan"]').val(data.bulan);
          $('[name="tahun"]').val(data.tahun);
          $('[name="waktu"]').val(data.waktu);
          $('[name="tempat"]').val(data.tempat);
          $('[name="status"]').val(data.status);

          $('#modal_form').modal('show');
          $('.modal_title').text('Edit');


        },
        error: function(jqXHR, textStatus, errorThrown) {
          alert('error Get data From ajax');
        }
      });
    }

    function delete1(id_jt) {
      if (confirm('Are you sure delete data?')) {
        $.ajax({
          url: "<?php echo site_url('index.php/owner/hapus'); ?>/" + id_jt,
          type: "POST",
          dataType: "JSON",
          success: function(data) {
            location.reload();
          },
          error: function(jqXHR, textStatus, errorThrown) {
            alert('Error Delete Data');
          }
        });
      }
    }
  </script>

  </body>

  </html>

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
                <input type="hidden" class="form-control" id="id_jt" name="id_jt" placeholder="Nama">
              </div>
              <div class="form-body">
                <div class="form-group">
                  <input type="text" class="form-control" id="id_pasien" name="id_pasien" placeholder="Nama">
                </div>
                <div class="form-group">
                  <input type="text" class="form-control" id="id_terapis" name="id_terapis" placeholder="Id Terapis">
                </div>
                <div class="form-group">
                  <input type="text" class="form-control" id="id_layanan" name="id_layanan" placeholder="Layanan">
                </div>
                <div class="form-group">
                  <input type="text" class="form-control" id="keluhan" name="keluhan" placeholder="Keluhan">
                </div>
                <!-- <div class="form-group">
                        <input type="text" class="form-control" id="tgl" name="tgl" placeholder="Tanggal">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="bulan" name="bulan" placeholder="Bulan">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="tahun" name="tahun" placeholder="Tahun">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="waktu" name="waktu" placeholder="Waktu">
                    </div> -->
                <div class="form-group" id="datepickers">
                  <input type="text" class="form-control" id="waktu_temu" name="waktu_temu" placeholder="Waktu Temu" date-provide="datepicker">
                </div>
                <div class="form-group">
                  <input type="text" class="form-control" id="tempat" name="tempat" placeholder="Tempat">
                </div>
                <div class="form-group">
                  <input type="text" class="form-control" id="status" name="status" placeholder="Status">
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