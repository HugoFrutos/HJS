<?php
require_once '../../clases/TipoGasto.php';
require_once '../../clases/Conexion.php';
$id = $_GET['idTipoGasto'];
$obj = new TipoGasto();
echo json_encode($obj->traer($id));
?>