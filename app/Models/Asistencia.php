<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Asistencia extends Model
{
    //
protected $table = 'prueba';

    protected $primaryKey = 'id';

    public $timestamps = false;

    protected $fillable = [
    	'evento_id', 'feligreses_id', 'fecha'
    ];

}

