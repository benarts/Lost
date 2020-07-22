$(function() {
	$('.annonce').click(function() {
		annonce_off();

		Id_annonce = $(this).attr('id');
		console.log(Id_annonce);
		
		$.post("Controller/requete_ajax.php",{Id_annonce: Id_annonce},function(data){
			$("#forme1").empty().append(data);
		});
		
		$('.id_annonce').attr({value : Id_annonce });
		
		Id_annonce_commentaire = Id_annonce;
		
		$.post("Controller/requete_ajax.php",{Id_annonce_commentaire: Id_annonce_commentaire},function(data){
			$(".text_commentaire").empty().append(data);
			$(".text_commentaire").animate({scrollTop: $(document).height()});
		});
	});
});