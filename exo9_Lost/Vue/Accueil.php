<?php
	session_start();
	include "Controller/requete.php";
?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>Lost and FOUND</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="Vue/Css/jquery.mCustomScrollbar.min.css" rel="stylesheet" type="text/css"/>        
        <link href="Vue/Css/special/police.css" rel="stylesheet" type="text/css"/>
        <link href="Vue/Css/acceuil.css" rel="stylesheet" type="text/css"/>
        <link href="Vue/Css/formulaire_annonce.css" rel="stylesheet" type="text/css"/>
        <link href="Vue/Css/formulaire_login.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <nav id="navbar">
            <div id="nom_du_site">
                <span id="lost">Lost</span>
                <span id="and">and</span>
                <span id="found">FOUND</span>
            </div>
            <div class="menu0" align="right">
                <ul class="menu1">
					<?php 
						if(!empty($_SESSION['Id']))
						{
					?>
						<li class="menu1"><A HREF="Controller/deconnexion.php" id="color"><p>DECO</p></A></li>
						<li class="menu1"><A HREF="Vue/Html/profil.php"><p><?php echo $userinfo['Nom'] .'&nbsp;&nbsp;'. $userinfo['Prenom']?></p></A></li>
					<?php
						}else{
					?>
						<li class="menu1"><A HREF="#2" onclick="connecter_off()"><p>LOGIN</p></A></li>
					<?php
						}
					?>
                    <li class="menu1"><A HREF="#2" onclick="avis_off()"><p>AVIS DE RECHERCHE</p></A></li>
                </ul>
            </div>
        </nav>
        <main>
            <!-- -->
            <div id="login" align="center">
                <p id="fermer" onclick="connecter_on()">X</p>
                <div id="block_form">
                    <div id="connecter">
                        <br/><br/>
                        <div id="connecter2" align="center">
                            <h2 class="titre2" align="center">CONNEXION</h2>
                            <form class="formu1" action="" method="post">
                                <table>
                                    <tr>
                                        <td>
                                            <label class="texteC1"for='Email' >Email </label><br/>
                                            <input class="texteC" type='text' placeholder="VOTRE EMAIL" name='Mail' id='nom' maxlength="50" required />
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <label class="texteC1"for='Mdp' >Numéro de téléphone</label><br/>
                                            <input class="texteC" type='text' placeholder="NUMERO DE TELEPHONE" name='Num' value="" required />
                                        </td>
                                    </tr>
                                </table>
                                <br/>
                                <div class="error2"></div>				
                                <input class="login" type="submit" name="connexion" value="Se connecter"/><br/>
                            </form>
                        </div>
                    </div>
                    <div id="inscription">
                        <br/><br/>
                        <div id="inscription2" align="center">
                            <h2 class="titre2" align="center">INFORMATION</h2>
                            <form class="formu" action='' name="main" method='post'>
                                <table>
                                    <tr>
                                        <td>
                                            <label class="texteC1"for='Nom' >Nom</label><br/>
                                            <input class="texteC" type='text' placeholder="VOTRE NOM" name='nom' id='nom' maxlength="50"/>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <label class="texteC1"for='Prenom' >Prénom</label><br/>
                                            <input class="texteC"type='text' placeholder="VOTRE PRENOM" name='prenom' id='prenom' maxlength="50"/>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <label class="texteC1"for='Pseudo' >Pseudo</label><br/>
                                            <input class="texteC"type='text' placeholder="VOTRE PSEUDO" name='pseudo' id='pseudo2' maxlength="50"/>						
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <label class="texteC1"for='Email' >Email</label><br/>
                                            <input class="texteC"type='text' placeholder="VOTRE PSEUDO" name='mail' id='mail' maxlength="50"/>						
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <label class="texteC1"for='Mdp' >Numéro de téléphone</label><br/>
                                            <input class="texteC" type='text' placeholder="NUMERO DE TELEPHONE" name='num' id='num' maxlength="50"/>
                                        </td>
                                    </tr>
                                </table>
                                <br/>
                                <div class="error"></div>
                                <div class="valide"></div>									
                                <input class="login" type="submit" name="inscrip" id='inscrist' value="Inscrivez-vous"/><br/>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div id="nom_du_site2">
                <span id="lost2">Lost</span>
                <span id="and2">and</span>
                <span id="found2">FOUND</span>
            </div>
            <section id="section_annonce_trouver">
			<?php while($annonce_trouver = $rep_annonce_trouver->fetch()){ ?>
                <div class="annonce" id="<?php echo $annonce_trouver['Id'] ?>" align="right">
                    <div id="block_image">
                    </div>
                    <div id="descrip_annonce">
                        <h2 class="detail">Nom:</h2>
                        <p class="text"><?php echo $annonce_trouver['Nom'] ?></p>
                        <h2 class="detail">Disparu le:</h2>
                        <p class="text"><?php echo $annonce_trouver['Dates'] ?></p>
                        <h2 class="detail">Leu de disparition:</h2>
                        <p class="text"><?php echo $annonce_trouver['Lieu'] ?></p>
                        <h2 class="detail">statut:</h2>
                        <p class="text"><?php echo $annonce_trouver['Statut_disparu'] ?></p>
                    </div>
                    <div id="detaill_descrip">
                        <h2 class="detail">Detail</h2>
                        <p class="detail_text"><?php echo $annonce_trouver['Detail'] ?></p>
                    </div>
                    <img id="photo_rechercher" src="Vue/Ressources/image_annonce/<?php echo $annonce_trouver['Image'] ?>" alt=""/>
                </div>
			<?php } ?>
            </section>
			<section id="section_annonce">
			<?php while($annonce = $rep_annonce->fetch()){ ?>
                <div class="annonce" id="<?php echo $annonce['Id'] ?>" align="right">
                    <div id="block_image">
                    </div>
                    <div id="descrip_annonce">
                        <h2 class="detail">Nom:</h2>
                        <p class="text"><?php echo $annonce['Nom'] ?></p>
                        <h2 class="detail">Disparu le:</h2>
                        <p class="text"><?php echo $annonce['Dates'] ?></p>
                        <h2 class="detail">Leu de disparition:</h2>
                        <p class="text"><?php echo $annonce['Lieu'] ?></p>
                        <h2 class="detail">statut:</h2>
                        <p class="text"><?php echo $annonce['Statut_disparu'] ?></p>
                    </div>
                    <div id="detaill_descrip">
                        <h2 class="detail">Detail</h2>
                        <p class="detail_text"><?php echo $annonce['Detail'] ?></p>
                    </div>
                    <img id="photo_rechercher" src="Vue/Ressources/image_annonce/<?php echo $annonce['Image'] ?>" alt=""/>
                </div>
			<?php } ?>
            </section>
            <section id="section_recherche">
				<ul class="changer">
                    <li class="changer"><A HREF="#1" id="color" onclick="disparu()" ><p>DISPARUE</p></A></li>
                    <li class="changer"><A HREF="#1" id="color" onclick="trouver()" ><p>TROUVER</p></A></li>
                </ul>
                <p class="block_inutil">AVIS DE RECHERCHE</p>
                <div id="avis_de_recherch">
                    <br/><br/>
                    <div id="recherche" align="center">
                        <h2 class="titre1" id="pers" align="center">PERSONNE DISPARUE</h2>
                        <h2 class="titre1" id="obj" align="center">OBJET DISPARUE</h2>
                        <h2 class="titre1" id="ani" align="center">ANIMAL DISPARUE</h2>

                        <form id="personne" class="formu_annonce" action="" method="post">
                            <ul class="choi">
                                <li class="choi"><A HREF="#1" id="color" onclick="animal()" ><p>animal</p></A></li>
                                <li class="choi"><A HREF="#1" id="color" onclick="personne()" ><p>personne</p></A></li>
                                <li class="choi"><A HREF="#1" id="color" onclick="objet()" ><p>objet</p></A></li>
                            </ul>
                            <input type="hidden" name="statut_rep" id="statut_rep" value="" />
                            <div class="choix">
                                <p class="radio"><input class="check" type="radio" name="gender" value="Disparu" checked> Disparu</p>
                                <p class="radio"><input class="check" type="radio" name="gender" value="Trouver"> Trouver</p>
                            </div>
                            <div class="ajout_photo">
                                <div id="block_photo"></div>
                                <input id ="file" class="avatar" type="file" name="Savatar"/>
                            </div>

                            <table class="form_table">

                                <tr>
                                    <td>
                                        <label class="texteD" id="texte_entete" for='Nom' >Nom</label><br/>
                                        <input class="texteCD sup" type='text' placeholder="SON NOM" name='nom' id='sup' maxlength="50"  />
                                    </td>
                                </tr>
                                <tr class="LD">
                                    <td>
                                        <label class="texteD" id="texte_entete" for='date' >Date de dispariton</label><br/>
                                        <input class="texteLCD sup" type='text' placeholder="DATE" name='date' id='sup' value="" />
                                    </td>
                                </tr>
                                <tr class="LD">
                                    <td>
                                        <label class="texteD" id="texte_entete" for='date' >Lieu de dispariton</label><br/>
                                        <input class="texteLCD sup" type='text' placeholder="LIEU" name='lieu' id='sup' value="" />
                                    </td>
                                </tr>

                                <tr>
                                    <td>
                                        <label class="texteD" id="texte_entete" for='Mdp' >Détails</label><br/>
                                        <textarea id="texteCD" class="sup" maxlength="4000" name="messageCom" placeholder="Saisir les details..." ></textarea>
                                    </td>
                                </tr>
                            </table>

                            <br/>
                            <div class="error1"></div>
                            <input class="texteCD" type="hidden" name='pseudo' value="<?php if(!empty($_SESSION['Id'])){ ?><?php echo $userinfo['Pseudo'] ?><?php } ?>"/>
                            <input class="descript" type="submit" name="annonce" value="Valider"/><br/>
                        </form>

                    </div>
                </div>
                <div id="nom_du_site1">
                    <p id="lost1">Lost</p>
                    <p id="and1">and</p>
                    <p id="found1">FOUND</p>
                    <button id="bouton_avis" onclick="avis_off()">AVIS DE RECHERCHE</button>
                </div>
            </section>
			<button id="button_detail" onclick="detail()">+detail</button>
            <section id="section_photo">
                <div id="forme1"></div>
                <div id="forme2"></div>
                <div id="forme3"></div>
                <div id="forme4"></div>
                <div id="forme5"></div>
                <div id="forme6"></div>
                <div id="forme7"></div>
                <div id="forme8"></div>
                <div id="forme9"></div>
                <div id="forme10"></div>
                <div id="forme11"></div>
                <div id="forme12"></div>
                <div id="forme13"></div>
            </section>
            <section id="section_commentaire">
                <div id="detail_personne">
                    <h1 id="info">Soit le premier a commenter</h1>
                </div>
                <div id="commentaire">
					<div class="text_commentaire">
					</div>
                </div>
				<?php 
					if(!empty($_SESSION['Id']))
						{
				?>
					<form class="formulaire_com" id="formulaire_commentaire" method="POST" action="" enctype="multipart/form-data">
					<?php 
						if(!empty($userinfo['Photo']))
						{
					?>
						<img id="profil1" src="Vue/Ressources/membres/<?php echo $userinfo['Photo']?>" width="150"/>
					<?php 
						}else{
					?>
						<img id="profil1" src="Vue/Ressources/Icon/profil.png" width="150"/>
					<?php 
						}
					?>
						<input name="id_user" type="hidden" value="<?php echo $userinfo['Id']?>">
						<input name="id_annonce" class="id_annonce" type="hidden" value="PERSONNE DISPARUE">
						<input name="id_photo" type="hidden" value="<?php echo $userinfo['Photo']?>">
						<input name="id_pseudo" type="hidden" value="<?php echo $userinfo['Pseudo']?>">
						
						<input type="text" class="text_user" id="message" name="commentaire" placeholder="Commentaire..." value="" >
						<button class="button_user" id="valide">&#x27A4;</button>
					</form>
				<?php
					}
				?>
            </section>
        </main>
        <footer></footer>
        <script src="Vue/Js/jquery-3.3.1.js" type="text/javascript"></script>
        <script src="Vue/Js/jquery.mCustomScrollbar.concat.min.js" type="text/javascript"></script>
		<script src="Vue/Js/ajax.js" ></script>
        <script src="Vue/Js/js.js" type="text/javascript"></script>
		<script src="Vue/Js/annonce.js" type="text/javascript"></script>
		<script src="Vue/Js/annonce_form.js" type="text/javascript"></script>
		<?php
			$reqpseudo = $bdd->query("SELECT * FROM `annonce`");
			$pseudoexist = $reqpseudo->rowCount();//rowCount sert a compter le mbr de colonne qui y a dans la bdd
			if($pseudoexist != 0)
			{
				echo'<script>
					document.getElementById("nom_du_site2").style.display = "none";
				</script>';
			}
		?>
    </body>
</html>
