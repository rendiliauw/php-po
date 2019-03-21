
<?php 
include "header.php";
?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        VOID REPORT PO
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">

     <?php
    if (isset($_POST['void'])) {

        $id = $_POST['idpd'];

        $sql = mysqli_query($koneksi, "UPDATE transaksi_header SET flag_hapus ='1' where no_po = '$id' ");

        if ($sql) {

            $sql1 = mysqli_query($koneksi, "UPDATE transaksi_detail SET flag_hapus='1' where no_po= '$id' ");

            if ($sql1) {
                echo "berhasil void data";
            }


        } else {
            echo "gagal void data";
        }


    }

    ?>

      <div class="row">
            <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <!-- /.box-header -->
            <!-- form start -->
            <form method="post" action="">
              <div class="box-body">

              
              
                <div class="col-md-3">
                                  <!-- Date -->
              <div class="form-group">
                <div class="input-group date">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="text" class="form-control pull-right" id="datepicker" name="tgl1" placeholder="Pilih tanggal mulai">
                </div>
                <!-- /.input group -->
              </div>
              <!-- /.form group -->
                </div>


                 <div class="col-md-3">
                 <div class="form-group">
                <div class="input-group date">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="text" class="form-control pull-right" id="datepicker1" name="tgl2" placeholder="Pilih tanggal akhir">
                </div>
                <!-- /.input group -->
              </div>
              <!-- /.form group -->
                </div>
                  
               

                <div class="col-md-3">
                <div class="form-group">
                  <input type="text" class="form-control" id="nama_barang_1" name="barang" placeholder="Filter berdasarkan barang">
                </div>
                </div>

                <div class="col-md-2">
                <button type="submit" name="cari" class="btn btn-primary">Cari</button>
                </div>

              </div>
              <!-- /.box-body -->

            </form>
           
          </div>
          <!-- /.box -->
        </div>
      </div>
        
        

<?php if (isset($_POST['cari']) || isset($_POST['void'])) { ?>
      <div class="box">
            <div class="box-header">
            <!--<form method="post" action="" >
              <button type="submit" name="tambah" class="btn btn-primary btn-sm"><i class="fa fa-arrows"></i> Tambah</button>
            </form>  --->
              <div class="box-body pad table-responsive">
               </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                <th style="text-align:center;">No</th>
                  <th style="text-align:center;">No. Form</th>
                  <th style="text-align:center;">Nama Penerima</th>
                  <th style="text-align:center;">Nama Pengirim</th>
                  <th style="text-align:center;">Tanggal Input</th>
                  <th style="width:150px; text-align:center;">Action</th>
                </tr>
                </thead>
                <tbody>
                 <?php


                $tgl1 = date('Y-m-d', strtotime(str_replace('-', '/', $_POST['tgl1'])));
                $tgl2 = date('Y-m-d', strtotime(str_replace('-', '/', $_POST['tgl2'])));
                $barang = $_POST['barang'];
                $sql = mysqli_query($koneksi, "SELECT a.*, b.* FROM transaksi_header as a INNER JOIN transaksi_detail as b ON a.no_po = b.no_po  where ((b.tgl_input BETWEEN '$tgl1' AND '$tgl2' OR b.tipe_barang = '$barang') AND a.flag_hapus='0' )  GROUP BY a.no_po ORDER BY a.tgl_create DESC LIMIT 20 ");
                $no = 0;
                while ($data = mysqli_fetch_array($sql)) {
                    $no++;
                    ?>  

                <tr>
                  <td style="text-align:center;"><?php echo $no; ?></td>
                  <td style="text-align:center;"><?php echo str_replace(' ', '', $data['no_po']); ?></td>
                  <td style="text-align:center;"><?php echo $data['nama_penerima']; ?></td>
                  <td style="text-align:center;"><?php echo $data['perusahaan']; ?></td>
                  <td style="text-align:center;"><?php echo $data['tgl_input']; ?></td>
                  <td style="text-align:center">
                 <!--- <form action="invoice_print" method="get" target="_blank">
                  <input type="hidden" name="idpp" value="<?php echo $data['no_po']; ?>">
                  <button type="submit"  class="btn btn-danger btn-sm"><i class="fa fa-print"></i> Reprint</button>
                  </form> -->

                  <form method="post" action="">

                   <input type="hidden" name="idpd" value="<?php echo $data['no_po']; ?>">
                   <input type="hidden" name="barang" value="<?php echo $_POST['barang']; ?>">
                   <input type="hidden" class="form-control pull-right" id="datepicker1" name="tgl1" value="<?php echo $tgl1; ?>" placeholder="Pilih tanggal akhir">
                   <input type="hidden" class="form-control pull-right" id="datepicker1" name="tgl2" value="<?php  echo $tgl2; ?>" placeholder="Pilih tanggal akhir">     
                   <button type="submit" name="void" class="btn btn-danger btn-sm"><i class="fa fa-print"></i> void</button>
                   
                  </form>
                  
                  </td>
                </tr>

                <?php 
            } ?>
                </tbody>
              </table>
            </div>
                  <!-- /.box-body -->
 
  </div>
  <?php 
} ?>   

      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <?php include "footer.php"; ?>