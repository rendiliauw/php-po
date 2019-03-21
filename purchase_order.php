<?php 
include "header.php"; 


?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <?php 



   $id=$_POST['idpr'];
   $tampil = mysqli_query($koneksi,"SELECT a.*, b.* FROM transaksi_header AS a INNER JOIN transaksi_detail AS b ON a.no_po = b.no_po WHERE a.no_po = '$id' ");
    $data = mysqli_fetch_array($tampil);

    ?>
    
    <section class="content-header">
      
    </section>

    <!-- Main content -->
    <section class="invoice">
      <!-- title row -->
      <div class="row invoice-info">
      <div class="col-sm-4 invoice-col">

      <h5><b>
      BPK PENABUR JAKARTA <br>
      Jl. Tanjung Duren Raya No. 4 <br>
      Jakarta, 11470
      </b></h5>
     
     <br>

      <b>No/Tgl Order    : <?php echo str_replace( ' ','', $data['no_po'])."/ ".date('d-m-Y',strtotime(str_replace('/','-',$data['tgl_input']))).'<br>'; ?></b>
      <b>Tanggal Cetak   : <?php echo date('d-m-Y').'<br>'; ?></b>
      <b>Jam Cetak       : <?php echo date('h:i:s'); ?></b>
        
      </div>
      <!-- /.col -->
      <div class="col-sm-4 invoice-col">

           <h3>PURCHASE ORDER</h3>
      
      </div>
       
      <div class="col-sm-4 invoice-col">

        <address style="font-size: 12px;">
        <b>Kepada YTH :</b> <?php echo " ".$data['perusahaan']; ?><br>
        <?php  echo " ".$data['alamat_supplier']; ?><br>
        <?php  echo " ".$data['no_tlp_supplier']; ?>
        </address> 
     
      
        <address style="font-size: 12px;">
        <b>Kirim Ke :</b><?php echo " ".$data['nama_penerima']; ?><br>
        <?php echo " ".$data['lokasi']; ?><br>
        <?php echo " ".$data['no_tlp']; ?>
        </address>

      </div>
      <!-- /.col -->
      
      <!-- /.col -->
    </div>
      <!-- /.row -->

      <!-- Table row -->
    <div class="box">
          <!-- /.box-header -->
          <div class="box-body">
            <table id="example1" class="table ">
              <thead>
              <tr>
                <!---<th style="text-align:center;">No.FORM</th>-->
                <th style="text-align:center;">SEKOLAH</th>
                <th style="text-align:center;">TIPE BARANG</th>
                <th style="text-align:center;">QTY</th>
                <th style="text-align:center;">HARGA/QTY</th>
                <th style="text-align:center;">TOTAL HARGA</th>
                <th style="text-align:center;">KETERANGAN</th>
              </tr>
              </thead>
              <tbody>
               <?php
                  //$ido=$_POST['no_po'];
                  //$date = date('Y-m-d');

                  $sql = mysqli_query($koneksi,"SELECT * FROM transaksi_detail where flag_hapus='0' AND no_po='$id'   ORDER BY id ASC");
                  $no =0;
                  while ($data = mysqli_fetch_array($sql)){
                  $no++;     
               ?>  

              <tr>
                <td style="text-align:center;"><?php echo $data['sekolah']; ?></td>
                <td style="text-align:center;"><?php echo $data['tipe_barang']; ?></td>
                <td style="text-align:center;"><?php echo $data['jumlah_barang']; ?></td>
                <td style="text-align:center;"><?php echo "Rp ".format_rupiah($data['harga_satuan']); ?></td>
                <td style="text-align:center;"><?php echo "Rp ".format_rupiah($data['total_harga']); ?></td>
                <td style="text-align:center;"><?php echo $data['keterangan']; ?></td>
              </tr>
              
              <?php } ?> 
              </tbody>
            </table>
          </div>
          <!-- /.box-body -->
  </div>
      <!-- /.row -->

      

      <!-- this row will not appear when printing -->
      <div class="row no-print">
        <div class="col-xs-6">
        <form role="form" method="get" action="invoice_print" target="_blank" enctype="multipart/form-data">
                 <input type="hidden" name="idpp" value="<?php echo $id; ?>">
                 <button type="submit" class="btn btn-warning btn-md"><i class="fa  fa-print"></i> Print</button>
        </form>  
        </div>
      </div>

 

    </section>
    <!-- /.content -->
    <div class="clearfix"></div>
  </div>
  <!-- /.content-wrapper -->
  
  <?php include "footer.php"; ?>
<!-- ./wrapper -->