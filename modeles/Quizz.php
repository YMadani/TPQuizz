<?php
class Quizz extends modeles
    {
        private $idQuizz;
        private $titre;
        private $categorie;
        private $questions = [];
        private $idQuestion;
        private $AllQuizz;
        private $lastId;
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
            }else{
            $requete = $this->getBdd()->prepare("SELECT * FROM quizz");
            $requete->execute();
            $ttQuizz = $requete->fetchAll(PDO::FETCH_ASSOC);
    
            $this->AllQuizz = $ttQuizz;
            }
        }
        public function getlastId()
        {
            return $this->lastId;
        }
        public function getId()
            {
                return $this->idQuizz;
            }
        public function getQuizz()
            {
                return $this->titre;
            }
        public function getCategorie()
            {
                return $this->categorie;
            }
        public function getQuestions()
            {
                return $this->questions;
            }
        public function setId($idQuizz)
            {
                $this->idQuizz = $idQuizz;
            }
        public function setTitre($titre)
            {
                $this->titre = $titre;
            }
        public function setCategorie($Categorie)
            {
                $this->categorie = $Categorie;
            }
        public function addQuestion($question,$idQuizz)
            {
                $requete=$this->getBdd()->prepare("INSERT INTO questions (nomQuestion, idQuizz) VALUES (?,?)");
                $requete->execute([$question, $idQuizz]);

                $this->questions = $question;
            }
        public function removeQuestion($idQuestion)
            {
                $requete=$this->getBdd()->prepare("DELETE FROM questions WHERE idQuestion = ? ");
                $requete->execute([$idQuestion]);
            }
        public function insertQuizz($nomQuizz, $idCat, $idUser)
            {
                $requete=$this->getBdd()->prepare("INSERT INTO quizz (nomQuizz, idUser, idCat) VALUES (?,?,?)");
                $requete->execute([$nomQuizz, $idCat, $idUser]);
                $sql = $this->getBdd()->prepare("SELECT MAX(idQuizz) as id from Quizz ");
                $sql->execute();
                $lastid = $sql->fetch(PDO::FETCH_ASSOC);
                $this->lastId = $lastid;
            }
        public function countId()
            {
                $requete=$this->getBdd()->prepare("SELECT * FROM quizz");
                $requete->execute();
                $requete->fetchAll(PDO::FETCH_ASSOC);
                return $requete->rowCount();
            }
            public function recupMiniIdQuestion($idQuizz)
            {
                $requete=$this->getBdd()->prepare('SELECT MIN(idQuestion) as id FROM questions WHERE idQuizz = ?');
                $requete->execute([$idQuizz]);
                return $requete->fetch(PDO::FETCH_ASSOC); 
            }

        public function maxidQuestion()
        {
            $sql = $this->getBdd()->prepare("SELECT MAX(idQuestion) as id from questions ");
            $sql->execute();
            return $sql->fetch(PDO::FETCH_ASSOC);
            
        }
        
        public function getAllQuizz()
        {
            return $this->AllQuizz;
        }
        public function quizzUser($idUser)
        {
            $requete=$this->getBdd()->prepare("SELECT * FROM quizz INNER JOIN participationquizz USING (idUser) WHERE idUser = ?");
            $requete->execute([$idUser]);
           return $requete->fetchAll(PDO::FETCH_ASSOC);
        }
        public function quizzAmi($idUser)
        {
            $requete=$this->getBdd()->prepare("SELECT * FROM participationquizz INNER JOIN amis ON participationquizz.idUser = amis.idAmi WHERE amis.idUser = ?");
            $requete->execute([$idUser]);
           return $requete->fetchAll(PDO::FETCH_ASSOC);
        }
    }
