<?php require_once 'entete.php';

$quizz = new Quizz();

if(isset($_SESSION['idUser']) && !empty($_SESSION['idUser'])){
    $idUser = $_SESSION['idUser'];

    $quizzFait = $quizz->quizzUser($idUser);
    ?>
    <?php
    if(count($quizzFait)>= 1){
        ?>
    <div class="alert alert-success text-center" style="width: 75%; margin-left:13%;">
            A ce jour, vous avez fait <?=count($quizzFait);?> quizz !
        </div>
    <div class="container text-center my-5">
      <?php
      foreach($quizzFait as $Quizz){
          $categories = new Categorie($Quizz['idCat'])
       ?>
          <div class="card scale mb-3">
            <div class="row g-0">
              <div class="col-md-4 imgdiv">
                <img src="images/quizz.png">
              </div>
              <div class="col-md-8">
                <div class="card-body">
                  <h5 class="card-title"><?=$Quizz["nomQuizz"]?></h5>
                  <p class="card-text">N° de création de quizz : <?=$Quizz["idQuizz"]?></p>
                  <p class="card-text">Catégorie : <?=$categories->getlibelle()?></p>
                  <p class="card-text">Score : <?=$Quizz["Score"]?>/10</p>
                  <a class="btn btn-primary" href="quizz.php?idQuizz=<?=$Quizz['idQuizz'];?>">Correction</a>
                </div>
              </div>
            </div>
          </div>
          
          <?php
          }
          ?>
      </div>
      <?php
    }else{
        ?>
        <div class="alert alert-danger">
            Vous n'avez pas encore fait de quizz.
        </div>
    <?php
    }
}else{
    header('location:index.php');
}


require_once 'footer.php';




