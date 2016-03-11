{!! Form::open(array('url' => route('cms.developer.modules.store'), 'class' => 'form')) !!}

<div class="form-group">
    {!! Form::label('Name') !!}
    <input type="text" name="name" value="{{ (old('name') ? old('name') : $module->name) }}" required class="form-control" placeholder="Name">
</div>

@if(!$module->name)
<div class="form-group">
    {!! Form::label('Document Type') !!}
    <select name="document_type" class="form-control">
        @foreach($docTypes as $docType)
            <option {{ ($module->document_type_id !== $docType->document_type_id) ?: 'selected' }} value="{{ $docType->document_type_id }}">{{ $docType->name }}</option>
        @endforeach
    </select>
</div>
@endif


<div class="form-group">
    {!! Form::label('folder', 'Create module directory') !!}:
    <input type="checkbox" id="folder" name="folder">
</div>

<div class="form-group">
    {!! Form::submit('Opslaan',
      array('class'=>'btn btn-primary')) !!}
</div>
{!! Form::close() !!}