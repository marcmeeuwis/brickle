<?php

namespace Doitonlinemedia\Admin\App\Models;

use Illuminate\Database\Eloquent\Model;

class DocumentType extends Model {

	protected $table = 'document_types';
	public $timestamps = true;

	public function properties()
	{
		return $this->hasMany('Doitonlinemedia\Admin\App\Models\Property');
	}

	public function tabs()
	{
		return $this->hasMany('Doitonlinemedia\Admin\App\Models\Tab');
	}

}