@extends('front.layout')

@section('content')
<main class="content" id="home">
  <section class="presentacion">
    <h1 class="presentacion__title"> <img class="contrareloj" src="img/logo-blanco.png" alt="contrareloj"></h1>

    <a href="#descripcion" class="presentacion__arrow-down grow point"><i class="fas fa-chevron-circle-down fa-4x"></i></a>
  </section>

  <section class="descripcion" id="descripcion">
    <div class="carousel-container">

  <!-- Imagenes tutorial -->
  <div class="tutorial-carousel fade">

    <img class="img-carousel" src="{{asset('/img/1.1.jpg')}}" style="width:100%">

  </div>

  <div class="tutorial-carousel fade">

    <img class="img-carousel" src="{{asset('/img/1.2.jpg')}}" style="width:100%">

  </div>

  <div class="tutorial-carousel fade">

    <img class="img-carousel" src="{{asset('/img/1.3.jpg')}}" style="width:100%">

  </div>

  <!-- boton siguiente y anterior  -->
  <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
  <a class="next" onclick="plusSlides(1)">&#10095;</a>
</div>
<br>

{{-- los puntos y slide --}}
<div >
  <span class="dot" onclick="currentSlide(1)"></span>
  <span class="dot" onclick="currentSlide(2)"></span>
  <span class="dot" onclick="currentSlide(3)"></span>
</div>
        @guest
          <a class="btn descripcion__start-btn" href="/login"><span>¡Estoy listo!</span></a>
          <a class="btn descripcion__start-btn" href="/register"><span>¡Soy nuevo!</span></a>
        @else
          <a class="btn descripcion__start-btn" href="/ranking"><span>¡Estoy listo!</span></a>
        @endguest
      </section>
{{--       <section class="login-section" id="login">
        <form class="form" action="index.php#login" method="POST">
          <h1 class="form__title">Login</h1>
          <div class="form__group">
            <label class="form__group__text-label" for="email">Email:</label>
            <input class="form__group__text-field" type="email" name="email" id="email" placeholder="Ingrese su correo electronico" required>
          </div>
          <div class="alert alert-danger" role="alert">
          </div>

          <div class="form__group">
            <label class="form__group__text-label" for="pwd">Contraseña:</label>
            <input class="form__group__text-field" type="password" name="pwd" id="pwd" placeholder="Password">
          </div>
          <div class="alert alert-danger" role="alert">
          </div>

          <button type="submit" class="form__btn submit" name="login" value="ingresar">Login</button>

          <p class="form__not-registered">¿No tenés cuenta?<a class="form__not-registered__link" href="#register">Registrate</a></p>
          <input type="hidden" name="login" value="">
        </form>
      </section> --}}

{{--       <section class="register-section" id="register">
        <form class="form" action="index.php#register" method="post">
          <h1 class="form__title">Registrate</h1>
          <div class="form__group">
            <label class="form__group__text-label" for="name">Nombre</label>
            <input id="name" class="form__group__text-field" name="name" type="text" value="" placeholder="Ingresá tu nombre">
          </div>
          <div class="alert alert-danger" role="alert">
          </div>
          <div class="form__group">
            <label class="form__group__text-label" for="lastname">Apellido</label>
            <input id="lastname" class="form__group__text-field" name="lastname" type="text" value="" placeholder="Ingresá tu apellido">
          </div>
          <div class="alert alert-danger" role="alert">
          </div>
          <div class="form__group">
            <label class="form__group__text-label" for="email">Email</label>
            <input id="email" class="form__group__text-field" name="email" type="email" value="" placeholder="Ingresá tu email">
          </div>
          <div class="alert alert-danger" role="alert">
          </div>
          <div class="form__group">
            <label class="form__group__text-label" for="pwd">Contraseña</label>
            <input id="pwd" class="form__group__text-field" name="pwd" type="password" placeholder="Password">
          </div>
          <div class="form__group">
            <label class="form__group__text-label" for="retypepwd">Repite Contraseña</label>
            <input id="retypepwd" class="form__group__text-field" name="retypepwd" type="password" placeholder="Password">
          </div>
          <div class="alert alert-danger" role="alert">
          </div>
          <div class="form__group form-check">
            <input id="accepted" name="accepted" class="form-check__input" type="checkbox" value="yes">
            <label class="form-check__label" for="accept">Acepto los términos y condiciones</label>
          </div>
          <div class="alert alert-danger" role="alert">
          </div>
          <button class="form__btn" type="submit" name="register">Registrarme</button>
          <!-- <button class="form__btn form__btn--reset" type="reset" name="">Cancelar</button> -->
          <input type="hidden" name="register" value="">
        </form>
      </section> --}}
    </main>
    <script src="{{asset('js/tutorial.js')}}"></script>

    @endsection
