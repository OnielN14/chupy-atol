<?php

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Chupy | Login</title>
  <link rel="stylesheet" href="extension/plugins/bootstrap-4.1.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="extension/css/chupy-style.css">
  <link rel="stylesheet" href="extension/css/style-registrasi.css">
</head>
<body>

  <main class="container">
    <?php include('template/header-secure.php') ?>
    <section class=" text-center">
      <h1>Masuk</h1>
      <p>Silakan mengisi isian di bawah untuk masuk.</p>
      <p>Belu punya akun? <a href="/registrasi">Daftar di sini</a></p>
    </section>

    <div class="row">
      <div class="col-md col-xs">
      </div>
      <form class="col-md-8 col-xs-12" action="/login" method="post">

        <div class="form-group">
          <label for="form-email">Email</label>
          <input type="email" name="user_email" value="" placeholder="Masukkan email untuk masuk" id="form-email" class="form-control" autofocus required>
          <div class="invalid-feedback">
            Harap masukkan email dengan benar.
          </div>
        </div>

        <div class="form-group">
          <label for="form-password">Kata Sandi</label>
          <input type="password" name="user_pass" value="" placeholder="Masukkan kata sandi untuk masuk" id="form-password" class="form-control" required>
        </div>
        <p class="text-right form-group">
          <a  href="/forgot-password">Lupa Kata Sandi</a>
        </p>
        <div class="form-group">
          <input type="submit" class="form-control btn btn-primary" name="" value="Masuk">
        </div>
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
