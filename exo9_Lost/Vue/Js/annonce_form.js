function personne(){
	document.getElementById("pers").style.display = "block";
	document.getElementById("obj").style.display = "none";
	document.getElementById("ani").style.display = "none";
	choix = document.getElementById('pers').innerHTML;
	$('#statut_rep').attr({value : choix});
}
function objet(){
	document.getElementById("pers").style.display = "none";
	document.getElementById("obj").style.display = "block";
	document.getElementById("ani").style.display = "none";
	choix = document.getElementById('obj').innerHTML;
	$('#statut_rep').attr({value : choix});
}
function animal(){
	document.getElementById("pers").style.display = "none";
	document.getElementById("obj").style.display = "none";
	document.getElementById("ani").style.display = "block";
	choix = document.getElementById('ani').innerHTML;
	$('#statut_rep').attr({value : choix});
}