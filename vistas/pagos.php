<?php
require 'header.php';

if(isset($_SESSION['usuario']))
{



?>



<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Registrar Ingreso</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form id="frmregistrar">
            <div class="row">
                <label>Paciente</label>
                <form action="buscar.php" method="post">
                    <label for="nombrePaciente">Nombre:</label>
                    <input type="text" name="nombrePaciente" id="nombrePaciente"><br>
                    <input type="submit" value="Buscar">
	            </form>         
                <button type="submit">Buscar</button>
                <label>Tratamiento</label>
                <select id="txttratamiento" name="txttratamiento" class="form-control">
                        <option value="A">Seleccione</option>
                            <?php
                                require_once '../clases/Tratamiento.php';
                                require_once '../clases/Conexion.php';
                                $obj1 = new Tratamiento();
                                $Tratamiento = $obj1->mostrar();
                                while($pro=mysqli_fetch_row($Tratamiento))
                                {
                                    ?>
                                    <option value="<?php echo $pro[0] ?>" ><?php echo $pro[5] ?></option>
                                    <?php
                                }      
                                    ?>
                </select><br>
                <label>Débito</label>
                <input type="number" class="form-control" id="txtdebito" name="txtdebito">
                <label>Crédito</label>
                <input type="number" class="form-control" id="txtcredito" name="txtcredito">
                <label>Saldo</label>
                <input type="number" class="form-control" id="txtsaldo" name="txtsaldo">
                
                <label>Observación</label>
                <input type="text" class="form-control" id="txtobservacion" name="txtobservacion">
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
<div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Editar Ingreso</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
        <form id="frmeditar">
                <label>Paciente</label>
                <select id="txtpacientee" name="txtpacientee" class="form-control">
                    <option value="A">Seleccione</option>
                        <?php
                            require_once '../clases/Paciente.php';
                            require_once '../clases/Conexion.php';
                            $obj1 = new Paciente();
                            $paciente = $obj1->mostrar();
                            while($pro=mysqli_fetch_row($paciente))
                            {
                                ?>
                                <option value="<?php echo $pro[0] ?>" ><?php echo $pro[2] ?></option>
                                <?php
                            }                              
                                ?>
                </select><br>
                <label>Tratamiento</label>
                <select id="txttratamientoe" name="txttratamientoe" class="form-control">
                        <option value="A">Seleccione</option>
                            <?php
                                require_once '../clases/Tratamiento.php';
                                require_once '../clases/Conexion.php';
                                $obj1 = new Tratamiento();
                                $Tratamiento = $obj1->mostrar();
                                while($pro=mysqli_fetch_row($Tratamiento))
                                {
                                    ?>
                                    <option value="<?php echo $pro[0] ?>" ><?php echo $pro[5] ?></option>
                                    <?php
                                }      
                                    ?>
                </select><br>
                <label>Débito</label>
                <input type="number" class="form-control" id="txtdebitoe" name="txtdebitoe">
                <label>Crédito</label>
                <input type="number" class="form-control" id="txtcreditoe" name="txtcreditoe">
                <label>Saldo</label>
                <input type="number" class="form-control" id="txtsaldoe" name="txtsaldoe">
                <label>Observación</label>
                <input type="text" class="form-control" id="txtobservacione" name="txtobservacione">
            </form>
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
                                                <h1 class="main-title float-left">Ingresos</h1>
                                                 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<button type="button"  class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
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
                        <table  id="myTable" class="table">
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
}
else {
	header("location:../index.php");  
}

?>


