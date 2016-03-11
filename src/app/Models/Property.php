<?php

namespace DoitOnlineMedia\Admin\App\Models;

use Illuminate\Database\Eloquent\Model;

class Property extends Model {

	protected $table = 'properties';
	public $timestamps = true;

	public function dataType()
	{
		return $this->hasOne('DoitOnlineMedia\Admin\App\Models\DataType');
	}

	public function tab()
	{
		return $this->belongsTo('DoitOnlineMedia\Admin\App\Models\Tab');
	}

}