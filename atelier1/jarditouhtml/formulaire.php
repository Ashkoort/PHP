<?php
require('session.php');
base();
connexionBase();
?>
<div class="col-12">
<div class="row">
    <!-------------------------------------1 ere colonne------------------------------------------------------------>
    <div class=" container col-8"><br>
        <div class="col-12">
        <form action="formuindex.php" method="POST">
        <fieldset class="row">
            <legend>Vos coordonnées</legend>
                <div class="form-group text-center offset-3 w-50">        
                    <label for="nom">Votre nom : </label><span id='missN'> *</span>
                    <input type="text" id="nom" name="nom" class="form-control fontAwesome" placeholder="&#xf2b9; Nom...">
                    <?php 
                if (isset($_GET["erreur"]) && $_GET["erreur"]==1) { 
                    echo "Veuillez saisir votre Nom"; 
                }               
                ?>
                </div>
            <div class="form-group text-center offset-3 w-50">
                <label for="prenom">Votre prénom : </label><span id='missP'> *</span>
                <input type="text" id="prenom" name="prenom" class="form-control fontAwesome" placeholder="&#xf2b9; Prenom...">
                <?php
                if (isset($_GET["erreur"]) && $_GET["erreur"]==2) { 
                    echo "Veuillez saisir votre Prénom";
                }
                ?>

            </div><br>
            <div class="form-group text-center offset-3 w-50">
                <p id="sexe" title="sexe">Sexe : *</p>
                <input type="radio" class="sexe " name="sexe" value="femme" title="femme"> Femme
                <input type="radio" class="sexe" name="sexe" value="homme" title="homme" checked> Homme

            </div>
            <div class="form-group text-center offset-3 w-50">
                <label for="ddn">Date de naissance : </label><span id='missDDN'> *</span>
                <input type="date" id="ddn" name="ddn" class="form-control" placeholder="Date de naissance">
                <?php
                if (isset($_GET["erreur"]) && $_GET["erreur"]==3) { 
                    echo "Veuillez saisir une bonne date de naissance";
                }
                ?>
            </div>
            <div class="form-group text-center offset-3 w-50">
                <label for="cpostal">Code postal : </label><span id='missCP'> *</span>
                <input type="number" id="cp" name="cpostal" class="form-control fontAwesome" placeholder="&#xf2b9; Code postal...">               
                <?php
                if (isset($_GET["erreur"]) && $_GET["erreur"]==4) { 
                    echo "Veuillez saisir un bon code postal";
                }
                ?>
            </div>
            <div class="form-group text-center offset-3 w-50">
                <label for="adresse">Adresse : </label><span id='missAD'> *</span>
                <input type="text" id="ad" name="adresse" class="form-control fontAwesome" placeholder="&#xf2b9; Adresse...">
                <?php
                if (isset($_GET["erreur"]) && $_GET["erreur"]==5) { 
                    echo "les espaces, apostrophes, slash et tiret sont accepte"; 
                }
                ?>
            </div>
            <div class="form-group text-center offset-3 w-50">
                <label for="ville">Ville: </label><span id='missV'> *</span>
                <input type="text" id="ville" name="ville" class="form-control fontAwesome" placeholder="&#xf2b9; Ville...">
                <?php
                if (isset($_GET["erreur"]) && $_GET["erreur"]==6) { 
                        echo "<span id='missV'>Veuillez saisir une Ville</span>";
                }
                ?>
            </div>
            <div class="form-group text-center offset-3 w-50">
                <label for="email">Email : </label><span id='missMail'> *</span>
                <input type="email" id="mail" name="email" placeholder="&#xf2b9; Email..." class="form-control fontAwesome">
                <?php
                if (isset($_GET["erreur"]) && $_GET["erreur"]==7) { 
                    echo "Veuillez saisir une bonne adresse mail valide";
                }
                ?>
            </div>
    </fieldset><br>
    <fieldset class="row">
            <legend>Votre demande</legend>
<div class="form-group text-center offset-3 w-50">
    <label for="sujets">Sujet :</label>
<select id="sujets" name="choix[]" class="form-control">
    <option  value="9" selected disabled>--- Sélectionner ---</option>
    <option  value="0" >Mes commandes</option>
    <option  value="1">Question sur le produit</option>
    <option value="2">Réclamation</option>
    <option value="3">Autres</option>        
    </option>
</select>
</div>
<div class="form-group text-center offset-3 w-50">
<label for="question">Votre question : </label><span id='missARE'> *</span>
<textarea name="question" id="are" cols="30" rows="3" class="form-control fontAwesome" placeholder="&#xf2b9; écrivez votre question"></textarea>
</fieldset><br>
            </div>
<div class="text-center">
    <label for="verif" > J'accepte le traitement informatique de ce formulaire</label>
    <input type="checkbox" id="verif" name="checkbox" value="0" required>
    <span id="missVerif"></span>
    <?php
               if (isset($_GET["erreur"]) && $_GET["erreur"]==8) { 
                        echo " veuillez cochez la case <br>";
               }
    ?>
</div><br>
<div class="text-center">
    <input type="submit" id="ok" name="ok" value="Envoyez" >
    <input type="reset" id="cancel" name="cancel" value="Annuler">
 </div>
</form><br>
</div>
</div>
</div>
</div>
<?php
bas();
?>