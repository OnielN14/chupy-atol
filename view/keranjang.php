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
    <link rel="stylesheet" href="/extension/css/style-keranjang_and_wishlist.css">
    <link rel="stylesheet" href="/extension/css/components/button.css">

</head>

<body>

    <?php
    include('template/navbar.php');
    ?>

    <main class="container-fluid chupy-wishlist_keranjang-header">
        <header>
            <?php
            include('template/breadcrumb.php')
            ?>

            <section class="chupy-keranjang-header">
                <div class="col-md">
                    <h1>Keranjang</h1>
                    <?php
                    if ($data['count']) {
                        ?>
                        <h5>Ada <?php echo $data['count'] ?> barang di keranjang mu. Periksa kembali pesanan mu</h5>
                    <?php
                } else {
                    ?>
                        <h5>Kamu belum menambahkan barang.</h5>
                    <?php
                }
                ?>
                </div>

            </section>
        </header>

        <div class="container">
            <section class="chupy-keranjang-list">

                <?php
                foreach ($data['data'] as $item) {
                    ?>

                    <div class="container py-2">
                        <div class="card">
                            <div class="row">
                                <div class="col-xs-4 col-md-4">
                                    <img src="<?php echo isset($item['gambar']) ? '/extension/upload/' . $item['gambar'] : '/extension/img/chupy-box-ATOL.png' ?>" class="chupy-card-image">
                                </div>

                                <div class="col-md-8">
                                    <div class="card-block ">
                                        <h4 class="card-text mt-4"><?php echo $item['nama'] ?></h4>
                                        <div class="row">
                                            <p class="card-text col">
                                                <label for="">Harga : </label>
                                                <span> Rp. <?php echo $item['harga'] ?></span>

                                            </p>
                                            <p class="card-text col">
                                                <label for="">Jumlah Barang : </label>
                                                <span class="jumlah-text"><?php echo $item['jumlah'] ?> pcs</span>
                                                <?php
                                                /*
                                                (<button data-item="<?php echo $item['id'] ?>" class="btn btn-text ubah-jumlah">Ubah</button>)
                                                */
                                                ?>
                                            </p>
                                        </div>

                                        <div class="input-group">
                                            <a href="/produk/detail-produk/<?php echo $item['id'] ?>" class="btn btn-primary w-25 mr-3">Lihat Detail</a>
                                            <button data-item="<?php echo $item['id'] ?>" class="btn btn-primary outline w-25 deleteCartItem">Hapus</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                <?php
            }
            ?>

            </section>

            <?php
            if ($data['data']) {
                ?>
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
            <?php
        }
        ?>
        </div>
    </main>


    <?php
    include('template/footer.php');
    ?>

    <script src="/extension/js/page/home.profile-keranjang.js" charset="utf-8"></script>
</body>

</html>