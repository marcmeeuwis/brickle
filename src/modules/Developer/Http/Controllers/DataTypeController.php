<?php namespace Doitonlinemedia\Admin\Modules\Developer\Http\Controllers;

use Doitonlinemedia\Admin\App\Repositories\DataTypes\DataTypesInterface;
use Doitonlinemedia\Admin\App\Repositories\DataTypes\DataTypesRepository;
use Illuminate\Http\Request;

use App\Http\Requests;
use Pingpong\Modules\Routing\Controller;

class DataTypeController extends Controller
{
    protected $dataTypes;

    public function __construct(DataTypesRepository $dataTypes)
    {
        $this->dataTypes = $dataTypes;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $types = $this->dataTypes->all();
        return view('developer::backend.datatypes.index', compact('types'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
