<?php

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Chupy | Daftar Hewan</title>
  <link rel="stylesheet" href="/extension/plugins/bootstrap-4.1.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="/extension/css/chupy-style.css">
  <link rel="stylesheet" href="/extension/css/style-daftar-produk.css">
</head>
<body>

  <?php
    include('template/navbar.php');
  ?>

  <main class="container-fluid chupy-product">
    <header>
      <?php
        include('template/breadcrumb.php')
      ?>

      <section class="chupy-product-header row">
        <div class="col-md-3 header-img">
          <img src="/extension/img/chupy-option-hewan.png" alt="Hewan Peliharaan">
        </div>
        <div class="col-md">
          <h1>Temukan Teman Sejatimu</h1>
          <h3>Menemanimu setiap saat</h3>
        </div>
      </section>
    </header>
  </main>

  <?php
    include('template/footer.php');
  ?>

</body>
</html>
