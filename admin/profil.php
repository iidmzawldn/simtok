<?php
if(!isset($koneksi)){
  header("Location: index.php");
}else{
$data = mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM setting_pengguna"));
?>
          <!-- Widget: user widget style 1 -->
          <div class="box box-widget widget-user">
            <!-- Add the bg color to the header using any of the bg-* classes -->
            <div class="widget-user-header bg-purple-active">
              <h3 class="widget-user-username"><?= $data['nama_perusahaan'] ?></h3>
              <h5 class="widget-user-desc"><?= $data['alamat'] ?></h5>
            </div>
            <div class="widget-user-image">
              <img class="img-circle" src="gambar/<?= $data['foto'] ?>" alt="User Avatar">
            </div>
            <div class="box-footer">
              <div class="row">
                <div class="col-sm-12">
                  <div class="description-block">
                    <h5 class="description-header"></h5>
                    <span class="description-text"></span>
                  </div>
                  <!-- /.description-block -->
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->
              <div class="row">
                <div class="col-md-12">
                  <table class="table table-bordered table-striped datatables-full" width="100%">
                    <tr>
                      <td>Nama Perusahaan</td>
                      <td>:</td>
                      <td><?= $data['nama_perusahaan'] ?></td>
                    </tr>
                    <tr>
                      <td>Alamat</td>
                      <td>:</td>
                      <td><?= $data['alamat'] ?></td>
                    </tr>
                  </table>
                  <br>
                  <a href="#" class="btn btn-default btn-block" data-toggle="modal" data-target="#modal_edit_profile" >Edit Profile</a>
                  <a href="#" class="btn btn-default btn-block" data-toggle="modal" data-target="#modal_ganti_foto" >Ganti Photo</a>
                </div>
              </div>
              <!-- /.row -->

          <div class="modal fade" id="modal_edit_profile">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <span class="close" data-dismiss="modal">&times;</span>
                <h4 class="modal-title">Edit Profile</h4>
              </div>
              <form action="edit_profile.php" method="POST">
              <div class="modal-body">
                <div class="form-group">
                  <input type="text" name="nama_perusahaan" value="<?= $data['nama_perusahaan'] ?>" placeholder="Nama Perusahaan" class="form-control">
                </div>
                <div class="form-group">
                  <textarea name="alamat" class="form-control" rows="3" placeholder="Alamat"><?= $data['alamat'] ?></textarea>
                </div>
              </div>
              <div class="modal-footer">
                <input type="button" value="Batal" class="btn btn-default" data-dismiss="modal" />
                <input type="Reset" value="Reset" class="btn btn-warning" />
                <input type="submit" name="action" value="Simpan" class="btn btn-success" />
              </div>
              </form>
            </div>
          </div>
        </div>


          <div class="modal fade" id="modal_ganti_foto">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <span class="close" data-dismiss="modal">&times;</span>
                <h4 class="modal-title">Ganti foto</h4>
              </div>
              <form enctype="multipart/form-data" action="edit_foto.php" method="POST">
              <div class="modal-body">
                <div class="form-group">
                  <input type="file" name="foto" class="form-control">
                </div>
              </div>
              <div class="modal-footer">
                <input type="button" value="Batal" class="btn btn-default" data-dismiss="modal" />
                <input type="Reset" value="Reset" class="btn btn-warning" />
                <input type="submit" name="action" value="Simpan" class="btn btn-success" />
              </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
          <!-- /.widget-user -->
  <?php } ?>