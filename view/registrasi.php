<?php

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <meta name="theme-color" content="#68c1ef">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Chupy | Registrasi</title>
  <link rel="stylesheet" href="/extension/plugins/bootstrap-4.1.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="/extension/css/chupy-style.css">
  <link rel="stylesheet" href="/extension/css/style-registrasi.css">
</head>
<body>

  <main class="container">
    <?php include('template/header-secure.php') ?>
    <section class=" text-center">
      <h1>Registrasi</h1>
      <p>Silakan mengisi isian di bawah untuk membuat akun baru.</p>
      <p>Sudah punya akun? <a href="/login">Login di sini</a></p>
    </section>

    <div class="row">
      <div class="col-md col-xs">

      </div>
      <form class="col-md-8 col-xs-12" action="registrasi.php" method="post" id="form-registrasi">
        <div class="form-group">
            <label for="form-nama">Nama</label>
            <input id="form-nama" class="form-control" type="text" name="nama" placeholder="Nama Lengkap" autofocus required>
            <div class="invalid-feedback">Harap masukkan nama dengan benar.</div>
        </div>

        <div class="form-group">
          <div class="">
            <label for="">Jenis Kelamin</label>
          </div>
          <div class="form-check form-check-inline">
            <input id="gender-laki" class="form-check-input" type="radio" name="gender" value="laki_laki" required> <label for="gender-laki" class="form-check-label">Laki-laki</label>
          </div>
          <div class="form-check form-check-inline">
            <input id="gender-perempuan" class="form-check-input" type="radio" name="gender" value="perempuan"> <label for="gender-perempuan" class="form-check-label">Perempuan</label>
          </div>
          <div class="invalid-feedback">Harap pilih jenis kelamin.</div>
        </div>

        <div class="form-group">
          <label for="form-tempat">Tempat, Tanggal Lahir</label>
          <div class="form-row">
            <div class="form-group col-6">
              <input id="form-tempat" class="form-control" type="text" name="tempat_lahir" placeholder="Kota/Kabupaten Kelahiran" required>
              <div class="invalid-feedback">Harap masukkan kota/kabupaten kelahiran dengan benar.</div>
            </div>
            <div class="col form-divider">
              <label for="">-</label>
            </div>
            <div class="form-group col-5">
              <input id="form-tanggal" class="form-control" type="date" name="tanggal_lahir" required>
              <div class="invalid-feedback">Harap masukkan tanggal kelahiran dengan benar.</div>
            </div>
          </div>
        </div>

        <div class="form-group">
            <label for="form-no-telepon">No. Telepon</label>
            <input id="form-no-telepon" class="form-control" type="text" name="no_telepon" placeholder="Contoh: 08XXXXXXXXX" required>
            <div class="invalid-feedback">Harap masukkan nomor telepon dengan benar.</div>
        </div>

        <div class="form-group">
            <label for="form-email">Email</label>
            <input id="form-email" class="form-control" type="email" name="no_telepon" placeholder="Contoh: emailmu@email.com" required>
            <div class="invalid-feedback">Harap masukkan nomor telepon dengan benar.</div>
        </div>

        <div class="form-group">
            <label for="form-alamat">Alamat</label>
            <textarea id="form-alamat" class="form-control" rows="3" name="alamat" placeholder="Alamat tempat tinggalmu" required></textarea>
            <div class="invalid-feedback">Harap masukkan alamat dengan benar.</div>
        </div>

        <div class="form-group">
            <label for="form-password">Kata Sandi</label>
            <input id="form-password" class="form-control" type="password" name="password" placeholder="Masukkan kata sandi" required>
            <div class="invalid-feedback">Harap isi kata sandi. Pastikan mengandung angka, terdiri atas huruf kecil dan huruf besar</div>
        </div>

        <div class="form-group">
            <label for="form-re-password">Ketik Ulang Kata Sandi</label>
            <input id="form-re-password" class="form-control" type="password" name="password" placeholder="Masukkan kembali kata sandi" required>
            <div class="invalid-feedback">Harap isi kata sandi dengan benar.</div>
        </div>

        <div class="form-check">
          <input id="form-aggrement" class="form-check-input" type="checkbox" name="aggrement" value="1" required> <label for="form-aggrement">Saya setuju akan syarat dan ketentuan yang berlaku.</label>
          <div class="invalid-feedback">
            <span>Anda harus menyetujui syarat dan ketentuan yang berlaku</span>
          </div>
        </div>

        <input type="submit" class="btn btn-primary" value="Daftar">
      </form>

      <div class="col-md col-xs">

      </div>
    </div>

  </main>

  <?php
    include('template/footer-secure.php');
  ?>


  <script src="/extension/js/validation.js"></script>

</body>
</html>
