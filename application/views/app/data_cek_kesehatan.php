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
          <h3 class="box-title mb-3">  <i class="fa fa-users"></i> Data Cek Kesehatan</h3>


          <hr />


          <div class="box-body mt-3">
            <div class="table-responsive">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Pasien</th>
                    <th>Penyakit</th>
                    <th>Keluhan</th>
                    <th>Keterangan</th>
                    <th>Tanggal</th>
                    <th>Status</th>
                    <th>Opsi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $no = 1 ?>
                  <?php foreach($kesehatan as $data){ ?>
                    <tr>
                      <td><?= $no++ ?></td>
                      <td>
                        <?= $data['nama_pasien'] ?>
                      </td>
                      <td><?= $data['penyakit'] ?></td>
                      <td><?= $data['keluhan'] ?></td>
                      <td><?= $data['keterangan'] ?></td>
                      <td><?= $data['tgl'] ?></td>
                      <td>
                        <?php 
                        if($data['status'] == 1){
                          echo "<small class='text-success'>Direspon</small>";

                        }else{

                          echo "<small class='text-danger'>Menunggu respon</small>";
                        }

                        ?>


                        <td>

                         <?php 
                         if($data['status'] == 1){  ?>

                           <button class="btn btn-warning btn-sm" disabled data-toggle="modal" data-target="#exampleModaldetail<?= $data['id'] ?>"><i class="fas fa-comments"></i> Respon Pesan</button>
                         <?php }else{ ?>

                           <button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#exampleModaldetail<?= $data['id'] ?>"><i class="fas fa-comments"></i> Respon Pesan</button>

                         <?php  } ?>

                         <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#exampleModalhapus<?= $data['id'] ?>"><i class="fa fa-trash"></i></button>
                       </td>
                     </tr>


                     <!-- Modal Edit -->
                     <div class="modal fade" id="exampleModaldetail<?= $data['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Response Pesan</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">

                            <form method="post" action="<?= base_url('app/kirim_pesan') ?>">
                              <input type="hidden" name="idcek" value="<?= $data['id'] ?>">
                              <div class="form-group">
                                <label>Nama Pasien</label>
                                <input type="text" value="<?= $data['nama_pasien'] ?>" readonly class="form-control" name="nama_pasien">
                              </div>
                              <div class="form-group">
                                <label>Pesan</label>
                                <textarea class="form-control" name="pesan" required></textarea>
                              </div>


                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                              <button type="submit" class="btn btn-primary">Kirim Pesan</button>
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
                            <h5 class="modal-title" id="exampleModalLabel">Hapus Data</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">

                            <h4>Apakah anda ingin menghapus data ini ? </h4>
                            <form method="post" action="<?= base_url('app/hapus_cekkesehatan') ?>">
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
                   <th>Pasien</th>
                   <th>Penyakit</th>
                   <th>Keluhan</th>
                   <th>Keterangan</th>
                   <th>Tanggal</th>
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