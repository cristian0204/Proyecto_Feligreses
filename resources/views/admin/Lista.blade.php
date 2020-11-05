@extends('layouts.admin')

@section('contenido')

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">

<link rel="stylesheet" href="css/datapicker/datepicker3.css">

<link rel="stylesheet" href="css/modals.css">


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
                                <li><span class="bread-blod">Lista de Usuarios</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

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
                        
                        <th>Opciones</th>
                        
                    </thead>
                    <tbody>
                        @foreach ($lista as $lista)
                            <tr>
                                <td>{{$lista->name}}</td>
                                <td>{{$lista->email}}</td>
                                                              
                                
                                <th>                                      
                                    
                                    @if(Auth::User()->can('eliminarUsuario'))
                                   
                                    <button class="fa fa-trash-o btn-danger btn-sm" type="submit" data-toggle="modal" data-target="" onclick="eliminar({{$lista->id}})"></button> 
                                    @endif
                                    
                                    <!--
                                    <button class="fa fa-pencil-square-o  btn-info btn-sm" class="btn btn-success bnt-xs" href="#" data-toggle="modal" data-target="#Modal2" aria-hidden onclick="editar({{$lista->id}})"></button>-->

                                    


                                </th>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
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
                                 <form action="{{URL::to('/')}}/lista/{{ $lista->id }}" method="POST" id="frm_delete"> 
                                      {{ csrf_field() }}
                                      {{ method_field('DELETE') }}
                                      <input type="hidden" id="id_delete" value="{{ $lista->id }}">
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
                url: "/usuario/delete/"+id,  
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