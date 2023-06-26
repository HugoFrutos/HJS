<?php
require_once '../../clases/Pago.php';
require_once '../../clases/Conexion.php';
$id = $_POST['idPago'];
$pacientes_idPaciente = $_POST['txtpacientee'];
$tiposTratamiento_idTipoTratamiento = $_POST['txttratamientoe'];
$debito = $_POST['txtdebitoe'];
$credito  = $_POST['txtcreditoe'];
$saldo  = $_POST['txtsaldoe'];
$observacionPago = $_POST['txtobservacione'];
$datos = array($id,$pacientes_idPaciente,$tiposTratamiento_idTipoTratamiento,$debito,$credito,$saldo,$observacionPago);
$obj = new Pago();
echo $obj->edit($datos);

?>