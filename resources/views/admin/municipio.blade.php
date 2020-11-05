@extends('layouts.admin')

@section('contenido')
<link rel="stylesheet" href="js/sweetalert2.min.css">
<link rel="stylesheet" href="css/datapicker/datepicker3.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="css/modals.css">
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
                                <li><span class="bread-blod">Municipio</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
          <div class="row">
               
                @if(Auth::User()->can('crearMunicipio'))
                 <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                     Municipio <a class="btn btn-success bnt-xs" href="#" data-toggle="modal" data-target="#PrimaryModalalert1">Agregar</a>
                 </div>
                 @endif

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
                        <th>País</th>
                        <th>Departamento</th>
                        <th>Municipio</th>
                        <th>Opciones</th>
                    </thead>
                    <tbody>
                        @foreach ($municipio as $municipio)
                            <tr>
                                <td>{{$municipio->pais}}</td>
                                <td>{{$municipio->departamento}}</td>
                                <td>{{$municipio->nombre}}</td>
                                
                                 <th>
                                    
                                    @if(Auth::User()->can('crearMunicipio'))
                                     <button class="fa fa-trash-o btn-danger btn-sm" type="submit" data-toggle="modal" data-target="" onclick="eliminar({{$municipio->id}})"></button>
                                     @endif

                                    @if(Auth::User()->can('crearMunicipio'))
                                    <button class="fa fa-pencil-square-o  btn-info btn-sm" class="btn btn-success bnt-xs" href="#" data-toggle="modal" data-target="#Modal2" aria-hidden onclick="editar({{ 
                                            $municipio->id}} )"></button>
                                    @endif
                                    
                                </th>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

        <div id="PrimaryModalalert1" class="modal modal-edu-general default-popup-PrimaryModal fade"   role="dialog" data-backdrop="static" data-keyboard="false">
            <div class="modal-dialog">
                <div class="modal-content" id="modal-content">
                    <div class="modal-close-area modal-close-df">
                        <a class="close" data-dismiss="modal" href="#"><i class="fa fa-close"></i></a>
                    </div>
                        <div class="modal-body">
                            <center> <h4>Desea Agregar Otro Municipio</h4>  </center>   
                            <div class="row">
                                <form autocomplete="off">
                                    <div class="col-lg-12">
                                        <div class="col-lg-4" style="text-align: left;">
                                            <div class="form-group">
                                                <label for="nombre">País</label>
                                                <select class="form-control" id="pais" name="pais" onchange="cambio_departamento();">   
                                                    <option value="0">Seleccione un país</option>
                                                    @foreach ($pais as $pais)
                                                        <option value="{{$pais->id}}">{{$pais->nombre}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                  
                                         <div class="col-lg-4">                                  
                                            <div class="form-group" >
                                                <label for="nombre">Departamento</label>
                                                <select class="form-control" id="departamento" name="departamento">   
                                                <option value="0">Seleccione un departamento</option>  </select>
                                            </div>                              
                                         </div>

                                          <div class="col-lg-4">
                                                <div class="form-group" style="text-align: left;">
                                                    <label for="nombre">Municipio</label>
                                                    <input type="text" name="municipio" class="form-control" id="municipio" placeholder="Municipio"onkeypress="return soloLetras(event)">
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
                                <center> <h4>Desea editar el departamento</h4>  </center>   
                                <div class="row">
                                     <form autocomplete="off" id="frm_add1" action="modificar" method="POST">
                                       {{ csrf_field() }}  
                                        <div class="col-lg-12">
                                            <div class="col-lg-4">
                                                 <div class="form-group" style="text-align: left;">
                                                    
                                                <label for="nombre">País</label>
                                                <select class="form-control" id="pais1" name="pais1" onchange="cambio_departamento1();">   
                                                    <option value="0">Seleccione un país</option>
                                                    @foreach ($pais1 as $pais)
                                                        <option value="{{$pais->id}}">{{$pais->nombre}}</option>
                                                    @endforeach
                                                </select>
                                            
                                                 </div>
                                             </div>

                                                <div class="col-lg-4">
                                                 <div class="form-group" style="text-align: left;">
                                                    <label for="nombre">Departamento</label>
                                                    <select class="form-control" id="departamento1" name="departamento1">   
                                                        <option value="0">Seleccione un departamento</option>
                                                        
                                                                                                                    
                                                    </select>
                                                 </div>
                                             </div>
                                             
                                          <div class="col-lg-4">
                                                <div class="form-group" style="text-align: left;">
                                                    <label for="nombre">Municipio</label>
                                                    <input type="text" name="municipio1" class="form-control" id="municipio1" placeholder="Municipio"onkeypress="return soloLetras(event)">
                                                </div>
                                          </div>
                                        </div>
                                        <input type="hidden" id="id">
                                    </form>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button class="btn-success btn btn-flat" onclick="modificar()">Guardar</button>
                            </div>
                        </div>
                    </div>
                </div>


<div  id="ModalEliminar" class="modal modal-edu-general default-popup-PrimaryModal fade" role="dialog" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog"  style="width: 300px">
        <div class="modal-content" id="modal-content">
                <div class="modal-close-area modal-close-df">
                    <a class="close" data-dismiss="modal" href="#"><i class="fa fa-close"></i></a>
                </div>
            <div class="modal-body">
                    <center> <h4> Estás seguro? <br> <br> No podrás revertir esto! </h4>  </center>
                        <div class="col-lg-12">
                            <div class="col-lg-12">
                                 <form action="{{URL::to('/')}}/municipio/{{ $municipio->id }}" method="POST" id="frm_delete"> 
                                      {{ csrf_field() }}
                                      {{ method_field('DELETE') }}

                                    <input type="hidden" id="id_delete" value="{{ $municipio->id }}">
                                    <button class="fa fa-trash-o btn-danger btn-sm" type="submit"> <br> ELIMINAR</button>
                                 </form>   
                            </div>               
                        </div>             
            </div>
                  
        </div>
    </div>
</div>



<script type="text/javascript" language="javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
<script src="js/sweetalert2.all.min.js"></script>

<script src="js/sweetalert2.min.js"></script>

<script type="text/javascript" >
        $('#example').DataTable({
        "language":{
            "url": "//cdn.datatables.net/plug-ins/1.10.19/i18n/Spanish.json"
        }
    });

function guardar(){
        var res= validarcampos();

        if(res!=""){
            Swal(
                'Error','El siguientes campos es obligatorio: <br>'+res,'error');
        }
        else{
            var token = "<?=csrf_token(); ?>";
            $.ajax({
                type:"POST",
                url: "municipio/guardar",
                data: {nombre: $("#municipio").val(), departamento_id: $("#departamento").val(), _token: token},
                success: function(result){
                    if(result=="1"){
                        swal("Error","Se Ha Presentado Un Error "+result,"error");                         
                     }else if(result==2){
                         swal("Ops","Este Municipio ya existe","info");
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
                url: "/municipio/delete/"+id,  
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
                url: "municipio/modificar",
                data: {nombre: $("#municipio1").val(), departamento_id: $("#departamento1").val(), _token: token, id:$("#id").val()},

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




function editar(id){
        
        $.ajax({
                type:"get",
                url: "municipio/consultar/"+id,
                success: function(result){

                      $.each(result,function(i,item){
                        $("#municipio1").val(item.nombre)

                        $("#pais1").val(item.pais);
                        cambio_departamento1(item.departamento);

                        $("#id").val(item.id);

                    })
                },
              
            });
    }

function validarcampos(){
        var mensaje = '';
        if($("#municipio").val()==""){
            mensaje += '<br>Municipio';
        }

        if($("#pais").val()=="0"){
            mensaje += '<br>Pais';
        }

        if($("#departamento").val()=="0"){
            mensaje += '<br>Departamento';
        }
        return mensaje;

    }

    function validarcampos1(){
        var mensaje = '';
        if($("#municipio1").val()==""){
            mensaje += '<br>Municipio';
        }

        if($("#pais1").val()=="0"){
            mensaje += '<br>Pais';
        }

        if($("#departamento1").val()=="0"){
            mensaje += '<br>Departamento';
        }
        return mensaje;

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

function cambio_departamento(){
        var id = $("#pais").val();
        var url = '/pais/'+id;
        $.ajax({'url':url, success: function(result){
            $("#departamento").find('option').remove().end();
            $("#departamento").append(new Option('Seleccione un departamento', '0'));
            $.each(result, function(i, item){
                $("#departamento").append(new Option(item.nombre, item.id));
            });
        }});
    }

    function cambio_departamento1(id_departamento){
        var id = $("#pais1").val();
        var url = '/pais/'+id;
        $.ajax({'url':url, success: function(result){
            $("#departamento1").find('option').remove().end();
            $("#departamento1").append(new Option('Seleccione un departamento', '0'));
            $.each(result, function(i, item){
                $("#departamento1").append(new Option(item.nombre, item.id));
                if(item.id==id_departamento){
                    $("#departamento1").val(id_departamento);
                }
            });
        }});
        
    }

    function cambio(){
        var id = $("#pais").val();
        var url = '/pais/'+id;
        $.ajax({'url':url, success: function(result){
            $("#pais").find('option').remove().end();
            $("#pais").append(new Option('Seleccione un departamento', '0'));
            $.each(result, function(i, item){
                $("#pais").append(new Option(item.nombre, item.id));
            });
        }});
    }

function cambio_municipio(){
        var id = $("#departamento").val();
        var url = '/departamento/'+id;
        $.ajax({'url':url, success: function(result){
            $("#municipio").find('option').remove().end();
            $("#municipio").append(new Option('Seleccione un municipio', '0'));
            $.each(result, function(i, item){
                $("#municipio").append(new Option(item.nombre, item.id));
            });
        }});
    }

</script>

@endsection