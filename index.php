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
  <link rel="stylesheet" href="assets/login/login.css">


  <link rel="stylesheet" type="text/css" href="assets/alertifyjs/css/alertify.css">
  <link rel="stylesheet" type="text/css" href="assets/alertifyjs/css/themes/default.css">
  <script type="text/javascript" src="assets/alertifyjs/alertify.js"></script>
</head>

<body>
  <div class="container">
    <div class="row">
      <div class="col-sm-9 col-md-7 col-lg-5 mx-auto"><br><br><br><br>
        <div class="card card-signin my-5">
          <div class="card-body">
            <h5 class="card-title text-center"><strong>Salud Dental</strong></h5>
            <form action="procesos/usuarios/login.php" method="post" class="form-signin" id="frmlogin">
              <div class="form-label-group">
                <input type="text" id="username" name="username" class="form-control" placeholder="Email address" required autofocus>
                <label for="username">Usuario</label>
              </div>

              <div class="form-label-group">
                <input type="password" id="password" name="password" class="form-control" placeholder="Password" required>
                <label for="password">Contraseña</label>
              </div>

              <div class="input-field">
                <center><input class="submit" type="submit" value="Entrar"></center>
              </div>

          </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  </div>
</body>

</html>