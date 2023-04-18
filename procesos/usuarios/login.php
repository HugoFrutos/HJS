<?php
session_start();
require_once '../../clases/Usuario.php';
require_once '../../clases/Conexion.php';
$username = $_POST['inputEmail'];
$password = $_POST['inputPassword'];
$datos = array($username,$password);
$obj = new Usuario();
echo $obj->login($datos);
?>