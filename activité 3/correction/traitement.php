<?php
require "config.php";

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
$_SESSION['connecté'] = TRUE;
header('location:/admin.php');
