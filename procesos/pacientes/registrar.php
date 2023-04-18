<?php
require_once '../../clases/Paciente.php';
require_once '../../clases/Conexion.php';
$txtcedula = $_POST['txtcedula'];
$txtnombre = $_POST['txtnombre'];
$txtapellido = $_POST['txtapellido'];
$txttelefono = $_POST['txttelefono'];
$txttipo = $_POST['txttipo'];
$datos = array($txtcedula,$txtnombre,$txtapellido,$txttelefono,$txttipo);
$obj = new Paciente();
echo $obj->save($datos);
?>