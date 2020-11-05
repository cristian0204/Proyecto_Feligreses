<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AsPermisos extends Model
{
    //
protected $table = 'permission_role';

    protected $primaryKey = 'id';

    public $timestamps = false;

    protected $fillable = [
    	'permission_id','role_id'
    ];

}