<?php

namespace DoitOnlineMedia\Admin\App\Models;

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
        return $this->belongsTo('DoitOnlineMedia\Admin\App\Models\Profile');
    }

    public function documents()
    {
        return $this->hasMany('DoitOnlineMedia\Admin\App\Models\Document');
    }
}
