<?php

session_start();

if (!isset($_SESSION['rol'])) {

    header('location: ../index.php');
}
require 'header.php';


?>

<!-- BEGIN CSS for this page -->
<link href="../assets/plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css" />


<!-- Modal -->
<div class="modal fade" id="exampleModal" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Registrar Paciente</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="frmpaciente">
                    <div class="row">

                        <label>Nombre (*)</label>
                        <input type="text" class="form-control" id="txtnombre" name="txtnombre">
                        <label>Apellido (*)</label>
                        <input type="text" class="form-control" id="txtapellido" name="txtapellido">
                        <label>Número de cédula (*)</label>
                        <input type="number" class="form-control" id="txtcedula" name="txtcedula">
                        <label>Número de teléfono (*)</label>
                        <input type="number" class="form-control" id="txttelefono" name="txttelefono">

                </form>
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
<div class="modal fade" id="exampleModal2" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Editar Paciente</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="frmpacientee">
                    <div class="row">

                        <label>Nombre (*)</label>
                        <input type="text" class="form-control" id="txtnombree" name="txtnombree">
                        <label>Apellido (*)</label>
                        <input type="text" class="form-control" id="txtapellidoe" name="txtapellidoe">
                        <label>Número de cédula (*)</label>
                        <input type="number" class="form-control" id="txtcedulae" name="txtcedulae">
                        <label>Número de teléfono (*)</label>
                        <input type="text" class="form-control" id="txttelefonoe" name="txttelefonoe">
                </form>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
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
                        <h1 class="main-title float-left">Pacientes</h1>
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
                                <td>Nro Cédula</td>
                                <td>Nombre</td>
                                <td>Apellido</td>
                                <td>Teléfono</td>
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
?>


<script>
    $(document).ready(function() {

        var table = $('#myTable').DataTable({

            "language": {
                "url": "https://cdn.datatables.net/plug-ins/1.13.4/i18n/es-ES.json"
            },

            "ajax": {
                "url": "../procesos/pacientes/mostrar.php",
                "type": "GET"
                //"crossDomain": "true",
                //"dataType": "json",
                //"dataSrc":""
            },

            "columns": [{
                    "data": "idPaciente"
                },
                {
                    "data": "nroCedula"
                },
                {
                    "data": "nombrePaciente"
                },
                {

                    "data": "apellidoPaciente"
                },
                {
                    "data": "nroTelefonoPaciente"
                },
                {
                    sTitle: "Eliminar",
                    mDataProp: "idPaciente",
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
                    mDataProp: "idPaciente",
                    sWidth: '7%',
                    orderable: false,
                    render: function(data) {
                        acciones = `<button id="` + data + `" value="Traer" class="fa fa-pencil-square-o btn btn-primary accionesTabla" data-toggle="modal" data-target="#exampleModal2" type="button"  >
                                    
                                </button>`;
                        return acciones
                    }
                },
                /*
                            {
                                sTitle: "Ver tratamientos",
                                mDataProp: "idPaciente",
                                sWidth: '7%',
                                orderable: false,
                                render: function(data) {
                                    acciones = `<button id="` + data + `" value="Ver" class="fa fa-pencil-square-o btn btn-primary accionesTabla" data-toggle="modal" data-target="#exampleModal2" type="button"  >
                                                    
                                                </button>`;
                                    return acciones
                                }
                            },*/
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
                        url: "../procesos/pacientes/traer.php",
                        data: 'idPaciente=' + id
                    }).done(function(msg) {
                        var dato = JSON.parse(msg);

                        $('#txtnombree').val(dato['nombrePaciente']);
                        $('#txtapellidoe').val(dato['apellidoPaciente']);
                        $('#txtcedulae').val(dato['nroCedula']);
                        $('#txttelefonoe').val(dato['nroTelefonoPaciente']);



                        $('#btneditar').unbind().click(function() {
                            vacios = validarFormVacio('frmpacientee');


                            if (vacios <= 0) {
                                nombrePaciente = $("#txtnombree").val();
                                apellidoPaciente = $("#txtapellidoe").val();
                                nroCedula = $("#txtcedulae").val();
                                nroTelefonoPaciente = $("#txttelefonoe").val();
                                oka = {
                                    "txtnombree": nombrePaciente,
                                    "idPaciente": id,
                                    "txtapellidoe": apellidoPaciente,
                                    "txtcedulae": nroCedula,
                                    "txttelefonoe": nroTelefonoPaciente,
                                };
                                //alert(oka);
                                //alert(JSON.stringify(oka));
                                $.ajax({
                                    method: "POST",
                                    //contentType: 'application/json; charset=utf-8',
                                    url: "../procesos/pacientes/editar.php",
                                    data: oka
                                }).done(function(msg) {
                                    alertify.success("Paciente editado correctamente");
                                    table.ajax.reload();
                                });

                            } else {
                                alertify.error("Complete los datos");
                            }

                        });
                    });
                    break;
                case "Eliminar":

                    alertify.confirm('Paciente', '¿Esta seguro que desea eliminar este paciente?', function() {
                        $.ajax({
                            type: "POST",
                            url: "../procesos/pacientes/eliminar.php",
                            data: "id=" + id
                        }).done(function(msg) {
                            alertify.success("Paciente eliminado correctamente");
                            table.ajax.reload();
                        });
                    }, function() {

                    });
                    break;
                    /*
                                case "Ver":
                                    $.ajax({
                                        type: "POST",
                                        url: "../procesos/pacientes/verTratamientos.php",
                                        data: "id=" + id
                                    }).done(function(msg) {
                                        table.ajax.reload();
                                    });
                                break;*/

                default:
                    alert("No existe el valor");
                    break;
            }
        });



        $('#btnregistrar').click(function() {
            vacios = validarFormVacio('frmpaciente');
            if (vacios <= 0) {
                datos = $('#frmpaciente').serialize();
                $.ajax({
                    type: 'post',
                    url: '../procesos/pacientes/registrar.php',
                    data: datos,
                    success: function(r) {

                        if (r == 1) {
                            alertify.success("Paciente registrado correcamente");
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