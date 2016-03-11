<tr>
    <td><input placeholder="Naam" class="form-control tab-name" value="{{ $tab['name'] }}" type="text" name="tab_name[]"></td>
    <td>
        <input type="submit" data-url="{{ route('admin::developer.document.tabs.store') }}" class="save-tab btn btn-primary" value="Opslaan">
        <input type="submit" data-url="{{ route('admin::developer.document.tabs.destroy', array('')) }}" class="remove-tab btn btn-danger" value="Verwijder">
    </td>
    @if(isset($tab['id']))
        <input type="hidden" name="tab_id[]" value="{{ $tab['id'] }}">
    @endif
</tr>