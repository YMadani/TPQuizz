<?php require_once '../modeles/modeles.php';

$Quizz = new Quizz();


if(isset($_GET['idQuizz']) && !empty($_GET['idQuizz'])){
    $idQuizz = $_GET['idQuizz'];
    header('location:../membres/verifQuizz.php?success=1&idQuizz='.$idQuizz);
    try{
        $Quizz->quizzApprouve($idQuizz);
    }catch(Exception $e){
        header('location:../membres/verifQuizz.php?success=0');
    }
}