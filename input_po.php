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


  if (isset($_POST['simpan'])) {

    $po = $_POST['no_po'];
    $perusahaan_s = $_POST['perusahaan_s'];
    $no_tlp_s = $_POST['no_tlp_s'];
    $alamat = $_POST['alamat_s'];
    $tgl_kirim = date('Y-m-d', strtotime(str_replace('-', '/', $_POST['tgl_kirim'])));

    $kabag = $_POST['nama_kabag'];
    $keterangan = $_POST['catatan'];

    $penerima = $_POST['nama'];
    $no_tlp = $_POST['no_tlp'];
    $lokasi = $_POST['lokasi'];
    $datetime = date('Y-m-d h:i:sa');
    $a = substr($po, 4, 4);

  
    $qcek = mysqli_query($koneksi, "SELECT * FROM transaksi_header WHERE no_po = $po and flag_hapus=0 ");
    


    if(mysqli_num_rows($qcek)>0){
      echo "maaf tidak boleh duplikasi data";
    }else{
    $sql = mysqli_query($koneksi, "INSERT INTO transaksi_header SET no_po='$po',
                                                                    nama_penerima='$penerima',
                                                                    lokasi='$lokasi', 
                                                                    no_tlp='$no_tlp',
                                                                    perusahaan ='$perusahaan_s',
                                                                    no_tlp_supplier = '$no_tlp_s',
                                                                    alamat_supplier = '$alamat',
                                                                    nama_kabag = '$kabag',
                                                                    catatan = '$keterangan',
                                                                    tgl_kirim = '$tgl_kirim',                                                                  
                                                                    tgl_create ='$datetime',
                                                                    flag_hapus= '0'
                                                                   
                                                                    ");

    // $sql1 = mysqli_query($koneksi, "INSERT INTO mst_setting SET no_po_akhir = '$a', tgl_create='$datetime',  flag_hapus='0' ");
    // if ($sql1) {
    //   echo "berhasil di simpan";
    // } else {
    //   echo "gagal input data";
    // }
    }

  } else if (isset($_POST['tambah'])) {



    $id = $_POST['no_form'];
    $sekolah = $_POST['sekolah_1'];
    $barang = $_POST['nama_barang_1'];
    $qty = $_POST['jumlah_barang'];
    $harga = $_POST['harga_satuan'];
    $total = $_POST['total_harga'];
    $ket = $_POST['keterangan'];
    $datetime = date('Y-m-d h:i:sa');
    $date = date('Y-m-d');


    $sql = mysqli_query($koneksi, "SELECT * FROM transaksi_detail WHERE sekolah = '$sekolah' AND tipe_barang= '$barang' AND no_po='$id' ");
    $val = mysqli_num_rows($sql);

    if ($val > 0) {
      echo "Maat tidak boleh duplikasi data";
    } else {

      $sql = mysqli_query($koneksi, "INSERT INTO transaksi_detail SET no_po = '$id',
                                                                      sekolah = '$sekolah',
                                                                      tipe_barang = '$barang',
                                                                      jumlah_barang='$qty',
                                                                      harga_satuan='$harga',
                                                                      total_harga='$total',
                                                                      keterangan='$ket',
                                                                      tgl_create='$datetime',
                                                                      tgl_input='$date',
                                                                      flag_hapus='0'
                                                                      ");
      if ($sql) {
        //echo "Data berhasil di simpan"."<meta http-equiv='refresh' content='1; url=input_po'>";
      } else {
        echo "gagal simpan data" . mysqli_errno();
      }
    }

  } else if (isset($_POST['update'])) {

    $x = $_POST['id'];
    $a = $_POST['sekolah_1'];
    $b = $_POST['nama_barang_1'];
    $c = $_POST['jumlah_barang'];
    $d = $_POST['harga_satuan'];
    $e = $_POST['total_harga'];
    $f = $_POST['keterangan'];


    $sql = mysqli_query($koneksi, "UPDATE transaksi_detail SET 
                                                            sekolah = '$a',
                                                            tipe_barang = '$b',
                                                            jumlah_barang = '$c',
                                                            harga_satuan = '$d',
                                                            total_harga = '$e',
                                                            keterangan = '$f'
                      WHERE id = '" . $x . "' ");
    if ($sql) {
      echo "data berhasil ditambah";
    } else {
      echo "gagal simpan data" . mysqli_errno();
    }


  } else if (isset($_POST['hapus'])) {

    $x = $_POST['idx'];
    $sql = mysqli_query($koneksi, "UPDATE transaksi_detail SET flag_hapus='1' WHERE id='" . $x . "' ");


  }



  if (isset($_POST['edit'])) {

    $tampil = mysqli_query($koneksi, "SELECT * FROM transaksi_detail WHERE id = '" . $_POST['idx'] . "' ");
    $datas = mysqli_fetch_array($tampil);

  }

  if (!empty($_POST['no_po'])) {

    $tampil = mysqli_query($koneksi, "SELECT * FROM transaksi_header WHERE no_po = '$_POST[no_po]' ");
    $data = mysqli_fetch_array($tampil);

  } else if (empty($_POST['no_po'])) {

    $sql = mysqli_query($koneksi, "SELECT max(no_po) as maxKode FROM transaksi_header WHERE flag_hapus = '0' ");
    $data = mysqli_fetch_array($sql);
    $kodeBarang = $data['maxKode'];
   
   
// mengambil angka atau bilangan dalam kode anggota terbesar,
// dengan cara mengambil substring mulai dari karakter ke-1 diambil 6 karakter
// misal 'BRG001', akan diambil '001'
// setelah substring bilangan diambil lantas dicasting menjadi integer
    $noUrut = (int)substr($kodeBarang, 4, 4);
 
// bilangan yang diambil ini ditambah 1 untuk menentukan nomor urut berikutnya
    $noUrut++;
 
// membentuk kode anggota baru
// perintah sprintf("%03s", $noUrut); digunakan untuk memformat string sebanyak 3 karakter
// misal sprintf("%03s", 12); maka akan dihasilkan '012'
// atau misal sprintf("%03s", 1); maka akan dihasilkan string '001'





    $kodeBarang = date('ym') . sprintf("%04s", $noUrut);



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
                  <input type="text" name="no_po" id="no_po" <?php if (!empty($_POST['no_po'])) { ?> value="<?php echo $data['no_po']; ?>" readonly <?php 
                                                                                                                                                } else { ?> value="<?php echo $kodeBarang; ?>" readonly <?php 
                                                                                                                                                                                                          } ?>  class="form-control" >
                  </div>
                </div>
              
              </div>
              <div class="row col-lg-6">

                <div class="form-group">
                <label for="inputEmail3" class="col-sm-3 control-label">TGL ORDER</label>
                <div class="col-sm-4"> 
                <div class="input-group date">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                 
                  <input type="text" name="tgl_kirim"  class="form-control pull-right" <?php if (!empty($_POST['no_po'])) { ?>  value="<?php echo $data['tgl_kirim']; ?>" disabled<?php 
                                                                                                                                                                              } ?> id="datepicker" required>
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
                  <input type="text" name="nama" id="nama" <?php if (!empty($_POST['no_po'])) { ?> value="<?php echo $data['nama_penerima']; ?>"  readonly <?php 
                                                                                                                                                      } ?>  class="form-control" required>
                </div> 
              </div> 

              <div class="col-sm-12">
                <div class="form-group">
                  <label>NO. TLP PENERIMA</label>
                  <input type="text" name="no_tlp" id="no_tlp" <?php if (!empty($_POST['no_po'])) { ?> value="<?php echo $data['no_tlp']; ?>" <?php 
                                                                                                                                          } ?>  class="form-control" readonly>
                </div>
              </div> 

              <div class="col-sm-12">
                <div class="form-group">
                  <label>ALAMAT PENERIMA</label>
                  <textarea class="form-control" name="lokasi" id="lokasi"  rows="3" readonly><?php if (!empty($_POST['no_po'])) { ?> <?php echo $data['lokasi']; ?><?php 
                                                                                                                                                                } ?></textarea>
                </div>
              </div>

              <div class="col-sm-12">
              <?php if (empty($_POST['no_po'])) { ?>
                 <button type="submit" name="simpan" class="btn btn-info btn-md"><i class="fa fa-save"></i> Simpan</button>    
              <?php 
            } ?>  
              </div>
            
            </div>
             
             
              <div class="row col-lg-6">

              <div class="col-sm-12">
                <div class="form-group">
                  <label>NAMA SUPPLIER</label>
                  <input type="text" name="perusahaan_s" id="perusahaan_s" <?php if (!empty($_POST['no_po'])) { ?> value="<?php echo $data['perusahaan']; ?>" readonly <?php 
                                                                                                                                                                  } ?>  class="form-control" required>
                </div> 
              </div>  


              <div class="col-sm-12">
                <div class="form-group">
                  <label>NO. TLP SUPPLIER</label>
                  <input type="text" name="no_tlp_s" id="no_tlp_s" <?php if (!empty($_POST['no_po'])) { ?> value="<?php echo $data['no_tlp_supplier']; ?>" <?php 
                                                                                                                                                      } ?> class="form-control" readonly>
                </div>
              </div> 
              

              <div class="col-sm-12">
                <div class="form-group">
                  <label>ALAMAT SUPPLIER</label>
                  <textarea class="form-control" name="alamat_s" id="alamat_s"  rows="3" readonly><?php if (!empty($_POST['no_po'])) { ?><?php echo $data['alamat_supplier']; ?> <?php 
                                                                                                                                                                            } ?></textarea>
                </div>
              </div>

           
              <input type="hidden" name="nama_kabag" <?php if (!empty($_POST['no_po'])) { ?> value="<?php echo $data['nama_kabag']; ?>" <?php 
                                                                                                                                  } else { ?>value="<?php echo $tampil['nama_kabag']; ?>" <?php 
                                                                                                                                                                                              } ?> name="nama_kabag" class="form-control" readonly>

              <input type="hidden" name="catatan" <?php if (!empty($_POST['no_po'])) { ?> value="<?php echo $data['catatan']; ?>" <?php 
                                                                                                                            } else { ?>value="<?php echo $tampil['catatan']; ?>" <?php 
                                                                                                                                                                                    } ?> name="nama_kabag" class="form-control" readonly>
          
             
            </div>  
          </div>
            <!-- /.box-body -->
    </div>
<!--------------------------------------------------------------------------->


<?php if (!empty($_POST['no_po'])) { ?>
<!------------------ Form keterangan barang  ------------------>
    <div class="box box-warning">
            <div class="box-header with-border">
              <h3 class="box-title"></h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">

            <div class="row">
              
                <!-- text input -->
                
              <input type="hidden" name="no_form" id="no_form" value="<?php echo $_POST['no_po'] ?>" >
              <input type="hidden" name="id" id="id" <?php if (isset($_POST['edit'])) { ?>value="<?php echo $_POST['idx']; ?>" <?php 
                                                                                                                          } ?> >

              <div class="col-sm-2">
                <div class="form-group">
                  <label>Sekolah</label>
                  <input type="text" class="form-control" name="sekolah_1" id="sekolah_1" <?php if (isset($_POST['edit'])) { ?> value="<?php echo $datas['sekolah']; ?>" <?php 
                                                                                                                                                                    } ?> required >
                </div> 
              </div>

              <div class="col-sm-2">
                <div class="form-group">
                  <label>Nama Barang</label>
                  <input type="text" class="form-control" name="nama_barang_1" id="nama_barang_1" <?php if (isset($_POST['edit'])) { ?> value="<?php echo $datas['tipe_barang']; ?>" <?php 
                                                                                                                                                                                } ?> required>
                </div> 
              </div>

              <div class="col-sm-2">
                <div class="form-group">
                  <label>Qty</label>
                  <input type="text" class="form-control" name="jumlah_barang" id="jumlah_barang" <?php if (isset($_POST['edit'])) { ?> value="<?php echo $datas['jumlah_barang']; ?>" <?php 
                                                                                                                                                                                  } ?> onkeyup="sum()" required>
                </div> 
              </div>

              <div class="col-sm-2">
                <div class="form-group">
                  <label>Harga/Qty</label>
                  <input type="text" class="form-control" name="harga_satuan" id="harga_satuan" <?php if (isset($_POST['edit'])) { ?> value="<?php echo $datas['harga_satuan']; ?>" <?php 
                                                                                                                                                                              } ?> onkeyup="sum()" required>
                </div> 
              </div>

              <div class="col-sm-2">
                <div class="form-group">
                  <label>Total Harga</label>
                  <input type="text" class="form-control" name="total_harga" id="total_harga" <?php if (isset($_POST['edit'])) { ?> value="<?php echo $datas['total_harga']; ?>" <?php 
                                                                                                                                                                            } ?> readonly>
                </div> 
              </div>

              <div class="col-sm-2">
                <div class="form-group">
                  <label>Keterangan</label>
                  <input type="text" class="form-control" name="keterangan" id="keterangan" <?php if (isset($_POST['edit'])) { ?> value="<?php echo $datas['keterangan']; ?>" <?php 
                                                                                                                                                                        } ?> >
                </div> 
              </div> 
              
              <?php if (!isset($_POST['edit'])) { ?>
              <div class="col-sm-12">
                      <button type="submit" name="tambah" class="btn btn-info btn-md"><i class="fa fa-plus"></i> Tambah</button>    
              </div>
              <?php 
            } else { ?>
              <div class="col-sm-12">
                      <button type="submit" name="update" class="btn btn-info btn-md"><i class="fa fa-plus"></i> Update</button>    
              </div>
              <?php 
            } ?>
              
            </div>  
          </div>
            <!-- /.box-body -->
          
    <!---------------------------------------------------------->
<?php 
} ?>
</form>

<?php

if ((!empty($_POST['no_form'])) || (isset($_POST['hapus']))) {

  ?>
    <!-----------------------data po----------------------->

    <div class="box">
            <div class="box-header"> 
              <div class="box-body pad table-responsive">
              <form role="form" method="post" action="purchase_order" target="_blank" enctype="multipart/form-data">
                 <input type="hidden" name="idpr" value="<?php echo $_POST['no_po']; ?>">
                 <button type="submit" name="print" class="btn btn-warning btn-md"><i class="fa  fa-file-o"></i> Preview</button>
              </form>
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
                $ido = $_POST['no_po'];
                $date = date('Y-m-d');

                $sql = mysqli_query($koneksi, "SELECT * FROM transaksi_detail where flag_hapus='0' AND no_po='$ido' ORDER BY id ASC");
                $no = 0;
                while ($data = mysqli_fetch_array($sql)) {
                  $no++;
                  ?>  

                <tr>
                 
                  <td style="text-align:center;"><?php echo $no; ?></td>
                  <td style="text-align:center;"><?php echo $data['sekolah']; ?></td>
                  <td style="text-align:center;"><?php echo $data['tipe_barang']; ?></td>
                  <td style="text-align:center;"><?php echo $data['jumlah_barang']; ?></td>
                  <td style="text-align:center;"><?php echo "Rp " . format_rupiah($data['harga_satuan']); ?></td>
                  <td style="text-align:center;"><?php echo "Rp " . format_rupiah($data['total_harga']); ?></td>
                  <td style="text-align:center;"><?php echo $data['keterangan']; ?></td>
                  <td style="text-align:center">
                   
                  <form method="post" action="">
                  <input type="hidden" name="idx" value="<?php echo $data['id']; ?>">
                  <input type="hidden" name="no_po" value="<?php echo $ido; ?>">
                  <button type="submit" name="edit" class="btn btn-warning btn-sm"><i class="fa  fa-pencil"></i> Edit</button>
                  <button type="submit" name="hapus"  class="btn btn-danger btn-sm"><i class="fa fa-eraser"></i> Del</button>
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
    <!-------------------------------------------------------->

      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <?php include "footer.php"; ?>
  
