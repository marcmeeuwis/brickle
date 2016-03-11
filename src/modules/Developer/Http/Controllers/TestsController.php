<?php namespace Doitonlinemedia\Admin\Modules\Developer\Http\Controllers;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Pingpong\Modules\Routing\Controller;

class TestsController extends Controller
{
    public function index()
    {
        return view('developer::backend.tests.index');
    }

    public function getTestResults()
    {
        $results = '[' . str_replace('}{', '},{', File::get(storage_path('logs/tests/results.json'))) . ']';
        unlink(storage_path('logs/tests/results.json'));
        file_put_contents(storage_path('logs/tests/results.json'), $results);
        $results = json_decode($results);
        return view('developer::backend.tests.results', compact('results'));
    }

    public function runTests()
    {
        $phpunit = new \PHPUnit_TextUI_TestRunner();
        try {
            $phpunit->run($phpunit->getTest(__DIR__.'/../../../../tests', '', 'Test.php'), array('jsonLogfile' => storage_path('logs/tests/results.json')));
        } catch (\PHPUnit_Framework_Exception $e) {
            $failed = $e->getMessage() . "\n";
            echo $failed;
        }
    }
}