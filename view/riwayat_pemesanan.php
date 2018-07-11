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
    <link rel="stylesheet" href="/extension/css/style-riwayat-pesan.css">

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
                            <h1>Riwayat Pemebelian</h1>
                            <h5>Rincian Pemebelian</h5>
                        </div>
                    </section>
            </header>
            <div class="container-fluid ">

                <div class="card mt-3 mb-5">
                    <section>
                        <div class="card-body">
                            <div class="row px-5 mt-3">
                                <div class="col-md-3">
                                    <h5>Id Pembelian</h5>
                                    <h6>#5</h6>
                                </div>

                                <div class="col-md-3">
                                    <h5>Tanggal Pembelian</h5>
                                    <h6>12 Januari 2018</h6>
                                </div>

                                <div class="col-md-3">
                                    <h5>Status Pembelian</h5>
                                    <h6>Belum Dibayar</h6>
                                </div>


                                <div class="col-md-3">
                                    <h5>Total Harga Pembelian</h5>
                                    <h6>Rp 696969</h6>
                                </div>
                            </div>

                            <div class="row mt-5 px-5">
                                <div class="col-md">
                                    <a href="#" class="btn btn-primary float-right btn-bayar">Bayar</a>

                                </div>
                            </div>
                         
                        </div>
                    </section>
                    <hr>
                    <section class="mt-3 mb-5">
                        <div class="container py-3">
                            <div class="card">
                                <div class="row">

                                    <div class="col-xs-6 col-md-4  ">
                                        <img src="/extension/img/chupy-box-ATOL.png" class="chupy-card-image">
                                    </div>


                                    <div class="col-md-4 mt-4">
                                        <div class="card-block ">
                                            <h5 class="card-title">Title</h5>
                                            <p class="card-text">Rp. 69696969</p>

                                        </div>
                                    </div>

                                    <div class="col-md-4 mt-4">
                                        <div class="card-block ">
                                            <h5 class="card-title">Jumlah</h5>
                                            <p class="card-text">2</p>
                                            <a href="#" class="btn btn-primary btn-riwayat-pesan">Lihat Detail</a>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <div class="container py-3">
                            <div class="card">
                                <div class="row">

                                    <div class="col-xs-6 col-md-4  ">
                                        <img src="/extension/img/chupy-box-ATOL.png" class="chupy-card-image">
                                    </div>


                                    <div class="col-md-4 mt-4">
                                        <div class="card-block ">
                                            <h5 class="card-title">Title</h5>
                                            <p class="card-text">Rp. 69696969</p>

                                        </div>
                                    </div>

                                    <div class="col-md-4 mt-4">
                                        <div class="card-block ">
                                            <h5 class="card-title">Jumlah</h5>
                                            <p class="card-text">2</p>
                                            <a href="#" class="btn btn-primary btn-riwayat-pesan">Lihat Detail</a>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <div class="container py-3">
                            <div class="card">
                                <div class="row">

                                    <div class="col-xs-6 col-md-4  ">
                                        <img src="/extension/img/chupy-box-ATOL.png" class="chupy-card-image">
                                    </div>


                                    <div class="col-md-4 mt-4">
                                        <div class="card-block ">
                                            <h5 class="card-title">Title</h5>
                                            <p class="card-text">Rp. 69696969</p>

                                        </div>
                                    </div>

                                    <div class="col-md-4 mt-4">
                                        <div class="card-block ">
                                            <h5 class="card-title">Jumlah</h5>
                                            <p class="card-text">2</p>
                                            <a href="#" class="btn btn-primary btn-riwayat-pesan">Lihat Detail</a>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </section>
                </div>


            </div>
        </main>
        <?php
    include('template/footer.php');
  ?>

</body>

</html>