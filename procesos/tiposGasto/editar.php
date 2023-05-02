<?php
require_once '../../clases/TipoGasto.php';
require_once '../../clases/Conexion.php';
$id = $_POST['idTipoGasto'];
$tipoGasto = $_POST['txttipoe'];
$datos = array($id,$tipoGasto);
$obj = new TipoGasto();
echo $obj->edit($datos);
?>