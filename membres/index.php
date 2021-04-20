<?php
require_once 'entete.php';
require_once '../modeles/Quizz.php';
$Q = new Quizz();
$Quizzs = $Q->getAllQuizz();
  ?>


  <h1 class="text-center underline">Bienvenue sur Quizz Mania!</h1>
<?php
  if(isset($_GET["success"])&& $_GET['success'] == 1 ){
    ?>
        <div class="alert alert-success">
            <?=$_GET['pseudo'];?>, Vous êtes déconnecté.<br>
        </div>
      <?php
    }
    ?>
  <div class=''>
    <h1 class="text-center underline effect-2">Bienvenue sur Quizz Mania!</h1>
  </div>
  <h3 class="text-center">Les Nouveaux Quizz:</h3>
      <div class="container text-center">
      <?php
      foreach($Quizzs as $Quizz){
       ?>
      
          <div class="card scale mb-3">
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
            </div>
          </div>
          <?php
          }
          ?>
      </div>
      
      <?php 
require_once 'footer.php';
?>
