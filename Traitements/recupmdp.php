<?php
require_once '../modeles/modeles.php';

if( isset($_POST["Pseudo"]) && !empty($_POST['Pseudo'])&&
isset($_POST["email"]) && !empty($_POST['email']))
    {
        $pseudo =$_POST["Pseudo"];
        $User = new Utilisateur();
        $User->recupUtilisateur($pseudo);
        $idUser = $User->getrecupidUser();
        $User2 = new Utilisateur($idUser);
        $QSecrete = $User2->getQSecrete();
        $idQSecrete = $User2->getidQsecrete();
        $libelle = $QSecrete->getLibelle();
        $_SESSION["id"] = $idUser;
            if(!empty($idQSecrete))
            { 
                // retourner la question secrète
                header('location:../membres/changepass.php?Qsecrete='.$idQSecrete);
            }else{
                // Pseudo ou Email incorrect 
                header('location:../membres/connexion.php?success=5');
            }
    }else
    {
        //renseignez tout les champs
        header('location:../membres/connexion.php?success=4');
    }
   