<?php
 require_once 'entete.php';

  if(isset($_GET["success"])&& $_GET['success'] == 1 ){
    ?>
        <div class="alert alert-success">
            Bienvenue Mr/Mme <?=$_GET['nom'];?> , votre inscription a été complétée, vous allez être redirigé vers la page d'acceuil<br>
            <a href="index.php">Retour à l'accueil</a> 
        </div>
      <?php
      header("refresh:6;index.php");  
    }else if(isset($_GET["success"])&& $_GET['success'] == 0 ){
      ?>
          <div class="alert alert-danger">
                        Erreur: <?= $_GET['erreurs'];?>
            </div>
      <?php
  }
    ?>
<h1 class="text-center my-2"> Formulaire d'inscription</h1>
<div class="container">
<form class="my-3" method="post" action="../Traitements/ajoutInscription.php" style="width: 35%; margin-left:33%;">
  <label for="pseudo" class="pseudo fs-4">Pseudo</label>
  <input type="pseudo" class="form-control" name="pseudo" placeholder="Entrez votre pseudonyme">
  <label for="email" class="email fs-4">Email</label>
  <input type="email" name="email" class="form-control" placeholder="Entrez votre Email">
  <label for="mdp" class="mdp fs-4">Mot de Passe</label>
  <input type="password" class="form-control" name="mdp" placeholder="Entrez votre mot de passe">
  <label for="QSecrete" class="QSecrete fs-4">Question secrète</label>
  <select class="form-select my-2" name="QSecrete" id="QSecrete">
      <option value="1" selected>Quelle était votre ville de naissance ?</option>
      <option value="2">Quelle était le nom de votre premier animal de compagnie ?</option>
      <option value="3">Quel est votre film favori ?</option>
      <option value="4">Quelle est la marque de votre première voiture ?</option>
  </select>
  <input class="form-control" type="text" name="RSecrete" id="RSecrete" placeholder="Entrez votre réponse à la question secrète">
  <button type="submit" name="envoie" class="btn btn-success my-3" style="margin-left: 40%;">S'inscrire</button>
</form>
</div>