<?php

namespace App\Repositories\Tabs;

interface TabsInterface
{
    public function get($id);
    public function save($name, $doctype_id, $tab_id);
    public function getAllByTypeId($id);
    public function remove($id);
}