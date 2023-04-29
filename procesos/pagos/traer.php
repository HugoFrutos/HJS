<?php
require_once '../../clases/Pago.php';
require_once '../../clases/Conexion.php';
$id = $_GET['idPago'];
$obj = new Pago();
echo json_encode($obj->traer($id));
?>