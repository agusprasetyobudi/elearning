<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class RolePermission extends Model
{
    //
    protected $primayKey = 'user_id';
    protected $table = 'role_user';
    protected $fillable = ['user_id','role_id','user_type','name'];
    public $timestamps = false;

    public function user()
    {
        return $this->hasMany('App\User','id','user_id');
    }

    public function Role()
    {
        return $this->hasMany('App\Role','id','role_id');
    }

}
