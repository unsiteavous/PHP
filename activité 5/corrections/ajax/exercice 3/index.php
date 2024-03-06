<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ajax</title>

</head>

<body>
  <label for="prenom">Prenom :</label><input type="text" id="prenom"><br>
  <label for="age">Âge :</label><input type="number" id="age"><br>
  <button onclick="appelAjax()">Soumettre</button>


  <div id="response"></div>

  <script>
    let response = document.getElementById('response');

    function appelAjax() {
      let prenom = document.getElementById('prenom').value;
      let age = document.getElementById('age').value;
      const request = new XMLHttpRequest();

      request.open('POST', 'traitement.php', true);

      request.setRequestHeader('content-type', 'application/json');

      request.send(JSON.stringify({
        'prenom': prenom,
        'age': age
      }));

      request.onreadystatechange = function() {
        if (request.readyState === 4 && request.status === 200) {
          response.innerHTML += JSON.parse(request.responseText);
        }
      }
    }
  </script>
</body>

</html>