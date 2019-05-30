<?php

class Respuesta {
  protected $id;
  protected $fecha_partida;
  protected $rta_correcta;
  protected $respuesta_usuario;
  protected $usuario_ID;
  protected $imagenA_ID;
  protected $imagenB_ID;
  
  public function __construct(Array $array)
  {
    $this->fecha_partida = $array["fecha_partida"];
    $this->rta_correcta = $array["rta_correcta"];
    $this->respuesta_usuario = $array["respuesta_usuario"];
    $this->usuario_ID = $array["usuario_ID"];
    $this->usuarioA_ID = $array["usuarioA_ID"];
    $this->usuarioB_ID = $array["usuarioB_ID"];
  }
  
  public function getId() {
    return $this->id;
  }
  
  public function setId($id) {
    $this->id = $id;
    return $this;
  }
  
  public function getFechaPartida () {
    return $this->fecha_partida;
  }
  
  public function getRtaCorrecta () {
    return $this->rta_correcta;
  }
  
  public function getRespuestaUsuario () {
    return $this->respuesta_usuario;
  }
  
  public function getUsuarioId () {
    return $this->usuario_ID;
  }
  
  public function getUsuarioAId () {
    return $this->usuarioA_ID;
  }
  
  public function getUsuarioBId () {
    return $this->usuarioB_ID;
  }
}