<?php

/*
|--------------------------------------------------------------------------
| Web Routes 
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Auth::routes(); 
Route::get('/','InicioController@index');

Route::get('/home', 'InicioController@index')->name('home');

//PRUEBA DE RECUPERAR CONTRASEÑA
Route::post('recuperar','InicioController@recuperar');

//---------------------------------------------------

                              /******* TIPO DE DOCUMENTO*********************/

Route::get('tipo','TipoDocumentoController@index'); /******* Ruta de a la vista de TIPO DE DOCUMENTO *******/
Route::post('tipo/guardar','TipoDocumentoController@add'); /******* TIPO DOCUMENTO-INSERTAR DATOS*********/
Route::get('tipo/consultar/{id}','TipoDocumentoController@consultar'); /******* TIPO DOCUMENTO-CONSULTAR DATOS ******/
Route::post('tipo/modificar','TipoDocumentoController@modificar'); /******* TIPO DOCUMENTO-GUARDAR DATOS CONSULTAR**/
Route::get('tipo/delete/{id}', 'TipoDocumentoController@eliminar'); /******* TIPO DOCUMENTO-ELIMINAR DATOS *******/


/******* ESTADO CIVIL *********************/
Route::get('estado','EstadoController@index');
Route::post('estado/guardar','EstadoController@add');
Route::get('estado/consultar/{id}','EstadoController@consultar');
Route::post('estado/modificar','EstadoController@modificar');
Route::get('estado/delete/{id}', 'EstadoController@eliminar');

/******* EVENTO *********************/
Route::get('evento','EventoController@index');
Route::post('evento/guardar','EventoController@add');
Route::get('evento/consultar/{id}','EventoController@consultar');
Route::post('evento/modificar','EventoController@modificar');
Route::get('evento/delete/{id}', 'EventoController@eliminar');

/******* ASISTENCIA A EVENTO *********************/
Route::get('asistencia','AsistenciaController@index');
Route::post('asistencia/guardar','AsistenciaController@add');
Route::get('asistencia/delete/{id}', 'AsistenciaController@eliminar');
Route::get('asistencia/consultar/{id}','AsistenciaController@consultar');  
Route::post('asistencia/modificar','AsistenciaController@modificar');
/*** CONSULTAR ASISTENCIA ***/
Route::get('consultar','ConsultarAsistenciaController@index');
Route::post('consultar/consultar','ConsultarAsistenciaController@consultar'); 
Route::get('consultar/delete/{id}', 'AsistenciaController@eliminar');

/******* COMO LLEGO *********************/
Route::get('como','ComoController@index');
Route::post('como/guardar','ComoController@add');
Route::get('como/consultar/{id}','ComoController@consultar');
Route::post('como/modificar','ComoController@modificar');
Route::get('como/delete/{id}', 'ComoController@eliminar');

/* DATOS FELIGRESES */
Route::get('feligreses','FeligresesController@index');
Route::post('feligreses/guardar','FeligresesController@add');
Route::post('feligreses/guardar/datosf','FeligresesController@add_familiares');

//------------------------------------------------------------------------------
Route::post('feligreses/guardar/datosfG','FeligresesController@add_familiaresG');
//------------------------------------------------------------------------------

Route::get('pais/{id}','FeligresesController@departamento');
Route::get('departamento/{id}','FeligresesController@municipio');
Route::get('tablaDatos/{idFeligres}','FeligresesController@tablaContactos');
Route::get('feligreses/consultar/{id}','FeligresesController@consultar');

/*******  FAMILIARES *********************/
Route::get('datos','DatosFamiliaresController@index');
Route::get('datosFamiliares/consulta/{id}','FeligresesController@consulta');
Route::post('feligreses/modificar','FeligresesController@modificar');
Route::get('feligreses/delete/{id}', 'FeligresesController@eliminar');
Route::post('feligreses/modFamiliar','FeligresesController@modFamiliar');
Route::get('datosFamiliares/delete/{id}', 'FeligresesController@eliFamiliar'); 


/******* PAIS *********************/
Route::get('pais','PaisController@index');
Route::post('pais/guardar','PaisController@add');
Route::get('pais/consultar/{id}','PaisController@consultar');
Route::post('pais/modificar','PaisController@modificar');
Route::get('pais/delete/{id}', 'PaisController@eliminar');


/******* DEPARTAMENTO *********************/
Route::get('departamento','DepartamentoController@index');
Route::post('departamento/guardar','DepartamentoController@add');
Route::get('departamento/consultar/{id}','DepartamentoController@consultar');
Route::post('departamento/modificar','DepartamentoController@modificar');
Route::get('departamento/delete/{id}', 'DepartamentoController@eliminar');


/******* MUNICIPIO *********************/
Route::get('municipio','MunicipioController@index');
Route::get('municipio/{id}','MunicipioController@municipio');
Route::post('municipio/guardar','MunicipioController@add');
Route::get('municipio/consultar/{id}','MunicipioController@consultar');
Route::post('municipio/modificar','MunicipioController@modificar');
Route::get('municipio/delete/{id}', 'MunicipioController@eliminar');


/******* SEGURIDAD *********************/
Route::get('permisos','PermisosController@index');
Route::get('asignarPermisos','AsignarPermisosController@index');


/******* USUARIO *********************/
Route::get('usuario','UsuarioController@index');
Route::post('usuario/guardar','UsuarioController@add');
Route::get('usuario/delete/{id}', 'UsuarioController@eliminar');


Route::get('lista','ListaController@index');
Route::get('perfil','PerfilController@index');
Route::post('perfil/modificar','PerfilController@modificar');
Route::get('usuario/consultar/{id}','PerfilController@consultar');

/******* No se ha podido editar los datos del usuario *********************/
Route::post('modificar','PerfilController@modificar');


/******* Roles *********************/
Route::get('roles','RolesController@index');
Route::post('roles/guardar','RolesController@add');
Route::get('roles/consultar/{id}','RolesController@consultar');
Route::post('roles/modificar','RolesController@modificar');
Route::get('roles/delete/{id}', 'RolesController@eliminar');
Route::delete('/roles/{id}', 'RolesController@destroy');


/******* ROLES DE USUARIO *********************/
Route::get('rolesUsuario','RolesUsuarioController@index');
Route::post('rolesUsuario/guardar','RolesUsuarioController@add');
Route::get('rolesUsuario/delete/{id}', 'RolesUsuarioController@eliminar');

/**Falta**/
Route::get('rolesUsuario/consultar/{id}','RolesUsuarioController@consultar');
Route::post('rolesUsuario/modificar','RolesUsuarioController@modificar');



/***PERMISOS**/
Route::get('permisos','PermisosController@index');
Route::get('ListaPermisos','ListaPermisosController@index');


/***ASIGNAR PERMISOS**/
Route::get('AsPermisos','AsPermisosController@index');
Route::post('AsPermisos/guardar','AsPermisosController@add');
Route::get('permisosxrol/search/{id}','AsPermisosController@permisoxrol');
Route::post('permisosxrol/create','AsPermisosController@create');


/**CAMBIAR CONTRASEÑa**/
Route::get('cambiar','CambiarController@index');
Route::post('cambiar','CambiarController@cambiar_password');


Route::get('asistencia/persona/listar','AsistenciaController@listar_persona');


Route::get('test', ['as' => 'test', 'uses' => 'AlertController@show']);

//----------------------------------------------------

//Route::post('feligreses/guardarFamiliar','FeligresesController@guardarF');

