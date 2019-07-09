<!DOCTYPE html>
<html lang="en">

<head>
  @yield('metatags')
  @include('front.partials.head')
</head>

<body>

  @include('front.partials.navbar')

  @yield('content')

  {{-- @include('front.partials.footer') --}}

  @include('front.partials.scripts')
  @yield('scripts')

</body>

</html>