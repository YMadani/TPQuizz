<?php require_once 'entete.php';

?>
<h1 class="text-center my-2"> Formulaire d'inscription</h1>
<div class="container">
<form class="my-3" action="enregistrementInscription.php" style="width: 35%; margin-left:33%;">
  <label for="pseudo" class="pseudo fs-4">Pseudo</label>
  <input type="pseudo" class="form-control" id="pseudo" placeholder="Entrez votre pseudonyme">
  <label for="mdp" class="mdp fs-4">Mot de Passe</label>
  <input type="mdp" class="form-control" id="mdp" placeholder="Entrez votre mot de passe">
  <label for="QSecrete" class="QSecrete fs-4">Question secrète</label>
  <select class="form-select my-2" name="QSecrete" id="QSecrete">
      <option selected>Quelle était votre ville de naissance ?</option>
      <option>Quelle était le nom de votre premier animal de compagnie ?</option>
      <option>Quel est votre film favori ?</option>
      <option>Quelle est la marque de votre première voiture ?</option>
  </select>
  <input class="form-control" type="text" name="RSecrete" id="RSecrete" placeholder="Entrez votre réponse à la question secrète">
  <button type="submit" class="btn btn-success my-3" style="margin-left: 40%;">S'inscrire</button>
</form>
</div>