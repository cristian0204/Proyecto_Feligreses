<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Prueba extends Model
{
    //
protected $table = 'prueba';

    protected $primaryKey = 'id';

    public $timestamps = false;

    protected $fillable = [
    	'feligreses_id','evento_id','fecha'
    ];

}