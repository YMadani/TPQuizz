<?php
require_once '../membres/entete.php';
extract($_POST);
$quizz = new Quizz();
$idUser = 1;

if(isset($nomQuizz) && !empty($nomQuizz) && isset($idUser) && !empty($idUser)){
    try{
        $quizz->insertQuizz($nomQuizz, $idCat, $idUser);
        $count = $quizz->countId();
        $idQuizz = $quizz->getId($count);
        print_r($idQuizz);exit;
        header('location:../membres/creerQuestion.php?idQuizz=<?=$idQuizz;?>&idQuestion=1');
    }catch(Exception $e){
        ?>
        <div class="alert alert-danger">Il y a eu un problème lors de l'enregistrement du quizz<br>
        <?php echo $e->getMessage()?>
        </div>
        <?php
    }
}
if(isset($_GET['idQuestion']) && !empty($_GET['idQuestion'])){
    if($_GET['idQuestion'] > 10){
        ?>
        <div class="alert alert-primary">
            Le Quizz a bien été enregistré, retour à la page d'accueil.
        </div>
        <?php
        header('refresh:4;../membres/index.php');
    }
}