
     <?php     
     require("session.php"); // Inclusion de notre bibliothèque de fonctions
     base();
     $db = connexionBase(); // Appel de la fonction de connexion
     $pro_id = $_GET["pro_id"];
     $requete = "SELECT * FROM produits WHERE pro_id=".$pro_id;
 
     $result = $db->query($requete);
 
     // Renvoi de l'enregistrement sous forme d'un objet
     $produit = $result->fetch(PDO::FETCH_OBJ);
   ?>
 

<div class="col-12">
<div class="row">

<!-- ----------------------------------------- formulaire ---------------------------------- -->

     <div class=" container col-8"><br>
        <div class="col-12">
             <form action="formuModif_script.php" method="POST" enctype="multipart/form-data">
                  <fieldset class="row">
                    <legend>modification</legend>
                      <input id="Id" name="Id" type="hidden" value="<?php echo $produit->pro_id;?>">       
                        <div class="form-group text-center offset-3 w-50">
                        <label for="reference">Référence : </label>
                        <input type="text" id="reference" class="form-control" name="reference" value="<?php echo $produit->pro_ref;?>">
                        <?php 
                           if (isset($_GET["erreur"]) && $_GET["erreur"]==1) { 
                         ?>
                           <span class="red"> Veuillez mettre une Référence<span>
                         <?php 
                           }               
                          ?>
                        </div>
                        <div class="form-group text-center offset-3 w-50">
                        <label for="categorie">Catégorie </label>
                        <select name="categorie" id="categorie" class="form-control">
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
                        <div class="form-group text-center offset-3 w-50">
                         <label for="libelle">libellé :</label>
                         <input type="text" class="form-control" id="libelle" name="libelle" value="<?php echo $produit->pro_libelle;?>">
                         <?php 
                           if (isset($_GET["erreur"]) && $_GET["erreur"]==2) { 
                         ?>
                           <span class="red"> "Veuillez saisir un libellé"<span>
                         <?php 
                           }               
                          ?>             
                        </div>
                        <div class="form-group text-center offset-3 w-50">
                        <label for="description">Description :</label>
                        <textarea name="description" id="description" class="form-control" cols="30" rows="3"><?php echo $produit->pro_description;?></textarea>
                        <?php 
                           if (isset($_GET["erreur"]) && $_GET["erreur"]==3) { 
                         ?>
                           <span class="red"> Caractère autorisé : '|espace|-|?|()|.|,|;|<span>
                         <?php 
                           }               
                          ?>
                        </div>
                        <div class="form-group text-center offset-3 w-50">            
                        <label for="prix">Prix :</label>
                        <input type="number" min="1" max="999.99" step="0.01" id="prix" class="form-control" name="prix" value="<?php echo $produit->pro_prix;?>" >
                        <?php 
                           if (isset($_GET["erreur"]) && $_GET["erreur"]==4) { 
                         ?>
                           <span class="red"> Veuillez mettre un prix Max 999.99<span>
                         <?php 
                           }               
                          ?>                                        
                        </div>
                        <div class="form-group text-center offset-3 w-50">
                        <label for="Stock">Stock</label>
                        <input type="number" id="Stock" class="form-control" min="1" max="500" step="1" name="Stock" value="<?php echo $produit->pro_stock;?>">
                        <?php 
                           if (isset($_GET["erreur"]) && $_GET["erreur"]==5) { 
                         ?>
                           <span class="red">Veuillez saisir un Stock limite Max 500 <span>
                         <?php 
                           }               
                          ?> 
                        </div>
                        <div class="form-group text-center offset-3 w-50">
                        <label for="Couleur">Couleur</label>
                        <input type="text" id="Couleur" class="form-control" name="Couleur" value="<?php echo $produit->pro_couleur;?>" >
                        <?php 
                           if (isset($_GET["erreur"]) && $_GET["erreur"]==6) { 
                         ?>
                           <span class="red"> Veuillez saisir une couleur <span>
                         <?php 
                           }               
                          ?> 
                        </div>
                        <div class="form-group text-center offset-3 w-50">
                        <label for="Photo">photo</label>
                        <input type="text" id="Photo" class="form-control" name="extension" value="<?php echo $produit->pro_photo;?>">
                        <?php 
                           if (isset($_GET["erreur"]) && $_GET["erreur"]==7) { 
                         ?>
                           <span class="red"> "Veuillez saisir une extension jpg ou png"<span>
                         <?php 
                           }               
                          ?> 
                        </div>
                        <div class="text-center">
                        <p id="bloquer">Produit bloquer 
                        <input type="radio" class="block" name="block" value="0"> oui 
                        <input type="radio" class="block" name="block" value="1" checked> non
                        </p>
                        </div>
                        <br>
                        <div class="text-center offset-3 w-50">
                        <input type="submit" id="ok" name="ok" value="Valider la modification">
                        </div>
                      <br>
                   </fieldset>
                </form><br>
         <form action="formuModif_script.php" method="POST">
            <fieldset class="row">
               <legend> Supression du produit </legend>
                  <div class="form-group text-center offset-3 w-50"> 
                     <input id="Id" name="ID" type="hidden" value="<?php echo $produit->pro_id;?>">
                     <button type="submit" id="sup" name="cancel" value="supprimer">supprimer</button>
                  </div>
               </fieldset>
         </form><br>
   <button><a href="tableau.php" class=" text-dark" title="Retour">Retour au Tableau</a></button>
   <button><a href="detail.php?pro_id=<?=$pro_id?>" class=" text-dark" title="Retour">Retour à la page précédente</a></button>
   </div>
</div>
</div>
</div>
<?php
bas();
?>