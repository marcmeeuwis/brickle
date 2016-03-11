<?php namespace Doitonlinemedia\Admin\Modules\Developer\Http\Controllers;


use Illuminate\Support\Facades\Input;
use Doitonlinemedia\Admin\Modules\Developer\Helpers\PropertyHelper;
use Doitonlinemedia\Admin\App\Models\Property;
use Doitonlinemedia\Admin\App\Models\Tab;
use Illuminate\Support\Facades\Request;
use Laracasts\Utilities\JavaScript\JavaScriptFacade as JavaScript;
use App\Services\DocumentTypeService;
use App\Services\PropertyService;
use Pingpong\Modules\Routing\Controller;

class DocumentTypeController extends Controller {

    protected $documentTypeService;
    protected $propertyService;

    public function __construct(DocumentTypeService $documentTypeService, PropertyService $propertyService)
    {
        $this->documentTypeService = $documentTypeService;
        $this->propertyService = $propertyService;
    }

    public function index()
    {
        $types = $this->documentTypeService->all();
        return view('developer::backend.documents.types.index', compact('types'));
    }

    public function create()
    {
        return view('developer::backend.documents.types.create');
    }

    public function store(Request $request, $id = null)
    {
        $docType = $this->documentTypeService->createOrUpdate($id);
        return redirect()->route('cms.developer.document.types.edit', [$docType->id]);
    }

    public function update(Request $request, $id)
    {
        return $this->store($request, $id);
    }

    public function edit($id)
    {
        $type = $this->documentTypeService->get($id);
        if(!$type) return redirect()->route('cms.developer.document.types.create');

        $properties = $this->propertyService->getAllByTypeId($id);
        $tabs = $type->tabs;
        $types = PropertyHelper::getPropertyTypes();


        JavaScript::put([
            'propertyrow' => base64_encode(PropertyHelper::getPropertyTableRow(new Property, $tabs, $types)->render()),
            'tabrow' => base64_encode(PropertyHelper::getTabTableRow(new Tab)->render()),
            'doctype_id' => $id,
            'tabs' => base64_encode(json_encode($tabs))
        ]);

        return view('developer::backend.documents.types.edit', compact('type', 'properties', 'tabs', 'types'));
    }

    public function destroy($id)
    {
        $this->documentTypeService->destroy($id);
        echo 'true';
    }
}