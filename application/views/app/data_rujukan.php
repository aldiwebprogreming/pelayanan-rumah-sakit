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
          <h3 class="box-title">   Data Rujukan</h3>

        </div>
        <div class="box-body">
          <hr>
          <!-- Button trigger modal -->
          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
            Tambah Data Rujukan
          </button>

          <!-- Modal -->
          <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel"> <i class="fa fa-plus"></i> Form Tambah Data Rujukan</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <form method="post" action="<?= base_url('app/add_rujukan') ?>">


                    <div class="form-group">
                      <label for="exampleInputEmail1">Nomor Rujukan</label>
                      <input type="text" name="no_rujukan" class="form-control" readonly required value="<?= $kode ?>">
                    </div>


                    <div class="form-group">
                      <label for="exampleInputEmail1">Nama Pasien</label>
                      <input type="text" name="nama_pasien" class="form-control" required="">
                    </div>

                    <div class="form-group">
                      <label for="exampleInputEmail1">Nama Penyakit</label>
                      <input type="text" name="nama_penyakit" class="form-control" required="">
                    </div>

                    <div class="form-group">
                      <label for="exampleInputEmail1">Diagnosa</label>
                      <input type="text" name="diagnosa" class="form-control" required value="">
                    </div>

                    <div class="form-group">
                      <label for="exampleInputEmail1">Rumah Sakit</label>
                      <input type="text" name="nama_rumah_sakit" class="form-control" required="">
                    </div>

                    <div class="form-group">
                      <label for="exampleInputEmail1">Poli Tujuan</label>
                      <input type="text" name="poli_tujuan" class="form-control" required="">
                    </div>

                    <div class="form-group">
                      <label for="exampleInputEmail1">Tgl Rujukan</label>
                      <input type="date" name="tgl_rujukan" class="form-control" required="">
                    </div>

                    <div class="form-group">
                      <label for="exampleInputEmail1">No Rawat</label>
                      <input type="text" name="no_rawat" class="form-control" required="" value="<?= $no_rawat ?>" readonly>
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

                   <th>Nomor Rujukan</th>
                   <th>Pasien</th>
                   <th>Penyakit</th>
                   <th>Diagnosa</th>
                   <th>Rumah Sakit</th>
                   <th>Poli Tujuan</th>
                   <th>Tgl Rujukan</th>
                   <th>No Rawat</th>
                   <th>Opsi</th>
                 </tr>
               </thead>
               <tbody>
                <?php $no = 1 ?>
                <?php foreach($rujukan as $data){ ?>
                  <tr>
                    <td><?= $no++ ?></td>

                    <td>
                      <?= $data['no_rujukan'] ?>
                    </td>
                    <td><?= $data['nama_pasien'] ?></td>
                    <td><?= $data['nama_penyakit'] ?></td>
                    <td><?= $data['diagnosa'] ?></td>
                    <td><?= $data['nama_rumah_sakit'] ?></td>
                    <td><?= $data['poli_tujuan'] ?></td>
                    <td><?= $data['tgl_rujukan'] ?></td>
                    <td><?= $data['no_rawat'] ?></td>
                    <td>
                      <button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#exampleModaledit<?= $data['no_rujukan'] ?>"><i class="fa fa-pen"></i> Edit</button>

                      <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#exampleModalhapus<?= $data['no_rujukan'] ?>"><i class="fa fa-trash"></i></button>
                    </td>
                  </tr>


                  <!-- Modal Edit -->
                  <div class="modal fade" id="exampleModaledit<?= $data['no_rujukan'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Edit Data Rujukan</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          <form method="post" action="<?= base_url('app/edit_rujukan') ?>">


                            <input type="hidden" name="id" value="<?= $data['no_rujukan']  ?>">


                            <div class="form-group">
                              <label for="exampleInputEmail1">Nomor Rujukan</label>
                              <input type="text" name="no_rujukan" class="form-control" required value="<?= $data['no_rujukan'] ?>">
                            </div>


                            <div class="form-group">
                              <label for="exampleInputEmail1">Nama Pasien</label>
                              <input type="text" name="nama_pasien" class="form-control" required="" value="<?= $data['nama_pasien'] ?>">
                            </div>

                            <div class="form-group">
                              <label for="exampleInputEmail1">Nama Penyakit</label>
                              <input type="text" name="nama_penyakit" class="form-control" required="" value="<?= $data['nama_penyakit'] ?>">
                            </div>

                            <div class="form-group">
                              <label for="exampleInputEmail1">Diagnosa</label>
                              <input type="text" name="diagnosa" class="form-control" required  value="<?= $data['diagnosa'] ?>">
                            </div>

                            <div class="form-group">
                              <label for="exampleInputEmail1">Rumah Sakit</label>
                              <input type="text" name="nama_rumah_sakit" class="form-control" required="" value="<?= $data['nama_rumah_sakit'] ?>">
                            </div>

                            <div class="form-group">
                              <label for="exampleInputEmail1">Poli Tujuan</label>
                              <input type="text" name="poli_tujuan" class="form-control" required="" value="<?= $data['poli_tujuan'] ?>">
                            </div>

                            <div class="form-group">
                              <label for="exampleInputEmail1">Tgl Rujukan</label>
                              <input type="date" name="tgl_rujukan" class="form-control" required="" value="<?= $data['tgl_rujukan'] ?>">
                            </div>

                            <div class="form-group">
                              <label for="exampleInputEmail1">No Rawat</label>
                              <input type="text" name="no_rawat" class="form-control" required="" value="<?= $data['no_rawat'] ?>">
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


                  <!-- End Modal Edit -->

                  <!-- Modal Hapus -->
                  <div class="modal fade" id="exampleModalhapus<?= $data['no_rujukan'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Hapus Data Pasien</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">

                          <h4 class="text-center">Apakah anda ingin menghapus data ini ? </h4>
                          <form method="post" action="<?= base_url('app/hapus_rujukan') ?>">
                            <input type="hidden" name="id" value="<?= $data['no_rujukan'] ?>">

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

                 <th>Nomor Rujukan</th>
                 <th>Pasien</th>
                 <th>Penyakit</th>
                 <th>Diagnosa</th>
                 <th>Rumah Sakit</th>
                 <th>Poli Tujuan</th>
                 <th>Tgl Rujukan</th>
                 <th>No Rawat</th>
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