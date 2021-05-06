<?php
require_once 'entete.php';
require_once '../modeles/Quizz.php';
$Q = new Quizz();
$Quizzs = $Q->getAllQuizz();

$_SESSION['Score'] = 0;

if(isset($_SESSION['idQuestion']))
{
  unset($_SESSION['idQuestion']);
}

if(isset($_SESSION['compteur']))
{
  unset($_SESSION['compteur']);
}

  ?>


<?php
  if(isset($_GET["success"])&& $_GET['success'] == 1 ){
    ?>
        <div class="alert alert-success">
            <?=$_GET['pseudo'];?>, Vous êtes déconnecté.<br>
        </div>
      <?php
    }
    ?>
    <h1 class="text-center " style=" font-family: Fredoka One, sans-serif;text-transform: uppercase;color: white;font-weight:300 ">Bienvenue sur Quizz Mania!</h1>
  <h3 class="text-center" style="color:white; text-transform:uppercase; font-weight:300">Les Nouveaux Quizz:</h3>
    <div class="container text-center coolstuff">
      <?php
      foreach($Quizzs as $Quizz){
       $categories = new Categorie($Quizz['idCat']);
       ?>
          <div class="card scale mb-3 ">
            <div class="row g-0">
              <div class="col-md-4 imgdiv">
                <img src="images/quizz.png">
              </div>
              <div class="col-md-8">
                <div class="card-body">
                  <h5 class="card-title"><?=$Quizz["nomQuizz"]?></h5>
                  <p class="card-text">Quizz n°<?=$Quizz["idQuizz"]?></p>
                  <p class="card-text">Catégorie : <?=$categories->getlibelle();?></p>
                  <a class="btn btn-primary" href="quizz.php?idQuizz=<?=$Quizz['idQuizz'];?>">Faire ce quizz</a>
                </div>
              </div>
            </div>
          </div>
          
          <?php
          }
          ?>
    </div>
      
      <?php 
require_once 'footer.php';
?>
