<?php

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="theme-color" content="#68c1ef">
    <title>Chupy | Keranjang</title>
    <link rel="stylesheet" href="/extension/plugins/bootstrap-4.1.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="/extension/css/chupy-style.css">
    <link rel="stylesheet" href="/extension/css/style-detail-barang.css">


</head>

<body>

    <?php
include('template/navbar.php');
?>

    <main class="container-fluid chupy-keranjang">
        <header>
            <?php
    include('template/breadcrumb.php')
  ?>
                <section class="chupy-detail-header">
                    <div class="col-md">
                        <h1>Detail Rincian Barang</h1>
                    </div>
                </section>
        </header>

        <section class="mt-3 ">
            <div class="row ml-2">
                <div class="col-md-4">
                    <img src="/extension/img/chupy-box-ATOL.png" alt="Foto Detail Barang" class="img-detail-barang float-center">
                </div>

                <div class="col-md-4">
                    <h4>Rp.696969696</h4>
                    <h5>Deskripsi Produk</h5>
                    <h6>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ipsa, fugit corporis! Ipsa aperiam enim nobis
                        possimus quo quisquam, porro tenetur illum temporibus velit. In autem accusamus impedit praesentium
                        pariatur similique.</h6>

                </div>

                <div class="col-md-4">
                    <div class="btn-group-vertical w-75">
                        <div class="btn btn-primary mb-3 w-100">Tambah Ke Keranjang</div>
                        <div class="btn btn-primary outline  mb-3 w-100 ">Tambah Ke Wishlist</div>
                    </div>
                    <h5>Stok : 69</h5>

                </div>
            </div>
        </section>

        <section class="chupy-detail-barang">
            <hr class="mx-3">
            <h5 class="mx-3">Barang Lainnya</h5>
            <div class="row ml-2">
                <article class=" col-md-3 chupy-detail-card">
                    <a href="/" class="card">
                        <img src="/extension/img/chupy-box-ATOL.png" alt="box ATOL" class="card-img-top">
                        <div class="card-body">
                            <h5 class="card-title">Title</h5>
                            <p class="card-text">Rp. 69696969</p>
                        </div>
                    </a>
                </article>

                <article class=" col-md-3 chupy-detail-card">
                    <a href="/" class="card">
                        <img src="/extension/img/chupy-box-ATOL.png" alt="box ATOL" class="card-img-top">
                        <div class="card-body">
                            <h5 class="card-title">Title</h5>
                            <p class="card-text">Rp. 69696969</p>
                        </div>
                    </a>
                </article>

                <article class=" col-md-3 chupy-detail-card">
                    <a href="/" class="card">
                        <img src="/extension/img/chupy-box-ATOL.png" alt="box ATOL" class="card-img-top">
                        <div class="card-body">
                            <h5 class="card-title">Title</h5>
                            <p class="card-text">Rp. 69696969</p>
                        </div>
                    </a>
                </article>

                <article class=" col-md-3 chupy-detail-card">
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

    </main>

    <?php
    include('template/footer.php');
  ?>
</body>

</html>