<?php
class Utilisateur extends modeles
{
//Propriétés
    protected $username;
    protected $reponse;
    private $User;

//Method UML comment schématiser des class
    public function __construct()
    {
        $sql = $this->getBdd()->prepare("SELECT * FROM utilisateur");
        $sql->execute();
        $User = $sql;

        $this->User = $User;
        $this->username=$User["nom"];
    }

    public function connexion($username,$password)
    {
        $sql = $this->getBdd()->prepare("SELECT * FROM utilisateur");
        $sql->execute($username,$password);
        $connexion = $sql;

        $this->connexion = $connexion;

    }
    public function inscription($username,$password,$email,$idQsecrete,$Rsecrete)
    {

    }

    public function getUtilisateur()
    {
        return $this->User;
    }
}

