@extends('layouts.master')

@section('content')
    <h2>{{ ucfirst($module->name) }} module</h2>

    @include('developer::backend.modules.partials.form')
@stop