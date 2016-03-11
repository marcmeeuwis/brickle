<?php

namespace  Doitonlinemedia\Admin\App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Doitonlinemedia\Admin\App\Repositories\Document\DocumentRepository;
use Krucas\Notification\Facades\Notification;

class ContentController extends Controller
{

    protected $documentRepository;

    public function __construct(DocumentRepository $documentRepository)
    {
        $this->documentRepository = $documentRepository;
    }

    public function index()
    {
        Notification::success('Success message');
        return view('admin::content.index');
    }

    public function create()
    {
        return view('admin::content.create');
    }

    public function edit($id)
    {
        return view('admin::content.edit');
    }

}
