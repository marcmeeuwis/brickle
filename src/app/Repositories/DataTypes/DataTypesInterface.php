<?php

namespace Doitonlinemedia\Admin\App\Repositories\DataTypes;

interface DataTypesInterface
{
    public function get($id);
    public function all();
}