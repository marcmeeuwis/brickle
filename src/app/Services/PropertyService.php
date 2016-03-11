<?php

namespace Doitonlinemedia\Admin\App\Services;

use Doitonlinemedia\Admin\App\Repositories\Properties\PropertiesRepository;

class PropertyService
{
    protected $properties;
    protected $dataTypes;
    protected $propertyValues;

    public function __construct(PropertiesRepository $properties) {
        $this->properties = $properties;
    }

    public function getAllByTypeId($id)
    {
        return $this->properties->getAllByTypeId($id);
    }
}