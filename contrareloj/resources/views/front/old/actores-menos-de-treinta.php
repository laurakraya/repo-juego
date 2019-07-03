<?php

include_once "pdo.php";

$stmt = $db->prepare("SELECT * FROM preguntas");
$stmt->execute();
$preguntas = $stmt->fetchAll(PDO::FETCH_ASSOC);

function chequearEdad ($bday) {
  $validate = (date("Y")-30).date("-m-d");
  if ($bday > $validate) {
    return true;
  } else {
    return false;
  }
}

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <h1>Listado de preguntas</h1>
    <ul>
      <?php foreach ($preguntas as $pregunta): ?>
        <?php if (chequearEdad($pregunta["fecha_Nac"]) == true) : ?>
          <li><?= $pregunta["id"] ?>, <img style="width: 100px" src="<?= $pregunta["imagen"] ?>" alt="">, <?= $pregunta["nombre"] ?> </li>
        <?php endif; ?>
      <?php endforeach; ?>
    </ul>
  </body>
</html>