<?php
session_start();

if (isset($_SESSION['rol'])) {
  switch ($_SESSION['rol']) {
    case 1:
      header('location: vistas/usuarios.php');
      break;

    case 2:
      header('location: vistas/pacientes.php');
      break;

    default:
  }
}

if (isset($_GET['el'])) {
  $el = $_GET['el'];
};


?>

<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Salud Dental</title>
  <link rel="shortcut icon" href="assets/images/logo.png" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.slim.min.js"></script>

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
  <script src="assets/jquery-3.2.1.min.js"></script>
  <link rel="stylesheet" href="assets/css/styles.css">


  <link rel="stylesheet" type="text/css" href="assets/alertifyjs/css/alertify.css">
  <link rel="stylesheet" type="text/css" href="assets/alertifyjs/css/themes/default.css">
  <script type="text/javascript" src="assets/alertifyjs/alertify.js"></script>
</head>

<body>
  <div class="container">
    <input type="checkbox" id="flip">
    <div class="cover">
      <div class="front">
        <img src="assets/images/logo.png" alt="logo">
        <div class="text">
          <span class="text-1">Consultorio Odontológico <br> Salud Dental</span>
        </div>
      </div>
    </div>
    <div class="forms">
      <div class="form-content">
        <div class="login-form">
          <div class="title">Iniciar sesión</div>
          <form action="procesos/usuarios/login.php" method="post" class="form-signin" id="frmlogin">
            <div class="input-boxes">
              <div class="input-box">
                <i class="fas fa-user"></i>
                <input type="text" id="username" name="username" placeholder="Ingrese su nombre de usuario" required autofocus>
              </div>
              <div class="input-box">
                <i class="fas fa-lock"></i>
                <input type="password" id="password" name="password" placeholder="Ingrese su contraseña" required>
              </div>
              <?php
              if (isset($el)) {
              ?>
                <p style="color: black; text-align:center"> Usuario o contraseña incorrectos!</p>
              <?php
              }
              ?>
            </div>
            <div class="button input-box">
              <input type="submit" value="Iniciar">
            </div>
        </div>
        </form>
      </div>
    </div>
  </div>
  </div>
</body>

</html>

<script>
  if (window.history.replaceState) {
    var cleanUrl = window.location.protocol + "//" + window.location.host + window.location.pathname;
    window.history.replaceState({
      path: cleanUrl
    }, '', cleanUrl);
  }
</script>