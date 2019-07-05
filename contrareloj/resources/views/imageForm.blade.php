@extends('front.layout')

@section('content')

<main class="content">
<form class="form" action="/newImage" method="post" enctype="multipart/form-data">
  {{csrf_field()}}
  <p class="form__group">
    <label class="form__group__text-label" for="imagen">URL de la Imagen</label>
    <input class="form__group__text-field form-control" id="imagen" type="file" name="image" value="">
  </p>
  <p class="form__group">
    <label class="form__group__text-label" for="fecha de Nacimiento">Fecha de Nacimiento</label>
    <input class="form__group__text-field form-control" id="birth_date"  type="text" name="birth_date" value="">
  </p>
  <p class="form__group">
    <label class="form__group__text-label" for="name">Nombre</label>
    <input class="form__group__text-field form-control" id="name" type="text" name="name" value="">
  </p>
  <p class="form__group">
    <label class="form__group__text-label" for="level">Nivel de dificultad</label>
    {{-- <input id="level" type="number" name="levels_id" value=""> --}}
    <select name="levels_id" id="level">
      <i class="fas fa-sort-down"></i>
      @foreach($levels as $level)
      <option value="{{ $level->id }}">{{ $level->levels}}</option>
      @endforeach 
    </select>
  </p>
  <p class="form__group">
    <button type="submit" class="form__btn btn btn-primary" name="button">Enviar</button>
  </p>
</form>
</main>
@endsection
