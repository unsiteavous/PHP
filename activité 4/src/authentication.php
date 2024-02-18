<?php
session_start();
require 'classes/Database.php';
require 'classes/User.php';
$Database = new Database();

// Formulaire de connexion soumis :
if (isset($_POST['mail']) && isset($_POST['password']) && !empty($_POST['mail']) && !empty($_POST['password'])) {

  $userAvecCeMail = $Database->getThisUtilisateurByMail($_POST['mail']);
  if ($userAvecCeMail) {
    if (password_verify($_POST['password'], $userAvecCeMail->getPassword())) {
      $_SESSION['connecté'] = TRUE;
      $_SESSION['user'] = serialize($userAvecCeMail);
      header('location: ../tableau-de-bord.php');
      die;
    }
  }

}


// Demande de suppression de compte :
if (isset($_GET['suppression']) && $_SESSION['connecté'] && !empty($_SESSION['user'])) {
  $user = unserialize($_SESSION['user']);
  //si l'utilisateur cherche à supprimer son propre compte :
  if ($user->getId() === (int) $_GET['suppression']) {
    if ($Database->deleteThisUser($user->getId())) {
      session_destroy();
      header('location: ../connexion.php');
      die;
    }
  } else {
    // si l'utilisateur est un admin et cherche à supprimer le compte de quelqu'un d'autre :
    if ($user->isAdmin()) {
      if ($Database->deleteThisUser($_GET['suppression'])) {

        header('location: ../tableau-admin?section=utilisateurs');
        die;
      }
    }
  }
}

// Si on arrive là c'est que quelque chose s'est mal passé.
// Afin d'éviter de donner des indications sur la nature de l'échec à l'utilisateur,
// on lui renvoie une erreur générale.
header('location: ../connexion.php?erreur');
die;
