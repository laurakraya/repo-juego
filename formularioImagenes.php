<?php
require_once("clases/DbMySql.php");


$dbMysql = new DbMySql;
$imagen = new imagenes($_POST);      
$dbMysql->guardarImagen($imagen);
 ?>


 <!DOCTYPE html>
 <html lang="en" dir="ltr">
   <head>
     <meta charset="utf-8">
     <title>Formulario de Carga</title>
   </head>
   <body>
     <form class="" action="Formulario de Carga" method="post">

       <p>
         <label for="imagen">URL de la Imagen</label>
         <input id=imagen type="" name="imagen" value="">
       </p>
       <p>
         <label for="fecha de Nacimiento">Fecha de Nacimiento</label>
         <input id=fecha_Nac  type="text" name="fecha_Nac" value="">
       </p>
       <p>
         <label for="nombre">Nombre</label>
         <input id=nombre type="" name="nombre" value="">
       </p>
       <p>
         <button type="submit" name="button">Enviar</button>
       </p>
     </form>
   </body>
 </html>
