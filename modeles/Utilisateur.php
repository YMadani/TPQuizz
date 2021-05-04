<?php
class Utilisateur extends modeles
{
//Propriétés
    private $email;
    private $username;
    private $mdp;
    private $idUtilisateur;
    private $idRole;
    private $connecte;
    private $Rsecrete;
    private $idQsecrete;
    private $QSecrete;
    private $erreur;
    private $VerifU;
    private $recupidUser;
//Method UML comment schématiser des class
    public function __construct($idUtilisateur = null)
    {
        if($idUtilisateur != null)

        {
            $sql = $this->getBdd()->prepare("SELECT * FROM utilisateurs WHERE idUser = ?");
            $sql->execute([$idUtilisateur]);
            $User = $sql->fetch(PDO::FETCH_ASSOC);

            $this->username=$User["Pseudo"];
            $this->mdp=$User["Mdp"];
            $this->email=$User["Email"];
            $this->idUtilisateur=$User["idUser"];
            $this->idRole=$User["idRole"];
            $this->Rsecrete=$User["Reponse"];
            $this->idQsecrete=$User["idQSecrete"];

            $this->QSecrete = new QSecrete($User["idQSecrete"]);            

        }else{
            $requete = $this->getBdd()->prepare("SELECT email FROM utilisateurs WHERE email = ?");
            $requete->execute([$_POST["email"]]);
            $VerifU =  $requete;

            $this->VerifU = $VerifU;
        }
    }

    public function connexion($username,$password)
    {
        $sql = $this->getBdd()->prepare("SELECT * FROM utilisateurs where  Pseudo = ? ");
        $sql->execute([$username]);
        if($sql->rowcount()>0  )
        {
            $connexion = $sql->fetch(PDO::FETCH_ASSOC);
           if(password_verify($password,$connexion["Mdp"])){
                
            $this->connecte = $connexion;
                
           }else{
                $erreur = " le mot de passe est incorrect";
           }
        }else 
        { 
           $erreur = "l'indentifiant est incorrect"  ;
        }
       
        $this->erreur =$erreur; 
        

    }
    public function inscription($username,$password,$email,$idQsecrete,$Rsecrete)
    {
        $sql = $this->getBdd()->prepare("INSERT INTO utilisateurs(Pseudo,Mdp,Email,idQSecrete,Reponse) VALUES(?,?,?,?,?)");
        $sql->execute([$username,$password,$email,$idQsecrete,$Rsecrete]);
        
    }

    public function ajoutAmi($pseudo)
    {
        $requete = $this->getBdd()->prepare("INSERT INTO amis (idUser, idAmi) VALUES (?,(SELECT idUser FROM utilisateurs WHERE Pseudo LIKE ? ORDER BY idUser))");
        $requete->execute([$this->getidUtilisateur(),$pseudo]);
    }
    public function afficherAmi($idUser){
        $requete = $this->getBdd()->prepare('SELECT * FROM utilisateurs INNER JOIN amis ON amis.idAmi = utilisateurs.idUser WHERE amis.idUser = ? ');
        $requete->execute([$idUser]);
        return $requete->fetchAll(PDO::FETCH_ASSOC);
    }

    public function recupUtilisateur($pseudo)
    {
        $sql = $this->getBdd()->prepare("SELECT idUser FROM utilisateurs WHERE Pseudo =? ");
        $sql->execute([$pseudo]);
        $idUtilisateur = $sql->fetch(PDO::FETCH_ASSOC);

        $this->recupidUser = $idUtilisateur['idUser'] ;
    }

    public function changerMDP($mdp,$idUser)
    {
        $sql = $this->getBdd()->prepare("UPDATE utilisateurs SET Mdp = ?  WHERE idUser = ? ");
        $sql->execute([$mdp,$idUser]);
    }
    public function userEmail($email)
    {
        $requete = $this->getBdd()->prepare("SELECT * FROM utilisateurs WHERE Email = ?");
        $requete->execute([$email]);
        $VerifU =  $requete->fetch(PDO::FETCH_ASSOC);

            $this->username=$VerifU["Pseudo"];
            $this->mdp=$VerifU["Mdp"];
            $this->email=$VerifU["Email"];
            $this->idUtilisateur=$VerifU["idUser"];
            $this->idRole=$VerifU["idRole"];
            $this->Rsecrete=$VerifU["Reponse"];
            $this->idQsecrete=$VerifU["idQSecrete"]; 
    }

    public function getConnexion()
        {
            return $this->connecte;
        }
    public function getidUtilisateur()
        {
            return $this->idUtilisateur;
        }
    public function getRole()
        {
            return $this->idRole;
        }
    public function getEmail()
        {
            return $this->email;
        }
    public function getPassword()
        {
            return $this->mdp;
        }
    public function getUsername()
        {
            return $this->username;
        }
    public function getErreur()
        {
            return $this->erreur;
        }
    public function getVerifUtilisateur()
        {
            return $this->VerifU;  
        }
    public function getrecupidUser()
        {
            return $this->recupidUser;  
        }
    public function getQSecrete()
        {
            return $this->QSecrete;  
        }
    public function getRSecrete()
        {
            return  $this->Rsecrete;  
        }
    public function getidQsecrete()
        {
            return  $this->idQsecrete;  
        }
       
}

