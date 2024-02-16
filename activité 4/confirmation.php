<?php
?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Confirmation</title>
  <link rel="stylesheet" href="assets/style.css">
  <script type="text/javascript" src="assets/script.js" defer></script>
</head>
<body>
  <form action="src/authentication.php" method="post">
    <h1>Merci de votre inscription !</h1>

    <label for="mail">Mail :</label>
    <input type="email" name="mail" id="mail" required>
    <label for="password">Mot de passe :</label>
    <input type="password" name="password" id="password" required>
    <input type="submit" value="Se connecter">
  </form>
</html>
