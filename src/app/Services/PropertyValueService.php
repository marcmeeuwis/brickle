<?php

namespace Doitonlinemedia\Admin\App\Services;

use Doitonlinemedia\Admin\App\Models\PropertyValue;
use Doitonlinemedia\Admin\App\Repositories\DataTypes\DataTypesRepository;
use Doitonlinemedia\Admin\App\Repositories\PropertyValues\PropertyValuesRepository;
use Illuminate\Support\Facades\Input;

class PropertyValueService
{
    protected $dataTypes;
    protected $propertyValues;

    public function __construct(DataTypesRepository $dataTypes, PropertyValuesRepository $propertyValues) {
        $this->dataTypes = $dataTypes;
        $this->propertyValues = $propertyValues;
    }

    public function save($document)
    {
        $properties = $document->documentType->properties->keyBy('alias');
        $dataTypes = $this->dataTypes->all()->keyBy('id');

        foreach($properties as $property) {
            $value = Input::get($property->alias);
            if($property->value === $value) continue;

            $pvalue = $this->propertyValues->getByPropertyAndDocumentId($property->id, $document->id);
            if(!$pvalue){
                $pvalue = new PropertyValue;
                $pvalue->property_id = $property->id;
                $pvalue->document_id = $document->id;
            }

            $value_type = $dataTypes->get($property->data_type_id)->value_type;

            $pvalue->{'data_'.$value_type} = $value;
            $pvalue->save();
        }
    }


}