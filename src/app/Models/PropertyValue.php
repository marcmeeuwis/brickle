<?php

namespace Doitonlinemedia\Admin\App\Models;

use Illuminate\Database\Eloquent\Model;

class PropertyValue extends Model {

	protected $table = 'property_values';
	public $timestamps = true;

	public function property()
	{
		return $this->belongsTo('Doitonlinemedia\Admin\App\Models\Property', 'property_id');
	}

}