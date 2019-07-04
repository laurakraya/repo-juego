
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Formulario de Carga</title>
  </head>
  <body>
    <form class="form" action="/newImage" method="post" enctype="multipart/form-data"> /escribir la ruta
       {{csrf_field()}}
      <p>
        <label for="imagen">URL de la Imagen</label>
        <input id="imagen" type="file" name="image" value="">
      </p>
      <p>
        <label for="fecha de Nacimiento">Fecha de Nacimiento</label>
        <input id="birth_date"  type="text" name="birth_date" value="">
      </p>
      <p>
        <label for="name">Nombre</label>
        <input id="name" type="text" name="name" value="">
      </p>
      <p>
        <label for="level">Nivel de dificultad</label>
        {{-- <input id="level" type="number" name="levels_id" value=""> --}}
        <select name="levels_id" id="level">
          @foreach($levels as $level)
              <option value="{{ $level->id }}">{{ $level->levels}}</option>
          @endforeach 
        </select>
      </p>
      <p>
        <button type="submit" name="button">Enviar</button>
      </p>
    </form>
  </body>
</html>
