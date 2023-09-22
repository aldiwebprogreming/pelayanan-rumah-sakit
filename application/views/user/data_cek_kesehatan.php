 <main id="main">

  <!-- ======= Breadcrumbs Section ======= -->
  <section class="breadcrumbs">
    <div class="container">

      <div class="d-flex justify-content-between align-items-center">
        <h2>Data Pesan</h2>
        <ol>
          <li><a href="<?= base_url('Pasien/') ?>">Home</a></li>
          <li>Data Pesan</li>
        </ol>
      </div>

    </div>
  </section><!-- End Breadcrumbs Section -->

  <section class="inner-page">
    <div class="container">
      <div class="row">
        <?php 
        if ($kesehatan == true) {
          ?>

          <div class="table-responsive">
            <table class="table">
              <thead class="thead-dark">
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Kode Pesan</th>
                  <th scope="col">Nama</th>
                  <th scope="col">Penyakit</th>
                  <th scope="col">Keluhan</th>
                  <th scope="col">Keterangan</th>
                  <th scope="col">Tanggal</th>
                  <th scope="col">Status</th>
                  <th scope="col">Respon</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $no = 1;
                foreach ($kesehatan as $data) { ?>
                  <tr>
                    <th scope="row"><?= $no++ ?></th>
                    <td><?= $data['kode'] ?></td>
                    <td><?= $data['nama_pasien'] ?></td>
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


                    </td>
                    <td>
                      <?php 
                      if($data['status'] == 1){

                        $respon = $this->db->get_where('tbl_pesan', ['id_cek_kesehatan' => $data['id']])->row_array();
                        echo $respon['pesan'];

                      }else{

                        echo "-";
                      }

                      ?>
                    </td>
                  </tr>
                <?php } ?>
              </tbody>
            </table>
          </div>
        <?php }else{

          echo "<p class='text-center'>Data cek kesehatan kosong</p>";

        } ?>

      </div>
    </div>
  </section>

  </main><!-- End #main -->