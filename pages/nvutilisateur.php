<?php
	require_once("ConnexionWithBD.php");
	require_once("../fonctions/functions.php");

    if($_SERVER['REQUEST_METHOD']=='POST') {
		$user_name=$_POST['user_name'];
		$password=$_POST['password'];
		$passwordConfirmation=$_POST['passwordConfirmation'];
		$email=$_POST['email'];
		
		$champErrors=array();
		
	if(isset($user_name)) {
		 $filtredUserName=filter_var($user_name,FILTER_SANITIZE_STRING);
		
		     if(strlen($filtredUserName)<4) {
		 	      $champErrors[]="Nom d'utilisateur doit contenir au moins 4 caractères";
		 }
		
	
	   }
	if(isset($password) && isset($passwordConfirmation)) {
		
		     if(empty($password)) {
		 	      $champErrors[]="Ce champ est obligatoire, il ne peut pas etre vide";
		 }
		     if(md5($password) !== md5($passwordConfirmation)) {
			      $champErrors[]="les deux mots de passe ne sont pas identiques"; 
			 
			 }
	
	   }
		
	if(isset($email)) {
		$filtredEmail=filter_var($email,FILTER_SANITIZE_EMAIL);
		
		if(($filtredEmail)!= true) {
			 $champErrors[]="l'email saisi est invalide";
		}
	}
	if(empty($champErrors)){
		global $pdo;
		if(rechercher_par_nom($user_name) ==0 &   rechercher_par_email($email)==0){
			$insertUser=$pdo->prepare("INSERT INTO utilisateur(user_name,email,pwd)
			                          VALUES (:puser_name,:pemail,:ppwd)");
			$insertUser->execute(array('puser_name' =>$user_name,
										  'pemail'     =>$email,
										  'ppwd'       =>md5($password)));
		
		}
		    die( "votre compte a été bien crée!");
	}
	else if(rechercher_par_nom($user_name)>0) {
		$champErrors[]='ce nom dutilisateur est déja utilisé, veuillez saisir un autre nom';
		
	}
	else if(rechercher_par_email($email)>0) {
		$champErrors[]='cette adresse mail est déja utilisé, veuillez saisir une nouvelle adresse';
		
	}
}
    

?>



<!DOCTYPE html>
<html>
	<head>
	   <meta charset="utf-8" />
		<title>Nouveau utilisateur</title>
		<link rel="stylesheet" type="text/css" href="..//css/bootstrap.min.css">
	    <link rel="stylesheet" type="text/css" href="..//css/user.css">

	
	</head>
	
	<body>
		
		<div class="container col-md-6 col-md-offset-3 ">
			<h2 class="text-center">Creation d'un compte utilisateur</h2>
		<form class="form" method="post">
		    <input id="espace" type="text" 
				   required 
				   minlength="4" 
				   title="user name doit contenir au moins 4 caractères"
				   name="user_name"
				   placeholder="saisir un nom "
				   class="form-control">
			
			<input id="espace" type="password" 
				   required minlength="8" 
				   title="mot de passe doit contenir au moins 8 caractères"
				   name="password"
				   placeholder="saisir un mot de passe"
				   class="form-control">
			 
			<input id="espace" type="password" 
				   required 
				   minlength="8" 
				   name="passwordConfirmation"
				   placeholder="saisir de nouveau le mot de passe "
				   class="form-control">
			
			<input id="espace" type="email" 
				   required 
				   minlength="4" 
				   name="email"
				   placeholder="saisir un email "
				   class="form-control">
			
			<input type="submit" class="btn btn-primary" value="Enregistrer">
		
		</form>
		<br>
		  <?php
			

			if (isset($champErrors) && !empty($champErrors)) {
					foreach ($champErrors as $error) {
							echo '<div class="alert alert-danger">' . $error . '</div>';
        }
    }
			
			?>
		</div>
	
	
	
	</body>
	
	
</html>
