
<?php 
include "header.php"; 
?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Master Barang
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">

    <?php

if(isset($_POST['simpan'])){        

    

    $datetime = date('Y-m-d h:i:sa');
    $kode = $_POST['kode'];
    $nama_barang = $_POST['nama_barang'];


    $sql= mysqli_query($koneksi,"INSERT INTO mst_barang SET
                    kode = '$kode',
                    nama_barang = '$nama_barang',
                    tgl_create = '$datetime',
                    user_create = '',
                    flag_hapus='0'
                    ");

        if($sql){
            echo "Data berhasil di tambah"."<meta http-equiv='refresh' content='1; url=mst_barang_view'>";
         }else{
             echo "gagal simpan data";
        }

    }
else if(isset($_POST['update'])){

    $datetime = date('Y-m-d h:i:sa');
    $kode = $_POST['kode'];
    $nama_barang = $_POST['nama_barang'];


    $sql= mysqli_query($koneksi,"UPDATE mst_barang SET
                    kode = '$kode',
                    nama_barang = '$nama_barang'
                    ");

        if($sql){
            echo "Data berhasil di update"."<meta http-equiv='refresh' content='1; url=mst_barang_view'>";
         }else{
             echo "gagal update data";
        }
    }
else if(isset($_POST['hapus'])){

      $id = $_POST['id'];

          $sql= mysqli_query($koneksi,"UPDATE mst_barang SET
          flag_hapus='1' WHERE id = '$id';
          ");

          if($sql){
              echo "Data berhasil di hapus"."<meta http-equiv='refresh' content='1; url=mst_barang_view'>";
          }else{
              echo "gagal hapus data";
          }

          }else if(isset($_POST['tambah'])|| isset($_POST['edit'])){
           
           if(isset($_POST['edit'])){ 
            $id = $_POST['id'];
            $sql = mysqli_query($koneksi, "SELECT * FROM mst_barang WHERE id='$id' ");
            $data = mysqli_fetch_array($sql);
           }
?>



<form method="post" action="">
      <div class="box-body">
        <div class="form-group">
        <input type='hidden' name='id' <?php if(isset($_POST['edit'])){ ?>value='<?php echo $data['id']; ?> <?php } ?>'>            
          <label for="kode">Kode Barang</label>
<input type="text" class="form-control" id="kode" name="kode" <?php if(isset($_POST['edit'])){ ?> value="<?php echo $data['kode']; ?>" <?php } ?> required>
        </div>
        <div class="form-group">
          <label for="nama_barang">Nama Barang</label>
<input type="text" class="form-control" id="nama_barang" name="nama_barang" <?php if(isset($_POST['edit'])){ ?>value="<?php echo $data['nama_barang']; ?>" <?php } ?> required>
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


<?php } ?>   
      
    
        
<?php if (!isset($_POST['tambah']) AND !isset($_POST['edit'])){ ?>

      <div class="box">
            <div class="box-header">
            <form method="post" action="" >
              <button type="submit" name="tambah" class="btn btn-primary btn-sm"><i class="fa fa-arrows"></i> Tambah</button>
            </form>  
              
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th style="text-align:center;">Kode</th>
                  <th style="text-align:center;">Nama Barang</th>
                  <th style="width:150px; text-align:center;">Action</th>
                </tr>
                </thead>
                <tbody>
                 <?php
                    $sql = mysqli_query($koneksi,"SELECT * FROM mst_barang WHERE flag_hapus='0' ORDER BY id DESC");
                    $no =0;
                    while ($data = mysqli_fetch_array($sql)){
                    $no++;     
                 ?>  

                <tr>
                  <td><?php echo $data['kode']; ?></td>
                  <td><?php echo $data['nama_barang']; ?></td>
                  <td style="text-align:center">
                    <form action="" method="post">
                  <input type="hidden" name="id" value="<?php echo $data['id']; ?>">
                  <button type="submit" name="edit" value="<?php echo $data['id']; ?>" class="btn btn-warning btn-sm"><i class="fa  fa-pencil"></i> Edit</button>
                  <button type="submit" name="hapus"  class="btn btn-danger btn-sm"><i class="fa fa-eraser"></i> Del</button>
                  
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