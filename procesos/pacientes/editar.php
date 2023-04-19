<?php
require_once '../../clases/Paciente.php';
require_once '../../clases/Conexion.php';
$id = $_POST['idPaciente'];
$txtcedula = $_POST['txtcedulae'];
$txtnombre = $_POST['txtnombree'];
$txtapellido = $_POST['txtapellidoe'];
$txttelefono = $_POST['txttelefonoe'];
$datos = array($id,$txtcedula,$txtnombre,$txtapellido,$txttelefono);
$obj = new Paciente();
echo $obj->edit($datos);
?>