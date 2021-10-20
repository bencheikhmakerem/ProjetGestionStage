<?php
function rechercher_par_nom($user_name){
	global $pdo;
	$requete=$pdo->prepare("select * from utilisateur where user_name=?");
	$requete->execute(array($user_name));
	return $requete->rowCount();
}

function rechercher_par_email($email){
	global $pdo;
	$requete=$pdo->prepare("select * from utilisateur where email=?");
	$requete->execute(array($email));
	return $requete->rowCount();
}


?>