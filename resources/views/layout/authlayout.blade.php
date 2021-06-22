<!DOCTYPE html>

<html lang="en">

 <head>

   @include('layout.partials.head')
@yield('auth_css')
 </head>

<body class="hold-transition login-page">

@yield('content')
@yield('auth_js')
@include('layout.partials.footer-scripts')

 </body>

</html>