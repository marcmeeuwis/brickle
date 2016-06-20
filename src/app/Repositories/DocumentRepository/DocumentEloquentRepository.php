<?php

namespace App\Repositories\DocumentRepository;

use App\Repositories\BaseEloquentRepository;
use Doitonlinemedia\Admin\App\Models\Document;

class DocumentEloquentRepository extends BaseEloquentRepository implements DocumentEloquentRepositoryInterface
{
    protected $model = Document::class;
}
