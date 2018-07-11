<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="theme-color" content="#68c1ef">
    <title>Chupy | Tentang Kami</title>
    <link rel="stylesheet" href="/extension/plugins/bootstrap-4.1.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="/extension/css/chupy-style.css">
    <link rel="stylesheet" href="/extension/css/style-about.css"
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
      <section class="chupy-page-header">
          <div class="col-md">
              <h1>Tentang Kami</h1>
              <h5>"Tak Kenal Maka Tak Sayang", begitulah pepatah berkata</h5>
          </div>
      </section>
    </header>

    <section class="container chupy-team-description">
      <h1 class="text-center">Hai, ini tim pengembang <span style="font-weight:bold">Chupy</span>!!</h1>
    </section>
    <section class="container-fluid">
      <div class="row">

        <div class="col">
          <article class="chupy-profile-team text-center">
            <img src="/extension/img/dev-team/picture1.png" alt="profile-foto" class="my-2 ">
            <h3>Moch. Indra Yudha Lakaselindra</h3>
          </article>
        </div>
        <div class="col">
          <article class="chupy-profile-team text-center">
            <img src="/extension/img/dev-team/picture2.png" alt="profile-foto" class="my-2 ">
            <h3>Maulvi Inayat Ali</h3>
          </article>
        </div>
        <div class="col">
          <article class="chupy-profile-team text-center">
            <img src="/extension/img/dev-team/picture3.png" alt="profile-foto" class="my-2 ">
            <h3>Tribuana Andhika Perkasa</h3>
          </article>
        </div>
        <div class="col">
          <article class="chupy-profile-team text-center">
            <img src="/extension/img/dev-team/picture4.png" alt="profile-foto" class="my-2 ">
            <h3>Daniyal Ahmad Rizaldhi</h3>
          </article>
        </div>
        <div class="col">
          <article class="chupy-profile-team text-center">
            <img src="/extension/img/dev-team/picture5.png" alt="profile-foto" class="my-2 ">
            <h3>Ivan Rivaldi</h3>
          </article>
        </div>

      </div>
    </section>

  </main>

  <?php
    include('template/footer.php');
  ?>
</body>
</html>
