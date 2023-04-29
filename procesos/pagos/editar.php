<?php
require_once '../../clases/Pago.php';
require_once '../../clases/Conexion.php';
$id = $_POST['idPago'];
$pacientes_idPaciente = $_POST['txtpacientee'];
$tratamientos_idTratamiento = $_POST['txttratamientoe'];
$debito = $_POST['txtdebitoe'];
$credito  = $_POST['txtcreditoe'];
$saldo  = $_POST['txtsaldoe'];
$observacionPago = $_POST['txtobservacione'];
$datos = array($id,$pacientes_idPaciente,$tratamientos_idTratamiento,$debito,$credito,$saldo,$observacionPago);
$obj = new Pago();
echo $obj->edit($datos);


/* Vista pagos form registro
<select id="txtpaciente" name="txtpaciente" class="form-control">
                    <option value="A">Seleccione</option>
                        <?php
                            require_once '../clases/Paciente.php';
                            require_once '../clases/Conexion.php';
                            $obj1 = new Paciente();
                            $paciente = $obj1->mostrar();
                            while($pro=mysqli_fetch_row($paciente))
                            {
                                ?>
                                <option value="<?php echo $pro[0] ?>" ><?php echo $pro[2] ?></option>
                                <?php
                            }                              
                                ?>
                </select><br> */
?>