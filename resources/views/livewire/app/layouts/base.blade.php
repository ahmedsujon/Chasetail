<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Find Fido Fast</title>
    <link rel="icon" href="{{ asset('assets/images/dog-fav.png') }}" type="image/x-icon">
    <link href="{{ asset('assets/app/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/app/css/customize.css') }}" rel="stylesheet">
</head>

<body>

    @livewire('app.layouts.inc.header')
    {{ $slot }}
    @livewire('app.layouts.inc.footer')


    <link rel="stylesheet" href="{{ asset('assets/app/css/all.min.css') }}">
    <script src="{{ asset('assets/app/js/jquery.min.js') }}" charset="utf-8"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            //jquery for toggle sub menus
            $('.sub-btn').click(function() {
                $(this).next('.sub-menu').slideToggle();
                $(this).find('.dropdown').toggleClass('rotate');
            });

            //jquery for expand and collapse the sidebar
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
    @stack('scripts')
</body>

</html>
