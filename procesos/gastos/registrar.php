<?php
require_once '../../clases/Gasto.php';
require_once '../../clases/Conexion.php';
$montoGasto = $_POST['txtmontogasto'];
$fechaGasto = $_POST['txtfechagasto'];
$observacionGasto = $_POST['txtObs'];
$tiposGasto_idTipoGasto  = $_POST['txttipo'];
$datos = array($montoGasto,$fechaGasto,$observacionGasto,$tiposGasto_idTipoGasto);
$obj = new Gasto();
echo $obj->save($datos);
?>