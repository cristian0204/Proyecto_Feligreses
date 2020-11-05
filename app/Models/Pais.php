<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pais extends Model
{
    
protected $table = 'pais';

    protected $primaryKey = 'id';

    public $timestamps = false;

    protected $fillable = [
    	'nombre'
    ];
}


