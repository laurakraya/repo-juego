@extends('front.layout')

@section('content')
<main class="content">
  <div class="area-info">
    <section class="ranking">
      <h1>Ranking</h1>
      <div class="table">
        <div class="table__row">

          @foreach($datosRanking as $datos)
          <div class="data-user">
          <div class="image-user">
          <a class="image" href="/profile" style="background-image: url('@if ($datos->user_image == null){{asset('img/profile-placeholder.png')}} @else/storage/profile/{{$datos->user_image }}@endif')"></a>
          </div>
          <div class="table__row__pos">{{$posicion++}} </div>
          <div class="table__row__name">{{$datos->name}}</div>
          <div class="table__row__puntos"> {{$datos->score}}</div>
          </div>
          @endforeach
        </div>
      </div>
    </section>
    <section class="niveles">
      <h1>Volver a Jugar</h1>
      <div class="buttons__ranking">
        @foreach($niveles as $nivel)
      <a class="niveles__ranking" href="/challenge/{{$nivel->id}}"><span>Nivel: {{$nivel->id}}</span></a>
        @endforeach
      </div>
    </section>
    <section class="user__score">
      <span>Hola {{$usuarioLogueado->name}} tu puntaje es de {{$usuarioLogueado->score}}</span>
    </section>
  </div >
</main>
@endsection
