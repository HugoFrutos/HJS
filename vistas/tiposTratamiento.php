<link href="../assets/plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css" />

<?php
session_start();

if (!isset($_SESSION['rol'])) {

    header('location: ../index.php');
}
require 'header.php';
?>



    <!-- Modal ar -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Registrar tipo de tratamiento</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">

                        <div class="col-lg-12">
                            <form id="frmregistrar">
                                <label>Tipo de tratamiento</label>
                                <input type="text" class="form-control" id="txttipo" name="txttipo">
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
                    <h5 class="modal-title" id="exampleModalLabel">Editar tipo de tratamiento</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">

                        <div class="col-lg-12">
                            <form id="frmeditar">
                                <label>Tipo de tratamiento(*)</label>
                                <input type="text" class="form-control" id="txttipoe" name="txttipoe">
                            </form>
                        </div>

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
                            <h1 class="main-title float-left">Tipos de tratamientos</h1>
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
                                    <td>Tipo de tratamiento</td>
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

            "language":{
                "url": "https://cdn.datatables.net/plug-ins/1.13.4/i18n/es-ES.json"
            },

            "ajax": {
                "url": "../procesos/tiposTratamiento/mostrar.php",
                "type": "GET"
                //"crossDomain": "true",
                //"dataType": "json",
                //"dataSrc":""
            },
            "columns": [{
                    "data": "idTipoTratamiento"
                },
                {
                    "data": "tipoTratamiento"
                },
                {
                    sTitle: "Eliminar",
                    mDataProp: "idTipoTratamiento",
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
                    mDataProp: "idTipoTratamiento",
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
                        url: "../procesos/tiposTratamiento/traer.php",
                        data: 'idTipoTratamiento=' + id
                    }).done(function(msg) {
                        var dato = JSON.parse(msg);
                        $('#txttipoe').val(dato['tipoTratamiento']);

                        $('#btneditar').unbind().click(function() {

                            vacios = validarFormVacio('frmeditar');


                            if (vacios <= 0) {

                                tipotratamiento = $("#txttipoe").val();
                                oka = {
                                    "txttipoe": tipotratamiento,
                                    "idTipoTratamiento": id,
                                };
                                //alert(oka);
                                //alert(JSON.stringify(oka));
                                $.ajax({
                                    method: "POST",
                                    //contentType: 'application/json; charset=utf-8',
                                    url: "../procesos/tiposTratamiento/editar.php",
                                    data: oka
                                }).done(function(msg) {
                                    alertify.success("Tipo de tratamiento editado correctamente");
                                    table.ajax.reload();
                                });

                            } else {
                                alertify.error("Complete los datos");
                            }

                        });
                    });
                    break;
                case "Eliminar":

                    alertify.confirm('Tipo de tratamiento', '¿Esta seguro que desea eliminar este tipo de tratamiento?', function() {
                        $.ajax({
                            type: "POST",
                            url: "../procesos/tiposTratamiento/eliminar.php",
                            data: "id=" + id
                        }).done(function(msg) {
                            alertify.success("Tipo de tratamiento eliminado correctamente");
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
                    url: '../procesos/tiposTratamiento/registrar.php',
                    data: datos,
                    success: function(r) {

                        if (r == 1) {
                            alertify.success("Tipo de tratamiento registrado correctamente");
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