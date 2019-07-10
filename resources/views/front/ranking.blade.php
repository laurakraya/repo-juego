@extends('front.layout')

@section('content')
<main class="content">
  <div class="area-info">
    <section class="ranking">
      <h1>Ranking</h1>
      <div class="table">
        <div class="table__row">
          <div class="table__row__pos"> 1</div>
          <div class="table__row__name">ana</div>
          <div class="table__row__puntos">1098765432345678900 </div>
        </div>
      </div>
    </section>
    <section class="niveles">
      <h1>Volver a Jugar</h1>
      <div class="buttons__ranking">
        <a class="niveles__ranking" href="/challenge/1"><span>Nivel 1</span></a>
        <a class="niveles__ranking" href="/challenge/2"><span>Nivel 2</span></a>
        <a class="niveles__ranking" href="/challenge/3"><span>Nivel 3</span></a>
      </div>
    </section>
  </div >
</main>
@endsection
