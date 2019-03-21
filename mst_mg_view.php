
<?php 
include "header.php"; 
?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Master MG AREA
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">

    <?php

if(isset($_POST['simpan'])){        

    

    $datetime = date('Y-m-d h:i:sa');
    $nama = $_POST['nama'];
    $lokasi = $_POST['lokasi'];
    $no_tlp = $_POST['no_tlp'];


    $sql= mysqli_query($koneksi,"INSERT INTO mst_mg SET
                    nama = '$nama',
                    lokasi = '$lokasi',
                    no_tlp = '$no_tlp',
                    tgl_create = '$datetime',
                    user_create = '',
                    flag_hapus='0'
                    ");

        if($sql){
            echo "Data berhasil di tambah"."<meta http-equiv='refresh' content='1; url=mst_mg_view'>";
         }else{
             echo "gagal simpan data";
        }

    }
else if(isset($_POST['update'])){

    $datetime = date('Y-m-d h:i:sa');
    $nama = $_POST['nama'];
    $lokasi = $_POST['lokasi'];
    $no_tlp = $_POST['no_tlp'];



    $sql= mysqli_query($koneksi,"UPDATE mst_mg SET
                    nama = '$nama',
                    lokasi = '$lokasi',
                    no_tlp = '$no_tlp'
                    WHERE id = '$_POST[id]'
                    ");

        if($sql){
            echo "Data berhasil di update"."<meta http-equiv='refresh' content='1; url=mst_mg_view'>";
         }else{
             echo "gagal update data";
        }
    }
else if(isset($_POST['hapus'])){

      $id = $_POST['id'];

          $sql= mysqli_query($koneksi,"UPDATE mst_mg SET
          flag_hapus='1' WHERE id = '$id';
          ");

          if($sql){
              echo "Data berhasil di hapus"."<meta http-equiv='refresh' content='1; url=mst_mg_view'>";
          }else{
              echo "gagal hapus data";
          }

          }else if(isset($_POST['tambah'])|| isset($_POST['edit'])){
           
           if(isset($_POST['edit'])){ 
            $id = $_POST['id'];
            $sql = mysqli_query($koneksi, "SELECT * FROM mst_mg WHERE id='$id' ");
            $data = mysqli_fetch_array($sql);
           }
?>

<div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Master MG</h3>
            </div>

<form method="post" action="">
      <div class="box-body">
        <div class="form-group">
        <input type='hidden' name='id' <?php if(isset($_POST['edit'])){ ?>value='<?php echo $data['id']; ?> <?php } ?>'>            
          <label for="kode">Nama</label>
        <input type="text" class="form-control" id="nama" name="nama" <?php if(isset($_POST['edit'])){ ?> value="<?php echo $data['nama']; ?>" <?php } ?> required>
        </div>
        <div class="form-group">
          <label>Lokasi</label>
          <textarea class="form-control" name="lokasi" rows="3" required><?php if(isset($_POST['edit'])){ echo $data['lokasi'];  } ?></textarea>
        </div>
        <div class="form-group">
          <label for="nama_barang">Telepon</label>
        <input type="text" class="form-control" id="no_tlp" name="no_tlp" <?php if(isset($_POST['edit'])){ ?>value="<?php echo $data['no_tlp']; ?>" <?php } ?> required>
        </div>
      </div>
      <!-- /.box-body -->

      <div class="box-footer">
        <?php if(isset($_POST['edit'])){ ?>
            <button type="submit" name="update" class="btn btn-primary btn-sm"><i class="fa fa-paper-plane"></i> Update</button>
        <?php }else{ ?>
            <button type="submit" name="simpan" class="btn btn-primary btn-sm"><i class="fa fa-paper-plane"></i> Simpan</button>
         <?php } ?>    
      </div>
</form>
</div>
</div>

<?php } ?>   
      
    
        
<?php if (!isset($_POST['tambah']) AND !isset($_POST['edit'])){ ?>

      <div class="box">
            <div class="box-header">
            <form method="post" action="" >
              <button type="submit" name="tambah" class="btn btn-primary btn-sm"><i class="fa fa-arrows"></i> Tambah</button>
            </form>  
              <div class="box-body pad table-responsive">
               </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th style="text-align:center;">Nama</th>
                  <th style="text-align:center;">Lokasi</th>
                  <th style="text-align:center;">Telepon</th>
                  <th style="width:150px; text-align:center;">Action</th>
                </tr>
                </thead>
                <tbody>
                 <?php
                    $sql = mysqli_query($koneksi,"SELECT * FROM mst_mg WHERE flag_hapus='0' ORDER BY id DESC");
                    $no =0;
                    while ($data = mysqli_fetch_array($sql)){
                    $no++;     
                 ?>  

                <tr>
                  <td><?php echo $data['nama']; ?></td>
                  <td><?php echo $data['lokasi']; ?></td>
                  <td><?php echo $data['no_tlp']; ?></td>
                  <td style="text-align:center">
                    <form action="" method="post">
                  <input type="hidden" name="id" value="<?php echo $data['id']; ?>">
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

      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <?php include "footer.php"; ?>