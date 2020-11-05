@extends('layouts.admin')

@section('contenido')

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">

<link rel="stylesheet" href="css/modals.css">

<link rel="stylesheet" href="css/datapicker/datepicker3.css">

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
                                <li><span class="bread-blod">Evento</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
            <div class="row">
                @if(Auth::User()->can('crearEvento')) 
                 <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                     Evento <a class="btn btn-success bnt-xs" href="#" data-toggle="modal" data-target="#PrimaryModalalert1">Agregar</a>
                 </div>@endif
            </div>

            <br>
    </div>
</div>

<div class="breadcome-area">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <table id="example" class="table table-striped table-bordered" style="width:100% ; margin: 1">
                    <thead>
                        <th>Evento</th>
                        <th>Descripción Del Evento</th>
                        <th>Opciones</th>
                    </thead>
                    <tbody>
                        @foreach ($evento as $evento)
                            <tr>
                                <td>{{$evento->nombre}}</td>
                                <td>{{$evento->descripcion}}</td>
                            <th>
                                     @if(Auth::User()->can('eliminaEvento')) 
                                     <button class="fa fa-trash-o btn-danger btn-sm" type="submit" data-toggle="modal" data-target="" onclick="eliminar({{$evento->id}})"></button>@endif
                                   
                                      @if(Auth::User()->can('editarEvento')) 
                                      <button class="fa fa-pencil-square-o  btn-info btn-sm" class="btn btn-success bnt-xs" href="#" data-toggle="modal" data-target="#Modal2" aria-hidden onclick="editar({{ 
                                        $evento->id}})"></button> @endif
                                </th>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<div id="PrimaryModalalert1" class="modal modal-edu-general default-popup-PrimaryModal fade" role="dialog" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog">
        <div class="modal-content" id="modal-content">
            <div class="modal-close-area modal-close-df">
                <a class="close" data-dismiss="modal" href="#"><i class="fa fa-close"></i></a>
            </div>
            <div class="modal-body">
                <center> <h4>Crear evento</h4>  </center>   
                <div class="row">
                    <form autocomplete="off">
                        <div class="col-lg-12">
                              <div class="col-lg-12">
                                <div class="form-group" style="text-align: left;">
                                    <label for="nombre">Nombre de evento</label>
                                    <input type="text" name="evento" class="form-control" id="evento" placeholder="Nombre" onkeypress="return soloLetras(event)">
                                </div>
                            </div>
                        </div>                       
                      <div class="col-lg-12">
                            <div class="col-lg-12">
                                <div class="form-group" style="text-align: left;">
                                    <label for="nombre">Descripción del evento</label>
                                    <textarea name="desc" class="form-control" id="desc" placeholder="Descripción del evento" rows="5" style="resize: none;" onkeypress="return soloLetras(event)"></textarea>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn-success btn btn-flat" onclick="guardar()">Guardar</button>
            </div>
        </div>
    </div>
</div>

<div id="Modal2" class="modal modal-edu-general default-popup-PrimaryModal fade" role="dialog" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog">
        <div class="modal-content" id="modal-content">
            <div class="modal-close-area modal-close-df">
                <a class="close" data-dismiss="modal" href="#"><i class="fa fa-close"></i></a>
            </div>
            <div class="modal-body">
                <center> <h4>Editar Evento</h4>  </center>   
                <div class="row">
                     <form autocomplete="off" id="frm_add1" action="modificar" method="POST"> 
                    {{ csrf_field() }} 
                        <div class="col-lg-12">
                            <div class="col-lg-12">
                                <div class="form-group" style="text-align: left;">
                                    <label for="nombre">Evento</label>
                                    <input type="text" name="evento1" class="form-control" id="evento1" placeholder="" onkeypress="return soloLetras(event)">
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-12">
                            <div class="col-lg-12">
                                <div class="form-group" style="text-align: left;">
                                    <label for="nombre">Descripción del evento</label>
                                    <textarea name="desc1" class="form-control" id="desc1" placeholder="Descripción" rows="5" style="resize: none;" onkeypress="return soloLetras(event)"></textarea>
                                </div>
                            </div>
                        </div>
                        <input type="hidden" id="id">
                    </form>
                </div>
            </div>
            <div class="modal-footer">
                                
                <button  class="btn-success btn btn-flat" onclick="modificar()" >Guardar</button>
                
            </div>
        </div>
    </div>
