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
                                                    <div class="card-header-pembeli">
                                                        <img src="/extension/img/chupy-box-ATOL.png" alt="Foto Pembeli" class="foto-pembeli float-left">
                                                        <h6>Jajang Kurniawan</h6>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <button class="btn btn-primary btn-sm float-right" id="gantiAlamat">Kirim Ke Alamat Lain</button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <table>
                                                <tr>
                                                    <td>Bandung </td>
                                                </tr>
                                                <tr>
                                                    <td>jl gegerkalong wetan no 8 rt 04 rw 08 kec.sukasari </td>
                                                </tr>
                                                <tr>
                                                    <td>Kecamatan Sukasari, Kota Bandung </td>
                                                </tr>
                                                <tr>
                                                    <td>Jawa Barat, 40153 </td>
                                                </tr>
                                                <tr>
                                                    <td>081221694830</td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <button class="btn btn-primary btn-sm mt-3" id="btnUbahAlamat">Ubah Alamat</button>
                                                    </td>
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
                                            <div class="col-md-6">
                                                <h6 class="float-left">Total Harga Bayar</h6>
                                            </div>
                                            <div class="col-md-6">
                                                <h6 class="float-right">Rp 40.000</h6>
                                            </div>
                                        </div>
                                        <div class="row mt-3">
                                            <div class="col-md-6">
                                                <h6 class="float-left">Biaya Kirim</h6>
                                            </div>
                                            <div class="col-md-6">
                                                <h6 class="float-right">Rp 5000</h6>
                                            </div>
                                        </div>
                                        <div class="row mt-3">
                                            <div class="col-md-6">
                                                <h6 class="float-left">Biaya Asuransi</h6>
                                            </div>
                                            <div class="col-md-6">
                                                <h6 class="float-right">Rp 0</h6>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <h6 class="float-left">Total Belanja</h6>
                                            </div>
                                            <div class="col-md-6">
                                                <h6 class="float-right">Rp 45.000</h6>
                                            </div>
                                        </div>
                                        <div class="row mt-4">
                                            <button class="btn btn-primary form-control">Lakukan Pembayaran</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row my-5">
                        <div class="col-md-6">
                            <div class="card">
                                <form action="#" method="post">
                                    <div class="card-header">
                                        <h4>Detail Belanja</h4>
                                    </div>
                                    <div class="card-body">
                                        <div class="container">
                                        <div class="card ">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <img src="/extension/img/chupy-box-ATOL.png" alt="Foto Produk" class="img-produk ">
                                                    </div>

                                                    <div class="col-md-4">
                                                        <h6>Makanan Anjing</h6>
                                                        <div class="input-group">
                                                            <span class="input-group-btn">
                                                                <button class="btn btn-primary btn-xs  ">+</button>
                                                            </span>
                                                            <input type="text" name="amount" id="amount" class="form-control" value="2">
                                                            <span class="input-group-btn">
                                                                <button class="btn btn-primary btn-xs">-</button>
                                                            </span>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-4">
                                                        <h6 class="float-right">Rp 20.000</h6>
                                                    </div>
                                                </div>
                                                <hr>
                                                <div class="row">
                                                    <div class="col-md-4"><h6>Kurir</h6></div>
                                                    <div class="col-md-4"><select name="kurir" id="kurir" class="form-control">
                                                        <option value="jne">JNE</option>
                                                        <option value="tiki">TIKI</option>
                                                    </select></div>
                                                    <div class="col-md-4 "><h6 class="float-right">Rp 5000</h6></div>
                                                </div>
                                                <div class="row mt-4">
                                                    <div class="col-md-4"><h6>Catatan</h6></div>
                                                    <div class="col-md-4"><textarea name="catatan" id="catatan" cols="3" rows="2" class="form-control"></textarea></div>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="input-group mt-4">
                                        <label for="metodeBayar"><h6>Metode Pembayaran</h6></label>
                                        <select name="metodeBayar" id="metodeBayar" class="form-control ml-3">
                                            <option value="bank">Bank</option>
                                            <option value="alfa">Alfamart</option>
                                            <option value="indo">Indomart</option>
                                        </select>
                                        </div>
                                        </div>

                                    </div>
                                </form>
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