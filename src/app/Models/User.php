<?php

namespace Doitonlinemedia\Admin\App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    protected $table = 'users';

    public $timestamps = true;

    protected $guarded = ['id'];

    protected $hidden = [
        'password', 'remember_token',
    ];

    public function profile()
    {
        return $this->belongsTo('Doitonlinemedia\Admin\App\Models\Profile');
    }

    public function documents()
    {
        return $this->hasMany('Doitonlinemedia\Admin\App\Models\Document');
    }
}
