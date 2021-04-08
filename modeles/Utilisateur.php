<?php
class Utilisateur
{
//Propriétés
    protected $username;
    protected $password;
    protected $reponse;

//Method
    public function getUsername(){
        return $this->username;
    }


    public function setUsername($newUsername){
        $this->username = $newUsername;
    }


    public function setPassword($newPassword){
        $this->password = $newPassword;
        }
    
    public function setReponse($newReponse){
        $this->reponse = $newReponse;
        }

    public function getUtilisateur(){
        $sql = getBdd()->prepare("SELECT * FROM utilisateur");
        $sql->execute();
        return $sql;
    }
}

