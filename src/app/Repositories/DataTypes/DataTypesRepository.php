<?php

namespace Doitonlinemedia\Admin\App\Repositories\DataTypes;

use Doitonlinemedia\Admin\App\Models\DataType;
use Illuminate\Support\Facades\Cache;

class DataTypesRepository
{
    protected $dataType;

    public function __construct(DataType $dataType)
    {
        $this->dataType = $dataType;
    }

    public function clearCache()
    {
        Cache::forget('dataTypes');
    }

    public function all()
    {
        Cache::forget('dataTypes');
        return Cache::rememberForever('dataTypes', function() {
            return $this->dataType->all();
        });
    }

    /**
     * Get the data type by id
     * @param $id
     * @return mixed
     */
    public function get($id)
    {
        return $this->dataType->find($id);
    }
}
