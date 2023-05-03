<?php
class Pago
{

    public function save($datos)
    {
        $c = new Conexion();
        $conexion = $c->conectar();
        $pacientes_idPaciente = $c->test_input($datos[0]);
        $tratamientos_idTratamiento = $c->test_input($datos[1]);
        $debito = $c->test_input($datos[2]);
        $credito = $c->test_input($datos[3]);
        $saldo = $c->test_input($datos[4]);
        $observacionPago = $c->test_input($datos[5]);
        $sql = "INSERT INTO pagos(pacientes_idPaciente,tratamientos_idTratamiento,debito,credito,
            saldo,fechaPago,observacionPago,estado) 
            values('$pacientes_idPaciente','$tratamientos_idTratamiento','$debito','$credito',
            '$saldo',current_timestamp(), '$observacionPago','activo')";
        $result = mysqli_query($conexion, $sql);
        return $result;
    }

    public function edit($datos)
    {
        $c = new Conexion();
        $conexion = $c->conectar();
        $id = $datos[0];
        $pacientes_idPaciente = $c->test_input($datos[1]);
        $tratamientos_idTratamiento = $c->test_input($datos[2]);
        $debito = $c->test_input($datos[3]);
        $credito = $c->test_input($datos[4]);
        $saldo = $c->test_input($datos[5]);
        $observacionPago = $c->test_input($datos[6]);
        $sql = "UPDATE pagos SET pacientes_idPaciente = '$pacientes_idPaciente',
            tratamientos_idTratamiento = '$tratamientos_idTratamiento', debito = '$debito',
            credito = '$credito', saldo = '$saldo',
            fechaPago = current_timestamp(), observacionPago = '$observacionPago' 
            WHERE idPago = $id";
        $result = mysqli_query($conexion, $sql);
        return $result;
    }

    public function delete($id)
    {
        $c = new Conexion();
        $conexion = $c->conectar();
        $sql = "update pagos set estado = 'inactivo' where idPago=$id";
        $result = mysqli_query($conexion, $sql);
        return $result;
    }
    public function mostrar()
    {
        $c = new Conexion();
        $conexion = $c->conectar();
        $sql = "SELECT pg.idPago, CONCAT(pa.nombrePaciente,' ',pa.apellidoPaciente) as idPaciente, tt.tipoTratamiento,
                    pg.debito, pg.credito, pg.saldo, DATE_FORMAT(pg.fechaPago, '%d-%m-%Y %H:%i:%s') as fechaPago, pg.observacionPago 
                    FROM pagos pg 
                    INNER JOIN pacientes pa ON pg.pacientes_idPaciente = pa.idPaciente 
                    INNER JOIN tratamientos tr ON pg.tratamientos_idTratamiento = tr.idTratamiento 
                    INNER JOIN tipostratamiento tt ON tt.idTipoTratamiento = tr.tiposTratamiento_idTipoTratamiento
                    where pg.estado = 'activo'
                    ORDER BY 1 ASC";
        $result = mysqli_query($conexion, $sql);
        return $result;
    }

    public function traer($id)
    {
        $c = new Conexion();
        $conexion = $c->conectar();
        $sql = "select * from pagos where idPago=$id";
        $result = mysqli_query($conexion, $sql);
        $ver = mysqli_fetch_row($result);
        $datos = array(
            "idPago" => html_entity_decode($ver[0]),
            "pacientes_idPaciente " => html_entity_decode($ver[1]),
            "tratamientos_idTratamiento " => html_entity_decode($ver[2]),
            "debito" => html_entity_decode($ver[3]),
            "credito" => html_entity_decode($ver[4]),
            "saldo" => html_entity_decode($ver[5]),
            "fechaPago" => html_entity_decode($ver[6]),
            "observacionPago" => html_entity_decode($ver[7]),
        );
        return $datos;
    }

    public function generarInforme($f1, $f2)
    {
        $c = new Conexion();
        $conexion = $c->conectar();
        $sql = "SELECT pg.idPago, CONCAT(pa.nombrePaciente,' ',pa.apellidoPaciente) as idPaciente, tt.tipoTratamiento,
            pg.debito, pg.credito, pg.saldo, DATE_FORMAT(pg.fechaPago, '%d-%m-%Y %H:%i:%s') as fechaPago, pg.observacionPago 
            FROM pagos pg 
            INNER JOIN pacientes pa ON pg.pacientes_idPaciente = pa.idPaciente 
            INNER JOIN tratamientos tr ON pg.tratamientos_idTratamiento = tr.idTratamiento 
            INNER JOIN tipostratamiento tt ON tt.idTipoTratamiento = tr.tiposTratamiento_idTipoTratamiento
            WHERE pg.fechaPago BETWEEN '$f1' AND '$f2' and pg.estado = 'activo' 
            ORDER BY 7 ASC";
        $result = mysqli_query($conexion, $sql);

        return $result;
    }
}
