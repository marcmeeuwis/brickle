<?php

namespace Doitonlinemedia\Admin\App\Repositories\DocumentTypes;

interface DocumentTypesInterface
{
    public function all();
    public function get($aliasOrId);
    public function save($id);
}