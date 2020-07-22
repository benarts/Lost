<?php
require('Model/database/MySQL.php');
if(!empty($_SESSION['Id'])){
    $id = $_SESSION['Id'];
    /*
        le but de cette requête est de récupérer les donneées de l'utilisateur par rapport
        l'Id de la session crée.
    */
    $getid = intval($id);
    $requser = $bdd->prepare('SELECT * FROM users WHERE Id = ?');
    $requser->execute(array($getid));
    $userinfo = $requser->fetch();
}

/* le but de cette requête est de récupérer les donneées de toute les annonces. */
$rep_annonce = $bdd->query("SELECT * FROM `annonce` WHERE `Statut_user` = 'Disparu'");

$rep_annonce_trouver = $bdd->query("SELECT * FROM `annonce` WHERE `Statut_user` = 'Trouver'");

$rep_commentaire = $bdd->query("SELECT * FROM `commentaire`");
?>