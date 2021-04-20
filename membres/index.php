<?php
require_once 'entete.php';
require_once '../modeles/Quizz.php';
$Q = new Quizz();
$Quizzs = $Q->getAllQuizz();
  ?>


  <h1 class="text-center underline">Bienvenue sur Quizz Mania!</h1>
<?php
  //  echo $quizz->getQuizz();
  //  echo $question->getQuestion();
  //  echo $question->getidQuestion();
  //  echo $cat->getidCat();
  //  echo $rep->getReponse();
  //  echo $rep->getStatutR();
      ?>

  <h3 class="text-center">Les Nouveaux Quizz:</h3>
      <div class="container text-center">
      <?php
      foreach($Quizzs as $Quizz){
       ?>
      
          <div class="card mb-3">
            <div class="row g-0">
              <div class="col-md-4 imgdiv">
                <img src="images/quizz.png">
              </div>
              <div class="col-md-8">
                <div class="card-body">
                  <h5 class="card-title"><?=$Quizz["nomQuizz"]?></h5>
                  <p class="card-text"><?=$Quizz["idQuizz"]?></p>
                  <p class="card-text"><small class="text-muted">coucou</small></p>
                </div>
              </div>
              <a class="btn btn-primary" href="creerQuizz.php">Créer un nouveau quizz</a>
            </div>
          </div>
          <?php
          }
          ?>
      </div>
      
      <?php 
require_once 'footer.php';
?>
