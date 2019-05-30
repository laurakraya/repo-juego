<?php

class Pregunta {
  protected $id;
  protected $imagen;
  protected $fecha_Nac;
  protected $niveles_id;
  protected $nombre;
  
  public function __construct(Array $array)
  {
    $this->id = $array["id"];
    $this->imagen = $array["imagen"];
    $this->fecha_Nac = $array["fecha_Nac"];
    $this->niveles_id = $array["niveles_id"];
    $this->nombre = $array["nombre"];
  }
  
  public function getId() {
    return $this->id;
  }
  
  public function setId($id) {
    $this->id = $id;
    return $this;
  }
  
  public function getImagen () {
    return $this->imagen;
  }
  
  public function getFechaNac () {
    return $this->fecha_Nac;
  }
  
  public function getNivelesId () {
    return $this->niveles_id;
  }
  
  public function getNombre () {
    return $this->nombre;
  }
}