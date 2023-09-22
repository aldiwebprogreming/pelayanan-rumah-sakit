 <main id="main">

  <!-- ======= Breadcrumbs Section ======= -->
  <section class="breadcrumbs">
    <div class="container">

      <div class="d-flex justify-content-between align-items-center">
        <h2>Daftar Pasien</h2>
        <ol>
          <li><a href="<?= base_url('Pasien/') ?>">Home</a></li>
          <li>Daftar</li>
        </ol>
      </div>

    </div>
  </section><!-- End Breadcrumbs Section -->

  <section class="inner-page">
    <div class="container">
      <div class="row">
        <div class="col-sm-6">
          <center>
           <img src="<?= base_url('user/img/doktor.png') ?>" class="img-fluid" alt="Responsive image" style="height: 300px;">
           <p class="text-primary">Silahkan masukan data anda dengan benar </p>
         </center>
       </div>
       <div class="col-sm-6">
        <div class="card shadow">
          <div class="card-body">
            <h3>Daftar  Pasien</h3>
            <hr>

            <form method="post" action="<?= base_url('pasien/add_daftar') ?>">
              <div class="form-group">
                <label class="mb-2 fw-bold">Nama Pasien</label>
                <input type="text" class="form-control" name="nama_pasien" placeholder="Masukan nama anda">
              </div>

              <div class="form-group">
                <label class="mb-2 fw-bold">Jenis Kelamin</label>
                <select class="form-control" name="jk">
                  <option>-- Pilih jenis kelamin --</option>
                  <option>Laki - laki</option>
                  <option>Perempuan</option>
                </select>
              </div>

              <div class="form-group mt-3">
                <label class="mb-2 fw-bold">Nomor KTP</label>
                <input type="number" class="form-control" name="no_ktp" placeholder="Masukan nomor ktp anda">
              </div>

              <div class="form-group mt-3">
                <label class="mb-2 fw-bold">Nomor BPJS</label>
                <input type="number" class="form-control" name="no_bpjs" placeholder="Masukan nomor bpjs anda">
              </div>

              <div class="form-group mt-3">
                <label class="mb-2 fw-bold">Nomor Telp</label>
                <input type="number" class="form-control" name="notelp" placeholder="Masukan nomor telepon anda yang aktif">
              </div>

              <div class="form-group mt-3">
                <label class="mb-2 fw-bold">Tempat Lahir</label>
                <input type="text" class="form-control" name="tempat_lahir" placeholder="Masukan tempat lahir anda">
              </div>

              <div class="form-group mt-3">
                <label class="mb-2 fw-bold">Tanggal Lahir</label>
                <input type="date" class="form-control" name="tanggal_lahir" placeholder="Masukan tempat lahir anda">
              </div>


              <div class="form-group mt-3">
                <label class="mb-2 fw-bold">Alamat</label>
                <textarea class="form-control" name="alamat" placeholder="Masukan alamat lengkap anda"></textarea>
              </div>

              <div class="form-group">
                <label class="mb-2 fw-bold">Status Pasien</label>
                <select class="form-control" name="status_pasien">
                  <option>-- Pilih status pasien --</option>
                  <option>BPJS</option>
                  <option>Umum</option>
                </select>
              </div>

              <div class="form-group mt-3">
                <button class="btn btn-primary w-100">Daftar</button>

              </form>

              <p class="mt-3 text-center">Sudah punya akun ? <a href="<?= base_url('Pasien/login') ?>">Login sekarang</a></p>
            </div>
          </div>
        </div>
      </div>

    </div>

  </div>
</section>

  </main><!-- End #main -->