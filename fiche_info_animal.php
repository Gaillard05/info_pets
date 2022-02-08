    <?php
    session_start();
    
    $erreurRenseigneAnimal;
    if(!isset($_SESSION['id_user'])){
        header("location:erreur_acces.php");
        exit();
    }else{
        include "header.php";
        include "fiche_info_animal.phtml";
        include "pied_page.php";   
    }  
     
           
        
    ?>