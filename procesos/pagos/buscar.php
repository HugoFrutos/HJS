<?php
$conexion = mysqli_connect('localhost', 'root', 'mysql', 'odontologia');
if (!$conexion) {
	die("Error al conectar a la base de datos: " . mysqli_connect_error());
}

$nombrePaciente = mysqli_real_escape_string($conexion, $_POST['nombrePaciente']);
//$apellido = mysqli_real_escape_string($conexion, $_POST['apellido']);

// Construir la consulta SQL con los criterios de búsqueda
$sql = "SELECT * FROM pacientes WHERE nombrePaciente LIKE '%$nombrePaciente%' ";
//AND apellido LIKE '%$apellido%'

// Ejecutar la consulta SQL
$resultado = mysqli_query($conexion, $sql);

// Mostrar los resultados de la búsqueda
if (mysqli_num_rows($resultado) > 0) {
	echo "<table>
            <tr>
                <th>Nombre</th>
            </tr>";
	while ($fila = mysqli_fetch_assoc($resultado)) {
		echo "<tr>
        <td>" . $fila['nombrePaciente'] . "</td>
        </tr>";
		echo "<input type='radio' name='selected_option' value='" . $fila['id'] . "'>";
            echo $fila['column1'];
            echo "<br>";
	}
	echo "</table>";
} else {
	echo "No se encontraron resultados";
}

?>