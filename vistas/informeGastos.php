<?php

session_start();

if (!isset($_SESSION['rol'])) {
    header('location: ../index.php');
}
require 'header.php';
require("../clases/Conexion.php");
$c = new Conexion();
$conexion = $c->conectar();

?>
<!DOCTYPE html>
<html>

<style>
    h1{
        font-size: 28px;
    }
    .subt{
        font-size: 23px;
    }
    .ancho{
        width: 91.2%;
    }

</style>

<head>
    <link rel="stylesheet" href="../../assets/css/bootstrap.min.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel=stylesheet href="../../assets/style1.css">

    <script defer src="../../assets/js/bootstrap.min.js"></script>
    <title>Informe de Gastos</title>
</head>

<body>
<div class="content-page">

    <div class="mt-5 ml-5 text-dark" style="width: 100%;">
        <h1 class="ms-3 text-dark">Informe de gastos</h1>
        <hr />
    </div>
    
    <form action="#" method="post">

        <div class="w-75 ml-5 mt-3">
            <h4 class="subt text-dark">Seleccione el rango de tiempo</h4>

            <div class="input-group mb-3">
                <span class="input-group-text">Desde: </span>
                <input type="date" class="form-control" name="txtfecha1">
                <span class="input-group-text">Hasta</span>
                <input type="date" class="form-control" name="txtfecha2">
                <input type="submit" value="Generar informe" class="btn btn-primary">
            </div>
        </div>
    </form>

    <div class="ancho mt-5 mx-auto text-dark">

        <?php
        if (isset($_POST["txtfecha1"]) && isset($_POST["txtfecha2"])) {
            $fecha1 = $_POST["txtfecha1"];
            $fecha2 = $_POST["txtfecha2"];

        ?>



            <div class="mx-auto mt-2 text-dark">
                <a class="btn btn-primary mb-3" href="pdfGastos.php?f1=<?php echo $fecha1 ?>&f2=<?php echo $fecha2 ?>" target="_blank">Generar PDF <i class='bx bx-download'></i> </a>
                <h3 class="text-dark">Informe de gastos</h3>
            </div>
            <table id="egresos" class="table table-secondary table-hover">
                <thead>
                    <tr>
                        <th class="text-center">#</th>
                        <th class="text-center">Tipo</th>
                        <th class="text-center">Monto</th>
                        <th class="text-center">Fecha</th>
                        <th class="text-center">Observación</th>
                    </tr>
                </thead>
                <tbody class="text-center">
                    <?php

                    $sql = $conexion->query("SELECT ga.idGasto, ti.tipoGasto as idTipoGasto,
                    REPLACE(FORMAT(ga.montoGasto, 0), ',', '.') as montoGasto, 
                    DATE_FORMAT(ga.fechaGasto, '%d-%m-%Y') as fechaGasto, ga.observacionGasto
                    FROM gastos ga
                    INNER JOIN tiposgasto ti ON ga.tiposGasto_idTipoGasto = ti.idTipoGasto
                    WHERE ga.fechaGasto BETWEEN '$fecha1' AND '$fecha2' and ga.estado = 'activo'
                    ORDER BY fechaGasto ASC;");

                    while ($resultado = mysqli_fetch_row($sql)) {
                    ?>

                        <tr>
                            <td><?php echo $resultado[0] ?></td>
                            <td><?php echo $resultado[1] ?></td>
                            <td><?php echo $resultado[2] ?></td>
                            <td><?php echo $resultado[3] ?></td>
                            <td><?php echo $resultado[4] ?></td>
                        </tr>

                    <?php

                    }

                    ?>
                </tbody>
            </table>
        <?php
        }
        ?>
    </div>
</div>
</body>

<?php
require 'footer.php';
?>


</html>