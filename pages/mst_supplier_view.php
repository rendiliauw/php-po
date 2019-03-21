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
                  <th>Perusahaan</th>
                  <th>No.tlp</th>
                  <th>Alamat</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                 <?php
                    $sql = mysqli_query($koneksi,"SELECT * FROM mst_supplier ORDER BY id DESC");
                    $no =0;
                    while ($data = mysqli_fetch_array($sql)){
                    $no++;     
                 ?>  

                <tr>
                  <td><?php echo $data['nama']; ?></td>
                  <td><?php echo $data['perusahaan']; ?></td>
                  <td><?php echo $data['no_tlp']; ?></td>
                  <td><?php echo $data['alamat']; ?></td>
                  <td></td>
                </tr>

                <?php } ?>
                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
</div>