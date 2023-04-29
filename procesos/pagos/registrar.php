<?php
require_once '../../clases/Pago.php';
require_once '../../clases/Conexion.php';
$txtpaciente = $_POST['txtpaciente'];
$txttratamiento = $_POST['txttratamiento'];
$txtdebito = $_POST['txtdebito'];
$txtcredito  = $_POST['txtcredito'];
$txtsaldo  = $_POST['txtsaldo'];
$txtobservacion = $_POST['txtobservacion'];
$datos = array($txtpaciente,$txttratamiento,$txtdebito,$txtcredito,$txtsaldo,$txtobservacion);
$obj = new Pago();
echo $obj->save($datos);
?>