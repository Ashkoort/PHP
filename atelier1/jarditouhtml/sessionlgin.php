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
             <form name="connexion" method="post" action="session.php">
             <fieldset class="row">
                    <legend>Authentification</legend>
               <div class="form-group text-center offset-4 w-25">
               <label>Adress mail :</label><input type="text" class="form-control" name="login" placeholder="Identifiant"><br>
               <?php 
                   if (isset($_GET["erreur"]) && $_GET["erreur"]==1) { 
                ?>
                    <span class="red"> Identifiant érronée<span>
                <?php 
                  } 
                ?>
               </div>
               <div class="form-group text-center offset-4 w-25">
               <label>Mot de passe :</label><input type="password" class="form-control" name="pwd" placeholder="Mot de passe"><br>
               <?php 
                   if (isset($_GET["erreur"]) && $_GET["erreur"]==2) { 
                ?>
                    <span class="red"> Mot de passe érronée<span>
                <?php 
                  } 
                ?>
               </div>
               <div class="text-center offset-4 w-25">
               <input type="submit" class="align-center" name="send" value="Connexion"><label>Vous n'êtes pas inscrit ? <a href="inscription.php">Cliquez ici </a>!</label>
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