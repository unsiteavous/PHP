<?php
require 'config.php';
require 'classes/User.php';
require 'classes/Database.php';

if (isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['mail']) && isset($_POST['password']) && isset($_POST['password2']) && !empty($_POST['nom']) && !empty($_POST['prenom']) && !empty($_POST['mail']) && !empty($_POST['password']) && !empty($_POST['password2'])) {

  $nom = htmlentities($_POST['nom']);
  $prenom = htmlentities($_POST['prenom']);

  if(filter_var($_POST['mail'], FILTER_VALIDATE_EMAIL)) {
    $mail = htmlentities($_POST['mail']);
  } else {
    header('location:/../index.php?erreur='.ERREUR_EMAIL);
    die;
  }

  if (strlen($_POST['password']) >= 8 ) {
    if ($_POST['password'] === $_POST['password2']) {
      $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    } else {
      header('location:/../index.php?erreur='.ERREUR_PASSWORD_IDENTIQUE);
      die;
    }
  } else {
    header('location:/../index.php?erreur='.ERREUR_PASSWORD_LENGTH);
    die;
  }

  $user = new User($nom, $prenom, $mail, $password);
  $Database = new Database();
  if($Database->saveUtilisateur($user)) {
    header('location:/../confirmation.php');
  }else {
    header('location:/../index.php?erreur='.ERREUR_ENREGISTREMENT);
  }

} else {
  header('location:/../index.php?erreur='.ERREUR_CHAMP_VIDE);
  die;
}
