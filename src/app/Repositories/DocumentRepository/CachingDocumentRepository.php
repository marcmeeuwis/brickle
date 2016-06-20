<?php

namespace Doitonlinemedia\Admin\App\Repositories\DocumentRepository;

use Illuminate\Contracts\Cache\Repository as Cache;

class CachingDocumentRepository implements DocumentRepository
{
    
    private $documentRepository;
    private $cache;
    private $modelName;
    public function __construct(DocumentRepository $documentRepository, Cache $cache)
    {
        $this->documentRepository = $documentRepository;    
        $this->cache = $cache; 
        $this->modelName = get_class($this->documentRepository->model);   
    }    
}