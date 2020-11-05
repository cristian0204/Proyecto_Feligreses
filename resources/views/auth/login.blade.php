<!doctype html>
<html class="no-js" lang="es">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Iniciar Sesión</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- favicon
        ============================================ -->
    <link rel="shortcut icon" type="image/x-icon" href="img/p2.ico">
    <!-- Google Fonts
        ============================================ -->
    <link href="https://fonts.googleapis.com/css?family=Play:400,700" rel="stylesheet">
    <!-- Bootstrap CSS
        ============================================ -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Bootstrap CSS
        ============================================ -->
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <!-- owl.carousel CSS
        ============================================ -->
    <link rel="stylesheet" href="css/owl.carousel.css">
    <link rel="stylesheet" href="css/owl.theme.css">
    <link rel="stylesheet" href="css/owl.transitions.css">
    <!-- animate CSS
        ============================================ -->
    <link rel="stylesheet" href="css/animate.css">
    <!-- normalize CSS
        ============================================ -->
    <link rel="stylesheet" href="css/normalize.css">
    <!-- main CSS
        ============================================ -->
    <link rel="stylesheet" href="css/main.css">
    <!-- morrisjs CSS
        ============================================ -->
    <link rel="stylesheet" href="css/morrisjs/morris.css">
    <!-- mCustomScrollbar CSS
        ============================================ -->
    <link rel="stylesheet" href="css/scrollbar/jquery.mCustomScrollbar.min.css">
    <!-- metisMenu CSS
        ============================================ -->
    <link rel="stylesheet" href="css/metisMenu/metisMenu.min.css">
    <link rel="stylesheet" href="css/metisMenu/metisMenu-vertical.css">
    <!-- calendar CSS
        ============================================ -->
    <link rel="stylesheet" href="css/calendar/fullcalendar.min.css">
    <link rel="stylesheet" href="css/calendar/fullcalendar.print.min.css">
    <!-- forms CSS
        ============================================ -->
    <link rel="stylesheet" href="css/form/all-type-forms.css">
    <!-- style CSS
        ============================================ -->
    <link rel="stylesheet" href="style.css">
    <!-- responsive CSS
        ============================================ -->
    <link rel="stylesheet" href="css/responsive.css">
    <!-- modernizr JS
        ============================================ -->

        <link rel="stylesheet" href="js/sweetalert2.min.css">

        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">

<link rel="stylesheet" href="css/modals.css">

    <script src="js/vendor/modernizr-2.8.3.min.js"></script>
</head>

<body style="background: white">
    <!--[if lt IE 8]>
        <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->
<div class="error-pagewrap">
    <div class="error-page-int">
            <div class="text-center m-b-md custom-login">
               
                <center><div style="width: 100px; height: 100px"> <img src="img/cruz.png" alt="" /> </div></center>
                <h5 style="font-size: 30px; font-family: Comic Sans MS; color: black">IGLESIA CRISTIANA</h5>
                <h1 style="font-size: 60px; font-family: Comic Sans MS; color: black">CIVR</h1> 
                <h5 style="font-size: 30px; font-family: Comic Sans MS; color: black">CENTRO INTERNACIONAL</h5> 
                <h5 style="font-size: 30px; font-family: Comic Sans MS; color: black">VISION DEL REINO</h5>  

               
                
            </div>
            <div class="content-error">
                <div class="hpanel">
                    <div class="panel-body">
                        <form method="POST" action="{{ route('login') }}" id="loginForm">
                            @csrf
                            <div class="form-group">
                                <label class="control-label" for="username">Usuario</label>
                                <input type="text" placeholder="example@gmail.com" title="Dirección de correo electrónico" required="" value="" name="email" id="username" class="form-control">
                                <span class="help-block small">Dirección de correo electrónico</span>
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="password">Contraseña</label>
                                <input type="password" title="Contraseña" placeholder="******" required="" value="" name="password" id="password" class="form-control">
                                <span class="help-block small">Contraseña</span>
                            </div>

                       

                            <button class="btn btn-success btn-block loginbtn" type="submit"id="usuario">Iniciar Sesión</button>
                        </form>
                        <br>
                        <br>

                    </div>
                </div>
            </div>

     
           <!--- RECUPERAR CONTRASEÑA
           
            <div class="bottom">
              
              <span class="helper-text"><i class="fa fa-lock"></i> <a href="#" data-target="#modal-edit" data-toggle="modal">Recuperar Contraseña</a>
              </span>

            </div>
  
            
            <div style="width: 700px" class="modal fade modal-slide-in-right" aria-hidden="true" role="dialog" tabindex="-1" id="modal-edit" data-backdrop="static" data-keyboard="false">
                <div class="model-dialog modal-xs" >
                    <div class="modal-content" id="modal-content">
                        <form id="frm_edit" action="{{asset('recuperar')}}" method="POST" novalidate="">
                            {{ csrf_field() }}
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-Label="close">
                                    <span aria-hidden="true">x</span>
                                </button>
                                <h4 class="modal-title">Recuperar Contraseña</h4>
                            </div>
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="nombre">Email</label>
                                    <input type="text" name="email" id="email" class="form-control" required="required">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                                <button type="submit" class="btn btn-primary" id="recuperar">Confirmar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
 --->

