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
          <div id="chupy-msg" class="chupy-alert fixed alert alert-warning alert-dismissible fade" role="alert">
            <strong>Holy guacamole!</strong> <span> You should check in on some of those fields below.</span>
            <button type="button" class="close" data-hide="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
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
                <div class="container">
                    <div class="card card-profile">
                        <div class="card-body">

                            <div class="row">
                                <div class="col-md">
                                    <h4 class="font-card-header">Biodata</h4>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 col-xs-12">
                                    <form id="form-profil" >
                                        <div class="form-group">
                                            <label for="nama" class="font-card-input">Nama</label>
                                            <input type="text" name="nama" id="form-nama" class="form-control" value="<?php echo $pengguna['nama'] ?>">
                                            <div class="invalid-feedback">Harap masukkan nama dengan benar.</div>
                                        </div>

                                        <div class="form-group">
                                            <label for="nohp" class="font-card-input">No Handphone</label>
                                            <input type="text" name="noTelepon" id="form-no-telepon" class="form-control" value="<?php echo $pengguna['noTelepon'] ?>">
                                            <div class="invalid-feedback">Harap masukkan nomor telepon dengan benar.</div>
                                        </div>

                                        <div class="form-group">
                                            <label for="email" class="font-card-input">Email</label>
                                            <input disabled type="text" name="email" id="form-email" class="form-control" value="<?php echo $pengguna['email'] ?>">
                                            <div class="invalid-feedback">Harap masukkan email dengan benar.</div>
                                        </div>

                                        <div class="form-group">
                                            <label for="alamat" class="font-card-input">Alamat</label>
                                            <textarea name="alamat" id="alamat" rows="5"  class="form-control"><?php echo $pengguna['alamat'] ?></textarea>
                                            <div class="invalid-feedback">Harap masukkan alamat dengan benar.</div>
                                        </div>
                                        </div>
                                        <div class="col-md-6 col-xs-12">
                                                <div class="form-group">
                                                  <label class="font-card-input" for="">Foto Profil</label>
                                                  <div class="img-holder">

                                                    <?php if ($pengguna['fotoProfile'] == 'none' || $pengguna['fotoProfile'] == NULL){
                                                    ?>

                                                      <img src="/extension/img/chupy-box-ATOL.png" id="gambarProfile" class="img-thumbnail">
                                                    <?php
                                                  } else{
                                                  ?>
                                                    <img src="/extension/upload/<?php echo $pengguna['fotoProfile'] ?>" id="gambarProfile" class="img-thumbnail">
                                                  <?php
                                                  }?>

                                                  </div>

                                                    <label style="width:100%" for="ubah-foto"><a id="ubah-foto-area" class="form-control btn btn-primary">Ubah <input id="ubah-foto" type="file" name="fotoProfile" accept="image/*"></a></label>


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

            <section class="chupy-form-sandi" id="chupy-edit-password-container">
                <div class="container">
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
                                    <form id="form-edit-password">
                                        <div class="form-group">
                                          <input type="hidden" name="front_end_key" value="<?php echo $apikey?>">
                                          <input type="hidden" name="id" value="<?php echo $pengguna['id'] ?>">
                                            <label for="ksLama" class="font-card-input">Kata Sandi Lama</label>
                                            <input type="password" name="password" id="form-old-password" class="form-control" placeholder="*******">
                                        </div>

                                        <div class="form-group">
                                            <label for="ksBaru" class="font-card-input">Kata Sandi Baru</label>
                                            <input type="password" name="newPassword" id="form-password" class="form-control" placeholder="*******">
                                        </div>

                                        <div class="form-group">
                                            <label for="kksBaru" class="font-card-input">Ketik Ulang Kata Sandi Baru</label>
                                            <input type="password" name="newRePassword" id="form-re-password" class="form-control" placeholder="*******">
                                            <div class="invalid-feedback">Kata sandi tidak sama.</div>
                                        </div>

                                        <div class="form-group">
                                            <input id="btn-ganti-password" type="submit" class="btn btn-primary form-control" value="Ubah Kata Sandi" disabled>
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
<script src="/extension/js/validation.js"></script>
  <script type="text/javascript" src="/extension/js/page/home.profil.pengaturan.js">

  </script>
</body>

</html>
