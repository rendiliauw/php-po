<div class="box">
            <div class="box-header">
              <h3 class="box-title">Mater Barang</h3>
              <div class="box-body pad table-responsive">
            </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Nama</th>
                  <th>Lokasi</th>
                  <th>No.Tlp</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                 <?php
                    $sql = mysqli_query($koneksi,"SELECT * FROM mst_barang ORDER BY id DESC");
                    $no =0;
                    while ($data = mysqli_fetch_array($sql)){
                    $no++;     
                 ?>  

                <tr>
                  <td><?php echo $data['nama']; ?></td>
                  <td><?php echo $data['lokasi']; ?></td>
                  <td><?php echo $data['no_tlp']; ?></td>
                  <td></td>
                </tr>

                <?php } ?>
                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
</div>