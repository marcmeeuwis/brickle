<?php

namespace Doitonlinemedia\Admin\App\Repositories\PropertyValues;

use Doitonlinemedia\Admin\App\Models\PropertyValue;
use Doitonlinemedia\Admin\App\Repositories\BaseRepository;
use Doitonlinemedia\Admin\App\Repositories\DataTypes\DataTypesInterface;
use Doitonlinemedia\Admin\App\Repositories\DataTypes\DataTypesRepository;
use Doitonlinemedia\Admin\App\Repositories\Document\DocumentRepository;
use Illuminate\Support\Facades\Input;

class PropertyValuesRepository extends BaseRepository
{
    protected $model = 'Doitonlinemedia\Admin\App\Models\PropertyValue';


    public function getByPropertyAndDocumentId($property_id, $document_id)
    {
        return $this->model->where('property_id', $property_id)->where('document_id', $document_id)->first();
    }

    public function deleteByPropertyId($id)
    {
        $this->model->where('property_id', $id)->delete();
    }

    public function getByDocumentId($id)
    {
        return $this->model->where('document_id', $id)->get();
    }


}
