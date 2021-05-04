<?php require_once 'entete.php';

  if(isset($_GET["success"])&& $_GET['success'] == 1 ){
    ?>
        <div class="alert alert-success">
            Bonjour  <?=$_SESSION['Pseudo'];?> , vous êtes bien connecté, vous allez être redirigé vers la page d'acceuil<br> 
        </div>
      <?php
      header("refresh:6;index.php");  
    }else if(isset($_GET["success"])&& $_GET['success'] == 0 && !empty($_GET['erreurs']) ){
      ?> 
         
          <div class="alert alert-danger">
                        Erreur: <?= $_GET['erreurs'];?>
                        
                          <button class='btn btn-primary' onclick="QSecrete();" id='connect'>Récuperer le mot de passe</button>

            </div>
      <?php
    }else if(isset($_GET["success"])&& $_GET['success'] == 0)
    {
      ?>
      <div class="alert alert-danger">
                        Erreur: Veuillez renseigner tout les champs demandé.
            </div>
            <?php
    }else if(isset($_GET["success"])&& $_GET['success'] == 3)
    {
      ?>
      <div class="alert alert-success">
          Bonjour, votre mot de passe à bien été modifié! 
      </div>
    <?php
   }else if(isset($_GET["success"])&& $_GET['success'] == 4)
   {
     ?>
     <div class="alert alert-success">
         ren,seignez tt les champs pour changer de mdp
     </div>
   <?php
    }else if(isset($_GET["success"])&& $_GET['success'] == 5)
    {
      ?>
      <div class="alert alert-success">
         Pseudo ou email incorrect
      </div>
    <?php
    }
    ?>



  <h1 class="text-center my-2 hide" id="connexion">Connexion</h1>
  <h1 class="text-center my-2 planque" id="formQsecrete">Récupération Question Secrète</h1>


  <div class="container hide" id="formConnexion">

      <form class="my-3" method="post" action="../Traitements/ajoutconnexion.php" style="width: 35%; margin-left:33%;">

          <label for="pseudo" class="pseudo fs-4">Pseudo</label>
          <input type="text" name="pseudo" class="form-control"  placeholder="Entrez votre pseudonyme">

          <label for="mdp" class="mdp fs-4">Mot de Passe</label>
          <input type="password" name="mdp" class="form-control" placeholder="Entrez votre mot de passe">
        
        <button type="submit" class="btn btn-success my-3" style="margin-left: 40%;">Se connecter</button>

      </form>

  </div>
<<<<<<< HEAD
  <div class="container planque" id="Qsecrete">

      <form class="my-3" method="post" action="../Traitements/recupmdp.php" style="width: 35%; margin-left:33%;">

          <label for="Pseudo" class="pseudo fs-4">Pseudo</label>
          <input type="text" name="Pseudo" class="form-control"  placeholder="Entrez votre pseudonyme">

          <label for="email" class="pseudo fs-4">Email</label>
          <input type="email" name="email" class="form-control"  placeholder="Entrez votre pseudonyme">
        
        <button type="submit" class="btn btn-success my-3" style="margin-left: 40%;">Récuperer mot de passe</button>

      </form>

  </div>
  <?php 
require_once 'footer.php';
?>
=======

  <?php require_once 'footer.php'?>
>>>>>>> refs/remotes/origin/main
