<?php
session_start();

class modeles{


protected function getBdd(){
    return new PDO('mysql:host=localhost;dbname=tpquizz;charset=utf8', 'root', '',[PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
}

}

require_once '../modeles/Quizz.php';
require_once '../modeles/Utilisateur.php';
require_once '../modeles/Session.php';
require_once '../modeles/Administrateur.php';
require_once '../modeles/Qsecrete.php';
require_once '../modeles/Questions.php';
require_once '../modeles/Reponses.php';
require_once '../modeles/Categories.php';
require_once '../modeles/Session.php';