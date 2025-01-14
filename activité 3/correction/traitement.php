<?php
require "config.php";
date_default_timezone_set('Europe/Paris');
define('HASHED_PASSWORD', password_hash(PASSWORD, PASSWORD_ARGON2I));

if (
  !isset($_POST['email']) ||
  !isset($_POST['password']) ||
  empty($_POST['email']) ||
  empty($_POST['password'])
) {
  header('location:index.php?erreur=Merci de remplir tous les champs');
  die;
}
var_dump('test');
if (
  $_POST['email'] !== EMAIL ||
  !password_verify($_POST['password'], HASHED_PASSWORD)
) {
  header('location:index.php?erreur=Email ou mot de passe incorrect');
  die;
}

session_start();
// Il est possible de modifier la dureé d'une session en utilisant la fonction setcookie, mais cela n'intervient que sur la session côté utilisateur, et il est possible d'en modifier la valeur. Ce n'est donc pas suffisamment sécurisé.
// setcookie(session_name(), session_id(), time() + 10);
$_SESSION['connecté'] = TRUE;
$_SESSION['lifetime'] = time();
header('location:/admin.php');
