 <main id="main">

  <!-- ======= Breadcrumbs Section ======= -->
  <section class="breadcrumbs">
    <div class="container">

      <div class="d-flex justify-content-between align-items-center">
        <h2>Data Antrian</h2>
        <ol>
          <li><a href="<?= base_url('Pasien/') ?>">Home</a></li>
          <li>Data Antrian</li>
        </ol>
      </div>

    </div>
  </section><!-- End Breadcrumbs Section -->

  <section class="inner-page">
    <div class="container">
      <div class="row">
        <?php 
        if ($antrian == true) {
          ?>

          <div class="table-responsive">
            <table class="table">
              <thead class="thead-dark">
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Kode Antrian</th>
                  <th scope="col">Nama</th>
                  <th scope="col">Poli Klinik</th>
                  <th scope="col">No Antrian</th>
                  <th scope="col">Tgl Antrian</th>
                  <th scope="col">Opsi</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $no = 1;
                foreach ($antrian as $data) { ?>
                  <tr>
                    <th scope="row"><?= $no++ ?></th>
                    <td><?= $data['kode_antrian'] ?></td>
                    <td><?= $data['nama_pasien'] ?></td>
                    <td><?= $data['poli'] ?></td>
                    <td><?= $data['no_antrian'] ?></td>
                    <td><?= $data['tgl_antrian'] ?></td>
                    <td>
                      <a href="" class="btn btn-primary">Download kartu antrian</a>
                    </td>
                  </tr>
                <?php } ?>
              </tbody>
            </table>
          </div>
        <?php }else{

          echo "<p class='text-center'>Data Antrian kosong</p>";

        } ?>

      </div>
    </div>
  </section>

  </main><!-- End #main -->