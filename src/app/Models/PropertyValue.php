<?php

namespace DoitOnlineMedia\Admin\App\Models;

use Illuminate\Database\Eloquent\Model;

class PropertyValue extends Model {

	protected $table = 'property_values';
	public $timestamps = true;

	public function property()
	{
		return $this->belongsTo('DoitOnlineMedia\Admin\App\Models\Property', 'property_id');
	}

}