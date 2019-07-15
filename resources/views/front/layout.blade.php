<!DOCTYPE html>
<html lang="en">

<head>
  @include('front.partials.head')
  @yield('metatags')
</head>

<body>

  @include('front.partials.navbar')

  @yield('content')

  {{-- @include('front.partials.footer') --}}

  @include('front.partials.scripts')
  @yield('scripts')

</body>

</html>