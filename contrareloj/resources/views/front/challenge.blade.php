@extends('front.layout')

@section('content')
  <main class="content">
    <div class="area-juego">
      <div class="area-juego__display">
      <div class="area-juego__display__img" style="background-image: url('{{asset('img/'.$img1->image)}}')">
          <span>A</span>
        </div>
        <div class="area-juego__display__img" style="background-image: url('{{asset('img/'.$img2->image)}}')">
        <span>B</span>
        </div>
      </div>
      <div class="area-juego__opciones">
        <a class="area-juego__btn" href="">></a>
        <a class="area-juego__btn" href="">
          <</a> <a class="area-juego__btn" href="">=
        </a>
        <!--       <a class="area-juego__btn" href=""></a>
      <a class="area-juego__btn" href=""></a> -->
      </div>
    </div>
    <section class="counter">
      Aca deberiamos poner como pasa el tiempo
    </section>
  </main>
@endsection