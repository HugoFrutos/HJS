<?php
class Pago
{

    public function save($datos)
    {
        $c = new Conexion();
        $conexion = $c->conectar();
        $pacientes_idPaciente = $c->test_input($datos[0]);
        $tiposTratamiento_idTipoTratamiento = $c->test_input($datos[1]);
        $debito = $c->test_input($datos[2]);
        $credito = $c->test_input($datos[3]);
        $observacionPago = $c->test_input($datos[4]);
        $sql = "INSERT INTO pagos(pacientes_idPaciente,tiposTratamiento_idTipoTratamiento,debito,credito,
            saldo,fechaPago,observacionPago,estado) 
            values('$pacientes_idPaciente','$tiposTratamiento_idTipoTratamiento','$debito','$credito',
            '$debito - $credito',current_timestamp(), '$observacionPago','activo')";
        $result = mysqli_query($conexion, $sql);
        return $result;
    }

    public function edit($datos)
    {
        $c = new Conexion();
        $conexion = $c->conectar();
        $id = $datos[0];
        $pacientes_idPaciente = $c->test_input($datos[1]);
        $tiposTratamiento_idTipoTratamiento = $c->test_input($datos[2]);
        $debito = $c->test_input($datos[3]);
        $credito = $c->test_input($datos[4]);
        $saldo = $c->test_input($datos[5]);
        $observacionPago = $c->test_input($datos[6]);
        $sql = "UPDATE pagos SET pacientes_idPaciente = '$pacientes_idPaciente',
            tiposTratamiento_idTipoTratamiento = '$tiposTratamiento_idTipoTratamiento', debito = '$debito',
            credito = '$credito', saldo = '$debito - $credito',
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
        $sql = "SELECT pg.idPago, CONCAT(pa.nombrePaciente,' ',pa.apellidoPaciente) as idPaciente, tt.tipoTratamiento as tipoTratamiento,
                    pg.debito, pg.credito, (pg.debito - pg.credito) as saldo, DATE_FORMAT(pg.fechaPago, '%d-%m-%Y %H:%i:%s') as fechaPago, pg.observacionPago 
                    FROM pagos pg 
                    INNER JOIN pacientes pa ON pg.pacientes_idPaciente = pa.idPaciente 
                    INNER JOIN tipostratamiento tt ON pg.tiposTratamiento_idTipoTratamiento = tt.idTipoTratamiento
                    where pg.estado = 'activo'
                    ORDER BY 1 ASC";
        $result = mysqli_query($conexion, $sql);
        return $result;
    }

    public function traer($id)
    {
        $c = new Conexion();
        $conexion = $c->conectar();
        $sql = "select idPago, pacientes_idPaciente, tiposTratamiento_idTipoTratamiento, debito, credito, observacionPago from pagos where idPago=$id";
        $result = mysqli_query($conexion, $sql);
        $ver = mysqli_fetch_row($result);
        $datos = array(
            "idPago" => html_entity_decode($ver[0]),
            "pacientes_idPaciente" => html_entity_decode($ver[1]),
            "tiposTratamiento_idTipoTratamiento" => html_entity_decode($ver[2]),
            "debito" => html_entity_decode($ver[3]),
            "credito" => html_entity_decode($ver[4]),
            "observacionPago" => html_entity_decode($ver[5]),
        );
        return $datos;
    }

    public function generarInforme($f1, $f2)
    {
        $c = new Conexion();
        $conexion = $c->conectar();
        $sql = "SELECT pg.idPago, CONCAT(pa.nombrePaciente,' ',pa.apellidoPaciente) as idPaciente, tt.tipoTratamiento as tipoTratamiento,
                    pg.debito, pg.credito, (pg.debito - pg.credito) as saldo, DATE_FORMAT(pg.fechaPago, '%d-%m-%Y %H:%i:%s') as fechaPago, pg.observacionPago 
                    FROM pagos pg 
                    INNER JOIN pacientes pa ON pg.pacientes_idPaciente = pa.idPaciente 
                    INNER JOIN tipostratamiento tt ON pg.tiposTratamiento_idTipoTratamiento = tt.idTipoTratamiento
            WHERE pg.fechaPago BETWEEN '$f1' AND '$f2' and pg.estado = 'activo' 
            ORDER BY 7 ASC";
        $result = mysqli_query($conexion, $sql);

        return $result;
    }

    public function total($f1, $f2)
    {
        $c = new Conexion();
        $conexion = $c->conectar();
        $sql = "SELECT SUM(pg.credito)
                    FROM pagos pg
                    WHERE pg.fechaPago BETWEEN '$f1' AND '$f2' and pg.estado = 'activo'";
        $result = mysqli_query($conexion, $sql);

        return $result;
    }
}
