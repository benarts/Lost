<?php
require('../../Model/database/MySQL.php');
extract($_POST);
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
$rep_annonceID = $bdd->query("SELECT * FROM `annonce` WHERE `Id_pseudo` = '".$_SESSION['Pseudo']."'");

if(isset($_SESSION['Id'])) {
	
   $requser = $bdd->prepare("SELECT * FROM users WHERE Id = ?");
   $requser->execute(array($_SESSION['Id']));
   $user = $requser->fetch();
   
   //avoir la possibilité de modifier son prénom
   if(isset($_POST['newprenom']) AND !empty($_POST['newprenom']) AND $_POST['newprenom'] != $user['Prenom']) {
      $newprenom = htmlspecialchars($_POST['newprenom']);
      $insertprenom = $bdd->prepare("UPDATE users SET Prenom = ? WHERE Id = ?");
      $insertprenom->execute(array($newprenom, $_SESSION['Id']));
      header('Location: profil.php');
   }
   
   //avoir la possibilité de modifier son nom
   if(isset($_POST['newnom']) AND !empty($_POST['newnom']) AND $_POST['newnom'] != $user['Nom']) {
      $newnom = htmlspecialchars($_POST['newnom']);
      $insertnom = $bdd->prepare("UPDATE users SET Nom = ? WHERE Id = ?");
      $insertnom->execute(array($newnom, $_SESSION['Id']));
      header('Location: profil.php');
   }
   
   //avoir la possibilité de modifier son pseudo
   if(isset($_POST['newpseudo']) AND !empty($_POST['newpseudo']) AND $_POST['newpseudo'] != $user['Pseudo']) {
		$reqpseudo = $bdd->prepare("SELECT * FROM users WHERE Pseudo = ?");
		$reqpseudo->execute(array($_POST['newpseudo']));//la fonction execute
		$pseudoexist = $reqpseudo->rowCount();//rowCount sert a compter le mbr de colonne qui y a dans la bdd
		if($pseudoexist == 0)
		{
			$newpseudo = htmlspecialchars($_POST['newpseudo']);
			$insertpseudo = $bdd->prepare("UPDATE users SET Pseudo = ? WHERE Id = ?");
			$insertpseudo->execute(array($newpseudo, $_SESSION['Id']));
			header('Location: profil.php');
		}else{
			$error = "pseudo déjà utiliser !";
		}
   }
   
   //avoir la possibilité de modifier son mail
   if(isset($_POST['newmail']) AND !empty($_POST['newmail']) AND $_POST['newmail'] != $user['Mail']) {
		if(filter_var($_POST['newmail'], FILTER_VALIDATE_EMAIL))// verifi si le mail est vraiment un mail et  
		{
			$reqmail = $bdd->prepare("SELECT * FROM users WHERE Mail = ?");
			$reqmail->execute(array($_POST['newmail']));//la fonction execute
			$mailexist = $reqmail->rowCount();//rowCount sert a compter le mbr de colonne qui y a dans la bdd
			if($mailexist == 0)
			{
				$newmail = htmlspecialchars($_POST['newmail']);
				$insertmail = $bdd->prepare("UPDATE users SET Mail = ? WHERE Id = ?");
				$insertmail->execute(array($newmail, $_SESSION['Id']));
				header('Location: profil.php');
			}else{
			$error = "Adresses mail déjé utiliséé  !";
			}
		}else{
			$error = "vos adresses mail n'est pas valide !";
		}
   }
   
   //avoir la possibilité de modifier son mdp
   if(isset($_POST['newnum']) AND !empty($_POST['newnum'])) {
		$Num = $_POST['newnum'];
		$insertmdp = $bdd->prepare("UPDATE users SET Num = ? WHERE Id = ?");
        $insertmdp->execute(array($Num, $_SESSION['Id']));
        header('Location: profil.php');
	}
	
	//ajout d'une photo de profil
	if(isset($_FILES['avatar']) AND !empty($_FILES['avatar']['name'])) {
	   $tailleMax = 2097152;
	   $extensionsValides = array('jpg', 'jpeg', 'gif', 'png');
	   if($_FILES['avatar']['size'] <= $tailleMax) {
		  $extensionUpload = strtolower(substr(strrchr($_FILES['avatar']['name'], '.'), 1));
		  if(in_array($extensionUpload, $extensionsValides)) {
			 $chemin = "../Ressources/membres/".$_SESSION['Id'].".".$extensionUpload;
			 $resultat = move_uploaded_file($_FILES['avatar']['tmp_name'], $chemin);
			 if($resultat) {
				$updateavatar = $bdd->prepare('UPDATE users SET Photo = :Photo WHERE Id = :Id');
				$updateavatar->execute(array(
				   'Photo' => $_SESSION['Id'].".".$extensionUpload,
				   'Id' => $_SESSION['Id']
				));
				header('Location: profil.php');
			 } else {
				$error = "Erreur durant l'importation de votre photo de profil";
			 }
		  } else {
			 $error = "Votre photo n'est pas en format jpg, jpeg, gif ou png";
		  }
	   } else {
		  $error = "Votre photo de profil ne doit pas dépasser 2Mo";
	   }
	}
}
else {
	header('Location:.php');
 }
?>