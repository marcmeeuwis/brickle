<?php

namespace Doitonlinemedia\Admin\App\Services;

use Doitonlinemedia\Admin\App\Repositories\Document\DocumentRepository;
use Doitonlinemedia\Admin\App\Repositories\DocumentTypes\DocumentTypesInterface;
use Doitonlinemedia\Admin\App\Repositories\DocumentTypes\DocumentTypesRepository;
use Doitonlinemedia\Admin\App\Repositories\Properties\PropertiesInterface;
use Doitonlinemedia\Admin\App\Repositories\Properties\PropertiesRepository;
use Doitonlinemedia\Admin\App\Repositories\Tabs\TabsInterface;
use Doitonlinemedia\Admin\App\Repositories\Tabs\TabsRepository;

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