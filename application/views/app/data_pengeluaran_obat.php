<style>
  td{
    font-weight: normal;
  }
</style>
<!-- Main content -->
<section class="content">


  <div class="row">
    <div class="col-md-12">

      <div class="box box-danger">
        <div class="box-header">
          <h3 class="box-title">   Data Pengeluaran Obat</h3>

        </div>
        <div class="box-body">
          <hr>
          <!-- Button trigger modal -->
          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
            Tambah Data Pengeluaran Obat
          </button>

          <!-- Modal -->
          <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel"> <i class="fa fa-plus"></i> Form Tambah Data Pengeluaran Obat</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <form method="post" action="<?= base_url('app/add_pengeluaran_obat') ?>">

                   <div class="form-group">
                    <label for="exampleInputEmail1">Kode Pengeluaran</label>
                    <input type="text" name="kode" class="form-control" readonly="" required value="<?= $kode ?>">
                  </div>


                  <div class="form-group">
                    <label for="exampleInputEmail1">Nama Pasien</label>
                    <input type="text" name="nama_pasien" class="form-control" required="">
                  </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1">Nama Obat</label>
                    <select class="form-control" name="nama_obat">
                      <option>-- Pilih Obat -- </option>
                      <?php foreach ($obat as $data) { ?>
                        <option><?= $data['nama_obat'] ?></option>
                      <?php  } ?>
                    </select>
                  </div>


                  <div class="form-group">
                    <label for="exampleInputEmail1">Jenis Obat</label>
                    <input type="text" name="jenis_obat" class="form-control" required="">
                  </div>


                  <div class="form-group">
                    <label for="exampleInputEmail1">Jumlah</label>
                    <input type="number" name="jml" class="form-control" required="">
                  </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1">Keterangan</label>
                    <textarea class="form-control" name="keterangan"></textarea>
                  </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1">Tgl Serah</label>
                    <input type="date" name="tgl_serah" class="form-control" required="">
                  </div>



                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Simpan Data</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>





        <div class="box-body">
          <div class="table-responsive">
            <table id="example1" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Kode</th>
                  <th>Nama Obat</th>
                  <th>Nama Pasien</th>
                  <th>Jenis Obat</th>
                  <th>Jumlah</th>
                  <th>Keterangan</th>
                  <th>Tgl Serah</th>
                  <th>Opsi</th>
                </tr>
              </thead>
              <tbody>
                <?php $no = 1 ?>
                <?php foreach($pengeluaran as $data){ ?>
                  <tr>
                    <td><?= $no++ ?></td>
                    <td>
                      <?= $data['kode'] ?>
                    </td>
                    <td><?= $data['nama_obat'] ?></td>
                    <td><?= $data['nama_pasien'] ?></td>
                    <td><?= $data['jenis_obat'] ?></td>
                    <td><?= $data['jml'] ?></td>
                    <td><?= $data['keterangan'] ?></td>
                    <td><?= $data['tgl_serah'] ?></td>

                    <td>
                      <!--   <button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#exampleModaledit<?= $data['id'] ?>"><i class="fa fa-pen"></i> Edit</button> -->

                      <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#exampleModalhapus<?= $data['id'] ?>"><i class="fa fa-trash"></i></button>
                    </td>
                  </tr>


                  <!-- Modal Edit -->
                  <div class="modal fade" id="exampleModaledit<?= $data['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Edit Data Obat</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                         <form method="post" action="<?= base_url('app/act_editobat') ?>">

                          <input type="hidden" name="id" value="<?= $data['id']  ?>">

                          <div class="form-group">
                            <label for="exampleInputEmail1">Kode</label>
                            <input type="text" name="kode" readonly="" class="form-control" value="<?= $data['kode'] ?>" required>
                          </div>


                          <div class="form-group">
                            <label for="exampleInputEmail1">Nama Obat</label>
                            <input type="text" name="nama_obat" class="form-control" value="<?= $data['nama_obat'] ?>">
                          </div>

                          <div class="form-group">
                            <label for="exampleInputEmail1">Unit</label>
                            <input type="text" name="unit" class="form-control" value="<?= $data['unit'] ?>">
                          </div>


                          <div class="form-group">
                            <label for="exampleInputEmail1">QTY</label>
                            <input type="number" name="qty" class="form-control" value="<?= $data['qty'] ?>">
                          </div>


                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                          <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>

                <!-- End Modal Edit -->

                <!-- Modal Hapus -->
                <div class="modal fade" id="exampleModalhapus<?= $data['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Hapus Data Pengadaan Obat</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">

                        <h4 class="text-center">Apakah anda ingin menghapus data ini ? </h4>
                        <form method="post" action="<?= base_url('app/hapus_pengeluaran_obat') ?>">
                          <input type="hidden" name="id" value="<?= $data['id'] ?>">

                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                          <button type="submit" class="btn btn-primary">Delete</button>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>

                <!-- End Modal Edit -->
              <?php } ?>

            </tbody>
            <tfoot>
              <tr>
                <th>No</th>
                <th>Kode</th>
                <th>Nama Obat</th>
                <th>Nama Pasien</th>
                <th>Jenis Obat</th>
                <th>Jumlah</th>
                <th>Keterangan</th>
                <th>Tgl Serah</th>
                <th>Opsi</th>
              </tr>
            </tfoot>
          </table>
        </div>
      </div>
    </tbody>

  </div>
  <!-- /.box-body -->
</div>
<!-- /.box -->



</div>
</div>


</section>
<!-- /.content -->
</div>