<?php

if (isset($_POST['prenom']) && isset($_POST['age'])) {
  echo "Bonjour " . $_POST['prenom'] . ", tu as " . $_POST['age'] . " ans.";
}