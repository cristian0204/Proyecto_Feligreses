<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DatosFamiliares extends Model
{
    //


 protected $table = 'datos_familiares';

    protected $primaryKey = 'id';

    public $timestamps = false;

    protected $fillable = [
    	//'nombre', 'apellido', 'fecha_nacimiento', 'movil','correo', 'parentesco', 'contacto_emergencia','feligreses_id'
    	'nombre', 'apellido', 'fecha_nacimiento', 'movil','correo', 'parentesco', 'contacto_emergencia'
    ];

}

