<?php
?>

<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Hash de mot de passe</title>
</head>

<body>
  <form>
    <label for="">Mot de passe à hasher : </label><input type="text" id="mdp">
    <input type="button" value="allons-y !" onclick="hashmdp()">
  </form>

  <div id="resultat"></div>

  <script>
    function hashmdp() {
      let mdp = document.getElementById('mdp').value;
      let resultat = document.getElementById('resultat');


      // Les options par défaut sont indiquées par *
      fetch("traitement.php", {
          method: "POST", // *GET, POST, PUT, DELETE, etc.
          mode: "cors", // no-cors, *cors, same-origin
          cache: "no-cache", // *default, no-cache, reload, force-cache, only-if-cached
          credentials: "same-origin", // include, *same-origin, omit
          headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
          },
          redirect: "follow", // manual, *follow, error
          referrerPolicy: "no-referrer", // no-referrer, *no-referrer-when-downgrade, origin, origin-when-cross-origin, same-origin, strict-origin, strict-origin-when-cross-origin, unsafe-url
          body: "mdp=" + mdp + "&hash=md5" // le type utilisé pour le corps doit correspondre à l'en-tête "Content-Type"

        }).then((response) => {
          if (!response.ok) {
            throw new Error("La réponse du serveur n'est pas OK");
          }
          
          return response.text(); // transforme la réponse JSON reçue en objet JavaScript natif
        })
        .then(data => {
          // Manipulation des données obtenues
          resultat.innerHTML += data  + "<br>";
        })
        .catch(error => {
          // Gestion des erreurs
          console.error('Une erreur s\'est produite:', error);
        });

    }

  </script>
</body>

</html>