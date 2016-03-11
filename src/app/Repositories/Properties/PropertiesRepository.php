<?php

namespace Doitonlinemedia\Admin\App\Repositories\Properties;

use Doitonlinemedia\Admin\App\Models\Property;
use Illuminate\Support\Facades\Input;

class PropertiesRepository
{
    protected $property;

    public function __construct(Property $property)
    {
        $this->property = $property;
    }



    /**
     * Save all properties. When not exists put it in array and bulk insert. Else update separately, because there is no bulk update method in laravel.
     * @param $doctype_id
     */
    public function save($doctype_id)
    {
        $names = Input::get('property_name');
        $aliases = Input::get('property_alias');
        $types = Input::get('property_type');
        $tabs = Input::get('property_tab');
        $ids = Input::get('property_id');

        $data = array();
        if(count($names) > 0) {
            foreach ($names as $key => $name) {
                if(!$name) continue;
                if(!isset($ids[$key])) {
                    $data[$key]['name'] = $name;
                    $data[$key]['alias'] = str_slug($aliases[$key]);
                    $data[$key]['document_type_id'] = $doctype_id;
                    $data[$key]['required'] = 0;
                    $data[$key]['order'] = 1;
                    $data[$key]['data_type_id'] = $types[$key];
                    $data[$key]['tab_id'] = $tabs[$key];
                }else{
                    $id = $ids[$key];
                    $property = Property::where('id', $id)->first();
                    $property->name = $name;
                    $property->alias = str_slug($aliases[$key]);
                    $property->document_type_id = $doctype_id;
                    $property->required = 0;
                    $property->order = 1;
                    $property->data_type_id = $types[$key];
                    $property->tab_id = $tabs[$key];
                    $property->save();
                }
            }

            $this->property->insert($data);
        }
    }

    public function get($id)
    {
        return $this->property->where('property_id', $id)->first();
    }

    public function removeById($id)
    {
        $this->get($id)->delete();
    }

    public function getAllByTypeId($id)
    {
        return $this->property->select('id', 'name', 'alias', 'required', 'order', 'tab_id', 'data_type_id', 'document_type_id')
            ->where('document_type_id', '=', $id)
            ->get();
    }

    public function getAllByTabId($id)
    {
        return $this->property->select('id', 'name', 'alias', 'required', 'order', 'tab_id', 'data_type_id', 'document_type_id')
            ->where('tab_id', $id)
            ->get();
    }
}