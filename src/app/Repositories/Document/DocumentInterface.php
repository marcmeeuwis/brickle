<?php

namespace Doitonlinemedia\Admin\App\Repositories\Document;

interface DocumentInterface
{
    public function all();
    public function getBySlug($slug);
    public function getFirstByDocumentTypeId($id);
    public function get($id);
    public function update($document, $name, $slug);
    public function store($name, $slug, $document_type_id, $parent_id);
    public function getAllByParentId($id);
    public function getAllByLevel($level);
}