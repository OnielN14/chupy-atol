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
  <link rel="stylesheet" href="/extension/plugins/datatables-1.10.18/datatables.min.css">
</head>

<main class="chupy-admin toggled" >
  <?php
    include('template/navbar.php')
  ?>
  <aside class="chupy-admin-aside" id="side-wrapper">
    <ul class="nav flex-column">
      <li class="nav-item"> <a class="nav-link" href="/admin/dashboard">Dashboard</a></li>
      <li class="nav-item"> <a class="nav-link" href="/admin/dashboard/user">Manajemen Pengguna</a></li>
      <li class="nav-item"> <a class="nav-link" href="/admin/dashboard/produk">Manajemen Produk</a></li>
      <li class="nav-item"> <a class="nav-link" href="/admin/dashboard/kategori">Manajemen Kategori Produk</a></li>
      <li class="nav-item"> <a class="nav-link" href="/admin/dashboard/jenis">Manajemen Jenis Produk</a></li>
    </ul>
  </aside>

  <section id="page-wrapper">
    <!-- content -->
    <main>
    <div id="chupy-msg" class="chupy-alert fixed alert alert-warning alert-dismissible fade" role="alert">
      <strong>Holy guacamole!</strong> <span> You should check in on some of those fields below.</span>
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
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
      ?>
    </main>

    <!-- content-end -->
  <?php
    include(__DIR__.'/../template/footer-secure.php')
  ?>
    <script type="text/javascript" src="/extension/plugins/datatables-1.10.18/datatables.min.js">
    </script>
    <script type="text/javascript" src="/extension/js/chupy-admin-sidebar-behaviour.js">
    </script>
    <script type="text/javascript" src="/extension/js/page/dashboard.utama.js">
    </script>
  </section>

</main>

  </body>
</html>
