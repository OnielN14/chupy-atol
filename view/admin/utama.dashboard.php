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
      ?>
    </main>

    <!-- content-end -->
  <?php
    include(__DIR__.'/../template/footer-secure.php')
  ?>
    <script type="text/javascript" src="/extension/plugins/datatables-1.10.18/datatables.min.js">
    </script>
    <script type="text/javascript">
      $(document).ready(function(){

        // User Data List
        $.ajax({
          url:'/api/pengguna',
          method: 'GET',
          dataType: 'json'
        }).done(function(response){
          let dataSet = []

          for(let index in response.data){
            user = {
              nama:response.data[index].nama,
              alamat:response.data[index].alamat,
              email:response.data[index].email,
              noTelepon:response.data[index].noTelepon,
              opsi:'<button class="btn btn-primary my-1" href="/api/pengguna/'+response.data[index].id+'">Edit</button><button class="btn btn-primary my-1" href="/api/pengguna/'+response.data[index].id+'">Hapus</button> '
            }

            dataSet.push(user)
          }

          result = {'data':dataSet}
          // console.log(result);
          $('#table-user-list').DataTable({
            data:result.data,
            columns:[
              {data:"nama"},
              {data:"alamat"},
              {data:"email"},
              {data:"noTelepon"},
              {data:"opsi"}
            ]
          })
        })

        // Jenis Produk
        $.ajax({
          url:'/api/hak_akses',
          method:'get',
          dataType:'json'
        }).done(function(response){
          let elements = []
          let option = document.createElement('option')
          for(let index in response.data){
            let option = document.createElement('option')
            option.setAttribute('value',response.data[index].id)
            option.innerHTML = response.data[index].levelAkses

            elements.push(option)
          }
          $('select#form-hak-akses').append(elements)
        })

      })

    </script>
  </section>

</main>

  </body>
</html>