<script>
$(document).ready(function(){
    
    var table = $('#myTable').DataTable({
        "ajax":{
            "url":"../procesos/pagos/mostrar.php",
            "type":"GET"
            //"crossDomain": "true",
            //"dataType": "json",
            //"dataSrc":""
        },
        "columns":[
            {
                "data":"idPago"
            },
            {   
                "data":"idPaciente"
            },
            {   
                "data":"tipoTratamiento"
            },
            {   
                "data":"debito"
            },
            {   
                "data":"credito"
            },
            {   
                "data":"saldo"
            },
            {   
                "data":"fechaPago"
            },
            {   
                "data":"observacionPago"
            },  
            {
                    sTitle: "Eliminar",
                    mDataProp: "idPago",
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
                mDataProp: "idPago",
                sWidth: '7%',
                orderable: false,
                render: function(data) {
                    acciones = `<button id="` + data + `" value="Traer" class="fa fa-pencil-square-o btn btn-primary accionesTabla" data-toggle="modal" data-target="#exampleModal2" type="button"  >
                                    
                                </button>`;
                    return acciones
                }
            }
        ],
        responsive:true,
                "ordering": false


    });
    
$(document).on('click', '.accionesTabla', function() {
    var id = this.id;
    var val = this.value;

    switch (val) {
        case "Traer":
                    $.ajax({
                        method : "GET",
                        url : "../procesos/pagos/traer.php",
                        data:'idPago='+id
                    }).done(function(msg) {
                        var dato=JSON.parse(msg);
				        $('#txtpacientee').val(dato['pacientes_idPaciente']);
                        $('#txttratamientoe').val(dato['tratamientos_idTratamiento']);
                        $('#txtdebitoe').val(dato['debito']);
                        $('#txtcreditoe').val(dato['credito']);
                        $('#txtsaldoe').val(dato['saldo']);
                        $('#txtfechae').val(dato['fechaPago']);
                        $('#txtobservacione').val(dato['observacionPago']);
       
                        $('#btneditar').unbind().click(function(){
                            
                            vacios = validarFormVacio('frmeditar');
                                                       
                            if(vacios <= 0)
                                {
                            pacientes_idPaciente  = $("#txtpacientee").val();
                            tratamientos_idTratamiento = $("#txttratamientoe").val();
                            debito = $("#txtdebitoe").val();
                            credito = $("#txtcreditoe").val();
                            saldo = $("#txtsaldoe").val();
                            fechaPago = $("#txtfechae").val();
                            observacionPago = $("#txtobservacione").val();
                            oka = {
                                        "txtpacientee" : pacientes_idPaciente , "idPago" : id,
                                        "txttratamientoe" : tratamientos_idTratamiento, "txtdebitoe" : debito,
                                        "txtcreditoe" : credito, "txtsaldoe" : saldo, "txtfechae" : fechaPago,
                                        "txtobservacione" : observacionPago,
                                };
                            //alert(oka);
                            //alert(JSON.stringify(oka));
                            $.ajax({
                                method : "POST",
                                //contentType: 'application/json; charset=utf-8',
                                url : "../procesos/pagos/editar.php",
                                data : oka
                                }).done(function(msg) {
                                alertify.success("Pago editado correctamente");
                                table.ajax.reload();
                                });                               
                                    
                                }
                            else{
                                alertify.error("Complete los datos");
                            }

                        });
                    });
            break;
        case "Eliminar":
            
            alertify.confirm('Ingreso', '¿Esta seguro que desea eliminar este ingreso?', function()
                {
                        $.ajax({
                                type:"POST",
                                url : "../procesos/pagos/eliminar.php",
                                data : "id="+id
                            }).done(function(msg) {
                                alertify.success("Ingreso eliminado correctamente");
                                table.ajax.reload();
                            });
                }
                , function(){
                
                });
  
                    break;
        default:
            alert("No existe el valor");
            break;
    }
    });    
    
    
    
    $('#btnregistrar').click(function(){
        vacios = validarFormVacio('frmregistrar');
        if(vacios <= 0)
            {
            datos = $('#frmregistrar').serialize();
            $.ajax({
               type:'post',
                url:'../procesos/pagos/registrar.php',
                data: datos,
                success:function(r)
                {
                    
                    if(r==1)
                        {
                            alertify.success("Pago registrado correcamente");
                            table.ajax.reload();
                        }
                    else if(r==0)
                        {
                            alertify.error("No se pudo registrar");
                        }
                    else
                        {
                            alert(r);
                        }
                }
            });
            }
        else{
            alertify.error("Complete los datos");
        }
    });
});
</script>


