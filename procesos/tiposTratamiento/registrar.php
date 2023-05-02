<?php
require_once '../../clases/TipoTratamiento.php';
require_once '../../clases/Conexion.php';
$txttipo = $_POST['txttipo'];
$datos = array($txttipo);
$obj = new TipoTratamiento();
echo $obj->save($datos);
?>