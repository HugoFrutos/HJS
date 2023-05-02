<?php
class TipoTratamiento
{
    public function save($datos)
    {
        $c = new Conexion();
        $conexion = $c->conectar();
        $tipoTratamiento = $c->test_input($datos[0]);
        $sql = "INSERT INTO tipostratamiento (tipoTratamiento, estado) values('$tipoTratamiento','activo')";
        $result = mysqli_query($conexion, $sql);
        return $result;
    }

    public function edit($datos)
    {
        $c = new Conexion();
        $conexion = $c->conectar();
        $id = $datos[0];
        $tipoTratamiento = $c->test_input($datos[1]);
        $sql = "UPDATE tipostratamiento set tipoTratamiento = '$tipoTratamiento' where idTipoTratamiento=$id";
        $result = mysqli_query($conexion, $sql);
        return $result;
    }

    public function delete($id)
    {
        $c = new Conexion();
        $conexion = $c->conectar();
        $sql = "update tipostratamiento set estado = 'inactivo' where idTipoTratamiento=$id";
        $result = mysqli_query($conexion, $sql);
        return $result;
    }

    public function mostrar()
    {
        $c = new Conexion();
        $conexion = $c->conectar();
        $sql = "SELECT * from tipostratamiento where estado = 'activo' ";
        $result = mysqli_query($conexion, $sql);
        return $result;
    }

    public function traer($id)
    {
        $c = new Conexion();
        $conexion = $c->conectar();
        $sql = "select * from tipostratamiento where idTipoTratamiento=$id";
        $result = mysqli_query($conexion, $sql);
        $ver = mysqli_fetch_row($result);
        $datos = array(
            "idTipoTratamiento" => html_entity_decode($ver[0]),
            "tipoTratamiento" => html_entity_decode($ver[1]),
        );
        return $datos;
    }
}
