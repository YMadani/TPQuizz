<?php require_once '../modeles/modeles.php';
$Utilisateur = new Utilisateur($_SESSION['idUser']);

$pseudo = $_POST['pseudo'];

if(isset($pseudo) && !empty($pseudo)){
    try{
        $Utilisateur->ajoutAmi($pseudo);
        header("location:../membres/amis.php?success=1&pseudo=".$pseudo);
    }catch(Exception $e){
        header('location:../membres/amis.php?success=0');
    }
}