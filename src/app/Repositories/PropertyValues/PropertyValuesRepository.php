<?php

namespace App\Repositories\PropertyValues;

use DoitOnlineMedia\Admin\App\Models\PropertyValue;
use App\Repositories\BaseRepository;
use App\Repositories\DataTypes\DataTypesInterface;
use App\Repositories\DataTypes\DataTypesRepository;
use App\Repositories\Document\DocumentRepository;
use Illuminate\Support\Facades\Input;

class PropertyValuesRepository extends BaseRepository
{
    protected $model = 'DoitOnlineMedia\Admin\App\Models\PropertyValue';


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
