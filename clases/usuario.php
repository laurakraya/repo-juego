<?php

class Usuario {
  
  protected $id;
  protected $name;
  protected $lastname;
  protected $email;
  protected $password;
  
  function __construct(Array $datos){
    
    if(isset($datos["id"])){
      $this->id = $datos["id"];
      $this->password = $datos["pwd"];
    } else {
      $this->id = NULL;
      $this->password = password_hash($datos["pwd"], PASSWORD_DEFAULT);
    }
    $this->name = $datos["name"];
    $this->lastname = $datos["lastname"];
    $this->email = $datos["email"];
  }
  
  public function getId(){
    return $this->id;
  }
  public function getName(){
    return $this->name;
  }
  public function getLastName(){
    return $this->lastname;
  }
  public function getEmail(){
    return $this->email;
  }
  public function getPassword(){
    return $this->password;
  }
  
  public function setId($id){
    $this->id=$id;
    return $this;
  }
  public function setName($name){
    $this->name=$name;
    return $this;
  }
  public function setLastName($lastname){
    $this->lastname=$lastname;
    return $this;
  }
  public function setEmail($email){
    $this->email=$email;
    return $this;
  }
  public function setPassword($password){
    $this->password=$password;
    return $this;
  }
}




?>
