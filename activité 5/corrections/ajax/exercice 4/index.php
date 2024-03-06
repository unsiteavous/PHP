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
  <div id="barre" style="background-color: blue; height: 5px; width: 0px"></div>
  <div id="hash"></div>

  <script>
    function hashermdp() {

      // définir les variables mdp, barre, reponse.
      let mdp = document.getElementById('mdp').value;
      let barreProgression = document.getElementById('barre');
      let hash = document.getElementById('hash');
      // créer la requête XMLHttpRequest();
      const requete = new XMLHttpRequest();

      // l'ouvrir, en lui donnant 3 paramètres :
      // https://developer.mozilla.org/fr/docs/Web/API/XMLHttpRequest/open
      requete.open('POST', 'traitement-correction.php', true);


      // Donner ensuite au header le content-type correspondant : 
      // https://developer.mozilla.org/fr/docs/Web/API/XMLHttpRequest/setRequestHeader
      // https://developer.mozilla.org/fr/docs/Web/HTTP/Headers/Content-Type
      // https://developer.mozilla.org/fr/docs/Web/HTTP/Basics_of_HTTP/MIME_types  

      requete.setRequestHeader('content-type', 'application/x-www-form-urlencoded');

      // Envoyer la requête :

      requete.send('mdp=' + mdp);

      // Écouter le changement du retour :

      requete.onreadystatechange = function() {

        // écouter de 1 à 4 les états (readyState)
        // https://developer.mozilla.org/fr/docs/Web/API/XMLHttpRequest/readyState
        // https://developer.mozilla.org/fr/docs/Web/API/XMLHttpRequest/status
        switch (requete.readyState) {
          case 1:
            barreProgression.style.width = "25px";
            break;
          case 2:
            barreProgression.style.width = "50px";
            break;
          case 3:
            barreProgression.style.width = "75px";
            break;
          default:
            barreProgression.style.width = "0px";
            break;
        }
        // Si l'état est 4, et le status est 200, alors afficher la réponse.
        // https://developer.mozilla.org/fr/docs/Web/API/XMLHttpRequest/responseText
        if (requete.readyState === 4 && requete.status == 200) {
          barreProgression.style.width = "100px";
          hash.innerHTML += requete.responseText + "<br>";
        }
      }
    }
  </script>
</body>
</html>