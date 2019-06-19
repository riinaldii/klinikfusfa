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
</div>
<!-- ./wrapper -->


<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Ingin keluar?</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">Pilih "Logout" untuk keluar.</div>
      <div class="modal-footer">
        <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
        <a class="btn btn-primary" href="<?= base_url('auth/logout'); ?>">Logout</a>
      </div>
    </div>
  </div>
</div>

<!-- jQuery 3 -->
<script src="<?= base_url('assets/'); ?>bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?= base_url('assets/'); ?>bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- DataTables -->
<script src="<?= base_url('assets/'); ?>bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?= base_url('assets/'); ?>bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script src="<?= base_url('assets/'); ?>bower_components/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
<script src="<?= base_url('assets/'); ?>bower_components/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
<script src="<?= base_url('assets/'); ?>bower_components/datatables.net-buttons/js/buttons.flash.min.js"></script>
<script src="<?= base_url('assets/'); ?>bower_components/datatables.net-buttons/js/buttons.html5.min.js"></script>
<script src="<?= base_url('assets/'); ?>bower_components/datatables.net-buttons/js/buttons.print.min.js"></script>
<script src="<?= base_url('assets/'); ?>bower_components/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
<script src="<?= base_url('assets/'); ?>bower_components/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
<script src="<?= base_url('assets/'); ?>bower_components/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?= base_url('assets/'); ?>bower_components/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
<script src="<?= base_url('assets/'); ?>bower_components/datatables.net-scroller/js/datatables.scroller.min.js"></script>
<script src="<?= base_url('assets/'); ?>bower_components/jszip/dist/jszip.min.js"> </script>
<script src="<?= base_url('assets/'); ?>bower_components/pdfmake/build/pdfmake.min.js"></script>
<script src="<?= base_url('assets/'); ?>bower_components/pdfmake/build/vfs_fonts.js"></script>
<script src="<?= base_url('assets/'); ?>bower_components/chart.js/Chart.js"></script>
<!-- bootstrap datepicker -->
<script src="<?= base_url('assets/'); ?>bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- bootstrap time picker -->
<script src="<?= base_url('assets/'); ?>plugins/timepicker/bootstrap-timepicker.min.js"></script>
<!-- Select2 -->
<script src="<?= base_url('assets/'); ?>bower_components/select2/dist/js/select2.full.min.js"></script>
<!-- SlimScroll -->
<script src="<?= base_url('assets/'); ?>bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="<?= base_url('assets/'); ?>bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?= base_url('assets/'); ?>dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?= base_url('assets/'); ?>dist/js/demo.js"></script>

<script>
  $(document).ready(function() {
    $('.sidebar-menu').tree()
  })
</script>

<script>
  $(document).ready(function() {
    $('.sidebar-menu').tree()
  })
</script>

<script>
  $('.custom-file-input').on('change', function() {
    let fileName = $(this).val().split('\\').pop();
    $(this).next('.custom-file-label').addClass("selected").html(fileName);
  });


  $('.form-check-input').on('click', function() {
    const menuId = $(this).data('menu');
    const roleId = $(this).data('role');

    $.ajax({
      url: "<?= base_url('admin/changeaccess'); ?>",
      type: "post",
      data: {
        menuId: menuId,
        roleId: roleId
      },
      success: function() {
        document.location.href = "<?= base_url('admin/roleaccess/'); ?>" + roleId;
      }
    });
  });
</script>

<script>
  $(function() {
    //Initialize Select2 Elements
    $('.select2').select2()

    //Date picker
    $('#datepicker').datepicker({
      autoclose: true
    })

    //Timepicker
    $('.timepicker').timepicker({
      showInputs: false
    })
  })
</script>

<!-- dataTables page script -->
<script>
  $(function() {
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging': true,
      'lengthChange': false,
      'searching': false,
      'ordering': true,
      'info': true,
      'autoWidth': false
    })
  })
</script>
<script>
  $(document).ready(function() {
    $('#print').DataTable({
      dom: 'Bfrtip',
      buttons: [
        'print'
      ]
    });
  });
</script>
</body>

</html>