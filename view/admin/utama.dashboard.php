<?php



?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <meta name="theme-color" content="#68c1ef">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Chupy | Admin Dashboard</title>
  <link rel="stylesheet" href="/extension/plugins/bootstrap-4.1.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="/extension/css/chupy-style.css">
  <link rel="stylesheet" href="/extension/css/style-admin.css">
</head>

<main class="chupy-admin toggled" >
  <?php
    include('template/navbar.php')
  ?>
  <aside class="chupy-admin-aside" id="side-wrapper">
    <ul class="nav flex-column">
      <li class="nav-item"> <a class="nav-link active" href="/admin/dashboard">Dashboard</a></li>
      <li class="nav-item"> <a class="nav-link" href="/admin/dashboard/user">Manajemen Pengguna</a></li>
      <li class="nav-item"> <a class="nav-link" href="/admin/dashboard/produk">Manajemen Produk</a></li>
      <li class="nav-item"> <a class="nav-link" href="/admin/dashboard/kategori">Manajemen Kategori Produk</a></li>
      <li class="nav-item"> <a class="nav-link" href="/admin/dashboard/jenis">Manajemen Jenis Produk</a></li>
    </ul>
  </aside>

  <section id="page-wrapper">
    <!-- content -->
    <main>
      <?php
          $uri = explode('/',$_SERVER['REQUEST_URI']);
          if (count($uri) != 4) {
            include('page/overview.php');
          }
          else{
            switch($uri[3]){
              case 'user':
                include('page/user.management.php');
                break;
              case 'produk':
                include('page/produk.management.php');
                break;
              case 'kategori':
                include('page/kategori.management.php');
                break;
              case 'jenis':
                include('page/jenis.management.php');
                break;
            }
          }
          // echo json_encode($uri);
          // swi
      ?>
    </main>

    <!-- content-end -->
  <?php
    include(__DIR__.'/../template/footer-secure.php')
  ?>
  </section>

</main>

  </body>
</html>
