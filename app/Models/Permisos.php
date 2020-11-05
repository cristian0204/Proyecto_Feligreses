<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Permisos extends Model
{
    
protected $table = 'permissions';

    protected $primaryKey = 'id';

    public $timestamps = false;

    protected $fillable = [
    	'name' , 'display_name' , 'description'
    ];

}