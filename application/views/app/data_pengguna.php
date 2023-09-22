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
          <h3 class="box-title">  <i class="fa fa-users"></i> Data Pengguna</h3>

        </div>
        <div class="box-body">
          <hr>
          <!-- Button trigger modal -->
          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
            Tambah Data Pengguna
          </button>

          <!-- Modal -->
          <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel"> <i class="fa fa-plus"></i> Form Tambah Data Pengguna</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <form method="post" action="<?= base_url('app/add_pengguna') ?>">




                    <div class="form-group">
                      <label for="exampleInputEmail1">Username</label>
                      <input type="text" name="username" class="form-control" required="">
                    </div>

                    <div class="form-group">
                      <label for="exampleInputEmail1">password</label>
                      <input type="password" name="password" class="form-control" required="">
                    </div>

                    <div class="form-group">
                      <label for="exampleInputEmail1">Level</label>
                      <select class="form-control" name="level">
                        <option>-- Pilih Level --</option>
                        <?php foreach ($level as $data) { ?>
                          <option><?= $data['level'] ?></option>
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
                    <th>Username</th>
                    <th>Level</th>
                    <th>Opsi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $no = 1 ?>
                  <?php foreach($pengguna as $data){ ?>
                    <tr>
                      <td><?= $no++ ?></td>
                      <td>
                        <?= $data['username'] ?>
                      </td>
                      <td><?= $data['level'] ?></td>
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
                            <h5 class="modal-title" id="exampleModalLabel">Edit Data Pengguna</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                           <form method="post" action="<?= base_url('app/edit_pengguna') ?>">

                            <input type="hidden" name="id" value="<?= $data['id']  ?>">


                            <div class="form-group">
                              <label for="exampleInputEmail1">Username</label>
                              <input type="text" name="username" class="form-control" required="" value="<?= $data['username'] ?>">
                            </div>

                            <div class="form-group">
                              <label for="exampleInputEmail1">password Baru</label>
                              <input type="password" name="password" class="form-control" required="">
                            </div>

                            <div class="form-group">
                              <label for="exampleInputEmail1">Level</label>
                              <select class="form-control" name="level">
                                <option><?= $data['level'] ?></option>
                                <option>-- Polih Level --</option>
                                <?php foreach ($level as $data2) { ?>
                                  <option><?= $data2['level'] ?></option>
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
                          <h5 class="modal-title" id="exampleModalLabel">Hapus Data Pengguna</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">

                          <h4>Apakah anda ingin menghapus data ini ? </h4>
                          <form method="post" action="<?= base_url('app/hapus_pengguna') ?>">
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
                 <th>Username</th>
                 <th>Level</th>
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