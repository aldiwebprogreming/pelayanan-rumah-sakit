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
          <h3 class="box-title">  <i class="fa fa-users"></i> Data Level</h3>

        </div>
        <div class="box-body">
          <hr>
          <!-- Button trigger modal -->
          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
            Tambah Data Level
          </button>

          <!-- Modal -->
          <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel"> <i class="fa fa-plus"></i> Form Tambah Data Level</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <form method="post" action="<?= base_url('app/add_level') ?>">

                    <div class="form-group">
                      <label for="exampleInputEmail1">Level</label>
                      <input type="text" name="level" class="form-control" required="">
                    </div>

                    <label>Hak Akses</label>
                    <?php  foreach ($menu as $data) { ?>
                      <div class="form-check">
                        <input class="form-check-input" name="menu[]" type="checkbox" value="<?= $data['id'] ?>" id="defaultCheck1">
                        <label class="form-check-label" for="defaultCheck1">
                          <?= $data['title'] ?>
                        </label>
                      </div>
                    <?php   } ?>





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
                    <th>Level</th>
                    <th>Opsi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $no = 1 ?>
                  <?php foreach($level as $data){ ?>
                    <tr>
                      <td><?= $no++ ?></td>
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
                            <h5 class="modal-title" id="exampleModalLabel">Edit Data Level</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                           <form method="post" action="<?= base_url('app/edit_level') ?>">

                            <input type="hidden" name="id" value="<?= $data['id']  ?>">


                            <div class="form-group">
                              <label for="exampleInputEmail1">Level</label>
                              <input type="text" name="level" class="form-control" required="" value="<?= $data['level'] ?>">
                            </div>

                            <label>Hak Akses</label>
                            <?php  foreach ($menu as $data2) { ?>

                              <?php   

                              $this->db->where('id_menu', $data2['id']);
                              $this->db->where('level', $data['level']);
                              $akses = $this->db->get('tbl_hak_akses')->row_array();

                              ?>
                              <div class="form-check">
                                <input class="form-check-input" <?= $akses ? 'checked' : '' ?> name="menu[]" type="checkbox" value="<?= $data2['id'] ?>" id="defaultCheck1">
                                <label class="form-check-label" for="defaultCheck1">
                                  <?= $data2['title'] ?>
                                </label>
                              </div>

                            <?php   } ?>



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
                          <h5 class="modal-title" id="exampleModalLabel">Hapus Data Level</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">

                          <h4>Apakah anda ingin menghapus data ini ? </h4>
                          <form method="post" action="<?= base_url('app/hapus_level') ?>">
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