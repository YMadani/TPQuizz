<?php require_once '../membres/entete.php';

extract($_POST);
$quizz = new Quizz();
$reponses = new Question();
$_SESSION['compteur'];
$idQuizz = $_POST['idQuizz'];
$vrai = 1;

if(isset($nomQuestion) && !empty($nomQuestion) &&
isset($reponse1) && !empty($reponse1) &&
isset($reponse2) && !empty($reponse2) &&
isset($reponse3) && !empty($reponse3) &&
isset($reponse4) && !empty($reponse4) &&
isset($idQuizz) && !empty($idQuizz)){
    try{
        if($_SESSION['compteur']<$_SESSION['idPQuestion']['id']+9){
        $quizz->addQuestion($nomQuestion,$idQuizz);
        $reponses->addReponseVrai($reponse1, $vrai, $_SESSION['compteur']);
        $reponses->addReponse($reponse2, $_SESSION['compteur']);
        $reponses->addReponse($reponse3, $_SESSION['compteur']);
        $reponses->addReponse($reponse4, $_SESSION['compteur']);
        $_SESSION['compteur']+=1;
        header("location:../membres/creerQuestion.php?idQuizz=".$idQuizz);
        }else{
            header('location:creationQuizz.php?idQuestion='.$_SESSION['compteur']);
        }
    }catch (Exception $e){
        ?>
        <div class="alert alert-danger">Il y a eu un problème lors de l'enregistrement des questions<br>
        <?php echo $e->getMessage()?>
        </div>
        <?php   
    }
}