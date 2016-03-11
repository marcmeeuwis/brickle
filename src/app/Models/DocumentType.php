<?php

namespace DoitOnlineMedia\Admin\App\Models;

use Illuminate\Database\Eloquent\Model;

class DocumentType extends Model {

	protected $table = 'document_types';
	public $timestamps = true;

	public function properties()
	{
		return $this->hasMany('DoitOnlineMedia\Admin\App\Models\Property');
	}

	public function tabs()
	{
		return $this->hasMany('DoitOnlineMedia\Admin\App\Models\Tab');
	}

}