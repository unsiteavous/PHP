<?php
session_start();
if(isset($_SESSION['connecté'])){
  require "config.php";
  header('location:'.URL_SITE.'admin.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Connexion</title>
</head>
<body>
  <form action="traitement.php" method="post">
    <label for="email">Email</label>
    <input type="email" name="email" id="email">
    <label for="password">Mot de passe</label>
    <input type="password" name="password" id="password">

    <?php if (isset($_GET['erreur'])) { ?>
      <p style="color: red;"><?php echo $_GET['erreur']; ?></p>
    <?php } ?>
    <input type="submit" value="Se connecter">
  </form>
</body>
</html>