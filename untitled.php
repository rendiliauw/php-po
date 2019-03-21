<?php 
include "header.php"; 

?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Input Purchase Order
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">

  <?php



  $sql = mysqli_query($koneksi, "SELECT * FROM mst_setting");
  $tampil = mysqli_fetch_array($sql);


    if(isset($_POST['simpan'])){

     $po = $_POST['no_po'];
     $perusahaan_s = $_POST['perusahaan_s'];
     $no_tlp_s = $_POST['no_tlp_s'];
     $alamat = $_POST['alamat_s'];
     $tgl_kirim = date('Y-m-d', strtotime(str_replace('-', '/', $_POST['tgl_kirim'])));

     $penerima = $_POST['nama'];
     $no_tlp = $_POST['no_tlp'];
     $lokasi = $_POST['lokasi'];
     $datetime = date('Y-m-d h:i:sa');

      $sql = mysqli_query($koneksi,"INSERT INTO transaksi_header SET no_po='$po',
                                                                    nama_penerima='$penerima',
                                                                    lokasi='$lokasi', 
                                                                    no_tlp='$no_tlp',
                                                                    perusahaan ='$perusahaan_s',
                                                                    no_tlp_supplier = '$no_tlp_s',
                                                                    alamat_supplier = '$alamat',
                                                                    tgl_kirim = '$tgl_kirim',                                                                  
                                                                    tgl_create ='$datetime'
                                                                    ");
  if($sql){
      //echo "Data berhasil di simpan"."<meta http-equiv='refresh' content='1; url=input_po'>";
   }else{
       echo "gagal simpan data".mysqli_errno();
  }   
  

    
}else if(isset($_POST['tambah'])){
    $id = $_POST['no_form'];
    $sekolah = $_POST['sekolah_1'];
    $barang = $_POST['nama_barang_1'];
    $qty = $_POST['jumlah_barang'];
    $harga = $_POST['harga_satuan'];
    $total = $_POST['total_harga'];
    $ket = $_POST['keterangan'];
    $datetime = date('Y-m-d h:i:sa');
    $date = date('Y-m-d');

      $sql = mysqli_query($koneksi, "INSERT INTO transaksi_detail SET no_po = '$id',
                                                                      sekolah = '$sekolah',
                                                                      tipe_barang = '$barang',
                                                                      jumlah_barang='$qty',
                                                                      harga_satuan='$harga',
                                                                      total_harga='$total',
                                                                      keterangan='$ket',
                                                                      tgl_create='$datetime',
                                                                      tgl_input='$date'
                                                                      ");
      if($sql){
        //echo "Data berhasil di simpan"."<meta http-equiv='refresh' content='1; url=input_po'>";
     }else{
         echo "gagal simpan data".mysqli_errno();
    }                                                             

}

if(isset($_POST['edit'])){

 $tampil = mysqli_query($koneksi,"SELECT * FROM transaksi_detail WHERE id = '".$_POST['idx']."' ");
 $datas=mysqli_fetch_array($tampil);

}

if(!empty($_POST['no_po'])){

$tampil = mysqli_query($koneksi,"SELECT * FROM transaksi_header WHERE no_po = '$_POST[no_po]' ");
$data = mysqli_fetch_array($tampil);

}else if(empty($_POST['no_po'])){

  $sql = mysqli_query($koneksi,"SELECT max(no_po) as maxKode FROM transaksi_header");
  $data = mysqli_fetch_array($sql);
  $kodeBarang = $data['maxKode'];
   
  // mengambil angka atau bilangan dalam kode anggota terbesar,
  // dengan cara mengambil substring mulai dari karakter ke-1 diambil 6 karakter
  // misal 'BRG001', akan diambil '001'
  // setelah substring bilangan diambil lantas dicasting menjadi integer
  $noUrut = (int) substr($kodeBarang, 2,1);  
 
  // bilangan yang diambil ini ditambah 1 untuk menentukan nomor urut berikutnya
  $noUrut++;
   
  // membentuk kode anggota baru
  // perintah sprintf("%03s", $noUrut); digunakan untuk memformat string sebanyak 3 karakter
  // misal sprintf("%03s", 12); maka akan dihasilkan '012'
  // atau misal sprintf("%03s", 1); maka akan dihasilkan string '001'
 
  $char = ('BJ');
 
  $kodeBarang = $char . sprintf("%01s",$noUrut);


}

  ?>



    <!---------------FORM INPUT PO------------------>
    <!-- general form elements disabled -->
    <div class="box box-warning">
            <div class="box-header with-border">
              <h3 class="box-title">PURCHASE ORDER</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">

            
              <form role="form" method="post" action="" enctype="multipart/form-data">
                <!-- text input -->
             

             <div class="row col-lg-6">

                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-3 control-label">No. FORM</label>
                  <div class="col-sm-3">
                  <input type="text" name="no_po" id="no_po" <?php if(!empty($_POST['no_po'])) {?> value="<?php echo $data['no_po']; ?>" readonly <?php }else{?> value="<?php echo $kodeBarang; ?>" readonly <?php } ?>  class="form-control" >
                  </div>
                </div>
              
              </div>
              <div class="row col-lg-6">

                <div class="form-group">
                <label for="inputEmail3" class="col-sm-3 control-label">TGL. KIRIM</label>
                <div class="col-sm-4"> 
                <div class="input-group date">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                 
                  <input type="text" name="tgl_kirim"  class="form-control pull-right" <?php if(!empty($_POST['no_po'])) {?> value="<?php echo $data['tgl_kirim']; ?>" disabled<?php } ?> id="datepicker" required>
                </div>
                </div>
                </div>
            
             </div> 


            <br>
            <hr>
             
              <div class="row col-lg-6">                   

              <div class="col-sm-12">
                <div class="form-group">
                  <label>NAMA PENERIMA</label>
                  <input type="text" name="nama" id="nama" <?php if(!empty($_POST['no_po'])) {?> value="<?php echo $data['nama_penerima']; ?>"  readonly <?php } ?>  class="form-control" required>
                </div> 
              </div> 

              <div class="col-sm-12">
                <div class="form-group">
                  <label>NO. TLP PENERIMA</label>
                  <input type="text" name="no_tlp" id="no_tlp" <?php if(!empty($_POST['no_po'])) {?> value="<?php echo $data['no_tlp']; ?>" <?php } ?>  class="form-control" readonly>
                </div>
              </div> 

              <div class="col-sm-12">
                <div class="form-group">
                  <label>ALAMAT PENERIMA</label>
                  <textarea class="form-control" name="lokasi" id="lokasi"  rows="3" readonly><?php if(!empty($_POST['no_po'])) {?> <?php echo $data['lokasi']; ?><?php } ?></textarea>
                </div>
              </div>

              <div class="col-sm-12">
              <?php if(empty($_POST['no_po'])){ ?>
                 <button type="submit" name="simpan" class="btn btn-info btn-md"><i class="fa fa-save"></i> Simpan</button>    
              <?php } ?>  
              </div>
            
            </div>
             
             
              <div class="row col-lg-6">

              <div class="col-sm-12">
                <div class="form-group">
                  <label>NAMA SUPPLIER</label>
                  <input type="text" name="perusahaan_s" id="perusahaan_s" <?php if(!empty($_POST['no_po'])) {?> value="<?php echo $data['perusahaan']; ?>" readonly <?php } ?>  class="form-control" required>
                </div> 
              </div>  


              <div class="col-sm-12">
                <div class="form-group">
                  <label>NO. TLP SUPPLIER</label>
                  <input type="text" name="no_tlp_s" id="no_tlp_s" <?php if(!empty($_POST['no_po'])) {?> value="<?php echo $data['no_tlp_supplier']; ?>" <?php } ?> class="form-control" readonly>
                </div>
              </div> 
              

              <div class="col-sm-12">
                <div class="form-group">
                  <label>ALAMAT SUPPLIER</label>
                  <textarea class="form-control" name="alamat_s" id="alamat_s"  rows="3" readonly><?php if(!empty($_POST['no_po'])) {?><?php echo $data['alamat_supplier']; ?> <?php } ?></textarea>
                </div>
              </div>

              <!---<div class="col-sm-6">
                <div class="form-group">
                  <label>NAMA KABAG</label>
                  <input type="text" name="nama_kabag" <?php if(!empty($_POST['no_po'])){?> value="<?php echo $data['nama_kabag']; ?>" <?php }else{?>value="<?php echo $tampil['nama_kabag']; ?>" <?php } ?> name="nama_kabag" class="form-control" readonly>
                </div>
              </div>-->

              
              
              <!----<div class="col-sm-6">
                <div class="form-group">
                  <label>CATATAN</label>
                  <textarea class="form-control" name="catatan" id="catatan" rows="3"  readonly><?php if(!empty($_POST['no_po'])){?><?php echo $data['catatan'];?><?php }else{ ?><?php echo $tampil['catatan'];?><?php } ?></textarea>
                </div>
              </div>--->
              
              
   
             
            </div>  
          </div>
            <!-- /.box-body -->
    </div>
<!--------------------------------------------------------------------------->


<?php if(!empty($_POST['no_po'])){?>
<!------------------ Form keterangan barang  ------------------>
    <div class="box box-warning">
            <div class="box-header with-border">
              <h3 class="box-title"></h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">

            <div class="row">
              
                <!-- text input -->
                
              <input type="text" name="no_form" id="no_form" value="<?php echo $_POST['no_po'] ?>" >
              <input type="text" name="id" id="id" <?php if(isset($_POST['edit'])){?>value="<?php echo $_POST['idx']; ?>" <?php } ?> >

              <div class="col-sm-2">
                <div class="form-group">
                  <label>Sekolah</label>
                  <input type="text" class="form-control" name="sekolah_1" id="sekolah_1" <?php if(isset($_POST['edit'])){ ?> value="<?php echo $datas['sekolah']; ?>" <?php } ?> >
                </div> 
              </div>

              <div class="col-sm-2">
                <div class="form-group">
                  <label>Nama Barang</label>
                  <input type="text" class="form-control" name="nama_barang_1" id="nama_barang_1" <?php if(isset($_POST['edit'])){?> value="<?php echo $datas['tipe_barang']; ?>" <?php } ?> >
                </div> 
              </div>

              <div class="col-sm-2">
                <div class="form-group">
                  <label>Qty</label>
                  <input type="text" class="form-control" name="jumlah_barang" id="jumlah_barang" <?php if(isset($_POST['edit'])){?> value="<?php echo $datas['jumlah_barang']; ?>" <?php } ?> onkeyup="sum()" >
                </div> 
              </div>

              <div class="col-sm-2">
                <div class="form-group">
                  <label>Harga/Qty</label>
                  <input type="text" class="form-control" name="harga_satuan" id="harga_satuan" <?php if(isset($_POST['edit'])){?> value="<?php echo $datas['harga_satuan']; ?>" <?php } ?> onkeyup="sum()" >
                </div> 
              </div>

              <div class="col-sm-2">
                <div class="form-group">
                  <label>Total Harga</label>
                  <input type="text" class="form-control" name="total_harga" id="total_harga" <?php if(isset($_POST['edit'])){ ?> value="<?php echo $datas['total_harga']; ?>" <?php } ?> readonly>
                </div> 
              </div>

              <div class="col-sm-2">
                <div class="form-group">
                  <label>Keterangan</label>
                  <input type="text" class="form-control" name="keterangan" id="keterangan" <?php if(isset($_POST['edit'])){?> value="<?php echo $datas['keterangan']; ?>" <?php } ?> >
                </div> 
              </div> 
              
              <div class="col-sm-12">
                      <button type="submit" name="tambah" class="btn btn-info btn-md"><i class="fa fa-plus"></i> Tambah</button> 
                      <button type="submit" name="finish" class="btn btn-info btn-md"><i class="fa fa-plus"></i> Finish</button>          
              </div>
             
              
            </div>  
          </div>
            <!-- /.box-body -->
          
    <!---------------------------------------------------------->
<?php } ?>
</form>

<?php

if((!empty($_POST['no_form']))||(isset($_POST['edit']))){
  
  ?>
    <!-----------------------data po----------------------->

    <div class="box">
            <div class="box-header"> 
              <div class="box-body pad table-responsive">
              <a href="<?php echo $base_url; ?>purchase_order" target="_blank" role="button" class="btn btn-info btn-md" ><i class="fa fa-print"></i>  cetak</a>
               </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <!---<th style="text-align:center;">No.FORM</th>-->
                  <th style="text-align:center;">ID</th>
                  <th style="text-align:center;">SEKOLAH</th>
                  <th style="text-align:center;">TIPE BARANG</th>
                  <th style="text-align:center;">QTY</th>
                  <th style="text-align:center;">HARGA/QTY</th>
                  <th style="text-align:center;">TOTAL HARGA</th>
                  <th style="text-align:center;">KETERANGAN</th>
                  <th style="width:150px; text-align:center;">Action</th>
                </tr>
                </thead>
                <tbody>
                 <?php
                    @$id=$_POST['no_po'];
                    $date = date('Y-m-d');

                    $sql = mysqli_query($koneksi,"SELECT * FROM transaksi_detail WHERE tgl_input='$date' and no_po='$id'    ORDER BY id ASC");
                    $no =0;
                    while ($data = mysqli_fetch_array($sql)){
                    $no++;     
                 ?>  

                <tr>
                 
                  <td><?php echo $data['id']; ?></td>
                  <td><?php echo $data['sekolah']; ?></td>
                  <td><?php echo $data['tipe_barang']; ?></td>
                  <td><?php echo $data['jumlah_barang']; ?></td>
                  <td><?php echo $data['harga_satuan']; ?></td>
                  <td><?php echo $data['total_harga']; ?></td>
                  <td><?php echo $data['keterangan']; ?></td>
                  <td style="text-align:center">
                   
                  <form method="post" action="">
                  <input type="text" name="idx" value="<?php echo $data['id']; ?>">
                  <input type="text" name="no_po" value="<?php echo $id; ?>">
                  <button type="submit" name="edit" class="btn btn-warning btn-sm"><i class="fa  fa-pencil"></i> Edit</button>
                  <button type="submit" name="hapus"  class="btn btn-danger btn-sm"><i class="fa fa-eraser"></i> Del</button>
                 </form>
                  
                  
                  </td>
                </tr>
                <?php } ?>
                
                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
    </div>
  
<?php } ?>
    <!-------------------------------------------------------->

      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <?php include "footer.php"; ?>
  
