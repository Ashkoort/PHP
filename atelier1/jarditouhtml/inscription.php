<?php
require('fonction.php');
$db = connexionbase();
base();

?>

<div class="col-12">
<div class="row">
<!------------------------------------Formulaire-------------------------------------->
     <div class=" container col-6"><br>
         <div class="col-12">
             <form name="connexion" method="post" action="inscription_script.php">
             <fieldset class="row">
                    <legend>Création de compte</legend>
               <div class="form-group text-center offset-4 w-25">
               <label>Adresse mail :</label> <input type="text" class="form-control" name="log" placeholder="Identifiant"><br>
               <?php 
                   if (isset($_GET["erreur"]) && $_GET["erreur"]==1) { 
                ?>
                    <span class="red"> Veuillez mettre une adresse mail<span>
                <?php 
                  } 
                ?>
               </div>
               <div class="form-group text-center offset-4 w-25">
               <label>Mot de passe :</label><input type="password" class="form-control" name="pswd" placeholder="Mot de passe"><br>
               <?php 
                   if (isset($_GET["erreur"]) && $_GET["erreur"]==2) { 
                ?>
                    <span class="red"> Le mdp doit contenir, 1min,1maj,1caractère,1chiffre<span>
                <?php 
                  } 
                ?>
               </div>
               <div class="form-group text-center offset-4 w-25">
               <label>Retaper votre mot de passe :</label><input type="password" class="form-control" name="control" placeholder="Retaper votre mot de passe"><br>
               <?php 
                   if (isset($_GET["erreur"]) && $_GET["erreur"]==3) { 
                ?>
                    <span class="red"> Réécrire le mot de passe<span>
                <?php 
                  } 
                ?>
               </div>
               <div class="form-group text-center offset-4 w-25">
               <label>Nom : </label><input type="text" class="form-control" name="nom" placeholder="Saisir un nom"><br>
               <?php 
                   if (isset($_GET["erreur"]) && $_GET["erreur"]==4) { 
                ?>
                    <span class="red"> Saisissez un nom<span>
                <?php 
                  } 
                ?>
               </div>
               <div class="form-group text-center offset-4 w-25">
               <label>Prénom : </label><input type="text" class="form-control" name="prenom" placeholder="Saisir un Prénom"><br>
               <?php 
                   if (isset($_GET["erreur"]) && $_GET["erreur"]==5) { 
                ?>
                    <span class="red"> Saissiez un Prénom<span>
                <?php 
                  } 
                ?>
               </div>
               <div class="form-group text-center offset-4 w-25">
               <label>Ville : </label><input type="text" class="form-control" name="ville" placeholder="Saisir une Ville"><br>
               <?php 
                   if (isset($_GET["erreur"]) && $_GET["erreur"]==6) { 
                ?>
                    <span class="red"> saisissez une ville<span>
                <?php 
                  } 
                ?>
               </div>
               <div class="form-group text-center offset-4 w-25">
               <label>Adresse :</label><input type="text" class="form-control" name="Adresse" placeholder="Saisir une Adresse"><br>
               <?php 
                   if (isset($_GET["erreur"]) && $_GET["erreur"]==7) { 
                ?>
                    <span class="red">Saisissez une Adresse<span>
                <?php 
                  } 
                ?>
               </div>
               <div class="form-group text-center offset-4 w-25">
               <label>Code Postal </label><input type="text" class="form-control" name="codepostal" placeholder="Saisir un code postal"><br>
               <?php 
                   if (isset($_GET["erreur"]) && $_GET["erreur"]==8) { 
                ?>
                    <span class="red"> Saisissez un code postal<span>
                <?php 
                  } 
                ?>
               </div>
               <div class="text-center offset-4 w-25">
               <input type="submit" class="align-center" name="envoie" value="Inscription"><label><label>Vous êtes déjà inscrit ? <a href="sessionlgin.php">Cliquez ici </a></label>
               </div><br>
               </fieldset><br>
              </form>
             </div>
         </div>
     </div>
 </div>
<?php
bas();
?>