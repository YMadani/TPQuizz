<?php
require_once 'entete.php';

$idUser = $_SESSION['idUser'];

$quizz = new Quizz();

$U = new Utilisateur($idUser);
$Pseudo = $U->getUsername();
?>
<div class='container my-5' >
    <div class='card'>
        <div class='row' >
            <div class='col-sm'>
                <img src="https://kazeistore.files.wordpress.com/2018/09/pile-face3.jpg" alt="" style="border-radius: 120%; height:200px;width:200px;margin-left:20px">
                <p style="margin-left:30%;"><?=$Pseudo?></p>
            </div>
            <div class='col-sm' >
              <h3>Vos Quizz</h3>
            
            </div>
        </div>
    </div>
</div>
<?php
require_once 'footer.php';
?>