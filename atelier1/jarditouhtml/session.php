<?php 
session_start();
require('fonction.php');
$db = connexionbase();
 
/*$_SESSION["login"] = "Gus";
$_SESSION["role"] = "admin";
$password_hash = password_hash("vac23!VAC2*3", PASSWORD_DEFAULT);
/*echo $password_hash;
session_name(); 

echo"- session ID : ".session_id();
echo $_SESSION["login"];

if($password_hash='vac23!VAC2*3' && $_SESSION['login'] = "Gus"){
    echo "vous etes connecté";
}
else
{
    echo "erreur log";
}
*/
if ($_POST)
{

$log =$_POST['login'];
$pwd =$_POST['pwd'];

$logverif = "/^[^\W][a-zA-Z0-9_]+(\.[a-zA-Z0-9_]+)*\@[a-zA-Z0-9_]+(\.[a-zA-Z0-9_]+)*\.[a-zA-Z]{2,4}$/"; // vérification de l'identifiant saisie
$pswverif ="/^(?=.{12,20}$)(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*\W).*$/"; // mot de passe prend en compte que s'il y a Au moins une maj, carac spécial,minuscule et un chiffre

/*if(empty($log)||(!preg_match($logverif,$log ))){  
    header("Location:sessionlgin.php?erreur=1"); // redirection 
    exit;    
}*/if(empty($pwd)||(!preg_match($pswverif,$pwd ))){   
    header("Location:sessionlgin.php?erreur=2"); // redirection 
    exit;
   
}else{
    $requete = "SELECT Cli_id,Cli_mdp,Cli_log FROM clients WHERE Cli_mail=:Cli_mail";
    $res = $db->prepare($requete);
    $res->bindValue(":Cli_mail",$log, PDO::PARAM_STR);
    $verif = $res->execute();
    $verif = $res->fetchObject();
     if(!$verif){
        header("Location:sessionlgin.php");
        exit;
    }else if(password_verify($pwd, $verif->Cli_mdp))
    {
    
        if ($verif->Cli_log == "Admin") 
        {
            $_SESSION['statut']= 'Admin';
        } 
        else 
        {
            $_SESSION['statut'] = 'Client1';
        }
    



    ?>
    <div class="col-12">
      <div class="row">
        <div class=" container col-6"><br>
          <div class="col-12">
            <h1> Vous êtes bien connecté !</h1>
            <p class="text-center text-dark"> Bienvenue sur Jarditou dans votre espace Client</p>
          </div>
        </div>
      </div>
    </div>
    <?php
    header("Refresh:3,index.php");
    exit;

}
}
}
?>