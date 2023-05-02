<?php
require_once '../../clases/TipoGasto.php';
require_once '../../clases/Conexion.php';
$id = $_POST['id'];
$obj = new TipoGasto();
echo $obj->delete($id);
?>