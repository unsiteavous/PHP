<?php
require "config.php";
require "classes/User.php";

if (
  !isset($_POST['nom']) ||
  !isset($_POST['prenom']) ||
  !isset($_POST['email']) ||
  !isset($_POST['password']) ||
  !isset($_POST['passwordconfirm']) ||
  empty($_POST['nom']) ||
  empty($_POST['prenom']) ||
  empty($_POST['email']) ||
  empty($_POST['password']) ||
  empty($_POST['passwordconfirm'])
) {
  header('location:'.URL_SITE.'?erreurChampsVide=Merci de remplir tous les champs');
  die;
} 

if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
  header('location:'.URL_SITE.'?erreurEmail=l\'email n\'a pas le bon format');
  die;
}

if (strlen($_POST['password']) < 8) {
  header('location:'.URL_SITE.'?erreurPassword=Le mot de passe doit contenir au moins 8 caractères');
  die;
}

$nom = ucfirst(strtolower(htmlspecialchars($_POST['nom'])));
$prenom = ucfirst(strtolower(htmlspecialchars($_POST['prenom'])));
$email = strtolower(htmlspecialchars($_POST['email']));
$password = htmlspecialchars($_POST['password']);
$passwordconfirm = htmlspecialchars($_POST['passwordconfirm']);

if ($password !== $passwordconfirm) {
  header('location:'.URL_SITE.'?erreurPasswordConfirm=Les mots de passe ne correspondent pas');
  die;
}

$hash = password_hash($password, PASSWORD_DEFAULT);

$user = new User($prenom, $nom, $email, $hash);

var_dump($user);