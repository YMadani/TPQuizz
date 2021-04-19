<?php
class Categorie extends modeles
{
    private $idCategorie;
    private $libelle;
    private $categorie;

    public function __construct($idCategorie = null)
    
    {
        if($idCategorie !== null){
            $requete = $this->getBdd()->prepare("SELECT * FROM categories WHERE idCat = ? ");
            $requete->execute([$idCategorie]);
            $categories = $requete->fetch(PDO::FETCH_ASSOC);

            $this->idCategorie = $idCategorie;
            $this->libelle = $categories["libelle"];
        }else{
            $requete = $this->getBdd()->prepare("SELECT * FROM categories");
            $requete->execute();
            $categories = $requete->fetchAll(PDO::FETCH_ASSOC);

            $this->categorie = $categories;

        }
    }

        public function getidCat()
            {
                return $this->idCategorie;
            }
        public function getlibelle()
            {
                return $this->libelle;
            }
        public function gettoutCategorie()
        {
            return $this->categorie;
        }
    }
   
