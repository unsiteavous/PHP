<?php
echo "page de traitement";

var_dump($_POST);

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
  if(!filter_var($_POST['email'],FILTER_VALIDATE_EMAIL )) {
    echo "l'email n'a pas le bon format";
    die;
  }
  $prenom = ucfirst(strtolower(sanitize($_POST['prenom'])));
  $nom = ucfirst(strtolower(sanitize($_POST['nom'])));
  $message = sanitize($_POST['message']);
  var_dump($prenom,$nom,$message);
  echo $message;
  

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