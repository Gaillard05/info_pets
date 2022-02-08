<!DOCTYPE html>
<html lang="fr">
<head>
    <title>Info Pets</title>
    <meta charset="utf-8">
    <!--Fichiers CSS-->
    <link rel="stylesheet" type="text/css" href="css/normalize.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/inscription.css">
    <link rel="stylesheet" type="text/css" href="css/renseigner_animal.css">
    <link rel="stylesheet" type="text/css" href="css/fiche_info_animal.css">
    <link rel="stylesheet" type="text/css" href="css/planning_antiparasitaire.css">
    <link rel="stylesheet" type="text/css" href="css/vaccination.css">
    <link rel="stylesheet" type="text/css" href="css/news.css">
    <link rel="stylesheet" type="text/css" href="css/urgence.css">
    <link rel="stylesheet" type="text/css" href="css/perte.css">
    <!--Fonts-->
    <link href="https://fonts.googleapis.com/css?family=Lobster" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Dancing+Script&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lato&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/0b1009deec.js" crossorigin="anonymous"></script>
</head>
<body>
    <header>
    <?php
    if (isset($_SESSION['id_user'])){
    echo"<a href='deconnexion.php' name='deconnexion' class='btn'>Déconnexion</a>";
    }else{
    echo"<a href='select_user.php' value='Connexion' name='connexion' class='btn' id='connexion'>Connexion</a>";
    }
?>
        <h1 class="titre-site"><i class="fas fa-cat"></i> <a href="index.php" class="accueil">Info Pets</a> <i class="fas fa-dog"></i></h1>
            <figure class="logo">
                <figcaption class="slogan">Toutes les infos sur vos animaux de compagnie</figcaption>
                    <img class="img-nav" src="img/image_nav.png" alt="image-nav">
            </figure>
        <nav class="navigation">
        <?php
    if (isset($_SESSION['id_user'])){
    echo "<a href='renseigner_animal.php'>Renseigner animal</a>";
    echo"<a href='planning_antiparasitaire.php'>Planning antiparasitaire</a>";
    echo "<a href='vaccination.php'>Vaccination</a>";
    echo"<a href='news.php'>News</a>";
    echo"<a href='urgence.php'>En cas d'urgence</a>";
    echo"<a href='perte.php'>Perte</a>";
    }else{
    echo"<a href='inscription.php'>Inscription</a> ";
    echo"<a href='planning_antiparasitaire.php'>Planning antiparasitaire</a>";
    echo"<a href='news.php'>News</a>";
    echo"<a href='urgence.php'>En cas d'urgence</a>";
    echo"<a href='perte.php'>Perte</a>";
    }
?>    
        </nav>
    </header>  