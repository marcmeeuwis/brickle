@extends('admin::layouts.master')

@section('content')
	<div class="container main-container container-padding">
		<div class="row">
			<div class="panel panel-default">
				<div class="panel-heading">Developers</div>

				<div class="panel-body">
					<a href="{{ route('admin::developer.document.types.index') }}">Document Types</a><br />
					<a href="{{ route('admin::developer.datatypes.index') }}">Data Types</a><br />
					<a href="{{ route('admin::developer.unit_tests_home') }}">Run Unit Tests</a>
				</div>
			</div>
		</div>
	</div>

@stop

@section('scripts')
	<script src="{{ asset('backend/js/modules/items.js') }}"></script>
@stop