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
          <h3 class="box-title">   Data Pengadaan Obat</h3>

        </div>
        <div class="box-body">
          <hr>
          <!-- Button trigger modal -->
          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
            Tambah Data Pengadaan Obat
          </button>

          <!-- Modal -->
          <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel"> <i class="fa fa-plus"></i> Form Tambah Data Pengadaan Obat</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <form method="post" action="<?= base_url('app/add_pengadaan_obat') ?>">

                   <div class="form-group">
                    <label for="exampleInputEmail1">Kode Pengadaan</label>
                    <input type="text" name="kode" class="form-control" required value="<?= $kode ?>">
                  </div>


                  <div class="form-group">
                    <label for="exampleInputEmail1">Supplier</label>
                    <input type="text" name="supplier" class="form-control" required="">
                  </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1">Nama Obat</label>
                    <input type="text" name="nama_obat" class="form-control" required="">
                  </div>


                  <div class="form-group">
                    <label for="exampleInputEmail1">Jenis Obat</label>
                    <input type="text" name="jenis_obat" class="form-control" required="">
                  </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1">Satuan</label>
                    <input type="text" name="satuan" class="form-control" required="">
                  </div>


                  <div class="form-group">
                    <label for="exampleInputEmail1">Harga Beli</label>
                    <input type="text" name="harga_beli" class="form-control" required="">
                  </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1">Jumlah</label>
                    <input type="number" name="jml" class="form-control" required="">
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
                  <th>Supplier</th>
                  <th>Jenis Obat</th>
                  <th>Satuan</th>
                  <th>Harga beli</th>
                  <th>Jumlah</th>
                  <th>Total</th>
                  <th>Status</th>
                  <th>Opsi</th>
                </tr>
              </thead>
              <tbody>
                <?php $no = 1 ?>
                <?php foreach($pengadaan as $data){ ?>
                  <tr>
                    <td><?= $no++ ?></td>
                    <td>
                      <?= $data['kode'] ?>
                    </td>
                    <td><?= $data['nama_obat'] ?></td>
                    <td><?= $data['supplier'] ?></td>
                    <td><?= $data['jenis_obat'] ?></td>
                    <td><?= $data['satuan'] ?> </td>
                    <td><?= $data['harga_beli'] ?></td>
                    <td><?= $data['jml'] ?></td>
                    <td><?= $data['total'] ?></td>
                    <td>
                      <?php   
                      if($data['status'] == 0){
                        echo "menunggu";
                      }else{
                        echo "disetujui";
                      }
                      ?>

                    </td>
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
                        <form method="post" action="<?= base_url('app/hapus_obat') ?>">
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
               <th>Supplier</th>
               <th>Jenis Obat</th>
               <th>Satuan</th>
               <th>Harga beli</th>
               <th>Jumlah</th>
               <th>Total</th>
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