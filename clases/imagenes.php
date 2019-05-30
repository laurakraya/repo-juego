<?php class Imagenes {
  protected $id;
  protected $imagen;
  protected $fecha_Nac;
  protected $nombre;

  function __construct(Array $datos){
    $this-> id=$id;//Nose como hacer lo del ID
    $this-> imagen=$datos["imagen"];
    $this-> fecha_Nac= $datos["fecha_Nac"];
    $this-> nombre=$datos["nombre"];
  }

  public function getId(){
    return $this->id;
  }
  public function getImagen(){
    return $this->imagen;
  }
  public function getFecha_Nac(){
    return $this->fecha_Nac;
    }
  public function getNombre(){
    return $this->Nombre;
  }
  public function setId(){
     $this->id=$id;
     return $this;
  }
  public function setImagen(){
     $this->imagen = $imagen;
     return $this;
  public function setFecha_Nac(){
    $this->fecha_Nac = $fecha_Nac;
    return $this;
  }
  public function setNombre(){
    $this->nombre = $nombre;
  }
} ?>
