
<?php
require('fonction.php');
$db = connexionbase();

if ($_POST){

// $ID =(int) $_POST['id'];
$categorie =(int) $_POST['categorie'];
$reference = $_POST['reference'];
$libelle = $_POST['libelle'];
$description  = $_POST['description'];
$prix = (float)$_POST['prix']; // permet de convertir une chaine de caractère en un nombre a virgule
$Stock = (int)$_POST['Stock'];
$couleur = $_POST['Couleur'];
$bloquer = $_POST['block'];
$date = date('Y-m-d');
$modif = null;

$couleurlibel="/^[a-zA-Z]*$/"; // pour la couleur et le libellé
$area='/[0-9a-zA-ZàèìòùÀÈÌÒÙáéíóúýÁÉÍÓÚÝâêîôûÂÊÎÔÛãñõÃÑÕäëïöüÿÄËÏÖÜŸçÇßØøÅåÆæœÉ]*\s*(?:\.|\:|\'|\?|\(|\)|\.|\,|\;|\:)*/'; // la zone area
$ref="/^[0-9-a-zA-Z]*$/"; // la reference


/* ------------------ PARTI REDIRECTION ERREURS ----------------------- */

if(empty($reference)||(!preg_match($ref,$reference ))){   
    header("Location:produits_ajout.php?erreur=3"); // redirection 
    exit;    
}

if(empty($libelle)||(!preg_match($couleurlibel,$libelle ))){
    header("Location:produits_ajout.php?erreur=4"); // redirection 
    exit;    
}
if(empty($description)||(!preg_match($area,$description ))){
    header("Location:produits_ajout.php?erreur=5"); // redirection 
    exit;    
}
if(empty($prix)){
    header("Location:produits_ajout.php?erreur=6"); // redirection 
    exit;    
}
if(empty($Stock)){
    header("Location:produits_ajout.php?erreur=7"); // redirection 
    exit;  
}
if(empty($couleur)||(!preg_match($couleurlibel,$couleur ))){
    header("Location:produits_ajout.php?erreur=8");
    exit;    
} 

// Vérification de l'image
// On met les types autorisés dans un tableau (ici pour une image)
$aMimeTypes = array("image/gif", "image/jpeg", "image/jpg", "image/png");
 
// On ouvre l'extension FILE_INFO
$finfo = finfo_open(FILEINFO_MIME_TYPE);
 
// On extrait le type MIME du fichier via l'extension FILE_INFO 
$mimetype = finfo_file($finfo, $_FILES["insert"]["tmp_name"]);
 
// On ferme l'utilisation de FILE_INFO 
finfo_close($finfo);
 
if (in_array($mimetype, $aMimeTypes))
{
    /* Le type est parmi ceux autorisés, donc OK, on va pouvoir 
       déplacer et renommer le fichier */          
       $extension = substr(strrchr($_FILES["insert"]["name"], "."), 1);
       
} 
else 
{
   // Le type n'est pas autorisé, donc ERREUR
 
   echo "Type de fichier non autorisé";    
   exit;
}  


/* ---------------------- AJOUT ------------------------------- */

/*var_dump($ID,$categorie,$reference,$libelle,$description,$prix,$Stock,$couleur,$extension,$bloquer,$date,$modif);
exit;*/
$requete= 'INSERT INTO produits (pro_cat_id,pro_ref,pro_libelle,pro_description,pro_prix,pro_stock,pro_couleur,pro_photo,pro_d_ajout,pro_d_modif,pro_bloque) VALUES (?,?,?,?,?,?,?,?,?,?,?)';
$recup = $db->prepare($requete);

if ($recup->execute(array($categorie,$reference,$libelle,$description,$prix,$Stock,$couleur,$extension,$date,$modif,$bloquer)) == TRUE) {
    $ID = $db->lastInsertId();
} else {
    echo "L'ajout du produit a échoué";    
    exit;
}

/*----------------------- Parti image ------------------------ */



// Tout est OK, on va pouvoir renommer et déplacer l'image
/* Le type est parmi ceux autorisés, donc OK, on va pouvoir 
       déplacer et renommer le fichier */          
if (move_uploaded_file($_FILES["insert"]["tmp_name"], "assets/images/".$ID.".".$extension)) {
    // Tout est bon : on peut rediriger
    header('Location:tableau.php');
    exit;
} 
else 
{
    echo "Echec de l'ajout de la photo";    
    exit;
}
}


?>