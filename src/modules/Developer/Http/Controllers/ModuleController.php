<?php //namespace DoitOnlineMedia\Admin\Modules\Developer\Http\Controllers;
//
//use App\Models\Module;
//use App\Repositories\DocumentTypes\DocumentTypesInterface;
//use Illuminate\Http\Request;
//use Illuminate\Support\Facades\File;
//use Pingpong\Modules\Routing\Controller;
//use App\Repositories\Module\ModuleInterface;
//
//class ModuleController extends Controller {
//
//
//    protected $modules;
//    protected $documentTypes;
//
//    public function __construct(ModuleInterface $modules, Request $request, DocumentTypesInterface $documentTypes)
//    {
//        $this->modules = $modules;
//        $this->documentTypes = $documentTypes;
//        $this->request = $request;
//    }
//
//    public function index()
//    {
//        return view('developer::backend.modules.index')->with('modules', $this->modules->all());
//    }
//
//	public function create()
//	{
//        $docTypes = $this->documentTypes->all();
//        $module = new Module;
//		return view('developer::backend.modules.add', compact('module', 'docTypes'));
//	}
//
//	public function store($module_id = null)
//	{
//        $name = $this->request->get('name');
//        $module = new Module;
//        if(!$name) {
//            $error = 'Vul een naam in';
//            return view('developer::backend.modules.add', compact('module', 'error'));
//        }
//
//        $module = $this->modules->save();
//
//        if(!$module) {
//            return view('developer::backend.modules.add')->with('module', new Module())->with('msg', 'Deze module bestaat al');
//        }
//
//        return redirect()->route('cms.developer.modules.index');
//	}
//
//    public function edit($module_id)
//    {
//        $module = $this->modules->get($module_id);
//        $docTypes = $this->documentTypes->all();
//        return view('developer::backend.modules.edit', compact('module', 'docTypes'));
//    }
//
//    public function destroy($module_id)
//    {
//        $module = $this->modules->get($module_id);
//
//        // delete children posts / properties / values / tabs
//
//        if($module && $module->deletable) {
//            $module->children()->delete();
//            $dir = studly_case($module->slug);
//            if($dir) {
//                if ($module->delete()) {
//                    File::deleteDirectory(base_path('modules/' . $dir));
//                }
//            }
//            return 'true';
//        }
//    }
//}