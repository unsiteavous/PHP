<?php
require "config.php";
require "classes/User.php";
require "classes/Database.php";

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

if ($_POST['password'] !== $_POST['passwordconfirm']) {
  header('location:'.URL_SITE.'?erreurPasswordConfirm=Les mots de passe ne correspondent pas');
  die;
}

$user = new User(prenom: $_POST['prenom'],nom: $_POST['nom'],email: $_POST['email'],password: $_POST['password']);


var_dump($user);

$database = new Database();

if ($database->createUser($user)) {
  header('location:'.URL_SITE.'?success=Votre compte a bien été créé');
  die;
} else {
  header('location:'.URL_SITE.'?erreur=Une erreur est survenue lors de la création de votre compte');
  die;
}