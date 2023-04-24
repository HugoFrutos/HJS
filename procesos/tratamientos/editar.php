<?php
require_once '../../clases/Tratamiento.php';
require_once '../../clases/Conexion.php';
$id = $_POST['idTratamiento'];
$fechaInicio = $_POST['txtfechaInicioe'];
$fechaProxConsulta = $_POST['txtProxConse'];
$observacionTratamiento = $_POST['txtObse'];
$dientes = $_POST['txtdientee'];
$tiposTratamiento_idTipoTratamiento  = $_POST['txttipotratamientoe'];
$pacientes_idPaciente  = $_POST['txtpacientee'];
$datos = array($id,$fechaInicio,$fechaProxConsulta,$observacionTratamiento,$dientes,$tiposTratamiento_idTipoTratamiento,$pacientes_idPaciente);
$obj = new Tratamiento();
echo $obj->edit($datos);
?>