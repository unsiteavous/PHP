<?php

if (isset($_POST['mdp'])) {
  $mdp = password_hash($_POST['mdp'], PASSWORD_DEFAULT);

  echo $mdp;
}