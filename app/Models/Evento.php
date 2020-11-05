<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Evento extends Model
{
    protected $table = 'evento';

    protected $primaryKey = 'id';

    public $timestamps = false;

    protected $fillable = [
    	'nombre', 'descripcion'
    ];
}
