<?php

namespace Doitonlinemedia\Admin\App\Models;

use Illuminate\Database\Eloquent\Model;

class DocumentSettings extends Model {

	protected $table = 'document_settings';
	public $timestamps = true;

	public function document()
	{
		return $this->belongsTo('Doitonlinemedia\Admin\App\Models\Document');
	}

}