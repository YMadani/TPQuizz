<?php require_once '../membres/entete.php';

$reponse=new Reponse();

$idQuizz = $_GET['idQuizz'];


if (isset($_SESSION['idUser']) && !empty($_SESSION['idUser'])){
    $idUser = $_SESSION['idUser'];
}else{
    $idUser = null;
}

foreach($_POST as $key=>$value){
    echo $value;
}

if(!empty($_POST) && $_SESSION['idQuestion']['id'] < 10){
    $reponse->repondre($idUser, $_SESSION['idQuestion']['id'], $value);
    $_SESSION['idQuestion']['id'] = $_SESSION['idQuestion']['id'] + 1;
    
    header('location:../membres/quizz.php?idQuizz='.$idQuizz);
}else{
    $reponse->repondre($idUser, $_SESSION['idQuestion']['id'], $value);
    header('location:../membres/finquizz.php?idQuizz='.$idQuizz);
}

