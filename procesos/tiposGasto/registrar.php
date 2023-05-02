<?php
require_once '../../clases/TipoGasto.php';
require_once '../../clases/Conexion.php';
$txttipo = $_POST['txttipo'];
$datos = array($txttipo);
$obj = new TipoGasto();
echo $obj->save($datos);
?>