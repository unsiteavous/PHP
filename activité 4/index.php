<?php

?>

<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Inscription Newsletter</title>
  <link rel="stylesheet" href="assets/style.css" >
  <script src="assets/script.js" defer></script>
</head>
<body>
  <form action="traitement.php" method="post" onsubmit="Validation()">
    <h1>Formulaire d'inscription à la Newsletter</h1>
    <label for="nom">Nom :</label>
    <input type="text" id="nom" name="nom" required>
    <label for="prenom">Prénom :</label>
    <input type="text" id="prenom" name="prenom" required>
    <label for="mail">Mail :</label>
    <input type="email" id="mail" name="mail" required>
    <label for="password">Mot de passe :</label>
    <input type="password" id="password" name="password" required>
    <input type="submit" name="submit" value="S'inscrire">
  </form>
</body>
</html>
