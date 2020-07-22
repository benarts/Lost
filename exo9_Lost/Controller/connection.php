<?php
	session_start();
	class Connection{
		private $_mailconnect;
		private $_numconnect;

		public function __construct(){
		}
		/**
		 * Recuperer les valeurs du formulaire
		 * géré par la requête Ajax
		 * @see ajax.js
		 */
		public function recup_connection(){
			extract($_POST);
			$this->_mailconnect = $Mail;
			$this->_numconnect = $Num;
		}

		public function verif_connection(){
			$this->recup_connection();
			$mailconnect = $this->_mailconnect;
			$numconnect = $this->_numconnect;

			require('../Model/database/MySQL.php');
			$requser = $bdd->prepare("SELECT * FROM users WHERE Mail = ? AND NUM = ?");
			$requser->execute(array($mailconnect, $numconnect));//la fonction execute
			$userexist = $requser->rowCount();//rowCount sert a compter le mbr de colonne qui y a dans la bdd
		
			if($userexist == 1){
				$userinfo = $requser->fetch();
				$_SESSION['Id'] = $userinfo['Id'];
				$_SESSION['Pseudo'] = $userinfo['Pseudo'];
				$_SESSION['Mail'] = $userinfo['Mail'];
				echo 'ok';
			}else{
				echo 'Mot de passe ou mail incorrect!';
			}
		}
	}
	/*$BDD = new Bdd;
	$BDD->bdd();
	$BDD->connect_bdd();*/

	$connecte = new Connection;
	$connecte->verif_connection();
?>
