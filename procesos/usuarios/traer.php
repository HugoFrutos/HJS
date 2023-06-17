<?php
require_once '../../clases/Usuario.php';
require_once '../../clases/Conexion.php';
$id = $_GET['idUsuario'];
$obj = new Usuario();
echo json_encode($obj->traer($id));
?>