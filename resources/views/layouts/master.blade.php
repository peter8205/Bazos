@include('layouts.header')
  <body>
@yield('content')
@stack('js')
@include('layouts.footer')