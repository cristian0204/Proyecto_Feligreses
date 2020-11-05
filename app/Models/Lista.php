<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lista extends Model
{
    
protected $table = 'users';

    protected $primaryKey = 'id';

    public $timestamps = false;

    protected $fillable = [
    	'name' , 'email' , 'password'
    ];

}
