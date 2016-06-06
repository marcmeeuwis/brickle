@extends('admin::layouts.master')

@section('content')
    <div class="container main-container container-padding">
        <div class="row">
            <div class="panel panel-default">
                <div class="panel-heading">Test results</div>

                <div class="panel-body">
                    <div class="test-results">

                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

@section('scripts')
    <script>
        $(function() {
            $.get('{{ route('admin::developer.run_unit_tests') }}', function(data) {
                $.get('{{ route('admin::developer.get_test_results') }}', function(results) {
                    console.log(results);
                   $('.test-results').html(results);
                });
            });

            $(document).on('click', '.show-test-message', function() {
                $(this).next().slideToggle('slow');
            });
        });
    </script>
@stop
