
<?php

if ($_POST){

    

$_n = $_POST['nom'];
$_p = $_POST['prenom'];
$_e = $_POST['ddn'];
$_cp = $_POST['cpostal'];
$_ad  = $_POST['adresse'];
$_v = $_POST['ville'];
$_m = $_POST['email'];
$_a = $_POST['question'];
   

//$_ carac1 = new RegExp (/^.+[a-zA-Z-0-9]+$/); // s"il y a un caractère seul pas pris en compte sinon prend en compte également 0 a 9 et les maj
$_carac2 ="/[a-zA-Z]+(?:(?:\-| |\')?[a-zA-Z]+)/";
$_carac3 = "/[0-9]{2}(?:(\/|-))[0-9]{2}(?:(\/|-))[0-9]{4}|[0-9]{4}(?:(\/|-))[0-9]{2}(?:(\/|-))[0-9]{2}/";// date de naissance
$_blockCp = "/^(([0-8][0-9])|(9[0-5])|(2[ab]))[0-9]{3}$/"; // on prendra 5 nombres entier 
$_adr = "/[0-9a-zA-ZàèìòùÀÈÌÒÙáéíóúýÁÉÍÓÚÝâêîôûÂÊÎÔÛãñõÃÑÕäëïöüÿÄËÏÖÜŸçÇßØøÅåÆæœÉ]+(?:(?:\'| |\-|\/)?[a-zA-ZàèìòùÀÈÌÒÙáéíóúýÁÉÍÓÚÝâêîôûÂÊÎÔÛãñõÃÑÕäëïöüÿÄËÏÖÜŸçÇßØøÅåÆæœÉ]+)*$/";// pour une adresse
$_carac4 ="/[a-zA-ZàèìòùÀÈÌÒÙáéíóúýÁÉÍÓÚÝâêîôûÂÊÎÔÛãñõÃÑÕäëïöüÿÄËÏÖÜŸçÇßØøÅåÆæœÉ]*\s*(?:\'|\-|\/)*/"; // ville
$_admail = "/^[^\W][a-zA-Z0-9_]+(\.[a-zA-Z0-9_]+)*\@[a-zA-Z0-9_]+(\.[a-zA-Z0-9_]+)*\.[a-zA-Z]{2,4}$/"; // prend en compte maj et caractère avant @ puis reprend des lettres met un "." avant de spécifier qu"après se point il y est 2 ou 3 lettres
$_area = "/[0-9a-zA-ZàèìòùÀÈÌÒÙáéíóúýÁÉÍÓÚÝâêîôûÂÊÎÔÛãñõÃÑÕäëïöüÿÄËÏÖÜŸçÇßØøÅåÆæœÉ]*\s*(?:\.|\:|\'|\?|\(|\)|\.|\,|\;|\:)*/";


 if(empty($_n)||(!preg_match($_carac2,$_n ))){
   
    header("Location:formulaire.php?erreur=1"); // redirection 
    exit;

             

}

 if(empty($_p)||(!preg_match($_carac2,$_p))){

    header("Location:formulaire.php?erreur=2"); // redirection 
    exit;
     
}

 if(empty($_e)||(!preg_match($_carac3,$_e))){   

    header("Location:formulaire.php?erreur=3"); // redirection 
    exit;

     
}

 if(empty($_cp)||(!preg_match($_blockCp,$_cp))){

    header("Location:formulaire.php?erreur=4"); // redirection 
    exit;
    
    
}

 if(empty($_ad)||(!preg_match($_adr,$_ad))){

    header("Location:formulaire.php?erreur=5"); // redirection 
    exit;
         
    
}

 if(empty($_v)||(!preg_match($_carac4,$_v))){

    header("Location:formulaire.php?erreur=6"); // redirection 
    exit;
    
    
}

 if(empty($_m)||(!preg_match($_admail,$_m))){

    header("Location:formulaire.php?erreur=7"); // redirection 
    exit;

    
}
 
if (!isset($_POST['choix'])) 
{
     echo" Vous devez sélectionnez un motif<br>";
     
}  

 if(!empty($_a)||(!preg_match($_area,$_a))){

    echo "Caractère autorisé : '|espace|-|?|()|.|,|;|' <br>";    
          

}

if (!isset($_POST['checkbox'])){

    header("Location:formulaire.php?erreur=8"); // redirection 
    exit;
    
}

echo "- nom <br>".$_n."- prenom <br>".$_p."- date de naissance <br>".$_e."- Code postal <br>".$_cp."- Adresse <br>".$_ad."- Ville <br>".$_v."- mail <br>".$_m."- Texte <br>".$_a."- Sujets <br>";

if (isset($_POST['choix'])) 
{
    foreach($_POST['choix'] as $choix){
       echo $choix."<br>"; 
    }
}


}

?>