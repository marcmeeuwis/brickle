@extends('admin::layouts.master')

@section('content')
    <div class="main-container container-padding">
        <h1 class="pull-left">Document Types</h1>
        <a class="btn btn-primary pull-right" href="{{ route('admin::developer.document.types.create') }}">Toevoegen</a><br /><br />
        <div class="clearfix"></div>
        @if(count($types) > 0)
            <table class="table table-bordered table-hover table-striped">
                <thead>
                <tr>
                    <th>Naam</th>
                    <th>Actie</th>
                </tr>
                </thead>
                <tbody>
                    @foreach($types as $type)
                        <tr>
                            <td>{{ ucfirst($type->name) }}</td>
                            <td><a href="@getUrl($type->slug)">Bekijk</a> |
                                <a href="{{ route('admin::developer.document.types.edit', ['doctype_id' => $type->id]) }}">Wijzig</a> |
                                <a href="{{ route('admin::developer.document.types.destroy', ['doctype_id' => $type->id]) }}" class="remove-type">Delete</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <hr />
            <p>Geen resultaten gevonden</p>
            <hr />
        @endif
        <div class="clearfix"></div>
        <a class="btn btn-primary pull-right" href="{{ route('admin::developer.document.types.create') }}">Toevoegen</a>
    </div>
@stop

@section('scripts')
    {{--{!! HTML::script('backend/js/types.js') !!}--}}
@stop
