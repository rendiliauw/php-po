
 <footer class="main-footer">
    <div class="pull-right hidden-xs">
      
    </div>
    <strong>Copyright &copy; 2013-<?php echo date('Y '); ?>BPK PENABUR JAKARTA </a>.</strong> All rights
    reserved.
  </footer>
  
</div> 
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- FastClick -->
<script src="bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- Sparkline -->
<script src="bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
<!-- jvectormap  -->
<script src="plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- SlimScroll -->
<script src="bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- ChartJS -->
<script src="bower_components/chart.js/Chart.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard2.js"></script>
<!-- AdminLTE for demo purposes -->

<!---Autocomplete-------->
<script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js" integrity="sha256-VazP97ZCwtekAsvgPBSUwPFKdrwD3unUfSGVYrahUqU=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
<!---- Demoo------>
<script src="dist/js/demo.js"></script>
<!-- DataTables -->
<script src="bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script>
  $(function () {
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
</script>


<!-- date-range-picker -->
<script src="bower_components/moment/min/moment.min.js"></script>
<script src="bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- bootstrap datepicker -->
<script src="bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<script>
  $(function () {

    //Date picker
    $('#datepicker').datepicker({
      autoclose: true
    })

     //Date picker
     $('#datepicker1').datepicker({
      autoclose: true
    })

  /*//Date range picker
  $('#reservation').daterangepicker()
    //Date range picker with time picker
    $('#reservationtime').daterangepicker({ timePicker: true, timePickerIncrement: 30, format: 'MM/DD/YYYY h:mm A' })
    //Date range as a button
    $('#daterange-btn').daterangepicker(
      {
        ranges   : {
          'Today'       : [moment(), moment()],
          'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
          'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
          'Last 30 Days': [moment().subtract(29, 'days'), moment()],
          'This Month'  : [moment().startOf('month'), moment().endOf('month')],
          'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        },
        startDate: moment().subtract(29, 'days'),
        endDate  : moment()
      },
      function (start, end) {
        $('#daterange-btn span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
      }
    )  */
  
  })
</script>


<script>
      $(document).ready(function(){
        $('#nama').autocomplete({
          minLength: 1, //minimal huruf saat autocomplete di proses
          source: 'autodata.php', //file untuk mencari data karyawan
          select:function(event, ui){
            $('#nama').val(ui.item.nama);
            $('#no_tlp').val(ui.item.no_tlp);
            $('#lokasi').val(ui.item.lokasi);
          }
        })
      });
</script> 
<script>
      $(document).ready(function(){
        $('#perusahaan_s').autocomplete({
          minLength: 1, //minimal huruf saat autocomplete di proses
          source: 'autodata1.php', //file untuk mencari data karyawan
          select:function(event, ui){
            $('#perusahaan_s').val(ui.item.perusahaan_s);
            $('#nama_s').val(ui.item.nama_s);
            $('#no_tlp_s').val(ui.item.no_tlp_s);
            $('#alamat_s').val(ui.item.alamat_s);
          }
        })
      });
</script> 
<script>
      $(document).ready(function(){
        $('#sekolah_1').autocomplete({
          minLength: 1, //minimal huruf saat autocomplete di proses
          source: 'autosekolah.php', //file untuk mencari data karyawan
          select:function(event, ui){
            $('#sekolah_1').val(ui.item.sekolah_1);
            
          }
        })
      });
</script>
<script>
      $(document).ready(function(){
        $('#nama_barang_1').autocomplete({
          minLength: 1, //minimal huruf saat autocomplete di proses
          source: 'autobarang.php', //file untuk mencari data karyawan
          select:function(event, ui){
            $('#nama_barang_1').val(ui.item.nama_barang_1);
            
          }
        })
      });
</script>
<script>
function sum() {
      var txtFirstNumberValue = document.getElementById('jumlah_barang').value;
      var txtSecondNumberValue = document.getElementById('harga_satuan').value;
      var result = parseFloat(txtFirstNumberValue) * parseFloat(txtSecondNumberValue) ;
      if (!isNaN(result)) {
         document.getElementById('total_harga').value = result;
      }
}
</script>

</body>
</html>

