(function ($) {
    $(window).on("load", function () {
        $("#mes_annonce").mCustomScrollbar({
            theme: 'minimal'
        });
    });
})(jQuery);
function list() {
    if (document.getElementById("mes_annonce").style.right == "0vw") {
        document.getElementById("mes_annonce").style.right = "-50vw";
        document.getElementById("photo").style.marginRight = "5vw";
        document.getElementById("modif_profil").style.marginRight = "0vw";
        document.getElementById("navbar").style.width = "100%";
    } else {
        document.getElementById("mes_annonce").style.right = "0vw";
        document.getElementById("photo").style.marginRight = "20vw";
        document.getElementById("modif_profil").style.marginRight = "-10vw";
        document.getElementById("navbar").style.width = "52%";
    }
}
$(function (){
	$(".effacer").click(function(){

		effacer = $(this).attr('name');
		console.log(effacer);
		document.getElementById(effacer).style.display = 'none';

		$.post("../../Controller/requete_ajax.php",{effacer: effacer},function(data){
			//$("#pse2").empty().append(data);
		});
	});
});