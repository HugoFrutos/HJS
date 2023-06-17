<?php
class TipoUsuario
{
    public function save($datos)
    {
        $c = new Conexion();
        $conexion = $c->conectar();
        $tipoTratamiento = $c->test_input($datos[0]);
        $sql = "INSERT INTO tiposusuario (tipoUsuario, estado) values('$tipoTratamiento','activo')";
        $result = mysqli_query($conexion, $sql);
        return $result;
    }

    public function edit($datos)
    {
        $c = new Conexion();
        $conexion = $c->conectar();
        $id = $datos[0];
        $tipoTratamiento = $c->test_input($datos[1]);
        $sql = "UPDATE tiposusuario set tipoUsuario = '$tipoTratamiento' where idTipoUsuario = $id";
        $result = mysqli_query($conexion, $sql);
        return $result;
    }

    public function delete($id)
    {
        $c = new Conexion();
        $conexion = $c->conectar();
        $sql = "update tiposusuario set estado = 'inactivo' where idTipoUsuario = $id";
        $result = mysqli_query($conexion, $sql);
        return $result;
    }

    public function mostrar()
    {
        $c = new Conexion();
        $conexion = $c->conectar();
        $sql = "SELECT * from tiposusuario";
        $result = mysqli_query($conexion, $sql);
        return $result;
    }

    public function traer($id)
    {
        $c = new Conexion();
        $conexion = $c->conectar();
        $sql = "select * from tiposusuario where idTipoUsuario=$id";
        $result = mysqli_query($conexion, $sql);
        $ver = mysqli_fetch_row($result);
        $datos = array(
            "idTipoUsuario" => html_entity_decode($ver[0]),
            "tipoUsuario" => html_entity_decode($ver[1]),
        );
        return $datos;
    }
}
