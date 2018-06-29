<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Chupy | Lupa Password</title>
  <link rel="stylesheet" href="/extension/plugins/bootstrap-4.1.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="/extension/css/chupy-style.css">
  <link rel="stylesheet" href="/extension/css/style-forgot-password.css">
</head>

<body>
  <main class="container text-center">
    <header class="text-center">
      <img class="img-fluid chupy-simple-header-img" src="/extension/img/chupy_icon-light.png" alt="">
    </header>
    <h1>Kesulitan Mengakses Akun?</h1>
    <p>Lupa kata sandi? Masukkan email login kamu di bawah ini.</p>
    <p>Kami akan mengirimkan pesan ke email berupa tautan untuk reset kata sandi kamu.</p>

    <div class="row">
      <div class="col-md-4"></div>
      <form class="col-md-4 col-xs-12" action="forgot-password" method="post" id="form-forgot-password">
        <input class="form-control" type="email" name="email_or_phone" placeholder="Email" autofocus>
        <div class="invalid-feedback">Harap masukkan email dengan benar.</div>
        <input type="submit" class="btn btn-primary" value="Kirim Permintan" disabled>
      </form>
      <div class="col-md-4"></div>
    </div>

  </main>

  <footer class="text-center">
    <p><img class="img-fluid chupy-simple-footer-img" src="/extension/img/chupy_icon-dark.png" alt=""> &copy; 2018</p>
  </footer>

  <script src="/extension/plugins/jquery-3.3.1/jquery-3.3.1.js"></script>
  <script src="/extension/plugins/popper-js-1.14.3/popper-1.14.3.js"></script>
  <script src="/extension/plugins/bootstrap-4.1.1/js/bootstrap.min.js"></script>
  <script src="/extension/js/validation.js"></script>
  <script>
    let emailPhoneElement = $('input[name="email_or_phone"]')
    let errorMsg = $('#error-msg')
    let btnSend = $('input[type="submit"')
    emailPhoneElement.on('input', function() {
      let targetString = emailPhoneElement.val()
      if (Validation(targetString).emailValidation()) {
        emailPhoneElement.removeClass('is-invalid')
        btnSend.attr('disabled', false)
      } else {
        emailPhoneElement.addClass('is-invalid')
        btnSend.attr('disabled', true)
      }
    })
  </script>
</body>

</html>
