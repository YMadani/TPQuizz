<?php

class Question extends modeles

{
    private $question;
    private $idQuestion;
    private $reponses=[];
    
public function __construct($idQuestion = null)
    {
        $requete = $this->getBdd()->prepare("SELECT * FROM questions WHERE idQuestion = ?");
        $requete->execute([$idQuestion]);
        $LaQuestion = $requete->fetch(PDO::FETCH_ASSOC);


        $requete = $this->getBdd()->prepare("SELECT * FROM reponses WHERE idQuestion = ?");
        $requete->execute([$idQuestion]);
        $reponses = $requete->fetchAll(PDO::FETCH_ASSOC);

        $this->idQuestion = $idQuestion;
        $this->question = $LaQuestion["nomQuestion"];

        foreach($reponses as $reponse){
            $objetReponse = new Reponse($reponse["idReponse"]);
            $this->reponses[] = $objetReponse;
        }
    }
    public function initialiserQuestion($idQuestion, $question){
        $this->idQuestion = $idQuestion;
        $this->question = $question;

        
        $requete = $this->getBdd()->prepare("SELECT idReponse, nomReponse, vrai FROM reponses WHERE idQuestion = ?");
        $requete->execute([$idQuestion]);
        $reponsesQuizz = $requete->fetchAll(PDO::FETCH_ASSOC);

        foreach($reponsesQuizz as $reponseQuizz){
            $objetReponse = new Reponse();
            $objetReponse ->initialiserReponse($reponseQuizz["idReponse"],$reponseQuizz["nomReponse"],$reponseQuizz["vrai"]);
            $this->reponses[] = $objetReponse;
        }
    }

    public function getQuestion()
        {
            return $this->question;
        }
    public function getidQuestion()
        {
            return $this->idQuestion;
        }
    public function setQuestion($newQ)
        {
            $this->question = $newQ;
        }
    public function getReponses()
        {
            return $this->reponses;
        }
    public function setidQuestion($idQuestion)
        {
            $this->idQuestion = $idQuestion;
        }
    public function addReponseVrai($reponse, $statut, $i)
        {
            $requete= $this->getBdd()->prepare("INSERT INTO reponses (nomReponse, Vrai, idQuestion) VALUES (?,?,?)");
            $requete->execute([$reponse, $statut, $i]);

            $this->reponses = $reponse;
        }
    public function addReponse($reponse, $i)
        {
            $requete= $this->getBdd()->prepare("INSERT INTO reponses (nomReponse, idQuestion) VALUES (?,?)");
            $requete->execute([$reponse, $i]);

            $this->reponses = $reponse;
        }
    public function removeReponse($idReponse)
        {
            $requete=$this->getBdd()->prepare("DELETE FROM reponses WHERE idReponse = ? ");
            $requete->execute([$idReponse]);
        }
}