<?php
class Quizz extends modeles
    {
        private $idQuizz;
        private $titre;
        private $categorie;
        private $idQuestion;

        public function __construct($idQuizz = null)
        {

            if($idQuizz !== null){

                $requete = $this->getBdd()->prepare("SELECT nomQuizz, idCat FROM quizz WHERE idQuizz = ?");
                $requete->execute([$idQuizz]);
                $quizz = $requete->fetch(PDO::FETCH_ASSOC);

                $requete = $this->getBdd()->prepare("SELECT * FROM questions WHERE idQuizz = ?");
                $requete->execute([$idQuizz]);
                $questions = $requete->fetchAll(PDO::FETCH_ASSOC);

                $this->idQuizz = $idQuizz;
                $this->titre  = $quizz["nomQuizz"];
                $this->categorie = new Categorie($quizz["idCat"]);

                foreach( $questions as $question ){

                    $objetQuestion = new Question;
                    $objetQuestion->initialiserQuestion($question["idQuestion"],$question["nomQuestion"]);
                    $this->questions[] = $objetQuestion;
                }
            }
        }
        public function getId(){
            return $this->idQuizz;
        }
        public function getQuizz(){
            return $this->titre;
        }
        public function getCategorie(){
            return $this->categorie;
        }
        public function getQuestions(){
            return $this->questions;
        }
        public function setId($idQuizz){
            $this->idQuizz = $idQuizz;
        }
        public function setTitre($titre){
            $this->titre = $titre;
        }
        public function setCategorie($Categorie){
            $this->categorie = $Categorie;
        }
        public function addQuestion($question,$idQuizz){
            $requete=$this->getBdd()->prepare("INSERT INTO questions (nomQuestion, idQuizz) VALUES (?,?)");
            $requete->execute([$question, $idQuizz]);

            $this->questions = $question;
        }
        public function removeQuestion($idQuestion){
            $requete=$this->getBdd()->prepare("DELETE FROM questions WHERE idQuestion = ? ");
            $requete->execute([$idQuestion]);
        }
        public function insertQuizz($nomQuizz, $idCat, $idUser){
            $requete=$this->getBdd()->prepare("INSERT INTO quizz (nomQuizz, idUser, idCat) VALUES (?,?,?)");
            $requete->execute([$nomQuizz, $idCat, $idUser]);
        }
        public function countId()
        {
            $requete=$this->getBdd()->prepare("SELECT count(idQuizz) FROM quizz");
            $requete->execute();
        }
    }