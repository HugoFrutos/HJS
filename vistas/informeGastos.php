<?php
require 'header.php';

if (isset($_SESSION['usuario'])) {



?>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js" integrity="sha512-GsLlZN/3F2ErC5ifS5QtgpiJtWd43JWSuIgh7mbzZ8zBps+dvLusV+eNQATqgA/HdeKFVgA5v3S/cIrLF7QnIg==" crossorigin="anonymous" referrerpolicy="no-referrer">
    </script>
    <script src="../helpers/imprimirGastos.js" defer> </script>
    <!-- Modal -->

    <div class="content-page">

        <!-- Start content -->
        <div class="content">

            <div class="container-fluid">

                <div class="row">
                    <div class="col-xl-12">
                        <div class="breadcrumb-holder">
                            <h1 class="main-title float-left">Generar informe de gastos</h1>
                            <div class="clearfix">

                            </div>
                        </div>
                    </div>
                </div>
                <!-- end row -->
                <form action="informeGastos.php" method="post">
                    <label>Seleccione el rango de tiempo</label>
                    <div class="row">
                        <div class="col-lg-1"></div>
                        <div class="col-lg-3">
                            <input type="date" class="form-control" name="txtfecha1" required />
                        </div>
                        <div class="col-lg-3">
                            <input type="date" class="form-control" name="txtfecha2" required />
                        </div>
                        <div class="col-lg-4">
                            <input type="submit" value="Buscar" class="btn btn-primary">
                        </div>
                        <div class="col-lg-1"></div>
                    </div>
                    <hr>
                </form>
                <div id="iGastos" class="row">
                    <!-- Button trigger modal -->




                    <div class="col-lg-12">


                        <?php
                        if (isset($_POST['txtfecha1']) and isset($_POST['txtfecha2'])) {
                            require_once '../clases/Conexion.php';
                            require_once '../clases/Gasto.php';
                            $obj = new Gasto();
                            $result = $obj->generarInforme($_POST['txtfecha1'], $_POST['txtfecha2']);
                            $total = $obj->total($_POST['txtfecha1'], $_POST['txtfecha2']);
                            $total2 = mysqli_fetch_row($total);
                            $fecha1 = $_POST['txtfecha1'];
                            $fecha2 = $_POST['txtfecha2'];

                            // Convertir la fecha1 en un objeto de fecha y formatear en el nuevo formato
                            $fecha1_nuevo_formato = date("d-m-Y", strtotime($fecha1));

                            // Convertir la fecha2 en un objeto de fecha y formatear en el nuevo formato
                            $fecha2_nuevo_formato = date("d-m-Y", strtotime($fecha2));

                        ?>
                            <table class="table table-bordered table-hover table-condensed">
                                <div class="row">

                                    <div class="col-lg-5">
                                        <label>Informe de gastos desde <?php echo $fecha1_nuevo_formato ?> hasta <?php echo $fecha2_nuevo_formato ?>
                                        </label>
                                    </div>
                                    <div class="col-md-5">
                                        <button id="generate-pdf" class="btn btn-primary">Generar PDF</button>
                                    </div>
                                </div>
                                <thead>
                                    <td>Total de gastos: <?php echo $total2[0] ?></td>

                                </thead>
                            </table>
                            <table id="gastos" class="table table-bordered table-hover table-condensed">
                                <thead>
                                    <tr>
                                        <td>#</td>
                                        <td>Tipo</td>
                                        <td>Monto</td>
                                        <td>Fecha</td>
                                        <td>Observación</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    while ($fila = mysqli_fetch_row($result)) {
                                    ?>

                                        <tr>
                                            <td><?php echo $fila[0] ?></td>
                                            <td><?php echo $fila[1] ?></td>
                                            <td><?php echo $fila[2] ?></td>
                                            <td><?php echo $fila[3] ?></td>
                                            <td><?php echo $fila[4] ?></td>

                                        </tr>
                                <?php
                                    }
                                } else {
                                } ?>

                                </tbody>
                            </table>

                    </div>

                </div>



            </div>
            <!-- END container-fluid -->

        </div>
        <!-- END content -->

    </div>
    <!-- END content-page -->



<?php
    require 'footer.php';
} else {
    header("location:../index.php");
}

?>

<script>
    $(document).ready(function() {
        var table = $('#gastos').dataTable({
            "ordering": true,
            "info": false
        });
    });
</script>