<?php
require_once '../modeles/modeles.php';
    if( isset($_POST["pseudo"])&&!empty($_POST["pseudo"])
        &&isset($_POST["email"])&&!empty($_POST["email"])
        &&isset($_POST["mdp"])&&!empty($_POST["mdp"])
        &&isset($_POST["QSecrete"])&&!empty($_POST["QSecrete"])
        &&isset($_POST["RSecrete"])&&!empty($_POST["RSecrete"]))
    {
        $Utilisateur = new Utilisateur();
        $VerifEmail= $Utilisateur->getVerifUtilisateur();
        $erreurs = [];

        if($VerifEmail->rowCount()>0)
        {
            $erreurs= "L'adresse mail saisie existe déjà";
            }elseif(count($erreurs) == 0)
                {
                    $pseudo =$_POST["pseudo"];
                    $email = $_POST["email"];
                    $mdp = $_POST["mdp"];
                    $QSecrete = $_POST["QSecrete"];
                    $RSecrete =$_POST["RSecrete"];

                    $mdp = password_hash($mdp, PASSWORD_BCRYPT);
                    $Utilisateur->inscription($pseudo,$mdp,$email,$QSecrete,$RSecrete);
                    header("location:../membres/inscription.php?success=1&nom=".$pseudo);
                }
    }else{
                
        $erreurs = "au moins un champ n'a pas été saisi";
        header("location:../membres/inscription.php?success=0&erreurs=".$erreurs);
      
      }

?>