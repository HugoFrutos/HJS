<?php
require_once '../../clases/Tratamiento.php';
require_once '../../clases/Conexion.php';
$txtfechaInicio = $_POST['txtfechaInicio'];
$txtProxCons = $_POST['txtProxCons'];
$txtObs  = $_POST['txtObs'];
$txtdiente = $_POST['txtdiente'];
$txttipotratamiento = $_POST['txttipotratamiento'];
$txtpaciente  = $_POST['txtpaciente'];
$datos = array($txtfechaInicio,$txtProxCons,$txtObs,$txtdiente,$txttipotratamiento,$txtpaciente);
$obj = new Tratamiento();
echo $obj->save($datos);
?>