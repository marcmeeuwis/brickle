<?php

namespace Doitonlinemedia\Admin\App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Doitonlinemedia\Admin\App\Repositories\DocumentRepository\DocumentRepository;


class TestController extends Controller
{
    
    private $documents;
    public function __construct(DocumentRepository $documents)
    {
        $this->documents = $documents;
    }

    public function index()
    {   
        $result = $this->documents->all();
        var_dump($result);
    }
}
