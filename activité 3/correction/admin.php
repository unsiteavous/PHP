<?php
require "config.php";
session_start();

if(isset($_SESSION['lifetime']) && time() - $_SESSION['lifetime'] > 1000) {
  session_destroy();
  header('location:'.URL_SITE);
  die;
}

if(!isset($_SESSION['connecté'])) {
  header('location:'.URL_SITE);
  die;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin</title>
</head>
<body>
  <h1>Admin</h1>
  <form action="deconnexion.php" method="GET">
    <input type="submit" value="Deconnexion">
  </form>

  <script>
    // setTimeout(function() {
    //   window.location.href = '/deconnexion';
    // }, 10000);
  </script>
</body>
</html>