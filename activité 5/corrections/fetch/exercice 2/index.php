<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ajax</title>
</head>

<body>
  <label for="prenom">Prénom :</label><input type="text" id="prenom"><br>
  <label for="age">Âge :</label><input type="number" id="age"><br>
  <button onclick="appelFetch()">Envoyer</button>
  <div id="response"></div>

  <script>
    
    function appelFetch() {
      let prenom = document.getElementById('prenom').value;
      let age = document.getElementById('age').value;
      let response = document.getElementById('response');
      fetch('traitement.php', {
        method: "POST",
        headers: {
          'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: "prenom="+prenom+"&age="+age

      }).then(retour => {
        if (!retour.ok) {
          throw new Error('La connexion au serveur est cassée');
        }
        return retour.text();
      }).then(data => {
        response.innerHTML += data + "<br>";
      })
    }
  </script>
</body>

</html>