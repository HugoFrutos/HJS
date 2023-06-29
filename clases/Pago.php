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
        $fechaPago = $c->test_input($datos[4]);
        $observacionPago = $c->test_input($datos[5]);
        $sql = "INSERT INTO pagos(pacientes_idPaciente,tiposTratamiento_idTipoTratamiento,debito,credito,
            saldo,fechaPago,observacionPago,estado) 
            values('$pacientes_idPaciente','$tiposTratamiento_idTipoTratamiento','$debito','$credito',
            '$debito - $credito','$fechaPago', '$observacionPago','activo')";
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
        $fechaPago = $c->test_input($datos[5]);
        $observacionPago = $c->test_input($datos[6]);
        $sql = "UPDATE pagos SET pacientes_idPaciente = '$pacientes_idPaciente',
            tiposTratamiento_idTipoTratamiento = '$tiposTratamiento_idTipoTratamiento', debito = '$debito',
            credito = '$credito', saldo = ('$debito - $credito'),
            fechaPago = '$fechaPago', observacionPago = '$observacionPago' 
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
                    REPLACE(FORMAT(pg.debito, 0), ',', '.') AS debito, REPLACE(FORMAT(pg.credito, 0), ',', '.') 
                    AS credito, REPLACE(FORMAT( (pg.debito - pg.credito), 0), ',', '.') as saldo, 
                    DATE_FORMAT(pg.fechaPago, '%d-%m-%Y') as fechaPago, pg.observacionPago 
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
        $sql = "select idPago, pacientes_idPaciente, tiposTratamiento_idTipoTratamiento, debito, credito,fechaPago, observacionPago from pagos where idPago=$id";
        $result = mysqli_query($conexion, $sql);
        $ver = mysqli_fetch_row($result);
        $datos = array(
            "idPago" => html_entity_decode($ver[0]),
            "pacientes_idPaciente" => html_entity_decode($ver[1]),
            "tiposTratamiento_idTipoTratamiento" => html_entity_decode($ver[2]),
            "debito" => html_entity_decode($ver[3]),
            "credito" => html_entity_decode($ver[4]),
            "fechaPago" => html_entity_decode($ver[5]),
            "observacionPago" => html_entity_decode($ver[6]),
        );
        return $datos;
    }
}
