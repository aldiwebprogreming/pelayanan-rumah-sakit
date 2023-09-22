 <main id="main">

  <!-- ======= Breadcrumbs Section ======= -->
  <section class="breadcrumbs">
    <div class="container">

      <div class="d-flex justify-content-between align-items-center">
        <h2>Layanan Antrian Pasien</h2>
        <ol>
          <li><a href="<?= base_url('Pasien/') ?>">Home</a></li>
          <li>Antrian</li>
        </ol>
      </div>

    </div>
  </section><!-- End Breadcrumbs Section -->

  <section class="inner-page">
    <div class="container">

      <?php 
      if ($this->session->no_ktp == null){
        ?>
        <center>
          <img src="<?= base_url('user/img/doktor.png') ?>" class="img-fluid" alt="Responsive image" style="height: 300px;">
          <div class="container">
            <div class="alert alert-primary" role="alert">
             Mohon maaf anda harus login terlebih dahulu untuk melakukan antrian
             <br />
             <a href="<?= base_url('Pasien/login') ?>" class="btn btn-primary mt-2">Login sekarang</a>
           </div>
         </div>
       </center>

     <?php }elseif ($cekdata != null) { ?>


      <center>

        <img src="<?= base_url('user/img/checklist.png') ?>" class="img-fluid" alt="Responsive image" style="height: 100px;">
        <h4 class="text-center fw-bold">Antrian berhasil</h4>
        <p>Antrian anda berhasil di buat dengan kode antrian : <strong><?= $cekdata ?></strong> <br /> 
          dan nomor antrian : <strong><?= $no ?></strong></p>

          <a target="_blank" href="<?= base_url('Pasien/cetak_antrian?kode=') ?><?= $cekdata ?>" class="btn btn-primary">Download kartu antrian <i class="fas fa-file"></i></a>

          <br />
          <br />

          <a href="<?= base_url('Pasien/data_antrian') ?>" class="mt-4">Lihat data antrian anda <i class="fas fa-angle-right"></i> </a>
        </center>


      <?php }else{ ?>
        <div class="row">
         <div class="row">
          <div class="col-sm-6">
            <center>
             <img src="<?= base_url('user/img/doktor.png') ?>" class="img-fluid" alt="Responsive image" style="height: 300px;">
             <p class="text-primary">Silahkan masukan data anda dengan benar </p>
             <p class="text-primary"><a href="<?= base_url('Pasien/data_antrian') ?>">Lihat data antrian anda</a> <i class="fas fa-angle-right"></i> </p>
           </center>
         </div>
         <div class="col-sm-6">
          <div class="card shadow">
            <div class="card-body">
              <h3>Daftar Antrian</h3>
              <hr>

              <form method="post" action="<?= base_url('pasien/add_antrian') ?>">

               <div class="form-group">
                <label class="mb-2 fw-bold">Kode Antrian</label>
                <input type="text" class="form-control" value="<?= $kode ?>" name="kode_antrian" readonly  required>
              </div>
              <div class="form-group mt-3">
                <label class="mb-2 fw-bold">Nama Pasien</label>
                <input type="text" class="form-control" value="<?= $this->session->nama ?>" name="nama_pasien" readonly required />
              </div>


              <div class="form-group mt-3">
                <label class="mb-2 fw-bold">Poli Klinik</label>
                <select class="form-control" name="poli" required>
                  <option value="">-- Pilih poli klinik --</option>
                  <?php foreach ($poli as $data) { ?>
                    <option><?= $data['nama_poli'] ?></option>
                  <?php } ?>

                </select>
              </div>

              <div class="form-group mt-3">
                <label class="mb-2 fw-bold">Tanggal Antrian</label>
                <input type="date" class="form-control" name="tgl_antrian" required >
              </div>


              <div class="form-group mt-3">
                <button class="btn btn-primary w-100">Daftar Antrian</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  <?php } ?>
</div>
</section>

  </main><!-- End #main -->