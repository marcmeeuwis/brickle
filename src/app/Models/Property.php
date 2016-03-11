<?php

namespace Doitonlinemedia\Admin\App\Models;

use Illuminate\Database\Eloquent\Model;

class Property extends Model {

	protected $table = 'properties';
	public $timestamps = true;

	public function dataType()
	{
		return $this->hasOne('Doitonlinemedia\Admin\App\Models\DataType');
	}

	public function tab()
	{
		return $this->belongsTo('Doitonlinemedia\Admin\App\Models\Tab');
	}

}