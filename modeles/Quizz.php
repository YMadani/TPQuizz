<?php
class Quizz extends modeles
    {
        private $idQuizz;
        private $titre;
        private $categorie;
        private $questions = [];
        private $idQuestion;

        public function __construct($idQuizz = null)
        {

            if($idQuizz !== null){

                $requete = $this->getBdd()->prepare("SELECT titre, idCategorie FROM quizz WHERE idQuizz = ?");
                $requete->execute([$idQuizz]);
                $quizz = $requete->fetch(PDO::FETCH_ASSOC);

                $requete = $this->getBdd()->prepare("SELECT * FROM questions WHERE idQuizz = ?");
                $requete->execute([$idQuizz]);
                $questions = $requete->fetchAll(PDO::FETCH_ASSOC);

                $this->idQuizz = $idQuizz;
                $this->titre  = $quizz["titre"];
                $this->categorie = new Categorie($quizz["idCategorie"]);

                foreach( $questions as $question ){

                    $objetQuestion = new Question;
                    $objetQuestion->initialiserQuestion($question["idQuestion"],$question["question"]);
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
        public function addQuestion($question){
            $requete=$this->getBdd()->prepare("INSERT INTO questions (nomQuestion, idQuizz) VALUES (?,?)");
            $requete->execute();

            $this->questions = $question;
        }
        public function removeQuestion($idQuestion){
            $requete=$this->getBdd()->prepare("DELETE FROM questions WHERE idQuestion = ? ");
            $requete->execute([$idQuestion]);
        }
    }