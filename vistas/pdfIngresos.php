<?php
ob_start();

session_start();

if (!isset($_SESSION['rol'])) {
    header('location: ../index.php');
}

require("../clases/Conexion.php");
$c = new Conexion();
$conexion = $c->conectar();

?>
<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="../../assets/css/bootstrap.min.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel=stylesheet href="../../assets/style1.css">

    <script defer src="../../assets/css/bootstrap.min.css"></script>
    <title>Informe</title>
    <style>
        * {
            font-family: Arial, Helvetica, sans-serif;
        }

        p {
            color: #ddd;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        .backg {
            width: 100%;
            background-color: #043147;
        }

        img {
            width: 200px;
        }

        .container {
            text-align: center;
        }
    </style>
</head>

<body>
    <?php
    $fecha1 = $_GET['f1'];
    $fecha2 = $_GET['f2'];
    // Convertir la fecha a formato dd-mm-yyyy
    $fecha1Convertida = date("d-m-Y", strtotime($fecha1));
    $fecha2Convertida = date("d-m-Y", strtotime($fecha2));

    ?>
    <div>
        <div class="container">
            <h3>Informe de ingresos</h1>
                <h5>Desde: <?php echo $fecha1Convertida ?> | Hasta: <?php echo $fecha2Convertida ?></h5>
        </div>
        <table>
            <thead>
                <tr>
                    <th>#</th>
                    <th>Paciente</th>
                    <th>Tratamiento</th>
                    <th>Total a pagar</th>
                    <th>Monto abonado</th>
                    <th>Saldo pendiente</th>
                    <th>Fecha de pago</th>
                    <th>Observación</th>
                </tr>
            </thead>
            <tbody>
                <?php

                $totalEgresos = 0;

                $sql = $conexion->query("SELECT pg.idPago, CONCAT(pa.nombrePaciente,' ',pa.apellidoPaciente) as idPaciente, tt.tipoTratamiento as tipoTratamiento,
                    pg.debito AS debito, pg.credito 
                    AS credito, (pg.debito - pg.credito) as saldo, 
                    DATE_FORMAT(pg.fechaPago, '%d-%m-%Y %H:%i:%s') as fechaPago, pg.observacionPago 
                    FROM pagos pg 
                    INNER JOIN pacientes pa ON pg.pacientes_idPaciente = pa.idPaciente 
                    INNER JOIN tipostratamiento tt ON pg.tiposTratamiento_idTipoTratamiento = tt.idTipoTratamiento
                    where pg.estado = 'activo' BETWEEN '$fecha1' AND '$fecha2' and pg.estado = 'activo' ORDER BY fechaPago ASC");

                while ($resultado = mysqli_fetch_row($sql)) {
                ?>  
                    <?php
                        $nf3 = number_format($resultado[3], 0, ',', '.');
                        $nf4 = number_format($resultado[4], 0, ',', '.');
                        $nf5 = number_format($resultado[5], 0, ',', '.');
                    ?>

                

                    <tr>
                            <td><?php echo $resultado[0] ?></td>
                            <td><?php echo $resultado[1] ?></td>
                            <td><?php echo $resultado[2] ?></td>
                            <td><?php echo $nf3 ?><?php echo " Gs." ?></td>
                            <td><?php echo $nf4 ?><?php echo " Gs." ?></td>
                            <td><?php echo $nf5 ?><?php echo " Gs." ?></td>
                            <td><?php echo $resultado[6] ?></td>
                            <td><?php echo $resultado[7] ?></td>
                    </tr>

                <?php

                    $totalEgresos += $resultado[4];
                }
                
                    $numero_formateado = number_format($totalEgresos, 0, ',', '.');

                ?>
            
            </tbody>
            <tfoot>
                <tr>

                    <th>Total:</th>
                    <td colspan='3'></td>
                    <td><?php echo $numero_formateado ?><?php echo " Gs." ?></td>

                </tr>
            </tfoot>
        </table>

</body>

</html>

<?php

$html = ob_get_clean();

require_once "../dompdf/autoload.inc.php";

use Dompdf\Dompdf;

$dompdf = new Dompdf();

$options = $dompdf->getOptions();
$options->set(array('isRemoteEnabled' => true));
$dompdf->setOptions($options);

$dompdf->loadHtml($html);

$dompdf->setPaper('A3');

$dompdf->render();

$dompdf->stream("Informe de Ingresos.pdf", array("Attachment" => false));

?>