<?php


	if(!empty($_POST)){
	
	
		$errors= array();
		
		
		
	
	
	
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
			<h2 class="text-center">S'inscrire</h2>
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
		
		</div>
	
	
	
	</body>
	
	
</html>
