<?php
require "config.php";
session_start();
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
</body>
</html>