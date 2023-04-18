<?php
require_once '../../clases/Paciente.php';
require_once '../../clases/Conexion.php';
$id = $_POST['id'];
$obj = new Paciente();
echo $obj->delete($id);
?>