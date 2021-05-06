<?php require_once 'entete.php';

$quizz = new Quizz();

if(isset($_GET['idQuizz']) && !empty($_GET['idQuizz'])){
    $idQuizz = $_GET['idQuizz'];

    ?>

    <div class="alert alert-success">
            Vos réponses au quizz n°<?=$idQuizz;?> ont bien été enregistrées
    </div>
    

    <div class="container text-center">
        <?php
        if($quizz->afficherScore('',$idQuizz) >= 5){
        ?>
        <h1>
            Votre score pour ce quizz est de <?=$quizz->afficherScore('',$idQuizz);?>, bien joué !
        </h1>
        <img style="width: 15%;" src="https://i.pinimg.com/originals/3b/ef/73/3bef738000dcd57710828a4218c046ea.gif"><br>
        <a href="" class="btn btn-success">Retourner à l'accueil<a>
        <?php
        }else{
            ?>
        <h1>
            Votre score pour ce quizz est de <?=$quizz->afficherScore('',$idQuizz);?>, dommage !
        </h1>
            <img style="width: 15%;" src="https://blog.joypixels.com/content/images/2019/12/thumbs_down.gif"><br>
            <a href="" class="btn btn-success">Retourner à l'accueil<a>
    </div>
    <?php
    }
}