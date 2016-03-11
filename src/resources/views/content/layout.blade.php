@extends('admin::layouts.master')

@section('content')
    <nav class="navbar navbar-default navbar-content">
        <div class="container-fluid">

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    @foreach($documents as $document)
                        <li class="active"><a href="{{ route('admin::content.edit', [$document->id]) }}">{{ $document->name }}</a></li>
                    @endforeach
                </ul>
            </div>
        </div><!-- /.container-fluid -->
    </nav>

    <div class="main-container container-padding with-content-menu">
        <div class="row">
            @yield('sub-content')
        </div>
    </div>
@endsection
