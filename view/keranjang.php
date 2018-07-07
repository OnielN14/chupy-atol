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
    <link rel="stylesheet" href="/extension/css/style-keranjang.css">
    <link rel="stylesheet" href="/extension/css/components/button.css">

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

                    <section class="chupy-keranjang-header">
                        <div class="col-md">
                            <h1>Keranjang</h1>
                            <h5>Ada 2 barang di keranjang mu. Periksa kembali pesanan mu.</h5>
                        </div>
                    </section>
            </header>

            <div class="container">
                <section class="chupy-keranjang-list">
                    <div class="container py-3">
                        <div class="card">
                            <div class="row">

                                <div class="col-xs-6 col-md-4  chupy-keranjang-card">
                                    <img src="/extension/img/chupy-box-ATOL.png" class="chupy-card-image">
                                </div>


                                <div class="col-md-4 chupy-keranjang-card">
                                    <div class="card-block ">
                                        <h5 class="card-title">Title</h5>
                                        <p class="card-text">Rp. 69696969</p>
                                        <a href="#" class="btn btn-primary btn-keranjang">Lihat Detail</a>
                                    </div>
                                </div>

                                <div class="col-md-4 chupy-keranjang-card">
                                    <div class="card-block ">
                                        <h5 class="card-title">Jumlah</h5>
                                        <p class="card-text">2</p>
                                        <a href="#" class="btn btn-primary outline btn-keranjang-hapus">Ubah</a>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="container py-3">
                        <div class="card">
                            <div class="row">

                                <div class="col-xs-6 col-md-4  chupy-keranjang-card">
                                    <img src="/extension/img/chupy-box-ATOL.png" class="chupy-card-image">
                                </div>


                                <div class="col-md-4 chupy-keranjang-card">
                                    <div class="card-block ">
                                        <h5 class="card-title">Title</h5>
                                        <p class="card-text">Rp. 69696969</p>
                                        <a href="#" class="btn btn-primary btn-keranjang">Lihat Detail</a>
                                    </div>
                                </div>

                                <div class="col-md-4 chupy-keranjang-card">
                                    <div class="card-block ">
                                        <h5 class="card-title">Jumlah</h5>
                                        <p class="card-text">2</p>
                                        <a href="#" class="btn btn-primary outline btn-keranjang-hapus">Hapus</a>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </section>

                <hr class="divider">
                <section class="chupy-keranjang-bayar">
                    <div class="container py-3">
                        <div class="row">
                            <div class="col-md-6">
                                <h4 class="float-left">Total Pembayaran</h4>
                            </div>
                            <div class="col-md-6 ">
                                <h4 class="float-right">Rp.90000000</h4>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md">
                                <a href="#" class="btn btn-primary float-right btn-beli">BELI</a>
                            </div>
                        </div>

                    </div>
                </section>
            </div>
        </main>


        <?php
    include('template/footer.php');
  ?>
</body>

</html>