<?php

namespace Doitonlinemedia\Admin\App\Services;

use App\Repositories\Document\DocumentRepository;
use App\Repositories\DocumentTypes\DocumentTypesInterface;
use App\Repositories\DocumentTypes\DocumentTypesRepository;
use App\Repositories\Properties\PropertiesInterface;
use App\Repositories\Properties\PropertiesRepository;
use App\Repositories\Tabs\TabsInterface;
use App\Repositories\Tabs\TabsRepository;

class DocumentTypeService
{
    protected $documentTypes;
    protected $tabs;
    protected $properties;
    protected $documents;

    public function __construct(DocumentTypesRepository $documentTypes, TabsRepository $tabs, PropertiesRepository $properties, DocumentRepository $documents) {
        $this->documentTypes = $documentTypes;
        $this->tabs = $tabs;
        $this->properties = $properties;
        $this->documents = $documents;
    }

    public function createOrUpdate($id = null)
    {
        $docType = $this->documentTypes->save($id);
        if(!$id) {
            $this->tabs->save('Content', $docType->id, null);
        }else{
            $this->properties->save($docType->id);
        }

        return $docType;
    }

    public function all()
    {
        return $this->documentTypes->all();
    }

    public function get($id)
    {
        return $this->documentTypes->get($id);
    }

    public function destroy($id)
    {
        $document = $this->documents->getFirstByDocumentTypeId($id);

        if(count($document) > 0) {
            die('documents exists');
        }else{
            $this->documentTypes->destroy($id);
        }
    }
}