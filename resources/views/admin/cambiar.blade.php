@guest
    <script type="text/javascript">location.href="/login";</script>
@else
    @extends('layouts.admin')

    @section('contenido')
    
<br> 
<br>
<br>

    <div class="main-content">
        <div class="container-fluid">
            <div class="panel panel-headline demo-icons">
                <div class="panel-heading">
                    <h3 >Cambiar Contraseña</h3>
                </div>
                <div class="panel-body">
                  <form id="frm" method="POST" action="">
                    {{ csrf_field() }}

                    <div class="form-group">
                      <label for="old">Anterior Contrase&ntilde;a</label>
                      <input type="password" name="AnteriorCorreo" id="old" class="form-control" placeholder="Anterior Contrase&ntilde;a..." maxlength="15" minlength="6">
                    </div>

                    <div class="form-group">
                      <label for="new">Nueva Contrase&ntilde;a</label>
                      <input type="password" name="NuevoCorreo" id="new" class="form-control" placeholder="Nueva Contrase&ntilde;a..." maxlength="15" minlength="6">
                    </div>

                    <div class="form-group">
                      <label for="confirmar">Confirmar Contrase&ntilde;a</label>
                      <input type="password" name="ConfirmarCorreo" id="confirmar" class="form-control" placeholder="Confirmar Contrase&ntilde;a..." maxlength="15" minlength="6" disabled="disabled">
                    </div>

                    <div class="form-group">
                      <button class="btn btn-primary" type="submit" title="Guardar" id="guardar">Guardar</button>
                      <button class="btn btn-danger" type="reset" title="Cancelar">Cancelar</button>
                    </div>

                  </form>
                </div>
              </div>
          </div>
    </div>

<script type="text/javascript" language="javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script src="js/sweetalert2.all.min.js"></script>
<link rel="stylesheet" href="js/sweetalert2.min.css"> 

    <script type="text/javascript">

$(document).ready(function() {
	$('#new').change(function() {
		    var strongRegex = new RegExp("^(?=.{8,})(?=.*[A-Z])(?=.*[a-z])(?=.*[0-9])(?=.*\\W).*$", "g");
		    if($(this).val().length<6){
			       //swal('La nueva contraseña debe contener mínimo 6 caracteres','','error');
             alert("error");
		    }else if (!strongRegex.test($(this).val())) {
            swal("La nueva contraseña debe contener al menos un número, letra mayúscula y caracteres especiales por su seguridad","","error");
     	  }else{
     		    $("#confirmar").attr('disabled',false);
     	  }
  });

    $("#guardar").click(function(e){
    	e.preventDefault();
    	var mensaje = '';
    	if($("#old").val()==''){
    		mensaje = 'El campo Anterior Contraseña es obligatorio\n';
    	}
    	if($("#new").val()==''){
    		mensaje= mensaje + 'El campo Nueva Contraseña es obligatorio\n';
    	}if($("#confirmar").val()==''){
    		mensaje = mensaje + 'El campo Confirmar Contraseña es obligatorio\n';
    	}
    	if(mensaje!==''){
    		swal(mensaje,'','error');
    		return false;
    	}
    	if($("#new").val()!==$("#confirmar").val()){
    		swal('Las nueva contraseña y confirmar contraseña no coinciden','','error');
    		return false;
    	}
    	var form = $("#frm");
		  var url = form.attr('action')+"/cambiar";
		  var data = $("#frm").serialize();
		  $.ajax({
		  	type: "POST",
		   	url: url,
		   	data: data,
		   	success: function(result) {
		    	if(result==0){
		    		swal('La anterior contraseña es incorrecta. Inténtalo de nuevo.','','error');
		    	}else if(result==1){
		    		swal('Se Actualizó La Contraseña Satisfactoriamente.','','success');
    				$("#frm")[0].reset();
		    	}
			},
			error: function(data){
				console.log(data);
				swal('Error','Ha ocurrido un error','error');
			}
		});
    });
});

</script>




    @endsection

    @endguest
