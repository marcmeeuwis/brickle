<?php

namespace Doitonlinemedia\Admin\App\Repositories\DocumentRepository;

use Doitonlinemedia\Admin\App\Repositories\BaseEloquentRepository;
use Doitonlinemedia\Admin\App\Models\Document;

class DocumentEloquentRepository extends BaseEloquentRepository implements DocumentRepository
{
    public $model = Document::class;
}
