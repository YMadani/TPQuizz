<?php require_once 'entete.php';
$categorie = new Categorie();
$cat=$categorie->gettoutCategorie();

?>
<div class="container">
<form class="form-group" method="POST" action="../Traitements/creationQuizz.php">
    <h1 class="text-center">Quel est le nom du quizz ?</h1>
    <input class="form-control text-center" style="margin-top: 7%;margin-left: 25%;width:50%" type="text" name="nomQuizz" placeholder="Entrez le nom du quizz" required>
    <h1 class="text-center my-5">A quelle catégorie appartient-t-il ?</h1>
    <select class="form-control w-50" style="margin-left:25%" name="idCat" id="idCat" required>
    <?php
    foreach($cat as $c){
        ?>
        <option value="<?=$c['idCat'];?>"><?=$c['libelle'];?></option>
    </select>
    <?php
    }
    ?>
    <button class="btn btn-success my-2" style="margin-left: 45%;" type="submit">Suivant</button>
</form>
</div>