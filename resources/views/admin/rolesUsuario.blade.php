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
                                <li><span class="bread-blod">Rol Usuario</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
          <div class="row">
            @if(Auth::User()->can('crearRolUsuario'))
                 <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    Añadir rol a usuario <a class="btn btn-success bnt-xs" href="#" data-toggle="modal" data-target="#PrimaryModalalert1">Agregar</a>
                 </div>
            @endif
            </div>

            <br>
    </div>
</div>

<div style="background-color: white; border: PowderWhite 1px Solid; width: 320px; border-top-left-radius: 20px; border-bottom-right-radius: 20px;  padding: 3px 10px;">
    <h5>Informacion</h5>
    <p>
       - Cada Usuario Tiene Que Tener Un Rol Distinto 
       <br>
      - Cada Rol Tiene Que Tener Su Unico Usuario
    </p>
</div>
<br>

<div class="breadcome-area">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <table id="example" class="table table-striped table-bordered" style="width:100% ; margin: 1">
                    <thead>

                        <th>Usuario</th>
                        <th>Rol</th>
                        <th>Opciones</th>
                    </thead>
                   
                        <tbody>
                        @foreach ($rolesUsuario as $rolesUsuario)
                            <tr>
                                <td>{{$rolesUsuario->users}}</td>
                                <td>{{$rolesUsuario->roles}}</td>
                               
                                
                                 <th>
                                    
                                    @if(Auth::User()->can('eliminaRolUsuario'))


                                    <button class="fa fa-trash-o btn-danger btn-sm" type="submit" data-toggle="modal" data-target="" onclick="eliminar({{$rolesUsuario->user_id}})"></button> 
                                   
                                    
                                    @endif

                                    @if(Auth::User()->can('editarRolUsuario'))

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
                            <center> <h4></h4>  </center>   
                            <div class="row">
                                <form autocomplete="off">
                                    <div class="col-lg-12">
                                        <div class="col-lg-6" style="text-align: left;">
                                            <div class="form-group">
                                                <label for="nombre">Usuario</label>
                                                <select class="form-control" id="usuario" name="usuario" >   
                                                    <option value="0">Seleccione un usuario</option>
                                                    @foreach ($users as $users)
                                                        <option value="{{$users->id}}">{{$users->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                  
                                         <div class="col-lg-6">                                  
                                            <div class="form-group">
                                                <label for="nombre">Rol</label>
                                                <select class="form-control" id="rol" name="rol">   
                                                    <option value="0">Seleccione un rol</option>
                                                    @foreach ($roles as $roles)
                                                        <option value="{{$roles->id}}">{{$roles->name}}</option>
                                                    @endforeach
                                                </select>
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
                                 <form action="{{URL::to('/')}}/rolesUsuario/{{ $rolesUsuario->user_id }}" method="POST" id="frm_delete"> 
                                      {{ csrf_field() }}
                                      {{ method_field('DELETE') }}
                                      <input type="hidden" id="id_delete" value="{{ $rolesUsuario->user_id }}">
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

<link rel="stylesheet" href="js/sweetalert2.min.css">


<script type="text/javascript" >
        $('#example').DataTable({
        "language":{
            "url": "//cdn.datatables.net/plug-ins/1.10.19/i18n/Spanish.json"
        }
    });

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
                url: "/rolesUsuario/delete/"+id,  
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

   function editar(id){     
        $.ajax({
                type:"get",
                url: "rolesUsuario/consultar/"+id,
                success: function(result){
                    $.each(result,function(i,item){
                        $("#nomUser").val(item.nombre);
                        $("#nomRol").val(item.display_name); 
                        $("#id").val(item.id);
                    })
                },
              
            });
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
                url: "rolesUsuario/guardar",
                data: {usuario: $("#usuario").val(), rol: $("#rol").val(), _token: token},
                success: function(result)   {
                    if(result=="1"){
                        swal("Error","Se Ha Presentado Un Error "+result,"error");                         
                     }else if(result==2){
                         swal("Ops","Este Usuario Ya Tiene Un Rol Defenido","info");
                     }
                     else{
                        swal("Se Ha Registrado Correctamente","","success").then((value)=>{
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
        if($("#usuario").val()=="0"){
            mensaje += '<br>Usuario';
        }

        if($("#rol").val()=="0"){
            mensaje += '<br>Rol';
        }
    
        return mensaje;

    }


</script>

@endsection