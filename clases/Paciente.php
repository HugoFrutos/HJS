<?php
class Paciente{
        public function save($datos)
        {
            $c = new Conexion();
			$conexion = $c->conectar();
			$nroCedula = $c->test_input($datos[0]);
            $nombrePaciente = $c->test_input($datos[1]);
            $apellidoPaciente = $c->test_input($datos[2]);
            $nroTelefonoPaciente = $c->test_input($datos[3]);
            $tiposPaciente_idTipoPaciente = $c->test_input($datos[4]);
			$sql = "INSERT INTO pacientes(nroCedula,nombrePaciente,apellidoPaciente,
            nroTelefonoPaciente,tiposPaciente_idTipoPaciente) 
            values('$nroCedula','$nombrePaciente','$apellidoPaciente','$nroTelefonoPaciente',
            '$tiposPaciente_idTipoPaciente')";
			$result = mysqli_query($conexion,$sql);
            return $result;
        }
    
        public function edit($datos)
        {
            $c = new Conexion();
			$conexion = $c->conectar();
            $id = $datos[0];
			$nroCedula = $c->test_input($datos[1]);
            $nombrePaciente = $c->test_input($datos[2]);
            $apellidoPaciente = $c->test_input($datos[3]);
            $nroTelefonoPaciente = $c->test_input($datos[4]);
            $tiposPaciente_idTipoPaciente = $c->test_input($datos[5]);
			$sql = "update pacientes set nroCedula = '$nroCedula', nombrePaciente = '$nombrePaciente',
                     apellidoPaciente = '$apellidoPaciente',
                     nroTelefonoPaciente = '$nroTelefonoPaciente',
                     tiposPaciente_idTipoPaciente = '$tiposPaciente_idTipoPaciente' where idPaciente=$id";
			$result = mysqli_query($conexion,$sql);
            return $result;
        }
                /*public function delete($id)
        {
            $c = new Conexion();
			$conexion = $c->conectar();
			$sql = "update pacientes set estado = 'inactivo' where idPaciente=$id";
			$result = mysqli_query($conexion,$sql);
            return $result;
        }*/
    public function mostrar()
    {
            $c = new Conexion();
			$conexion = $c->conectar();
			$sql = "SELECT idPaciente, nroCedula, nombrePaciente, apellidoPaciente,
            nroTelefonoPaciente from pacientes INNER JOIN  tipospaciente 
            where tiposPaciente_idTipoPaciente = idTipoPaciente" ;
            $result = mysqli_query($conexion,$sql);
            return $result; 
    }
    public function traer($id)
    {
            $c = new Conexion();
			$conexion = $c->conectar();
			$sql = "select * from pacientes where idPaciente=$id";
			$result = mysqli_query($conexion,$sql);
            $ver = mysqli_fetch_row($result);
            $datos = array(
               "idPaciente" =>html_entity_decode($ver[0]),
               "nroCedula" =>html_entity_decode($ver[1]),
               "nombrePaciente" =>html_entity_decode($ver[2]),
               "apellidoPaciente" =>html_entity_decode($ver[3]),
               "nroTelefonoPaciente" =>html_entity_decode($ver[4]),
               "tiposPaciente_idTipoPaciente" =>html_entity_decode($ver[5]),
             );
            return $datos;
    }
    /*
    public function traer_datos_cb($id)
    {
            $c = new Conexion();
			$conexion = $c->conectar();
			$sql = "select precio_venta,nroTelefonoPaciente from pacientes where idPaciente=$id";
			$result = mysqli_query($conexion,$sql);
            $ver = mysqli_fetch_row($result);
            $datos = array(
            "precio_venta" =>html_entity_decode($ver[0]),
            "nroTelefonoPaciente" =>html_entity_decode($ver[1])
            );
            return $datos;
    }

                public function nroTelefonoPaciente($id,$nroTelefonoPaciente)
        {
            $c = new Conexion();
			$conexion = $c->conectar();
			$sql = "update pacientes set nroTelefonoPaciente = nroTelefonoPaciente + '$nroTelefonoPaciente' where idPaciente=$id";
			$result = mysqli_query($conexion,$sql);
            return $result;
        }
        */
    
}
