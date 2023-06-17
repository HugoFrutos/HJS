<?php
require_once '../../clases/TipoTratamiento.php';
require_once '../../clases/Conexion.php';
$id = $_POST['id'];
$obj = new TipoTratamiento();
echo $obj->delete($id);
?>