<?php
	session_start();
    $_SESSION["login"] = array();
    $_SESSION["statut"] = array();
     
    unset($_SESSION["login"]);
    unset($_SESSION["statut"]);
     
    if (ini_get("session.use_cookies")) 
    {
        setcookie(session_name(), '', time()-42000);
    }
     
    if(session_destroy()){

    header("Location:sessionlgin.php");
    }
    else
    {
        echo"erreur";
    }
?>