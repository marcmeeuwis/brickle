<a class="btn btn-primary add-property" href="#">Toevoegen</a><br /><br />

<table class="table table-bordered table-hover table-striped properties-table">
    <thead>
    <tr>
        <th>Naam</th>
        <th>Alias</th>
        <th>Type</th>
        <th>Tab</th>
        <th class="text-center"><i class="fa fa-remove"></i></th>
    </tr>
    </thead>
    <tbody>
    @if($properties)
        @foreach($properties as $property)
            {!! \DoitOnlineMedia\Admin\Modules\Developer\Helpers\PropertyHelper::getPropertyTableRow($property, $tabs, $types)->render() !!}
        @endforeach
    @endif
    </tbody>
</table>