<!doctype html>
<html class="no-js" lang="es">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>CIVR</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- favicon
		============================================ -->
    <link rel="shortcut icon" type="image/x-icon" href="img/p2.ico">
    <!-- Google Fonts
		============================================ -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,700,900" rel="stylesheet">
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
    <!-- meanmenu icon CSS
		============================================ -->
    <link rel="stylesheet" href="css/meanmenu.min.css">
    <!-- main CSS
		============================================ -->
    <link rel="stylesheet" href="css/main.css">
    <!-- educate icon CSS
		============================================ -->
    <link rel="stylesheet" href="css/educate-custon-icon.css">
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
    <!-- style CSS
		============================================ -->
    <link rel="stylesheet" href="style.css">
    <!-- responsive CSS
		============================================ -->
    <link rel="stylesheet" href="css/responsive.css">
    <!-- modernizr JS
		============================================ -->
    <script src="js/vendor/modernizr-2.8.3.min.js"></script>
</head>

<body>

 
    <div class="left-sidebar-pro">
        <nav id="sidebar" class="">
            <!--Logo ---  <a href="/"><img class="main-logo" src="img/logo/logo3.png" alt="" /></a> --->
            <div class="left-custom-menu-adp-wrap comment-scrollbar">
                <nav class="sidebar-nav left-sidebar-menu-pro">
                    <ul class="metismenu" id="menu1">
                        <li class="active">
                            <a class="has-arrow" href="/"><span class="fa fa-home"></span><span class="mini-click-non">Inicio</span></a>
                        </li>
                
                        <!-- ADMINISTRACION --->

                        <li>
                            @if(Auth::User()->can('verAdministracion'))
                            <a class="has-arrow" href="/" aria-expanded="false"><span  class="fa fa-cogs" ></span> <span class="mini-click-non">Administracion</span></a>
                            <ul class="submenu-angle" aria-expanded="false">
                            

                                @if(Auth::User()->can('verPais'))
                                <li><a title="Crear Rol" href="{{asset('pais')}}"><span class="mini-sub-pro">País</span></a></li>
                                @endif

                                @if(Auth::User()->can('verMunicipio'))
                                <li><a title="Municipio" href="{{asset('municipio')}}"><span class="mini-sub-pro">Municipio</span></a></li>
                                @endif

                                @if(Auth::User()->can('verEstadoCivil'))
                                <li><a title="Estado Civil" href="{{asset('estado')}}"><span class="mini-sub-pro">Estado Civil</span></a></li>
                                @endif

                                @if(Auth::User()->can('verEvento'))
                                <li><a title="Crear Evento" href="{{asset('evento')}}"><span class="mini-sub-pro">Crear Evento</span></a></li>
                                @endif

                                @if(Auth::User()->can('verDepartamento'))
                                <li><a title="Departamento" href="{{asset('departamento')}}"><span class="mini-sub-pro">Departamento</span></a></li>
                                @endif

                                @if(Auth::User()->can('verTipoDocumento'))
                                <li><a title="Tipo De Documento" href="{{asset('tipo')}}"><span class="mini-sub-pro">Tipo De Documento</span></a></li>
                                @endif

                                @if(Auth::User()->can('verComo'))
                                <li><a title="Formas De Conocernos" href="{{asset('como')}}"><span class="mini-sub-pro">Formas De Conocernos</span></a></li>
                                @endif
                                
                            </ul> @endif
                        </li>


                         <!-- FELIGRESES --->

                         <li>
                            @if(Auth::User()->can('verPersona'))  
                            <a class="has-arrow" aria-expanded="false"><span class="fa fa-users"></span> <span class="mini-click-non">Feligreses</span></a>
                            <ul class="submenu-angle" aria-expanded="false">
                            
                                 

                                @if(Auth::User()->can('verPersona'))
                                <li><a title="Feligreses" href="{{asset('feligreses')}}"><span class="mini-sub-pro">Feligreses</span></a></li>
                                @endif

                                @if(Auth::User()->can('verAsistencia'))
                                <li><a title="Asistencia a evento" href="{{asset('asistencia')}}"><span class="mini-sub-pro">Asistencia a Eventos</span></a></li>
                                @endif

                                @if(Auth::User()->can('consultarAsistencia'))
                                <li><a title="Asistencia" href="{{asset('consultar')}}"><span class="mini-sub-pro">Consultar Asistencia</span></a></li>
                                @endif

                            </ul> @endif
                        </li>



                         <!-- SEGURIDAD --->

                        <li>
                            @if(Auth::User()->can('verSeguridad')) 
                            <a class="has-arrow" aria-expanded="false"><span class="fa fa-lock"></span> <span class="mini-click-non">Seguridad</span></a>
                            <ul class="submenu-angle" aria-expanded="false">
                               
                                
                                @if(Auth::User()->can('verRol'))
                                <li><a title="Rol" href="{{asset('roles')}}"><span class="mini-sub-pro">Rol</span></a></li>
                                @endif

                                @if(Auth::User()->can('verRolUsuario'))
                                <li><a title="Rol De Usuario" href="{{asset('rolesUsuario')}}"><span class="mini-sub-pro">Rol De Usuario</span></a></li>
                                @endif

                                @if(Auth::User()->can('verPerimisos'))
                                <li><a title="Lista De Permisos" href="{{asset('ListaPermisos')}}"><span class="mini-sub-pro">Lista De Permisos</span></a></li>
                                @endif

                                @if(Auth::User()->can('asignarPermisos'))
                                <li><a title="Crear Rol" href="{{asset('AsPermisos')}}"><span class="mini-sub-pro">Asignar Permisos</span></a></li>
                                @endif

                            </ul> @endif  
                        </li>



                            <li>
                            @if(Auth::User()->can('verUsuario'))
                            <a class="has-arrow" aria-expanded="false"><span class="fa fa-user"></span> <span class="mini-click-non">Usuario</span></a>
                            <ul class="submenu-angle" aria-expanded="false">
                            

                                @if(Auth::User()->can('crearUsuario'))
                                <li><a title="Crea Usuario" href="{{asset('register')}}"><span class="mini-sub-pro">Crear Usuario</span></a></li>
                                @endif

                                @if(Auth::User()->can('verUsuario'))
                                <li><a title="Lista De Usuario" href="{{asset('lista')}}"><span class="mini-sub-pro">Lista De Usuario</span></a></li>
                                @endif


                            </ul> @endif
                        </li>

                        <li>
                         
                         <a class="has-arrow" href="cambiar" aria-expanded="false"><span  class="fa fa-refresh" ></span> <span class="mini-click-non"> Cambiar <br> Contraseña</span></a>
                        </li>                         
                         
                    </ul>
                </nav>
            </div>
        </nav>
    </div>
    <!-- End Left menu area -->
    <!-- Start Welcome area -->
    <div class="all-content-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="logo-pro">
                        <a href="index.html"><img class="main-logo" src="" alt="" /></a>
                    </div>
                </div>
            </div>
        </div>
       
        <div class="header-advance-area">
        
           
                <div class="header-top-area">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="header-top-wraper">
                                    <div class="row">
                                        <div class="col-lg-1 col-md-0 col-sm-1 col-xs-12">
                                            <div class="menu-switcher-pro">
                                                <button type="button" id="sidebarCollapse" class="btn bar-button-pro header-drl-controller-btn btn-info navbar-btn">
                                                    <i class="educate-icon educate-nav"></i>
                                                </button>
                                            </div>
                                         </div>
                                    
                                    <div class="col-lg-6 col-md-7 col-sm-6 col-xs-12">
                                        <div class="header-top-menu tabl-d-n">
                                            <ul class="nav navbar-nav mai-top-nav">
                                              
                                            </ul>
                                        </div>
                                    </div>

                                    <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12">
                                        <div class="header-right-info">
                                            <ul class="nav navbar-nav mai-top-nav header-right-menu">
                                             
                                                <li class="nav-item">
                                                    <a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="nav-link dropdown-toggle">
                                                            
                                                            <span class="admin-name"> <span class="fa fa-user"></span> Usuario : {{ Auth::user()->name }}</span>

                                                            <i class="fa fa-angle-down edu-icon edu-down-arrow"></i>
                                                    </a>

                                                   <ul role="menu" class="dropdown-header-top author-log dropdown-menu animated zoomIn">
                                                        <li><a href="/perfil"><span class="edu-icon edu-home-admin author-log-ic"></span>Perfil</a>
                                                        </li>

                                                        <li><a  href="{{ route('logout') }}"
                                                            onclick="event.preventDefault();
                                                            document.getElementById('logout-form').submit();"><span class="edu-icon edu-user-rounded author-log-ic" href=""></span>Cerrar Sesión</a>
                                                        </li>

                                                        <li>

                                                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">

                                                                <a class="dropdown-item" href="{{ route('logout') }}"
                                                               onclick="event.preventDefault();
                                                                             document.getElementById('logout-form').submit();">
                                                                {{ __('Cerrar Sesión') }}
                                                                </a>

                                                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                                @csrf
                                                                </form>
                                                            </div>
                                                        </li> 
                                                    </ul>
                                                </li> 
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

       <!--Imagen de Menu Inicial <img src="img/CIVR2.jpg" alt="" />-->

