<?php
require_once '../../clases/Tratamiento.php';
require_once '../../clases/Conexion.php';
$id = $_GET['idTratamiento'];
$obj = new Tratamiento();
echo json_encode($obj->traer($id));
?>