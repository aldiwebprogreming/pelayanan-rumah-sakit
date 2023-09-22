 <main id="main">

  <!-- ======= Breadcrumbs Section ======= -->
  <section class="breadcrumbs">
    <div class="container">

      <div class="d-flex justify-content-between align-items-center">
        <h2>Cek kesehatan anda</h2>
        <ol>
          <li><a href="<?= base_url('Pasien/') ?>">Home</a></li>
          <li>Cek kesehatn</li>
        </ol>
      </div>

    </div>
  </section><!-- End Breadcrumbs Section -->

  <section class="inner-page">
    <div class="container">
      <div class="row">

        <?php 
        if ($cek != null) {
          ?>

          <center>
            <img src="<?= base_url('user/img/checklist.png') ?>" class="img-fluid" alt="Responsive image" style="height: 100px;">
            <h4 class="text-center fw-bold">Pesan berhasil dikirm</h4>
            <h5 class="fw-bold">Mohon menunggu</h5>
            <p>Dokter kami akan menjawab pesan anda, jawaban akan dikirim <br>melalui via SMS sesuai dengna nomor telepon anda</p>

            <br />
            <br />

            <a href="<?= base_url('Pasien/data_cek_kesehatan') ?>" class="mt-4">Lihat data pesan anda <i class="fas fa-angle-right"></i> </a>
          </center>

        <?php }else{ ?>
          <div class="col-sm-6">
            <center>
             <img src="<?= base_url('user/img/doktor.png') ?>" class="img-fluid" alt="Responsive image" style="height: 300px;">
             <p class="text-primary">Silahkan masukan data keluhan anda dengan benar dan <br />dapatkan respon terbaik dari doktor kami </p>
           </center>
         </div>
         <div class="col-sm-6">
          <div class="card shadow">
            <div class="card-body">
              <h3>Form Cek Kesehatan</h3>
              <hr>

              <form method="post" action="<?= base_url('pasien/add_kesehatan') ?>">
                <div class="form-group">
                  <label class="mb-2 fw-bold">Nama Pasien</label>
                  <input type="text" class="form-control" name="nama_pasien" readonly value="<?= $this->session->nama ?>">
                </div>


                <div class="form-group mt-3">
                  <label class="mb-2 fw-bold">Nama Penyakit</label>
                  <input type="text" class="form-control" name="penyakit" placeholder="Masukan penyakit anda">
                </div>

                <div class="form-group mt-3">
                  <label class="mb-2 fw-bold">Keluhan</label>
                  <textarea class="form-control" name="keluhan" required></textarea>
                </div>

                <div class="form-group mt-3">
                  <label class="mb-2 fw-bold">Keterangan</label>
                  <textarea class="form-control" name="keterangan" required></textarea>
                </div>


                <div class="form-group mt-3">
                  <button class="btn btn-primary w-100">Kirim keluhan anda </button>

                </form>

                <p class="mt-3 text-center">Sudah punya akun ? <a href="<?= base_url('Pasien/login') ?>">Login sekarang</a></p>
              </div>
            </div>
          </div>
        </div>

      <?php } ?>

    </div>

  </div>
</section>

  </main><!-- End #main -->