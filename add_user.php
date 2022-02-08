<?php
session_start();

    require "connexion.php";
    $msgErreurNom='';
    $msgErreurPrenom='';
    $msgErreurEmail='';
    $msgErreurPassword='';
    $msgErreurs='';
    
        if($_POST!=null){
            //on vérifie si les champs sont remplis
            if((!isset($_POST['nom']))||(!isset($_POST['prenom']))||(!isset($_POST['email']))||(!isset($_POST['password']))){
                //si pas remplis, message d'erreur
              
                    $msgErreurs="<span class=red>Tous les champs sont obligatoires</span>";
            }
            else{
                //si les champs sont remplis, on vérifie un par un la validité
                //on vérifie le nom d'abord
                if($_POST['nom']!=''){
                    if(ctype_alpha($_POST['nom'])){
                        $nom = htmlentities($_POST['nom']);
                    }
                    else{
                        $msgErreurNom="<span class=bottom>Merci de renseigner un nom valide<span class=bottom>";
                    }
                }
                else{
                    $msgErreurNom="<span class=bottom>Merci de renseigner votre nom</span>";
                }
                //on vérifie le prenom
                if($_POST['prenom']!=''){
                    if(ctype_alpha($_POST['prenom'])){
                        $prenom = htmlentities($_POST['prenom']);
                    }
                    else{
                        $msgErreurPrenom="<span class=bottom>Merci de renseigner un prénom valide<span class=bottom>";
                    }
                }
                else{
                    $msgErreurPrenom="<span class=bottom>Merci de renseigner votre prénom</span>";
                }
                //on vérifie l'email
                if($_POST['email']!=''){
                    $regex = "/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,10})$/";
                    if(preg_match ($regex, $_POST['email'])){
                        $email=$_POST['email'];
                        // faire une requête pour vérifier si le mail existe déjà dans la base                  
                        $query = $pdo->prepare('SELECT * FROM users WHERE email=:email');
                        $query->execute(array('email'=>$email));
                        $user = $query->fetch(PDO::FETCH_ASSOC);
                        //execute retourne vrai ou faux - vrai = résultat - faux = pas de résultat
                        if($user['email']!='')
                        {
                            $msgErreurEmail="<span class=bottom>Votre email est déjà utilisé, veuillez en selectionner un autre<span class=bottom>";
                        }
                    }
                    else{
                        $msgErreurEmail="<span class=bottom>Merci de renseigner un email valide<span class=bottom>";
                    }
                }
                else{
                    $msgErreurEmail="<span class=bottom>Merci de renseigner votre email</span>";
                }
                //on vérifie le mot de passe
                if($_POST['password']!=''){
                    $password = htmlentities($_POST['password']);
                }
                else{
                    $msgErreurPassword="<span class=bottom>Merci de renseigner votre mot de passe</span>";
                }
                if($msgErreurNom==''&&$msgErreurPrenom==''&&$msgErreurEmail==''&&$msgErreurPassword==""){
                    $password = sha1($password);
                    $req = $pdo->prepare("INSERT INTO users(nom,prenom,email,password) VALUES(:nom,:prenom,:email,:password)");
                    $req->bindParam(":nom", $nom);
                    $req->bindParam(":prenom", $prenom);
                    $req->bindParam(":email", $email);
                    $req->bindParam(":password", $password);
                    $req->execute();
                    header("Location:select_user.php");
                       
                }
                else{
            $msgErreurs="<span class=red>Tout les champs sont obligatoires !</span>";
        } 
    }
}
    include 'inscription.phtml';

?>