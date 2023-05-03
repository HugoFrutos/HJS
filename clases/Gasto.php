<?php
class Gasto
{

    public function save($datos)
    {
        $c = new Conexion();
        $conexion = $c->conectar();
        $montoGasto = $c->test_input($datos[0]);
        $fechaGasto = $c->test_input($datos[1]);
        $observacionGasto = $c->test_input($datos[2]);
        $tiposGasto_idTipoGasto  = $c->test_input($datos[3]);
        $sql = "INSERT INTO gastos(montoGasto,fechaGasto,observacionGasto,tiposGasto_idTipoGasto,estado) 
            values('$montoGasto','$fechaGasto','$observacionGasto','$tiposGasto_idTipoGasto','activo')";
        $result = mysqli_query($conexion, $sql);
        return $result;
    }


    public function edit($datos)
    {
        $c = new Conexion();
        $conexion = $c->conectar();
        $id = $datos[0];
        $montoGasto = $c->test_input($datos[1]);
        $fechaGasto = $c->test_input($datos[2]);
        $observacionGasto = $c->test_input($datos[3]);
        $tiposGasto_idTipoGasto  = $c->test_input($datos[4]);
        $sql = "UPDATE gastos SET montoGasto = '$montoGasto',
            fechaGasto = '$fechaGasto', observacionGasto = '$observacionGasto',
            tiposGasto_idTipoGasto = '$tiposGasto_idTipoGasto' WHERE idGasto = $id";
        $result = mysqli_query($conexion, $sql);
        return $result;
    }


    public function delete($id)
    {
        $c = new Conexion();
        $conexion = $c->conectar();
        $sql = "update gastos set estado = 'inactivo' where idGasto=$id";
        $result = mysqli_query($conexion, $sql);
        return $result;
    }

    
    public function mostrar()
    {
        $c = new Conexion();
        $conexion = $c->conectar();
        $sql = "SELECT ga.idGasto, ti.tipoGasto as idTipoGasto, ga.montoGasto, DATE_FORMAT(ga.fechaGasto, '%d-%m-%Y') as fechaGasto, ga.observacionGasto 
                    FROM gastos ga
                    INNER JOIN tiposgasto ti ON ga.tiposGasto_idTipoGasto = ti.idTipoGasto
                    where ga.estado = 'activo' ";
        $result = mysqli_query($conexion, $sql);
        return $result;
    }


    public function traer($id)
    {
        $c = new Conexion();
        $conexion = $c->conectar();
        $sql = "select * from gastos where idGasto=$id";
        $result = mysqli_query($conexion, $sql);
        $ver = mysqli_fetch_row($result);
        $datos = array(
            "idGasto" => html_entity_decode($ver[0]),
            "montoGasto" => html_entity_decode($ver[1]),
            "fechaGasto" => html_entity_decode($ver[2]),
            "observacionGasto" => html_entity_decode($ver[3]),
            "tiposGasto_idTipoGasto" => html_entity_decode($ver[4]),
        );
        return $datos;
    }
}