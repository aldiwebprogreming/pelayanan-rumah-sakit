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
          <h3 class="box-title">  <i class="fa fa-users"></i> Data Tenaga Kesehatan</h3>

        </div>
        <div class="box-body">
          <hr>
          <!-- Button trigger modal -->
          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
            Tambah Data Tenaga Kesehatan
          </button>

          <!-- Modal -->
          <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel"> <i class="fa fa-plus"></i> Form Tambah Data Tenaga Kesehatan</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">


                  <form method="post" action="<?= base_url('app/addnakes') ?>">

                   <div class="form-group">
                    <label for="exampleInputEmail1">Nama</label>
                    <input type="text" name="nama" class="form-control" required value="">
                  </div>


                  <div class="form-group">
                    <label for="exampleInputEmail1">Nip</label>
                    <input type="text" name="nip" class="form-control" required="">
                  </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1">Jenis Kelamin</label>
                    <select class="form-control" name="jk">
                      <option>-- Pilih jenis Kelamin --</option>
                      <option>Laki - Laki</option>
                      <option>Perempuan</option>
                    </select>
                  </div>


                  <div class="form-group">
                    <label for="exampleInputEmail1">Alamat</label>
                    <textarea class="form-control" name="alamat"></textarea>
                  </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1">No Hp</label>
                    <input type="number" class="form-control" name="nohp">
                  </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1">Jabatan</label>
                    <select class="form-control" name="jabatan">
                      <option>-- Pilih jabatan --</option>
                      <?php foreach ($jabatan as $data) {  ?>
                        <option><?= $data['jabatan'] ?></option>
                      <?php } ?>
                    </select>
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
                  <th>Nama</th>
                  <th>Nip</th>
                  <th>Jk</th>
                  <th>Alamat</th>
                  <th>No Hp</th>
                  <th>Jabatan</th>
                  <th>Opsi</th>
                </tr>
              </thead>
              <tbody>
                <?php $no = 1 ?>
                <?php foreach($tenagakesehatan as $data){ ?>
                  <tr>
                    <td><?= $no++ ?></td>
                    <td>
                      <?= $data['nama'] ?>
                    </td>
                    <td><?= $data['nip'] ?></td>
                    <td><?= $data['jk'] ?></td>
                    <td><?= $data['alamat'] ?></td>
                    <td><?= $data['nohp'] ?></td>
                    <td><?= $data['jabatan'] ?></td>
                    <td>
                      <button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#exampleModaledit<?= $data['id'] ?>"><i class="fa fa-pen"></i> Edit</button>

                      <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#exampleModalhapus<?= $data['id'] ?>"><i class="fa fa-trash"></i></button>
                    </td>
                  </tr>


                  <!-- Modal Edit -->
                  <div class="modal fade" id="exampleModaledit<?= $data['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Edit Data Tenaga Kesehatan</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                         <form method="post" action="<?= base_url('app/editnakes') ?>">

                          <input type="hidden" name="id" value="<?= $data['id']  ?>">

                          <div class="form-group">
                            <label for="exampleInputEmail1">Nama</label>
                            <input type="text" name="nama" class="form-control" required value="<?= $data['nama'] ?>">
                          </div>


                          <div class="form-group">
                            <label for="exampleInputEmail1">Nip</label>
                            <input type="text" name="nip" class="form-control" required="" value="<?= $data['nip'] ?>">
                          </div>

                          <div class="form-group">
                            <label for="exampleInputEmail1">Jenis Kelamin</label>
                            <select class="form-control" name="jk">
                              <option><?= $data['jk'] ?></option>
                              <option>-- Pilih jenis Kelamin --</option>
                              <option>Laki - Laki</option>
                              <option>Perempuan</option>
                            </select>
                          </div>


                          <div class="form-group">
                            <label for="exampleInputEmail1">Alamat</label>
                            <textarea class="form-control" name="alamat"><?= $data['alamat'] ?></textarea>
                          </div>

                          <div class="form-group">
                            <label for="exampleInputEmail1">No Hp</label>
                            <input type="number" class="form-control" value="<?= $data['nohp'] ?>" name="nohp">
                          </div>

                          <div class="form-group">
                            <label for="exampleInputEmail1">Jabatan</label>
                            <select class="form-control" name="jabatan">
                              <option><?= $data['jabatan'] ?></option>
                              <option>-- Pilih jabatan --</option>
                              <?php foreach ($jabatan as $data2) {  ?>
                                <option><?= $data2['jabatan'] ?></option>
                              <?php } ?>
                            </select>
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
                        <h5 class="modal-title" id="exampleModalLabel">Hapus Data Tenaga Kesehatan</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">

                        <h4>Apakah anda ingin menghapus data ini ? </h4>
                        <form method="post" action="<?= base_url('app/hapus_nakes') ?>">
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
               <th>Nama</th>
               <th>Nip</th>
               <th>Jk</th>
               <th>Alamat</th>
               <th>No Hp</th>
               <th>Jabatan</th>
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