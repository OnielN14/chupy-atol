<?php

function dateParserTransaksi($targetDate)
{
    $parsedDate = date_parse($targetDate);
    $strToTimeFormat = $parsedDate['year'] . '-' . $parsedDate['month'] . '-' . $parsedDate['day'];
    $parsedDate = getdate(strtotime($strToTimeFormat));
    return $parsedDate['mday'] . ' ' . $parsedDate['month'] . ' ' . $parsedDate['year'];
}

function statusPemesanan($orderItem)
{
    $statusPemesanan = '';
    if ($orderItem['statusBayar'] == 1 && $orderItem['buktiBayar']) {
        $statusPemesanan = 'Lunas';
    } else if (!$orderItem['statusBayar'] && $orderItem['buktiBayar']) {
        $statusPemesanan = 'Sedang Dikonfirmasi';
    } else {
        $statusPemesanan = 'Belum Bayar';
    }

    return $statusPemesanan;
}

function orderTotalBudget($orderItem)
{
    $sum = 0;
    foreach ($orderItem['productData'] as $product) {
        $totalPerProduct = $product['jumlah'] * $product['harga'];

        $sum += $totalPerProduct;
    }

    return $sum;
}

if (count($orderData) > 1) {
    usort($orderData, function ($a, $b) {
        return $a['tanggalTransaksi'] < $b['tanggalTransaksi'];
    });
}

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
                                <?php if ($pengguna['fotoProfile'] == 'none' || $pengguna['fotoProfile'] == NULL) {
                                    ?>

                                    <img src="/extension/img/chupy-box-ATOL.png" alt="Profil" class="chupy-card-image chupy-profile-image">
                                <?php
                            } else {
                                ?>
                                    <img src="/extension/upload/<?php echo $pengguna['fotoProfile'] ?>" alt="Profil" class="chupy-card-image chupy-profile-image">
                                <?php
                            } ?>
                            </div>

                            <div class="col-md-4">
                                <table class="table">
                                    <tr>
                                        <td colspan="3">
                                            <h5><?php echo $pengguna['nama'] ?></h5>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <h6>No.HP</h6>
                                        </td>
                                        <td>:</td>
                                        <td>
                                            <h6><?php echo $pengguna['noTelepon'] ?></h6>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <h6>Email</h6>
                                        </td>
                                        <td>:</td>
                                        <td>
                                            <h6><?php echo $pengguna['email'] ?></h6>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <h6>Alamat</h6>
                                        </td>
                                        <td>:</td>
                                        <td>
                                            <h6><?php echo $pengguna['alamat'] ?></h6>
                                        </td>
                                    </tr>
                                </table>
                            </div>

                            <div class="col-md-4">
                                <a href="/profile/pengaturan" class="btn btn-primary outline btn-profil-ubah">Ubah</a>
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
                                <?php
                                if (!$orderData) {
                                    ?>
                                    <h5 class="text-akun">Kamu belum melakukan transaksi.</h5>
                                <?php
                            }
                            ?>
                            </div>
                        </div>

                        <?php 
                        if ($orderData) {
                            $countOrder = count($orderData);
                            foreach ($orderData as $orderItem) {
                                ?>
                                <div class="row">
                                    <div class="container py-3">
                                        <div class="card card-pembelian">
                                            <div class="card-body">
                                                <div class="row data-pembelian">
                                                    <div class="col-md-3">
                                                        <h2>#<?php echo $countOrder ?></h2>
                                                    </div>
                                                    <div class="col-md-3 ">
                                                        <h5 class="font-riwayat-pembelian">Tanggal Pembelian</h5>
                                                        <h6><?php echo dateParserTransaksi($orderItem['tanggalTransaksi']) ?></h6>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <h5 class="font-riwayat-pembelian">Status Pembelian</h5>
                                                        <h6><?php echo statusPemesanan($orderItem) ?></h6>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <h5 class="font-riwayat-pembelian">Total Pembelian</h5>
                                                        <h6>Rp. <?php echo orderTotalBudget($orderItem) ?></h6>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md btn-riwayat-pembelian">
                                                        <a href="/pembayaran/<?php echo $orderItem['hash'] ?>" class="btn btn-primary mr-3 float-right ">Lihat Detail</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <?php
                                $countOrder--;
                            }
                        }
                        ?>
                    </div>
                </div>


        </section>



    </main>

    <?php
    include('template/footer.php');
    ?>
</body>

</html>