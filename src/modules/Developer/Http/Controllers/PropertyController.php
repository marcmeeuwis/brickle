<?php namespace DoitOnlineMedia\Admin\Modules\Developer\Http\Controllers;

use App\Repositories\Properties\PropertiesInterface;
use App\Repositories\Properties\PropertiesRepository;
use App\Repositories\PropertyValues\PropertyValuesInterface;
use App\Repositories\PropertyValues\PropertyValuesRepository;
use Pingpong\Modules\Routing\Controller;

class PropertyController extends Controller {

	protected $properties;
	protected $propertyValues;

    public function __construct(PropertiesRepository $properties, PropertyValuesRepository $propertyValues)
    {
		$this->properties = $properties;
		$this->propertyValues = $propertyValues;
    }
	
	public function destroy($id)
	{
		$this->propertyValues->deleteByPropertyId($id);
		$this->properties->removeById($id);
		return 'true';
	}
}