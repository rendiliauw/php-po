
<?php 
include "header.php"; 
?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Master Kabag
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">

    <?php

if(isset($_POST['simpan'])){        

    

    $datetime = date('Y-m-d h:i:sa');
    $kabag = $_POST['nama_kabag'];
    $catatan= $_POST['catatan'];


    $sql= mysqli_query($koneksi,"INSERT INTO mst_setting SET
                    nama_kabag = '$kabag',
                    catatan = '$catatan',
                    tgl_create = '$datetime',
                    user_create = '',
                    flag_hapus='0'
                    ");

        if($sql){
            echo "Data berhasil di tambah"."<meta http-equiv='refresh' content='1; url=mst_setting_view'>";
         }else{
             echo "gagal simpan data";
        }

    }
else if(isset($_POST['update'])){

    $datetime = date('Y-m-d h:i:sa');
    $kabag = $_POST['nama_kabag'];
    $catatan= $_POST['catatan'];


    $sql= mysqli_query($koneksi,"UPDATE mst_setting SET
                    nama_kabag = '$kabag',
                    catatan = '$catatan'
                    WHERE id = '$_POST[id]'
                    ");

        if($sql){
           // echo "Data berhasil di update"."<meta http-equiv='refresh' content='1; url=mst_setting_view'>";
         }else{
             echo "gagal update data";
        }
    }
else if(isset($_POST['hapus'])){

      $id = $_POST['id'];

          $sql= mysqli_query($koneksi,"UPDATE mst_setting SET
          flag_hapus='1' WHERE id = '$id';
          ");

          if($sql){
              echo "Data berhasil di hapus"."<meta http-equiv='refresh' content='1; url=mst_setting_view'>";
          }else{
              echo "gagal hapus data";
          }

          }else if(isset($_POST['tambah'])|| isset($_POST['edit'])){
           
           if(isset($_POST['edit'])){ 
            $id = $_POST['id'];
            $sql = mysqli_query($koneksi, "SELECT * FROM mst_setting WHERE id='$id' ");
            $data = mysqli_fetch_array($sql);
           }
?>


<div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Master Setting</h3>
            </div>

<form method="post" action="">
      <div class="box-body">
        <div class="form-group">
        <input type='hidden' name='id' <?php if(isset($_POST['edit'])){ ?>value='<?php echo $data['id']; ?> <?php } ?>'>            
          <label for="kode">Nama Kabag</label>
        <input type="text" class="form-control" id="nama_kabag" name="nama_kabag" <?php if(isset($_POST['edit'])){ ?> value="<?php echo $data['nama_kabag']; ?>" <?php } ?> required>
        </div>
        <div class="form-group">
          <label>Catatan</label>
          <textarea class="form-control" name="catatan" rows="3" required><?php if(isset($_POST['edit'])){ echo $data['catatan']; } ?></textarea>
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
      
    
        
<?php

$q = mysqli_query($koneksi,"SELECT * FROM mst_setting where flag_hapus = 0");

$kabag = mysqli_fetch_array($q);


if (!isset($_POST['tambah']) AND !isset($_POST['edit'])){ ?>

      <div class="box">
            <div class="box-header">
            
            <form method="post" action="" >
            <?php if(mysqli_num_rows($q)<=0){ ?>
              <button type="submit" name="tambah" class="btn btn-primary btn-sm"><i class="fa fa-arrows"></i> Tambah</button>
              <?php } ?> 
            </form> 
            
              <div class="box-body pad table-responsive">
               </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th style="text-align:center;">Nama Kabag</th>
                  <th style="text-align:center;">Catatan</th>
                  <th style="width:150px; text-align:center;">Action</th>
                </tr>
                </thead>
                <tbody>
                 <?php
                    $sql = mysqli_query($koneksi,"SELECT * FROM mst_setting WHERE flag_hapus='0' ORDER BY id DESC");
                    $no =0;
                    while ($data = mysqli_fetch_array($sql)){
                    $no++;     
                 ?>  

                <tr>
                  <td><?php echo $data['nama_kabag']; ?></td>
                  <td><?php echo $data['catatan']; ?></td>
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