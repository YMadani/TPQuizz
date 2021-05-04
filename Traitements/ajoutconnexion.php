<?php
require_once '../modeles/modeles.php';
    if(isset($_POST["pseudo"])&&!empty($_POST['pseudo'])&&isset($_POST["mdp"])&&!empty($_POST['mdp']))
    {
        $pseudo = $_POST["pseudo"];
        $mdp = $_POST['mdp'];

        $User = new Utilisateur();
        $VUser = $User->connexion($pseudo,$mdp);
        $erreurs  =  $User->getErreur();
        if(empty($erreurs))
            {
                $connexion = $User->getConnexion();
                $_SESSION["idUser"] = $connexion["idUser"];
                $_SESSION["Pseudo"] = $connexion["Pseudo"];
                $_SESSION["Email"] = $connexion["Email"];
                $_SESSION["idQSecrete"] = $connexion['idQSecrete'];
                $_SESSION["idRole"] = $connexion["idRole"];
                $_SESSION["Reponse"] = $connexion["Reponse"];
                header('location:../membres/connexion.php?success=1');
            }
        else
            {
                header('location:../membres/connexion.php?success=0&erreurs='.$erreurs);
            }
        
    }else{
        header('location:../membres/connexion.php?success=0');
    }

?>
