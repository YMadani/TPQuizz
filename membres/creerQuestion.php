<?php require_once 'entete.php';

$idQuizz = $_GET['idQuizz'];

if(isset($idQuizz) && !empty($idQuizz) && $_GET['idQuestion']==1){
    ?>
    <h1 class="text-center"> Modification de la 1ère question du Quizz n°<?=$idQuizz;?></h1>
    <div class="container text-center">
    <form method="POST" class="form-group" action="../Traitements/creationQuestion&Reps.php?idQuestion=1">
    <div style="color: white; font-size: 35px;">
    <label for="nomQuestion"> Nom de la question :</label>
    </div>
    <input class="form-control" type="text" name="nomQuestion" placeholder="Entrez votre question ici" required>
    <div style="color: white; font-size: 25px; margin-top:2%">
    <label for="reponse1">Réponse 1 (Ce sera la bonne réponse):</label>
    </div>
    <input class="form-control" style="margin-top: 2%;" type="text" id="reponse1" name="reponse1" placeholder="Entrez la 1ère réponse" required>
    <div style="color: white; font-size: 25px;">
    <label for="reponse2">Réponse 2 :</label>
    </div>
    <input class="form-control my-2" type="text" id="reponse2" name="reponse2" placeholder="Entrez la 2ème réponse" required>
    <div style="color: white; font-size: 25px;">
    <label for="reponse3">Réponse 3 :</label>
    </div>
    <input class="form-control my-2" type="text" id="reponse3" name="reponse3" placeholder="Entrez la 3ème réponse" required>
    <div style="color: white; font-size: 25px;">
    <label for="reponse4">Réponse 4 :</label>
    </div>
    <input class="form-control my-2" type="text" id="reponse4" name="reponse4" placeholder="Entrez la 4ème réponse" required>
    <button class="btn btn-success" name="idQuizz" value="<?=$idQuizz;?>" style="width: 15%;" type="submit">Valider</button>
    </form>
    </div>

    <?php
}
    if(isset($_GET['idQuestion']) && !empty($_GET['idQuestion']) && $_GET['idQuestion']!=1){
    ?>
    <h1 class="text-center"> Modification de la question <?=$_GET['idQuestion'];?> du Quizz n°<?=$idQuizz;?></h1>
    <div class="container text-center">
    <form method="POST" class="form-group" action="../Traitements/creationQuestion&Reps.php?idQuestion=<?=$_GET['idQuestion'];?>">
    <div style="color: white; font-size: 35px;">
    <label for="nomQuestion"> Nom de la question :</label>
    </div>
    <input class="form-control" type="text" name="nomQuestion" placeholder="Entrez votre question ici" required>
    <div style="color: white; font-size: 25px; margin-top:2%">
    <label for="reponse1">Réponse 1 (Ce sera la bonne réponse):</label>
    </div>
    <input class="form-control" style="margin-top: 2%;" type="text" id="reponse1" name="reponse1" placeholder="Entrez la 1ère réponse" required>
    <div style="color: white; font-size: 25px;">
    <label for="reponse2">Réponse 2 :</label>
    </div>
    <input class="form-control my-2" type="text" id="reponse2" name="reponse2" placeholder="Entrez la 2ème réponse" required>
    <div style="color: white; font-size: 25px;">
    <label for="reponse3">Réponse 3 :</label>
    </div>
    <input class="form-control my-2" type="text" id="reponse3" name="reponse3" placeholder="Entrez la 3ème réponse" required>
    <div style="color: white; font-size: 25px;">
    <label for="reponse4">Réponse 4 :</label>
    </div>
    <input class="form-control my-2" type="text" id="reponse4" name="reponse4" placeholder="Entrez la 4ème réponse" required>
    <button class="btn btn-success" name="idQuizz" value="<?=$idQuizz;?>" style="width: 15%;" type="submit">Valider</button>
    </form>
    </div>
  
    <?php
}
<<<<<<< HEAD
require_once 'footer.php';
?>
=======
 require_once 'footer.php'?>
>>>>>>> f76ad6a44e46ef85dc3a2471b6142cb349f3751a
