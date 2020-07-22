(function ($) {
    $(window).on("load", function () {
        $("#commentaire").mCustomScrollbar({
            theme: 'minimal'
        });
        $("#section_annonce").mCustomScrollbar({
            theme: 'minimal'
        });
    });
})(jQuery);
function disparu() {
    document.getElementById("section_annonce_trouver").style.left = "-100vw";
    document.getElementById("section_annonce").style.left = "0vw";
}
function trouver() {
    document.getElementById("section_annonce_trouver").style.left = "0vw";
    document.getElementById("section_annonce").style.left = "-100vw";
}
function avis_off() {
    document.getElementById("section_recherche").style.left = "0vw";
	document.getElementById("section_annonce_trouver").style.left = "0vw";
    document.getElementById("section_annonce").style.left = "0vw";
    document.getElementById("navbar").style.width = "70%";
    document.getElementById("section_photo").style.opacity = "0";
	document.getElementById("button_detail").style.opacity = "0";
    document.getElementById("section_commentaire").style.marginLeft = "-55vw";
}
function annonce_off() {
    document.getElementById("section_recherche").style.left = "-30vw";
	document.getElementById("section_annonce_trouver").style.left = "-100vw";
    document.getElementById("section_annonce").style.left = "-100vw";
    document.getElementById("navbar").style.width = "100%";
    document.getElementById("section_photo").style.opacity = "1";
	document.getElementById("button_detail").style.opacity = "1";
    document.getElementById("section_commentaire").style.marginLeft = "5vw";
}
function connecter_off() {
    document.getElementById("login").style.top = "0vw";
    document.getElementById("login").style.background="rgba(0,0,0,.6)";
}
function connecter_on() {
    document.getElementById("login").style.top = "-55vw";
    document.getElementById("login").style.background="rgba(0,0,0,.0)";
}
function detail() {
	if(document.getElementById("donner").style.opacity == "1"){
		document.getElementById("donner").style.opacity = "0";
	}else{
		document.getElementById("donner").style.opacity = "1";
	}
}
