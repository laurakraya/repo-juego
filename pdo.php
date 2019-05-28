<?php
//Archivo de conexión a la base de datos.

$dsn = "mysql:host=127.0.0.1;dbname=basejuego;port=3306";
$user = "root";
$pass = "";


try {
  $db = new PDO($dsn, $user, $pass);
  
  $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  echo "La conexión a la base de datos está funcionando";

} catch (\Exception $e) {
  echo "No se pudo conectar a la base de datos <br>";
  
  echo $e->getMessage();
  exit;
}