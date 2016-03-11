@extends('layouts.master')

@section('content')
	<h1>Data Types</h1>

	@if(count($types) > 0)
		<table class="table table-bordered table-hover table-striped">
			<thead>
			<tr>
				<th>Type</th>
				<th>Database Type</th>
			</tr>
			</thead>
			<tbody>
				@foreach($types as $type)
					<tr>
						<td>{{ $type->type }}</td>
						<td>{{ $type->value_type }}</td>
					</tr>
				@endforeach
			</tbody>
		</table>
	@endif
@stop
