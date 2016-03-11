<?php

namespace DoitOnlineMedia\Admin\App\Models;

use Illuminate\Database\Eloquent\Model;

class Document extends Model {

	protected $table = 'documents';
	public $timestamps = true;

	public function documentType()
	{
		return $this->hasOne('DoitOnlineMedia\Admin\App\Models\DocType');
	}

	public function propertiesValues()
	{
		return $this->hasMany('DoitOnlineMedia\Admin\App\Models\PropertyValue');
	}

	public function template()
	{
		return $this->hasOne('DoitOnlineMedia\Admin\App\Models\Template');
	}

	public function settings()
	{
		return $this->hasOne('DoitOnlineMedia\Admin\App\Models\DocumentSettings', 'document_id');
	}

	public function documents()
	{
		return $this->hasMany('DoitOnlineMedia\Admin\App\Models\Document', 'parent_id');
	}

}