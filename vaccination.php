<?php
session_start();
if(!isset($_SESSION['id_user'])){
    header("location:erreur_acces.php");
    exit();
}else{
    include "header.php";
    include "vaccination.phtml";
    include "footer2.php";
}
?>