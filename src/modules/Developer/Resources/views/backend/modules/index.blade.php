@extends('layouts.master')

@section('content')
	<h1 class="pull-left">Modules overzicht</h1>
	<a class="btn btn-primary pull-right" href="{{ route('cms.developer.modules.create') }}">Toevoegen</a><br /><br />
	<div class="clearfix"></div>
	@if(count($modules) > 0)
		<table class="table table-bordered table-hover table-striped">
			<thead>
			<tr>
				<th>Naam</th>
				<th>Actie</th>
			</tr>
			</thead>
			<tbody>
			@foreach($modules as $module)
				<tr>
					<td>{{ ucfirst($module->name) }}</td>
					<td><a href="@getUrl($module->slug)">Bekijk</a> |
						<a href="{{ route('cms.developer.modules.edit', ['module_id' => $module->module_id]) }}">Wijzig</a> |
						@if($module->deletable)
						 <a class="remove" href="#" data-call="{{ route('cms.developer.modules.destroy', ['module_id' => $module->module_id]) }}">Delete</a>
						@else
						<span style="color:#cecece; cursor:not-allowed;">Delete</span>
						@endif
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
	<a class="btn btn-primary pull-right" href="{{ route('cms.developer.modules.create') }}">Toevoegen</a>
@stop

@section('scripts')
	{!! HTML::script('backend/js/modules/items.js') !!}
@stop