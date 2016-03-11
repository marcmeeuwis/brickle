<?php

namespace App\Repositories\Tabs;

use App\Repositories\DocumentTypes\DocumentTypesInterface;
use App\Repositories\DocumentTypes\DocumentTypesRepository;
use App\Repositories\Properties\PropertiesInterface;
use DoitOnlineMedia\Admin\App\Models\Tab;
use App\Repositories\Properties\PropertiesRepository;

class TabsRepository implements TabsInterface
{
    protected $tab;
    protected $properties;
    protected $documentTypes;

    public $errors;


    public function __construct(Tab $tab, PropertiesRepository $properties, DocumentTypesRepository $documentTypes)
    {
        $this->tab = $tab;
        $this->properties = $properties;
        $this->documentTypes = $documentTypes;
    }


    public function save($name, $doctype_id, $tab_id = null)
    {
        $tab = null;
        $tab = ($tab_id) ? Tab::where('id', $tab_id)->first() : new Tab;

        $tab->name = $name;
        $tab->document_type_id = $doctype_id;
        $tab->save();

        return $tab;
    }

    public function get($id)
    {
        return $this->tab->find($id);
    }

    public function getAllByTypeId($id)
    {
        return $this->tab->select('name', 'id')
            ->where('id', $id)
            ->get();
    }

    /**
     * Set properties to the first not to be remove tab then safely remove the original tab.
     * @param $id
     * @return bool
     */
    public function remove($id) {
        $tab = $this->get($id);
        $properties = $this->properties->getAllByTabId($id);
;
        if(count($properties) > 0) {
            $tabs = $this->documentTypes->get($tab->document_type_id)->tabs;
            if(count($tabs) === 1) {
                $this->errors['error'] = true;
                $this->errors['msg'] = 'Last tab can\'t be removed';
                return $this->errors;
            }

            $tabs = $tabs->keyBy('id');
            unset($tabs[$id]);

            // FIX: Bulk update these records if possible
            foreach ($properties as $property) {
                $property->tab_id = $tabs->first()->id;
                $property->save();
            }
        }
        $this->errors['error'] = ($tab->delete()) ? false : true;
        return $this->errors;
    }
}
