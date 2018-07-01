<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Chupy</title>
  <link rel="stylesheet" href="/extension/plugins/bootstrap-4.1.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="/extension/plugins/fontawesome-free-5.1.0-web/css/all.css">
  <link rel="stylesheet" href="/extension/css/chupy-style.css">
  <link rel="stylesheet" href="/extension/css/style-beranda.css">

</head>
<body>

    <?php include('template/navbar.php');?>

    <main>
      <section id="chupy-hero">
        <h1 class="chupy-welcome-text">Selamat Datang</h1>
        <footer class="text-center"> <a href="#produk">Temukan yang kamu cari <br /> di sini </br> <i class="fas fa-angle-down"></i></a> </footer>
      </section>

      <section id="produk" class="container-fluid">
        <header class="row">
          <div class="col">
            <h2 class="text-center">Apa yang kamu cari?</h2>
          </div>
        </header>
        <div class="row">
          <div class="col-md-5 chupy-category">
            <a href="/produk/kebutuhan" class="chupy-category-option">
                <img src="/extension/img/chupy-option-tulang.png" alt="Tulang">
                <p class="btn btn-primary">Kebutuhan Hewan Peliharaan</p>
            </a>
          </div>
          <div class="col chupy-category  ">
            <h1 class="text-center chupy-divider">Atau</h1>
          </div>
          <div class="col-md-5 chupy-category">
            <a href="/produk/hewan" class="chupy-category-option">
                <img src="/extension/img/chupy-option-hewan.png" alt="Tulang">
                <p class="btn btn-primary">Hewan Peliharaan</p>
            </a>
          </div>
        </div>
      </section>

    </main>

    <?php include('template/footer.php');?>

    <script type="text/javascript" src="/extension/plugins/fontawesome-free-5.1.0-web/js/all.js">

    </script>
</body>
</html>
