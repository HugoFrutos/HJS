<?php
require_once '../../clases/Paciente.php';
require_once '../../clases/Conexion.php';
$txtcedula = $_POST['txtcedula'];
$txtnombre = $_POST['txtnombre'];
$txtapellido = $_POST['txtapellido'];
$txttelefono = $_POST['txttelefono'];
$datos = array($txtcedula,$txtnombre,$txtapellido,$txttelefono);
$obj = new Paciente();
echo $obj->save($datos);
?>