<?php

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="theme-color" content="#68c1ef">
    <title>Chupy | Profil</title>
    <link rel="stylesheet" href="/extension/plugins/bootstrap-4.1.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="/extension/css/chupy-style.css">
    <link rel="stylesheet" href="/extension/css/style-profil.css">
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

                    <section class="chupy-profil-header">
                        <div class="col-md">
                            <h1>Profil</h1>
                            <h5>Ringkasan akun dan riwayat pembelian mu.</h5>
                        </div>
                    </section>
            </header>

            <section class="chupy-profil">
                <div class="container py-3">
                    <div class="card">

                        <div class="card-body">
                            <div class="row">
                                <div class="col-md">
                                    <h4 class="text-akun">Ringkasan Akun</h4>
                                </div>
                            </div>
                            <div class="row">

                                <div class="col-md-4">
                                    <img src="/extension/img/chupy-box-ATOL.png" alt="Profil" class="chupy-card-image">
                                </div>

                                <div class="col-md-4">
                                    <table>
                                        <tr>
                                            <td colspan="2">
                                                <h5>Asep Saepundin</h5>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <h6>No.HP</h6>
                                            </td>
                                            <td>:</td>
                                            <td>
                                                <h6>+62 857 2426 8541</h6>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <h6>Email</h6>
                                            </td>
                                            <td>:</td>
                                            <td>
                                                <h6>asep@chupy.com</h6>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <h6>Alamat</h6>
                                            </td>
                                            <td>:</td>
                                            <td>
                                                <h6>Jl. Tubagus Ismail Dalam</h6>
                                            </td>
                                        </tr>
                                    </table>
                                </div>

                                <div class="col-md-4">
                                    <a href="#" class="btn btn-primary outline btn-profil-ubah">Ubah</a>
                                </div>
                            </div>
                        </div>
                    </div>
            </section>

            <section class="chupy-riwayat-pembelian">
                <div class="container py-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md">
                                    <h4 class="text-akun">Riwayat Pembelianmu</h4>
                                </div>
                            </div>
                            <div class="row">
                                <div class="container py-3">
                                    <div class="card card-pembelian">
                                        <div class="card-body">
                                            <div class="row data-pembelian">
                                                <div class="col-md-3">
                                                    <h2>#2</h2>
                                                </div>
                                                <div class="col-md-3 ">
                                                    <h5 class="font-riwayat-pembelian">Tanggal Pembelian</h5>
                                                    <h6>12 Januari 2018</h6>
                                                </div>
                                                <div class="col-md-3">
                                                    <h5 class="font-riwayat-pembelian">Status Pembelian</h5>
                                                    <h6>Belum Dibayar</h6>
                                                </div>
                                                <div class="col-md-3">
                                                    <h5 class="font-riwayat-pembelian">Total Pembelian</h5>
                                                    <h6>Rp. 69696969</h6>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md btn-riwayat-pembelian">
                                                    <a href="#" class="btn btn-primary mr-3 float-right ">Lihat Detail</a>
                                                    <a href="#" class="btn btn-primary mr-3 float-right ">Bayar</a>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="container py-3">
                                    <div class="card card-pembelian">
                                        <div class="card-body">
                                            <div class="row data-pembelian">
                                                <div class="col-md-3">
                                                    <h2>#1</h2>
                                                </div>
                                                <div class="col-md-3 ">
                                                    <h5 class="font-riwayat-pembelian">Tanggal Pembelian</h5>
                                                    <h6>12 Januari 2018</h6>
                                                </div>
                                                <div class="col-md-3">
                                                    <h5 class="font-riwayat-pembelian">Status Pembelian</h5>
                                                    <h6>Selesai</h6>
                                                </div>
                                                <div class="col-md-3">
                                                    <h5 class="font-riwayat-pembelian">Total Pembelian</h5>
                                                    <h6>Rp. 69696969</h6>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md btn-riwayat-pembelian">
                                                    <a href="#" class="btn btn-primary mr-3 float-right ">Lihat Detail</a>


                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                </div>
                                <div class="container py-3">
                                <div class="row">
                                   
                                        <div class="col-md">
                                            <nav class="chupy chupy-product-pagination">
                                                <ul class="pagination justify-content-center">
                                                    <li class="page-item">
                                                        <a class="page-link" href="#" aria-label="Previous">
                                                            <span aria-hidden="true">&laquo;</span>
                                                            <span class="sr-only">Previous</span>
                                                        </a>
                                                    </li>
                                                    <li class="page-item">
                                                        <a class="page-link" href="#">1</a>
                                                    </li>
                                                    <li class="page-item">
                                                        <a class="page-link" href="#">2</a>
                                                    </li>
                                                    <li class="page-item">
                                                        <a class="page-link" href="#">3</a>
                                                    </li>
                                                    <li class="page-item">
                                                        <a class="page-link" href="#" aria-label="Next">
                                                            <span aria-hidden="true">&raquo;</span>
                                                            <span class="sr-only">Next</span>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </nav>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


            </section>



        </main>
        
  <?php
    include('template/footer.php');
  ?>
</body>

</html>
