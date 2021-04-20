<?php
class Reponse extends modeles
{

    private $idReponse ;
    private $reponse;
    private $statut;

    public function __construct($idR = null)
    {
      if($idR!=null){

          $requete = $this->getBdd()->prepare("SELECT * FROM reponses WHERE idReponse = ?");
          $requete->execute([$idR]);
          $LaReponse = $requete->fetch(PDO::FETCH_ASSOC);

          $this->reponse = $LaReponse["nomReponse"];
          $this->idReponse = $idR;
          $this->statut = $LaReponse["Vrai"];
      }  
    } 
    public function initialiserReponse($idReponse, $reponse, $vrai){
      $this->idReponse = $idReponse;
      $this->reponse = $reponse;
      $this->statut = $vrai;
  }

  public function getidReponse()
  {
      return $this->idReponse;
  }
  public function getReponse()
  {
      return $this->reponse;
  }
  public function getStatutR()
  {
      return $this->statut;
  }
  public function setReponse($newReponse)
  {
      $this->reponse = $newReponse;
  }
  public function setidReponse($idReponse)
  {
      $this->idReponse = $idReponse;
  }
  public function setStatutR($statut)
  {
      $this->statut = $statut;
  }
}