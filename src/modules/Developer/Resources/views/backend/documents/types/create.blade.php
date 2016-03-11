@extends('layouts.master')

@section('content')
    <h2>{{ trans('admin.backend.document_type.add.title') }}</h2>

    @if(isset($msg))
        <div class="alert alert-warning">{{ $msg }}</div>
    @endif

    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {!! Form::open(array('url' => route('cms.developer.document.types.store'), 'class' => 'form')) !!}

    <div class="form-group">
        {!! Form::label(trans('admin.backend.fields.name')) !!}
        <input type="text" name="name" value="{{ (old('name') ? old('name') : '') }}" class="form-control" placeholder="Name">
    </div>

    <div class="form-group">
        {!! Form::label(trans('admin.backend.fields.alias')) !!}
        <input type="text" name="alias" value="{{ (old('alias') ? old('alias') : '') }}" class="form-control" placeholder="Alias">
    </div>

    <div class="form-group">
        {!! Form::submit(trans('admin.backend.fields.save'), array('class'=>'btn btn-primary')) !!}
    </div>
    {!! Form::close() !!}
@stop