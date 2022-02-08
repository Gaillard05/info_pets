<?php

include "header.php"; 

require "connexion.php";
$msgErreurMail='';
$msgErreurPass='';
$msgErreurs='';
if($_POST!=null){
    //on vérifie si les champs sont remplis
    if((!isset($_POST['mail']))||(!isset($_POST['pass']))){
        //si pas remplis, message d'erreur
        $msgErreurs="<span class=red>Tous les champs sont obligatoires</span>";
    }
//on vérifie l'email
if($_POST['mail']!=''){
    $regex = "/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,10})$/";
    if(preg_match ($regex, $_POST['mail'])){
        $email=$_POST['mail'];
    }
    else{
        $msgErreurMail="<span class=bottom>Merci de renseigner un email valide<span class=bottom>";
    }
}
else{
    $msgErreurMail="<span class=bottom>Merci de renseigner votre email</span>";
}
//on vérifie le mot de passe
if($_POST['pass']!=''){
    $password = htmlentities($_POST['pass']);
}
else{
    $msgErreurPass="<span class=bottom>Merci de renseigner votre mot de passe</span>";
}
if($msgErreurMail==''&&$msgErreurPass==""){

    $password = sha1($password);
    $query = $pdo->prepare('SELECT * FROM users WHERE  email=:mail');
    $query->execute(array('mail'=>$email));
   
   
   
    $user = $query->fetch(PDO::FETCH_ASSOC);
    
     
    if(empty($user)){
     
        $msgErreurMail="Votre email n'existe pas, veuillez vous inscrire";
        header("location:inscription.php");
    }
    else if($user['password'] != sha1($_POST['pass']))
        {
         
           $msgErreurPass="Erreur dans la saisie du mot de passe";
            header("location:inscription.php"); 
        }
    else{
            session_start();
            $_SESSION['id_user']=$user['id_user'];
            $_SESSION['nom']=$user['nom'];
            $_SESSION['prenom']=$user['prenom'];
            header("location:index.php");  
    }
  
    }
    else{
            $msgErreurs="<span class=red>Tout les champs sont obligatoires !</span>";
        } 
}
include "login.phtml";
include "footer4.php";
?>
