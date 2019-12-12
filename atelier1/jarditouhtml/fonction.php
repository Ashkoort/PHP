

	
<?php

function connexionBase()
{
   // Paramètre de connexion serveur
   $host = "";
   $login= "";     // Votre loggin d'accès au serveur de BDD 
   $password="";    // Le Password pour vous identifier auprès du serveur
   $base = "";    // La bdd avec laquelle vous voulez travailler 
 
   try 
   {
        $db = new PDO('mysql:host=' .$host. ';charset=utf8;dbname=' .$base, $login, $password);
        return $db;
    } 
    catch (Exception $e) 
    {
        echo 'Erreur : ' . $e->getMessage() . '<br>';
        echo 'N° : ' . $e->getCode() . '<br>';
        die('Connexion au serveur impossible.');
    } 
}
function base(){
    ?>
    <!DOCTYPE html>
<html lang="fr">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta charset="utf-8">
  <title>Jarditou</title>
     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
     <link rel="stylesheet" href="assets/css/style.css">
</head>
<body class="container-fluid animationName">
            <header>
                  <img src="assets/images/jarditou_logo.jpg" class="img-fluid" alt="Logo Jarditou" title="Logo Jarditou" id="logo_jarditou"> 
                  <p id="sloganjardin" class="d-sm-none d-lg-inline">Tout le jardin</p>
           </header> 
    <nav id="navbar" class="navbar navbar-expand-lg bg-success navbar-dark "> <!-- début du menu -->
        <!-- Toggler/collapsibe Button -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="collapsibleNavbar">
            <ul class="navbar-nav bg-success">
                <li class="nav-item">
                    <a class="nav-link  bg-secondary text-light shw" href="index.php">Accueil</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link bg-secondary text-light shw" href="tableau.php">Tableau</a>
                </li>
                <li class="nav-item">  
                    <a class="nav-link bg-secondary text-light shw" href="formulaire.php">Contact</a>
                </li>
                <?php
                if (isset($_SESSION['statut']) && $_SESSION['statut'] =='Admin')
                {
                    ?>
                    <li class="nav-item">  
                        <a class="nav-link bg-secondary text-light shw" href="produits_ajout.php">Ajouts</a>
                    </li>
                <?php 
                }
                if (isset($_SESSION['statut']))
                {
                ?> 

                    <li class="nav-item">
                        <a class="nav-link bg-secondary text-light shw" href="deconnexion.php">Déconnexion</a>
                    </li>
                    <?php 
                } 
                else 
                {
                ?>
                    <li class="nav-item">  
                    <a class="nav-link bg-secondary text-light shw" href="sessionlgin.php">Login</a>
                     </li>
                <?php
                }
                ?>    
            </ul>
        </div>
    </nav>    <!-- fin du menu -->  
        <img src="assets/images/promotion.jpg" class="img-fluid" alt="Promotion" title="Promotion" id="promo"> 
<?php
}
?>
<?php
function bas(){
?>
         <footer>
             <ul class="bg-success">
                <li><a href="mentionlegal.php" class="bg-secondary text-light shw" title="Mentions légales">Mentions légales</a></li>
                <li><a href="horaire.php" class="bg-secondary text-light shw" title="Horaires">Horaires</a></li>
                <li><a href="plandusite.php" class=" bg-secondary text-light shw" title="Plan du site">Plan du site</a></li>
            </ul> 
        </footer>
    </div>
</body>
   <script src="assets/js/formulaire.js"></script>
   <script src="assets/js/supp.js"></script>
   <script src="https://kit.fontawesome.com/058ac32774.js" crossorigin="anonymous"></script>
   <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
   <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</html>
<?php
}
?>