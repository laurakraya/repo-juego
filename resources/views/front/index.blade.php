@extends('front.layout')

@section('metatags')
<link rel="stylesheet" href="{{asset('css/slick.css')}}">
@endsection

@section('content')
<main class="content" id="home">
  <section class="section-flex presentacion">
    <h1 class="presentacion__title"> <img class="contrareloj" src="img/logo-blanco.png" alt="contrareloj"></h1>
    
    <a href="#descripcion" class="presentacion__arrow-down grow point"><i class="fas fa-chevron-circle-down fa-4x"></i></a>
  </section>
  
  <section class="section-flex descripcion" id="descripcion">
    <div class="carousel-container">
      <!-- Imagenes tutorial -->
      <div class="tutorial-carousel fade">
        
        <img class="img-carousel" src="{{asset('/img/tutorial_01.png')}}" style="width:100%">
        
      </div>
      
      <div class="tutorial-carousel fade">
        
        <img class="img-carousel" src="{{asset('/img/tutorial_02.png')}}" style="width:100%">
        
      </div>
      
      <div class="tutorial-carousel fade">
        
        <img class="img-carousel" src="{{asset('/img/tutorial_03.png')}}" style="width:100%">
        
      </div>
      
      <div class="tutorial-carousel fade">
        
        <img class="img-carousel" src="{{asset('/img/tutorial_04.png')}}" style="width:100%">
        
      </div>
      
      <!-- boton siguiente y anterior  -->
{{--       <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
      <a class="next" onclick="plusSlides(1)">&#10095;</a> --}}
    </div>
    <br>
    
    {{-- los puntos y slide --}}
{{--     <div >
      <span class="dot" onclick="currentSlide(1)"></span>
      <span class="dot" onclick="currentSlide(2)"></span>
      <span class="dot" onclick="currentSlide(3)"></span>
      <span class="dot" onclick="currentSlide(4)"></span>
    </div> --}}
    @guest
    <a class="btn descripcion__start-btn" href="/login"><span>¡Estoy listo!</span></a>
    <a class="btn descripcion__start-btn" href="/register"><span>¡Soy nuevo!</span></a>
    @else
    <a class="btn descripcion__start-btn" href="/ranking"><span>¡Estoy listo!</span></a>
    @endguest
  </section>
</main>
@endsection

@section('scripts')
<script src="{{asset('js/jquery-3.4.1.min.js')}}"></script>
<script src="{{asset('js/slick.min.js')}}"></script> 
<script src="{{asset('js/tutorial.js')}}"></script> 
@endsection
