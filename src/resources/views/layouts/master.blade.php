<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>CMS</title>

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css" rel='stylesheet' type='text/css'>
    <link href="{{ admin_asset('css/all.css') }}" rel="stylesheet">

    @yield('css')
</head>
<body>
    @include('admin::partials.header')
    @include('admin::partials.menu-left')

    @yield('content')

    <script src="{{ admin_asset('js/all.js') }}"></script>
    @yield('scripts')
</body>
</html>
