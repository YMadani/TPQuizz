<?php 
require_once 'entete.php';

$idQuizz = $_GET['idQuizz'];

$idQuestion = $_SESSION['idQuestion'];

$quizz = new Quizz($idQuizz);

$question = new Question($idQuestion);

$nomQuizz = $quizz->getQuizz();

$nomQuestion = $question->getQuestion()

?>

<h1 style="text-align:center; font-size:115px"><?=$nomQuizz;?></h1>
<h2 style="color: white;" class="text-center"><?=$nomQuestion;?></h2>
<div style="margin-top: 2%;" class="container text-center">
<form method="POST" class="form-group" action="../Traitements/repondre.php?idQuizz=<?=$idQuizz;?>">
<?php

    foreach($question->getReponses() as $reponse){
        ?>
        <div class="container">
        <button style="width: 40%;" class="btn btn-primary my-3" type="submit" name="<?=$reponse->getidReponse();?>" value="<?=$reponse->getidReponse();?>"><?=$reponse->getReponse();?></button>
        </div>
        <?php
    }
    ?>
    </div>
    </form>
<?php 
require_once 'footer.php';
?>