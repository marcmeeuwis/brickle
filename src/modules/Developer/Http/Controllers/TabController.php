<?php namespace DoitOnlineMedia\Admin\Modules\Developer\Http\Controllers;

use App\Repositories\DocumentTypes\DocumentTypesRepository;
use App\Repositories\Properties\PropertiesRepository;
use App\Repositories\Tabs\TabsRepository;
use Illuminate\Support\Facades\Input;
use \Modules\Developer\Helpers\PropertyHelper;
use App\Models\Property;
use App\Repositories\DocumentTypes\DocumentTypesInterface;
use App\Repositories\Tabs\TabsInterface;
use Pingpong\Modules\Routing\Controller;
use App\Repositories\Properties\PropertiesInterface;

class TabController extends Controller {

    protected $documentType;
    protected $properties;
    protected $tabs;

    public function __construct(TabsRepository $tabRepo, DocumentTypesRepository $documentTypesRepo, PropertiesRepository $propertiesRepo)
    {
        $this->documentType = $documentTypesRepo;
        $this->properties = $propertiesRepo;
        $this->tabs = $tabRepo;
    }

    public function store()
    {
        $tab_id = (Input::get('tab_id')) ? Input::get('tab_id') : null;
        $doctype_id = Input::get('doctype_id');
        $tab = $this->tabs->save(Input::get('name'), $doctype_id, $tab_id);
        if($tab){
            $type = $this->documentType->get($doctype_id);
            $tabs = $type->tabs;
            $types = PropertyHelper::getPropertyTypes();

            $output['tab_id'] = $tab->id;
            $output['property_row'] = base64_encode(PropertyHelper::getPropertyTableRow(new Property, $tabs, $types));

            echo json_encode($output);
        }
    }

    public function destroy($tab_id = null)
    {
        echo json_encode($this->tabs->remove($tab_id));
    }
}