<?php require_once 'entete.php';

if(isset($_SESSION['idRole']) && !empty($_SESSION['idRole'])){
    if($_SESSION['idRole'] == 2){
        ?>
        <div class="container text-center">
        <h1>Bienvenue dans le panel administrateur <?=$_SESSION['Pseudo'];?></h1>
        <h3 style="color: white; margin-top:10%"> Voici les quizz à approuver</h3>
        </div>
        <?php

    }
}