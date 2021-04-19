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
        <a class="navbar-brand" href="#"> 
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
        <a class="btn btn-success" href="connexion.php">Connexion</a><br>
        <a class="btn btn-primary mx-1" href="inscription.php">Inscription</a>
        <?php 
        if(isset($_SESSION['pseudo']) && !empty($_SESSION['pseudo'])){
          $pseudo=$_SESSION['pseudo'];
            ?>
            <a href="profile.php?pseudo=<?=$pseudo;?>">Votre profil</a>
            <?php
        }
?>
    </div>
  </div>
</nav>
