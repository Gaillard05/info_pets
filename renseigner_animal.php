        <?php   
        session_start();
        if(!isset($_SESSION['id_user'])){
            header("location:erreur_acces.php");
        }else{
            
         include "header.php";
    
             
if($_POST != null){
        require "connexion.php";
        $msgErreurRace='';
        $erreurs='';
        if(isset($_POST['espece'])&&isset($_POST['race'])&&isset($_POST['choix'])&&isset($_POST['sexe'])&&isset($_POST['physio'])){
            $espece = $_POST['espece'];
            $race = htmlentities($_POST['race']);
            $age = $_POST['choix'];
            $sexe = $_POST['sexe'];
            $physio = $_POST['physio'];
           

        //$tab_cle=[]; 
        //$query= $pdo->prepare("SELECT distinct race FROM liste_animaux"); 
        //$query->execute(); 
        //$tab_cle= 
        //foreach($tab_cle as $item){ 
          //  echo $item[$race]; 
       //}

            if(empty($race)){

                $erreurs="<p class=alert>Tous les champs sont obligatoires</p>";
                exit();
            //}else{
                //if(!in_array($race,$tab_cle)){
               //   if(!ctype_alpha($race)){
               //   $msgErreurRace="<p class=alert>Merci de renseigner une race valide</p>";
                } else{
                   $req = $pdo->prepare("INSERT INTO animaux(espèce,race,age,sexe,physiologie) VALUES(:espece,:race,:age,:sexe,:physiologie,in_users:");
                            $req->bindParam(":espece", strtolower( $espece ));
                            $req->bindParam(":race", strtolower($race));
                            $req->bindParam(":age", strtolower($age));
                            $req->bindParam(":sexe", strtolower($sexe));
                            $req->bindParam(":physiologie", strtolower($physio));
                            $req->bindParam(":in_users", $id_user=$_SESSION['id_user']);
                            $req->execute();
                            header("location: fiche_info_animal.php");
                            exit();
                }
                         
           // }
        }
        else{
                $erreurs="<p class=alert>Tous les champs sont obligatoires</p>";
            }
        }
        include "renseigner_animal.phtml";
        include "footer5.php";
    }

        ?>