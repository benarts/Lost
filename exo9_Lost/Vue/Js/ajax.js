/* 
	requete ajax en jquery avec la methode post pour le formulaire d'inscription 
	puis envoyer dans le fichier inscription.php pour traiter et être envyer dans la bdd
*/
$(function (){
	$(".formu").submit(function(){

		nom = $(this).find("input[name=nom]").val();
		prenom = $(this).find("input[name=prenom]").val();
		mail = $(this).find("input[name=mail]").val();
		pseudo = $(this).find("input[name=pseudo]").val();
		num = $(this).find("input[name=num]").val();

		$.post("Controller/inscription.php",{nom: nom, prenom: prenom, mail: mail, pseudo: pseudo, num: num},function(data){
			if(data!="ok"){
				$(".error").empty().append(data);
			}else{
				$(".valide").html('Inscription effectuée avec succès!');
				$(".error").html('');
				$('.texte').val("");
			}
		});
		return false;
	});
});

/* 
	requete ajax en jquery avec la methode post pour le formulaire de connection 
	puis envoyer dans le fichier connection.php pour traiter et être envyer dans la bdd
*/
$(function (){
	$(".formu1").submit(function(){

		Mail = $(this).find("input[name=Mail]").val();
		Num = $(this).find("input[name=Num]").val();

		$.post("Controller/connection.php",{Mail: Mail, Num: Num},function(data){
			if(data!="ok"){
				$(".error2").empty().append(data);
			}else{
				document.location.href="index.php"; 	
			}
		});
		return false;
	});
});
/* 
	requete ajax en jquery avec la methode post pour le formulaire d'annonce 
	puis envoyer dans le fichier description.php pour traiter et être envyer dans la bdd
*/
$(function (){
	$(".formu_annonce").submit(function(){
		vide = "";
		console.log(vide);
		file_path = document.getElementById("file");

		file_upload = file_path.files[0];
		console.log(file_upload);

		disparu = $(this).find("input[name=statut_rep]").val();
		console.log(disparu);

		choix = document.querySelector('input[name=gender]:checked').value;
		console.log(choix);
		
		nom = $(this).find("input[name=nom]").val();
		console.log(nom);
		dates = $(this).find("input[name=date]").val();
		console.log(dates);
		lieu = $(this).find("input[name=lieu]").val();
		console.log(lieu);
		messageCom = $(this).find("textarea[name=messageCom]").val();
		console.log(messageCom);

		id_pseudo = $(this).find("input[name=pseudo]").val();

		disp = $('#color_recherche').text();
		prof = $('#profil_affiche').text();
		console.log(disp);

		if(file_upload != undefined && choix != vide && disparu != vide && nom != vide && dates != vide && lieu != vide && messageCom != vide){
			getBase64(file_upload, function(result)
			{
				image_name = file_upload.name;

				if (file_upload.type == "image/jpeg")
				{
					file_upload = result;
					file_upload = file_upload.replace("data:image/jpeg;base64", "");
					
					file_encode = file_upload;

					code(image_name, file_encode, choix, disparu, nom, dates, lieu, messageCom, id_pseudo);
				}else{
					$(".error1").html("Votre photo n'est pas en format jpg, jpeg");
				}
			});
		}else{
			$(".error1").html("Veuilliez compléter tout les champs");
		}
		function code(image_name, file_encode, choix, disparu, nom, dates, lieu, messageCom, id_pseudo){
			$.post("Controller/annonce.php",{image_name: image_name, file_encode: file_encode, choix: choix, disparu: disparu , nom: nom, dates: dates, lieu: lieu, messageCom: messageCom, id_pseudo: id_pseudo},function(data){
				if(data!="ok"){
					$(".error1").empty().append(data);
				}else{
					document.location.href="index.php"; 
				}
			});
		}
		return false;
	});
});
function getBase64(file, Callback)
{
	var reader = new FileReader();
	
	reader.readAsDataURL(file);
	reader.onload = function()
	{
		Callback(reader.result);
	}
	reader.onerror = function(error)
	{
		console.log("Error : ", error);
	}
}
/* 
	requete ajax en jquery avec la methode post pour les commentaire 
	puis envoyer dans le fichier commentaire.php pour traiter et être envyer dans la bdd
*/
$(function (){
	$(".formulaire_com").submit(function(){

		Id_user = $(this).find("input[name=id_user]").val();
		console.log(Id_user);

		Id_pseudo = $(this).find("input[name=id_pseudo]").val();
		console.log(Id_pseudo);

		Id_photo = $(this).find("input[name=id_photo]").val();
		console.log(Id_photo);

		Id_annonce = $(this).find("input[name=id_annonce]").val();
		console.log(Id_annonce);

		commentaire = $(this).find("input[name=commentaire]").val();
		console.log(commentaire);
		
		$.post("Controller/commentaire.php",{Id_user: Id_user, Id_pseudo: Id_pseudo, Id_photo: Id_photo, Id_annonce: Id_annonce, commentaire: commentaire},function(data){
			tafonction(data);
			$('#message').val("");
		});
		return false;
	});
});
function tafonction(data) {
	$(".text_commentaire").empty().append(data);
	$(".text_commentaire").animate({scrollTop: $(document).height()});
	//setTimeout(tafonction(data), 2000);
}
