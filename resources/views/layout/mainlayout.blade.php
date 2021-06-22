<!DOCTYPE html>

<html lang="pr">

    <head>

        @include('layout.partials.head')

    </head>

    <body class="hold-transition sidebar-mini layout-fixed">
        <div id="loader"></div> 
        <div class="wrapper">

            @include('layout.partials.header')
            @include('layout.partials.nav')
            @yield('content')
            @include('layout.partials.footer')
        </div>

        @include('layout.partials.footer-scripts')
        @yield('dashboard_js')
        <script type="text/javascript">
            $(function () {
                $("#loader").fadeOut(1000);
            });
        </script> 
    </body>

</html>