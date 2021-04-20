<?php require_once 'entete.php';

$idQuizz = $_GET['idQuizz'];

if(isset($idQuizz) && !empty($idQuizz)){
    ?>
    <h1 class="text-center"> Modification de la 1ère question du Quizz n°<?=$idQuizz;?></h1>
    <div class="container text-center">
    <form method="POST" class="form-group" action="../Traitements/creationQuestion&Reps.php">
    <input class="form-control" type="text" name="nomQuestion" placeholder="Entrez votre question ici" required>
    <input class="form-control" style="margin-top: 2%;" type="text" name="reponse1" placeholder="Entrez la 1ère réponse" required>
    <input class="form-control my-2" type="text" name="reponse2" placeholder="Entrez la 2ème réponse" required>
    <input class="form-control my-2" type="text" name="reponse3" placeholder="Entrez la 3ème réponse" required>
    <input class="form-control my-2" type="text" name="reponse4" placeholder="Entrez la 4ème réponse" required>
    <h1>Quelle réponse est la vraie ?</h1>
    <div class="custom-control custom-radio">
  <input type="radio" id="Choix1" value="1" name="vrai" class="custom-control-input">
  <label class="custom-control-label" for="Choix1">1</label>
</div>
<div class="custom-control custom-radio">
  <input type="radio" id="Choix2" value="2" name="vrai" class="custom-control-input">
  <label class="custom-control-label" for="Choix2">2</label>
</div><div class="custom-control custom-radio">
  <input type="radio" id="Choix3" value="3" name="vrai" class="custom-control-input">
  <label class="custom-control-label" for="Choix3">3</label>
</div>
<div class="custom-control custom-radio">
  <input type="radio" id="Choix4" value="4" name="vrai" class="custom-control-input">
  <label class="custom-control-label" for="Choix4">4</label>
</div>
    <button class="btn btn-success" name="idQuizz" value="<?=$idQuizz;?>" style="width: 15%;" type="submit">Valider</button>
    </form>
    </div>
  
    <?php
}
require_once 'footer.php';
?>
