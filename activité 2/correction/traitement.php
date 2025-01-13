<?php

if (isset($_POST['prenom']) &&
    isset($_POST['nom']) &&
    isset($_POST['email']) &&
    isset($_POST['objet']) &&
    isset($_POST['message']) &&
    !empty($_POST['prenom']) &&
    !empty($_POST['nom']) &&
    !empty($_POST['email']) &&
    !empty($_POST['objet']) &&
    !empty($_POST['message'])
) {
  $email = strtolower(sanitize($_POST['email']));

  if(!filter_var($email,FILTER_VALIDATE_EMAIL )) {
    header("location:/index.php?erreur=l'email n'a pas le bon format");
    die;
  }
  $prenom = ucfirst(strtolower(sanitize($_POST['prenom'])));
  $nom = ucfirst(strtolower(sanitize($_POST['nom'])));
  if(strlen($_POST['objet']) > 100) {
    echo "l'objet est trop long";
    die;
  }
  $objet = sanitize($_POST['objet']);
  $message = sanitize($_POST['message']);

  // Enregistrement des données

  echo "Le formulaire a bien été envoyé";

} else {
  echo "Il manque des informations";
}

function sanitize(string $string): string {
  $forbiddenCharacters = ["<",">","/","<?php","<?"];
  $blabklistWords = ["porno","sex","connard"];

  $string = str_replace($forbiddenCharacters, "", $string);
  $string = str_replace($blabklistWords, "censured", $string);
  $string = htmlspecialchars($string);

  return $string;
}