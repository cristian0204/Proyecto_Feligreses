@extends('layouts.admin')

@section('contenido') 

<link rel="stylesheet" href="css/datapicker/datepicker3.css">

<link rel="stylesheet" href="js/sweetalert2.min.css">

<link rel="stylesheet" href="css/tabs.css">

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">

<link rel="stylesheet" href="css/modals.css">

<style type="text/css">
    @media (min-width: 900px) {
        #modal-content {
            -webkit-box-shadow: 0 2px 3px rgba(0, 0, 0.125);
            box-shadow: 0 2px 3px rgba(0, 0, 0, 0.125);
            width: 180%;
            top: 5%;
            left: -30%;
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
                                <li><a href="home">Inicio</a> <span class="bread-slash">/</span>
                                </li>
                                <li><span class="bread-blod">Feligreses</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

            <div class="row">
                @if(Auth::User()->can('crearPersona'))
                 <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                     Feligreses <a class="btn btn-success bnt-xs" href="#" data-toggle="modal" data-target="#PrimaryModalalert1">Agregar</a>
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
                    <h3>DATOS FELIGRESES</h3>
                    <table id="example" class="table table-striped table-bordered" style="width:100% ; margin: 1">
                        <thead>
                            <th>Id</th>
                            <th>Nombre</th>
                            <th>Apellido</th>
                            <th>Tipo Documento</th>
                            <th>Identificacion</th>
                            <th>Fecha De Nacimiento</th>
                            <th>Movil</th>
                            <th>Fijo</th>
                            <th>Correo</th>
                            <th>Profesion</th>
                            <th>Estado</th>
                            <th>Formas de conocernos</th>
                           
                            <th>Opciones</th>
                        </thead>


                        <tbody>
                            @foreach ($feligreses as $feligreses)
                                <tr>
                                    <td>{{$feligreses->id}}</td>
                                    <td>{{$feligreses->nombre}}</td>
                                    <td>{{$feligreses->apellido}}</td>
                                    <td>{{$feligreses->tipo}}</td>
                                    <td>{{$feligreses->identificacion}}</td>
                                    <td>{{$feligreses->fecha_nacimiento}}</td>
                                    <td>{{$feligreses->movil}}</td>
                                    <td>{{$feligreses->fijo}}</td>
                                    <td>{{$feligreses->correo}}</td>
                                    <td>{{$feligreses->profesion}}</td>
                                    <td>{{$feligreses->estado}}</td>
                                    <td>{{$feligreses->atraves}}</td>
                                    <th>
                                            
                                            @if(Auth::User()->can('eliminarPersona'))
                                            <button class="fa fa-trash-o btn-danger btn-sm" type="submit" data-toggle="modal" data-target="" onclick="eliminar({{$feligreses->id}})"></button>
                                            @endif

                                            @if(Auth::User()->can('editarPersona'))
                                            <button class="fa fa-pencil-square-o  btn-info btn-sm" class="btn btn-success bnt-xs" href="#" data-toggle="modal" data-target="#Modal2" aria-hidden onclick="editar({{ 
                                            $feligreses->id}} )"></button>
                                            @endif
                                    </th>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

                            <br>
                            <br>
                            <h1>DATOS FAMILIARES</h1>
                            <!------------------------------------------------------->
            <div class="row">
                @if(Auth::User()->can('crearPersona'))
                 <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 btn-add" style="display: none;">
                    <a class="btn btn-success bnt-xs" href="#" data-toggle="modal" data-target="#GF">Agregar</a>
                 </div>
                 @endif
            </div>
                        <br>
<!------------------------------------------------------->
                            <table id="example2" class="table table-striped table-bordered" style="   width:100% ; margin: 1">
                                    <thead>
                                       <th>#</th>
                                       <th>Nombre</th>
                                        <th>Apellido</th>
                                        <th>Fecha De Nacimiento</th>
                                        <th>Movil</th>
                                        <th>Correo</th>
                                        <th>Parentesco</th>
                                        <th>Contacto Emergencia</th>
                                        <th>Opciones</th>
                                    </thead>
                            </table>
                    </div>
            </div>
        </div>
    </div>

