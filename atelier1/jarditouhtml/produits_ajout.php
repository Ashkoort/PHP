<?php
require('session.php');
if(isset($_SESSION['statut']) && $_SESSION['statut'] =='Admin'){
// require('fonction.php');
base();
$db = connexionBase();
 
?>
<div class="col-12">
<div class="row">

<!----------------------------------------- Formulaire ajouts--------------------------------------------->
<div class=" container col-8">
    <div class="col-12">
        <form action="produits_ajout_script.php" method="POST" enctype="multipart/form-data">
            <fieldset class="row">
                <legend>Ajouts</legend> 
                                     
                 <div  class="form-group text-center offset-3 w-50">
                <label for="reference">Référence : </label><input type="text" id="reference" name="reference" class="form-control fontAwesome" placeholder="&#xf1c6; Référence...">
                <?php
                   if (isset($_GET["erreur"]) && $_GET["erreur"]==3) { 
                 ?>
                    <span class="red">Veuillez saisir la référence</span>
                <?php
                }
                ?>
                </div>
                <div  class="form-group text-center offset-3 w-50">
                <label for="categorie">Catégorie :</label>
                <select name="categorie" id="categorie" class="form-control" placeholder="Catégorie...">
                <?php
                $db = connexionbase();
                $requeteRef ='SELECT * FROM categories ORDER BY cat_nom ASC';
                $resultats = $db->query($requeteRef);
                while($res=$resultats->fetchObject()){
                ?>
                <option value="<?=$res->cat_id?>"><?=$res->cat_nom?></option>
                <?php
                }
                ?>
                </select>
                </div>
                <div  class="form-group text-center offset-3 w-50">
                <label for="libelle">libellé :</label><input type="text" id="libelle" name="libelle" class="form-control fontAwesome" placeholder="&#xf1c6; Libellé...">                
                <?php
                   if (isset($_GET["erreur"]) && $_GET["erreur"]==4) {
                ?> 
                    <span class="red">Veuillez saisir le Libellé</span>
                <?php
                }
                ?>
                </div>
                <div  class="form-group text-center offset-3 w-50">
                <label for="description">Description :</label><textarea name="description" id="description" cols="30" rows="3" class="form-control fontAwesome" placeholder="&#xf1c6; Description..."></textarea>
                <?php
                   if (isset($_GET["erreur"]) && $_GET["erreur"]==5) { 
                       ?>
                    <span class="red">Veuillez saisir une Description</span>
                <?php
                }
                ?>
                </div>
                <div  class="form-group text-center offset-3 w-50">            
                <label for="prix">Prix :</label><input type="text" id="prix" name="prix" class="form-control fontAwesome" placeholder="&#xf1c6; Prix...">               
                 <?php
                   if (isset($_GET["erreur"]) && $_GET["erreur"]==6) {
                ?> 
                   <span class="red">Veuillez saisir votre Prix</span>
                <?php
                }
                ?>
                </div>
                <div  class="form-group text-center offset-3 w-50">
                <label for="Stock">Stock :</label><input type="number" id="Stock" name="Stock" class="form-control fontAwesome" placeholder="&#xf1c6; Stock...">
                <?php
                   if (isset($_GET["erreur"]) && $_GET["erreur"]==7) {
                ?> 
                    <span class="red">Veuillez saisir le Stock</span>
                <?php
                }
                ?>
                </div>
                <div  class="form-group text-center offset-3 w-50">
                <label for="Couleur">Couleur :</label><input type="text" id="Couleur" name="Couleur" class="form-control fontAwesome" placeholder="&#xf1c6; Couleur...">
                <?php
                   if (isset($_GET["erreur"]) && $_GET["erreur"]==8) {
                ?> 
                    <span class="red">Veuillez saisir la couleur</span>
                <?php
                }
                ?>
                </div>
                <div  class="form-group text-center offset-3 w-50">
                <label for="Photo">Insertion image : </label><input type="file" id="insert" name="insert" placeholder="Insertion de la photo...">
                </div>
                <p id="bloquer" class="text-center">Produit bloquer 
                <input type="radio" class="block" name="block" value="0"> oui 
                <input type="radio" class="block" name="block" value="1" checked> non
                </p>
                <br>
                <div  class="form-group text-center offset-3 w-50">
                <input type="submit" id="ok" name="ok" value="Envoyez">
                </div>
            </div>
        </fieldset>
       </form>
       <br>
    </div>
</div>
<?php
bas();
}
else
{
    echo"vous n'êtes pas autorisé a consulté cette page";
}
?>

