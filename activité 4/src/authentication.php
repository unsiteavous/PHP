<?php
session_start();
require 'classes/Database.php';
require 'classes/User.php';

if (isset($_POST['mail']) && isset($_POST['password']) && !empty($_POST['mail']) && !empty($_POST['password'])) {

  $Database = new Database();

  $userAvecCeMail = $Database->getThisUtilisateurByMail($_POST['mail']);

  if (password_verify($_POST['password'], $userAvecCeMail->getPassword())) {
      $_SESSION['connecté'] = TRUE;
      $_SESSION['user'] = $userAvecCeMail;
  }
}
