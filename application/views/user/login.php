 <main id="main">

  <!-- ======= Breadcrumbs Section ======= -->
  <section class="breadcrumbs">
    <div class="container">

      <div class="d-flex justify-content-between align-items-center">
        <h2>Login Pasien</h2>
        <ol>
          <li><a href="<?= base_url('Pasien/') ?>">Home</a></li>
          <li>Login</li>
        </ol>
      </div>

    </div>
  </section><!-- End Breadcrumbs Section -->

  <section class="inner-page">
    <div class="container">
      <?php 
      if ($this->session->no_ktp == null) {
        ?>

        <div class="row">
          <div class="col-sm-6">
            <center>
             <img src="<?= base_url('user/img/doktor.png') ?>" class="img-fluid" alt="Responsive image" style="height: 300px;">
             <p class="text-primary">Masukan nama dan nomor KTP anda dengan benar </p>
           </center>
         </div>
         <div class="col-sm-6">
          <div class="card shadow">
            <div class="card-body">
              <h3>Login Pasien</h3>
              <hr>
              <form  method="post" action="<?= base_url('pasien/act_login') ?>">
                <div class="form-group">
                  <label class="mb-2 fw-bold">Nama</label>
                  <input type="text" class="form-control" name="nama" placeholder="Masukan nama anda">
                </div>

                <div class="form-group mt-3">
                  <label class="mb-2 fw-bold">Nomor KTP</label>
                  <input type="password" class="form-control" name="no_ktp" placeholder="Masukan nomor ktp anda">
                </div>

                <div class="form-group mt-3">
                  <button class="btn btn-primary w-100">Login</button>
                </form>

                <p class="mt-3 text-center">Belum punya akun ? <a href="<?= base_url('Pasien/daftar') ?>">Daftar sekarang</a></p>
              </div>
            </div>
          </div>
        </div>

      <?php }else{ ?>

        <div class="row">
          <center>
            <img src="<?= base_url('user/img/doktor.png') ?>" class="img-fluid" alt="Responsive image" style="height: 300px;">
            <p class="fw-bold text-primary"> Hello <?= $this->session->nama ?>, Anda sekarang berhasil login<br /> Silahkan tentukan layana yang anda inginkan</p>


          </center>

          <div class="row mt-5">
            <div class="col-sm-3">

            </div>
            <div class="col-sm-6">
              <div class="row">
                <div class="col-sm-6 col-6">
                  <a href="<?= base_url('Pasien/antrian') ?>">
                    <div class="card shadow">
                      <div class="card-body">
                       <h4><i class="fas fa-users"></i></h4>
                       <h5 class="fw-bold"> Layanan Antrian </h5>
                     </div>
                   </div>
                 </a>
               </div>
               <div class="col-sm-6 col-6">
                <a href="<?= base_url('Pasien/data_cek_kesehatan') ?>">
                  <div class="card">
                    <div class="card-body shadow">
                      <h4><i class="fas fa-user"></i></h4>
                      <h5 class="fw-bold"> Layanan Kesehatan </h5>
                    </div>
                  </div>
                </a>
              </div>
            </div>
          </div>
          <div class="col-sm-3">

          </div>
        </div>


      <?php } ?>

    </div>

  </div>
</section>

  </main><!-- End #main -->