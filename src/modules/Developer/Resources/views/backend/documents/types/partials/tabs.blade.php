<a class="btn btn-primary add-tab" href="#">Toevoegen</a><br /><br />

<table class="table table-bordered table-hover table-striped tabs-table">
    <thead>
    <tr>
        <th>Naam</th>
        <th>Actie</th>
    </tr>
    </thead>
    <tbody>
    @if($tabs)
        @foreach($tabs as $tab)
            {!! \DDoitonlinemedia\Admin\Modules\Developer\Helpers\PropertyHelper::getTabTableRow($tab)->render() !!}
        @endforeach
    @endif
    </tbody>
</table>