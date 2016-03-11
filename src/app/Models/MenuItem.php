<?php

namespace Doitonlinemedia\Admin\App\Models;

use Illuminate\Database\Eloquent\Model;

class MenuItem extends Model {

	protected $table = 'menu_items';
	public $timestamps = false;

	public function menu()
	{
		return $this->belongsTo('Doitonlinemedia\Admin\App\Models\Menu');
	}

}