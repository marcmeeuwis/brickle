<tr>
    <td><input placeholder="Naam" class="form-control" value="{{ $property->name }}" type="text" name="property_name[]"></td>
    <td><input placeholder="Alias" class="form-control" value="{{ $property->alias }}" type="text" name="property_alias[]"></td>
    <td>

        <select name="property_type[]" class="form-control">
            @foreach($types as $type)
                <option {{ !($type->data_type_id === $property['id']) ?: 'selected' }} value="{{ $type->id }}">{{ $type->type }}</option>
            @endforeach
        </select>
    </td>
    <td class="tab-column">
        <select name="property_tab[]" class="form-control">
            @foreach($tabs as $tab)
                <option {{ !($tab['tab_id'] === $property->id) ?: 'selected' }} value="{{ $tab['id'] }}">{{ $tab['name'] }}</option>
            @endforeach
        </select>
    </td>
    <td class="text-center">
        <a href="#" data-exists="{{ ($property->id) ? 'true' : 'false' }}" data-call="{{ route('admin::developer.document.property.destroy', [$property->id]) }}" class="remove-property btn btn-danger btn-small"><i class="fa fa-remove"></i></a>
    </td>
    @if(isset($property['id']))
        <input type="hidden" name="property_id[]" value="{{ $property['id'] }}">
    @endif
</tr>