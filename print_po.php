<?php

function terbilang($angka)
{
  $angka = abs($angka);
  $baca = array(
    "", "Satu", "Dua", "Tiga", "Empat", "Lima",
    "Enam", "Tujuh", "Delapan", "Sembilan", "Sepuluh", "Sebelas"
  );
  $terbilang = "";
  if ($angka < 12) {
    $terbilang = " " . $baca[$angka];
  } else if ($angka < 20) {
    $terbilang = terbilang($angka - 10) . " Belas";
  } else if ($angka < 100) {
    $terbilang = terbilang($angka / 10) . " Puluh" . terbilang($angka % 10);
  } else if ($angka < 200) {
    $terbilang = " seratus" . terbilang($angka - 100);
  } else if ($angka < 1000) {
    $terbilang = terbilang($angka / 100) . " Ratus" . terbilang($angka % 100);
  } else if ($angka < 2000) {
    $terbilang = " seribu" . terbilang($angka - 1000);
  } else if ($angka < 1000000) {
    $terbilang = terbilang($angka / 1000) . " Ribu" . terbilang($angka % 1000);
  } else if ($angka < 1000000000) {
    $terbilang = terbilang($angka / 1000000) . " Juta" . terbilang($angka % 1000000);
  }

  return $terbilang;
}

date_default_timezone_set('Asia/Jakarta');

?>




<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 2 | Invoice</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body onload="window.print()";>
<div class="wrapper">
  <!-- Main content -->

  <?php 

  include "config/koneksi.php";

  $id = $_POST['idpv'];


  $tampil = mysqli_query($koneksi, "SELECT a.*, b.* FROM transaksi_header AS a INNER JOIN transaksi_detail AS b ON a.no_po = b.no_po WHERE a.no_po = '$id' ");
  $data = mysqli_fetch_array($tampil);


  function format_rupiah($angka)
  {
    $hasil = number_format($angka, 0, ',', '.');
    return $hasil;
  }

  ?>
  <section class="invoice">
    <!-- info row -->
    <div class="row invoice-info">
      <div class="col-sm-4 invoice-col">

      <h5 style="font-weight:bold">
      BPK PENABUR JAKARTA <br>
      Jl. Tanjung Duren Raya No. 4 <br>
      Jakarta, 11470
      </h5>
    
    <div style="font-size:10px;">
      <b>No/Tgl Order    : <?php echo str_replace(' ', '', $data['no_po']) . "/ " . date('d-m-Y', strtotime(str_replace('/', '-', $data['tgl_input']))) . '<br>'; ?></b>
      <b>Tanggal Cetak   : <?php echo date('d-m-Y') . '<br>'; ?></b>
      <b>Jam Cetak       : <?php echo date('h:i:s'); ?></b>
    </div>

      </div>
      <!-- /.col -->
      <div class="col-sm-4 invoice-col">

           <h3 style="valign:top;">PURCHASE ORDER</h3>
      
      </div>
       
      <div class="col-sm-4 invoice-col">

        <address style="font-size: 12px;">
        <b>Kepada YTH :</b> <?php echo " " . $data['perusahaan']; ?><br>
        <?php echo " " . $data['alamat_supplier']; ?><br>
        <?php echo " " . $data['no_tlp_supplier']; ?>

        <br>
        
        <b>Kirim Ke :</b><?php echo " " . $data['nama_penerima']; ?><br>
        <?php echo " " . $data['lokasi']; ?><br>
        <?php echo " " . $data['no_tlp']; ?>
        </address>

      </div>
      <!-- /.col -->
      
      <!-- /.col -->
    </div>
    <!-- /.row -->

    <!-- Table row -->

            <table id="example1" class="table table-bordered">
              <thead>
              <tr>
                <!---<th style="text-align:center;">No.FORM</th>-->
                <th style="text-align:center;">NAMA SEKOLAH</th>
                <th style="text-align:center;">BARANG</th>
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

              $sql = mysqli_query($koneksi, "SELECT * FROM transaksi_detail where flag_hapus='0' AND no_po='$id'   ORDER BY id ASC");
              $no = 0;
              while ($data = mysqli_fetch_array($sql)) {
                $no++;
                ?>  

              <tr>
                <td style="text-align:center;"><?php echo $data['sekolah']; ?></td>
                <td style="text-align:center;"><?php echo $data['tipe_barang']; ?></td>
                <td style="text-align:center;"><?php echo $data['jumlah_barang']; ?></td>
                <td style="text-align:center;"><?php echo "Rp " . format_rupiah($data['harga_satuan']); ?></td>
                <td style="text-align:center;"><?php echo "Rp " . format_rupiah($data['total_harga']); ?></td>
                <td style="text-align:center;"><?php echo $data['keterangan']; ?></td>
              </tr>
              <?php 
            } ?>
              
              </tbody>
            </table>
         

            <?php
  $sql = mysqli_query($koneksi, "SELECT sum(total_harga) as 'total' from transaksi_detail where no_po = $id and flag_hapus=0 
                                  GROUP BY no_po ORDER BY tgl_input DESC LIMIT 20 ;");
  $tampil1 = mysqli_fetch_array($sql);

  $sql2 = mysqli_query($koneksi, "SELECT * from mst_setting WHERE flag_hapus=0 ");
  $show = mysqli_fetch_array($sql2);
  ?>

  <div class="row invoice-info">
      <div class="col-sm-6 invoice-col ">
      <p style="font-size:10px; font-weight:bold; text-align:justify; ">
            <?php echo $show['catatan']; ?>
      </p>

      
      <b style="font-size:13px;">Menyetujui,</b>
      <br>


      <u style="font-size:10px;"><?php echo $show['nama_kabag']; ?></u><br>
      <b style="font-size:13px;">Manajemen Gedung</b>
      </div>  
  
      <div class="col-sm-4 invoice-col pull-right">
        <?php echo "Rp " . format_rupiah($tampil1['total']) . "<br>"; ?>
        <?php echo "<b><i> *" . terbilang($tampil1['total']) . " Rupiah" . "</i></b>"; ?>
      </div>
  </div>
  

  

    <!-- this row will not appear when printing -->
    
  </section>
  <!-- /.content -->
</div>
<!-- ./wrapper -->
</body>
</html>

