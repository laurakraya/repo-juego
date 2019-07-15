@extends('front.layout')

@section('metatags')
<link rel="stylesheet" href="{{asset('css/ranking.css')}}">
@endsection

@section('content')
<main class="results">
  <div class="area-info">
    <section class="results-section user-score">
      <p>Hola <span class="user-score--bold">{{$usuarioLogueado->name}}</span> !</p>
      <p>Tu puntaje es: <span class="user-score--bold">{{$usuarioLogueado->score}}</span></p>
    </section>
    <section class="results-section ranking">
      <h1 class="results-section__title">Ranking</h1>
      <div class="ranking__table">
        @foreach($datosRanking as $datos)
        <div class="ranking__table__row">
          <div class="ranking__table__row__avatar">
            <div class="ranking__table__row__avatar__img" style="background-image: url('@if ($datos->user_image == null){{asset('img/profile-placeholder.png')}} @else/storage/profile/{{$datos->user_image }}@endif')"></div>
          </div>
          <div class="ranking__table__row__pos">{{$posicion++}} </div>
          <div class="ranking__table__row__name">{{$datos->name}}</div>
          <div class="ranking__table__row__puntos"> {{$datos->score}}</div>
        </div>
        @endforeach
      </div>
    </section>
    <section class="results-section niveles">
      <h1 class="results-section__title">Volver a Jugar</h1>
      <div class="niveles__btns">
        @foreach($niveles as $nivel)
        <div>
          <a class="niveles__btns__btn @if (Auth::user()->score < 300) 
            @if($nivel->id > 1) niveles__btns__btn--disabled @endif  
            @elseif (Auth::user()->score < 600)
            @if($nivel->id > 2) niveles__btns__btn--disabled @endif 
            @endif" href="/challenge/{{$nivel->id}}"><span>Nivel: {{$nivel->id}}</span>
          </a>
          </div>
          @endforeach
        </div>
      </section>
    </div >
  </main>
  @endsection

  @section('scripts')
    <script src="{{asset('js/results.js')}}"></script>
  @endsection
