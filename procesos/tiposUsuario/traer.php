<?php
require_once '../../clases/TipoTratamiento.php';
require_once '../../clases/Conexion.php';
$id = $_GET['idTipoTratamiento'];
$obj = new TipoTratamiento();
echo json_encode($obj->traer($id));
?>