<?php
session_start();
require 'src/classes/User.php';

if (!isset($_SESSION['connecté']) && empty($_SESSION['user'])) {
  // abort
  header('location: connexion.php');
  die;
}
$user = unserialize($_SESSION['user']);

if (!$user->isAdmin()) {
  header('location: tableau-de-bord.php');
  die;
}

if (isset($_GET['section'])) {
  switch($_GET['section']){
    case 'utilisateurs':
      $section = 'utilisateurs';
    break 1;
    default:
      $section = null;
    break;
  }
} else {
  $section = null;
}
include 'includes/header.php';
?>
<main>
  <?php include 'includes/colonne.php'; ?>
  <div class="content">
    <?php if ($section == "utilisateurs") {
      include 'includes/section-utilisateurs.php';
    }?>
  </div>
</main>
