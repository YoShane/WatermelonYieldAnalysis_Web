<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <title>@yield('title')</title>
  @include('partials.head')
</head>

<body>

  <!-- ======= Header&Nav ======= -->
  @include('partials.nav')
  <!-- End Header&Nav -->

  @yield('content')

  <!-- ======= Footer ======= -->
  @include('partials.footer')
  <!-- End  Footer -->

  <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>

  @include('partials.js')

</body>

</html>