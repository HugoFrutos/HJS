<?php


    session_start();


if (!isset($_SESSION['rol'])) {
    header('location: ../index.php');
} else {
    if ($_SESSION['rol'] != 1) {
        header('location: ../index.php');
    }
}
require 'header.php';



?>

<link href="../assets/plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css" />


<!-- Modal ar -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Registrar usuario</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">

                    <div class="col-lg-12">
                        <form id="frmregistrar">
                            <label>Usuario</label>
                            <input type="text" class="form-control" id="txtusername" name="txtusername">
                            <label>Contraseña</label>
                            <input type="password" class="form-control" id="txtpassword" name="txtpassword">
                            <label>Nombre</label>
                            <input type="text" class="form-control" id="txtnombreUsuario" name="txtnombreUsuario">
                            <label>Apellido</label>
                            <input type="text" class="form-control" id="txtapellidoUsuario" name="txtapellidoUsuario">
                            <label>Tipo de usuario</label>
                            <select id="txttipoUsuario" name="txttipoUsuario" class="form-control">
                                <option value="A">Seleccione</option>
                                <?php
                                require_once '../clases/TipoUsuario.php';
                                require_once '../clases/Conexion.php';
                                $obj1 = new TipoUsuario();
                                $tipoUsuario = $obj1->mostrar();
                                while ($pro = mysqli_fetch_row($tipoUsuario)) {
                                ?>
                                    <option value="<?php echo $pro[0] ?>"><?php echo $pro[1] ?></option>
                                <?php
                                }
                                ?>
                            </select><br>
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
                <h5 class="modal-title" id="exampleModalLabel">Editar Usuario</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">

                    <div class="col-lg-12">
                        <form id="frmeditar">
                            <label>Usuario</label>
                            <input type="text" class="form-control" id="txtusernamee" name="txtusernamee">
                            <label>Contraseña</label>
                            <input type="password" class="form-control" id="txtpassworde" name="txtpassworde">
                            <label>Nombre</label>
                            <input type="text" class="form-control" id="txtnombreUsuarioe" name="txtnombreUsuarioe">
                            <label>Apellido</label>
                            <input type="text" class="form-control" id="txtapellidoUsuarioe" name="txtapellidoUsuarioe">
                            <label>Tipo de usuario</label>
                            <select id="txttipoUsuarioe" name="txttipoUsuarioe" class="form-control">
                                <option value="A">Seleccione</option>
                                <?php
                                require_once '../clases/TipoUsuario.php';
                                require_once '../clases/Conexion.php';
                                $obj1 = new TipoUsuario();
                                $tipoUsuario = $obj1->mostrar();
                                while ($pro = mysqli_fetch_row($tipoUsuario)) {
                                ?>
                                    <option value="<?php echo $pro[0] ?>"><?php echo $pro[1] ?></option>
                                <?php
                                }
                                ?>
                            </select><br>
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
                        <h1 class="main-title float-left">Usuarios</h1>
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
                                <td>Usuario</td>
                                <td>Contraseña</td>
                                <td>Nombre</td>
                                <td>Apellido</td>
                                <td>Tipo de usuario</td>
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
                "url": "../procesos/usuarios/mostrar.php",
                "type": "GET"
                //"crossDomain": "true",
                //"dataType": "json",
                //"dataSrc":""
            },
            "columns": [{
                    "data": "idUsuario"
                },
                {
                    "data": "username"
                },
                {
                    "data": "password"
                },
                {
                    "data": "nombreUsuario"
                },
                {
                    "data": "apellidoUsuario"
                },
                {
                    "data": "idTipoUsuario"
                },
                {
                    sTitle: "Eliminar",
                    mDataProp: "idUsuario",
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
                    mDataProp: "idUsuario",
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
                        url: "../procesos/usuarios/traer.php",
                        data: 'idUsuario=' + id
                    }).done(function(msg) {
                        var dato = JSON.parse(msg);
                        $('#txtusernamee').val(dato['username']);
                        $('#txtpassworde').val(dato['password']);
                        $('#txtnombreUsuarioe').val(dato['nombreUsuario']);
                        $('#txtapellidoUsuarioe').val(dato['apellidoUsuario']);
                        $('#txttipoUsuarioe').val(dato['tiposUsuario_idTipoUsuario']);

                        $('#btneditar').unbind().click(function() {

                            vacios = validarFormVacio('frmeditar');


                            if (vacios <= 0) {

                                username = $("#txtusernamee").val();
                                password = $("#txtpassworde").val();
                                nombreUsuario = $("#txtnombreUsuarioe").val();
                                apellidoUsuario = $("#txtapellidoUsuarioe").val();
                                tipousuario = $("#txttipoUsuarioe").val();
                                oka = {
                                    "txtusernamee": username,
                                    "idUsuario": id,
                                    "txtpassworde": password,
                                    "txtnombreUsuarioe": nombreUsuario,
                                    "txtapellidoUsuarioe": apellidoUsuario,
                                    "txttipoUsuarioe": tipousuario,

                                };
                                //alert(oka);
                                //alert(JSON.stringify(oka));
                                $.ajax({
                                    method: "POST",
                                    //contentType: 'application/json; charset=utf-8',
                                    url: "../procesos/usuarios/editar.php",
                                    data: oka
                                }).done(function(msg) {
                                    alertify.success("Usuario editado correctamente");
                                    table.ajax.reload();
                                });

                            } else {
                                alertify.error("Complete los datos");
                            }

                        });
                    });
                    break;
                case "Eliminar":

                    alertify.confirm('Usuario', '¿Esta seguro que desea eliminar este Usuario?', function() {
                        $.ajax({
                            type: "POST",
                            url: "../procesos/usuarios/eliminar.php",
                            data: "id=" + id
                        }).done(function(msg) {
                            alertify.success("Usuario eliminado correctamente");
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
                    url: '../procesos/usuarios/registrar.php',
                    data: datos,
                    success: function(r) {

                        if (r == 1) {
                            alertify.success("Usuario registrado correctamente");
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