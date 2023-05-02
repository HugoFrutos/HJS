		        		<!-- BEGIN CSS for this page -->
                        <link href="../assets/plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css"/>
<?php
require 'header.php';

if(isset($_SESSION['usuario']))
{



?>



<!-- Modal -->
<div class="modal fade" id="exampleModal"  role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Registrar Gasto</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <form id="frmgasto">
        <div class="row">
           
            <label>Tipo (*)</label>
            <select id="txttipo" name="txttipo" class="form-control js-example-basic-single">
                        <option value="A">Seleccione</option>
                            <?php
                                require_once '../clases/TipoGasto.php';
                                require_once '../clases/Conexion.php';
                                $obj1 = new TipoGasto();
                                $tipoGasto = $obj1->mostrar();
                                while($pro=mysqli_fetch_row($tipoGasto))
                                {
                            ?>
                        <option value="<?php echo $pro[0] ?>" ><?php echo $pro[1] ?></option>
                            <?php
                                }      
                                ?>
            </select><br>
            <label>Monto (*)</label>
            <input type="number" class="form-control" id="txtmontogasto" name="txtmontogasto">
            <label>Fecha (*)</label>
            <input type="date" class="form-control" id="txtfechagasto" name="txtfechagasto">
            <label>Observación</label>
            <input type="text" class="form-control" id="txtObs" name="txtObs">
           
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
<div class="modal fade" id="exampleModal2"  role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Editar Gasto</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
<div class="modal-body">
       <form id="frmgastoe">
        <div class="row">
           
            <label>Tipo (*)</label>
            <select id="txttipoe" name="txttipoe" class="form-control js-example-basic-single">
                        <option value="A">Seleccione</option>
                            <?php
                                require_once '../clases/TipoGasto.php';
                                require_once '../clases/Conexion.php';
                                $obj1 = new TipoGasto();
                                $tipoGasto = $obj1->mostrar();
                                while($pro=mysqli_fetch_row($tipoGasto))
                                {
                            ?>
                        <option value="<?php echo $pro[0] ?>" ><?php echo $pro[1] ?></option>
                            <?php
                                }      
                                ?>
            </select><br>
            <label>Monto (*)</label>
            <input type="number" class="form-control" id="txtmontogastoe" name="txtmontogastoe">
            <label>Fecha(*)</label>
            <input type="date" class="form-control" id="txtfechagastoe" name="txtfechagastoe">
            <label>Observación</label>
            <input type="text" class="form-control" id="txtObse" name="txtObse">            
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
                                                <h1 class="main-title float-left">Gastos</h1>
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
                                    <td>Tipo</td>
                                    <td>Monto</td>
                                    <td>Fecha</td>
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
    /*
    $('#txttipo').select2({
        dropdownParent: $("#exampleModal .modal-content")
    });
    $('#txtmonto').select2({
        dropdownParent: $("#exampleModal .modal-content")
    });
    $('#txtfecha').select2({
        dropdownParent: $("#exampleModal2 .modal-content")
    });
    $('#txtobservacion').select2({
        dropdownParent: $("#exampleModal2 .modal-content")
    });*/
    
    var table = $('#myTable').DataTable({
        "ajax":{
            "url":"../procesos/gastos/mostrar.php",
            "type":"GET"
            //"crossDomain": "true",
            //"dataType": "json",
            //"dataSrc":""
        },
        "columns":[
            {
                "data":"idGasto"
            },
            {
                "data":"idTipoGasto"
            },
            {
                
                "data":"montoGasto"
            },
            {
                
                "data":"fechaGasto"
            },
            {
                
                "data":"observacionGasto"
            },  
            {
                    sTitle: "Eliminar",
                    mDataProp: "idGasto",
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
                mDataProp: "idGasto",
                sWidth: '7%',
                orderable: false,
                render: function(data) {
                    acciones = `<button id="` + data + `" value="Traer" class="fa fa-pencil-square-o btn btn-primary accionesTabla" data-toggle="modal" data-target="#exampleModal2" type="button"  >
                                    
                                </button>`;
                    return acciones
                }
            },
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
                        url : "../procesos/gastos/traer.php",
                        data:'idGasto='+id
                    }).done(function(msg) {
                        var dato=JSON.parse(msg);
                        
				        $('#txtmontogastoe').val(dato['montoGasto']);
                        $('#txtfechagastoe').val(dato['fechaGasto']);
                        $('#txtObse').val(dato['observacionGasto']);
                        $('#txttipoe').val(dato['tiposGasto_idTipoGasto']);

                           
                        
                        $('#btneditar').unbind().click(function(){
                            vacios = validarFormVacio('frmgastoe');
                            
                            
                            if(vacios <= 0)
                                {
                            tipo = $("#txttipoe").val();
                            monto = $("#txtmontogastoe").val();
                            fecha = $("#txtfechagastoe").val();
                            observacion = $("#txtObse").val();
                            
                             oka = {
						                "txttipoe" : tipo , "idGasto" : id,
                                        "txtmontogastoe" : monto, "txtfechagastoe" : fecha,
                                        "txtObse" : observacion, 
                                };
                            //alert(oka);
                            //alert(JSON.stringify(oka));
                            $.ajax({
                                method : "POST",
                                //contentType: 'application/json; charset=utf-8',
                                url : "../procesos/gastos/editar.php",
                                data : oka
                                }).done(function(msg) {
                                alertify.success("Gasto Editado Correctamente!");
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

                alertify.confirm('Gasot', '¿Esta seguro que desea eliminar este gasto?', function() {
                    $.ajax({
                        type: "POST",
                        url: "../procesos/gastos/eliminar.php",
                        data: "id=" + id
                    }).done(function(msg) {
                        alertify.success("Gasto eliminado correctamente");
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
    
    
    
    $('#btnregistrar').click(function(){
        vacios = validarFormVacio('frmgasto');
        if(vacios <= 0 )
            {
            datos=$('#frmgasto').serialize();
            $.ajax({
               type:'post',
                url:'../procesos/gastos/registrar.php',
                data:datos,
                success:function(r)
                {
                    
                    if(r==1)
                        {
                            alertify.success("Gasto registrado correcamente");
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
