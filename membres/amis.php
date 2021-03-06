<?php require_once 'entete.php';

$idUser = $_SESSION['idUser'];

$quizz = new Quizz();

$quizzfaitami = $quizz->quizzAmi($idUser);

$user = new Utilisateur($idUser);

$amis= $user->afficherAmi($idUser);

?>
<h1 class="text-center my-2">Liste d'amis</h1>
<?php
foreach($amis as $ami){
?>
<div class="container my-5">
<div class="card w-50">
  <div class="card-body">
    <h5 class="card-title"><?=$ami['Pseudo'];?></h5>
    <p class="card-text">Quizz fait(s): <?=count($quizzfaitami);?></p>
    <?php
    if(count($quizzfaitami)>0){
        ?>
    <a href="#" class="btn btn-primary">Voir ses quizz</a>
    <?php
    }
    ?>
  </div>
</div>
</div>
<?php
}

if(isset($_GET["success"]) && $_GET['success'] == 1){
    ?>
    <div class="alert alert-success">Votre ami <?=$_GET['pseudo'];?> a bien été ajouté dans votre liste d'amis<br>
    <a href="index.php">Retourner à l'accueil</a></div>
    <?php
    header('refresh:5;index.php');
}else if(isset($_GET["success"]) && $_GET['success'] == 0){
    ?>
    <div class="alert alert-danger">La personne que vous essayez n'est pas inscrite sur le site<br>
    <a href="index.php">Retourner à l'accueil</a></div>
    <?php
    header('refresh:5;index.php');
}

?>
<div class="container">
    <form method="POST" class="form-group" style="margin-left: 20%; margin-top:20%"  action="../Traitements/ajoutAmi.php">
    <label for="pseudo">ajouter en ami :</label>
    <input type="text" style="width: 50%;" name="pseudo" id="pseudo" placeholder="Entrez le pseudonyme de la personne à ajouter en ami">
    <button class="btn btn-success" type="submit">Ajouter en ami</button>
    </form>
</div>

<?php
require_once 'footer.php'?>