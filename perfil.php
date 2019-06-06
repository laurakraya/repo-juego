<?php

require_once("clases/DbMySql.php");
require_once("clases/auth.php");

$auth = new Auth;

$dbMysql = new DbMySql;

if ($auth->usuarioLogueado()) {
  $user = $auth->usuarioLogueado();
  $usuario = $dbMysql->buscarPorEmail($_SESSION["email"]);
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Mi Perfil</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
  <link rel="stylesheet" href="css/styles.css">
  <link rel="stylesheet" href="css/profile.css">
</head>

<body>
  <?php
  include 'partials/navbar.php';
  ?>
  <section class="profile">
    <h1 class="profile__title"><?php echo $usuario->getName() . " " . $usuario->getLastName();  ?></h1>
    <div class="profile__info">
      <div class="profile__info__avatar">
        <div class="profile__info__avatar__pic" style="background-image: url('img/profile-placeholder.png')"></div>
      </div>
      <div class="profile__info__data">
        <ul class="profile-data__list">
          <li class="profile-data__list__item">
            <span class="profile-data__list__item__label">Nombre:</span>
            <span class="profile-data__list__item__data"><?php echo $usuario->getName(); ?></span>
          </li>
          <li class="profile-data__list__item">
            <span class="profile-data__list__item__label">Apellido:</span>
            <span class="profile-data__list__item__data"><?php echo $usuario->getLastName(); ?></span>
          </li>
          <li class="profile-data__list__item">
            <span class="profile-data__list__item__label">Mail:</span>
            <span class="profile-data__list__item__data"><?php echo $usuario->getEmail(); ?></span>
          </li>
        </ul>
      </div>
    </div>
    <div class="change-avatar">
      <form class="change-avatar__form" action="" method="POST" enctype="multipart/form-data">
        <label class="change-avatar__form__label" for="avatar">Cambiar avatar:</label>
        <div>
          <input class="change-avatar__form__input" type="file" id="avatar" class="form-control" name="avatar">
          <button class="change-avatar__form__btn" name="submit" type="submit">Subir</button>
        </div>
        <?php if (!empty($erroresAvatar)) { ?>
          <div class="alert alert-danger" role="alert">
            <?php echo $erroresAvatar["avatar"]; ?>
          </div> <?php } ?>
      </form>
    </div>
  </section>
  <script src="js/app.js"></script>
</body>

</html>