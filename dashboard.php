<?php

require_once "funciones.php";

$usuario = traerUsuarioLogueado();

 ?>

 <!DOCTYPE html>
 <html lang="en">

 <head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Inicio</title>
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
   <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
   <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
   <link rel="stylesheet" href="css/styles.css">
 </head>

 <body>
   <nav class="navibar">

     <ul class="navibar__list">


       <li class="navibar__list__item"><a class="navibar__list__item__link" href="#login"> </a></li>
       <li class="navibar__list__item"><a class="navibar__list__item__link" href="logout.php">Salir</a></li>
     </ul>
   </nav>
   <main class="content" id="home">
     <section class="presentacion">
       <h1 class="presentacion__title">ContraReloj</h1>
       <p class="presentacion__subtitle">Soy un subtítulo</p>
       <a href="#descripcion" class="presentacion__arrow-down grow point"><i class="fas fa-chevron-circle-down fa-4x"></i></a>
     </section>