<br>
<br>

        <div id="PrimaryModalalert1" class="modal modal-edu-general default-popup-PrimaryModal fade" role="dialog" data-backdrop="static" data-keyboard="false">
            <div class="modal-dialog">
                <div class="modal-content" id="modal-content">
                    <div class="modal-close-area modal-close-df">
                        <a class="close" data-dismiss="modal" href="#"><i class="fa fa-close"></i></a>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="admintab-wrap edu-tab1 mg-t-30">
                                    <ul class="nav nav-tabs custom-menu-wrap custon-tab-menu-style1">
                                        <li class="active"><a data-toggle="tab" href="#TabProject"><span class="edu-icon edu-analytics tab-custon-ic"></span>Datos Feligreses</a></li>
                                        <li><a data-toggle="tab" href="#TabDetails"><span class="edu-icon edu-analytics-arrow tab-custon-ic"></span>Datos Familiares</a></li>
                                    </ul>
                                    <div class="tab-content">
                                        <div id="TabProject" class="tab-pane in active animated flipInX custon-tab-style1">
                                            <div class="col-lg-12">
                                                <div class="col-lg-3">
                                                    <div class="form-group" style="text-align: left;">
                                                        <label for="nombre">Tipo Documento</label>
                                                        <select class="form-control" id="tipo" name="tipo">
                                                            <option value="0">Seleccione una opción</option>
                                                            @foreach ($tipo as $tipo)
                                                                <option value="{{$tipo->id}}">{{$tipo->nombre}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-lg-3">
                                                    <div class="form-group" style="text-align: left;">
                                                        <label for="apellido">Identificación</label>
                                                        <input type="text" name="identificacion" class="form-control" id="identificacion" placeholder="Número Identificación">
                                                    </div>
                                                </div>
                                                <div class="col-lg-3" style="text-align: left;">
                                                    <div class="form-group">
                                                        <label for="nombre">Nombre</label>
                                                        <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Nombre"  onkeypress="return soloLetras(event)">
                                                    </div>
                                                </div>
                                                <div class="col-lg-3">
                                                    <div class="form-group" style="text-align: left;">
                                                        <label for="apellido">Apellido</label>
                                                        <input type="text" name="nombre" class="form-control" id="apellido" placeholder="Apellido" onkeypress="return soloLetras(event)">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="col-lg-3" style="text-align: left;">
                                                    <div class="form-group data-custon-pick" id="data_3">
                                                        <label>Fecha de Nacimiento</label>
                                                        <div class="input-group date">
                                                            <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                                            <input type="text" class="form-control" value="2019-01-23" name="fechaNa" id="fechaNa">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-3">
                                                    <div class="form-group" style="text-align: left;">
                                                        <label for="nombre">Genero</label>
                                                        <select class="form-control" id="genero" name="genero">
                                                            <option value="0">Seleccione una opción</option>
                                                            <option>Masculino</option>
                                                            <option>Femenino</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-lg-3">
                                                    <div class="form-group" style="text-align: left;">
                                                        <label for="nombre">Estado Civil</label>
                                                        <select class="form-control" id="estado" name="estado">
                                                            <option value="0">Seleccione una opción</option>
                                                            @foreach ($estado as $estado)
                                                                <option value="{{$estado->id}}">{{$estado->nombre}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div> 
                                                <div class="col-lg-3">
                                                    <div class="form-group" style="text-align: left;">
                                                        <label for="nombre">Profesión</label>
                                                        <input type="text" name="profesion" class="form-control" id="profesion" placeholder="Profesión" onkeypress="return soloLetras(event)">
                                                    </div>
                                                </div>
                                            </div>  
                                            <div class="col-lg-12">
                                                <div class="col-lg-3" style="text-align: left;">
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
                                                <div class="col-lg-3" style="text-align: left;">
                                                    <div class="form-group">
                                                        <label for="nombre">Departamento</label>
                                                        <select class="form-control" id="departamento" name="departamento" onchange="cambio_municipio();">   
                                                            <option value="0">Seleccione un departamento</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-lg-3" style="text-align: left;">
                                                    <div class="form-group">
                                                        <label for="nombre">municipio</label>
                                                        <select class="form-control" id="municipio" name="municipio">
                                                            <option value="0">Seleccione un municipio</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-lg-3" style="text-align: left;">
                                                    <div class="form-group">
                                                        <label for="nombre">Dirección</label>
                                                        <input type="text" class="form-control" name="direccion" id="direccion" placeholder="Dirección">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="col-lg-3">
                                                    <div class="form-group" style="text-align: left;">
                                                        <label for="telefono_fijo">Telefono fijo</label>
                                                        <input type="text" class="form-control" data-mask="999-9999" placeholder="Telefono" name="telefeno" id="telefono">
                                                    </div>
                                                </div>
                                                <div class="col-lg-3">
                                                    <div class="form-group" style="text-align: left;">
                                                        <label for="celular">Celular</label>
                                                        <input type="text" class="form-control" data-mask="(999) 999-9999" placeholder="Celular" name="celular" id="celular">
                                                    </div>
                                                </div>
                                                <div class="col-lg-3" style="text-align: left;">
                                                    <div class="form-group">
                                                        <label for="nombre">Correo</label>
                                                        <input type="text" class="form-control" name="correo" id="correo" placeholder="ejemplo@hotmail.com" onchange="validarEmail();">
                                                    </div>
                                                </div>
                                                <div class="col-lg-3">
                                                    <div class="form-group" style="text-align: left;">
                                                        <label for="nombre">Como Llego</label>
                                                        <select class="form-control" id="como" name="como">
                                                            <option value="0">Seleccione una opción</option>
                                                            @foreach ($como as $como)
                                                                <option value="{{$como->id}}">{{$como->atraves}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="TabDetails" class="tab-pane animated flipInX custon-tab-style1">
                                            <form id="datosF" name="datosF">
                                                {{ csrf_field() }}
                                                <button id="agregarDatos" type="button" class="btn btn-primary" title="Agregar Nuevo">
                                                    <i class="fa fa-plus fa-lg"></i>
                                                </button>
                                                <table class="table table-responsive width200" id="tablaD">
                                                    <thead>
                                                        <th>Nombre</th>
                                                        <th>Apellido</th>
                                                        <th>Fecha de nacimiento</th>
                                                        <th>Movil</th>
                                                        <th>Correo</th>
                                                        <th>Parentesco</th>
                                                        <th>Contacto de emergencia</th>
                                                        <th></th>
                                                    </thead>
                                                    <tbody>
                                                        <td>
                                                            <input type="text" name="nombre_familiar[]" id="nombre_familiar1" class="form-control" onkeypress="return soloLetras1(event)" placeholder="Nombre">
                                                        </td>
                                                        <td>
                                                            <input type="text" name="apellido_familiar[]" id="apellido_familiar1" class="form-control" onkeypress="return soloLetras1(event)" placeholder="Apellido">
                                                        </td>
                                                        <td>
                                                            <div class="form-group">
                                                                <div class="input-group date">
                                                                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                                                    <input type="text" class="form-control" name="fecha_familiar[]" id="fecha_familiar1" data-mask="9999-99-99" placeholder="aaaa/mm/dd" onchange="validar()">
                                                                </div>                               
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <input type="text" name="movil_familiar[]" id="movil_familiar1" class="form-control" data-mask="(999)999-9999" placeholder="Telefono Movil">
                                                        </td>
                                                        <td>
                                                            <input type="text" name="correo_familiar[]" id="correo_familiar1" class="form-control" onchange="validarEmail1(1);" placeholder="Correo">
                                                        </td>
                                                        <td>
                                                            <input type="text" placeholder="Parentesco" name="parentesco_familiar[]" id="parentesco_familiar1" class="form-control">

                                                        </td>
                                                        <td>
                                                            <select class="form-control" name="contacto_familiar[]" id="contacto_familiar1">
                                                                <option>Si</option>
                                                                <option>No</option>
                                                            </select>
                                                        </td>
                                                        <td></td>
                                                    </tbody>
                                                </table>
                                                <input type="hidden" name="numDatosFamiliares" id="familiares1" value="1">
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn-success btn btn-flat" onclick="guardar()">Guardar</button>
                    </div> 
                </div>
            </div>
        </div>

<!------------------------------------------------------->
 <div id="GF" class="modal modal-edu-general default-popup-PrimaryModal fade" role="dialog" data-backdrop="static" data-keyboard="false">
            <div class="modal-dialog">
                <div class="modal-content" id="modal-content">
                    <div class="modal-close-area modal-close-df">
                        <a class="close" data-dismiss="modal" href="#"><i class="fa fa-close"></i></a>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="admintab-wrap edu-tab1 mg-t-30">
                                    <ul class="nav nav-tabs custom-menu-wrap custon-tab-menu-style1">
                                        
                                        <li><a data-toggle="tab" href="#TabDetails"><span class="edu-icon edu-analytics-arrow tab-custon-ic"></span>Datos Familiares</a></li>
                                    </ul>
                                    <div class="tab-content">
                                        <div id="TabProject" class="tab-pane in active animated flipInX custon-tab-style1">
                                        
                                            <form id="datosFG" name="datosFG">
                                                {{ csrf_field() }}
                                            
                                                <table class="table table-responsive width200" id="tablaD">
                                                    <thead>
                                                        <th>Nombre</th>
                                                        <th>Apellido</th>
                                                        <th>Fecha de nacimiento</th>
                                                        <th>Movil</th>
                                                        <th>Correo</th>
                                                        <th>Parentesco</th>
                                                        <th>Contacto de emergencia</th>
                                                        <th></th>
                                                    </thead>
                                                    <tbody>
                                                        <td>
                                                            <input type="text" name="nombre_familiar[]" id="nombre_familiarG" class="form-control" onkeypress="return soloLetras1(event)" placeholder="Nombre">
                                                        </td>
                                                        <td>
                                                            <input type="text" name="apellido_familiar[]" id="apellido_familiarG" class="form-control" onkeypress="return soloLetras1(event)" placeholder="Apellido">
                                                        </td>
                                                        <td>
                                                            <div class="form-group">
                                                                <div class="input-group date">
                                                                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                                                    <input type="text" class="form-control" name="fecha_familiar[]" id="fecha_familiarG" data-mask="9999-99-99" placeholder="aaaa/mm/dd" onchange="validarG()">
                                                                </div>                               
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <input type="text" name="movil_familiar[]" id="movil_familiarG" class="form-control" data-mask="(999)999-9999" placeholder="Telefono Movil">
                                                        </td>
                                                        <td>
                                                            <input type="text" name="correo_familiar[]" id="correo_familiarG" class="form-control" onchange="validarEmailG();" placeholder="Correo">
                                                        </td>
                                                        <td>
                                                            <input type="text" placeholder="Parentesco" name="parentesco_familiar[]" id="parentesco_familiarG" class="form-control">

                                                        </td>
                                                        <td>
                                                            <select class="form-control" name="contacto_familiar[]" id="contacto_familiarG">
                                                                <option>Si</option>
                                                                <option>No</option>
                                                            </select>
                                                        </td>
                                                        <td></td>
                                                    </tbody>
                                                </table>
                                             <!--   <input type="hidden" name="numDatosFamiliaresG" id="familiaresG" value="1">  --->
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn-success btn btn-flat" onclick="guardarFamilar()">Guardar</button>
                    </div> 
                </div>
            </div>
        </div>





<!------------------------------------------------------->



        <div id="Modal2" class="modal modal-edu-general default-popup-PrimaryModal fade" role="dialog" data-backdrop="static" data-keyboard="false">
            <div class="modal-dialog">
                <div class="modal-content" id="modal-content">
                    <div class="modal-close-area modal-close-df">
                        <a class="close" data-dismiss="modal" href="#"><i class="fa fa-close"></i></a>
                    </div>
                    <div class="modal-body">
                         
                        <div class="row">
                            <form autocomplete="off" id="frm_add1" action="modificar" method="POST">
                                       {{ csrf_field() }} 
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="admintab-wrap edu-tab1 mg-t-30">
                                    <ul class="nav nav-tabs custom-menu-wrap custon-tab-menu-style1">
                                        <li class="active"><a data-toggle="tab" href="#TabProject"><span class="edu-icon edu-analytics tab-custon-ic"></span>Editar Datos Feligreses</a></li>
                                       
                                    </ul>
                                    <div class="tab-content">
                                        <div id="TabProject" class="tab-pane in active animated flipInX custon-tab-style1">
                                             <div class="col-lg-12">
                                                <div class="col-lg-3">
                                                    <div class="form-group" style="text-align: left;">
                                                        <label for="nombre">Tipo Documento</label>
                                                        <select class="form-control" id="tipo1" name="tipo1" onchange="cambio_tipo();">
                                                            <option value="0">Seleccione una opción</option>
                                                            @foreach ($tipo1 as $tipo)
                                                                <option value="{{$tipo->id}}">{{$tipo->nombre}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-lg-3">
                                                    <div class="form-group" style="text-align: left;">
                                                        <label for="apellido">Identificación</label>
                                                        <input type="text" name="identificacion1" class="form-control" id="identificacion1" placeholder="Número Identificación">
                                                    </div>
                                                </div>
                                                <div class="col-lg-3" style="text-align: left;">
                                                    <div class="form-group">
                                                        <label for="nombre">Nombre</label>
                                                        <input type="text" class="form-control" name="nombre1" id="nombre1" placeholder="Nombre"  onkeypress="return soloLetras(event)">
                                                    </div>
                                                </div>
                                                <div class="col-lg-3">
                                                    <div class="form-group" style="text-align: left;">
                                                        <label for="apellido">Apellido</label>
                                                        <input type="text" name="apellido1" class="form-control" id="apellido1" placeholder="Apellido" onkeypress="return soloLetras(event)">
                                                    </div>
                                                </div>
                                            </div>
                                              <div class="col-lg-12">
                                                <div class="col-lg-3" style="text-align: left;">
                                                    <div class="form-group data-custon-pick" id="data_3">
                                                        <label>Fecha de Nacimiento</label>
                                                        <div class="input-group date">
                                                            <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                                            <input type="text" class="form-control" value="2019-01-23" name="fechaNa1" id="fechaNa1">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-3">
                                                    <div class="form-group" style="text-align: left;">
                                                        <label for="nombre">Genero</label>
                                                        <select class="form-control" id="genero1" name="genero1">
                                                            <option value="0">Seleccione una opción</option>
                                                            <option>Masculino</option>
                                                            <option>Femenino</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-lg-3">
                                                    <div class="form-group" style="text-align: left;">
                                                        <label for="nombre">Estado Civil</label>
                                                        <select class="form-control" id="estado1" name="estado1" onchange="cambio_estado();">
                                                            <option value="0">Seleccione una opción</option>
                                                            @foreach ($estado1 as $estado)
                                                                <option value="{{$estado->id}}">{{$estado->nombre}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div> 
                                                <div class="col-lg-3">
                                                    <div class="form-group" style="text-align: left;">
                                                        <label for="nombre">Profesión</label>
                                                        <input type="text" name="profesion1" class="form-control" id="profesion1" placeholder="Profesión" onkeypress="return soloLetras(event)">
                                                    </div>
                                                </div>
                                            </div>    
                                            <div class="col-lg-12">
                                                <div class="col-lg-3" style="text-align: left;">
                                                    <div class="form-group">
                                                        <label for="nombre">País</label>
                                                        <select class="form-control" id="pais1" name="pais1" onchange="cambio_departamento1();">   
                                                            <option value="0">Seleccione un país</option>
                                                            @foreach ($pais1 as $pais)
                                                                <option value="{{$pais->id}}">{{$pais->nombre}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-lg-3" style="text-align: left;">
                                                    <div class="form-group">
                                                        <label for="nombre">Departamento</label>
                                                        <select class="form-control" id="departamento1" name="departamento1">   
                                                            <option value="0">Seleccione un departamento</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-lg-3" style="text-align: left;">
                                                    <div class="form-group" style="text-align: left;">
                                                    <label for="nombre">Municipio</label>
                                                    <select class="form-control" id="municipio1" name="municipio1" onchange="cambio_muni();">   
                                                            <option value="0">Seleccione un municipio</option>
                                                        </select>
                                                    
                                                </div>
                                                </div>
                                                <div class="col-lg-3" style="text-align: left;">
                                                    <div class="form-group">
                                                        <label for="nombre">Dirección</label>
                                                        <input type="text" class="form-control" name="direccion1" id="direccion1" placeholder="Dirección">
                                                    </div>
                                                </div>
                                            </div>
                                             <div class="col-lg-12">
                                                <div class="col-lg-3">
                                                    <div class="form-group" style="text-align: left;">
                                                        <label for="telefono_fijo">Telefono fijo</label>
                                                        <input type="text" class="form-control" data-mask="999-9999" placeholder="Telefono" name="telefeno1" id="telefono1">
                                                    </div>
                                                </div>
                                                <div class="col-lg-3">
                                                    <div class="form-group" style="text-align: left;">
                                                        <label for="celular">Celular</label>
                                                        <input type="text" class="form-control" data-mask="(999) 999-9999" placeholder="Celular" name="celular1" id="celular1">
                                                    </div>
                                                </div>
                                                <div class="col-lg-3" style="text-align: left;">
                                                    <div class="form-group">
                                                        <label for="nombre">Correo</label>
                                                        <input type="text" class="form-control" name="correo1" id="correo1" placeholder="ejemplo@hotmail.com" onchange="validarEmail();">
                                                    </div>
                                                </div>
                                                <div class="col-lg-3">
                                                    <div class="form-group" style="text-align: left;">
                                                        <label for="nombre">Como Llego</label>
                                                        <select class="form-control" id="como1" name="como1">
                                                            <option value="0">Seleccione una opción</option>
                                                            @foreach ($como1 as $como)
                                                                <option value="{{$como->id}}">{{$como->atraves}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                     
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


        <div id="Modal3" class="modal modal-edu-general default-popup-PrimaryModal fade" role="dialog" data-backdrop="static" data-keyboard="false">
            <div class="modal-dialog">
                <div class="modal-content" id="modal-content">
                    <div class="modal-close-area modal-close-df">
                        <a class="close" data-dismiss="modal" href="#"><i class="fa fa-close"></i></a>
                    </div>
                    <div class="modal-body">
                        <form autocomplete="off" id="frm_add1" action="modFamiliar" method="POST">
                                       {{ csrf_field() }}
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="admintab-wrap edu-tab1 mg-t-30">
                                    <ul class="nav nav-tabs custom-menu-wrap custon-tab-menu-style1">
                                        <li class="active"><a data-toggle="tab" href="#TabProject"><span class="edu-icon edu-analytics tab-custon-ic"></span>Editar Datos Feligreses</a></li>
                                       
                                    </ul>
                                    <div class="tab-content">
                                        <div id="TabProject" class="tab-pane in active animated flipInX custon-tab-style1">
                                                                                       
                                        
                                                
                                               
                                                <table class="table table-responsive width200" id="tablaD">
                                                    <thead>
                                                        <th>Nombre</th>
                                                        <th>Apellido</th>
                                                        <th>Fecha de nacimiento</th>
                                                        <th>Movil</th>
                                                        <th>Correo</th>
                                                        <th>Parentesco</th>
                                                        <th>Contacto de emergencia</th>
                                                        <th></th>
                                                    </thead>
                                                    <tbody>
                                                        <td>
                                                            <input type="text" name="nombre_familiar2[]" id="nombre_familiar2" class="form-control" onkeypress="return soloLetras1(event)" placeholder="Nombre">
                                                        </td>
                                                        <td>
                                                            <input type="text" name="apellido_familiar2[]" id="apellido_familiar2" class="form-control" onkeypress="return soloLetras1(event)" placeholder="Apellido">
                                                        </td>
                                                        <td>
                                                            <div class="form-group">
                                                                <div class="input-group date">
                                                                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                                                    <input type="text" class="form-control" name="fecha_familiar2[]" id="fecha_familiar2" data-mask="9999-99-99" placeholder="aaaa/mm/dd" onchange="validar()">
                                                                </div>                               
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <input type="text" name="movil_familiar2[]" id="movil_familiar2" class="form-control" data-mask="(999)999-9999" placeholder="Telefono Movil">
                                                        </td>
                                                        <td>
                                                            <input type="text" name="correo_familiar[]" id="correo_familiar2" class="form-control" onchange="validarEmail1(1);" placeholder="Correo">
                                                        </td>
                                                        <td>
                                                            <input type="text" placeholder="Parentesco" name="parentesco_familiar[]" id="parentesco_familiar2" class="form-control">

                                                        </td>
                                                        <td>
                                                            <select class="form-control" name="contacto_familiar[]" id="contacto_familiar2">
                                                                <option>Si</option>
                                                                <option>No</option>
                                                            </select>
                                                        </td>
                                                        <td></td>
                                                    </tbody>
                                                </table>
                                                <input type="hidden" name="numDatosFamiliares1" id="familiares" value="1">
                                                <input type="hidden" id="id">
                                            </form>
                                        </div>
                                     
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn-success btn btn-flat" onclick="modFamiliar()">Guardar</button>
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
                                 <form action="{{URL::to('/')}}/feligreses/{{ $feligreses->id }}" method="POST" id="frm_delete"> > 
                                      {{ csrf_field() }}
                                      {{ method_field('DELETE') }}

                                    <input type="hidden" id="id_delete" value="{{ $feligreses->id }}">
                                    <button class="fa fa-trash-o btn-danger btn-sm" type="submit"> <br> ELIMINAR</button>
                                 </form>   
                            </div>               
                        </div>             
            </div>
                  
        </div>
          </div>
        </div>

 <div  id="ModalEliminar2" class="modal modal-edu-general default-popup-PrimaryModal fade" role="dialog" data-backdrop="static" data-keyboard="false">
        <div class="modal-dialog"  style="width: 300px">
        <div class="modal-content" id="modal-content">
                <div class="modal-close-area modal-close-df">
                    <a class="close" data-dismiss="modal" href="#"><i class="fa fa-close"></i></a>
                </div>
            <div class="modal-body">
                    <center> <h4> Estás seguro? <br> <br> No podrás revertir esto! </h4>  </center>
                        <div class="col-lg-12">
                            <div class="col-lg-12">
                                 <form  method="POST" id="frm_delete1"> > 
                                      {{ csrf_field() }}
                                      {{ method_field('DELETE') }}

                                    <input type="hidden" id="id_delete1">
                                    <button class="fa fa-trash-o btn-danger btn-sm" type="submit"> <br> ELIMINAR</button>

                                   <!-- <input type="hidden" id="id"> -->
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

<script src="js/input-mask/jasny-bootstrap.min.js"></script>

<script src="js/datapicker/bootstrap-datepicker.js"></script>

<script src="js/datapicker/datepicker-active.js"></script>

<script src="js/sweetalert2.all.min.js"></script>



<script src="js/sweetalert2.min.js"></script>

<script src="js/tab.js"></script>

<script type="text/javascript" >


        var idFeligres = 0;

 function editar(id){
        
        $.ajax({
                type:"get",
                url: "feligreses/consultar/"+id,
                success: function(result){

                     $.each(result,function(i,item){
                        $("#nombre1").val(item.nombre);

                        $("#tipo1").val(item.tipo_documento);
 
                        $("#estado1").val(item.estado);
                        
                        $("#como1").val(item.como_llego);
                        
                        $("#pais1").val(item.pais);
                        cambio_departamento1(item.departamento, item.municipio);
                    
                        $("#apellido1").val(item.apellido);

                        $("#identificacion1").val(item.identificacion);

                        $("#correo1").val(item.correo);

                        $("#celular1").val(item.movil);

                        $("#telefono1").val(item.fijo);

                        $("#direccion1").val(item.direccion);

                        $("#profesion1").val(item.profesion);

                        $("#fechaNa1").val(item.fecha_nacimiento);

                        $("#genero1").val(item.genero);

                        $("#id").val(item.id);

                    })
        
                },
              
            });
    }

 function editarFamiliar(id){
        
        $.ajax({
                type:"get",
                url: "datosFamiliares/consulta/"+id,
                success: function(result){

                     $.each(result,function(i,item){
                        $("#nombre_familiar2").val(item.nombre);

                        $("#apellido_familiar2").val(item.apellido);
                        
                        $("#fecha_familiar2").val(item.fecha_nacimiento);
                                            
                        $("#movil_familiar2").val(item.movil);

                        $("#correo_familiar2").val(item.correo);

                        $("#parentesco_familiar2").val(item.parentesco);

                        $("#contacto_familiar2").val(item.contacto_emergencia);

                        $("#id").val(item.id);

                    })
        
                },
              
            });
    }

 

    $(document).ready(function(){
        $('#example').DataTable({
            "language":{
                "url": "//cdn.datatables.net/plug-ins/1.10.19/i18n/Spanish.json"
            }
        });

        $('#example2').DataTable({
            "destroy": true,
            "language":{
                "url": "//cdn.datatables.net/plug-ins/1.10.19/i18n/Spanish.json"
            }
        });

        var Anterior=0;

        $("body").on("click","#example tbody tr",function(){
            idFeligres = $('td', this).eq(0).text();
            if(idFeligres>0){
                $(".btn-add").show();
            }else{
                $(".btn-add").hide();
            }
            if(Anterior!==0){$(Anterior).css("color","#000000");}
            $('td', this).css("color", "#58ACFA");
            Anterior = $('td', this);
            var table = $("#example2").DataTable({
                "destroy": true,
                "language":{
                    "url": "//cdn.datatables.net/plug-ins/1.10.19/i18n/Spanish.json"
                }
            });
            table.clear().draw();
            $.ajax({'url':'/tablaDatos/'+idFeligres, success: function(result){
                var num=1;
                $.each(result, function(i, item){
                    table.row.add([
                        num,
                        item.nombre,
                        item.apellido,
                        item.fecha_nacimiento,
                        item.movil,
                        item.correo,
                        item.parentesco,
                        item.contacto_emergencia,
                        ' @if(Auth::User()->can('eliminaFamiliares')) <button class="fa fa-trash-o btn-danger btn-sm" type="submit" data-toggle="modal" data-target="ModalEliminar2" onclick="eliFamiliar('+item.id+')"></button>@endif  @if(Auth::User()->can('editarFamiliares'))<button class="fa fa-pencil-square-o  btn-info btn-sm"  data-toggle="modal" data-target="#Modal3" aria-hidden onclick="editarFamiliar('+item.id+')"></button>@endif'  

                    ]).draw(false);
                    num = num+1;
                });
            }});
        });
    });



var contador = 1;
    $("#agregarDatos").click(function(){
        contador = contador + 1;
        var numFilas = $("#tablaD tbody tr").length;
        var contador_familiar = $("#familiares").val();
        $("#tablaD tbody tr:last").after('<tr><td><input type="text" name="nombre_familiar[]" id="nombre_familiar'+contador+'" class="form-control" placeholder="Nombre" onkeypress="return soloLetras1(event);"></td><td><input type="text" name="apellido_familiar[]" id="apellido_familiar'+contador+'" class="form-control" placeholder="Apellido" onkeypress="return soloLetras1(event);"></td>'
            +'<td><div class="form-group data-custon-pick" id="data_3"><div class="input-group date"><span class="input-group-addon"><i class="fa fa-calendar"></i></span><input type="text" class="form-control"onchange="validar()" placeholder="aaaa/mm/dd" data-mask="9999-99-99" name="fecha_familiar[]" id="fecha_familiar'+contador+'"></div></div>'
            +'<td><input type="text" data-mask="(999)999-9999" name="movil_familiar[]" id="movil_familiar'+contador+'" class="form-control" placeholder="Telefono Movil"></td><td><input type="text" name="correo_familiar[]" id="correo_familiar'+contador+'" class="form-control" placeholder="ejemplo@hotmail.com" onchange="validarEmail1('+contador+');"></td><td><input type="text" name="parentesco_familiar[]" id="parentesco_familiar'+contador+'" class="form-control" placeholder="Parentesco"></td><td><select class="form-control" name="contacto_familiar[]" id="contacto_familiar'+contador+'"><option>Si</option><option>No</option></select></td><td class="eliminar3"><button class="btn btn-danger btn-xs" title="Eliminar"><i class="fa fa-trash-o fa-lg" aria-hidden="true"></i></button></td></tr>');
        $("input[name=numDatosFamiliares]").val(parseFloat(contador_familiar)+1);
    });

    $(document).on("click",".eliminar3",function(){
        var conntador_restante = $("#familiares").val();
        var parent = $(this).parent().get(0);
        $(parent).remove();
        $("#familiares").val(conntador_restante-1);
    });

  
/******* VALIDAR LOS CAMPOS DE SOLO EMAIL@***/
function validarEmail(){

        var texto = $("#correo").val();
        var regex = /^[-\w.%+]{1,64}@(?:[A-Z0-9-]{1,63}\.){1,125}[A-Z]{2,63}$/i;
  
        if (!regex.test(texto)) {
            Swal("Error","Correo invalido","error");
            $("#correo").val('');
        } 
    }

function validarEmail1(num){

        var texto = $("#correo_familiar"+num).val();
        var regex = /^[-\w.%+]{1,64}@(?:[A-Z0-9-]{1,63}\.){1,125}[A-Z]{2,63}$/i;
  
        if (!regex.test(texto)) {
            Swal("Error","Correo invalido","error");
            $("#correo_familiar"+num).val('');
        } 

    }
//-----------------------------------------
function validarEmailG(){

        var texto = $("#correo_familiarG").val();
        var regex = /^[-\w.%+]{1,64}@(?:[A-Z0-9-]{1,63}\.){1,125}[A-Z]{2,63}$/i;
  
        if (!regex.test(texto)) {
            Swal("Error","Correo invalido","error");
            $("#correo_familiarG"+num).val('');
        } 

    }
//----------------------------------------

/**
 * Funcion para validar una fecha
 */
function isValidDate(day,month,year)
    {
        var dteDate;
     
        month=month-1;
     
        dteDate=new Date(year,month,day);
     
        //Devuelva true o false...
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
     
function validar()
    {    
        var fecha=document.getElementById("fecha_familiar1").value;
        if(validate_fecha(fecha)!=true){        
            swal('Fecha','fecha Incorrecta','error');
            $("#fecha_familiar1").val('');
        }
    }
//------------------------------
function validarG()
    {    
        var fecha=document.getElementById("fecha_familiarG").value;
        if(validate_fecha(fecha)!=true){        
            swal('Fecha','fecha Incorrecta','error');
            $("#fecha_familiarG").val('');
        }
    }
//-----------------------------

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

function soloLetras1(e){
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
                url: "/feligreses/delete/"+id,  
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


function eliFamiliar(id){
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
                url: "/datosFamiliares/delete/"+id, 
                success: function(result){
                    if(result=="1"){
                           swal("Error","Se Ha Presentado Un Error de Dato","error");
                        
                    }else{
                        swal("Se Ha Eliminado Correctamente","","success").then((value)=>{
                            location.reload();
                        });

                        

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

/**NO FUNCIONA GUARDAR DATOS FAMILIAR


 ***/

/**------------------------------------------------------------------------**/
function guardarFamilar(){
        var res= validarcampos3();
        if(res!=""){
            Swal('Error','Los siguientes campos son obligatorios: <br>'+res,'error');
        }else{
            var token = "<?=csrf_token(); ?>";
            var datosF = $('#datosFG').serialize();                     
                
                        $.ajax({
                            type:"POST",
                            url:"feligreses/guardar/datosfG",
                         //   data: datosFG,
                               data:{

                             //  numDatos: $("#numDatosFamiliaresG").val(),
                               nombre: $("#nombre_familiarG").val(),
                               apellido: $("#apellido_familiarG").val(),
                               fecha_nacimiento: $("#fecha_familiarG").val(),
                               movil: $("#movil_familiarG").val(),
                               correo: $("#correo_familiarG").val(),                       
                               parentesco: $("#parentesco_familiarG").val(),
                               id_f: idFeligres,
                               contacto_familiar: $("#contacto_familiarG").val(), _token: token},

                                 success: function(result){
                                if(result==0){
                                    swal("Se Ha Registrado Correctamente","","success").then((value)=>{
                                        location.reload();
                                    });
                                }else{
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
/**------------------------------------------------------------------------**/

function guardar(){
        var res= validarcampos();
        if(res!=""){
            Swal('Error','Los siguientes campos son obligatorios: <br>'+res,'error');
        }else{
            var token = "<?=csrf_token(); ?>";
            var datosF = $('#datosF').serialize();            
            $.ajax({
                type:"POST",
                url:"feligreses/guardar",
                data:{nombre: $("#nombre").val(),
                       apellido: $("#apellido").val(),
                       identificacion: $("#identificacion").val(),
                       fecha_nacimiento: $("#fechaNa").val(),
                       movil: $("#celular").val(),
                       fijo: $("#telefono").val(),
                       correo: $("#correo").val(),
                       profesion: $("#profesion").val(),
                       genero: $("#genero").val(),
                       direccion: $("#direccion").val(),
                       tipo_documento_id: $("#tipo").val(),
                       estado_id: $("#estado").val(),
                       como_llego_id: $("#como").val(),
                       municipio_id: $("#municipio").val(),
                        _token: token},
                success: function(result){
                    if(result==0){
                        
                        $.ajax({
                            type:"POST",
                            url:"feligreses/guardar/datosf",
                            data: datosF,
                            success: function(result){
                                if(result==0){
                                    swal("Se Ha Registrado Correctamente","","success").then((value)=>{
                                        location.reload();
                                    });
                                }else{
                                    swal("Error","Se Ha Presentado Un Error","error");
                                }
                            },
                            error: function(data){
                                console.log(data);
                                swal("Error","Se Ha Presentado Un Error","error");
                            }
                        });
                    }else if(result==2){
                        swal("Ops","Esta persona ya existe","info");
                    }else{
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
          var datosF = $('#datosF').serialize(); 
            $.ajax({
                type:"POST",
                url: "feligreses/modificar",
                data:{nombre: $("#nombre1").val(),
                       apellido: $("#apellido1").val(),
                       identificacion: $("#identificacion1").val(),
                       fecha_nacimiento: $("#fechaNa1").val(),
                       movil: $("#celular1").val(),
                       fijo: $("#telefono1").val(),
                       correo: $("#correo1").val(),
                       profesion: $("#profesion1").val(),
                       genero: $("#genero1").val(),
                       direccion: $("#direccion1").val(),
                       tipo_documento_id: $("#tipo1").val(),
                       estado_id: $("#estado1").val(),
                       como_llego_id: $("#como1").val(),
                       municipio_id: $("#municipio1").val(), _token: token, id:$("#id").val()},

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

function modFamiliar(){
        var res= validarcampos2();
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
                url: "feligreses/modFamiliar",
                data:{nombre: $("#nombre_familiar2").val(),
                       apellido: $("#apellido_familiar2").val(),
                       fecha_nacimiento: $("#fecha_familiar2").val(),
                       movil: $("#movil_familiar2").val(),
                       correo: $("#correo_familiar2").val(),
                       parentesco: $("#parentesco_familiar2").val(),
                       contacto: $("#contacto_familiar2").val(), _token: token, id:$("#id").val()},

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

function validarcampos(){
        var mensaje = '';
        if($("#tipo").val()=="0"){
            mensaje += '<br>Tipo Documento';
        }

        if($("#identificacion").val()==""){
            mensaje += '<br>Numero Documento';
        }

        if($("#nombre").val()==""){
            mensaje += '<br>Nombre';
        }

        if($("#apellido").val()==""){
           mensaje +='<br>Apellido';
        }

        if($("#fechaNa").val()==""){
            mensaje +='<br>Fecha Nacimiento';
        }

        if($("#estado").val()=="0"){
            mensaje +='<br>Estado Civil';
        }

        if($("#genero").val()=="0"){
            mensaje +='<br>Genero';
        }

        if($("#profesion").val()==""){
            mensaje +='<br>Profesión';
        }

        if($("#pais").val()=="0"){
            mensaje +='<br>País';
        }

        if($("#departamento").val()=="0"){
            mensaje +='<br>Departamento ';
        }

        if($("#municipio").val()=="0"){
            mensaje +='<br>Municipio ';
        }

        if($("#direccion").val()==""){
            mensaje +='<br>Dirección ';
        }

        if($("#telefono").val()==""){
           mensaje +='<br>Telefono Fijo';
        }

        if($("#celular").val()==""){
            mensaje +='<br>Celular';
        }

        if($("#correo").val()==""){
            mensaje +='<br>Correo';
        }

        if($("#como").val()==""){
            mensaje +='<br>como Llego ';
        }

        if($("#nombre_familiar1").val()==""){
            mensaje +='<br>Nombre Familiar ';
        }

        if($("#apellido_familiar1").val()==""){
            mensaje +='<br>Apellido Familiar ';

        }if($("#fecha_familiar1").val()==""){
            mensaje +='<br>Fecha de nacimiento Familiar ';

        }

        if($("#movil_familiar1").val()==""){
            mensaje +='<br>movil Familiar ';
        }

        if($("#correo_familiar1").val()==""){
            mensaje +='<br>Correo Familiar ';
        }

        if($("#parentesco_familiar1").val()==""){
            mensaje +='<br>Parentesco Familiar ';
        }

        return mensaje;
    }

function validarcampos1(){
        var mensaje = '';
        if($("#tipo1").val()=="0"){
            mensaje += '<br>Tipo Documento';
        }

        if($("#identificacion1").val()==""){
            mensaje += '<br>Numero Documento';
        }

        if($("#nombre1").val()==""){
            mensaje += '<br>Nombre';
        }

        if($("#apellido1").val()==""){
           mensaje +='<br>Apellido';
        }

        if($("#fechaNa1").val()==""){
            mensaje +='<br>Fecha Nacimiento';
        }

        if($("#estado1").val()=="0"){
            mensaje +='<br>Estado Civil';
        }

        if($("#genero1").val()=="0"){
            mensaje +='<br>Genero';
        }

        if($("#profesion1").val()==""){
            mensaje +='<br>Profesión';
        }

        if($("#pais1").val()=="0"){
            mensaje +='<br>País';
        }

        if($("#departamento1").val()=="0"){
            mensaje +='<br>Departamento ';
        }

        if($("#municipio1").val()=="0"){
            mensaje +='<br>Municipio ';
        }

        if($("#direccion1").val()==""){
            mensaje +='<br>Dirección ';
        }

        if($("#telefono1").val()==""){
           mensaje +='<br>Telefono Fijo';
        }

        if($("#celular1").val()==""){
            mensaje +='<br>Celular';
        }

        if($("#correo1").val()==""){
            mensaje +='<br>Correo';
        }

        if($("#como1").val()==""){
            mensaje +='<br>como Llego ';
        }

        return mensaje;
    }

function validarcampos2(){
        var mensaje = '';
       

        if($("#nombre_familiar2").val()==""){
            mensaje +='<br>Nombre Familiar ';
        }

        if($("#apellido_familiar2").val()==""){
            mensaje +='<br>Apellido Familiar ';

        }if($("#fecha_familiar2").val()==""){
            mensaje +='<br>Fecha de nacimiento Familiar ';

        }

        if($("#movil_familiar2").val()==""){
            mensaje +='<br>movil Familiar ';
        }

        if($("#correo_familiar2").val()==""){
            mensaje +='<br>Correo Familiar ';
        }

        if($("#parentesco_familiar2").val()==""){
            mensaje +='<br>Parentesco Familiar ';
        }

         if($("#contacto_familiar2").val()==""){
            mensaje +='<br>Contacto de emergencia ';
        }

        return mensaje;
    }
//----------------------------------------------------------
function validarcampos3(){
        var mensaje = '';
       
        if($("#nombre_familiarG").val()==""){
            mensaje +='<br>Nombre Familiar ';
        }

        if($("#apellido_familiarG").val()==""){
            mensaje +='<br>Apellido Familiar ';

        }if($("#fecha_familiarG").val()==""){
            mensaje +='<br>Fecha de nacimiento Familiar ';

        }

        if($("#movil_familiarG").val()==""){
            mensaje +='<br>movil Familiar ';
        }

        if($("#correo_familiarG").val()==""){
            mensaje +='<br>Correo Familiar ';
        }

        if($("#parentesco_familiarG").val()==""){
            mensaje +='<br>Parentesco Familiar ';
        }

        return mensaje;
    }
//-----------------------------------------------------------------
function cambio_tipo(){
        var id = $("#tipo1").val();
        var url = '/tipo/'+id;
        $.ajax({'url':url, success: function(result){
            $("#tipo1").find('option').remove().end();
            $("#tipo1").append(new Option('Seleccione una opción', '0'));
            $.each(result, function(i, item){
                $("#tipo1").append(new Option(item.nombre, item.id));
                if(item.id==id_tipo){
                    $("#tipo1").val(id_tipo);
                }
            });
        }});
    }

function cambio_estado(){
        var id = $("#estado1").val();
        var url = '/estado/'+id;
        $.ajax({'url':url, success: function(result){
            $("#estado1").find('option').remove().end();
            $("#estado1").append(new Option('Seleccione una opción', '0'));
            $.each(result, function(i, item){
                $("#estado1").append(new Option(item.nombre, item.id));
                if(item.id==id_estado){
                    $("#estado1").val(id_estado);
                }
            });
        }});
    }

function cambio_como(){
        var id = $("#como1").val();
        var url = '/como/'+id;
        $.ajax({'url':url, success: function(result){
            $("#como1").find('option').remove().end();
            $("#como1").append(new Option('Seleccione una opción', '0'));
            $.each(result, function(i, item){
                $("#como1").append(new Option(item.nombre, item.id));
                if(item.id==id_como){
                    $("#como1").val(id_como);
                }
            });
        }});
    }

function cambio_muni(id_municipio){
        var id = $("#departamento1").val();
        var url = '/municipio/'+id;
        $.ajax({'url':url, success: function(result){
            $("#municipio1").find('option').remove().end();
            $("#municipio1").append(new Option('Seleccione un municipio', '0'));
            $.each(result, function(i, item){
                $("#municipio1").append(new Option(item.nombre, item.id));
                if(item.id==id_municipio){
                    $("#municipio1").val(id_municipio);
                }
            });
        }});
    }

function cambio_departamento1(id_departamento, id_municipio){
        var id = $("#pais1").val();
        var url = '/pais/'+id;
        $.ajax({'url':url, success: function(result){
            $("#departamento1").find('option').remove().end();
            $("#departamento1").append(new Option('Seleccione un departamento', '0'));
            $.each(result, function(i, item){
                $("#departamento1").append(new Option(item.nombre, item.id));
                if(item.id==id_departamento){
                    $("#departamento1").val(id_departamento);
                    cambio_muni(id_municipio);
                }
            });
        }});
        
    }

</script>


@endsection