<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Como extends Model
{
    
protected $table = 'como_llego';

    protected $primaryKey = 'id';

    public $timestamps = false;

    protected $fillable = [
    	'atraves'
    ];

}


