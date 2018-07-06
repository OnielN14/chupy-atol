<?php

?>

<nav class="chupy-navbar navbar navbar-expand-lg navbar-light fixed-top">
  <a href="/" class="navbar-brand">
    <img src="/extension/img/chupy_icon-light.png" alt="Chupy Brand">
  </a>
  <div class="d-flex justify-content-end" style="width:100%">
    <ul class="nav">
      <li class="nav-item">
        <div class="dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" id="produk-menu-link" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo $_SESSION['login_user']['nama'] ?></a>

            <div id="logout" class="chupy-dropdown dropdown-menu" aria-labelledby="produk-menu-link">
              <a class="dropdown-item" href="/logout">Logout</a>
            </div>
        </div>
      </li>
    </ul>
  </div>
</nav>
