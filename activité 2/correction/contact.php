<?php 
$title = "Contact";
include 'includes/header.php'; ?>


  <?php if(isset($_GET['success'])){ ?>
    <p style='color:chartreuse'><?php echo $_GET['success'] ?></p>
  <?php } ?>


  <form action="traitement.php" method="POST">
    <label for="prenom">Prénom :</label>
    <input type="text" id="prenom" name="prenom"  value="Raphaël">
    <label for="nom">Nom :</label>
    <input type="text" id="nom" name="nom" required minlength="2">
    <label for="email">Email :</label>
    <input type="email" id="email" name="email" placeholder="email@domaine.fr">
    <?php if(isset($_GET['erreurEmail'])){ ?>
      <p style='color:red'> <?php echo $_GET['erreurEmail'] ?></p>
    <?php } ?>
    <label for="objet">Objet du message :</label>
    <input type="text" id="objet" name="objet" required maxlength="100">
    <?php if(isset($_GET['erreurObjet'])){ ?>
      <p style='color:red'> <?php echo $_GET['erreurObjet'] ?></p>
    <?php } ?>
    <label for="message">Message :</label>
    <textarea name="message" id="message" cols="50" rows="10" required placeholder="Votre message"></textarea>

    <div>
      <input type="checkbox" name="newsletter" id="newsletter">
      <label for="newsletter">S'inscrire à la newsletter</label>
    </div>
    <?php if(isset($_GET['erreurChamps'])){ ?>
      <p style='color:red'> <?php echo $_GET['erreurChamps'] ?></p>
    <?php } ?>
    <input type="submit" value="Soumettre">
  </form>


<?php include 'includes/footer.php'; ?>