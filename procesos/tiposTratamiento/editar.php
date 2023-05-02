<?php
require_once '../../clases/TipoTratamiento.php';
require_once '../../clases/Conexion.php';
$id = $_POST['idTipoTratamiento'];
$tipoTratamiento = $_POST['txttipoe'];
$datos = array($id,$tipoTratamiento);
$obj = new TipoTratamiento();
echo $obj->edit($datos);
?>