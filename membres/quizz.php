<?php 
require_once 'entete.php';

$idQuizz = $_GET['idQuizz'];

$quizz = new Quizz($idQuizz);
$nomQuizz = $quizz->getQuizz();
$questions = $quizz->getQuestions();
print_r($questions);

foreach($questions as $q){
    ?>
    reponse 1 : <?=$q['Reponse']['nomReponse'];?>
    <?php
}
?>


<?php 
require_once 'footer.php';
?>