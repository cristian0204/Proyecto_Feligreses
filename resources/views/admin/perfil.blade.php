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


                
 <div class="all-content-wrapper">
     
        <!-- Single pro tab review Start-->
        <div class="single-pro-review-area mt-t-30 mg-b-15">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                        <div class="profile-info-inner">
                            <br><br><br><br><br>
                            <div class="profile-img">
                                <img src="img/profile/2.png" alt="" />
                            </div>
                         <!--  <div class="profile-details-hr">
                                <div class="row">
                                    <div class="col-lg-6 col-md-12 col-sm-12 col-xs-6">
                                        <div class="address-hr">
                                         <p><b>Nombre</b><br /> 
                                            {{ Auth::user()->name }}
                                        </p>
                                        </div>
                                    </div>
                                  
                                </div>

                            </div>-->
                        </div>
                    </div>
                    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                        <div class="product-payment-inner-st res-mg-t-30 analysis-progrebar-ctn">
                            <ul id="myTabedu1" class="tab-review-design">
                                <li class="active"><a href="#description">Perfil Usuario</a></li>
                                
                            </ul>
                            <div id="myTabContent" class="tab-content custom-product-edit st-prf-pro">
                                <div class="product-tab-list tab-pane fade active in" id="description">
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <div class="review-content-section">
                                                <div class="row">
                                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                                                        <div class="address-hr biography">
                                                                 <p><b>Nombre</b><br /> 
                                            {{ Auth::user()->name }}
                                        </p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                                                        <div class="address-hr biography">
                                                                 <p><b>Email</b><br /> 
                                            {{ Auth::user()->email }}
                                        </p>
                                                        </div>
                                                    </div>

                                                    <!--
                                                       <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                                                        <div class="address-hr biography">
                                                        <a href="" data-toggle="modal" data-target="#EditarUsuario" aria-hidden onclick="editar({{ Auth::user()->id  }})"> Editar </a>
                                                        </div>
                                                    </div>
                                                -->
                                             
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <div class="content-profile">
                                                            <h1>Iglesia Centro Internacional Visión Del Reino Civr</h1>
                                              
                                                        </div>
                                                    </div>
                                                </div>
                                              
                                             
                                               
                                           
                                            </div>
                                        </div>
                                    </div>
                                </div>
                               

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
 
    </div>

<div id="EditarUsuario" class="modal modal-edu-general default-popup-PrimaryModal fade" role="dialog" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog">
        <div class="modal-content" id="modal-content">
            <div class="modal-close-area modal-close-df">
                <a class="close" data-dismiss="modal" href="#"><i class="fa fa-close"></i></a>
            </div>
            <div class="modal-body">
                <center> <h4>Usuario</h4>  </center>   
                <div class="row">
                    <form autocomplete="off" id="frm_add1" action="modificar" method="POST"> 
                    {{ csrf_field() }}   
                        <div class="col-lg-12">
                            <div class="col-lg-12">
                                <div class="form-group" style="text-align: left;">
                                    <label for="nombre">Nombre </label>
                                    <input type="text" name="nombre" class="form-control" id="nombre" placeholder="Nombre">
                                </div>
                            </div>
                        </div>

                         <div class="col-lg-12">
                            <div class="col-lg-12">
                                <div class="form-group" style="text-align: left;">
                                    <label for="nombre">Email</label>
                                    <input type="text" name="email" class="form-control" id="email" placeholder="Email" >
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

<script type="text/javascript">

function editar(id){     
        $.ajax({
                type:"get",
                url: "usuario/consultar/"+id,
                success: function(result){
                    $.each(result,function(i,item){
                        $("#nombre").val(item.name);
                        $("#email").val(item.email);
                        $("#contraseña").val(item.password);
                        $("#id").val(item.id);
                    })
                },
              
            });
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
                url: "modificar",
                data: {name: $("#nombre").val(), email: $("#email").val(), _token: token, id:$("#id").val()},
                           
                success: function(result){
                    if(result=="0"){
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

function validarcampos1(){
        var mensaje = '';
        if($("#name").val()==""){
            mensaje += '<br>Nombre';
        }
        if($("#email").val()==""){
            mensaje += '<br>Correo electronico';
        }       
        return mensaje;
}

</script>


@endsection