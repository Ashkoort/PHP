
<?php
require('fonction.php');
$db = connexionbase();

if(isset($_POST['ok'])){ // quand tu appuie sur le boutton avec l'id "ok" lance le script
$ID = $_POST['Id'];
$categorie = $_POST['categorie'];
$reference = $_POST['reference'];
$libelle = $_POST['libelle'];
$description  = $_POST['description'];
$prix = floatval($_POST['prix']); // permet de convertir une chaine de caractère en un nombre a virgule
$Stock = intval($_POST['Stock']);
$couleur = $_POST['Couleur'];
$extension = $_POST['extension'];
$bloquer = $_POST['block'];
$modif = null;

// -------------------------- Regex -----------------------------

$ext = "/^[a-z]{3}$/"; // pour l'extension jpg ou png
$couleurlibel="/^[a-zA-Z]*$/"; // pour la couleur et le libellé
$area='/[0-9a-zA-ZàèìòùÀÈÌÒÙáéíóúýÁÉÍÓÚÝâêîôûÂÊÎÔÛãñõÃÑÕäëïöüÿÄËÏÖÜŸçÇßØøÅåÆæœÉ]*\s*(?:\.|\:|\'|\?|\(|\)|\.|\,|\;|\:)*/'; // la zone area
$ref="/^[0-9-a-zA-Z]*$/"; // la reference

if(empty($reference)||(!preg_match($ref,$reference ))){  
    header("Location:formuModif.php?erreur=1&pro_id=".$ID); // redirection 
    exit;
}
if(empty($libelle)||(!preg_match($couleurlibel,$libelle ))){  
    header("Location:formuModif.php?erreur=2&pro_id=".$ID); // redirection 
    exit;
}
if(empty($description)||(!preg_match($area,$description ))){  
    header("Location:formuModif.php?erreur=3&pro_id=".$ID); // redirection 
    exit;
}
if(empty($prix)){  
    header("Location:formuModif.php?erreur=4&pro_id=".$ID); // redirection 
    exit;
}
if(empty($Stock)){  
    header("Location:formuModif.php?erreur=5&pro_id=".$ID); // redirection 
    exit;
}
if(empty($couleur)||(!preg_match($couleurlibel,$couleur ))){  
    header("Location:formulaireModif.php?erreur=6&pro_id=".$ID); // redirection 
    exit;
}
if(empty($extension)||(!preg_match($ext,$extension ))){  
    header("Location:formulaireModif.php?erreur=7&pro_id=".$ID); // redirection 
    exit;
}

/* --------------------------- MODIF -------------------------- */

/*var_dump($categorie,$reference,$libelle,$description,$prix,$Stock,$couleur,$extension,$bloquer,$modif);
exit;*/
// mise a jours du produit souhaité
$requete= ' UPDATE produits SET pro_cat_id=:pro_cat_id, pro_ref=:pro_ref, pro_libelle=:pro_libelle, pro_description=:pro_description, pro_prix=:pro_prix, pro_stock=:pro_stock, 
             pro_couleur=:pro_couleur, pro_photo=:pro_photo, pro_d_modif=:pro_d_modif, pro_bloque=:pro_bloque          
             WHERE pro_id=:pro_id';
$recup = $db->prepare($requete); // prepare la requête
 
$recup->bindValue(":pro_cat_id", $categorie, PDO::PARAM_INT); // pour un entier
$recup->bindValue(":pro_ref", $reference, PDO::PARAM_STR);
$recup->bindValue(":pro_libelle", $libelle, PDO::PARAM_STR);
$recup->bindValue(":pro_description", $description, PDO::PARAM_STR); // pour une chaine de caractère
$recup->bindValue(":pro_prix", $prix, PDO::PARAM_INT);
$recup->bindValue(":pro_stock", $Stock, PDO::PARAM_INT);
$recup->bindValue(":pro_couleur", $couleur, PDO::PARAM_STR);
$recup->bindValue(":pro_photo", $extension, PDO::PARAM_STR);
$recup->bindValue(":pro_d_modif", $modif, PDO::PARAM_STR);
$recup->bindValue(":pro_bloque", $bloquer, PDO::PARAM_STR);
$recup->bindValue(":pro_id", $ID, PDO::PARAM_INT);
$recup->execute();
header("location:tableau.php");
exit;


/* ------------------------ SUPRESSION --------------------------- */
}
  if(isset($_POST['cancel'])){
      $Id = $_POST['ID'];
      $sql2='SELECT * FROM produits WHERE pro_id='.$Id;
      $result=$db->query($sql2);
      $donee=$result->fetchObject();
      $photoPath = "assets/images/".$donee->pro_id.".".$donee->pro_photo;
                
      if (file_exists($photoPath)) 
    {
         unlink($photoPath);
    }
        
            
    $supprimer=$_POST['cancel'];
     $requete = 'DELETE FROM produits WHERE pro_id = ?';
     $sup = $db->prepare($requete);
     $sup -> execute(array($Id));
        
                if(!$sup){
                    die('erreur');
                }else{
                    header("location:tableau.php");
                }
            exit;
       }      
    
?>