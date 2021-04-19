<?php
require_once '../membres/entete.php';
extract($_POST);
$quizz = new Quizz();
$idUser = $_SESSION['idUser'];

if(isset($nomQuizz) && !empty($nomQuizz) && isset($idUser) && !empty($idUser)){
    try{
        $quizz->insertQuizz($nomQuizz, $idCat, $idUser);
        $count = $quizz->countId();
        $quizz->getId($count);
        header('location:../membres/creerQuestion.php?idQuizz=<?=$count;?>&?idQuestion=1');
    }catch(Exception $e){
        ?>
        <div class="alert alert-danger">Il y a eu un problème lors de l'enregistrement du quizz<br>
        <?php echo $e->getMessage()?>
        </div>
        <?php
    }
}