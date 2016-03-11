@extends('layouts.master')

@section('content')
    <h2>Nieuwe module toevoegen</h2>

    @if(isset($msg))
        <div class="alert alert-warning">{{ $msg }}</div>
    @endif
    @include('developer::backend.modules.partials.form')
@stop