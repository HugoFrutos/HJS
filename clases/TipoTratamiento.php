<?php
class TipoTratamiento{
        public function save($datos)
        {
            $c = new Conexion();
			$conexion = $c->conectar();
			$tipoTratamiento = $c->test_input($datos[0]);
			$sql = "INSERT INTO tipostratamiento (tipoTratamiento) values('$tipoTratamiento')";
			$result = mysqli_query($conexion,$sql);
            return $result;
        }
    
        public function edit($datos)
        {
            $c = new Conexion();
			$conexion = $c->conectar();
            $id = $datos[0];
			$tipoTratamiento = $c->test_input($datos[1]);
			$sql = "UPDATE tipostratamiento set tipoTratamiento = '$tipoTratamiento' where idTipoTratamiento=$id";
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
			$sql = "SELECT * from tipostratamiento" ;
            $result = mysqli_query($conexion,$sql);
            return $result; 
    }
    public function traer($id)
    {
            $c = new Conexion();
			$conexion = $c->conectar();
			$sql = "select * from tipostratamiento where idTipoTratamiento=$id";
			$result = mysqli_query($conexion,$sql);
            $ver = mysqli_fetch_row($result);
            $datos = array(
               "idTipoTratamiento " =>html_entity_decode($ver[0]),
               "tipoTratamiento" =>html_entity_decode($ver[1]),
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