</div>

 
 <script type="text/javascript" language="javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script>

<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>

<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>

<script src="js/sweetalert2.all.min.js"></script>


<script src="js/sweetalert2.min.js"></script>

<link rel="stylesheet" href="js/sweetalert2.min.css">

<script type="text/javascript" >
        $('#example').DataTable({
        "language":{
            "url": "//cdn.datatables.net/plug-ins/1.10.19/i18n/Spanish.json"
        }
    });


   function editar(id){     
        $.ajax({
                type:"get",
                url: "evento/consultar/"+id,
                success: function(result){
                    $.each(result,function(i,item){
                        $("#evento1").val(item.nombre);
                        $("#desc1").val(item.descripcion);
                        $("#id").val(item.id);
                    })
                },
              
            });
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
                url: "/evento/delete/"+id,  
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


function guardar(){
        var res= validarcampos();

        if(res!=""){
            Swal(
                'Error',
  'El siguientes campos es obligatorio: <br>'+res,
  'error'
);
        }

        else{
            var token = "<?=csrf_token(); ?>";
            $.ajax({
                type:"POST",
                url: "evento/guardar",
                data: {nombre: $("#evento").val(), descripcion: $("#desc").val(), _token: token},
                success: function(result){
                    if(result=="1"){
                        swal("Error","Se Ha Presentado Un Error "+result,"error");                         
                     }else if(result==2){
                         swal("Ops","Este Evento ya existe","info");
                     }
                     else{
                        swal("Se Ha Registrado Correctamente","","success").then((value)=>{
                            location.reload();
                        }); 
                     }
                },
                error: function(data){
                    console.log(data);
                    swal("Error","Se Ha Presentado Un Error","error");
                }
            });
        }
    }

function modificar(){
        var res= validarcampos1();
        if(res!=""){
            Swal(
                'Error',
                'El siguientes campos es obligatorio: <br>'+res,
                'error'
            );
        }else{
          var token = "<?=csrf_token(); ?>";
            $.ajax({
                type:"POST",
                url: "evento/modificar",
                data: {nombre: $("#evento1").val(), descripcion: $("#desc1").val(), _token: token, id:$("#id").val()},
                           
                success: function(result){
                    if(result==0){
                        swal("Se Ha Modificado Correctamente","","success").then((value)=>{
                            location.reload();
                        });
                    }else{
                        swal("Error","Se Ha Presentado Un Error","error");

                    }
                },
                error: function(data){
                    console.log(data);
                    swal("Error","Se Ha Presentado Un Error de Dato","error");
                }
            });
        }
    }




/******* VALIDAR LOS CAMPOS DE SOLO LETRAS***/
function soloLetras(e){
       key = e.keyCode || e.which;
       tecla = String.fromCharCode(key).toLowerCase();
       letras = " áéíóúabcdefghijklmnñopqrstuvwxyz";
       especiales = "8-37-39-46";

       tecla_especial = false
       for(var i in especiales){
            if(key == especiales[i]){
                tecla_especial = true;
                break;
            }
        }
        if(letras.indexOf(tecla)==-1 && !tecla_especial){
            return false;
        }
    }

function validarcampos(){
        var mensaje = '';
        if($("#evento").val()==""){
            mensaje += '<br>Nombre del evento';
        }
          if($("#desc").val()==""){
            mensaje += '<br>Descripción del evento';
        }        
        return mensaje;
    }

    function validarcampos1(){
        var mensaje = '';
        if($("#evento1").val()==""){
            mensaje += '<br>Nombre del evento';
        }
          if($("#desc1").val()==""){
            mensaje += '<br>Descripción del evento ';
        }        
        return mensaje;
    }


</script>

@endsection