<?php require_once '../membres/entete.php';

extract($_POST);
$quizz = new Quizz();
$reponses = new Question();
$i=$_GET['idQuestion'];

if(isset($nomQuestion) && !empty($nomQuestion) &&
isset($reponse1) && !empty($reponse1) &&
isset($reponse2) && !empty($reponse2) &&
isset($reponse3) && !empty($reponse3) &&
isset($reponse4) && !empty($reponse4) &&
isset($vrai) && !empty($vrai) &&
isset($idQuizz) && !empty($idQuizz)){
    try{
        if($i<=$quizz->countId())
        $quizz->addQuestion($nomQuestion);
        $reponses->addReponse($reponse1);
        $reponses->addReponse($reponse2);
        $reponses->addReponse($reponse3);
        $reponses->addReponse($reponse4);
        $i++;
        header('location:creerQuestion.php?idQuestion=.$i');
    }catch (Exception $e){
        ?>
        <div class="alert alert-danger">Il y a eu un problème lors de l'enregistrement des questions<br>
        <?php echo $e->getMessage()?>
        </div>
        <?php   
    }
}