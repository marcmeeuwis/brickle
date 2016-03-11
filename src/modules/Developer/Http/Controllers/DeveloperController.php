<?php namespace Doitonlinemedia\Admin\Modules\Developer\Http\Controllers;

use Pingpong\Modules\Routing\Controller;

class DeveloperController extends Controller {


    public function __construct()
    {

    }
	
	public function index()
	{
		return view('developer::backend.index');
	}
}