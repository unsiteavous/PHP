<?php
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="assets/css/style.css">
  <title>Inscription</title>
</head>
<body>
  <h1>Formulaire d'inscription</h1>
  <?php if (isset($_GET['erreur'])) { ?>
    <p style="color: red;"><?php echo $_GET['erreur']; ?></p>
  <?php } ?>
  <?php if (isset($_GET['success'])) { ?>
    <p style="color: green;"><?php echo $_GET['success']; ?></p>
  <?php } ?>
  
  <form action="src/traitement.php" method="POST">
    <?php if (isset($_GET['erreur'])) { ?>
      <p style="color: red;"><?php echo $_GET['erreurChampsVide']; ?></p>
    <?php } ?>

    <label for="nom">Nom</label>
    <input type="text" name="nom" id="nom" required>

    <label for="prenom">Prenom</label>
    <input type="text" name="prenom" id="prenom" required>

    <label for="email">Email</label>
    <input type="email" name="email" id="email" required>

    <?php if (isset($_GET['erreurEmail'])) { ?>
      <p style="color: red;"><?php echo $_GET['erreurEmail']; ?></p>
    <?php } ?>

    <label for="password">Mot de passe</label>
    <input type="password" name="password" id="password" required minlength="8">

    <?php if (isset($_GET['erreurPassword'])) { ?>
      <p style="color: red;"><?php echo $_GET['erreurPassword']; ?></p>
    <?php } ?>

    <label for="passwordconfirm">Confirmer le mot de passe</label>
    <input type="password" name="passwordconfirm" id="passwordconfirm" required minlength="8">

    <?php if (isset($_GET['erreurPasswordConfirm'])) { ?>
      <p style="color: red;"><?php echo $_GET['erreurPasswordConfirm']; ?></p>
    <?php } ?>

    <input type="submit" value="Inscription">
  </form>
</body>
</html>