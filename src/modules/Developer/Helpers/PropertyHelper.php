<?php

namespace DoitOnlineMedia\Admin\Modules\Developer\Helpers;

use DoitOnlineMedia\Admin\App\Models\DataType;
use DoitOnlineMedia\Admin\App\Models\Tab;
use DoitOnlineMedia\Admin\App\Models\Property;

class PropertyHelper {

    public static function getPropertyTypes()
    {
        return DataType::all();
    }

    public static function getPropertyTableRow(Property $property, $tabs, $types) {

        return view('developer::backend.documents.types.helpers.properties.propertyrow', compact('property', 'tabs', 'types'));
    }

    public static function getTabTableRow(Tab $tab) {
        return view('developer::backend.documents.types.helpers.properties.tabrow', compact('tab'));
    }

}