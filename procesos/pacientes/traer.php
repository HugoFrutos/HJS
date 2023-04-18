<?php
require_once '../../clases/Paciente.php';
require_once '../../clases/Conexion.php';
$id = $_GET['idPaciente'];
$obj = new Paciente();
echo json_encode($obj->traer($id));
?>