<br>
            <!-- VISTA MODO CELULAR -->
            <div class="mobile-menu-area">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="mobile-menu">
                                <nav id="dropdown">
                                    <ul class="mobile-menu-nav">
                                        <li><a data-toggle="collapse" data-target="#Charts" href="/">Inicio <span class="admin-project-icon edu-icon edu-down-arrow"></span></a>

                                            <ul class="submenu-angle" aria-expanded="true">
                                                                           
                                     <li>
                            @if(Auth::User()->can('verAdministracion'))
                            <a class="has-arrow" href="/" aria-expanded="false"><span  class="fa fa-cogs" ></span> <span class="mini-click-non">Administracion</span></a>
                            <ul class="submenu-angle" aria-expanded="false">
                            

                                @if(Auth::User()->can('verPais'))
                                <li><a title="Crear Rol" href="{{asset('pais')}}"><span class="mini-sub-pro">País</span></a></li>
                                @endif

                                @if(Auth::User()->can('verMunicipio'))
                                <li><a title="Municipio" href="{{asset('municipio')}}"><span class="mini-sub-pro">Municipio</span></a></li>
                                @endif

                                @if(Auth::User()->can('verEstadoCivil'))
                                <li><a title="Estado Civil" href="{{asset('estado')}}"><span class="mini-sub-pro">Estado Civil</span></a></li>
                                @endif

                                @if(Auth::User()->can('verEvento'))
                                <li><a title="Crear Evento" href="{{asset('evento')}}"><span class="mini-sub-pro">Crear Evento</span></a></li>
                                @endif

                                @if(Auth::User()->can('verDepartamento'))
                                <li><a title="Departamento" href="{{asset('departamento')}}"><span class="mini-sub-pro">Departamento</span></a></li>
                                @endif

                                @if(Auth::User()->can('verTipoDocumento'))
                                <li><a title="Tipo De Documento" href="{{asset('tipo')}}"><span class="mini-sub-pro">Tipo De Documento</span></a></li>
                                @endif

                                @if(Auth::User()->can('verComo'))
                                <li><a title="Formas De Conocernos" href="{{asset('como')}}"><span class="mini-sub-pro">Formas De Conocernos</span></a></li>
                                @endif
                                
                            </ul> @endif
                        </li>


                         <!-- FELIGRESES --->

                         <li>
                            @if(Auth::User()->can('verPersona'))  
                            <a class="has-arrow" aria-expanded="false"><span class="fa fa-users"></span> <span class="mini-click-non">Feligreses</span></a>
                            <ul class="submenu-angle" aria-expanded="false">
                            
                                 

                                @if(Auth::User()->can('verPersona'))
                                <li><a title="Feligreses" href="{{asset('feligreses')}}"><span class="mini-sub-pro">Feligreses</span></a></li>
                                @endif

                                @if(Auth::User()->can('verAsistencia'))
                                <li><a title="Asistencia a evento" href="{{asset('asistencia')}}"><span class="mini-sub-pro">Asistencia a Eventos</span></a></li>
                                @endif

                                @if(Auth::User()->can('consultarAsistencia'))
                                <li><a title="Asistencia" href="{{asset('consultar')}}"><span class="mini-sub-pro">Consultar Asistencia</span></a></li>
                                @endif

                            </ul> @endif
                        </li>



                         <!-- SEGURIDAD --->

                        <li>
                            @if(Auth::User()->can('verSeguridad')) 
                            <a class="has-arrow" aria-expanded="false"><span class="fa fa-lock"></span> <span class="mini-click-non">Seguridad</span></a>
                            <ul class="submenu-angle" aria-expanded="false">
                               
                                
                                @if(Auth::User()->can('verRol'))
                                <li><a title="Rol" href="{{asset('roles')}}"><span class="mini-sub-pro">Rol</span></a></li>
                                @endif

                                @if(Auth::User()->can('verRolUsuario'))
                                <li><a title="Rol De Usuario" href="{{asset('rolesUsuario')}}"><span class="mini-sub-pro">Rol De Usuario</span></a></li>
                                @endif

                                @if(Auth::User()->can('verPerimisos'))
                                <li><a title="Lista De Permisos" href="{{asset('ListaPermisos')}}"><span class="mini-sub-pro">Lista De Permisos</span></a></li>
                                @endif

                                @if(Auth::User()->can('asignarPermisos'))
                                <li><a title="Crear Rol" href="{{asset('AsPermisos')}}"><span class="mini-sub-pro">Asignar Permisos</span></a></li>
                                @endif

                            </ul> @endif  
                        </li>



                            <li>
                            @if(Auth::User()->can('verUsuario'))
                            <a class="has-arrow" aria-expanded="false"><span class="fa fa-user"></span> <span class="mini-click-non">Usuario</span></a>
                            <ul class="submenu-angle" aria-expanded="false">
                            

                                @if(Auth::User()->can('crearUsuario'))
                                <li><a title="Crea Usuario" href="{{asset('register')}}"><span class="mini-sub-pro">Crear Usuario</span></a></li>
                                @endif

                                @if(Auth::User()->can('verUsuario'))
                                <li><a title="Lista De Usuario" href="{{asset('lista')}}"><span class="mini-sub-pro">Lista De Usuario</span></a></li>
                                @endif


                            </ul> @endif
                        </li>   
                        </li>

                        <li>
                         
                         <a class="has-arrow" href="cambiar" aria-expanded="false"><span  class="fa fa-refresh" ></span> <span class="mini-click-non">Cambiar Contraseña</span></a>
                        </li> 
                                    
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
           
        </div>

         <div >
           
            
            @yield('contenido')
            

         </div>

                <div class="footer-copyright-area">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="footer-copy-right">
                                    <p>Copyright © 2019.<a href="http://findingtc.com/" target="_blank">Finding TC</a></p>
                                </div>
                            </div>
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
    <!-- counterup JS
		============================================ -->
    <script src="js/counterup/jquery.counterup.min.js"></script>
    <script src="js/counterup/waypoints.min.js"></script>
    <script src="js/counterup/counterup-active.js"></script>
    <!-- mCustomScrollbar JS
		============================================ -->
    <script src="js/scrollbar/jquery.mCustomScrollbar.concat.min.js"></script>
    <script src="js/scrollbar/mCustomScrollbar-active.js"></script>
    <!-- metisMenu JS
		============================================ -->
    <script src="js/metisMenu/metisMenu.min.js"></script>
    <script src="js/metisMenu/metisMenu-active.js"></script>
    <!-- morrisjs JS
		============================================ -->
   
    <!-- morrisjs JS
		============================================ -->
    <script src="js/sparkline/jquery.sparkline.min.js"></script>
  
    <script src="js/sparkline/sparkline-active.js"></script>
    <!-- calendar JS
		============================================ -->
  
    <!-- plugins JS
		============================================ -->
    <script src="js/plugins.js"></script>
    <!-- main JS
		============================================ -->
    <script src="js/main.js"></script>
    <!-- tawk chat JS
		============================================ -->
    <!--<script src="js/tawk-chat.js"></script>-->

    <script type="text/javascript" language="javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>


<!--Para el sortable de la vista asignar permisos-->
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
<!--

      <script src="js/calendar/moment.min.js"></script>
    <script src="js/calendar/fullcalendar.min.js"></script>
    <script src="js/calendar/fullcalendar-active.js"></script>

-->

</body>

</html>