<?php
require_once '../../clases/Usuario.php';
require_once '../../clases/Conexion.php';
$txtusername = $_POST['txtusername'];
$txtpassword = $_POST['txtpassword'];
$txtnombreUsuario = $_POST['txtnombreUsuario'];
$txtapellidoUsuario = $_POST['txtapellidoUsuario'];
$txttipoUsuario = $_POST['txttipoUsuario'];
$datos = array($txtusername, $txtpassword, $txtnombreUsuario, $txtapellidoUsuario, $txttipoUsuario);
$obj = new Usuario();
echo $obj->save($datos);
?>