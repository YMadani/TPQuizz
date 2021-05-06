<?php
require_once '../membres/entete.php';
extract($_POST);
$quizz = new Quizz();
$idUser = $_SESSION['idUser'];

if(isset($nomQuizz) && !empty($nomQuizz) && isset($idUser) && !empty($idUser)){
    try{
        $quizz->insertQuizz($nomQuizz, $idCat, $idUser);
        $count = $quizz->countId();
        $_SESSION['idPQuestion'] = $quizz->maxidQuestion($count);
        $_SESSION['compteur']= $_SESSION['idPQuestion']['id']+1;
        header('location:../membres/creerQuestion.php?idQuestion=1&idQuizz='.$count);
    }catch(Exception $e){
        ?>
        <div class="alert alert-danger">Il y a eu un problème lors de l'enregistrement du quizz<br>
        <?php echo $e->getMessage()?>
        </div>
        <?php
    }
}
if(isset($_GET['idQuestion']) && !empty($_GET['idQuestion'])){
    if($_GET['compteur'] == $_SESSION['idPQuestion']+9){
        ?>
        <div class="alert alert-primary">
            Le Quizz a bien été enregistré, retour à la page d'accueil.
        </div>
        <?php
        header('refresh:4;../membres/index.php');
    }
}