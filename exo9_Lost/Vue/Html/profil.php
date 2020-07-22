<?php
session_start();
include "../../Controller/editionprofil.php";
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
        <link href="../Css/profil.css" rel="stylesheet" type="text/css"/>
        <link href="../Css/special/police.css" rel="stylesheet" type="text/css"/>
        <link href="../Css/jquery.mCustomScrollbar.min.css" rel="stylesheet" type="text/css"/>
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
                    <li class="menu1"><A HREF="#2" onclick="list();"><p>MES ANNONCES</p></A></li>
                    <li class="menu1"><A HREF="../../index.php"><p>AVIS DE RECHERCHE</p></A></li>
                </ul>
            </div>
        </nav>
        <main>
            <div id="section_profil" align="center">
                <div id="photo">
					<?php 
						if(!empty($userinfo['Photo']))
						{
					?>
						<img id="photo1" src="../Ressources/membres/<?php echo $userinfo['Photo']?>" width="150"/>
					<?php 
						}else{
					?>
						<img id="photo1" src="../Ressources/Icon/profil.png" width="150"/>
					<?php 
						}
					?>
                    <div class="block_np">
                        <p id="nom_prenom"><?php echo $userinfo['Nom'] .'&nbsp;&nbsp;'. $userinfo['Prenom']?></p>
                    </div>
                </div>

                <div id="modif_profil">
                    <div id="modif">
                        <br/><br/>
                        <div id="modif2" align="center">
                            <h2 class="titre2" align="center">INFORMATION</h2>
                            <form class="formu" action='' enctype="multipart/form-data" method='post'>
                                <table>
                                    <tr>
                                        <td>
                                            <label class="texteC1"for='Nom' >Nom</label><br/>
                                            <input class="texteC" type='text' placeholder="VOTRE NOM" name='newnom' value="<?php echo $userinfo['Nom'] ?>" id='nom' maxlength="50"/>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <label class="texteC1"for='Prenom' >Prénom</label><br/>
                                            <input class="texteC"type='text' placeholder="VOTRE PRENOM" name='newprenom' value="<?php echo $userinfo['Prenom'] ?>" id='prenom' maxlength="50"/>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <label class="texteC1"for='Pseudo' >Pseudo</label><br/>
                                            <input class="texteC"type='text' placeholder="VOTRE PSEUDO" name='newpseudo' value="<?php echo $userinfo['Pseudo'] ?>"id='pseudo2' maxlength="50"/>						
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <label class="texteC1"for='Email' >Email</label><br/>
                                            <input class="texteC"type='text' placeholder="VOTRE PSEUDO" name='newmail' value="<?php echo $userinfo['Mail'] ?>" id='mail' maxlength="50"/>						
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
											<label class="texteC1"for='Mdp' >Numéro de téléphone</label><br/>
                                            <input class="texteC" type='text' placeholder="NUMERO DE TELEPHONE" name='newnum' value="<?php echo $userinfo['Num'] ?>" id='num' maxlength="50"/>
                                        </td>
                                    </tr>
									<tr>
                                        <td>
											<label class="texteC1"for='Mdp' >Ajouter une photo</label><br/>
											<input class="texteC" type="file" name="avatar"/>
                                        </td>
                                    </tr>
                                </table>
                                <br/>
								<?php
									if(isset($error))
									{
										echo '<div class="error">'.$error."</div>";
									}
								?>
								
                                <input class="login" type="submit" name="inscrip" id='inscrist' value="Mettre à jour mon profil"/><br/>
                            </form>
                        </div>
                    </div>
                </div>
                <div id="mes_annonce">
				<?php while($annonceID = $rep_annonceID->fetch()){ ?>
                    <div class="annonce" id="<?php echo $annonceID['Id'] ?>" align="left">
                        <div id="descrip_annonce">
                            <h2 class="detail">Nom:</h2>
                            <p class="text"><?php echo $annonceID['Nom'] ?></p>
                            <h2 class="detail">Disparu le:</h2>
                            <p class="text"><?php echo $annonceID['Dates'] ?></p>
                            <h2 class="detail">Leu de disparition:</h2>
                            <p class="text"><?php echo $annonceID['Lieu'] ?></p>
                            <h2 class="detail">statut:</h2>
                            <p class="text"><?php echo $annonceID['Statut_disparu'] ?></p>
                        </div>
                        <div id="detaill_descrip">
                            <h2 class="detail">Detail</h2>
                            <p class="detail_text"><?php echo $annonceID['Detail'] ?></p>
                        </div>
                        <img id="photo_rechercher" src="../Ressources/image_annonce/<?php echo $annonceID['Image'] ?>" alt=""/>
						<input class= "effacer" name="<?php echo $annonceID['Id'] ?>" type="submit" value="X"/>
                    </div>
				<?php } ?>
                </div>
            </div>
        </main>
        <script src="../Js/jquery-3.3.1.js" type="text/javascript"></script>
        <script src="../Js/jquery.mCustomScrollbar.concat.min.js" type="text/javascript"></script>
        <script src="../Js/js_profil.js" type="text/javascript"></script>
    </body>
</html>
