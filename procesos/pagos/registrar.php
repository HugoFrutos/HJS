<?php
require_once '../../clases/Pago.php';
require_once '../../clases/Conexion.php';
$txtpaciente = $_POST['txtpaciente'];
$txttratamiento = $_POST['txttratamiento'];
$txtdebito = $_POST['txtdebito'];
$txtcredito  = $_POST['txtcredito'];
$txtobservacion = $_POST['txtobservacion'];
$datos = array($txtpaciente,$txttratamiento,$txtdebito,$txtcredito,$txtobservacion);
$obj = new Pago();
echo $obj->save($datos);
?>