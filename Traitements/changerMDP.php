<?php
require_once '../modeles/modeles.php';

if( isset($_POST["mdp"]) && !empty(['mdp'])
    &&isset($_POST["vmdp"]) && !empty(['vmdp'])
    &&isset($_POST['RSecrete']) && !empty(['RSecrete']))
    {
        $mdp = $_POST["mdp"];
        $vmdp = $_POST["vmdp"];
        $Rsecrete = $_POST['RSecrete'];
        
        $U = new Utilisateur($_SESSION['id']);
        $email = $U->getEmail();
        $RepSecrete = $U->getRSecrete();
        $pass = $U->getPassword();
        $idUser = $U->getidUtilisateur();
        if($Rsecrete == $RepSecrete)
            {   
                if($mdp == $vmdp)
                {   
                    $mdp = password_hash($mdp, PASSWORD_BCRYPT);
                    $U->changerMDP($mdp,$idUser);
                    session_destroy();
                    header('location:../membres/connexion.php?success=3');
                    
                    

                }else{
                        //les mots de passe sont diff
                        header('location:../membres/changepass.php?success=0');
                }

            }else{
                //pas la bonne réponse
                header('location:../membres/changepass.php?success=1');
                
            }
      
    }else{
        //renseignez tt les champs
        header('location:../membres/changepass.php?success=4');   
    }
?>