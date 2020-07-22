<?php
    require('../Model/database/MySQL.php');
    extract($_POST);
	if(isset($effacer) AND !empty($effacer)){
		$supprime = $effacer;
		$req = $bdd->prepare('DELETE FROM annonce WHERE Id = ?');
		$req->execute(array($supprime));
	}
    if(!empty($Id_annonce)){
        /*
            le but de cette requête est de récupérer les donneées de l'annonce par rapport
            l'Id de l'annonce récupérer par le jquery et envoyer avec la méthode post.
        */
        $post_id = intval($Id_annonce);
        $requser_annonce = $bdd->prepare('SELECT * FROM annonce WHERE Id = ?');
        $requser_annonce->execute(array($post_id));
        $annonce_info = $requser_annonce->fetch();
        if($annonce_info['Id'] == $Id_annonce){
            echo "         
            <img class='disparu_annonce' src='Vue/Ressources/image_annonce/". $annonce_info['Image'] ."'/>
			<div id='donner' align='center'>
				<div id='donner_general'>
					<img class='disparu_annonce1' src='Vue/Ressources/image_annonce/". $annonce_info['Image'] ."'/>
					<h1 class='nom_annonce'>".$annonce_info['Nom']."</h1>
					<h3 class='poste_annonce'>".$annonce_info['Statut_disparu']."</h3>
					<table class='descrip_annonce'>
						<tr>
							<td id='block1'>
								<h3 class='titres_annonce'>Date de la disparition:</h3>
								<p class='info_annonce'>". $annonce_info['Dates'] ."</p>
							</td>
							<td id='block1'>
								<h3 class='titres_annonce'>Lieu de la disparition:</h3>
								<p class='info_annonce'>". $annonce_info['Lieu'] ."</p>
							</td>
						</tr>
					</table>
					<div class='detail_annonce'>
						<h3 class='titres_detail'>Detail:</h3>
						<p class='info_detail'>". $annonce_info['Detail'] ."</p>
					</div>
					<button class='contacter' onclick='contacter();'>Contacter</button>
				</div>
			</div>           
            ";
        }
    }
    if(!empty($Id_annonce_commentaire)){
        /*
            le but de cette requête est de récupérer les donneées de l'annonce par rapport
            l'Id de l'annonce récupérer par le jquery et envoyer avec la méthode post.
        */
        $post_id_commentaire = intval($Id_annonce_commentaire);
        $rep_commentaire = $bdd->prepare('SELECT * FROM commentaire WHERE Id_annonce = ?');
        $rep_commentaire->execute(array($post_id_commentaire));
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
?>