<?php
function getBdd(){
    return new PDO('mysql:host=localhost;dbname=tpquizz;charset=utf8', 'root', '',[PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
}
require_once 'Utilisateur.php';
require_once 'Session.php';
require_once 'Administrateur.php';
require_once 'Qsecrete.php';
require_once 'Questions.php';
require_once 'Reponses.php';
require_once 'Categories.php';