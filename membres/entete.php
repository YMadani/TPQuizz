<?php
require_once '../modeles/modeles.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link rel="stylesheet" href="css/all.min.css">
    <link rel="stylesheet" href="style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    
    <title>Document</title>
</head>
<body class="gradiant">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
    <?php
    if(!empty($_SESSION['idUser'])){
      ?>
        <div onclick="asideactive();">
          <span class="fas fa-2x fa-bars"></span>
        </div>
      <?php
      }
      ?>
        <a class="navbar-brand"  > 
            <img src="images/quizz.png"  width="40" height="34" class="d-inline-block align-text-top">
        Quizz Mania !</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav">
        <a class="nav-link active" aria-current="page" href="index.php">Accueil</a>
      </div>
      <div class="navbar-nav" style="margin-left: 80%;">
        <?php 
        if(isset($_SESSION['idUser']) && !empty($_SESSION['idUser'])){
          ?>
          <form method="POST" action="../Traitements/Deconnexion.php?pseudo=<?=$_SESSION['Pseudo']?>">
          <button type="submit" name="deco" class="btn btn-primary" style="margin-left: 80%;" value="1">Déconnexion</button>
          </form>
        <?php 
        }else{
          ?>
          <a class="btn btn-success" href="connexion.php">Connexion</a><br>
         <a class="btn btn-primary mx-1" href="inscription.php">Inscription</a>
         <?php
        }
        ?>
    </div>
  </div>
</nav>
 <?php 
        if(isset($_SESSION['idUser']) && !empty($_SESSION['idUser'])){
          ?>
<aside class="lemenu">
  
    <li>  
      <span class="fas fa-user-circle couleur"></span>
      <a href="Profil.php"class="effect-1">
        Profil
      </a> 
    </li>
 
  
    <li>
      <span class="fas fa-user-friends couleur"></span>
      <a href="amis.php"class="effect-1">
      Amis
   </a> </li>
  
 <li>
    <span class="fas fa-list couleur"></span>
     <a href="creerQuizz.php" class="effect-1">
     Créer un Quizz
     </a>
  </li>
  
  <li > 
    <span class="fas fa-scroll couleur"></span>
    <a href="historiqueQuizz.php"class="effect-1">
      
      Historique de Quizz
    
    </a>
</li>
</aside>
<?php
        }
        ?>