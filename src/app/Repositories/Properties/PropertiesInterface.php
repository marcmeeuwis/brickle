<?php

namespace Doitonlinemedia\Admin\App\Repositories\Properties;

interface PropertiesInterface
{
    public function save($doctype_id);
    public function get($id);
    public function removeById($id);
    public function getAllByTypeId($id);
    public function getAllByTabId($id);
}