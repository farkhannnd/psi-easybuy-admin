<?php include 'header.php'; ?>

<div class="content-wrapper">

  <section class="content-header">
    <h1>
      Barang
      <small>Barang</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Dashboard</li>
    </ol>
  </section>

  <section class="content">
    <div class="row">
      <section class="col-lg-12">
        <div class="box box-info">

          <div class="box-header">
            <h3 class="box-title">Nama Produk/Barang</h3>
            <div class="btn-group pull-right">            

              <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#exampleModal">
                <i class="fa fa-plus"></i> &nbsp Tambah Barang
              </button>
            </div>
          </div>
          <div class="box-body">

            <!-- Modal -->
            <form action="barang_act.php" method="post">
              <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Tambah Barang</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">

                      <div class="form-group">
                        <label>Nama Barang</label>
                        <input type="text" name="barang" required="required" class="form-control" placeholder="Nama Barang .."><br><br>
                        <label>Stok Barang</label>
                        <input type="text" name="stok" required="required" class="form-control" placeholder="Stok Barang .."><br><br>
                        <!-- <label>ID Kategori</label>
                        <input type="text" name="idkategori" required="required" class="form-control" placeholder="ID Kategori .."><br><br> -->
                        <label>Kategori</label>
                        <select name="idkategori" class="form-control" required="required">
                          <option value="">- Pilih -</option>
                          <?php 
                          $kategori = mysqli_query($koneksi,"SELECT * FROM kategori_stok");
                          while($k = mysqli_fetch_array($kategori)){
                            ?>
                            <option value="<?php echo $k['idkategori']; ?>"><?php echo $k['namakategori']; ?></option>
                            <?php 
                          }
                          ?>
                        </select>
                      </div>
                      </div>

                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                      <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                  </div>
                </div>
              </div>
            </form>


            <div class="table-responsive">
              <table class="table table-bordered table-striped" id="table-datatable">
                <thead>
                  <tr>
                    <th width="1%">No</th>
                    <th>Nama</th>
                    <th>Stok</th>
                    <th>Nama Kategori</th>
                    <th width="10%">Opsi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php 
                  include '../koneksi.php';
                  $no=1;
                  $data = mysqli_query($koneksi, "SELECT * FROM kategori_stok k JOIN barang b ON k.idkategori = b.idkategori");
                  while($d = mysqli_fetch_array($data)){
                    ?>
                    <tr>
                      <td><?php echo $no++; ?></td>
                      <td><?php echo $d['barang']; ?></td>
                      <td><?php echo $d['stok_barang']; ?></td>
                      <td><?php echo $d['namakategori']; ?></td>
                      <td>    
                        <?php 
                        if($d['barang_id'] != 0){
                          ?> 
                          <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#edit_barang_<?php echo $d['barang_id'] ?>">
                            <i class="fa fa-cog"></i>
                          </button>

                          <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#hapus_barang_<?php echo $d['barang_id'] ?>">
                            <i class="fa fa-trash"></i>
                          </button>
                          <?php 
                        }
                        ?>

                        <form action="barang_update.php" method="post">
                          <div class="modal fade" id="edit_barang_<?php echo $d['barang_id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title" id="exampleModalLabel">Edit Barang</h5>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>
                                <div class="modal-body">

                                  <div class="form-group" style="width:100%">
                                    <label>Nama Barang</label>
                                    <input type="hidden" name="id" required="required" class="form-control" placeholder="Nama Barang .." value="<?php echo $d['barang_id']; ?>">
                                    <input type="text" name="barang" required="required" class="form-control" placeholder="Nama Barang .." value="<?php echo $d['barang']; ?>" style="width:100%"><br>
                                    <br>
                                    <label>Stok Barang</label>
                                    <input type="number" name="stok" required="required" class="form-control" placeholder="Stok Barang .." value="<?php echo $d['stok_barang']; ?>" style="width:100%"><br>
                                    <br>
                                    <label>Kategori</label>
                                       <select name="idkategori" class="form-control" required="required">
                                          <option value="">- Pilih -</option>
                                            <?php 
                                            $cat = mysqli_query($koneksi,"SELECT * FROM kategori_stok");
                                            while($k = mysqli_fetch_array($cat)){
                                             ?>
                                         <option value="<?php echo $k['idkategori']; ?>"><?php echo $k['namakategori']; ?></option>
                                        <?php 
                                           }
                                        ?>
                                  </select>
                                  </div>

                                </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                  <button type="submit" class="btn btn-primary">Simpan</button>
                                </div>
                              </div>
                            </div>
                          </div>
                        </form>

                        <!-- modal hapus -->
                        <div class="modal fade" id="hapus_barang_<?php echo $d['barang_id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                          <div class="modal-dialog" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Peringatan!</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body">

                                <p>Yakin ingin menghapus data ini ?</p>

                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                <a href="barang_hapus.php?id=<?php echo $d['barang_id'] ?>" class="btn btn-primary">Hapus</a>
                              </div>
                            </div>
                          </div>
                        </div>

                      </td>
                    </tr>
                    <?php 
                  }
                  ?>
                </tbody>
              </table>
            </div>
          </div>

        </div>
      </section>
    </div>
  </section>

</div>
<?php include 'footer.php'; ?>