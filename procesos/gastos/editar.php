<?php
require_once '../../clases/Gasto.php';
require_once '../../clases/Conexion.php';
$id = $_POST['idGasto'];
$montoGasto = $_POST['txtmontogastoe'];
$fechaGasto = $_POST['txtfechagastoe'];
$observacionGasto = $_POST['txtObse'];
$tiposGasto_idTipoGasto  = $_POST['txttipoe'];
$datos = array($id,$montoGasto,$fechaGasto,$observacionGasto,$tiposGasto_idTipoGasto);
$obj = new Gasto();
echo $obj->edit($datos);
?>