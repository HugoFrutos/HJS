<?php
require_once '../../clases/Gasto.php';
require_once '../../clases/Conexion.php';
$id = $_GET['idGasto'];
$obj = new Gasto();
echo json_encode($obj->traer($id));
?>