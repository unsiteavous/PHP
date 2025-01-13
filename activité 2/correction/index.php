<?php
echo "hello world";
$tableau = ["Raphaël", "Yanis", "Mylène", "Raiana"];
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>

<body>
  <style>
    form {
      display: flex;
      flex-direction: column;
      width: 50%;
    }
  </style>



  <form action="traitement.php" method="POST">
    <label for="prenom">Prénom :</label>
    <input type="text" id="prenom" name="prenom"  value="Raphaël">
    <label for="nom">Nom :</label>
    <input type="text" id="nom" name="nom" required minlength="2">
    <label for="email">Email :</label>
    <input type="email" id="email" name="email" placeholder="email@domaine.fr">
    <?php if(isset($_GET['erreur'])){ ?>
      <p style='color:red'> <?php echo $_GET['erreur'] ?></p>
    <?php } ?>
    <label for="objet">Objet du message :</label>
    <input type="text" id="objet" name="objet" required maxlength="100">
    <label for="message">Message :</label>
    <textarea name="message" id="message" cols="50" rows="10" required placeholder="Votre message"></textarea>

    <div>
      <input type="checkbox" name="newsletter" id="newsletter">
      <label for="newsletter">S'inscrire à la newsletter</label>
    </div>
    <input type="submit" value="Soumettre">
  </form>


</body>

</html>