@guest
     <script type="text/javascript">location.href="/login";</script>

@else

@extends('layouts.admin')

@section('contenido')


<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

 <script src="https://code.jquery.com/jquery-1.12.4.js"></script> 
 <script src="https://code.jquery.com/jquery-1.9.1.js"></script>    
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

  <script src="https://johnny.github.io/jquery-sortable/js/jquery-sortable.js"></script>

<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>


  <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>

  <script>
  $( function() {
    $( "#sortable1, #sortable2" ).sortable({
      connectWith: ".connectedSortable"
    }).disableSelection();
  } );
  </script>


      <style type="text/css">
  
               #cuadro1{    
                    height: 400px;
                    overflow-y: auto;
               }
               #cuadro2{
                    height: 400px;
                    overflow-y: auto;
               }
               #sortable1, #sortable2 {
                    width: 370px;
                    min-height: 350px;
                    list-style-type: none;
                    margin: 0;
                    padding: 5px 0 0 0;
                    float: center;
                    margin-right: 10px;
               }
               #sortable1 li, #sortable2 li {
                    margin: 0 5px 5px 5px;
                    padding: 5px;
                    font-size: 1.2em;
                    width: 370px;
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
                                <li><span class="bread-blod">Permisos</span>
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
                <div class="panel panel-headline demo-icons">
                         <div class="panel-heading">
                              <h3> Permisos por Rol</h3>
                         </div>
                         <div class="panel-body">
                              <form method="POST" id="form_search" class="form-horizontal" action="permisosxrol">
                                   <div class="form-group">
                                        <label id="rol1_r" for="tipo" class="col-sm-1 control-label hor-form">Rol:</label>
                                        <div class="col-sm-11">
                                             <select id="rol" class="form-control" name="rol" onchange="permisos()">
                                                  <option value="0">Seleccione un Rol</option>
                                                  @foreach($rol as $rol)
                                                       <option value="{{$rol->id}}">{{$rol->name}}</option>
                                                  @endforeach
                                             </select>
                                        </div>
                                   </div>
                              </form>
                              <br>
                              <div class="row">
                                   <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <form method="POST" name="roles" autocomplete="false" action="permisosxrol/create">
                                             {{ csrf_field() }}
                                             <center>
                                                  <button class="btn btn-primary" type="submit" title="Guardar" id="guardar">Guardar</button> 
                                                  <br>
                                                  <br>
                                                  <input type="hidden" name="rol_id" id="rol_id">
                                             </center>
                                             <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                                  <div class = "panel panel-primary">
                                                       <div class = "panel-heading">
                                                            <h3 class = "panel-title ">Permisos Por Rol</h3>
                                                       </div>
                                                       <div class="panel-body" id="cuadro1">
                                                            <center>
                                                                 <div id="sortable1" class="connectedSortable"></div>
                                                            </center>
                                                       </div>
                                                  </div>
                                             </div>
                                        </form>
                                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                             <div class = "panel panel-primary" >
                                                  <div class = "panel-heading">
                                                       <h3 class = "panel-title">Permisos sin otorgar</h3>
                                                  </div>    
                                                  <div class = "panel-body" id="cuadro2">
                                                       <center>
                                                            <div id="sortable2" class="connectedSortable"></div>
                                                       </center>
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





<script type="text/javascript">  
    
      $(document).on('ready',function(){
        $('#sortable1 li').draggable();
      });


</script>

          
         <!-- Datatable-->
          <script>
               function permisos(){
                  var rol = $("#rol").val();
                    $('#rol_id').val(rol);
                    var form = $("#form_search");
                    var obj = 'sortable1';
                    var obj2 = 'sortable2';
                    var url = form.attr('action')+'/search/'+rol;
                    $.ajax({'url': url, success: function(result){
                           $('#sortable1').html('');
                           $('#sortable2').html('');
                      $.each(result[0], function(i, item){
                              $('#' + obj).append('<li class="btn btn-default ui-state-default"><input type="hidden" name="rolotorgado[]" value="'+item.permission_id+'">'+item.nombre_permiso+'</li>');
                         });
                         $.each(result[1], function(a, item2){
                              $('#' + obj2).append('<li class="btn btn-default ui-state-highlight" ><input type="hidden" name="rolotorgado[]" value="'+item2.id+'">'+item2.display_name+'</li>');
                         });
                    }});
               }

               $("#guardar").click(function(e){
                    if($("#rol").val()=="0"){
                         swal("Error","El campo rol es obligatorio","error");
                         e.preventDefault();
                    }
               });
          </script>


 
@endsection
@endguest
