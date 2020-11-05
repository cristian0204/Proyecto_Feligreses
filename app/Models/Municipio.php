<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Municipio extends Model
{
    //
protected $table = 'municipio';

    protected $primaryKey = 'id';

    public $timestamps = false;

    protected $fillable = [
    	'nombre','pais_id','departamento_id'
    ];

}
