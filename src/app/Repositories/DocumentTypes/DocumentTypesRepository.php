<?php

namespace Doitonlinemedia\Admin\App\Repositories\DocumentTypes;

use Doitonlinemedia\Admin\App\Models\DocumentType;
use Doitonlinemedia\Admin\App\Repositories\BaseRepository;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;

class DocumentTypesRepository extends BaseRepository
{
    protected $model = 'Doitonlinemedia\Admin\App\Models\DocumentType';
    protected $relationships = [];

    public function get($aliasOrId){
        $field = (!is_numeric($aliasOrId)) ?  'alias' : 'id';
        return $this->model->where($field, '=', $aliasOrId)->with('tabs')->first();
    }

    public function save($id) {
        $rules = array(
            'name' => 'required|max:254',
            'alias' => 'required|max:254'
        );
        $v = Validator::make(Input::all(), $rules);

        if ($v->passes())
        {
            $docType = ($id) ? DocumentType::where('id', $id)->first() : new DocType;
            $docType->name =Input::get('name');
            $docType->alias = Input::get('alias');
            $docType->save();
            return $docType;
        }
        return $v->errors();
    }

    public function destroy($id)
    {
        $this->model->destroy($id);
    }

}