@extends('layouts.master')

@section('content')
    <div class="container main-container container-padding">
        <div class="row">
            <div class="panel panel-default">
                <div class="panel-heading">Edit Type</div>

                <div class="panel-body">
                    @if(isset($msg))
                        <div class="alert alert-warning">{{ $msg }}</div>
                    @endif
                    <form method="post" action="{{ route('admin::developer.document.types.update', [$type->id]) }}" class="form">
                    <input type="hidden" name="_method" value="PUT">
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" name="name" value="{{ (old('name') ? old('name') : $type->name) }}" required class="form-control" placeholder="Name">
                    </div>

                    <div class="form-group">
                        <label>Alias</label>
                        <input type="text" name="alias" value="{{ (old('alias') ? old('alias') : $type->alias) }}" required class="form-control" placeholder="Alias">
                    </div>

                    <hr />
                    <div class="tabs">
                        <ul class="nav nav-tabs" role="tablist">
                            <li role="presentation" class="active">
                                <a href="#properties" aria-controls="properties" class="properties-tab" role="tab" data-toggle="tab">Properties</a>
                            </li>
                            <li role="presentation">
                                <a href="#tabs" aria-controls="profile" class="tabs-tab" role="tab" data-toggle="tab">Tabs</a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane active" id="properties">
                                @include('developer::backend.documents.types.partials.properties')
                            </div>
                            <div role="tabpanel" class="tab-pane" id="tabs">
                                @include('developer::backend.documents.types.partials.tabs')
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <input type="submit" class="save-all btn btn-primary">
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@stop


@section('scripts')
    <script src="{{ asset('backend/js/properties.js') }}"></script>
@append
