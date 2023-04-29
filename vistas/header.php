<?php

session_start();
if(isset($_SESSION['usuario']))
{


?>
<!DOCTYPE html>
<html lang="es">
<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		
		<title>Salud Dental</title>

		<!-- Favicon -->
		<link rel="shortcut icon" href="../assets/images/logo.png">

		<!-- Bootstrap CSS -->
        <link href="../assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />


        <link rel="stylesheet" type="text/css" href="../assets/plugins/alertifyjs/css/alertify.css">
        
        <link rel="stylesheet" type="text/css" href="../assets/plugins/alertifyjs/css/themes/default.css">
		
		<!-- Font Awesome CSS -->
		<link href="../assets/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
		
		<!-- Custom CSS -->
        <link href="../assets/css/style.css" rel="stylesheet" type="text/css" />

		
		<!-- BEGIN CSS for this page -->
		<link rel="stylesheet" type="text/css" href="../assets/dataTables.bootstrap4.min.css"/>
        <link rel="stylesheet" type="text/css" href="../assets/responsive.dataTables.min.css">
        <!-- END CSS for this page -->

        <script src="//cdn.datatables.net/plug-ins/1.11.4/i18n/es_es.json"></script>

</head>

<body class="adminbody">

<div id="main">

	<!-- top bar navigation -->
	<div class="headerbar">

		<!-- LOGO -->
        <div class="headerbar-left">
			<a href="pacientes.php" class="logo"><img alt="Logo" src="../assets/images/logo.png" /> <span>Salud Dental</span></a>
        </div>

        <nav class="navbar-custom">

                    <ul class="list-inline float-right mb-0">

                        <li class="list-inline-item dropdown notif">
                            <a class="nav-link dropdown-toggle nav-user" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                                <img src="../assets/images/avatars/Usuario.png" alt="Profile image" class="avatar-rounded">
                            </a>
                            <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
                                <!-- item-->
                                <div class="dropdown-item noti-title">
                                    <h5 class="text-overflow"><small>Hola, <?php echo $_SESSION['usuario'] ?></small> </h5>
                                </div>

                                <!-- item-->
                                <a href="perfil.php" class="dropdown-item notify-item">
                                    <i class="fa fa-user"></i> <span>Cambiar Contraseña</span>
                                </a>

                                <!-- item-->
                                <a href="../procesos/usuarios/salir.php" class="dropdown-item notify-item">
                                    <i class="fa fa-power-off"></i> 
                                    <span>
                                        Salir
                                    </span>
                                </a>
								
                            </div>
                        </li>

                    </ul>

                    <ul class="list-inline menu-left mb-0">
                        <li class="float-left">
                            <button class="button-menu-mobile open-left">
								<i class="fa fa-fw fa-bars"></i>
                            </button>
                        </li>                        
                    </ul>

        </nav>

	</div>
	<!-- End Navigation -->
	
 
	<!-- Left Sidebar -->
	<div class="left main-sidebar">
	
		<div class="sidebar-inner leftscroll">

			<div id="sidebar-menu">
        
			<ul>
                    <li class="submenu">
                        <a href="pacientes.php"><i class="fa fa-users"></i><span> Pacientes </span> </a>
                    </li>

                    <li class="submenu">
                        <a href="tratamientos.php"><i class="fa fa-plus-square"></i><span> Tratamientos </span> </a>
                    </li>

                    <li class="submenu">
                        <a href="pagos.php"><i class="fa fa-usd"></i><span> Ingresos </span> </a>
                    </li>

                    <li class="submenu">
                        <a href="gastos.php"><i class="fa fa-shopping-bag"></i><span> Gastos </span> </a>
                    </li>

                    <li class="submenu">
                        <a href="informes.php"><i class="fa fa-book"></i><span> Informes </span> </a>
                    </li>
            </ul>


		</div>
	</div>
	</div>
    <!-- End Sidebar -->

<?php
}
else {
    header("location:../index.php");    
}
?>

