<?php

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Chupy | Registrasi</title>
  <link rel="stylesheet" href="extension/plugins/bootstrap-4.1.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="extension/css/chupy-style.css">
  <link rel="stylesheet" href="extension/css/style-registrasi.css">
</head>
<body>

  <main class="container text-center">
    <header class="text-center">
      <img class="img-fluid chupy-simple-header-img" src="extension/img/chupy_icon-light.png" alt="">
    </header>
    <h1>Registrasi</h1>
    <p>Silakan mengisi isian di bawah untuk membuat akun baru.</p>
    <p>Sudah punya akun? <a href="/login">Login Di sini</a></p>

    <div class="row">
      <div class="col-md-4"></div>
      <form class="col-md-4 col-xs-12" action="forgot-password.php" method="post" id="form-forgot-password">
        <input class="form-control" type="email" name="email_or_phone" placeholder="Email" autofocus>
        <div class="invalid-feedback">Harap masukkan email dengan benar.</div>
        <input type="submit" class="btn btn-primary" value="Kirim Permintan">
      </form>
      <div class="col-md-4"></div>
    </div>

  </main>


</body>
</html>
