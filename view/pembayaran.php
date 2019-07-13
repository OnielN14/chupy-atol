<?php

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="theme-color" content="#68c1ef">
    <title>Chupy | Pembayaran</title>
    <link rel="stylesheet" href="/extension/plugins/bootstrap-4.1.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="/extension/css/chupy-style.css">
    <link rel="stylesheet" href="/extension/css/style-pembayaran.css">
</head>

<body>
    <?php
    include('template/navbar.php');
    ?>

    <main class="container-fluid">
        <header>
            <?php
            include('template/breadcrumb.php')
            ?>

            <section class="chupy-pembayaran-header">
                <div class="col-md">
                    <h1>Pembayaran</h1>
                    <h5>Rincian Pembayaran</h5>
                </div>
            </section>
        </header>
        <section>
            <div class="container-fluid mt-4">
                <div class="row">
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header">
                                <h4>Detail Pembeli</h4>
                            </div>

                            <div class="card-body">
                                <div class="card card-pembeli">
                                    <div class="card-header">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="pembeli-info">
                                                    <img src="/extension/img/chupy-box-ATOL.png" alt="Foto Pembeli" class="foto-pembeli float-left">
                                                    <h5 class="nama">Jajang Kurniawan</h5>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <table class="table">
                                            <tr class="form-group">
                                                <td>Alamat Pengiriman</td>
                                                <td>:</td>
                                                <td>
                                                    <textarea id="user-deliver-address" class="form-control" rows="5">jl gegerkalong wetan no 8 rt 04 rw 08 kec.sukasari Kecamatan Sukasari, Kota Bandung Jawa Barat, 40153</textarea>
                                                </td>
                                            </tr>
                                            <tr class="form-group">
                                                <td>Kontak</td>
                                                <td>:</td>
                                                <td><input id="user-contact" class="form-control" type="text" value="081221694830"></td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header">
                                <h4>Ringkasan Belanja</h4>
                            </div>

                            <div class="card-body">
                                <div class="container">
                                    <div class="row">
                                        <p class="col-12 text-right">Tanggal Transaksi : 13 Juli 2019</p>
                                        <table class="col-12 table">
                                            <tr>
                                                <th>Nama Barang</th>
                                                <th>Banyak yang dibeli</th>
                                                <th>Harga</th>
                                                <th>Jumlah</th>
                                            </tr>

                                            <?php
                                            // foreach()
                                            ?>
                                            <tr>
                                                <td>Nama Barang</td>
                                                <td>Banyak yang dibeli</td>
                                                <td>Harga</td>
                                                <td>Jumlah</td>
                                            </tr>

                                            <tr class="pembayaran-tabel-total">
                                                <td colspan="3">Total</td>
                                                <td>Total</td>
                                            </tr>
                                        </table>
                                    </div>
                                    <div class="row mt-4">
                                        <button id="button-transaksi" class="btn btn-primary form-control">Lakukan Pembayaran</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row my-5">
                    <div class="col">
                        <div class="card">
                            <div class="card-header">
                                <h4>Pembayaran</h4>
                            </div>
                            <div class="card-body">
                                <div class="pembayaran-bank-info">
                                    <div class="pembayaran-info-detail">
                                        <p>ID Transaksi :
                                        </p>
                                        <h5>TRNX/XXX/XXXX</h5>
                                    </div>
                                    <div class="pembayaran-info-detail">
                                        <p>Status :
                                        </p>
                                        <h5>Belum Lunas</h5>
                                    </div>
                                    <div class="pembayaran-info-detail">
                                        <p>
                                            Silakan lakukan transfer ke rekening di bawah :
                                        </p>
                                        <h4>BNI 23124129XXX</h4>
                                        <h5>A/N : Chupy Corp</h5>
                                    </div>
                                    <hr>
                                    <div class="input-group pembayaran-upload-area">
                                        <div class="input-group-prepend">
                                            <label for="buktiBayar" class="input-group-text">Unggah Bukti Pembayaran :</label>
                                        </div>
                                        <input id="buktiBayar" type="file" class="form-control" name="buktiBayar">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary">Unggah</button></div>
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

    <script src="/extension/js/page/home.pembayaran.js" charset="utf-8"></script>
</body>

</html>