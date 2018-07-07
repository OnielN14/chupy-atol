<?php

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="theme-color" content="#68c1ef">
    <title>Chupy | Pengaturan</title>
    <link rel="stylesheet" href="/extension/plugins/bootstrap-4.1.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="/extension/css/chupy-style.css">
    <link rel="stylesheet" href="/extension/css/style-pengaturan.css">
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

                    <section class="chupy-pengaturan-header">
                        <div class="col-md">
                            <h1>Pengaturan</h1>
                            <h3>Sesuaikan profilmu</h3>
                        </div>
                    </section>
            </header>

            <section class="chupy-form-profil">
                <div class="container-fluid">
                    <div class="card card-profile">
                        <div class="card-body">

                            <div class="row">
                                <div class="col-md">
                                    <h4 class="font-card-header">Biodata</h4>
                                </div>
                            </div>
                            <div class="row">

                                <div class="col-md-6">
                                    <form action="#" method="post" id="form-profil">
                                        <div class="form-group">
                                            <label for="nama" class="font-card-input">Nama</label>
                                            <input type="text" name="nama" id="nama" class="form-control" value="Asep Saepudin">
                                        </div>

                                        <div class="form-group">
                                            <label for="nohp" class="font-card-input">No Handphone</label>
                                            <input type="text" name="nohp" id="nohp" class="form-control" value="+62 857 2426 8541">
                                        </div>

                                        <div class="form-group">
                                            <label for="email" class="font-card-input">Email</label>
                                            <input type="text" name="email" id="email" class="form-control" value="asep@chupy.com">
                                        </div>

                                        <div class="form-group">
                                            <label for="alamat" class="font-card-input">Alamat</label>
                                            <textarea name="alamat" id="alamat" cols="7" rows="5" style="width:300px" class="form-control">Jl. Tubagus Ismail Dalam</textarea>
                                        </div>

                                </div>
                                <div class="col-md-6">
                                    <div class="col-sm-6 ">
                                        <div class="form-group">
                                            <img src="/extension/img/home-hero.jpg" alt="Gambar Profil" id="gambarProfile" class="img-thumbnail">
                                            <button class="form-control btn btn-primary">Ubah</button>
                                        </div>
                                        <div class="form-group">
                                            <input type="submit" value="Simpan Perubahan" id="btn-profile" name="btn-profile" class="form-control btn btn-primary">
                                        </div>
                                    </div>
                                </div>


                                </form>
                            </div>

                        </div>
                    </div>
                </div>
            </section>

            <section class="chupy-form-sandi">
                <div class="container-fluid">
                    <div class="card card-profile">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md">
                                    <h4 class="font-card-header">Ubah Kata Sandi</h4>
                                </div>
                            </div>

                            <div class="row">

                                <div class="col-md">
                                <div class="form-sandi-center">
                                    <form action="#" method="post" id="form-password">
                                        <div class="form-group">
                                            <label for="ksLama" class="font-card-input">Kata Sandi Lama</label>
                                            <input type="text" name="ksLama" id="ksLama" class="form-control" value="xxxxxxx">
                                        </div>

                                        <div class="form-group">
                                            <label for="ksBaru" class="font-card-input">Kata Sandi Baru</label>
                                            <input type="text" name="ksBaru" id="ksBaru" class="form-control" value="xxxxxxx">
                                        </div>

                                        <div class="form-group">
                                            <label for="kksBaru" class="font-card-input">Ketik Ulang Kata Sandi Baru</label>
                                            <input type="text" name="kksBaru" id="kksBaru" class="form-control" value="xxxxxxx">
                                        </div>

                                        <div class="form-group">
                                            <input type="submit" class="btn btn-primary form-control" value="Ubah Kata Sandi">
                                        </div>
                                    </form>
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