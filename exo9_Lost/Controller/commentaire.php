<?php
	session_start();
	class Commentaire{
		private $_user;
        private $_pseudo;
		private $_photo;
		private $_annonce;
		private $_commentaire;

		public function __construct(){
		}
		/**
		 * Recuperer les valeurs du formulaire
		 * géré par la requête Ajax
		 * @see ajax.js
		 */
		public function recup_commentaire(){
			extract($_POST);
			$this->_user = $Id_user;
            $this->_pseudo = $Id_pseudo;
			$this->_photo = $Id_photo;
			$this->_annonce = $Id_annonce;
			$this->_commentaire = $commentaire;
		}
		/**
		 * récupération des information de formulaire par rapport a la methode recup_commentaire().
		 * puis récupération a la connection a la bdd avec require(); qui me permet d'introduire 
		 * mon fichier MySQL.
		 * @see MySQL.php
		 */
		public function envoie_commentaire(){
            $this->recup_commentaire();
            
            $user = $this->_user;
            $pseudo = $this->_pseudo;
			$photo = $this->_photo;
			$annonce = $this->_annonce;
			$commentaire = $this->_commentaire;

			require('../Model/database/MySQL.php');
			/**
			 * envoie des données avec la requête sql et la récupération des données du formulaire de commentaire.
			 * géré par la requête Ajax.
			 * @see ajax.js
			 * pour lancer cette requête on verifi si l'input commentaire n'est pas vide.
			*/
			if(!empty($commentaire)){
            	$insertmbr = $bdd->prepare('INSERT INTO commentaire(Id_annonce, Id_user, Id_commentaire, Id_photo, Id_pseudo) VALUES(?, ?, ?, ?, ?)');
				$insertmbr->execute(array($annonce, $user, $commentaire, $photo, $pseudo));//la fonction execute
			}
			/**
			 * affichage des données récupérer dans la bdd avec l'éxécution de la 
			 * requête précédente.
			*/
			$rep_commentaire = $bdd->prepare("SELECT * FROM `commentaire` WHERE `Id_annonce` = ?");
			$rep_commentaire ->execute(array($annonce));
			/* petite boucle pour récupérer et affichier toute les données de la table commentaire*/
			while($annonce_commentaire = $rep_commentaire->fetch()){
				if(!empty($annonce_commentaire['Id_photo'])){
				echo "
				<div id='mon_commentaire'>
					<img id='profil' src='Vue/Ressources/membres/". $annonce_commentaire['Id_photo'] ."' alt=''/>
					<h2 id='pseudo'>".$annonce_commentaire['Id_pseudo']."</h2>
					<h3 id='commentaire_pseudo'>".$annonce_commentaire['Id_commentaire']."</h3>
				</div>
			   ";}else{
				echo "
				<div id='mon_commentaire'>
					<img id='profil' src='Vue/Ressources/Icon/profil.png' alt=''/>
					<h2 id='pseudo'>".$annonce_commentaire['Id_pseudo']."</h2>
					<h3 id='commentaire_pseudo'>".$annonce_commentaire['Id_commentaire']."</h3>
				</div>
				";}
			}			
		}
	}
	$comment = new Commentaire;
	$comment->envoie_commentaire();
?>