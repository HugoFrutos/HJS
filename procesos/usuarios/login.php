<?php
session_start();
require_once '../../clases/Usuario.php';
require_once '../../clases/Conexion.php';

if(isset($_SESSION['rol'])){
    switch($_SESSION['rol']){
        case 1:
            header('location: ../../vistas/usuarios.php');
        break;

        case 2:
            header('location: ../../vistas/pacientes.php');
        break;

        default:
    }
}

if(isset($_POST['username']) && isset($_POST['password'])){
    $username = $_POST['username'];
    $password = $_POST['password'];

    $datos = array($username,$password);
    $obj = new Usuario();
    $obj->login($datos);
 
}