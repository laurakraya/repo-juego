<?php

require_once("funciones.php");

if ($_POST) {

  $erroresRegistro = validarRegistro($_POST);
  $nameOk = $_POST["name"];
  $lastNameOk = $_POST["lastName"];
  $emailOk = $_POST["email"];


  if (empty($erroresRegistro)) {
    if (!existeUsuario($_POST["email"])) {

      $usuario = armarUsuario($_POST);   //crear usuario//
      guardarUsuario($usuario);  //guardar usuario//

    }
    header("Location: bienvenida.php");
  }
}
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
    <a class="navibar__home-link" href="index.php"><i class="fas fa-home fa-2x"></i></a>
    <ul class="navibar__list">
      <li class="navibar__list__item"><a class="navibar__list__item__link" href="index.php#home">Inicio</a></li>
      <li class="navibar__list__item"><a class="navibar__list__item__link" href="index.php#descripcion">El Juego</a></li>
      <li class="navibar__list__item"><a class="navibar__list__item__link" href="index.php#login">Login</a></li>
      <li class="navibar__list__item"><a class="navibar__list__item__link" href="#register">Registro</a></li>
    </ul>
  </nav>
  <main class="content" id="home">


    <section class="register-section" id="register">
      <form class="form" action="register.php#register" method="post">
        <h1 class="form__title">Registrate</h1>
        <div class="form__group">
          <label class="form__group__text-label" for="name">Nombre</label>
          <input id="name" class="form__group__text-field" name="name" type="text" value="<?php if (isset($nameOk)) {
                                                                                            echo $nameOk;
                                                                                          } ?>" placeholder="Ingresá tu nombre">
        </div>
        <?php if (!empty($erroresRegistro["name"])) { ?>
          <div class="alert alert-danger" role="alert">
            <?php echo $erroresRegistro["name"]; ?>
          </div>
        <?php } ?>
        <div class="form__group">
          <label class="form__group__text-label" for="lastName">Apellido</label>
          <input id="lastName" class="form__group__text-field" name="lastName" type="text" value="<?php if (isset($lastNameOk)) {
                                                                                                    echo $lastNameOk;
                                                                                                  } ?>" placeholder="Ingresá tu apellido">
        </div>
        <?php if (!empty($erroresRegistro["lastName"])) { ?>
          <div class="alert alert-danger" role="alert">
            <?php echo $erroresRegistro["lastName"]; ?>
          </div>
        <?php } ?>
        <div class="form__group">
          <label class="form__group__text-label" for="email">Email</label>
          <input id="email" class="form__group__text-field" name="email" type="email" value="<?php if (isset($emailOk)) {
                                                                                                echo $emailOk;
                                                                                              } ?>" placeholder="Ingresá tu email">
        </div>
        <?php if (!empty($erroresRegistro["email"])) { ?>
          <div class="alert alert-danger" role="alert">
            <?php echo $erroresRegistro["email"]; ?>
          </div>
        <?php } ?>
        <div class="form__group">
          <label class="form__group__text-label" for="pwd">Contraseña</label>
          <input id="pwd" class="form__group__text-field" name="pwd" type="password" placeholder="Password">
        </div>


        <div class="form__group">
          <label class="form__group__text-label" for="retypepwd">Repite Contraseña</label>
          <input id="retypepwd" class="form__group__text-field" name="retypepwd" type="password" placeholder="Password">
        </div>
        <?php if (!empty($erroresRegistro["pwd"])) { ?>
          <div class="alert alert-danger" role="alert">
            <?php echo $erroresRegistro["pwd"]; ?>
          </div>
        <?php } ?>
        <div class="form__group form-check">
          <input id="accepted" name="accepted" class="form-check__input" type="checkbox" value="yes">
          <label class="form-check__label" for="accept">Acepto los términos y condiciones</label>
        </div>
        <?php if (!empty($erroresRegistro["accepted"])) { ?>
          <div class="alert alert-danger" role="alert">
            <?php echo $erroresRegistro["accepted"]; ?>
          </div>
        <?php } ?>
        <button class="form__btn" type="submit" name="register">Registrarme</button>
        <button class="form__btn form__btn--reset" type="reset" name="">Cancelar</button>
      </form>
    </section>
  </main>
</body>

</html>
