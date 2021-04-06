<?php require_once 'entete.php';
?>


<h1 class="text-center my-2">Connexion</h1>
<div class="container">
<form class="my-3" action="connexions.php" style="width: 35%; margin-left:33%;">
  <label for="pseudo" class="pseudo fs-4">Pseudo</label>
  <input type="pseudo" class="form-control" id="pseudo" placeholder="Entrez votre pseudonyme">
  <label for="mdp" class="mdp fs-4">Mot de Passe</label>
  <input type="mdp" class="form-control" id="mdp" placeholder="Entrez votre mot de passe">
  <button type="submit" class="btn btn-success my-3" style="margin-left: 40%;">Se connecter</button>
</form>
</div>