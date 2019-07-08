

<nav class="navibar">
  <a class="navibar__home-link" href="/"><i class="fas fa-home fa-2x"></i></a>
  <ul class="navibar__list">
    <li class="navibar__list__item"><a class="navibar__list__item__link" href="/newImage">Carga de Imágenes</a></li>
    <li class="navibar__list__item"><a class="navibar__list__item__link" href="/">Inicio</a></li>
    <li class="navibar__list__item"><a class="navibar__list__item__link" href="/#descripcion">El Juego</a></li>
    @guest
    <li class="navibar__list__item"><a class="navibar__list__item__link" href="/login">Login</a></li>
    <li class="navibar__list__item"><a class="navibar__list__item__link" href="/register">Registro</a></li>
    @else
    <div class="navibar__user">
      <a class="navibar__user__pic" href="/profile" style="background-image: url('@if (Auth::user()->user_image == null){{asset('img/profile-placeholder.png')}} @else/storage/profile/{{Auth::user()->user_image }}@endif')"></a>
      <p class="navibar__user__name"> {{ Auth::user()->name }} </p>
      <a class="navibar__user__btn" href=""><i class="fas fa-sort-down"></i></a>
      <ul class="navibar__user__options">
        <li><a href="/profile">Perfil</a></li>
        <li>
          <a href="{{ route('logout') }}" onclick="event.preventDefault();
          document.getElementById('logout-form').submit();">
          Logout
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
          @csrf
        </form>
      </li>
    </ul>
  </div>
  @endguest

</ul>
</nav>
