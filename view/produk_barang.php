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
                <option value="0">Reptil</option>
                <option value="1">Mamalia</option>
                <option value="2">Burung</option>
              </select>
            </div>
            <div class="col-md form-inline">
              <label class="my-1 mr-2" for="filter-cari">Pencarian</label>
              <div class="input-group">
                <input type="text" id="filter-cari"
                class="form-control my-1" name="" value="">
                <div class="input-group-append my-1">
                  <button class="btn btn-primary" type="button">Cari</button>
                </div>
              </div>
            </div>
          </div>

          <div class="form-row">
            <div class="col-md form-inline">
              <label class="my-1 mr-2" for="filter-harga">Harga</label>

              <div class="input-group">
                <input id="filter-harga" type="text" class="form-control" name="" value="" placeholder="Minimum">
                <input type="text" class="form-control" name="" value="" placeholder="Maksimum">

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
            <article class="col-6 col-md-3 chupy-product-card">
              <a href="/" class="card">
                <img src="/extension/img/chupy-box-ATOL.png" alt="box ATOL" class="card-img-top">
                <div class="card-body">
                  <h5 class="card-title">Title</h5>
                  <p class="card-text">Rp. 69696969</p>
                </div>
              </a>
            </article>

            <article class="col-6 col-md-3 chupy-product-card">
              <a href="/" class="card">
                <img src="/extension/img/chupy-box-ATOL.png" alt="box ATOL" class="card-img-top">
                <div class="card-body">
                  <h5 class="card-title">Title</h5>
                  <p class="card-text">Rp. 69696969</p>
                </div>
              </a>
            </article>

            <article class="col-6 col-md-3 chupy-product-card">
              <a href="/" class="card">
                <img src="/extension/img/chupy-box-ATOL.png" alt="box ATOL" class="card-img-top">
                <div class="card-body">
                  <h5 class="card-title">Title</h5>
                  <p class="card-text">Rp. 69696969</p>
                </div>
              </a>
            </article>

            <article class="col-6 col-md-3 chupy-product-card">
              <a href="/" class="card">
                <img src="/extension/img/chupy-box-ATOL.png" alt="box ATOL" class="card-img-top">
                <div class="card-body">
                  <h5 class="card-title">Title</h5>
                  <p class="card-text">Rp. 69696969</p>
                </div>
              </a>
            </article>


          </div>
        </section>

        <nav class="chupy chupy-product-pagination">
          <ul class="pagination justify-content-center">
            <li class="page-item">
              <a class="page-link" href="#" aria-label="Previous">
                <span aria-hidden="true">&laquo;</span>
                <span class="sr-only">Previous</span>
              </a>
            </li>
            <li class="page-item"> <a class="page-link" href="#">1</a> </li>
            <li class="page-item"> <a class="page-link" href="#">2</a> </li>
            <li class="page-item"> <a class="page-link" href="#">3</a> </li>
            <li class="page-item">
              <a class="page-link" href="#" aria-label="Next">
                <span aria-hidden="true">&raquo;</span>
                <span class="sr-only">Next</span>
              </a>
            </li>
          </ul>
        </nav>
    </section>


  </main>

  <?php
    include('template/footer.php');
  ?>

  <script src="/extension/js/page/home.produk-hewan.js" charset="utf-8"></script>

</body>
</html>
