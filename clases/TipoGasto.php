<?php
class TipoGasto{
        public function save($datos)
        {
            $c = new Conexion();
			$conexion = $c->conectar();
			$tipoGasto = $c->test_input($datos[0]);
			$sql = "INSERT INTO tiposgasto (tipoGasto) values('$tipoGasto')";
			$result = mysqli_query($conexion,$sql);
            return $result;
        }
    
        public function edit($datos)
        {
            $c = new Conexion();
			$conexion = $c->conectar();
            $id = $datos[0];
			$tipoGasto = $c->test_input($datos[1]);
			$sql = "UPDATE tiposgasto set tipoGasto = '$tipoGasto' where idTipoGasto=$id";
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
			$sql = "SELECT * from tiposgasto" ;
            $result = mysqli_query($conexion,$sql);
            return $result; 
    }
    public function traer($id)
    {
            $c = new Conexion();
			$conexion = $c->conectar();
			$sql = "select * from tiposgasto where idTipoGasto=$id";
			$result = mysqli_query($conexion,$sql);
            $ver = mysqli_fetch_row($result);
            $datos = array(
               "idTipoGasto " =>html_entity_decode($ver[0]),
               "tipoGasto" =>html_entity_decode($ver[1]),
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
