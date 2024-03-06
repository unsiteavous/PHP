<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ajax</title>

</head>
<body>
  <button onclick="appelAjax()">Se connecter au serveur</button>
</body>

<div id="response"></div>

<script>
  let response = document.getElementById('response');

  function appelAjax(){
    const request = new XMLHttpRequest();

    request.open('POST','traitement.php',true);

    request.setRequestHeader('content-type','application/x-www-form-urlencoded');

    request.send(null);

    request.onreadystatechange = function () {
      if(request.readyState === 4 && request.status === 200) {
        response.innerHTML += request.responseText + "<br>";
      }
    }
  }

</script>
</html>