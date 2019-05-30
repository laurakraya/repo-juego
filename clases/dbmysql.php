<?php

require_once("db.php");
require_once("usuario.php");


class DbMySql extends db {
  protected $connection;

  public function __construct()
  {

   // $config = file_get_contents("config.json");
   // $configArray = json_decode($config, true);
   //
   //
   // $dbName = $configArray["dbName"];
   // $dbPort = $configArray["dbport"];
   // $dbUser = $configArray["dbUser"];
   // $dbPass = $configArray["dbPass"];


    $dsn = "mysql:host=127.0.0.1;dbname=juego;port=3306";
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

  public function guardarUsuario(Usuario $usuario){

    $stmt = $this->connection->prepare("INSERT INTO usuarios VALUES(default, :name, :lastname, :email, :password)");

    $stmt->bindValue(":name", $usuario->getNombre());
    $stmt->bindValue(":lastname", $usuario->getLastName());
    $stmt->bindValue(":email", $usuario->getEmail());
    $stmt->bindValue(":password", $usuario->getPassword());

    $stmt->execute();

  }

  function buscarPorEmail($email) {
    global $db;
    $stmt = $db->prepare("SELECT * FROM usuarios WHERE email = :email");
    $stmt->bindValue(":email", $email);
    $stmt->execute();

    $consulta = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($consulta == false){
      return NULL;
    } else {
      $usuario = new Usuario($consulta);
      return $usuario;
    }
  }

  public function guardarImagen(imagenes $imagen){

    $stmt = $this->connection->prepare("INSERT INTO preguntas VALUES(default, :imagen, :fecha_Nac, :nombre)");

    $stmt->bindValue(":imagen", $imagen->getImagen());
    $stmt->bindValue(":fecha_Nac", $imagen->getfecha_Nac());
    $stmt->bindValue(":nombre", $imagen->getnombre());

    $stmt->execute();

  }

}
