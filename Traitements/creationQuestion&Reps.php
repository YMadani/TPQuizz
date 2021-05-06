<?php require_once '../membres/entete.php';

extract($_POST);
$quizz = new Quizz();
$reponses = new Question();
$i=$_GET['idQuestion'];
$idQuizz = $_POST['idQuizz'];
$vrai = 1;

if(isset($nomQuestion) && !empty($nomQuestion) &&
isset($reponse1) && !empty($reponse1) &&
isset($reponse2) && !empty($reponse2) &&
isset($reponse3) && !empty($reponse3) &&
isset($reponse4) && !empty($reponse4) &&
isset($idQuizz) && !empty($idQuizz)){
    try{
        if($i<10){
        $quizz->addQuestion($nomQuestion,$idQuizz);
        $reponses->addReponseVrai($reponse1, $vrai, $i);
        $reponses->addReponse($reponse2, $i);
        $reponses->addReponse($reponse3, $i);
        $reponses->addReponse($reponse4, $i);
        $i++;
        header("location:../membres/creerQuestion.php?idQuestion=".$i."&idQuizz=".$idQuizz);
        }else{
            header('location:creationQuizz.php?idQuestion='.$i);
        }
    }catch (Exception $e){
        ?>
        <div class="alert alert-danger">Il y a eu un problème lors de l'enregistrement des questions<br>
        <?php echo $e->getMessage()?>
        </div>
        <?php   
    }
}