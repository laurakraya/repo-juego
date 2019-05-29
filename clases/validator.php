<?php

class Validator {

  public static function validarRegistro($datos)
  {

    //Juntar errores del form//

    $errores = [];
    $datosTrim = [];
    //Eliminar espacion en blanco del form con trim//
    foreach ($datos as $posicion => $valor) {
      $datosTrim[$posicion] = trim($valor);
    }

    if (strlen($datosTrim["name"]) == 0) {
      $errores["name"] = "El nombre no puede estar vacio";
      //Que no tenga caracteres alfanumericos//
    } else if (ctype_alpha($datosTrim["name"]) == false) {
      $errores["name"] = "El nombre debe contener solo letras";
    }
    //Para apellido mismas validaciones//
    if (strlen($datosTrim["lastName"]) == 0) {
      $errores["lastName"] = "El apellido no puede estar vacio";
      //Que no tenga caracteres alfanumericos//
    } else if (ctype_alpha($datosTrim["lastName"]) == false) {
      $errores["lastName"] = "El apellido debe contener solo letras";
    }

    //Validar Email//

    if (strlen($datosTrim["email"]) == 0) {
      $errores["email"] = "El email no puede estar vacio";
    } else if (filter_var($datosTrim["email"], FILTER_VALIDATE_EMAIL) == false) {
      $errores["email"] = "El formato del email no es valido";
    } else if (existeUsuario($datosTrim["email"])) {
      $errores["email"] = "El email ya esta registrado";
    }

    // Validar contraseña //
    if (strlen($datos["pwd"]) == 0) {  //Validar sin trim por si hay espacios adredes.//
      $errores["pwd"] = "La contraseña no puede estar vacia";
    } else if ($datos["pwd"] !== $datos["retypepwd"]) { //Validar que las contraseñas sean iguales//
      $errores["pwd"] = "Las contraseñas no coinciden";
    }

    //Validar Terminos y condiciones//
    if (!isset($datos["accepted"])) {
      $errores["accepted"] = "Por favor acepte terminos y condiciones.";
    }

    return $errores;
  }


  public static function validarLogin($datos)
  {

    $errores = [];
    $datosTrim = [];

    foreach ($datos as $posicion => $valor) {
      $datosTrim[$posicion] = trim($valor);
    }

    //EMAIL
    if (strlen($datosTrim["email"]) == 0) {
      $errores["email"] = "El email no puede estar vacio";
    } else if (filter_var($datosTrim["email"], FILTER_VALIDATE_EMAIL) == false) {
      $errores["email"] = "El formato del email no es valido";
    } else if (!existeUsuario($datosTrim["email"])) {
      $errores["email"] = "El email no se encuentra registrado";
    }
    //Password
    if (strlen($datos["pass"]) == 0) {
      $errores["pwd"] = "La contraseña no puede estar vacia";
    }

    return $errores;
  }

}


 ?>
