<?php
	extract($_POST);
	//récuper la connection a la bdd
	require('../Model/database/MySQL.php');
	//récupération des donnés du formulaire d'inscription a partir d'une fonction jQuery
	$image = ($image_name);
	$encode = ($file_encode);

	$disparu = htmlspecialchars($disparu);
	$choix = htmlspecialchars($choix);
	$nom = htmlspecialchars($nom);
	$date = htmlspecialchars($dates);
	$lieu = htmlspecialchars($lieu);
	$messageCom = htmlspecialchars($messageCom);

	$pseudo = htmlspecialchars($id_pseudo);
	
	if(!empty($disparu) AND !empty($choix) AND !empty($nom) AND !empty($image) AND !empty($encode) AND !empty($date) AND !empty($messageCom)){
		//verification de la taille des Caractère
		$nomlength = strlen($nom);//"strlen" est la pour verifier si la taille du prenom et bon donc
		if($nomlength <= 255) // si le nom est < ou = a 255 et 
		{
			$requser = $bdd->prepare("SELECT * FROM users WHERE Pseudo = ?");
			$requser->execute(array($pseudo));//la fonction execute
			$userexist = $requser->rowCount();//rowCount sert a compter le mbr de colonne qui y a dans la bdd

			if($userexist == 1){
				$upload_filepath = "../Vue/Ressources/image_annonce/$image";
			
				file_put_contents($upload_filepath, base64_decode($encode));

				$insertmbr = $bdd->prepare("INSERT INTO `annonce`(`Image`, `Nom`, `Dates`, `Lieu`, `Detail`, `Id_pseudo`, `Statut_user`, `Statut_disparu`) VALUES (?,?,?,?,?,?,?,?)");
				$insertmbr->execute(array($image, $nom, $date, $lieu, $messageCom, $pseudo, $choix, $disparu));//la fonction execute
				echo "ok";
			}else{
				echo "connecté vous";
			}	
		}else{
			echo "Caractère superieur 255";
		}
	}else{
		echo "Veuilliez compléter tout les champs";
	}
?>