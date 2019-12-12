<?php
require('session.php'); // appel la page fonction pour utilisé dans celle ci la fonction base "entête" et connexionBase
base();
$db=connexionBase();
$requete ='SELECT * FROM produits ORDER BY `pro_id` ASC'; // requete qui selectionne tous de la table produits et les rangent par odre d'ascendance
$result = $db->query($requete); // stock le resultats
?>
<div class="row">
<div class="col">
<div class="table-responsive">
    <table class="table table-striped table-hover table-bordered bg-light">
      <thead>     <!-- Entête du tableau -->
       <tr>
        <th class="colN"><b>Photo</b></th>
        <th class="colN"><b>ID</b></th>
        <th class="colN"><b>Catégorie</b></th>
        <th class="colN"><b>Libellé</b></th>
        <th class="colN"><b>Prix</b></th>
        <th class="colN"><b>Couleur</b></th>
        <th class="colN"><b>Extension</b></th>
        <th class="colN"><b>Date d'ajout</b></th>
        <th class="colN"><b>Date de modification</b></th>
        <th class="colN"><b>Bloqué</b></th>

      </tr>
    </thead>
    <tbody>
      
      <?php
    while($rang=$result->fetchObject()){ // remplis le tableau tant qu'il y a un objet
      ?>
      <tr>
      <td> <img class="visuel img-fluid rounded"  src="assets/images/<?=$rang->pro_id?>.<?=$rang->pro_photo?>"></td> <!-- pour insérer les images en fonction de leur id et de l'extension-->
      <td><?=$rang->pro_id?></td>
      <td><?=$rang->pro_cat_id?></a></td> <!-- affiche les catégories dans la colonne du tableau-->
      <td><a href="detail.php?pro_id=<?=$rang->pro_id?>"><?=$rang->pro_libelle?></a></td>
      <td><?=$rang->pro_prix?></td>
      <td><?=$rang->pro_couleur?></td>
      <td><?=$rang->pro_photo?></td>
      <td><?=$rang->pro_d_ajout?></td>
      <td><?=$rang->pro_d_modif?></td>
      <td><?=$rang->pro_bloque?></td>

        </tr>
   <?php }?>
      </tbody>
      </table>
</div>
</div>
</div>
<?php
bas();
?>