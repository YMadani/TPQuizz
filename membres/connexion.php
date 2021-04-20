<?php require_once 'entete.php';

  if(isset($_GET["success"])&& $_GET['success'] == 1 ){
    ?>
        <div class="alert alert-success">
            Bonjour  <?=$_SESSION['Pseudo'];?> , vous êtes bien connecté, vous allez être redirigé vers la page d'acceuil<br> 
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


<h1 class="text-center my-2">Connexion</h1>

  <div class="container">

      <form class="my-3" method="post" action="../Traitements/ajoutconnexion.php" style="width: 35%; margin-left:33%;">

          <label for="pseudo" class="pseudo fs-4">Pseudo</label>
          <input type="pseudo" name="pseudo" class="form-control"  placeholder="Entrez votre pseudonyme">

          <label for="mdp" class="mdp fs-4">Mot de Passe</label>
          <input type="password" name="mdp" class="form-control" placeholder="Entrez votre mot de passe">
        
        <button type="submit" class="btn btn-success my-3" style="margin-left: 40%;">Se connecter</button>

      </form>

  </div>