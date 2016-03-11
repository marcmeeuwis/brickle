<?php

namespace Doitonlinemedia\Admin\App\Repositories\PropertyValues;

interface PropertyValuesInterface
{
    public function getByPropertyAndDocumentId($property_id, $document_id);
    public function deleteByPropertyId($id);
    public function getByDocumentId($id);
    public function save($document_id);
}