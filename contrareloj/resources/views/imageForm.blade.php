
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Formulario de Carga</title>
  </head>
  <body>
    <form class="form" action="/newImage" method="post"> /escribir la ruta
       {{csrf_field()}}
      <p>
        <label for="imagen">URL de la Imagen</label>
        <input id="imagen" type="file" name="imagen" value="">
      </p>
      <p>
        <label for="fecha de Nacimiento">Fecha de Nacimiento</label>
        <input id="fecha_Nac"  type="text" name="fecha_Nac" value="">
      </p>
      <p>
        <label for="nombre">Nombre</label>
        <input id="nombre" type="text" name="nombre" value="">
      </p>
      <p>
        <button type="submit" name="button">Enviar</button>
      </p>
    </form>
  </body>
</html>
