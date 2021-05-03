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

if(!empty($_POST) && $_SESSION['idQuestion'] < 10){
    $reponse->repondre($idUser, $_SESSION['idQuestion'], $value);
    $_SESSION['idQuestion'] = $_SESSION['idQuestion'] + 1;

    header('location:../membres/quizz.php?idQuizz='.$idQuizz);
}else{
    header('location:../membres/index.php');
}

