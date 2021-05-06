<?php require_once 'entete.php';

$Q = new Quizz();

$approuverQuizz = $Q->quizzAttente();

if(isset($_SESSION['idRole']) && !empty($_SESSION['idRole'])){
    if($_SESSION['idRole'] == 2){
        if(isset($_GET['success']) && !empty($_GET['success'])){
            if($_GET['success'] == 1){
                ?>
                <div class="alert alert-success">
                    Le quizz n°<?=$_GET['idQuizz'];?> a bien été approuvé !
                </div>
                <?php
            }else if($_GET['success'] == 0){
                ?>
                <div class="alert alert-danger">
                    L'opération que vous avez effectué sur le quizz n'a pas pu être enregistrée.
                </div>
                <?php
            }else if($_GET['success'] == 2){
                ?>
                <div class="alert alert-success">
                    Le quizz n°<?=$_GET['idQuizz'];?> a bien été supprimé !
                </div>
                <?php
            }

        }
        ?>
        <div class="container text-center">
        <p style="font-size:60px; color:white">Bienvenue dans le panel administrateur <?=$_SESSION['Pseudo'];?> !</p>
        <?php if (count($approuverQuizz) >= 1) {
            ?>
            <h3 style="color: white; margin-top:10%;"> Voici les quizz à approuver :</h3>
            </div>
            ?>
      <?php
        }else{
            ?>
            <div style="border: double 4px transparent;border-radius: 80px;background-image:linear-gradient(white, white), radial-gradient(circle at top left, #00C853,#B2FF59);background-origin: border-box;background-clip: content-box, border-box;;margin-top:20%">
            <h1 style="color: black;">Il n'y a pas de quizz à approuver, revenez plus tard !</h1>
            </div>
            <?php
        }
        ?>
        <div class="container text-center">
        <?php
      foreach($approuverQuizz as $Quizz){
       $categories = new Categorie($Quizz['idCat']);
       ?>
          <div class="card scale mb-3">
            <div class="row g-0">
              <div class="col-md-4 imgdiv">
                <img src="images/quizz.png">
              </div>
              <div class="col-md-8">
                <div class="card-body">
                  <h5 class="card-title"><?=$Quizz["nomQuizz"]?></h5>
                  <p class="card-text">Quizz n°<?=$Quizz["idQuizz"]?></p>
                  <p class="card-text">Catégorie : <?=$categories->getlibelle();?></p>
                  <a class="btn btn-success" href="../Traitements/quizzapprouve.php?idQuizz=<?=$Quizz['idQuizz'];?>">Approuver ce quizz</a>
                  <a class="btn btn-danger" href="../Traitements/quizzrefus.php?idQuizz=<?=$Quizz['idQuizz'];?>">Refuser ce quizz</a>
                </div>
              </div>
            </div>
          </div>
          
          <?php
          }
          ?>
      </div>
        <?php

    }
}