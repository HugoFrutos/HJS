<?php
require_once '../../clases/Gasto.php';
require_once '../../clases/Conexion.php';
$id = $_POST['id'];
$obj = new Gasto();
echo $obj->delete($id);
?>