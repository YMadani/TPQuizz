<?php
class Quizz extends modeles

{
private $Quizz;
private $QuizzStartCard;

private $idQuizz;
private $titre;
private $libelle;

private $categorie;
private $questions = [];

private $AllQuizz;
public function __construct($idQuizz = null)
{
    
    if($idQuizz !== null){
        $requete = $this->getBdd()->prepare("SELECT nomQuizz, idCat FROM quizz WHERE idQuizz =?");
        $requete->execute([$idQuizz]);
        $infos = $requete->fetch(PDO::FETCH_ASSOC);

        $requete = $this->getBdd()->prepare("SELECT * FROM questions WHERE idQuizz = ?");
        $requete->execute([$idQuizz]);
        $questions = $requete->fetchAll(PDO::FETCH_ASSOC);

        $this->idQuizz = $idQuizz;
        $this->titre = $infos["nomQuizz"];
        $this->categorie = new Categorie($infos["idCat"]);

        foreach ($questions as $question){
            $objetQuestion = new Question($question["idQuestion"]);
            $this->questions[] = $objetQuestion;
        }
    }else{
        $requete = $this->getBdd()->prepare("SELECT * FROM quizz");
        $requete->execute();
        $ttQuizz = $requete->fetchAll(PDO::FETCH_ASSOC);

        $this->AllQuizz = $ttQuizz;
        }
    }
    public function getQuizz()
    {
        return $this->titre;
    }
    public function getAllQuizz()
    {
        return $this->AllQuizz;
    }
    public function setQuizz($newQuizz)
    {
        $this->quizz = $newQuizz;
    }
}