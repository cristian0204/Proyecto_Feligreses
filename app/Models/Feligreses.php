<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Feligreses extends Model
{
    protected $table = 'Feligreses';

    protected $primaryKey = 'id';

    public $timestamps = false;

    protected $fillable = [
    	'nombre', 'apellido', 'identificacion', 'fecha_nacimiento', 'movil', 'fijo', 'correo', 'profesion', 'contacto', 'direccion', 'genero', 'municio_id', 'como_llego_id',
    	'tipo_documento_id', 'estado_id'
    ];
}
