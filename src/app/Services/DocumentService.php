<?php namespace Doitonlinemedia\Admin\App\Services;

use Doitonlinemedia\Admin\App\Models\DocumentSettings;
use Doitonlinemedia\Admin\App\Repositories\Document\DocumentRepository;
use Doitonlinemedia\Admin\App\Repositories\PropertyValues\PropertyValuesRepository;
use Illuminate\Support\Facades\Input;

class DocumentService
{
    protected $documents;
    protected $values;
    protected $propertyValueService;

    public function __construct(DocumentRepository $documents, PropertyValuesRepository $values, PropertyValueService $propertyValueService)
    {
        $this->documents = $documents;
        $this->values = $values;
        $this->propertyValueService = $propertyValueService;
    }

    public function store($document_type_id, $parent_id = 0) {
        $parent = ($parent_id) ? $this->documents->getById($parent_id) : null;
        $name = Input::get('name');
        $slug = $this->generateUniqueSlug($name, $parent_id);

        $document = $this->documents->store($name, $slug, $document_type_id, $parent);
        $this->propertyValueService->save($document);
        return $document;
    }

    public function update($request, $id) {
        $name = Input::get('name');
        $document = $this->documents->getById($id);
        $slug = $this->generateUniqueSlug($name, $document->id);
        $document = $this->documents->update($document, $name, $slug);
        $this->propertyValueService->save($document);
        return $document;
    }

    private function generateUniqueSlug($name, $parent_id)
    {
        $slug = str_slug($name);
        $count = $this->documents->model()->join('document_settings', 'document_settings.document_id', '=', 'documents.id')->where('parent_id', $parent_id)->whereRaw("slug RLIKE '^{$slug}(-[0-9]+)?$'")->count();
        return $count ? "{$slug}-{$count}" : $slug;
    }
}