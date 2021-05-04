<?php
require_once 'entete.php';
$Qsecrete = new QSecrete($_GET['Qsecrete']);
$libelle = $Qsecrete -> getLibelle();

if(isset($_GET["success"])&& $_GET['success'] == 0 ){
    ?>
        <div class="alert alert-danger">
            Les mots de passes renseignez ne correspondent pas.
        </div>
      <?php
      header("refresh:6;index.php");  
    }else if(isset($_GET["success"])&& $_GET['success'] == 1 ){
      ?> 
         
          <div class="alert alert-danger">
                La réponse secrète est mauvaise.
            </div>
      <?php
    }else if(isset($_GET["success"])&& $_GET['success'] == 2)
    {
      ?>
      <div class="alert alert-danger">
            L'email renseignez n'est pas dans la BDD   
      </div>
            <?php
    }else if(isset($_GET["success"])&& $_GET['success'] == 4)
    {
      ?>
      <div class="alert alert-danger">
          Veuillez renseignez tout les champs
      </div>
    <?php
    }
    ?>
<h1 class="text-center my-2">Changement du Mot de Passe</h1>
<div class="container hide">

    <form class="my-3" method="post" action="../Traitements/changerMDP.php" style="width: 35%; margin-left:33%;">

        <label for="QSecrete" class='fs-4'><?=$libelle?></label>
          <input class="form-control" type="text" name="RSecrete" id="RSecrete" placeholder="Entrez votre réponse à la question secrète">

        <label for="mdp" class="mdp fs-4">Mot de Passe</label>
        <input type="password" name="mdp" class="form-control" placeholder="Entrez votre mot de passe">

        <label for="vmdp" class="mdp fs-4">Vérification du Mot de Passe</label>
        <input type="password" name="vmdp" class="form-control" placeholder="Entrez votre mot de passe">
      
      <button type="submit" class="btn btn-success my-3" style="margin-left: 40%;">Changer Mdp</button>

    </form>

</div>

<?php
require_once 'footer.php';