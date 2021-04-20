<?php
require_once '../modeles/modeles.php';

if (isset($_POST['deco'])&&!empty($_POST['deco']))
{
    session_destroy();
    header("location:../membres/index.php?success=1&pseudo=".$_GET['pseudo']);
}