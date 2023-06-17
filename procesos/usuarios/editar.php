<?php
require_once '../../clases/Usuario.php';
require_once '../../clases/Conexion.php';
$id = $_POST['idUsuario'];
$txtusername = $_POST['txtusernamee'];
$txtpassword = $_POST['txtpassworde'];
$txtnombreUsuario = $_POST['txtnombreUsuarioe'];
$txtapellidoUsuario = $_POST['txtapellidoUsuarioe'];
$txttipoUsuario = $_POST['txttipoUsuarioe'];
$datos = array($id, $txtusername, $txtpassword, $txtnombreUsuario, $txtapellidoUsuario, $txttipoUsuario);
$obj = new Usuario();
echo $obj->edit($datos);
?>