<!----------------------------- 
---------------------->

             <div class="bottom">
              
              <span class="helper-text"><i class="fa fa-lock"></i> <a href="#" data-target="#ModalEliminar" data-toggle="modal">Recuperar Contraseña</a>
              </span>

              

            </div>

<div  id="ModalEliminar" class="modal modal-edu-general default-popup-PrimaryModal fade" role="dialog" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog">
        <div class="modal-content" id="modal-content">
                <div class="modal-close-area modal-close-df">
                    <a class="close" data-dismiss="modal" href="#"><i class="fa fa-close"></i></a>
                </div>
            <div class="modal-body">
                        

                        <form id="frm_edit" action="{{asset('recuperar')}}" method="POST" novalidate="">
                            {{ csrf_field() }}
                            
                        
                                <h4 class="modal-title">Recuperar Contraseña</h4>
                       
                            
                                <div class="form-group">
                                    <label for="nombre">Email</label>
                                    <input type="text" name="email" id="email" class="form-control" required="required">
                                </div>
                         
                            <div class="modal-footer">
                            
                                <button type="submit" class="btn btn-primary" id="recuperar" href="http://www.civr.iglesiacivr.org" >Confirmar</button>
                            </div>
                        </form>    
            </div>
                  
        </div>
    </div>
</div>




    <!-- jquery
        ============================================ -->
    <script src="js/vendor/jquery-1.12.4.min.js"></script>
    <!-- bootstrap JS
        ============================================ -->
    <script src="js/bootstrap.min.js"></script>
    <!-- wow JS
        ============================================ -->
    <script src="js/wow.min.js"></script>
    <!-- price-slider JS
        ============================================ -->
    <script src="js/jquery-price-slider.js"></script>
    <!-- meanmenu JS
        ============================================ -->
    <script src="js/jquery.meanmenu.js"></script>
    <!-- owl.carousel JS
        ============================================ -->
    <script src="js/owl.carousel.min.js"></script>
    <!-- sticky JS
        ============================================ -->
    <script src="js/jquery.sticky.js"></script>
    <!-- scrollUp JS
        ============================================ -->
    <script src="js/jquery.scrollUp.min.js"></script>
    <!-- mCustomScrollbar JS
        ============================================ -->
    <script src="js/scrollbar/jquery.mCustomScrollbar.concat.min.js"></script>
    <script src="js/scrollbar/mCustomScrollbar-active.js"></script>
    <!-- metisMenu JS
        ============================================ -->
    <script src="js/metisMenu/metisMenu.min.js"></script>
    <script src="js/metisMenu/metisMenu-active.js"></script>
    <!-- tab JS
        ============================================ -->
    <script src="js/tab.js"></script>
    <!-- icheck JS
        ============================================ -->
    <script src="js/icheck/icheck.min.js"></script>
    <script src="js/icheck/icheck-active.js"></script>
    <!-- plugins JS
        ============================================ -->
    <script src="js/plugins.js"></script>
    <!-- main JS
        ============================================ -->
    <script src="js/main.js"></script>

    <script src="js/sweetalert2.all.min.js"></script>
    <script src="js/sweetalert2.min.js"></script>

    <script type="text/javascript">
    $("#usuario").click(function(e){
        if($("#username").val()=="" || $("#password").val()==""){
            swal("Error","El usuario y/o constraseña son obligatorios","error");
            e.preventDefault();
        }
    });
    $("#recuperar").click(function(e){
        if($("#email").val()==""){
            swal('Error','El campo email es obligatorio','error');
            e.preventDefault();
        }else{
            var mensaje2 = validarEmail($("#email").val());
            if(mensaje2=="false"){
                swal('Error','El campo email es incorrecto','error');
                e.preventDefault();
            }
        }        
    });

    function validarEmail(valor) {
        var mensaje1 = "";
        if (/^(([^<>()[\]\.,;:\s@\"]+(\.[^<>()[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i.test(valor)){
            mensaje1 = "true";
        } else {
            mensaje1 = "false";
        }
        return mensaje1;
    }
</script>
   
</body>

</html>