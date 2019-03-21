<div class="box">
            <div class="box-header">
              <h3 class="box-title">Mater Unit</h3>
              <div class="box-body pad table-responsive">
            </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Kode</th>
                  <th>Nama Unit</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                 <?php
                    $sql = mysqli_query($koneksi,"SELECT * FROM mst_unit ORDER BY kode DESC");
                    $no =0;
                    while ($data = mysqli_fetch_array($sql)){
                    $no++;     
                 ?>  

                <tr>
                  <td><?php echo $data['kode']; ?></td>
                  <td><?php echo $data['nama_unit']; ?></td>
                  <td></td>
                </tr>

                <?php } ?>
                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
</div>