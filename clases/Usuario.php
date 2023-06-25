<?php
class Usuario
{

	public function login($datos)
	{
		$c = new Conexion();
		$conexion = $c->conectar();
		$password = sha1(md5($datos[1]));
		$usuario = $datos[0];
		$sql = "select * from usuarios where BINARY username='$usuario' and BINARY password='$password'";
		$result = mysqli_query($conexion, $sql);

		$ver = mysqli_fetch_row($result);

		if ($ver == true) {
			$nUsuario = $ver[3];
			$rol = $ver[6];
			$pass = $ver[2];
			$usname	= $ver[1];
			$_SESSION['rol'] = $rol;
			$_SESSION['usuario'] = $nUsuario;
			$_SESSION['datos'] = $pass;
			$_SESSION['nombre'] = $usname;

			switch ($_SESSION['rol']) {
				case 1:
					header('location: ../../vistas/usuarios.php');
					break;

				case 2:
					header('location: ../../vistas/pacientes.php');
					break;

				default:
			}
		} else {
			echo "usuario o contraseña incorrectos";
		}
	}

	public function cambiarpass($passwords)
	{
		$c = new Conexion();
		$conexion = $c->conectar();
		$password = mysqli_real_escape_string($conexion, sha1(md5($passwords)));
		$usuario = $_SESSION['nombre'];
		$sql = "UPDATE usuarios SET password = '$password' where username='$usuario'";
		$result = mysqli_query($conexion, $sql);
		return $result;
	}

	public function save($datos)
	{
		$c = new Conexion();
		$conexion = $c->conectar();
		$username = $c->test_input($datos[0]);
		$password = $c->test_input($datos[1]);
		$nombreUsuario = $c->test_input($datos[2]);
		$apellidoUsuario = $c->test_input($datos[3]);
		$tiposUsuario_idTipoUsuario = $c->test_input($datos[4]);
		$sql = "INSERT INTO usuarios (username, password, nombreUsuario, apellidoUsuario, 
		tiposUsuario_idTipoUsuario, estado)
		values('$username', sha1(md5('$password')), '$nombreUsuario', '$apellidoUsuario', '$tiposUsuario_idTipoUsuario',
		'activo')";
		$result = mysqli_query($conexion, $sql);
		return $result;
	}

	public function edit($datos)
	{
		$c = new Conexion();
		$conexion = $c->conectar();
		$id = $datos[0];
		$username = $c->test_input($datos[1]);
		$password = $c->test_input($datos[2]);
		$nombreUsuario = $c->test_input($datos[3]);
		$apellidoUsuario = $c->test_input($datos[4]);
		$tiposUsuario_idTipoUsuario = $c->test_input($datos[5]);
		$sql = "UPDATE usuarios set username = '$username', password = sha1(md5('$password')),
		nombreUsuario = '$nombreUsuario', apellidoUsuario = '$apellidoUsuario', 
		tiposUsuario_idTipoUsuario = '$tiposUsuario_idTipoUsuario'
		where idUsuario = $id";
		$result = mysqli_query($conexion, $sql);
		return $result;
	}

	public function delete($id)
	{
		$c = new Conexion();
		$conexion = $c->conectar();
		$sql = "update usuarios set estado = 'inactivo' where idUsuario =$id";
		$result = mysqli_query($conexion, $sql);
		return $result;
	}

	public function mostrar()
	{
		$c = new Conexion();
		$conexion = $c->conectar();
		$sql = "SELECT us.idUsuario, us.username, us.password, us.nombreUsuario, us.apellidoUsuario, 
		ti.tipoUsuario as idTipoUsuario
		from usuarios us
		INNER JOIN tiposusuario ti ON us.tiposUsuario_idTipoUsuario  = ti.idTipoUsuario 
		where us.estado = 'activo'";
		$result = mysqli_query($conexion, $sql);
		return $result;
	}

	public function traer($id)
	{
		$c = new Conexion();
		$conexion = $c->conectar();
		$sql = "select * from usuarios where idUsuario =$id";
		$result = mysqli_query($conexion, $sql);
		$ver = mysqli_fetch_row($result);
		$datos = array(
			"idUsuario" => html_entity_decode($ver[0]),
			"username" => html_entity_decode($ver[1]),
			"password" => html_entity_decode($ver[2]),
			"nombreUsuario" => html_entity_decode($ver[3]),
			"apellidoUsuario" => html_entity_decode($ver[4]),
			"tiposUsuario_idTipoUsuario" => html_entity_decode($ver[5]),
		);
		return $datos;
	}
}
