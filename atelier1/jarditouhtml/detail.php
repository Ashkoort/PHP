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
 
   </head>

   <body>
   <div class="col-12">
   <div class="row">
   <div>
   <img class=" img-fluid rounded"  src="assets/images/<?=$produit->pro_id?>">
   <p><h4>Libellé</h4><?php echo $produit->pro_libelle;?></p>
   <p><h4>Référence</h4><?php echo $produit->pro_ref;?></p>
   <p><h4>Description</h4><?php echo $produit->pro_description;?></p>
   <p><h4>Prix en euro</h4><?php echo $produit->pro_prix;?>
   <br>
   <?php
   if (isset($_SESSION['statut']) && $_SESSION['statut'] =='Admin')
                {
    ?>
   <button><a href="formuModif.php?pro_id=<?=$pro_id?>" class=" text-dark" title="Modifier">Modifier ou supprimer</a></button> <!-- permet de recupérer l'id dans formumodif detail = page 1 et formumodif = page 2 -->
   <?php
                }
    ?>
   <button><a href="tableau.php" class=" text-dark" title="Retour">Retour</a></button>
   </div>
   </div>
   </div>
   </body>
   <?php
bas();
?>
