<?php
require('fonction.php');
$db = connexionbase();
session_start();

if (isset($_POST['envoie'])){

    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $log=$_SESSION['login'] =$_POST['log'];
    $ville = $_POST['ville'];
    $adresse = $_POST['Adresse'];
    $codepostal = $_POST['codepostal'];
    $pwd=$_SESSION['Password'] =$_POST['pswd'];
    $ctrl =$_POST['control'];

$logverif = "/^[^\W][a-zA-Z0-9_]+(\.[a-zA-Z0-9_]+)*\@[a-zA-Z0-9_]+(\.[a-zA-Z0-9_]+)*\.[a-zA-Z]{2,4}$/";// vérifie mail
$pswverif ='/^(?=.{12,20}$)(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*\W).*$/'; // mot de passe prend en compte que s'il y a Au moins une maj, carac spécial,minuscule et un chiffre
$nomprenomverif ="/[a-zA-Z]+(?:(?:\-| |\')?[a-zA-Z]+)/"; // vérifaction du nom caractères accepter '-',' '," ' ".
$villeverif ="/[a-zA-ZàèìòùÀÈÌÒÙáéíóúýÁÉÍÓÚÝâêîôûÂÊÎÔÛãñõÃÑÕäëïöüÿÄËÏÖÜŸçÇßØøÅåÆæœÉ]*\s*(?:\'|\-|\/)*/";// vérifie la ville
$adresseverif = "/^[0-9]{1,4}+(\ [a-z-A-Z]+)*(?:\-|\')*(\ [a-zA-Z0-9]+)*$/"; // vérifie une adresse
$codepostalverif ="/^(([0-8][0-9])|(9[0-5])|(2[ab]))[0-9]{3}$/"; // vérifie le code postal

if(empty($log)||(!preg_match($logverif,$log ))){   
    header("Location:inscription.php?erreur=1"); // redirection 
    exit;    
}
if(empty($pwd)||(!preg_match($pswverif,$pwd ))){   
    header("Location:inscription.php?erreur=2"); // redirection 
    exit;    
}
if($ctrl != $pwd){   
    header("Location:inscription.php?erreur=3"); // redirection 
    exit;
}
if(empty($nom)||(!preg_match($nomprenomverif,$nom ))){   
    header("Location:inscription.php?erreur=4"); // redirection 
    exit;    
}
if(empty($prenom)||(!preg_match($nomprenomverif,$prenom ))){   
    header("Location:inscription.php?erreur=5"); // redirection 
    exit;    
}
if(empty($ville)||(!preg_match($villeverif,$ville ))){   
    header("Location:inscription.php?erreur=6"); // redirection 
    exit;    
}
if(empty($adresse)||(!preg_match($adresseverif,$adresse ))){   
    header("Location:inscription.php?erreur=7"); // redirection 
    exit;    
}
if(empty($codepostal)||(!preg_match($codepostalverif,$codepostal ))){   
    header("Location:inscription.php?erreur=8"); // redirection 
    exit;    
}
    $password_hash = password_hash($pwd, PASSWORD_DEFAULT);

    $requete ='INSERT INTO clients (Cli_nom,Cli_prenom,Cli_mail,Cli_ville,Cli_adresse,Cli_cpostal,Cli_mdp) VALUES (:Cli_nom,:Cli_prenom,:Cli_mail,:Cli_ville,:Cli_adresse,:Cli_cpostal,:Cli_mdp)';
    $resltt = $db->prepare($requete);

    $resltt->bindValue(":Cli_nom",$nom, PDO::PARAM_STR);
    $resltt->bindValue(":Cli_prenom",$prenom, PDO::PARAM_STR);
    $resltt->bindValue(":Cli_mail",$log, PDO::PARAM_STR);
    $resltt->bindValue(":Cli_ville",$ville, PDO::PARAM_STR);
    $resltt->bindValue(":Cli_adresse",$adresse, PDO::PARAM_STR);
    $resltt->bindValue(":Cli_cpostal",$codepostal, PDO::PARAM_INT);
    $resltt->bindValue(":Cli_mdp",$password_hash , PDO::PARAM_STR);
    $ajouts = $resltt->execute();
    header("Location:sessionlgin.php");
    exit;
}

?>