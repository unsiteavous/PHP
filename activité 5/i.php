<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>

<body>
  <label for="prenom">Prénom :</label><input type="text" id="prenom"><br>
  <label for="age">Âge :</label><input type="number" id="age"><br>
  <button onclick="appelFetch()">Envoyer</button>
  <div id="response"></div>

  <script>
    function appelFetch() {
      let response = document.getElementById('response');

    fetch("t.php",{
      method: "GET",
      headers: {
        'Content-Type': 'application/x-www-form-urlencoded'
      }
    }).then(
      reponse => reponse.text()
      ).then(
        data => response.innerHTML += data + "<br>"
      )
    }
  </script>
</body>

</html>