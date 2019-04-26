<?php

require_once "funciones.php";
unset($_SESSION);
session_destroy();
header("Location: index.php"); exit;

?>
