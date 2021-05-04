<?php 
require_once 'entete.php';
$i = 0;
$a = 0;
$Quizz = new Quizz(1);
$titreQuizz = $Quizz->getQuizz();
$Questions = $Quizz->getQuestions();
$r = $Questions[$a]->getReponses();
$nomRep = $r[$i]->getReponse();


echo $nomRep;

?>

<button onclick="incrementeri">Augmente i</button>
<button onclick="incrementera">Augmente a</button>


<?php 
require_once 'footer.php';
?>