<?php
class Tratamiento{

    public function save($datos)
    {
            $c = new Conexion();
			$conexion = $c->conectar();
			$fechaInicio = $c->test_input($datos[0]);
            $fechaProxConsulta = $c->test_input($datos[1]);
            $observacionTratamiento = $c->test_input($datos[2]);
            $dientes = $c->test_input($datos[3]);
            $tiposTratamiento_idTipoTratamiento = $c->test_input($datos[4]);
            $pacientes_idPaciente = $c->test_input($datos[5]);
			$sql = "INSERT INTO tratamientos(fechaInicio,fechaProxConsulta,observacionTratamiento,dientes,
            tiposTratamiento_idTipoTratamiento,pacientes_idPaciente) 
            values('$fechaInicio','$fechaProxConsulta','$observacionTratamiento','$dientes',
            '$tiposTratamiento_idTipoTratamiento','$pacientes_idPaciente')";
			$result = mysqli_query($conexion,$sql);
            return $result;
    }

    public function edit($datos)
    {
            $c = new Conexion();
			$conexion = $c->conectar();
            $id = $datos[0];
			$fechaInicio = $c->test_input($datos[1]);
            $fechaProxConsulta = $c->test_input($datos[2]);
            $observacionTratamiento = $c->test_input($datos[3]);
            $dientes = $c->test_input($datos[4]);
            $tiposTratamiento_idTipoTratamiento = $c->test_input($datos[5]);
            $pacientes_idPaciente = $c->test_input($datos[6]);
			$sql = "UPDATE tratamientos SET fechaInicio = '$fechaInicio',
            fechaProxConsulta = '$fechaProxConsulta', observacionTratamiento = '$observacionTratamiento',
            dientes = '$dientes', tiposTratamiento_idTipoTratamiento = '$tiposTratamiento_idTipoTratamiento',
            pacientes_idPaciente = '$pacientes_idPaciente' 
            WHERE idTratamiento = $id";
			$result = mysqli_query($conexion,$sql);
            return $result;
    }

    /*public function delete($id)
    {
            $c = new Conexion();
			$conexion = $c->conectar();
			$sql = "update tratamientos set estado = 'inactivo' where idTratamiento=$id";
			$result = mysqli_query($conexion,$sql);
            return $result;
    }*/
    public function mostrar()
    {
            $c = new Conexion();
			$conexion = $c->conectar();
            $sql = "SELECT tr.idTratamiento, tr.fechaInicio, tr.fechaProxConsulta, tr.observacionTratamiento, tr.dientes, ti.tipoTratamiento as idTipoTratamiento, pa.nombrePaciente as idPaciente 
                    FROM tratamientos tr
                    INNER JOIN pacientes pa ON tr.pacientes_idPaciente = pa.idPaciente
                    INNER JOIN tipostratamiento ti ON tr.tiposTratamiento_idTipoTratamiento = ti.idTipoTratamiento";
            $result = mysqli_query($conexion,$sql);
            return $result;
    }
    public function traer($id)
    {
            $c = new Conexion();
			$conexion = $c->conectar();
			$sql = "select * from tratamientos where idTratamiento=$id";
			$result = mysqli_query($conexion,$sql);
            $ver = mysqli_fetch_row($result);
            $datos = array(
               "idTratamiento" =>html_entity_decode($ver[0]),
               "fechaInicio" =>html_entity_decode($ver[1]),
               "fechaProxConsulta" =>html_entity_decode($ver[2]),
               "observacionTratamiento" =>html_entity_decode($ver[3]),
               "dientes" =>html_entity_decode($ver[4]),
               "tiposTratamiento_idTipoTratamiento " =>html_entity_decode($ver[5]),
               "pacientes_idPaciente " =>html_entity_decode($ver[6]),              
             );
            return $datos;
    }
}
