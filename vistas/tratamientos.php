<link href="../assets/plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css" />

<?php
require 'header.php';

if (isset($_SESSION['usuario'])) {



?>



    <!-- Modal ar -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Registrar tratamiento</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">

                        <div class="col-lg-12">
                            <form id="frmregistrar">
                                <label>Tipo de tratamiento</label>
                                <select id="txttipotratamiento" name="txttipotratamiento" class="form-control">
                                    <option value="A">Seleccione</option>
                                    <?php
                                    require_once '../clases/TipoTratamiento.php';
                                    require_once '../clases/Conexion.php';
                                    $obj1 = new TipoTratamiento();
                                    $tipoTratamiento = $obj1->mostrar();
                                    while ($pro = mysqli_fetch_row($tipoTratamiento)) {
                                    ?>
                                        <option value="<?php echo $pro[0] ?>"><?php echo $pro[1] ?></option>
                                    <?php
                                    }
                                    ?>
                                </select><br>
                                <label>Paciente</label>
                                <select id="txtpaciente" name="txtpaciente" class="form-control">
                                    <option value="A">Seleccione</option>
                                    <?php
                                    require_once '../clases/Paciente.php';
                                    require_once '../clases/Conexion.php';
                                    $obj1 = new Paciente();
                                    $paciente = $obj1->mostrar();
                                    while ($pro = mysqli_fetch_row($paciente)) {
                                    ?>
                                        <option value="<?php echo $pro[0] ?>"><?php echo $pro[2] ?></option>
                                    <?php
                                    }

                                    ?>
                                </select><br>

                                <label>Fecha de inicio</label>
                                <input type="date" class="form-control" id="txtfechaInicio" name="txtfechaInicio">
                                <label>Fecha de próxima consulta</label>
                                <input type="date" class="form-control" id="txtProxCons" name="txtProxCons">
                                <label>Dientes</label>
                                <input type="text" class="form-control" id="txtdiente" name="txtdiente">
                                <label>Observación</label>
                                <input type="text" class="form-control" id="txtObs" name="txtObs">
                            </form>
                        </div>

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-primary" id="btnregistrar">Guardar</button>
                </div>
            </div>
        </div>
    </div>




    <!-- Modal -->
    <div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Editar Tratamiento</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">

                        <div class="col-lg-12">
                            <form id="frmeditar">
                                <label>Tipo de tratamiento(*)</label>
                                <select id="txttipotratamientoe" name="txttipotratamientoe" class="form-control js-example-basic-single">
                                    <option value="A">Seleccione</option>
                                    <?php
                                    require_once '../clases/TipoTratamiento.php';
                                    require_once '../clases/Conexion.php';
                                    $obj1 = new TipoTratamiento();
                                    $tipoTratamiento = $obj1->mostrar();
                                    while ($pro = mysqli_fetch_row($tipoTratamiento)) {
                                    ?>
                                        <option value="<?php echo $pro[0] ?>"><?php echo $pro[1] ?></option>
                                    <?php
                                    }
                                    ?>
                                </select><br>
                                <label>Paciente</label>
                                <select id="txtpacientee" name="txtpacientee" class="form-control js-example-basic-single">
                                    <option value="A">Seleccione</option>
                                    <?php
                                    require_once '../clases/Paciente.php';
                                    require_once '../clases/Conexion.php';
                                    $obj1 = new Paciente();
                                    $paciente = $obj1->mostrar();
                                    while ($pro = mysqli_fetch_row($paciente)) {
                                    ?>
                                        <option value="<?php echo $pro[0] ?>"><?php echo $pro[2] ?></option>
                                    <?php
                                    }

                                    ?>
                                </select><br>
                                <label>Fecha de inicio</label>
                                <input type="date" class="form-control" id="txtfechaInicioe" name="txtfechaInicioe">
                                <label>Próxima consulta</label>
                                <input type="date" class="form-control" id="txtProxConse" name="txtProxConse">
                                <label>Observacion</label>
                                <input type="text" class="form-control" id="txtObse" name="txtObse">
                                <label>Dientes</label>
                                <input type="text" class="form-control" id="txtdientee" name="txtdientee">
                            </form>
                        </div>

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" id="btneditar" class="btn btn-primary">Guardar</button>
                </div>
            </div>
        </div>
    </div>



    <div class="content-page">

        <!-- Start content -->
        <div class="content">

            <div class="container-fluid">

                <div class="row">
                    <div class="col-xl-12">
                        <div class="breadcrumb-holder">
                            <h1 class="main-title float-left">Tratamientos</h1>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                                Registrar
                            </button>
                            <div class="clearfix">

                            </div>
                        </div>
                    </div>
                </div>
                <!-- end row -->
                <div class="row">
                    <!-- Button trigger modal -->

                    <div class="col-lg-12">
                        <table id="myTable" class="table">
                            <thead>
                                <tr>
                                    <td>#</td>
                                    <td>Tipo</td>
                                    <td>Paciente</td>
                                    <td>Inicio</td>
                                    <td>Próxima consulta</td>
                                    <td>Observacion</td>
                                    <td>Dientes</td>
                                    <td></td>
                                    <td></td>
                                </tr>
                            </thead>
                            <tbody>

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

        var table = $('#myTable').DataTable({
            "ajax": {
                "url": "../procesos/tratamientos/mostrar.php",
                "type": "GET"
                //"crossDomain": "true",
                //"dataType": "json",
                //"dataSrc":""
            },
            "columns": [{
                    "data": "idTratamiento"
                },
                {
                    "data": "idTipoTratamiento"
                },
                {
                    "data": "idPaciente"
                },
                {
                    "data": "fechaInicio"
                },
                {
                    "data": "fechaProxConsulta"
                },
                {
                    "data": "observacionTratamiento"
                },
                {
                    "data": "dientes"
                },
                {
                    sTitle: "Eliminar",
                    mDataProp: "idTratamiento",
                    sWidth: '7%',
                    orderable: false,
                    render: function(data) {
                        acciones = `<button id="` + data + `" value="Eliminar"  type="button" class="fa fa-times btn btn-danger accionesTabla" >
                                        
                                    </button>`;
                        return acciones
                    }
                },
                {
                    sTitle: "Editar",
                    mDataProp: "idTratamiento",
                    sWidth: '7%',
                    orderable: false,
                    render: function(data) {
                        acciones = `<button id="` + data + `" value="Traer" class="fa fa-pencil-square-o btn btn-primary accionesTabla" data-toggle="modal" data-target="#exampleModal2" type="button"  >
                                    
                                </button>`;
                        return acciones
                    }
                }
            ],
            responsive: true,
            "ordering": true


        });

        $(document).on('click', '.accionesTabla', function() {
            var id = this.id;
            var val = this.value;

            switch (val) {
                case "Traer":
                    $.ajax({
                        method: "GET",
                        url: "../procesos/tratamientos/traer.php",
                        data: 'idTratamiento=' + id
                    }).done(function(msg) {
                        var dato = JSON.parse(msg);
                        $('#txttipotratamientoe').val(dato['tiposTratamiento_idTipoTratamiento']);
                        $('#txtpacientee').val(dato['tratamientos_idPaciente']);
                        $('#txtfechaInicioe').val(dato['fechaInicio']);
                        $('#txtProxConse').val(dato['fechaProxConsulta']);
                        $('#txtObse').val(dato['observacionTratamiento']);
                        $('#txtdientee').val(dato['dientes']);

                        $('#btneditar').unbind().click(function() {

                            vacios = validarFormVacio('frmeditar');


                            if (vacios <= 0) {

                                tipotratamiento = $("#txttipotratamientoe").val();
                                paciente = $("#txtpacientee").val();
                                fechaInicio = $("#txtfechaInicioe").val();
                                proxCon = $("#txtProxConse").val();
                                obse = $("#txtObse").val();
                                diente = $("#txtdientee").val();

                                oka = {
                                    "txttipotratamientoe": tipotratamiento,
                                    "idTratamiento": id,
                                    "txtpacientee": paciente,
                                    "txtfechaInicioe": fechaInicio,
                                    "txtProxConse": proxCon,
                                    "txtObse": obse,
                                    "txtdientee": diente,
                                };
                                //alert(oka);
                                //alert(JSON.stringify(oka));
                                $.ajax({
                                    method: "POST",
                                    //contentType: 'application/json; charset=utf-8',
                                    url: "../procesos/tratamientos/editar.php",
                                    data: oka
                                }).done(function(msg) {
                                    alertify.success("Tratamiento editado correctamente");
                                    table.ajax.reload();
                                });

                            } else {
                                alertify.error("Complete los datos");
                            }

                        });
                    });
                    break;
                case "Eliminar":

                    alertify.confirm('Tratamiento', '¿Esta seguro que desea eliminar este tratamiento?', function() {
                        $.ajax({
                            type: "POST",
                            url: "../procesos/tratamientos/eliminar.php",
                            data: "id=" + id
                        }).done(function(msg) {
                            alertify.success("Tratamiento eliminado correctamente");
                            table.ajax.reload();
                        });
                    }, function() {

                    });
                    break;
                default:
                    alert("No existe el valor");
                    break;
            }
        });



        $('#btnregistrar').click(function() {
            vacios = validarFormVacio('frmregistrar');
            if (vacios <= 0) {
                datos = $('#frmregistrar').serialize();
                $.ajax({
                    type: 'post',
                    url: '../procesos/tratamientos/registrar.php',
                    data: datos,
                    success: function(r) {

                        if (r == 1) {
                            alertify.success("Tratamiento registrado correctamente");
                            table.ajax.reload();
                        } else if (r == 0) {
                            alertify.error("No se pudo registrar");
                        } else {
                            alert(r);
                        }
                    }
                });
            } else {
                alertify.error("Complete los datos");
            }
        });
    });
</script>