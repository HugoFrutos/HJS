<?php
require_once '../../clases/Pago.php';
require_once '../../clases/Conexion.php';
$id = $_POST['id'];
$obj = new Pago();
echo $obj->delete($id);
?>