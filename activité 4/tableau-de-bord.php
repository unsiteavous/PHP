<?php
session_start();
if (isset($_SESSION['connecté']) && !empty($_SESSION['user'])) {
  // code...
}
