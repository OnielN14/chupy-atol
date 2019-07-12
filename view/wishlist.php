<?php

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="theme-color" content="#68c1ef">
    <title>Chupy | Wishlist</title>
    <link rel="stylesheet" href="/extension/plugins/bootstrap-4.1.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="/extension/css/chupy-style.css">
    <link rel="stylesheet" href="/extension/css/style-wishlist.css">

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

            <section class="chupy-wishlist-header">
                <div class="col-md">
                    <h1>Daftar Keinginanmu</h1>
                    <?php
                    if ($data['count']) {
                        ?>
                        <h5>Ada <?php echo $data['count'] ?> barang yang kamu inginkan.</h5>
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
            <section>

                <?php
                foreach ($data['data'] as $item) {
                    ?>

                    <div class="container py-2">
                        <div class="card">
                            <div class="row">
                                <div class="col-xs-4 col-md-4 ">
                                    <img src="<?php echo isset($item['gambar']) ? '/extension/upload/' . $item['gambar'] : '/extension/img/chupy-box-ATOL.png' ?>" class="chupy-card-image">
                                </div>
                                <div class="col-md-8 ">
                                    <div class="card-block ">
                                        <h4 class="card-text mt-4"><?php echo $item['nama'] ?></h4>
                                        <p class="card-text">Rp. <?php echo $item['harga'] ?></p>
                                        <div class="input-group mt-4">
                                            <a href="/produk/detail-produk/<?php echo $item['id'] ?>" class="btn btn-primary btn-wishlist w-25 mr-3">Lihat Detail</a>
                                            <button data-item="<?php echo $item['id'] ?>" class="btn btn-primary outline btn-wishlist w-25 deleteWishedItem">Hapus</button>
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
        </div>
    </main>


    <?php
    include('template/footer.php');
    ?>

    <script src="/extension/js/page/home.profile-wishlist.js" charset="utf-8"></script>
</body>

</html>