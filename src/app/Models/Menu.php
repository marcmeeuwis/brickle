<?php

namespace Doitonlinemedia\Admin\App\Models;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model {

	protected $table = 'menus';
	public $timestamps = true;

	public function menuItems()
	{
		return $this->hasMany('Doitonlinemedia\Admin\App\Models\MenuItem');
	}

}