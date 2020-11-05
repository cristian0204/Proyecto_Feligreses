@extends('layouts.admin')

@section('contenido')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">

<link rel="stylesheet" href="js/sweetalert2.min.css">

<link rel="stylesheet" href="css/datapicker/datepicker3.css">

<link rel="stylesheet" href="css/modals.css">

<link rel="stylesheet" href="css/chosen/bootstrap-chosen.css" />

<script src="jquery-3.2.1.min.js"></script>

<script src="js/chosen/chosen.jquery.min.js"></script>

<script src="js/chosen/chosen.jquery.js"></script>

<style type="text/css">
    @media (min-width: 768px) {
        #modal-content {
            -webkit-box-shadow: 0 2px 3px rgba(0, 0, 0.125);
            box-shadow: 0 2px 3px rgba(0, 0, 0, 0.125);
            width: 150%;
            top: 5%;
            left: -23%;
            margin-top: 5%;
        }
    }
</style>
 

<div class="breadcome-area">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="breadcome-list">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <ul class="breadcome-menu">
                                <li><a href="/">Inicio</a> <span class="bread-slash">/</span>
                                </li>
                                <li><span class="bread-blod">Consultar Asistencia a Evento</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>            
    </div>
</div>

@if(Auth::User()->can('consultarAsistencia'))
            <div class="modal-body">                 
                <div class="row">
                    <form autocomplete="off">

                        <div class="col-lg-12" >
                            <div class="col-lg-12" style="text-align: left;">
                                <div class="form-group">
                                    <h1>Buscar</h1>
                                    <label for="nombre">Evento</label>
                                        <select class="form-control" id="evento" name="evento" >   
                                            <option value="0">Seleccione un evento</option>
                                                @foreach ($evento as $evento)
                                   			<option value="{{$evento->id}}">{{$evento->nombre}}</option>
                                   		        @endforeach 
                                        </select>
                                </div>
                            </div>                          
                        </div>

                        <div class="col-lg-12">
                            <div class="col-lg-12" >
                                <div class="form-group data-custon-pick" style="text-align: left;" id="data_3">
                                    <label> <h5>Fecha de evento</h5></label>
                                        <div class="input-group date">
                                             <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                                <input type="text" class="form-control" value="2019-01-23" name="fecha" id="fecha">
                                        </div>
                                </div>
                            </div>
                        </div>   
                    </form>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn-success btn btn-flat" onclick="Buscar()">Buscar</button>
            </div>
@endif
     
 <br> 

<!------------------------------------------------------------------------------------------------------------>
 <div class="breadcome-area">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div id="contenido">
                <table id="example" class="table table-striped table-bordered table-hover" style="width:100% ; margin: 1">
                    <thead>
                       
                       <th>Nombre Del Asistente</th>
                        <th>Evento</th>    
                        <th>Fecha</th>    
                      <th>Opciones</th> 
 
                    </thead>
                    <tbody>
                                           
                    </tbody>
                </table>
            </div>
            </div>
        </div>
    </div>
</div>

<!------------------------------------------------------------------------------------------------------------>


<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
<script src="js/sweetalert2.all.min.js"></script>
<script src="js/sweetalert2.min.js"></script>
<script src="js/datapicker/bootstrap-datepicker.js"></script>
<script src="js/datapicker/datepicker-active.js"></script>
<script type="text/javascript" >

$('.chosen-select').chosen({width: "95%", no_results_text: "No se encontraron resultados! "});


</script>

<script type="text/javascript" >

    $('#example , #example1').DataTable({
        "language":{
            "url": "//cdn.datatables.net/plug-ins/1.10.19/i18n/Spanish.json"
        }
    });


function Buscar(){


    var token = "<?=csrf_token(); ?>";
            $.ajax({
                type:"POST",
                url: "consultar/consultar",
                data: {fecha: $("#fecha").val(), evento: $("#evento").val(), _token: token},
                success: function(result)   {
                    var tabla = "<table class=table table-striped table-bordered table-hover style=width:100% ; margin: 1><thead><th>Nombre</th><th>Evento</th><th>Fecha</th><th>Opciones</th></thead><tbody>";
                    $.each(result, function(i, item){
                        tabla = tabla + "<tr><td>"+item.feligres+" "+item.apellido+"</td><td>"+item.evento+"</td><td>"+item.fecha+"</td>@if(Auth::User()->can('eliminarAsistencia'))<td><button type=submit class=btn btn-danger onclick=eliminar("+item.id+")>Eliminar</button></td>@endif</tr>";
                    });
                    tabla = tabla + "</table>";
                    $('#contenido').html(tabla);
                },
                error: function(data){
                    console.log(data);
                    swal("Error","Se Ha Presentado Un Error En La Consola","error");
                }
            });
}



 function isValidDate(day,month,year)
    {
        var dteDate;
        month=month-1;
        dteDate=new Date(year,month,day);
        return ((day==dteDate.getDate()) && (month==dteDate.getMonth()) && (year==dteDate.getFullYear()));
    }
 
function validate_fecha(fecha)
    {
        var patron=new RegExp("^(19|20)+([0-9]{2})([-])([0-9]{1,2})([-])([0-9]{1,2})$");
        if(fecha.search(patron)==0)
        {
            var values=fecha.split("-");
            if(isValidDate(values[2],values[1],values[0]))
            {
                return true;
            }
        }
        return false;
    }


function guardar(){
        var res= validarcampos();

        if(res!=""){
            Swal(
                'Ops',
  'El siguientes campos es obligatorio: <br>'+res,
  'info'
);
        } 

        else{
            var token = "<?=csrf_token(); ?>";
            $.ajax({
                type:"POST",
                url: "asistencia/guardar",
                data: {persona: $("#persona").val(), fecha: $("#fecha").val(), evento: $("#evento").val(), _token: token},
                success: function(result)   {
                    if(result=="1"){
                        swal("Error","Se Ha Presentado Un Error "+result,"error");                         
                     }else if(result==2){
                         swal("Ops","Este Algo anda mal","info");
                     }
                     else{
                        swal("Se Ha Registrado Correctamente La Asistencia Al Evento","","success").then((value)=>{
                            location.reload();
                        }); 
                     }
                },
                error: function(data){
                    console.log(data);
                    swal("Error","Se Ha Presentado Un Error En La Consola","error");
                }
            });
        }
    }

function validarcampos(){
        var mensaje = '';
        if($("#fecha").val()==""){
            mensaje += '<br>Fecha Del Evento';
        }
        if($("#evento").val()=="0"){
            mensaje += '<br>Evento';
        }

        if($("#persona").val()==""){
            mensaje += '<br>Asistencia "Almenos un asistente a este evento de lo contrario es mejor no hacer ningun registro"';
        } 

        return mensaje;
}

function eliminar(id){
Swal.fire({
  title: 'Estás seguro?',
  text: "No podrás revertir esto!",
  type: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Sí, bórralo!',
}).then((result) => {
  if (result.value) {
    var token = "<?=csrf_token(); ?>";
    $.ajax({
                type:"GET",
                url: "/consultar/delete/"+id,  
                success: function(result){
                    if(result==0){
                        swal("Se Ha Eliminado Correctamente","","success").then((value)=>{
                            location.reload();
                        });
                    }else{
                        swal("Error","Se Ha Presentado Un Error de Dato","error");

                    }
                },
                error: function(data){
                    console.log(data);
                    swal("Error","No se puede eliminar por integridad de datos","error");
                }
            });
  }
})
}




</script>


@endsection
