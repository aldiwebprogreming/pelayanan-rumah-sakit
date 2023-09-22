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
          <h3 class="box-title">  <i class="fa fa-users"></i> Data Antrian</h3>

        </div>
        <div class="box-body">
          <hr>
          <!-- Button trigger modal -->
          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
            Tambah Data Antrian
          </button>

          <!-- Modal -->
          <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel"> <i class="fa fa-plus"></i> Form Tambah Data Antrian</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <form method="post" action="<?= base_url('app/add_antrian') ?>">

                   <div class="form-group">
                    <label for="exampleInputEmail1">Kode antrian</label>
                    <input type="text" name="kode_antrian" class="form-control" required value="<?= $kode ?>">
                  </div>


                  <div class="form-group">
                    <label for="exampleInputEmail1">Nama Pasien</label>
                    <input type="text" name="nama_pasien" class="form-control" required="">
                  </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1">Poli</label>
                    <select class="form-control" name="poli">
                      <option>-- Pilih Poli --</option>
                      <?php   foreach ($poli as $data) { ?>

                        <option><?= $data['nama_poli'] ?></option>
                      <?php   } ?>

                    </select>
                  </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1">Jam antrian</label>
                    <input type="time" name="jam_antrian" class="form-control" required="">
                  </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1">Tanggal Antrian</label>
                    <input type="date" name="tgl_antrian" class="form-control" required="">
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
                  <th>Kode Antrian</th>
                  <th>Nama Pasien</th>
                  <th>Nama Poli</th>
                  <th>Jam Antrian</th>
                  <th>Tgl Antrian</th>
                  <th>Status</th>
                  <th>Opsi</th>
                </tr>
              </thead>
              <tbody>
                <?php $no = 1 ?>
                <?php foreach($antrian as $data){ ?>
                  <tr>
                    <td><?= $no++ ?></td>
                    <td>
                      <?= $data['kode_antrian'] ?>
                    </td>
                    <td>
                      <?= $data['nama_pasien'] ?>
                    </td>
                    <td><?= $data['poli'] ?></td>
                    <td><?= $data['jam_antrian'] ?></td>
                    <td><?= $data['tgl_antrian'] ?></td>
                    <td>
                      <?php 
                      if($data['status'] == 1){
                        echo 'Selesai';
                      }else{
                        echo "Menunggu";
                      }
                      ?>
                    </td>
                    <td>
                      <button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#exampleModaledit<?= $data['id'] ?>"><i class="fa fa-pen"></i> Edit</button>

                      <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#exampleModalstatus<?= $data['id'] ?>"><i class="fa fa-user"></i>Selesai</button>

                      <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#exampleModalhapus<?= $data['id'] ?>"><i class="fa fa-trash"></i></button>
                    </td>
                  </tr>


                  <!-- Modal Edit -->
                  <div class="modal fade" id="exampleModaledit<?= $data['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Edit Data Poli</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                         <form method="post" action="<?= base_url('app/edit_antrian') ?>">

                          <input type="hidden" name="id" value="<?= $data['id']  ?>">

                          <div class="form-group">
                            <label for="exampleInputEmail1">Kode antrian</label>
                            <input type="text" name="kode_antrian" class="form-control" required value="<?= $data['kode_antrian'] ?>">
                          </div>


                          <div class="form-group">
                            <label for="exampleInputEmail1">Nama Pasien</label>
                            <input type="text" name="nama_pasien" class="form-control" required="" value="<?= $data['nama_pasien'] ?>">
                          </div>

                          <div class="form-group">
                            <label for="exampleInputEmail1">Poli</label>
                            <select class="form-control" name="poli">
                              <option><?= $data['poli'] ?></option>
                              <option>-- Pilih Poli --</option>
                              <?php   foreach ($poli as $data2) { ?>

                                <option><?= $data2['nama_poli'] ?></option>
                              <?php   } ?>

                            </select>
                          </div>

                          <div class="form-group">
                            <label for="exampleInputEmail1">Jam antrian</label>
                            <input type="time" name="jam_antrian" class="form-control" required="" value="<?= $data['jam_antrian'] ?>">
                          </div>

                          <div class="form-group">
                            <label for="exampleInputEmail1">Tanggal Antrian</label>
                            <input type="date" name="tgl_antrian" class="form-control" required="" value="<?= $data['tgl_antrian'] ?>">
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
                        <h5 class="modal-title" id="exampleModalLabel">Hapus Data Poli</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">

                        <h4>Apakah anda ingin menghapus data ini ? </h4>
                        <form method="post" action="<?= base_url('app/hapus_antrian') ?>">
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

                <!-- Modal Hapus -->
                <div class="modal fade" id="exampleModalstatus<?= $data['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Status</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">

                        <h4>Apakah antrian ini selsesai ? </h4>
                        <form method="post" action="<?= base_url('app/status_antrian') ?>">
                          <input type="hidden" name="id" value="<?= $data['id'] ?>">

                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                          <button type="submit" class="btn btn-primary">Yes</button>
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
               <th>Kode Antrian</th>
               <th>Nama Pasien</th>
               <th>Nama Poli</th>
               <th>Jam Antrian</th>
               <th>Tgl Antrian</th>
               <th>Status</th>
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