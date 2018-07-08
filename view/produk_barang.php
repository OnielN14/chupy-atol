<?php

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="theme-color" content="#68c1ef">
  <title>Chupy | Daftar Barang</title>
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
          <img src="/extension/img/chupy-option-tulang.png" alt="Hewan Peliharaan">
        </div>
        <div class="col-md">
          <h1>Penuhi Kebutuhan Hewan Peliharaanmu</h1>
          <!-- <h3></h3> -->
        </div>
      </section>
    </header>

    <section class="chupy-product-content">
        <header class="container chupy-filter">
          <div class="form-row">
            <div class="col-md form-inline">
              <label class="my-1 mr-2" for="filter-kategori">Kategori</label>
              <select class="form-control my-1 mr-2" id="filter-kategori" name="">
                <option value="-1" disabled selected>Pilih Kategori</option>
                <option value="0">Semua</option>
              </select>
            </div>
            <div class="col-md form-inline">
              <label class="my-1 mr-2" for="filter-cari">Pencarian</label>
              <input type="text" id="filter-cari"
              class="form-control my-1" name="" value="">
            </div>
          </div>

          <div class="form-row">
            <div class="col-md form-inline">
              <label class="my-1 mr-2" for="filter-harga">Harga</label>

              <div class="input-group">
                <input id="filter-harga-min" type="text" class="form-control" name="" value="" placeholder="Minimum">
                <input id="filter-harga-max" type="text" class="form-control" name="" value="" placeholder="Maksimum">

              </div>
            </div>
            <div class="col-md form-inline">
              <label class="my-1 mr-2" for="filter-urut">Urutkan</label>
              <select class="form-control my-1 mr-2" id="filter-urut" name="">
                <option value="0">A-Z</option>
                <option value="1">Z-A</option>
                <option value="2">Harga Terendah</option>
                <option value="3">Harga Tertinggi</option>
              </select>
            </div>
          </div>
        </header>

        <section class="container chupy-product-list">
          <div class="row">


          </div>
        </section>

        <nav class="chupy chupy-product-pagination">
          <ul class="pagination justify-content-center">
            <!-- <li class="page-item">
              <a class="page-link" href="#" aria-label="Previous">
                <span aria-hidden="true">&laquo;</span>
                <span class="sr-only">Previous</span>
              </a>
            </li> -->

            <!-- <li class="page-item">
              <a class="page-link" href="#" aria-label="Next">
                <span aria-hidden="true">&raquo;</span>
                <span class="sr-only">Next</span>
              </a>
            </li> -->
          </ul>
        </nav>
    </section>


  </main>

  <?php
    include('template/footer.php');
  ?>
  <script src="/extension/js/page/home.produk-barang.js" charset="utf-8"></script>
</body>
</html>
