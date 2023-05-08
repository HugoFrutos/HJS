<?php
require 'header.php';

if (isset($_SESSION['usuario'])) {



?>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js" integrity="sha512-GsLlZN/3F2ErC5ifS5QtgpiJtWd43JWSuIgh7mbzZ8zBps+dvLusV+eNQATqgA/HdeKFVgA5v3S/cIrLF7QnIg==" crossorigin="anonymous" referrerpolicy="no-referrer">
    </script>
    <script src="../helpers/imprimirIngresos.js" defer> </script>


    <!-- Modal -->

    <div class="content-page">

        <!-- Start content -->
        <div class="content">

            <div class="container-fluid">

                <div class="row">
                    <div class="col-xl-12">
                        <div class="breadcrumb-holder">
                            <h1 class="main-title float-left">Generar informe de ingresos</h1>
                            <div class="clearfix">

                            </div>
                        </div>
                    </div>
                </div>
                <!-- end row -->
                <form action="informeIngresos.php" method="post">
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
                <div id="iIngresos" class="row">
                    <!-- Button trigger modal -->




                    <div class="col-lg-12">


                        <?php
                        if (isset($_POST['txtfecha1']) and isset($_POST['txtfecha2'])) {
                            require_once '../clases/Conexion.php';
                            require_once '../clases/Pago.php';
                            $obj = new Pago();
                            $result = $obj->generarInforme($_POST['txtfecha1'], $_POST['txtfecha2']);
                            $total = $obj->total($_POST['txtfecha1'], $_POST['txtfecha2']);
                            $total2 = mysqli_fetch_row($total);
                        ?>
                            <table class="table table-bordered table-hover table-condensed">
                                <div class="row">
                                    
                                    <div class="col-lg-5">
                                        <label>Informe de ingresos desde <?php echo $_POST['txtfecha1'] ?> hasta <?php echo $_POST['txtfecha2'] ?>
                                        </label>
                                    </div>
                                    <div class="col-md-5">
                                        <button id="generate-pdf" class="btn btn-primary">Generar PDF</button>
                                    </div>
                                </div>
                                <thead>
                                    <td>Total de ingresos: <?php echo $total2[0] ?></td>

                                </thead>
                                
                            </table>
                            <table id="ingresos" class="table table-bordered table-hover table-condensed">
                                <thead>
                                    <tr>
                                        <td>#</td>
                                        <td>Paciente</td>
                                        <td>Tratamiento</td>
                                        <td>Débito</td>
                                        <td>Crédito</td>
                                        <td>Saldo</td>
                                        <td>Fecha de pago</td>
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
                                            <td><?php echo $fila[5] ?></td>
                                            <td><?php echo $fila[6] ?></td>
                                            <td><?php echo $fila[7] ?></td>

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
        $('#ingresos').dataTable({
            "ordering": true,
            "info": false
        });
    });
</script>