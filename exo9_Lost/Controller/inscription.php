<?php
	extract($_POST);
	//récuper la connection a la bdd
	require('../Model/database/MySQL.php');
	//récupération des donnés du formulaire d'inscription a partir d'une fonction jQuery
	$nom = htmlspecialchars($nom);
	$prenom = htmlspecialchars($prenom);
	$pseudo = htmlspecialchars($pseudo);
	$mail = htmlspecialchars($mail);
	$num = ($num);
	
	//verification de la taille des Caractère
	$nomlength = strlen($nom);
	$prenomlength = strlen($prenom);
	$pseudolength = strlen($pseudo);//"strlen" est la pour verifier si la taille du pseudo et bon donc
	if(!empty($nom) AND !empty($prenom) AND !empty($pseudo) AND !empty($mail) AND !empty($num)) // si le pseudo est < ou = a 255 et 
	{
		if($pseudolength <= 255 && $prenomlength <= 255 && $nomlength <= 255) // si le pseudo est < ou = a 255 et 
		{
			$reqpseudo = $bdd->prepare("SELECT * FROM users WHERE Pseudo = ?");//préparation de le requête SQL
			$reqpseudo->execute(array($pseudo));//la fonction execute et evoyer dans la bdd
			$pseudoexist = $reqpseudo->rowCount();//rowCount sert a compter le mbr de colonne qui y a dans la bdd
			/* 
				le but de cette preparation est de verifié si le pseudo mise sur 
				le formulaire éxist déjà dans la base de donnée.
			*/
			if($pseudoexist == 0)
			{
				if(filter_var($mail, FILTER_VALIDATE_EMAIL))// verifi si le mail est vraiment un mail 
				{
					$reqmail = $bdd->prepare("SELECT * FROM users WHERE Mail = ?");//préparation de le requête SQL
					$reqmail->execute(array($mail));//la fonction execute et evoyer dans la bdd
					$mailexist = $reqmail->rowCount();//rowCount sert a compter le mbr de colonne qui y a dans la bdd
					/* 
						le but de cette preparation est de verifié si le mail mise sur 
						le formulaire éxist déjà dans la base de donnée.
					*/
					if($mailexist == 0)
					{
						$reqnum = $bdd->prepare("SELECT * FROM users WHERE Num = ?");//préparation de le requête SQL
						$reqnum->execute(array($num));//la fonction execute et evoyer dans la bdd
						$numexist = $reqnum->rowCount();//rowCount sert a compter le mbr de colonne qui y a dans la bdd
						/* 
							le but de cette preparation est de verifié si le numero mise sur 
							le formulaire éxist déjà dans la base de donnée.
						*/
						if($numexist == 0)//si le mdp de Confirmation et égal au mdp de base alors
						{
							$insertmbr = $bdd->prepare('INSERT INTO users(Nom, Prenom, Pseudo, Mail, Num) VALUES(?, ?, ?, ?, ?)');
							$insertmbr->execute(array($nom, $prenom, $pseudo, $mail, $num));//la fonction execute
							echo "ok";
						}else // sinon une erreur s'affiche
						{
								echo "Ce numéro existe déjà !";
						}
					}else // sinon une erreur s'affiche
					{
						echo "Adresses mail déjé utiliséé !";
					}
				}else // sinon une erreur s'affiche
				{
					echo "votre adresses mail n'est pas valide !";
				}
			}else
			{
				echo "pseudo déjà utiliser";
			}
		}else
		{
			echo "Caractère superieur 255";
		}
	}else
	{
		echo "Merci de saisir tout les champs";
	}
?>