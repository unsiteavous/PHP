<?php
?>

<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <h1>Hasher mon mot de passe</h1>
  <form>
    <label for="mdp">Mot de passe : </label><input type="text" id="mdp" required>
    <input type="button" value="Allons-y !" onclick="hashermdp()">
  </form>
  <div id="barre"></div>
  <div id="hash"></div>

  <script>
    function hashermdp(){

      // définir les variables mdp, barre, reponse.

      // créer la requête XMLHttpRequest();
      
      // l'ouvrir, en lui donnant 3 paramètres :
      // https://developer.mozilla.org/fr/docs/Web/API/XMLHttpRequest/open

      // Donner ensuite au header le content-type correspondant : 
      // https://developer.mozilla.org/fr/docs/Web/API/XMLHttpRequest/setRequestHeader
      // https://developer.mozilla.org/fr/docs/Web/HTTP/Headers/Content-Type
      // https://developer.mozilla.org/fr/docs/Web/HTTP/Basics_of_HTTP/MIME_types  

      // Mettre les données dans le bon format :

      // Envoyer la requête :

      // Écouter le changement du retour :


        // Dans un for, écouter de 1 à 4 les états (readyState)
        // https://developer.mozilla.org/fr/docs/Web/API/XMLHttpRequest/readyState

        // https://developer.mozilla.org/fr/docs/Web/API/XMLHttpRequest/status

        // Si l'état est 4, et le status est 200, alors afficher la réponse.
        // https://developer.mozilla.org/fr/docs/Web/API/XMLHttpRequest/responseText
        
    }
  </script>
</body>


</html>
