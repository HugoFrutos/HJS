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
		
		<title>Ventas</title>

		<!-- Favicon -->
		<link rel="shortcut icon" href="../assets/images/favicon.ico">

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

</head>

<body class="adminbody">

<div id="main">

	<!-- top bar navigation -->
	<div class="headerbar">

		<!-- LOGO -->
        <div class="headerbar-left">
			<a href="inicio.php" class="logo"><img alt="Logo" src="../assets/images/logo.png" /> <span>Salud Dental</span></a>
        </div>

        <nav class="navbar-custom">

                    <ul class="list-inline float-right mb-0">
						
						<li class="list-inline-item dropdown notif">
                            <a class="nav-link dropdown-toggle arrow-none" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                                <i class="fa fa-fw fa-question-circle"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right dropdown-arrow dropdown-arrow-success dropdown-lg">
                                <!-- item-->
                                <div class="dropdown-item noti-title">
                                    <h5><small>Ayuda y Soporte</small></h5>
                                </div>

                                <!-- item-->
                                <a target="_blank" href="stock.php" class="dropdown-item notify-item">                                    
                                    <p class="notify-details ml-0">
                                        <b></b>
                                    </p>
                                </a>
<!--Cada vez que un producto tenga un stock menor a 10 unidades, aparecera un mensaje de advertencia--->
                               

                            </div>
                        </li>
						
                        
                        
					

                        <li class="list-inline-item dropdown notif">
                            <a class="nav-link dropdown-toggle nav-user" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                                <img src="../assets/images/avatars/admin.png" alt="Profile image" class="avatar-rounded">
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
						<a class="active" href="inicio.php"><i class="fa fa-fw fa-bars"></i><span> Menú </span> </a>
                    </li>

                    
                    <li class="submenu">
                        <a href="productos.php"><i class="fa fa-fw fa-bars"></i><span> Pacientes </span> </a>
                    </li>

                    <li class="submenu">
                        <a href="proveedores.php"><i class="fa fa-fw fa-bars"></i><span> Tratamientos </span> </a>
                    </li>

                    <li class="submenu">
                        <a href="categorias.php"><i class="fa fa-fw fa-bars"></i><span> Ingresos </span> </a>
                    </li>

                    <li class="submenu">
                        <a href="gastos.php"><i class="fa fa-fw fa-bars"></i><span> Gastos </span> </a>
                    </li>

                    <li class="submenu">
                        <a href="informes.php"><i class="fa fa-fw fa-bars"></i><span> Informes </span> </a>
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

