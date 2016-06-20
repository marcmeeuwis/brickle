<?php

namespace  Doitonlinemedia\Admin\App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Krucas\Notification\Facades\Notification;

class ContentController extends Controller
{

    protected $documentRepository;

    public function __construct()
    {

    }

    public function index()
    {
        $documents = [];
        Notification::success('Success message');
        return view('admin::content.index', compact('documents'));
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
