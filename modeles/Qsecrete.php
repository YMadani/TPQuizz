<?php
class QSecrete extends modeles
{
    private $libelle;
    private $idQSecrete;
    public function __construct($idQSecrete = null)
        {
            if($idQSecrete != null)
                {
                    $sql = $this->getBdd()->prepare('SELECT * FROM question_secrete Where idQSecrete = ?');
                    $sql->execute([$idQSecrete]);
                    $LaQsecrete = $sql->fetch(PDO::FETCH_ASSOC);

                    $this->libelle = $LaQsecrete['libelle'];
                    $this->idQSecrete = $LaQsecrete['idQSecrete'];


                }
        }


        public function getLibelle()
            {
                return $this->libelle;    
            }
        public function getidQSecrete()
            {
                return  $this->idQSecrete;    
            }

}