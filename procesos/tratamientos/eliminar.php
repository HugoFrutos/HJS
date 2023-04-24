<?php
require_once '../../clases/Tratamiento.php';
require_once '../../clases/Conexion.php';
$id = $_POST['id'];
$obj = new Tratamiento();
echo $obj->delete($id);
?>