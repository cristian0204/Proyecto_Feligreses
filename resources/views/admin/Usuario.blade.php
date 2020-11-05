@extends('layouts.admin')

@section('contenido')

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">

<link rel="stylesheet" href="css/datapicker/datepicker3.css">

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
                                <li><span class="bread-blod">Usuarios</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

                               
          <div class="row">
                 <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                     Usuarios  <a class="btn btn-success bnt-xs" href="/register">Agregar</a>
                 </div>
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
                        <th>Nombre</th>
                        <th>Email</th>
                        <th>Contraseña</th>
                        <th>Opciones</th>
                    </thead>
                    <tbody>
                        @foreach ($usuario as $usuario)
                            <tr>
                                <td>{{$usuario->name}}</td>
                                <td>{{$usuario->email}}</td>
                                <td>{{$usuario->password}}</td>
                                
                                <th>                                      
                                    
                                    <button class="fa fa-trash-o btn-danger btn-sm" type="submit" data-toggle="modal" data-target="#ModalEliminar"></button>
                                    
                                    <button class="fa fa-pencil-square-o  btn-info btn-sm" class="btn btn-success bnt-xs" href="#" data-toggle="modal" data-target="#Modal2" aria-hidden onclick="editar({{$usuario->id}})"></button>
                                </th>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!--
<div id="PrimaryModalalert1" class="modal modal-edu-general default-popup-PrimaryModal fade" role="dialog" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog">
        <div class="modal-content" id="modal-content">
            <div class="modal-close-area modal-close-df">
                <a class="close" data-dismiss="modal" href="#"><i class="fa fa-close"></i></a>
            </div>
            <div class="modal-body">
                <center> <h4>Usuario</h4>  </center>   
                <div class="row">
                    <form autocomplete="off" id="frm_add" action="guardar" method="POST" autocomplete="off">
                        <div class="col-lg-12">
                            <div class="col-lg-12">
                                <div class="form-group" style="text-align: left;">
                                    <label for="nombre">Nombre</label>
                                    <input type="text" name="nombre" class="form-control" id="nombre2" placeholder="Nombre" onkeypress="return soloLetras(event)">
                                </div>
                            </div>
                        </div>

                         <div class="col-lg-12">
                            <div class="col-lg-12">
                                <div class="form-group" style="text-align: left;">
                                    <label for="email2">Email</label>
                                    <input type="text" class="form-control" id="email" placeholder="Example@mail.com" autocomplete="off">
                                </div>
                            </div>
                        </div>



                        <div class="col-lg-12">
                            <div class="col-lg-12">
                                <div class="form-group" style="text-align: left;">
                                    <label for="password">Contraseña</label>
                                    <input type="password" class="form-control" id="password" placeholder="Contraseña">
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
-->
              
    
<script type="text/javascript" language="javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script>

<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>

<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>

<script src="js/sweetalert2.all.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/promise-polyfill"></script>

<script src="js/sweetalert2.min.js"></script>

<link rel="stylesheet" href="js/sweetalert2.min.css">

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
                'Error',
  'El siguientes campos es obligatorio: <br>'+res,
  'error'
);
        }
          else{
            var token = "<?=csrf_token(); ?>";
            $.ajax({
                type:"POST",
                url:"usuario/guardar",
                data: {nombre: $("#nombre").val(), email: $("#email").val(), password: $("#password").val(), _token: token},
                success: function(result){
                    if(result=="0"){
                         swal("Se Ha Registrado Correctamente","","success").then((value)=>{
                            location.reload();
                        });
                     }else if(result==2){
                        swal("Ops","Este usuario ya existe","info");
                     } else{
                         swal("Error","Se Ha Presentado Un Error","error");
                     }
                },
                error: function(data){
                    console.log(data);
                    swal("Error","Se Ha Presentado Un Error","error");
                }
            });
        }
    }




function validarcampos(){
        var mensaje = '';
        if($("#nombre").val()==""){
            mensaje += '<br>Nombre';
        }

         if($("#email").val()==""){
            mensaje += '<br>descripcion del rol';
        }

         if($("#display_name1").val()==""){
            mensaje += '<br>Nombre a mostrar el rol';
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



</script>

@endsection