<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="{{ asset('assets/app/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/app/css/customize.css') }}" rel="stylesheet">
    <title>{{ $title ?? config('app.name', 'FindFidoFast') }}</title>
</head>

<body>

    @livewire('app.layouts.inc.header')
    {{ $slot }}
    @livewire('app.layouts.inc.footer')

    <script src="{{ asset('assets/app/js/popper.min.js') }}"></script>
    <script src="{{ asset('assets/app/js/bootstrap.min.js') }}"></script>

</body>

</html>
