<?php

class Db {
  protected $connection;
  
  public function __construct()
  {
    $dsn = "mysql:host=127.0.0.1;dbname=basejuego;port=3306";
    $user = "root";
    $pass = "";
    
    try {
      $this->connection = new PDO($dsn, $user, $pass);
      
      $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      
    } catch (\Exception $e) {
      
      echo $e->getMessage();
      exit;
    }
  }

  public function buscarPregunta() {

    $maxId = $this->connection->prepare("SELECT MAX(id) FROM preguntas");
    $maxId->execute();
    $id = $maxId->fetch(PDO::FETCH_ASSOC);

    $rand = rand(1, $id["MAX(id)"]);
    
    $stmt = $this->connection->prepare("SELECT * FROM preguntas WHERE id = $rand");
    $stmt->execute();

    $preguntaArray = $stmt->fetch(PDO::FETCH_ASSOC);
    
    $pregunta = new Pregunta($preguntaArray);

    return $pregunta;

  }
}