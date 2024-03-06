<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ajax</title>
</head>

<body>
  <button onclick="appelAjax()">Se connecter au serveur</button>
  <div id="response"></div>

  <script>
    let response = document.getElementById('response');

    function appelAjax() {
      fetch('traitement.php', {
        method: "GET",
        headers: {
          'Content-Type': 'application/x-www-form-urlencoded',
        }
      }).then(retour => {
        if (!retour.ok) {
          throw new Error('La connexion au serveur est cassée');
        }
        return retour.text();
      }).then(donnee => {
        response.innerHTML += donnee + "<br>";
      })

      // la même chose en plus rapide : 
      fetch('traitement.php').then(retour => retour.text()).then(data => console.log(data));
    }

   
  </script>
</body>

</html>