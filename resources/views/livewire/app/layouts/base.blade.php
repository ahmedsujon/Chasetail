<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Chase Tail</title>
    <link rel="icon" href="{{ asset('assets/images/dog-fav.png') }}" type="image/x-icon">
    <link href="{{ asset('assets/app/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/app/css/customize.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/app/css/fontawesome.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css" />
    <link href="{{ asset('assets/app/css/all.min.css') }}" rel="stylesheet">
    @stack('styles')
</head>

<body>

    @livewire('app.layouts.inc.header')
    {{ $slot }}
    @livewire('app.layouts.inc.footer')


    <script src="{{ asset('assets/app/js/jquery.min.js') }}" charset="utf-8"></script>
    <script src="{{ asset('assets/app/js/tab.js') }}"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            //jquery for toggle sub menus
            $('.sub-btn').click(function() {
                $(this).next('.sub-menu').slideToggle();
                $(this).find('.dropdown').toggleClass('rotate');
            });

            //jquery for expand and collapse the sidebar menu
            $('.menu-btn').click(function() {
                $('.side-bar').addClass('active');
                $('.menu-btn').css("visibility", "hidden");
            });

            $('.close-btn').click(function() {
                $('.side-bar').removeClass('active');
                $('.menu-btn').css("visibility", "visible");
            });
        });
    </script>

    <script src="{{ asset('assets/app/js/popper.min.js') }}"></script>
    <script src="{{ asset('assets/app/js/bootstrap.min.js') }}"></script>
    <script src="https://unpkg.com/leaflet@1.9.3/dist/leaflet.js"></script>
    @stack('scripts')
</body>

</html>
